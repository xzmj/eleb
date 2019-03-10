<?php

namespace App\Http\Controllers;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Http\Request;

class RoleController extends Controller
{

    //页面管理
    public function __construct()
    {
        //设置中间件
        $this->middleware('auth');
    }

    //
    public function index(){

       $roles=Role::all();
       return view('role.index',['roles'=>$roles]);

    }




//添加权限页面
    public function create(){

        $permissions=Permission::all();
        return view('role.create',['permissions'=>$permissions]);
    }


//保存权限
     public function store(Request $request){

         //数据验证，验证不通过，返回表单并提示错误信息
         $this->validate($request,
             [//验证规则
//
                 'name'=>'required',
                 'permission'=>'required',
             ],
             [//错误提示信息
//
                 'name.required'=>'角色名不能为空',
                 'permission.required'=>'请选择权限',

             ]);
         $role = Role::create(['name' => $request->name]);
         $permissions=$request->permission;

         $role->syncPermissions($permissions);


         return redirect()->route('role.index')->with('success','创建角色成功并关联权限');


     }

    //修改权限

    public function edit(Role $role){
        $permissions=Permission::all();
        $role=Role::find($role->id);


        return view('role.edit',['role'=>$role,'permissions'=>$permissions]);
    }

//    提交修改数据
    public function update(Request $request,Role $role){
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
            $role->name = $request->name,
        ];
        $role->save($data);

        $permissions=$request->permission;

        $role->syncPermissions($permissions);


//        dd($aa);
        return redirect()->route('role.index')->with('success','成功修改');

    }








    //删除权限
    public function destroy(role $role)
    {
//        dd($role);
        Role::destroy($role->id);

        return redirect()->route('role.index');
    }













}
