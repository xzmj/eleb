@extends('public.app')
@section('contents')









    <header class="page-header">
        <div class="container-fluid">
            <h2 class="no-margin-bottom">饿了吧会员</h2>
        </div>
    </header>
    <div class="card-header d-flex align-items-center">
        <h3 class="h4">饿了吧会员列表</h3>
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

    {{--搜索框--}}
    <div class="card-body">
        <form class="form-inline" method="get" action="{{ route('member.index') }}">

            <div class="form-group">
                <label for="inlineFormInput" class="sr-only">keyword</label>
                <input id="inlineFormInput"  name=keyword type="text" placeholder="输入菜品名称" class="mr-3 form-control">
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-primary">搜索</button>
            </div>
            <div class="form-group">
                <a href="{{route('member.index')}}" class="btn btn-primary">返回</a>
            </div>
            {{--结束搜索框  --}}

            {{--{{ csrf_field() }}--}}
            {{--{{ method_field('get')}}--}}
        </form>
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped table-hover">
                <thead>
                <tr>

                    <th>饿了吧会员</th>
                    <th>账号状态</th>
                    <th>操作</th>

                </tr>
                </thead>
                <tbody>
                @foreach($members as $member)
                <tr>

                    <td>{{ $member->username}}</td>
                    <td>@if($member->status==0)禁用@else正常@endif</td>

                    <td>
                        <a href="{{ route('member.edit',[ $member]) }}" class="btn btn-info">@if($member->status==0)启用@else禁用@endif</a>
                        <a href="{{ route('member.show',[ $member]) }}" class="btn btn-info">查看</a>
                        <td>
                        <form  method="post" action="{{ route('member.destroy',[ $member]) }}">
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
