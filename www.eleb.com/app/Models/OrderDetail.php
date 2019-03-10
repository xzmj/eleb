<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    //
    //    //配置可以批量赋值的字段
    protected $table = 'order_details';
    protected $fillable = ['order_id','goods_id','id','amount','goods_name','goods_img','goods_price'];

}
