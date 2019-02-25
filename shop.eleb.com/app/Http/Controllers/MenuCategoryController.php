<?php

namespace App\Http\Controllers;
use App\Models\MenuCategory;
use App\Models\Shop;
use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class MenuCategoryController extends Controller
{
    //

//    public function __construct()
//    {
        //只能游客才能访问
//        $this->middleware('guest',[
//            'only'=>['edit]
////            'except'=>['index','create','edit']
//        ]);
//    }


    public function index(){
$menu_categories=MenuCategory::paginate(4);
        return view('menu_category.index',['menu_categories'=>$menu_categories]);
    }


//创建新的商家分类的视图
    public function create(){
//$shop = Shop::all();
//dd($shop);
        return view('menu_category.create');
    }
//修改视图

    public function edit(MenuCategory $menu_category){

        $shops=Shop::all();
$menu_category=MenuCategory::find($menu_category->id);
//dd($menu_category->status);

        return view('menu_category.edit',['menu_category'=>$menu_category,'shops'=>$shops]);
    }





    public function store(Request $request)
    {
//        dd($request);
        //数据验证，验证不通过，返回表单并提示错误信息
        $this->validate($request,
            [//验证规则
                'name'=>'required',
                'description'=>'required',
                'type_accumulation'=>'required',

            ],
            [//错误提示信息
                'name.required'=>'类名名不能为空',
                'description.required'=>'描述不能为空',
                'type_accumulation.required'=>'菜品编号不能为空',

            ]);
//        如果要添加的菜品是默认分类那么先修改其他的分类是默认分类的为非默认分类
        if($request->is_selected==1){
            MenuCategory::where('is_selected','=','1')->update(['is_selected'=>'0']);

        }

        $data = [
            'name'=>$request->name,
            'description'=>$request->description,
            'type_accumulation'=>$request->type_accumulation,
            'shop_id'=>Auth::user()->shop_id,

            'is_selected'=>$request->is_selected,
        ];
//        dd($data);
     MenuCategory::create($data);
//        dd($aa);
        return redirect()->route('menu_category.index')->with('success','添加成功');
    }

//    提交修改数据
    public function update(Request $request,MenuCategory $menu_category){
        //数据验证，验证不通过，返回表单并提示错误信息

//        dd($request);
        $this->validate($request,
            [//验证规则
                'name'=>'required',
                'description'=>'required',
                'type_accumulation'=>'required',

            ],
            [//错误提示信息
                'name.required'=>'类名名不能为空',
                'description.required'=>'描述不能为空',
                'type_accumulation.required'=>'菜品编号不能为空',

            ]);


//        如果要修改菜品为默认分类那么先修改其他的分类是默认分类的为非默认分类
        if($request->is_selected==1){
            MenuCategory::where('is_selected','=','1')->update(['is_selected'=>'0']);

        }

            $data = [

                $menu_category->name=$request->name,
                $menu_category->description=$request->description,
                $menu_category->type_accumulation=$request->type_accumulation,
                $menu_category-> shop_id=$request->shop_id,

                $menu_category-> is_selected=$request->is_selected,

             ];
        $menu_category->save($data);
//        dd($aa);
        return redirect()->route('menu_category.index')->with('success','成功修改');

    }

//查看
    public function show(MenuCategory $menu_category ){

        $menu_categories =MenuCategory::find($menu_category ->id);

//      dd($aa ->name);

//    返回视图
        return view('menu_category.show',['menu_categories'=>$menu_categories]);
    }




    //删除
    public function destroy(MenuCategory $menu_category)
    {
//        dd($menu_category);
        $menus = DB::select('select * from menus where category_id = ?',[$menu_category->id]);
//dd($menus);
        if(!$menus){
            MenuCategory::destroy($menu_category->id);
            return redirect()->route('menu_category.index');
        }else{
            return back()->with('danger','该分类下有菜品了不能删除!');
        }




    }


































































}
