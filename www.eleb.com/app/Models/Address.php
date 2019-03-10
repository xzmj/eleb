<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    //
    //    //配置可以批量赋值的字段
    protected $table = 'addresses';
    protected $fillable = ['name','tel','id','city','area','detail_address','provence','user_id','is_default'];

}
