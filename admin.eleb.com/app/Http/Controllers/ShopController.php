<?php

namespace App\Http\Controllers;

use App\Models\ShopCategory;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Models\Shop;
use App\Models\User;
use Illuminate\Http\Request;

class ShopController extends Controller
{
//页面管理
    public function __construct()
    {
        //设置中间件
        $this->middleware('auth');
    }



    public function index(Request $request){

$shops=Shop::all();


        return view('shop.index',['shops'=>$shops]);

    }
    //
    public function create(){
        $shop_category=ShopCategory::all();


        return view('shop.create',['shop_category'=>$shop_category]);
    }


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

       Shop::create($data);
//        dd($aa);
        return redirect()->route('shop_category.index')->with('success','添加成功');
    }



///修改
    public function edit(Shop $shop){
        $shop_categories=ShopCategory::all();


        $shops=Shop::find($shop->id);
//      dd($goods->img());
        return view('shop.edit',['shop'=>$shops,'shop_categories'=>$shop_categories]);
    }

//查看
    public function show(Shop $shop ){
        $shop_categories=ShopCategory::all();
        $shops =Shop::find($shop->id);
//    返回视图
        return view('shop.show',['shop'=>$shops,'shop_categories'=>$shop_categories]);
    }




    //删除
    public function destroy(Shop $shop)
    {
//        dd($shop_category);
        Shop::destroy($shop->id);

        return redirect()->route('shop.index');
    }


//    审核
//状态启用
public function start(Shop $shop,Request $request){
//dd($shop);
//    $shops=Shop::find($shop->id);
//    dd($shop);

    DB::update("update shops set status = 1 where id = $shop->id");
    $shops=Shop::all();
    $emil=User::where('shop_id','=',$shop->id)->first();

    $title = '系统通知';
    $content = '<p>
饿了吧<span style="color: red">祝贺您</span>！
你的核申已经通过了</p >';
    try{
        \Illuminate\Support\Facades\Mail::send('shop.youjian',compact('title','content'),
            function($message){


                $to='905978460@qq.com';

                $message->from(env('MAIL_USERNAME'))->to($to)->subject('亲 重要消息看这里!');
            });
    }catch (Exception $e){
        return '邮件发送失败';
//
    }


    return view('shop.index',['shops'=>$shops]);
}
//状态禁用

    public function down(Shop $shop,Request $request){
//dd($shop);
//    $shops=Shop::find($shop->id);
//    dd($shop);
        DB::update("update shops set status = -1 where id = $shop->id");
        $shops=Shop::all();


        return view('shop.index',['shops'=>$shops]);
    }



//保存修改

    public function update(Request $request ,Shop $shop){

//dd($request);

        //数据验证，验证不通过，返回表单并提示错误信息
        $this->validate($request,
            [//验证规则
//
                'shop_img'=>'max:200|image',
            ],
            [//错误提示信息
//                'name.required'=>'类名名不能为空',
                'shop_img.image'=>'请选择正确的图片格式',
                'shop_img.required'=>'请选择图片',
                'img.max'=>'图片大小请不要超过200kb',
            ]);

        if(!$request->shop_img){
        $data = [
            $shop->shop_name=$request->shop_name,
            $shop->brand= $request->brand,
            $shop->on_time=$request->on_time,
            $shop->fengniao=$request->fengniao,
            $shop->on_time=$request->on_time,
            $shop->bao=$request->bao,
            $shop->piao=$request->piao,
           $shop->brand=$request->brand,
           $shop->zhun=$request->zhun,
            $shop->shop_rating=$request->shop_rating,
            $shop->start_send=$request->start_send,
           $shop->send_cost=$request->send_cost,
            $shop->notice=$request->notice,
           $shop->status=$request->status,
            $shop->discount=$request->discount,
            $shop->shop_category_id=$request->shop_category_id,
           ];

         $shop->save($data);

            }else{

            $img=$request->file('shop_img');
            $path=$img->store('public/shop');

            $data = [
            $shop->shop_name=$request->shop_name,
            $shop->brand= $request->brand,
            $shop->on_time=$request->on_time,
            $shop->fengniao=$request->fengniao,
            $shop->on_time=$request->on_time,
            $shop->bao=$request->bao,
            $shop->piao=$request->piao,
            $shop->brand=$request->brand,
            $shop->zhun=$request->zhun,
            $shop->shop_rating=$request->shop_rating,
            $shop->start_send=$request->start_send,
            $shop->send_cost=$request->send_cost,
            $shop->notice=$request->notice,
            $shop->status=$request->status,
            $shop->discount=$request->discount,
            $shop->shop_category_id=$request->shop_category_id,
            $shop->shop_img=url(Storage::url($path)),
            ];

            $shop->save($data);
 }
//        dd($aa);
        return redirect()->route('shop.index')->with('success','修改成功');
    }



}
