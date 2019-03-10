<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    //

 protected $table ='menus';
    protected $fillable=['goods_name','rating','shop_id','category_id',
        'goods_price','description','month_sales','rating_count','tips','satisfy_count','satisfy_rate','goods_img',
        'status','goods_id','name'];



    public function menu_category()
    {
        return $this->belongsTo(MenuCategory::class,'category_id','id');

    }

}
