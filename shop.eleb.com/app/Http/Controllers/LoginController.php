<?php

namespace App\Http\Controllers;
//use App\Good;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
      //用户登录
//        public function create()
//        {
//            return view('login.create');
//        }

    public function store(Request $request)
    {
//        dd($request);
        /*
         * 登录之前，需要修改两个配置
         * 1.config/auth.php->providers.users  'model' => \App\Models\Admin::class,
         * 2.Admin模型需要修改，继承 Illuminate\Notifications\Notifiable;
         */
        $this->validate($request,[
            'name'=>'required',
            'password'=>'required'
        ]);// back()->withInput()

        //验证账号密码是否正确
        //   md5
        //$user = '';//从数据库查询用户
        //md5($request->password) == $user->password;
        if(Auth::attempt([
            'name'=>$request->name,
            'password'=>$request->password
        ],$request->has('rememberMe'))){//账号密码正确 ，创建会话（保存当前用户的信息到session）
            return redirect()->intended(route('good.index'))->with('success','登录成功');
        }else{//账号密码不正确

            return back()->with('danger','账号密码不正确');
        }

    }


    //用户注销
    public function destroy()
    {
        Auth::logout();//注销登录
        return redirect()->route('good.index')->with('success','您已安全退出');
    }





}
