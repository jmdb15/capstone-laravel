<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Events;
use Illuminate\Http\Request;

class CalendarController extends Controller
{
    public function index(Request $request){
        if($request->ajax()){
            $data = Events::where('start', '>=', $request->start)
                ->where('end', '<=', $request->end)
                ->get(['id', 'title', 'description', 'start', 'end']);
                // ['id', 'title', 'start', 'end']
                return response()->json($data);
        }
        return view('admin.calendar');
    }

    public function action(Request $request){
        if($request->ajax()){
            if($request->type == 'add'){
                $event = Events::create([
                    'title' => $request->title,  
                    'description' => $request->description,  
                    'start' => $request->start,  
                    'end' => $request->end,  
                ]);
                return response()->json($event);
            }else if($request->type == 'update'){
                $event = Events::find($request->id)
                    ->update([
                        'title' => $request->title,  
                        'description' => $request->description,  
                        'start' => $request->start,  
                        'end' => $request->end,  
                    ]);
                return response()->json($event);
            }else if($request->type == 'delete')
    		{
    			$event = Events::find($request->id)->delete();

    			return response()->json($event);
    		}
        }
    }
}
