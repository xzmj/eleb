<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    //
    //    //配置可以批量赋值的字段
    protected $table = 'carts';
    protected $fillable = ['user_id','goods_id','id','amount'];

}
