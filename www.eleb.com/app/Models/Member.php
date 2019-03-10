<?php

namespace App\Models;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;

class Member extends Authenticatable
{
    //    //配置可以批量赋值的字段
        protected $table = 'members';
        protected $fillable = ['username','tel','id','password','remember_token'];
}
