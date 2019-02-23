@extends('public.app')
@section('contents')









    <header class="page-header">
        <div class="container-fluid">
            <h2 class="no-margin-bottom">商家店铺</h2>
        </div>
    </header>
    <div class="card-header d-flex align-items-center">
        <h3 class="h4">商家店铺列表</h3>
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
                    <th>#</th>
                    <th>店铺名</th>
                    <th>店铺类别</th>
                    <th>图片</th>
                    <th>状态</th>
                    <th>操作</th>
                    <th></th>
                    <th>审核</th>
                </tr>
                </thead>
                <tbody>
                @foreach($shops as $shop)
                <tr>
                    <th scope="row">1</th>
                    <td>{{ $shop->shop_name}}</td>
                    <td> {{$shop->shop_category->name}} </td>
                    <td><img width="50px" src="{{ $shop->shop_img}}"> </td>
                    <td>@if($shop->status==1) 正常 @elseif($shop->status==0) 待审核  @else 禁用 @endif</td>


                    <td>
                        <a href="{{ route('shop.edit',[ $shop]) }}" class="btn btn-info">编辑</a>
                        <a href="{{ route('shop.show',[ $shop]) }}" class="btn btn-info">查看</a></td>
                       <td><form  method="post" action="{{ route('shop.destroy',[ $shop]) }}">
                               {{ csrf_field() }}
                            {{ method_field('delete') }}
                            <button style="float: left" type="submit" class="btn btn-danger">删除</button>
                        </form>
                    </td>

                    <td> <a href="{{ route('shop.start',[$shop]) }}" class="btn btn-info">启用</a>
                        <a href="{{ route('shop.down',[$shop]) }}" class="btn btn-danger">禁用</a>

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
