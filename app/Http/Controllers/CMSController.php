<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use DOMDocument;
use Illuminate\Http\Request;

class CMSController extends Controller
{
    public function store(Request $request){
        $users = simplexml_load_file('csspdep.xml');
		$user = $users->addChild('official');
		$user->addChild('image', 'https://avatars.dicebear.com/api/initials/avatar.svg');
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
        $users = simplexml_load_file('csspdep.xml');
        $userFound = false; 
		foreach($users->official as $user){
			if(strtolower($user->name) == strtolower($request['edit-fullname'])){
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
}
