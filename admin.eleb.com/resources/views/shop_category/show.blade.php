@extends('public.app')
@section('contents')





    <header class="page-header">
        <div class="container-fluid">
            <h2 class="no-margin-bottom">商家分类</h2>
        </div>
    </header>
    <div class="card-header d-flex align-items-center">
        <h3 class="h4">分类列表</h3>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped table-hover">
                <thead>
                <tr>
                    <th>#</th>
                    <th>商家类别</th>
                    <th>图片</th>
                    <th>状态</th>
                </tr>
                </thead>
                <tbody>
                {{--@foreach($shop_categories as $shop_category)--}}
                <tr>
                    <th scope="row">1</th>
                    <td>{{ $shop_categories->name}}</td>
                    <td> <img width="60px" src="{{ $shop_categories->img}}">     </td>
                    <td>
                        @if ( $shop_categories->status===1)
                       显示
                        @else
                        隐藏
                        @endif

                                         </td>

                </tr>
{{--@endforeach--}}
                {{ csrf_field() }}
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



@endsection
