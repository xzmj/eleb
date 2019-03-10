<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    protected $table ='activities';
    protected $fillable=['title','content','start_time','end_time',
      ];


    //
}
