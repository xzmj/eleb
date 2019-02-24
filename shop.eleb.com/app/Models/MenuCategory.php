<?php

namespace App\Models;
//use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
class MenuCategory extends Model
{
    //
    //配置可以批量赋值的字段
    protected $table = 'menu_categories';
    protected $fillable = ['name','type_accumulation','shop_id','description','is_selected'];



//关联商家表
    public function shop()
    {
        return $this->belongsTo(Shop::class,'shop_id','id');

    }




}
