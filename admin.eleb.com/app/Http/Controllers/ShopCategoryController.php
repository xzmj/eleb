<?php

namespace App\Http\Controllers;
use App\Models\ShopCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ShopCategoryController extends Controller
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
$shop_categories=ShopCategory::all();
        return view('shop_category.index',['shop_categories'=>$shop_categories]);
    }


//创建新的商家分类的视图
    public function create(){

        return view('shop_category.create');
    }
//修改视图

    public function edit(ShopCategory $shop_category){

$shop_category=ShopCategory::find($shop_category->id);
//dd($shop_category->status);

        return view('shop_category.edit',['shop_category'=>$shop_category]);
    }





    public function store(Request $request)
    {
//        dd($request);
        //数据验证，验证不通过，返回表单并提示错误信息
        $this->validate($request,
            [//验证规则
                'name'=>'required',
                'img'=>'required|max:200|image',
            ],
            [//错误提示信息
                'name.required'=>'类名名不能为空',
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
            'img'=>url(Storage::url($path)),
        ];
//        dd($data);
     ShopCategory::create($data);
//        dd($aa);
        return redirect()->route('shop_category.index')->with('success','添加成功');
    }

//    提交修改数据
    public function update(Request $request,ShopCategory $shop_category){
        //数据验证，验证不通过，返回表单并提示错误信息
        $this->validate($request,
            [//验证规则
                'name'=>'required',
                'img'=>'max:200|image',
            ],
            [//错误提示信息
                'name.required'=>'类名名不能为空',
                'img.image'=>'请选择正确的图片格式',
                'img.max'=>'图片大小请不要超过200kb',
            ]);
//        dd($shop_category);

//        dd($request->img);
//        判断是否上传了新的图片
        if(!$request->img){
            $data = [
                $shop_category->name=$request->name,
                $shop_category->status=$request->status,
            ];

        }else {
            $shop_category->img=$request->file('img');
            $path = $shop_category->img->store('public/shop_categories');
            $data = [
                $shop_category->name = $request->name,
                $shop_category->status = $request->status,
                $shop_category->img = url(Storage::url($path)),
            ];
        }
// dd($path);

//        dd($data);



        $shop_category->save($data);
//        dd($aa);
        return redirect()->route('shop_category.index')->with('success','成功修改');

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
