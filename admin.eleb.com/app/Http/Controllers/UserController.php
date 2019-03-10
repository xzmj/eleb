<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Shop;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
class UserController extends Controller
{
    //



//页面管理
    public function __construct()
    {
        //设置中间件
        $this->middleware('auth');
    }

    //
    public function index(){
        $users=User::all();
        return view('user.index',['users'=>$users]);
    }


//创建新的商家分类的视图
    public function create(){
        $shops=Shop::all();
        return view('user.create',['shops'=>$shops]);
    }
//修改视图

    public function edit(User $user){
         $shops=Shop::all();
        $user=User::find($user->id);
//dd($user->status);

        return view('user.edit',['user'=>$user,'shops'=>$shops]);
    }

    public function store(Request $request)
    {
//        dd($request);
        //数据验证，验证不通过，返回表单并提示错误信息
        $this->validate($request,
            [//验证规则
                'name'=>'required',
                'password'=>'required',
                'email'=>'required',
            ],
            [//错误提示信息
                'name.required'=>'类名名不能为空',
                'email.required'=>'email不能为空',
                'password.required'=>'密码不能为空',

            ]);

        $data = [
            'name'=>$request->name,
            'email'=>$request->email,
            'status'=>$request->status,
            'shop_id'=>$request->id,
            'password'=>Hash::make($request->password),
        ];
//        dd($data);
        User::create($data);
//        dd($aa);
        return redirect()->route('user.index')->with('success','添加成功');
    }

//    提交修改数据
    public function update(Request $request,user $user){
        //数据验证，验证不通过，返回表单并提示错误信息
//        dd($request);
        $this->validate($request,
            [//验证规则
                'name'=>'required',

                'email'=>'required',
            ],
            [//错误提示信息
                'name.required'=>'名不能为空',
                'email.required'=>'email不能为空',


            ]);
//



        $data = [
            $user->name = $request->name,
            $user->email = $request->email,
           $user->shop_id=$request->shop_id,
        ];

        $user->save($data);
//        dd($aa);
        return redirect()->route('user.index')->with('success','成功修改');

    }

//查看
    public function show(user $user ){

        $user =user::find($user ->id);

//      dd($aa ->name);

//    返回视图
        return view('user.show',['user'=>$user]);
    }




    //删除
    public function destroy(user $user)
    {
//        dd($user);
        user::destroy($user->id);

        return redirect()->route('user.index');
    }


//    账号审核

//状态启用
    public function start(User $user){
//dd($user);
//    $shops=Shop::find($shop->id);
//    dd($shop);
        DB::update("update users set status = 1 where id = $user->id");
        $users=User::all();


        return view('user.index',['users'=>$users]);
    }
//状态禁用

    public function down(User $user,Request $request){

        DB::update("update users set status = 0 where id = $user->id");
        $users=User::all();


        return view('user.index',['users'=>$users]);
    }














}
