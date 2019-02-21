<?php

namespace App\Models;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
class ShopCategory extends Model
{
    //
    //配置可以批量赋值的字段
    protected $table = 'shop_categories';
    protected $fillable = ['name','status','img'];








    //获取文章图片地址
    public function img()
    {
//        return $this->img? Storage::url($this->img):'/default/54.png';
        return $this->img? Storage::url($this->img):'/default_img/54.png';
    }

}
