<?php

namespace App\Http\Controllers;

use App\Models\ShopCategory;
use App\Models\Shop;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{

//    public function index(Request $request){
//
//$Users=User::all();
//
//
//        return view('User.index',['Users'=>$Users]);
//
//    }
//    //
    public function create(){
        $shop_category=ShopCategory::all();


        return view('User.create',['shop_category'=>$shop_category]);
    }


//
    public function store(Request $request){

//dd($request);

        //数据验证，验证不通过，返回表单并提示错误信息
        $this->validate($request,
            [//验证规则
//
                'shop_img'=>'required|max:200|image',
            ],
            [//错误提示信息
//                'name.required'=>'类名名不能为空',
                'shop_img.image'=>'请选择正确的图片格式',
                'shop_img.required'=>'请选择图片',
                'img.max'=>'图片大小请不要超过200kb',
            ]);
        $img=$request->file('shop_img');
//        dd($img);
        $path=$img->store('public/shop');
// dd($path);
//        商家信息
        $data = [
            'shop_name'=>$request->shop_name,
            'brand'=>$request->brand,

            'fengniao'=>$request->fengniao,
            'on_time'=>$request->on_time,
            'bao'=>$request->bao,
            'piao'=>$request->piao,
            'brand'=>$request->brand,
            'zhun'=>$request->zhun,
            'shop_rating'=>$request->shop_rating,
            'start_send'=>$request->start_send,
            'send_cost'=>$request->send_cost,
            'notice'=>$request->notice,
            'status'=>$request->status,
            'discount'=>$request->discount,
            'shop_category_id'=>$request->shop_category_id,
            'shop_img'=>url(Storage::url($path)),

        ];
//        dd($data);
//        存入商家信息并获取id
//        Shop::create($data);

        $shop_id = DB::table('shops')->insertGetId(
           $data
        );

//        dd($shop_id);
//商家账号信息
        $shop_id=
        $data2=[
            'shop_id'=>$shop_id,
            'name'=>$request->name,
            'email'=>$request->email,
            Hash::make($request->password)

            ];
//        存入商家账号信息
        User::create($data2);


//        dd($aa);
        return redirect()->route('user.create')->with('success','添加成功');
    }



/////修改
//    public function edit(User $shop){
//        $shop_categories=ShopCategory::all();
//
//
//        $shops=User::find($shop->id);
////      dd($goods->img());
//        return view('shop.edit',['shop'=>$shops,'shop_categories'=>$shop_categories]);
//    }
//
////查看
//    public function show(User $shop ){
//        $shop_categories=ShopCategory::all();
//        $shops =User::find($shop->id);
////    返回视图
//        return view('shop.show',['shop'=>$shops,'shop_categories'=>$shop_categories]);
//    }
//
//
//
//
//    //删除
//    public function destroy(User $user)
//    {
////        dd($shop_category);
//        Shop::destroy($shop->id);
//
//        return redirect()->route('shop_category.index');
//    }
//
//
////    审核
////状态启用
//public function start(User $shop,Request $request){
////dd($shop);
////    $shops=Shop::find($shop->id);
////    dd($shop);
//    DB::update("update shops set status = 1 where id = $shop->id");
//    $shops=Shop::all();
//
//
//    return view('shop.index',['shops'=>$shops]);
//}
////状态禁用
//
//    public function down(User $shop,Request $request){
////dd($shop);
////    $shops=Shop::find($shop->id);
////    dd($shop);
//        DB::update("update shops set status = -1 where id = $shop->id");
//        $shops=Shop::all();
//
//
//        return view('shop.index',['shops'=>$shops]);
//    }
//
//
//
////保存修改
//
//    public function update(Request $request ,User $shop){
//
////dd($request);
//
//        //数据验证，验证不通过，返回表单并提示错误信息
//        $this->validate($request,
//            [//验证规则
////
//                'shop_img'=>'max:200|image',
//            ],
//            [//错误提示信息
////                'name.required'=>'类名名不能为空',
//                'shop_img.image'=>'请选择正确的图片格式',
//                'shop_img.required'=>'请选择图片',
//                'img.max'=>'图片大小请不要超过200kb',
//            ]);
//
//        if(!$request->shop_img){
//        $data = [
//            $shop->shop_name=$request->shop_name,
//            $shop->brand= $request->brand,
//            $shop->on_time=$request->on_time,
//            $shop->fengniao=$request->fengniao,
//            $shop->on_time=$request->on_time,
//            $shop->bao=$request->bao,
//            $shop->piao=$request->piao,
//           $shop->brand=$request->brand,
//           $shop->zhun=$request->zhun,
//            $shop->shop_rating=$request->shop_rating,
//            $shop->start_send=$request->start_send,
//           $shop->send_cost=$request->send_cost,
//            $shop->notice=$request->notice,
//           $shop->status=$request->status,
//            $shop->discount=$request->discount,
//            $shop->shop_category_id=$request->shop_category_id,
//           ];
//
//         $shop->save($data);
//
//            }else{
//
//            $img=$request->file('shop_img');
//            $path=$img->store('public/shop');
//
//            $data = [
//            $shop->shop_name=$request->shop_name,
//            $shop->brand= $request->brand,
//            $shop->on_time=$request->on_time,
//            $shop->fengniao=$request->fengniao,
//            $shop->on_time=$request->on_time,
//            $shop->bao=$request->bao,
//            $shop->piao=$request->piao,
//            $shop->brand=$request->brand,
//            $shop->zhun=$request->zhun,
//            $shop->shop_rating=$request->shop_rating,
//            $shop->start_send=$request->start_send,
//            $shop->send_cost=$request->send_cost,
//            $shop->notice=$request->notice,
//            $shop->status=$request->status,
//            $shop->discount=$request->discount,
//            $shop->shop_category_id=$request->shop_category_id,
//            $shop->shop_img=url(Storage::url($path)),
//            ];
//
//            $shop->save($data);
// }
////        dd($aa);
//        return redirect()->route('shop.index')->with('success','修改成功');
//    }



}
