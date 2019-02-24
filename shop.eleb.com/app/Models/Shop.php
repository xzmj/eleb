<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    //
    protected $table ='shops';
   protected $fillable=['shop_category_id','shop_name','shop_img','shop_rating',
       'brand','on_time','fengniao','bao','piao','zhun','start_send','send_cost',
       'notice','discount','status','name','id'];



    public function shop_category()
    {
        return $this->belongsTo(ShopCategory::class);

    }


}
