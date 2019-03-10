<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EventMember extends Model
{
    //
    //配置可以批量赋值的字段
    protected $table = 'event_members';
    protected $fillable = ['events_id','id','member_id'];

}
