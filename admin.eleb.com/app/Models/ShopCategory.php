<?php

namespace App\Models;
//use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
class ShopCategory extends Model
{
    //
    //配置可以批量赋值的字段
    protected $table = 'shop_categories';
    protected $fillable = ['name','status','img'];








}
