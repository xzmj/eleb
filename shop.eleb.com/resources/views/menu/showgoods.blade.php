@extends('public.app')
@section('contents')









    <header class="page-header">
        <div class="container-fluid">
            <h2 class="no-margin-bottom">店铺菜品</h2>
        </div>
    </header>
    <div class="card-header d-flex align-items-center">
        <h3 class="h4">菜品列表</h3>
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
        <form class="form-inline" method="get" action="{{ route('menu.index') }}">

            <div class="form-group">
                <label for="inlineFormInput" class="sr-only">keyword</label>
                <input id="inlineFormInput"  name=keyword type="text" placeholder="输入菜品名称" class="mr-3 form-control">
            </div>

            <div class="form-group">
                <label for="inlineFormInput" class="sr-only">起价</label>
                <input id="inlineFormInput" name="price1" type="text" placeholder="起价" class="mr-3 form-control">
            </div>

            <div class="form-group">
                <label for="inlineFormInputGroup" class="sr-only">最大价格</label>
                <input id="inlineFormInputGroup" name="price2" type="text" placeholder="最大价格" class="mr-3 form-control">
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">搜索</button>
            </div>
            <div class="form-group">
                <a href="{{route('menu.index')}}" class="btn btn-primary">返回</a>
            </div>

            {{--结束搜索框 分类下的菜品显示--}}
            <div class="input-group-prepend" style="float: right">
            <button data-toggle="dropdown" type="button" class="btn btn-outline-secondary dropdown-toggle">查看菜系 <span class="caret"></span></button>
            <div class="dropdown-menu">
                @foreach($menu_categories as $menu_category)
                <a href="{{route('showgoods.category',[$menu_category])}}" class="dropdown-item">{{$menu_category->name}}</a>
                @endforeach
            </div>
            </div>
            {{ csrf_field() }}
            {{ method_field('get')}}
            </form>
    </div>







    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped table-hover">
                <thead>
                <tr>
                    <th>#</th>
                    <th>菜名</th>
                    <th>评分</th>
                    <th>图片</th>
                    <th>状态</th>
                    <th>菜类</th>
                    <th>价格</th>
                    <th>操作 </th>
                   
                </tr>
                </thead>
                <tbody>
                @foreach($menus as $menu)
                <tr>
                    <th scope="row">1</th>
                    <td>{{ $menu->goods_name}}</td>
                    <td>{{ $menu->rating}}</td>
                    <td><img width="50px" src="{{ $menu->goods_img}}"> </td>
                    <td>@if($menu->status==1) 上架 @elseif($menu->status==0) 下架 @endif</td>
                    <td> {{$zz->name}} </td>
                    <td>{{ $menu->goods_price}}元</td>




                    <td>
                        <a href="{{ route('menu.edit',[ $menu->id]) }}" class="btn btn-info">编辑</a>
                        <a href="{{ route('menu.show',[ $menu->id]) }}" class="btn btn-info">查看</a></td>
                       <td><form  method="post" action="{{ route('menu.destroy',[ $menu->id]) }}">
                               {{ csrf_field() }}
                            {{ method_field('delete') }}
                            <button style="float: left" type="submit" class="btn btn-danger">删除</button>
                        </form>
                    </td>


                </tr>
@endforeach

                </tbody>
            </table>
{{--            <center>{{ $menus->links() }}</center>--}}
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
