<?php

namespace App\Http\Controllers;
use App\Models\Nav;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

//    public function __construct()
//    {
//        $navs=Nav::all();
//        $topnavs=Nav::where('pid','0')->get();
//       return view('public._header',['navs'=>$navs,'topnavs'=>$topnavs]);
//
//    }

}
