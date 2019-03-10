<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderDetails extends Model
{
    //
    //配置可以批量赋值的字段
    protected $table = 'order_details';
    protected $fillable = ['id','order_id','goods_id','amount'
    ];

}
