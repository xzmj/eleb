<?php

namespace App\Http\Controllers;
//use App\Good;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
//      用户登录
        public function create()
        {
            return view('login.create');
        }

    public function store(Request $request)
    {
//        dd($request);

        $this->validate($request,[
            'name'=>'required',
            'password'=>'required'
        ]);
        if(Auth::attempt([
            'name'=>$request->name,
            'password'=>$request->password
        ],$request->has('rememberMe')))

        {//账号密码正确 ，创建会话（保存当前用户的信息到session）
            return redirect()->intended(route('shop.index'))->with('success','登录成功');
        }else{//账号密码不正确

            return back();
        }

    }


    //用户注销
    public function destroy()
    {
        Auth::logout();//注销登录
        return redirect()->route('login')->with('success','您已安全退出');
    }





}
