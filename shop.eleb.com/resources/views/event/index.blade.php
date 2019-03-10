@extends('public.app')
@section('contents')









    <header class="page-header">
        <div class="container-fluid">
            <h2 class="no-margin-bottom">试用活动</h2>
        </div>
    </header>
    <div class="card-header d-flex align-items-center">
        <h3 class="h4">试用活动列表</h3>
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

                    <th>试用活动名称</th>
                    {{--<th>内容</th>--}}
                    <th>开始时间</th>
                    <th>结束时间</th>
                    <th>开奖时间</th>
                    <th>报名人数限制</th>
                    <th>是否已开奖</th>
                    <th>操作</th>

                </tr>
                </thead>
                <tbody>
                @foreach($events as $event)
                <tr>

                    <td>{{ $event->title}}</td>
                    {{--<td>{!!$event->content!!}</td>--}}
                    <td>{{ $event->signup_start}}</td>
                    <td>{{ $event->signup_end}}</td>
                    <td>{{ $event->prize_date}}</td>
                    <td>{{ $event->signup_num}}</td>
                    <td>{{ $event->is_prize}}</td>


                    <td>
                        <a href="{{ route('event.edit',[ $event]) }}" class="btn btn-info">报名</a>
                        <a href="{{ route('event.show',[ $event]) }}" class="btn btn-info">查看</a>

                    </td>
                </tr>
@endforeach

                </tbody>
            </table>
            {{--<div>{{ $events->appends(['statuss'=>$statuss])->links() }}</div>--}}
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
