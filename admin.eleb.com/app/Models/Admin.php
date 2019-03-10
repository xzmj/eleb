<?php

namespace App\Models;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;

use Spatie\Permission\Traits\HasRoles;



class Admin extends  Authenticatable
{
    //
    use HasRoles;

    protected $guard_name = 'web'; // or whatever guard you want to use
    //
    //配置可以批量赋值的字段
    protected $table = 'admins';
    protected $fillable = ['name','id','email','password','remember_token'];
}
