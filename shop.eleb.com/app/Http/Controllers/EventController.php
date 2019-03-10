<?php

namespace App\Http\controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\EventMember;
class Eventcontroller extends controller
{
    //

    public function index(){


       $events=Event::all();

        return view('event.index',compact('events',$events));
    }


//创建新的商家分类的视图
    public function create(){

        return view('event.create');
    }
//报名试用活动

    public function edit(Event $event){
//dd(auth()->user()->id);

        $user=EventMember::where('events_id','=',$event->id)->where('member_id','=',auth()->user()->id)->get();
//dd($user);
    if(count($user)>0){

        return redirect()->route('event.index')->with('danger','您已经报名');


    }else{
        $data = [
            'events_id'=>$event->id,
            'member_id'=>auth()->user()->id,
        ];
        EventMember::create($data);
        return redirect()->route('event.index')->with('success','报名成功');
    }


    }

//查看
    public function show(Event $event ){

        $event =Event::find($event ->id);

//      dd($aa ->name);

//    返回视图
        return view('event.show',['event'=>$event]);
    }





}
