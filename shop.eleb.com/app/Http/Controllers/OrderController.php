<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Menu;
use Illuminate\Support\Facades\DB;
use App\Models\OrderDetails;
class OrderController extends Controller
{
    //
    public function index(){
         $orders=Order::all();
        return view('order.index',['orders'=>$orders]);

    }

    public function show(Order $order){
        $order=Order::find($order->id);

        return view('order.show',['order'=>$order]);
 }

// 发货!
     public function edit(Order $order){
        $data=[$order->status=2,
  ];
        $order->save($data);
        return redirect()->route('order.index')->with('success','发货成功');

     }

//     取消订单!!!!

     public function edit2(Order $order){

         $data=[$order->status=-1,
         ];
         $order->save($data);
         return redirect()->route('order.index')->with('success','取消成功');
 }

//最近7天销量
     public function seven(){
        $shop_id=auth()->user()->shop_id;

         for($i=0;$i>-7;$i--){
                    $date=date('Y-m-d', strtotime("$i days"));

             $count=Order::where('shop_id','=',$shop_id)->whereDate('created_at','=',$date)->count();
//             $count=count($orders);
             $data[$date]=$count;

     }

        return view('order.seven',['data'=>$data]);
     }

//     最近三个月订单
     public  function  thirty(){
         $shop_id = auth()->user()->shop_id;
         for ($i = 0; $i >-3; $i--) {
             $date = date("Y-m",strtotime("$i month"));
             $count = Order::where('shop_id', '=', $shop_id)->where('created_at','like',"%$date%")->count();
             $data[$date] = $count;
            }
//dd($date);
         return view('order.thirty', ['data' => $data]);

     }

//     最近7天商品销量
     public function sevengoods()
     {
         $shop_id = auth()->user()->shop_id;
         $data[] = '';
//         for ($i = 0; $i > -7; $i--) {
//             $date = date('Y-m-d', strtotime("$i days"));
//             $orders = Order::where('shop_id', '=', $shop_id)->where('created_at', 'like', "%$date%");
//         }

//         $orders=DB::select('select * from orders where date_sub(CURDATE(),INTERVAL 7 DAY) <= DATE(created_at)');


         $sql = "SELECT
	DATE(orders.created_at) AS date,order_details.goods_id,order_details.goods_name,
	SUM(order_details.amount) AS total
FROM
	order_details
JOIN orders ON order_details.order_id = orders.id
WHERE
	date_sub(CURDATE(),INTERVAL 7 DAY) <= DATE(orders.created_at)
AND shop_id = $shop_id
GROUP BY
	DATE(orders.created_at),order_details.goods_id,order_details.goods_name";

         $rows = DB::select($sql);


         //构造7天统计格式
         $result = [];
         //获取当前商家的菜品列表
         $menus = Menu::where('shop_id', $shop_id)->select(['id', 'goods_name'])->get();
         $keyed = $menus->mapWithKeys(function ($item) {
             return [$item['id'] => $item['goods_name']];
         });
         $keyed2 = $menus->mapWithKeys(function ($item) {
             return [$item['id'] => 0];
         });
         $menus = $keyed->all();
         //dd($menus);
         $week = [];
         for ($i = 0; $i < 7; $i++) {
             $week[] = date('Y-m-d', strtotime("-{$i} day"));
         }
         foreach ($menus as $id => $name) {
             foreach ($week as $day) {
                 $result[$id][$day] = 0;
             }
         }
         /**/
         //dd($result);
         foreach ($rows as $row) {
             $result[$row->goods_id][$row->date] = $row->total;
         }



         $series = [];
         foreach ($result as $id => $data) {
             $serie = [
                 'name' => $menus[$id],
                 'type' => 'line',
                 'data' => array_values($data)
             ];
             $series[] = $serie;
         }

         return view('order.sevengoods',compact('result','menus','week','series'));
         return view('');
     }










































}
