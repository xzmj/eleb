<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    //
    //    //配置可以批量赋值的字段
    protected $table = 'orders';
    protected $fillable = ['user_id','shop_id','id','sn','province',
        'city','county','address','tel','name','total','status','created_at',
        'out_trade_no'

        ];
}
