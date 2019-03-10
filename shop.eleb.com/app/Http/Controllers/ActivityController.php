<?php

namespace App\Http\controllers;

use Illuminate\Http\Request;
use App\Models\Activity;
class Activitycontroller extends controller
{
    //

    public function index(Request $request){
        $statuss=$request->statuss;
//        dd($status);
        $start=$request->start;
        $stop=$request->stop;
$date=date('Y-m-d');
//dd($date);
        $where=[];


        if($statuss==1){
            $where[] = ['end_time','>=',$date];
            $where[] = ['start_time','<=',$date];
        }
        if($statuss==0) $where[] = ['start_time','>=',$date];
        if($statuss==-1) $where[] = ['end_time','<=',$date];
//        dd($status);
        if($start) $where[] = ['start_time','>=',$start];
        if($stop) $where[] = ['end_time','<=',$stop];

//        dd($where);
//        var_dump($statuss);
        $activities=Activity::where($where)->paginate(3);
        return view('activity.index',compact('activities','statuss'));
    }


//创建新的商家分类的视图
    public function create(){

        return view('activity.create');
    }
//修改视图

    public function edit(activity $activity){

        $activity=Activity::find($activity->id);
//dd($activity->status);

        return view('activity.edit',['activity'=>$activity]);
    }

    public function store(Request $request)
    {

//        dd($request);
        //数据验证，验证不通过，返回表单并提示错误信息
        $this->validate($request,
            [//验证规则
                'title'=>'required',
                'content'=>'required',
                'start_time'=>'required',
                'end_time'=>'required',
            ],
            [//错误提示信息
                'title.required'=>'活动名不能为空',
                'content.required'=>'活动内容不能为空',
                'start_time.required'=>'开始时间不能为空',
                'end_time.required'=>'结束时间不能为空',

            ]);

        $data = [
            'title'=>$request->title,
            'content'=>$request->input('content'),
            'start_time'=>$request->start_time,
            'end_time'=>$request->end_time,

        ];
//        dd($data);
        Activity::create($data);
//        dd($aa);
        return redirect()->route('activity.index')->with('success','添加成功');
    }

//    提交修改数据
    public function update(Request $request,activity $activity){
        //数据验证，验证不通过，返回表单并提示错误信息
//        dd($request);
        $this->validate($request,
            [//验证规则
                'title'=>'required',
                'content'=>'required',
                'start_time'=>'required',
                'end_time'=>'required',
            ],
            [//错误提示信息
                'title.required'=>'活动名不能为空',
                'content.required'=>'活动内容不能为空',
                'start_time.required'=>'开始时间不能为空',
                'end_time.required'=>'结束时间不能为空',

            ]);
//
        $data = [
            $activity->title = $request->title,
            $activity->content = $request->input('content'),
            $activity->start_time = $request->start_time,
            $activity->end_time = $request->end_time,

        ];

        $activity->save($data);
//        dd($aa);
        return redirect()->route('activity.index')->with('success','成功修改');

    }

//查看
    public function show(activity $activity ){

        $activity =activity::find($activity ->id);

//      dd($aa ->name);

//    返回视图
        return view('activity.show',['activity'=>$activity]);
    }




    //删除
    public function destroy(activity $activity)
    {
//        dd($activity);
        activity::destroy($activity->id);

        return redirect()->route('activity.index');
    }

//修改密码页面

    public function pwd(){
//        echo 'woaa';

        return view('activity.pwd');
    }
//储存修改的密码

    public function savepwd(Request $request){
//        echo 'woaa';

        //数据验证，验证不通过，返回表单并提示错误信息
        $this->validate($request,
            [//验证规则
//
                'oldpassword'=>'required',
                'newpassword'=>'required',
            ],
            [//错误提示信息
//
                'oldpassword.required'=>'原密码不能为空',
                'newpassword.required'=>'新密码不能为空',

            ]);



        $activity = Auth::user();
//        dd($activity->password);
//        将输入的old密码与session登录信息里面面的密码进行对比
        if(!Hash::check($request->oldpassword,$activity->password)){
            return back()->with('danger','原密码不正确');
        }
//        对比正确后改变为新密码
        {
            $activity->update(['password'=>Hash::make($request->newpassword)]);
            return view('activity.index');
        }
    }


}
