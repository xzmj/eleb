<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Bootstrap Material Admin by Bootstrapious.com</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="robots" content="all,follow">
    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="/moban/vendor/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome CSS-->
    <link rel="stylesheet" href="vendor/font-awesome/css/font-awesome.min.css">
    <!-- Fontastic Custom icon font-->
    <link rel="stylesheet" href="/moban/css/fontastic.css">
    <!-- Google fonts - Poppins -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,700">
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="/moban/css/style.default.css" id="theme-stylesheet">
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="/moban/css/custom.css">
    <!-- Favicon-->
    <link rel="shortcut icon" href="/moban/img/favicon.ico">
    <!-- Tweaks for older IEs--><!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
  </head>
  <body>
    <div class="page login-page">
      <div class="container d-flex align-items-center">
        <div class="form-holder has-shadow">
          <div class="row">
            <!-- Logo & Information Panel-->
            <div class="col-lg-6">
              <div class="info d-flex align-items-center">
                <div class="content">
                  <div class="logo">
                    <h1> 饣 我 了 口 巴</h1>
                  </div>
                  <p>看你都饿的眼花了</p>
                </div>
              </div>
            </div>
            <!-- Form Panel    -->
            <div class="col-lg-6 bg-white">
              <div class="form d-flex align-items-center">
                <div class="content">
                  <form method="post" class="form-validate" action="{{ route('login') }}">
                    <div class="form-group">
                      <input id="login-username" type="text" name="name" required data-msg="Please enter your username" class="input-material">
                      <label for="login-username" class="label-material">管理员</label>
                    </div>
                    <div class="form-group">
                      <input id="login-password" type="password" name="password" required data-msg="Please enter your password" class="input-material">
                      <label for="login-password" class="label-material">密码</label>
                    </div><input type="submit" class="btn btn-infor">
                    <input type="checkbox" name="rememberMe">rememberMe
                  {{ csrf_field() }}
{{--错误提示--}}
                    @foreach(['success','info','warning','danger'] as $status)
                      @if(session()->has($status))
                        <div class="alert alert-{{ $status }} alert-dismissible" role="alert">
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                          {{ session($status) }}</div>
                    @endif
                  @endforeach

                    <!-- This should be submit button but I replaced it with <a> for demo purposes-->
                  </form><a href="#" class="forgot-pass">忘记密码点这里</a><br><small>想加入我们吗 </small><a href="register.html" class="signup">注册</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="copyrights text-center">
        <p>Design by <a href="#" class="external">Bootstrapious</a>
          <!-- Please do not remove the backlink to us unless you support further theme's development at https://bootstrapious.com/donate. It is part of the license conditions. Thank you for understanding :)-->
        </p>
      </div>
    </div>
    <!-- JavaScript files-->
    <script src="/moban/vendor/jquery/jquery.min.js"></script>
    <script src="/moban/vendor/popper.js/umd/popper.min.js"> </script>
    <script src="/moban/vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="/moban/vendor/jquery.cookie/jquery.cookie.js"> </script>
    <script src="/moban/vendor/chart.js/Chart.min.js"></script>
    <script src="/moban/vendor/jquery-validation/jquery.validate.min.js"></script>
    <!-- Main File-->
    <script src="/moban/js/front.js"></script>
  </body>
</html>