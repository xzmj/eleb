<?php

namespace App\Models;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;



class Admin extends  Authenticatable
{
    //

    //
    //配置可以批量赋值的字段
    protected $table = 'admins';
    protected $fillable = ['name','id','email','password','remember_token'];
}
