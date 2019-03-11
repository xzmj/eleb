<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\User;
use App\Models\EventPrize;
use App\Models\EventMember;
class EventController extends Controller
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
//修改视图

    public function edit(Event $event){

        $event=Event::find($event->id);
//dd($event);

        return view('event.edit',['event'=>$event]);
    }

    public function store(Request $request)
    {

//        dd($request);
        //数据验证，验证不通过，返回表单并提示错误信息
        $this->validate($request,
            [//验证规则
                'title'=>'required',
                'content'=>'required',
                'signup_start'=>'required',
                'signup_end'=>'required',
                'prize_date'=>'required',
                'signup_num'=>'required',


            ],
            [//错误提示信息
                'title.required'=>'活动名不能为空',
                'content.required'=>'活动内容不能为空',
                'signup_start.required'=>'开始时间不能为空',
                'signup_end.required'=>'结束时间不能为空',
                'prize_date.required'=>'开奖不能为空',
                'signup_num.required'=>'人数限制不能为空',
            ]);

        $data = [
            'title'=>$request->title,
            'content'=>$request->input('content'),
            'signup_start'=>time($request->signup_start),
            'signup_end'=>time($request->signup_end),
            'prize_date'=>$request->prize_date,
            'signup_num'=>$request->signup_num,
            'is_prize'=>0,

        ];
//        dd($data);
        Event::create($data);
//        dd($aa);
        return redirect()->route('event.index')->with('success','添加抽奖活动成功');
    }

//    提交修改数据
    public function update(Request $request,event $event){

//        dd($request);
        //数据验证，验证不通过，返回表单并提示错误信息
        $this->validate($request,
            [//验证规则
                'title'=>'required',
                'content'=>'required',
                'signup_start'=>'required',
                'signup_end'=>'required',
                'prize_date'=>'required',
                'signup_num'=>'required',


            ],
            [//错误提示信息
                'title.required'=>'活动名不能为空',
                'content.required'=>'活动内容不能为空',
                'signup_start.required'=>'开始时间不能为空',
                'signup_end.required'=>'结束时间不能为空',
                'prize_date.required'=>'开奖不能为空',
                'signup_num.required'=>'人数限制不能为空',
            ]);
//
        $data = [
            $event->title = $request->title,
            $event->content = $request->input('content'),
            $event->signup_start = time($request->signup_start),
            $event->signup_end =time($request->signup_end),
            $event->prize_date = $request->prize_date,
            $event->signup_num = $request->signup_num,
            $event->is_prize = $request->is_prize,



        ];


        $event->save($data);
        return redirect()->route('event.index')->with('success','成功修改');

    }

//查看
    public function show(Event $event ){

        $event =Event::find($event ->id);

//      dd($aa ->name);

//    返回视图
        return view('event.show',['event'=>$event]);
    }

//开奖

    /**
     * @param Event $event
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function open(Event $event ){
//开奖将相应的活动改为已开奖
     $data=[
         $event->is_prize=1
     ];
        $event->save($data);
//查出该活动下的所有奖品
$goods=EventPrize::where('events_id','=',$event->id)->get();
//查出所有报名该活动的人
$user=EventMember::where('events_id','=',$event->id)->get();
//统计报名该活动的人数
$count=count($user);
//dd($count);
//        遍历所有人 并且把每个人的id存入数组
foreach ($user as $u){
$userid[]=$u->member_id;
}
//dd($userid);

//dd($user_id);
//遍历所有奖品并且给奖品分配获奖人
foreach($goods as $good){
//    随机取一个获奖人id
    $user_id=$userid[rand(0,$count-1)];
//    DB::update('update event_prizes set member_id = $user_id where  id= ?', [$good->id]);

    //    查询是否单人获多奖
    if(
   count( $good2=EventPrize::where('member_id','=',$user_id)->get())==0){

        //    把获奖人写入奖品表的获奖人id
        DB::table('event_prizes')
            ->where('id', $good->id)
            ->update(['member_id'=>$user_id]);

    };
}

//    获取获奖名单
   $goodusers=EventPrize::where('events_id',$event->id)->get();
//   dd($goodusers);
  foreach ($goodusers as $gooduser){
      $g_user=User::where('id',$gooduser->member_id)->first();
      $g_user['goodname']=$gooduser->name;
      $g_users[]=$g_user;

  }

//    返回视图
      return view('event.open',['g_users'=>$g_users])->with('success','开奖成功');
    }
  //删除
    public function destroy(Event $event)
    {
//        dd($Event);
        Event::destroy($event->id);

        return redirect()->route('event.index');
    }





}
