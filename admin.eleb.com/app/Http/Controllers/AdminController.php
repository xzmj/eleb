<?php

namespace App\Http\Controllers;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;


class AdminController extends Controller
{
    //
    //
    public function index(){
        $admins=Admin::all();
        return view('admin.index',['admins'=>$admins]);
    }


//创建新的商家分类的视图
    public function create(){

        return view('admin.create');
    }
//修改视图

    public function edit(Admin $admin){

        $admin=Admin::find($admin->id);
//dd($admin->status);

        return view('admin.edit',['admin'=>$admin]);
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
            'password'=>Hash::make($request->password),
        ];
//        dd($data);
        Admin::create($data);
//        dd($aa);
        return redirect()->route('admin.index')->with('success','添加成功');
    }

//    提交修改数据
    public function update(Request $request,Admin $admin){
        //数据验证，验证不通过，返回表单并提示错误信息
//        dd($request);
        $this->validate($request,
            [//验证规则
                'name'=>'required',
                'password'=>'required',
                'email'=>'required',
            ],
            [//错误提示信息
                'name.required'=>'名不能为空',
                'email.required'=>'email不能为空',
                'password.required'=>'密码不能为空',

            ]);
//



            $data = [
                $admin->name = $request->name,
                $admin->email = $request->email,
                $admin->password =Hash::make($request->email),
            ];

        $admin->save($data);
//        dd($aa);
        return redirect()->route('admin.index')->with('success','成功修改');

    }

//查看
    public function show(Admin $admin ){

        $admin =Admin::find($admin ->id);

//      dd($aa ->name);

//    返回视图
        return view('admin.show',['admin'=>$admin]);
    }




    //删除
    public function destroy(Admin $admin)
    {
//        dd($admin);
        Admin::destroy($admin->id);

        return redirect()->route('admin.index');
    }

}
