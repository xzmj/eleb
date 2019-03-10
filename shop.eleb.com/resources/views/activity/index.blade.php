@extends('public.app')
@section('contents')









    <header class="page-header">
        <div class="container-fluid">
            <h2 class="no-margin-bottom">活动</h2>
        </div>
    </header>
    <div class="card-header d-flex align-items-center">
        <h3 class="h4">活动列表</h3>
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
        <form class="form-inline" method="get" action="{{ route('activity.index') }}">



            <div class="form-group">
                <label for="inlineFormInput" class="sr-only">活动起始</label>
                <input id="inlineFormInput" name="start" type="date" placeholder="" class="mr-3 form-control">
            </div>

            <div class="form-group">
                <label for="inlineFormInputGroup" class="sr-only">结束时间</label>
                <input id="inlineFormInputGroup" name="stop" type="date" placeholder="" class="mr-3 form-control" >
            </div>

            <div class="line"></div>
            <div class="form-group">
                <label for="inlineFormInput" class="sr-only"></label>
                {{--分类下的菜品显示--}}
                <select name="statuss" class="mr-3 form-control">

                    <option value="1">正在进行的活动</option>
                    <option value="0">未开始的活动</option>
                    <option value="-1">已经过时的活动</option>
                </select>
            </div>


            <div class="line"></div>

            <div class="form-group">
                <button type="submit" class="btn btn-primary">搜索</button>
            </div>
            <div class="form-group">
                <a href="{{route('activity.index')}}" class="btn btn-primary">返回</a>
            </div>
        </form>
    </div>


    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped table-hover">
                <thead>
                <tr>

                    <th>活动名称</th>
                    <th>内容</th>
                    <th>开始时间</th>
                    <th>结束时间</th>
                    <th>操作</th>

                </tr>
                </thead>
                <tbody>
                @foreach($activities as $activity)
                <tr>

                    <td>{{ $activity->title}}</td>
                    <td>{!!$activity->content!!}</td>
                    <td>{{ $activity->start_time}}</td>
                    <td>{{ $activity->end_time}}</td>

                    <td>
                        <a href="{{ route('activity.edit',[ $activity]) }}" class="btn btn-info">编辑</a>
                        <a href="{{ route('activity.show',[ $activity]) }}" class="btn btn-info">查看</a>
                        <td>
                        <form  method="post" action="{{ route('activity.destroy',[ $activity]) }}">
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
            <div>{{ $activities->appends(['statuss'=>$statuss])->links() }}</div>
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
