<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Event;
use App\EventUser;

class EventsController extends Controller
{
    
    public function index()
    {
        return Event::all();
    }

    public function show($id)
    {
        return  Event::findOrFail($id);
    }

    public function store(Request $request)
    {
        if($request->name==null){
            return response(['status'=>'fail','message'=>'Name is Required']);
        }
        if($request->userid==null){
            return response(['status'=>'fail','message'=>'Userid is Required']);
        }
        if($request->location==null){
            return response(['status'=>'fail','message'=>'location is Required']);
        }
        if($request->type==null){
            return response(['status'=>'fail','message'=>'Event type is Required']);
        }
        $event = Event::create($request->all());

        return response(['status'=>'success','message'=>'Event addedd successfully','Data'=>$event]);

                
    }

    public function Addpersons($id, Request $request)
    {
        if($id==null){
            return response(['status'=>'fail','message'=>'Event is Required']);
        }
        if($request->name==null){
            return response(['status'=>'fail','message'=>'Username is Required']);
        }
        if($request->email==null){
            return response(['status'=>'fail','message'=>'Email is Required']);
        }
        $request['event_id']=$id;
        $user = EventUser::create($request->all());

        return response(['status'=>'success','message'=>'Event addedd successfully','Data'=>$user]);
    }

    public function delete($id)
    {
        $event = Event::findOrFail($id);
        $event->delete();

        return response()->json(['status'=>'Success'], 204);
    }

    public function resetAnswers($id)
    {
        $event = Event::findOrFail($id);
        $event->answers = 0;
        $event->points = 0;

        return  ($event);
    }

}
