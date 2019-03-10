<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EventPrize extends Model
{
    //
    //配置可以批量赋值的字段
    protected $table = 'event_prizes';
    protected $fillable = ['events_id','id','name','description','member_id','updated_at'
    ];


    public function event()
    {
        return $this->belongsTo(Event::class,'events_id','id');

    }
}
