<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    //
    //配置可以批量赋值的字段
    protected $table = 'events';
    protected $fillable = ['title','id','content','signup_start','created_at','updated_at','signup_end',
        'prize_date','signup_num','is_prize'];

}
