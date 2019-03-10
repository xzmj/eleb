<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    //
    //配置可以批量赋值的字段
    protected $table = 'members';
    protected $fillable = ['username','id','password','tel','created_at','updated_at','status'];

}
