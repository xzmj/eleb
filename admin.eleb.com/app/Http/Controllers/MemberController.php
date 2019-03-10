<?php

namespace App\Http\Controllers;
use App\Models\Member;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;


class MemberController extends Controller
{
    //
//页面管理
    public function __construct()
    {
        //设置中间件
        $this->middleware('auth');
    }

    public function index(Request $request){
if($request->keyword){
        $members=Member::where('username','like',"%$request->keyword%")->get();

        }else{$members=Member::all();
}

        return view('member.index',['members'=>$members]);
    }



//禁用或者启用账号

    public function edit(Member $member){
  if($member->status==0){
      $data=[$member->status=1,
      ];
      $member->save($data);
      return redirect()->route('member.index')->with('success','恢复成功');
  }else{

      $data=[$member->status=0,
      ];
      $member->save($data);
      return redirect()->route('member.index')->with('success','禁用成功');
  }
    }





//查看
    public function show(Member $member ){

        $member =Member::find($member ->id);

//      dd($aa ->name);

//    返回视图
        return view('member.show',['member'=>$member]);
    }




    //删除
    public function destroy(Member $member)
    {
//        dd($member);
        Member::destroy($member->id);

        return redirect()->route('member.index');
    }




//

}
