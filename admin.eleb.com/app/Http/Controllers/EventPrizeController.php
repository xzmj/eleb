<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\EventPrize;
class EventPrizeController extends Controller
{
    //
    public function index(){
        $event_prizes=EventPrize::all();
//dd($event_prizes);
        return view('event_prize.index',compact('event_prizes',$event_prizes));
    }







    //创建新的奖品
    public function create(){

        $events=Event::all();

        return view('event_prize.create',compact('events',$events));
    }

    public function store(Request $request)
    {

//        dd($request);
        //数据验证，验证不通过，返回表单并提示错误信息
        $this->validate($request,
            [//验证规则
                'name'=>'required',
                'description'=>'required',
                'events_id'=>'required',



            ],
            [//错误提示信息
                'name.required'=>'奖品名不能为空',
                'description.required'=>'奖品描述内容不能为空',
                'events_id.required'=>'所属活动不能为空',

            ]);

        $data = [
            'name'=>$request->name,
            'description'=>$request->input('description'),
            'events_id'=>$request->events_id,
            'member_id'=>0,


        ];
//        dd($data);
        EventPrize::create($data);
//        dd($aa);
        return redirect()->route('event_prize.create')->with('success','添加奖品成功');
    }


//修改视图

    public function edit(EventPrize $event_prize){

        $event_prize=EventPrize::find($event_prize->id);
//dd($event);
         $events=Event::all();
        return view('event_prize.edit',['events'=>$events,'event_prize'=>$event_prize]);
    }



//    提交修改数据
    public function update(Request $request,EventPrize $event_prize){

//        dd($request);
        //数据验证，验证不通过，返回表单并提示错误信息
        $this->validate($request,
            [//验证规则
                'name'=>'required',
                'description'=>'required',
                'events_id'=>'required',



            ],
            [//错误提示信息
                'name.required'=>'奖品名不能为空',
                'description.required'=>'奖品描述内容不能为空',
                'events_id.required'=>'所属活动不能为空',

            ]);
        $data = [
            $event_prize->name = $request->name,
            $event_prize->description = $request->input('description'),
            $event_prize->events_id = $request->events_id,
        ];


        $event_prize->save($data);
        return redirect()->route('event_prize.index')->with('success','成功修改');

    }



    //删除
    public function destroy(EventPrize $event_prize)
    {
//        dd($Event);
        EventPrize::destroy($event_prize->id);

        return redirect()->route('event_prize.index');
    }























}
