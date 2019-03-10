<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Nav;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
class NavController extends Controller
{
//页面管理
    public function __construct()
    {
        //设置中间件
        $this->middleware('auth');
    }


    //
//       导航列表

 public function index(){

     $navs=Nav::all();
$topnavs=Nav::where('pid','0')->get();


  return view('nav.index',['navs'=>$navs,'topnavs'=>$topnavs]);

 }

//    创建导航菜单

    public function create(){
     $navs=Nav::where('pid','0')->get();
     $permissions=Permission::all();

        return view('nav.create',['navs'=>$navs,'permissions'=>$permissions]);
    }


       public function store(Request $request){

           //数据验证，验证不通过，返回表单并提示错误信息
           $this->validate($request,
               [//验证规则
                   'name'=>'required',

               ],
               [//错误提示信息
                   'name.required'=>'导航名不能为空',

               ]);
           $data = [
               'name'=>$request->name,
               'url'=>$request->url??'',
               'pid'=>$request->pid,
               'permission_id'=>$request->permission_id,
           ];

                Nav::create($data);

           return redirect()->route('nav.create')->with('success','添加成功');


}


//  修改导航信息页面

                public function edit(Nav $nav){
                 $navs=Nav::all();
                 $nav=Nav::find($nav->id);
                    $permissions=Permission::all();
                        return view('nav.edit',['nav'=>$nav,'navs'=>$navs,'permissions'=>$permissions]);
                            }



//  接收要修改导航信息并储存
            public function update(Request $request,Nav $nav){

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
                    $nav->name = $request->name,
                    $nav->permission_id = $request->permission_id,
                    $nav->url = $request->url??'',
                    $nav->pid = $request->pid,
                ];

                $nav->save($data);
//        dd($aa);
                return redirect()->route('nav.index')->with('success','成功修改');

            }


    //删除权限
    public function destroy(Nav $nav)
    {
//        dd($permission);
        Nav::destroy($nav->id);

        return redirect()->route('nav.index');
    }
















}
