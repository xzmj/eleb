@extends('public.app')
@section('contents')









    <header class="page-header">
        <div class="container-fluid">
            <h2 class="no-margin-bottom">商户账号</h2>
        </div>
    </header>
    <div class="card-header d-flex align-items-center">
        <h3 class="h4">商户账号列表</h3>
    </div>


    <div>
    @foreach(['success','info','warning','danger'] as $status)
        @if(session()->has($status))
            <div class="alert alert-{{ $status }} alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                {{ session($status) }}</div>
        @endif
    @endforeach
    </div>



    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped table-hover">
                <thead>
                <tr>

                    <th>管理员</th>
                    <th>邮箱</th>
                    <th>所属店铺</th>
                    <th>状态</th>
                    <th>操作</th>
                    <th></th>
                    <th>权限</th>

                </tr>
                </thead>
                <tbody>
                @foreach($users as $user)
                <tr>

                    <td>{{ $user->name}}</td>
                    <td>{{ $user->email}}</td>
                    <td>{{ $user->shop->shop_name}}</td>
                    <td>@if($user->status===1) 启用 @else 禁用 @endif</td>

                    <td>
                        <a href="{{ route('user.edit',[ $user]) }}" class="btn btn-info">编辑</a>
                        <a href="{{ route('user.show',[ $user]) }}" class="btn btn-info">查看</a>
                        <td>
                        <form  method="post" action="{{ route('user.destroy',[ $user]) }}">
                            {{ csrf_field() }}
                            {{ method_field('delete') }}
                            <button type="submit" class="btn btn-danger">删除</button>
                        </form>
                        </td>
                    <td> <a href="{{route('user.start',[ $user])}}" class="btn btn-info">启用</a>
                        <a href="{{route('user.down',[ $user])}}" class="btn btn-danger">禁用</a></td>
                    </td>
                </tr>
@endforeach

                </tbody>
            </table>
        </div>
    </div>
    </div>
    </div>
    <div class="col-lg-6">
        <div class="card">
            <div class="card-close">
                <div class="dropdown">
                    <button type="button" id="closeCard4" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-ellipsis-v"></i></button>
                    <div aria-labelledby="closeCard4" class="dropdown-menu dropdown-menu-right has-shadow"><a href="#" class="dropdown-item remove"> <i class="fa fa-times"></i>Close</a><a href="#" class="dropdown-item edit"> <i class="fa fa-gear"></i>Edit</a></div>
                </div>
            </div>
        </div>
    </div>


@endsection
