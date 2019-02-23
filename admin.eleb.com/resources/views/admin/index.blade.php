@extends('public.app')
@section('contents')









    <header class="page-header">
        <div class="container-fluid">
            <h2 class="no-margin-bottom">管理员</h2>
        </div>
    </header>
    <div class="card-header d-flex align-items-center">
        <h3 class="h4">管理员列表</h3>
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
                    <th>操作</th>

                </tr>
                </thead>
                <tbody>
                @foreach($admins as $admin)
                <tr>

                    <td>{{ $admin->name}}</td>
                    <td>{{ $admin->email}}</td>

                    <td>
                        <a href="{{ route('admin.edit',[ $admin]) }}" class="btn btn-info">编辑</a>
                        <a href="{{ route('admin.show',[ $admin]) }}" class="btn btn-info">查看</a>
                        <td>
                        <form  method="post" action="{{ route('admin.destroy',[ $admin]) }}">
                            {{ csrf_field() }}
                            {{ method_field('delete') }}
                            <button type="submit" class="btn btn-danger">删除</button>
                        </form>
                        </td>
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
