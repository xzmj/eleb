<?php

namespace App\Http\Controllers;
use App\Models\ShopCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class ShopCategoryController extends Controller
{
    //
    public function index(){
$shop_categories=ShopCategory::all();
        return view('shop_category.index',['shop_categories'=>$shop_categories]);
    }



    public function create(){

        return view('shop_category.create');
    }

    public function store(Request $request)
    {
//        dd($request);
        //数据验证，验证不通过，返回表单并提示错误信息
        $this->validate($request,
            [//验证规则
                'name'=>'required',
                'status'=>'required',

                'img'=>'required|max:200|image',
            ],
            [//错误提示信息
                'name.required'=>'类名名不能为空',
                'status.required'=>'请选择状态',

                'img.image'=>'请选择正确的图片格式',
                'img.max'=>'图片大小请不要超过200kb',

            ]);

        $img=$request->file('img');
//        dd($img);
        $path=$img->store('public/shop_categories');
// dd($path);
        $data = [

            'name'=>$request->name,
            'status'=>$request->status,
            'img'=>$path,
        ];




//        dd($data);
     ShopCategory::create($data);
//        dd($aa);
        return redirect()->route('shop_category.index');

    }


//查看
    public function show(ShopCategory $shop_category ){

        $shop_categories =ShopCategory::find($shop_category ->id);

//      dd($aa ->name);

//    返回视图
        return view('shop_category.show',['shop_categories'=>$shop_categories]);
    }




    //删除
    public function destroy(ShopCategory $shop_category)
    {
//        dd($shop_category);
        ShopCategory::destroy($shop_category->id);

        return redirect()->route('shop_category.index');
    }


































































}
