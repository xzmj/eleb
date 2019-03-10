@extends('public.app')
@section('contents')









    <header class="page-header">
        <div class="container-fluid">
            <h2 class="no-margin-bottom">订单</h2>
        </div>
    </header>
    <div class="card-header d-flex align-items-center">
        <h3 class="h4">订单列表</h3>
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

                    <th>订单id</th>
                    <th>订单编号</th>
                    <th>生成时间</th>
                    <th>收件人</th>
                    <th>订单状态</th>
                    <th>订单金额</th>
                    <th>操作</th>

                </tr>
                </thead>
                <tbody>
             @foreach($orders as $order)
                <tr>
                    <td>{{$order->id}}</td>
                    <td>{{$order->sn}}</td>
                    <td>{{$order->created_at}}</td>
                    <td>{{$order->name}}</td>
                    <td>@if($order->status==0)待支付@elseif($order->status==-1)已取消
                    @elseif($order->status==1)待发货@elseif($order->status==2)待确认
                    @else完成@endif
                    </td>
                    <td>{{$order->total}}</td>


                    <td>
                        <a href="{{route('order.show',[$order])}}" class="btn btn-info">查看</a>
                        <a href="{{route('order.edit',[$order])}}" class="btn btn-info">发货</a>
                        <td>
                        <a href="{{route('order.edit2',[$order])}}" class="btn btn-danger">取消订单</a>
                        {{--<form  method="post" action="">--}}
                            {{--{{ csrf_field() }}--}}
                            {{--{{ method_field('delete') }}--}}
                            {{--<button type="submit" class="btn btn-danger">删除</button>--}}
                        {{--</form>--}}
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
