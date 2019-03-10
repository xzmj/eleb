<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\Cart;
use App\Models\Menu;
use App\Models\Member;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Shop;
use App\Models\MenuCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Qcloud\Sms\SmsSingleSender;

class ApiController extends Controller
{
    //
//全部商家列表
    public function businessList(Request $request){
       $keyword=$request->keyword;
if($keyword){ $shop=Shop::where('shop_name','like',"%$keyword%")->get();
} else{$shop=Shop::all();

}

        return $shop;

    }
//指定一个商家的菜品列表
    public function business(Request $request)
    {
//       return $request->id;
        $shop=Shop::find($request->id);
//        dd($shop);
        //获取该店铺下的所有菜品分类
        $menu_categoyies = MenuCategory::all()->where('shop_id','=', $request->id);
//     或   $menu_categories=DB::select('select * from menu_categories where shop_id = ?',[$request->id]);

//        获取该店铺下的所有菜品
        $menu = Menu::all()->where('shop_id','=', $request->id);
        //     或    $menus=DB::select('select * from menus where shop_id = ?',[$request->id]);

//
        $arr=[ [
            "user_id"=> 12344,
            "username"=> "w******k",
            "user_img"=> "/images/slider-pic4.jpeg",
            "time"=> "2017-2-22",
            "evaluate_code"=> 1,
            "send_time"=> 30,
            "evaluate_details"=> "不怎么好吃"
        ]];
        $shop["evaluate"]=$arr;
    foreach ($menu_categoyies as $menu_categoy){
        $datas = Menu::where('category_id',$menu_categoy->id)->get();
        foreach($datas as $data){
            $data['goods_id']=$data->id;
        }
        $menu_categoy['goods_list'] = $datas;
    }

        $shop["commodity"]=$menu_categoyies;
     return $shop;
 }





//登录验证
         public function loginCheck(Request $request){

// return $request->password;exit;
             $this->validate($request,[
                 'name'=>'required',
                 'password'=>'required'
             ],
             [//错误提示信息
             'username.required'=>'姓名不能为空',
                'password.required'=>'密码不能为空',

            ]);
             if(Auth::attempt([
                     'username'=>$request->name,
                     'password'=>$request->password,
                 //密码比对成功后存入session
                 ]))

             {//账号密码正确 ，创建会话（保存当前用户的信息到session）,并返回账号信息
              return     [
                  "status"=>"true",
                "message"=>"登录成功",
                "user_id"=>auth()->user()->id,
                "username"=>auth()->user()->username];


//
//
             }else{//账号密码不正确
                 return     [
                     "status"=>"false",
                     "message"=>"登录失败"];
//
             }


         }

//         短信接口/

public function sms(Request $request){
//        实例化redis
 $redis=new \Redis();
 $redis->connect('127.0.0.1');
// 生成一个验证码
 $sms=rand(1000,9999);
// 将验证码存入redis,键名为用户输入的电话,键值为$sms
 $redis->set($request->tel,$sms);

    // 短信应用SDK AppID
    $appid = 1400189761; // 1400开头

// 短信应用SDK AppKey
    $appkey = "485c2a6355c12a8e62628b72a55e2d9c";

// 需要发送短信的手机号码
    $phoneNumbers = ["$request->tel"];


// 短信模板ID，需要在短信应用中申请
    $templateId =285158;
          // NOTE: 这里的模板ID`7839`只是一个示例，真实的模板ID需要在短信控制台中申请

    $smsSign = "李峻峰我的梦"; // NOTE: 这里的签名只是示例，请使用真实的已申请的签名，签名参数使用的是`签名内容`，而不是`签名ID`

    try {
        $ssender = new SmsSingleSender($appid, $appkey);

//        将上面自己设置的验证码赋值给$params,由云服务商给用户发送验证码短信
        $params = [$sms,5];//随机数跟短信失效时间
        $result = $ssender->sendWithParam("86", $phoneNumbers[0], $templateId,
            $params, $smsSign, "", "");  // 签名参数未提供或者为空时，会使用默认签名发送短信
        $rsp = json_decode($result);
        echo $result;
    } catch(\Exception $e) {
        echo var_dump($e);
     }
     return [
    "status"=> "true",
      "message"=> "获取短信验证码成功"];

    }

//    注册
    public function regist(Request $request){
//        dd($request);
        //数据验证，验证不通过，返回表单并提示错误信息
        $this->validate($request,
            [//验证规则
                'username'=>'required',
                'password'=>'required',

            ],
            [//错误提示信息
                'username.required'=>'用户名名不能为空',
                'password.required'=>'密码不能为空',

            ]);

        $data = [
            'username'=>$request->username,
            'tel'=>$request->tel,
            'password'=>Hash::make($request->password),
        ];

//        dd($data);
//        获取用户输入的验证码和电话
        $usersms=$request->sms;
        $tel=$request->tel;

//        实例化一个redis
        $redis=new \Redis();
        $redis->connect('127.0.0.1');
//        去读取缓存在redis中键名为tel的用户验证码sms
        $sms=$redis->get($tel);
//        判断redis中的验证码是否与用户输入的验证码一致
        if($sms==$usersms){
        Member::create($data);
//        dd($aa);
//             return '成功';
//             redirect()->route('admin.index')->with('success','添加成功');

        return [ "status"=> "true",
            "message"=> "注册成功"];}else{

            return [ "status"=> "false",
                "message"=> "注册失败"];
        }


    }



//    用户地址列表接口
    public function  addressList(Request $request){
//

        $Address=Address::all()->where('user_id','=',auth()->user()->id);

        return $Address;

    }



    public function  addAddress(Request $request){
//        return auth()->user()->id;
            //数据验证，验证不通过，返回表单并提示错误信息
            $this->validate($request,
                [//验证规则
                    'name'=>'required',
                    'tel'=>'required',
                    'provence'=>'required',
                    'city'=>'required',
                    'area'=>'required',
                    'detail_address'=>'required',

                ],
                [//错误提示信息
                    'name.required'=>'收件人不能为空',
                    'tel.required'=>'电话不能为空',
                    'provence.required'=>'省份不能为空',
                    'city.required'=>'城市不能为空',
                    'area.required'=>'县区不能为空',
                    'detail_address.required'=>'请填写详细地址',

                ]);

            $data = [
                'name'=>$request->name,
                'tel'=>$request->tel,
                'provence'=>$request->provence,
                'city'=>$request->city,
                'area'=>$request->area,
                'is_default'=>"0",
                'detail_address'=>$request->detail_address,
                'user_id'=>auth()->user()->id,
            ];
//            return $data;
//       存入新地址
           $result= Address::create($data);
//           判断存入结果
            if($result)
           {    return
                         ["status"=> "true",
                        "message"=>"添加地址成功"];
          }else{
                        ["status"=> "false",
                         "message"=>"添加失败,请注意书写格式"];

            }


    }

//指定一个地址修改的页面接口
    public function address(Request $request){
        $address=Address::find($request->id);
        return $address;
    }



    //    提交修改数据
    public function editAddress(Request $request){
        $address=Address::find($request->id);

        //数据验证，验证不通过，返回表单并提示错误信息
        $this->validate($request,
            [//验证规则
                'name'=>'required',
                'tel'=>'required',
                'provence'=>'required',
                'city'=>'required',
                'area'=>'required',
                'detail_address'=>'required',

            ],
            [//错误提示信息
                'name.required'=>'收件人不能为空',
                'tel.required'=>'电话不能为空',
                'provence.required'=>'省份不能为空',
                'city.required'=>'城市不能为空',
                'area.required'=>'县区不能为空',
                'detail_address.required'=>'请填写详细地址',

            ]);
        $data = [
            $address->name=$request->name,
            $address->tel=$request->tel,
            $address->provence=$request->provence,
            $address->city=$request->city,
            $address->area=$request->area,
            $address->is_default="0",
            $address->detail_address=$request->detail_address,
            $address->user_id=auth()->user()->id,
        ];
//        return $data;
        $result=$address->save($data);
//            判断存入结果
            if($result)
           {    return
                         ["status"=> "true",
                        "message"=>"修改地址成功"];
          }else{
                        ["status"=> "false",
                         "message"=>"修改失败,请注意书写格式"];

            }




    }

//            结算
 public function addCart(Request $request){
        $goodsCount=$request->goodsCount;
        $goodsList=$request->goodsList;
//        return $goodsList;
        //计算商品素组的元素数量
        $count=count($goodsList);
//        return $goodsList[0];

            for ($x=0;$x<$count; $x++){
          $data=[
                'goods_id'=>$goodsList[$x],
                'amount'=>$goodsCount[$x],
                'user_id'=>auth()->user()->id,
            ];
                Cart::create($data);


        }

// 添加成功返回信息
        return  ["status"=>"true",
      "message"=>"添加成功"];
 }

//购物车
public function cart(Request $request){
    $cart=Cart::where('user_id','=',auth()->user()->id)->get();
//    声明一个订单总价
    $money=0;
    foreach ($cart as $cc){
        $id = $cc->goods_id;
        $goods = Menu::find($id);
////        $goods_list
        $cc["goods_name"]=$goods->goods_name;
        $cc["goods_img"]=$goods->goods_img;
        $cc["goods_price"]=$goods->goods_price;
        $money += $goods->goods_price * $cc->amount;
    }
    $data['totalCost']=$money;

    $data['goods_list']=$cart;

    return $data;
}


//添加订单
            public function addorder(Request $request){
//        if(!auth()->user()->id){
//            return ["status"=> "false",
//                      "message"=> "请先登录",];
//        }
                 $address_id=$request->address_id;
// 读取单个地址详情
                  $address= Address::find($address_id);
//                return $address->city;
                    // $address->toArray();
                //    购物车中读取一件用户点购的商品
                     $cart=Cart::where('user_id','=',auth()->user()->id)->first();
                     $carts=Cart::where('user_id','=',auth()->user()->id)->get();
//                    return $cart;
                    $shopid=Menu::where('id',$cart->goods_id)->first();
                    $shop_id=$shopid->shop_id;
//                     读取所有用户点购的商品
                $total=0;
                      $menus=Cart::where('user_id','=',auth()->user()->id)->get();
                      foreach ($menus as $money){
                          $m=Menu::find($money->goods_id);
//                          return $m;
                          $goods_id=$money->goods_id;
                          $amount=$money->amount;
                          $goods_price=$m->goods_price;
                          $goods_name=$m->goods_name;
                          $goods_img=$m->goods_img;
                          $total += $m->goods_price * $money->amount;

                      }

        $data =[
            'user_id'=>$cart->user_id,
            'sn'=>date('Y-m-d').rand(10000,99999),
            'city'=>$address->city,
            'address'=>$address->detail_address,
            'province'=>$address->provence,
            'county'=>$address->area,
            'out_trade_no'=>rand(10000000,99999999),
            'total'=>$total,
            'name'=>$address->name,
            'tel'=>$address->tel,
            'shop_id'=>$shop_id,
            'status'=>0,];
//                      开启事务
                      DB::beginTransaction();
                      try {
//        return  $data;
                          $order = Order::create($data);

                          foreach ($menus as $mo){
                              $me=Menu::find($mo->goods_id);

                          $data2 = [
                              'order_id' => $order->id,
                              'goods_id' => $mo->goods_id,
                              'amount' => $mo->amount,
                              'goods_price' => $me->goods_price,
                              'goods_name' => $me->goods_name,
                              'goods_img' => $me->goods_img,
                          ];
//       return $data2;
   OrderDetail::create($data2);
                         }


                  DB::commit();
                               return  ["status"=> "true",
                                    "message"=> "添加成功",
                                    "order_id"=>$order->id];
                      }catch (\Exception $e){

                          DB::rollBack();
                          return  ["status"=> "true",
                              "message"=> "添加失败"];

                      }

}

//显示个人订单信息

                public function order(Request $request){
         $order_id=$request->id;
         $order=Order::find($order_id);
            $data['order_price']=$order->total;
            $data['order_status']=$order->status;
            $data['order_birth_time']=(string)$order->created_at;
            $data['shop_id']=$order->shop_id;
            $data['order_code']=$order->sn;
            $shopid=Shop::find($order->shop_id);
            $data['shop_name']=$shopid->shop_name;
            $data['shop_id']=$order->shop_id;
            $data['shop_img']=$shopid->shop_img;
            $data['order_status']=$order->status;
            $data['order_address']=$order->province.$order->city.$order->county.$order->address;
            $data['shop_img']=$shopid->shop_img;
         $goods=OrderDetail::where('order_id',$order_id)->get();
//return $goods;


               $data['goods_list']=$goods;


                    return $data;

                }



















//修改密码


public  function changePassword(Request $request){

    //数据验证，验证不通过，返回表单并提示错误信息
    $this->validate($request,
        [//验证规则
            'oldPassword'=>'required',
            'newPassword'=>'required',
        ],
        [//错误提示信息
//
            'oldPassword.required'=>'原密码不能为空',
            'newPassword.required'=>'新密码不能为空',
        ]);

    $user = Auth::user();
//        dd($admin->password);
//        将输入的old密码与session登录信息里面面的密码进行对比
    if(!Hash::check($request->oldPassword,$user->password)){
        return   [
            "status"=> "true",
      "message"=> "修改失败了呢"
    ];
    }
//        对比正确后改变为新密码
    {
        $user->update(['password'=>Hash::make($request->newPassword)]);
  return   [
        "status"=> "true",
      "message"=> "修改成功"
    ];
    }

}


//重置密码

    public function forgetPassword(Request $request){
//        dd($request);
        //数据验证，验证不通过，返回表单并提示错误信息
        $this->validate($request,
            [//验证规则
//                'username'=>'required',
                'password'=>'required',

            ],
            [//错误提示信息
//                'username.required'=>'用户名名不能为空',
                'password.required'=>'密码不能为空',

            ]);



//        dd($data);
//        获取用户输入的验证码和电话
        $usersms=$request->sms;
        $tel=$request->tel;

//        实例化一个redis
        $redis=new \Redis();
        $redis->connect('127.0.0.1');
//        去读取缓存在redis中键名为tel的用户验证码sms
        $sms=$redis->get($tel);
//        判断redis中的验证码是否与用户输入的验证码一致
        if($sms==$usersms){
//            $data = [
//                'username'=>$request->username,
//                'tel'=>$request->tel,
//                'password'=>Hash::make($request->password),
//            ];
//            return $request->tel;

            DB::table('members')
                ->where('tel', $request->tel)
                ->update(['password'=>Hash::make($request->password)]);
//        dd($aa);
//             return '成功';
//             redirect()->route('admin.index')->with('success','添加成功');

            return [ "status"=> "true",
                "message"=> "重置密码成功"];}else{

            return [ "status"=> "false",
                "message"=> "重置密码失败"];
        }


    }




























































































}
