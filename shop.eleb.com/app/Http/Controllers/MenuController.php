<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MenuCategory;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Models\Menu;


class MenuController extends Controller
{
    //

    public function index(Request $request,MenuCategory $menu_category){


        $keyword=$request->keyword;
        $price1=$request->price1;
        $price2=$request->price2;

        $where=[];

        if($keyword) $where[] = ['goods_name','like',"%$keyword%"];
        if($price1) $where[] = ['goods_price','>=',$price1];
        if($price2) $where[] = ['goods_price','<=',$price2];

            $menus=Menu::where($where)->where('shop_id','=',auth()->user()->shop_id)->paginate(3);
         $menu_categories=MenuCategory::all();
        return view('menu.index',['menus'=>$menus,'menu_categories'=>$menu_categories]);

    }
    public function showgoods(MenuCategory $menu_category){

//        dd($menu_category->id);
        $menu_categories=MenuCategory::all();
        $zz=MenuCategory::find($menu_category->id);
        $menus = DB::select('select * from menus where category_id = ?',[$menu_category->id]);

//        $menus=Menu::where(' category_id ','=',$menu_category->id);
//        dd($menus);

        return view('menu.showgoods',['menus'=>$menus,'menu_categories'=>$menu_categories,'zz'=>$menu_category]);
    }
    //
    public function create(){
        $menu_category=MenuCategory::all()->where('shop_id','=',auth()->user()->shop_id);
//dd($menu_category);

        return view('menu.create',['menu_category'=>$menu_category]);
    }


    public function store(Request $request){

//dd($request->goods_img);

        //数据验证，验证不通过，返回表单并提示错误信息
        $this->validate($request,
            [//验证规则
//
                'goods_img'=>'required',
            ],
            [//错误提示信息
                'name.required'=>'类名名不能为空',
//                'goods_img.image'=>'请选择正确的图片格式',
                'goods_img.required'=>'请选择图片',
//                'goods_img.max'=>'图片大小请不要超过200kb',
            ]);
//        $img=$request->file('goods_img');
////        dd($img);
//        $path=$img->store('public/menu');
// dd($path);
        $data = [
            'goods_name'=>$request->goods_name,
            'rating'=>$request->rating,
            'shop_id'=>auth()->user()->shop_id,
            'category_id'=>$request->category_id,
            'goods_price'=>$request->goods_price,
            'description'=>$request->description,
            'month_sales'=>$request->month_sales,
            'rating_count'=>$request->rating_count,
            'tips'=>$request->tips,
            'satisfy_count'=>$request->satisfy_count,
            'satisfy_rate'=>$request->satisfy_rate,
            'status'=>$request->status,

            'goods_img'=>$request->goods_img,

        ];
//        dd($data);

        Menu::create($data);
//        dd($aa);
        return redirect()->route('menu.index')->with('success','添加成功');
    }



///修改
    public function edit(Menu $menu){
        $menu_categories=MenuCategory::all()->where('shop_id','=',auth()->user()->shop_id);


        $menus=Menu::find($menu->id);
//      dd($goods->img());
        return view('menu.edit',['menu'=>$menus,'menu_category'=>$menu_categories]);
    }

//查看
    public function show(Menu $menu ){
        $menu_categories=MenuCategory::all();
        $menus =Menu::find($menu->goods_id);
//    返回视图
        return view('menu.show',['menu'=>$menus,'menu_categoriy'=>$menu_categories]);
    }




    //删除
    public function destroy(Menu $menu)
    {
//        dd($menu_category);
        Menu::destroy($menu->goods_id);

        return redirect()->route('menu.index');
    }


//保存修改

    public function update(Request $request ,Menu $menu){

//dd($request);

        //数据验证，验证不通过，返回表单并提示错误信息
        $this->validate($request,
            [//验证规则
//
                'menu_img'=>'max:200|image',
            ],
            [//错误提示信息
//                'name.required'=>'类名名不能为空',
                'menu_img.image'=>'请选择正确的图片格式',
                'menu_img.required'=>'请选择图片',
                'img.max'=>'图片大小请不要超过200kb',
            ]);

        if(!$request->goods_img){
            $data = [
                $menu->goods_name=$request->goods_name,
                $menu->rating= $request->rating,
                $menu->shop_id=auth()->user()->shop_id,
                $menu->category_id=$request->category_id,
                $menu->goods_price=$request->goods_price,
                $menu->description=$request->description,
                $menu->month_sales=$request->month_sales,
                $menu->rating_count=$request->rating_count,
                $menu->tips=$request->tips,
                $menu->satisfy_count=$request->satisfy_count,
                $menu->satisfy_rate=$request->satisfy_rate,
                $menu->status=$request->status,
         ];

            $menu->save($data);

        }else{


            $img=$request->file('goods_img');
            $path=$img->store('public/menu');

            $data = [
                $menu->goods_name=$request->goods_name,
                $menu->rating= $request->rating,
                $menu->shop_id=auth()->user()->shop_id,
                $menu->category_id=$request->category_id,
                $menu->goods_price=$request->goods_price,
                $menu->description=$request->description,
                $menu->month_sales=$request->month_sales,
                $menu->rating_count=$request->rating_count,
                $menu->tips=$request->tips,
                $menu->satisfy_count=$request->satisfy_count,
                $menu->satisfy_rate=$request->satisfy_rate,
                $menu->status=$request->status,
                $menu->goods_img=url(Storage::url($path)),
            ];

            $menu->save($data);
        }
//        dd($aa);
        return redirect()->route('menu.index')->with('success','修改成功');
    }

//    public function upload(Request $request)
//    {
//        $img = $request->file('file');
////        echo $img;
//        $path = url(Storage::url($img->store('public/menu')));
//        $path=$img->store('public/menu');
//
//        return $path;
//    }
    //接受文件上传
    public function upload(Request $request)
    {
        $img = $request->file('file');
        $path = url(Storage::url($img->store('public/menu')));
        return ['path'=>$path];
    }


}
