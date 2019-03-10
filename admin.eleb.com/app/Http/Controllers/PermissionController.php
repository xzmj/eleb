<?php

namespace App\Http\Controllers;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Http\Request;

class PermissionController extends Controller
{
    //页面管理
    public function __construct()
    {
        //设置中间件
        $this->middleware('auth');
    }

    //
    public function index(){

       $permissions=Permission::all();
       return view('permission.index',['permissions'=>$permissions]);




    }




//添加权限页面
    public function create(){


        return view('permission.create');
    }


//保存权限
     public function store(Request $request){

         //数据验证，验证不通过，返回表单并提示错误信息
         $this->validate($request,
             [//验证规则
//
                 'name'=>'required',
             ],
             [//错误提示信息
//
                 'name.required'=>'权限名不能为空',


             ]);
         $permission = Permission::create(['name' => $request->name]);

         return redirect()->route('permission.index')->with('success','创建权限成功');


     }

    //修改权限

    public function edit(Permission $permission){

        $permission=Permission::find($permission->id);


        return view('permission.edit',['permission'=>$permission]);
    }

//    提交修改数据
    public function update(Request $request,Permission $permission){
        //数据验证，验证不通过，返回表单并提示错误信息
//        dd($request);
        $this->validate($request,
            [//验证规则
                'name'=>'required',
            ],
            [//错误提示信息
                'name.required'=>'权限名不能为空',

            ]);
//



        $data = [
            $permission->name = $request->name,
        ];

        $permission->save($data);
//        dd($aa);
        return redirect()->route('permission.index')->with('success','成功修改');

    }








    //删除权限
    public function destroy(Permission $permission)
    {
//        dd($permission);
        Permission::destroy($permission->id);

        return redirect()->route('permission.index');
    }



public function show(){

}









}
