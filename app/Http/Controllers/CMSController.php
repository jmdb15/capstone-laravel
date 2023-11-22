<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use DOMDocument;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CMSController extends Controller
{
    // FACULTY XML
    public function store(Request $request){
        $hasImage = false;
        $fileNameToStore = '';
         if ($request->hasFile('image')) {
            $validator = Validator::make($request->all(), [
                'image' => 'mimes:jpeg,png,bmp,jpg,tiff|max:51200',
            ]);
            if ($validator->fails()) {
                return back()->with('errmessage', 'Data was not updated successfully: Image extension is invalid.');
            }
            $fileNameWithExtension = $request->file('image');
            $fileName = pathInfo($fileNameWithExtension, PATHINFO_FILENAME);
            $extension = $request->file('image')->getClientOriginalExtension();
            $fileNameToStore = $fileName . '_' . time() . '.' . $extension;
            $request->file('image')->storeAs('public/faculty', $fileNameToStore);
            $hasImage = true;
        }
        $users = simplexml_load_file('csspdep.xml');
		$user = $users->addChild('official');
        if($hasImage){
            $user->addChild('image', $fileNameToStore);
        }else{
            $user->addChild('image', '');
        }
		$user->addChild('name', $request['fullname']);
		$user->addChild('email', $request['email']);
		$user->addChild('position', $request['position']);
		$user->addChild('department', $request['department']);
		$user->addChild('status', $request['status']);
	
		// Save to file
		$dom = new DOMDocument();
		$dom->preserveWhiteSpace = false;
		$dom->formatOutput = true;
		$dom->loadXML($users->asXML());
		$dom->save('csspdep.xml'); 
        return back()->with('message', 'Faculty added.');
    }

    public function update(Request $request){
        $hasImage = false;
        $fileNameToStore = '';
        if ($request->hasFile('image')) {
            $validator = Validator::make($request->all(), [
                'image' => 'mimes:jpeg,png,bmp,jpg,tiff|max:51200',
            ]);
            if ($validator->fails()) {
                return back()->with('errmessage', 'Data was not updated successfully: Image extension is invalid.');
            }
            $fileNameWithExtension = $request->file('image');
            $fileName = pathInfo($fileNameWithExtension, PATHINFO_FILENAME);
            $extension = $request->file('image')->getClientOriginalExtension();
            $fileNameToStore = $fileName . '_' . time() . '.' . $extension;
            $request->file('image')->storeAs('public/faculty', $fileNameToStore);
            $hasImage = true;
        }
        $users = simplexml_load_file('csspdep.xml');
        $userFound = false; 
		foreach($users->official as $user){
			if(strtolower($user->name) == strtolower($request['edit-fullname'])){
                if($hasImage){
				    $user->image = $fileNameToStore;
                }
				$user->name = $request['edit-fullname'];
				$user->email = $request['edit-email'];
				$user->position = $request['edit-position'];
				$user->department = $request['edit-department'];
				$user->status = $request['edit-status'];
                $userFound = true; 
				break;
			}
		}
		if ($userFound) {
            file_put_contents('csspdep.xml', $users->asXML());
            return back()->with('message', 'Faculty updated successfully.');
        } else {
            return back()->with('errmessage', 'Faculty was not updated.');
        }
    }

    public function destroy(Request $request){
        $id = $request['fullname'];
        $users = simplexml_load_file('csspdep.xml');

        //we're are going to create iterator to assign to each user
        $index = 0;
        $i = 0;
        $userFound = false; 

        foreach ($users->official as $user) {
            if (strtolower($user->name) == strtolower($id)) {
                $index = $i;
                unset($users->official[$index]);
                $userFound = true;
                break; // Exit the loop since the user has been found and removed
            }
            $i++;
        }

        if ($userFound) {
            file_put_contents('csspdep.xml', $users->asXML());
            return back()->with('message', 'Faculty removed successfully.');
        } else {
            return back()->with('errmessage', 'Faculty was not removed.');
        }
    }

    public function edit(Request $request){
        $id = $request['itemid'];
        $contents = simplexml_load_file('aboutcont.xml');

        //we're are going to create iterator to assign to each user
        $contentFound = false; 

        foreach ($contents->content as $content) {
            if (strtolower($content->itemid) == strtolower($id)) {
				$content->valuesecond = $request['valuesecond'];
                $contentFound = true;
                break; // Exit the loop since the user has been found and removed
            }
        }

        if ($contentFound) {
            file_put_contents('aboutcont.xml', $contents->asXML());
            return response()->json('Success.');
        } else {
            return response()->json('Failed.');
        }
    }
}
