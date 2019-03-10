<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
    protected $except = [
       '/api/regist','/api/loginCheck','/api/addAddress','api/editAddress','api/addCart'
        ,'/api/addorder','/api/changePassword','/api/forgetPassword','/api/order'

        //
    ];
}