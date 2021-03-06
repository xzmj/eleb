<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
class Nav extends Model
{
    //
    //配置可以批量赋值的字段
    protected $table = 'navs';
    protected $fillable = ['name','id','permission_id','pid','url'];

    //导航菜单  权限   关系： 1对多（反向）
    public function permission(){
        return $this->belongsTo(Permission::class,'permission_id','id');
    }

}
