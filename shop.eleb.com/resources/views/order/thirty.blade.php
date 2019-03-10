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

    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped table-hover">
                <thead>
                <tr>


@for($i=0;$i>-3;$i--)
                    <th>{{date('Y-m', strtotime("$i month"))}}</th>

    @endfor

                </tr>
                </thead>
                <tbody>

                <tr>
                    @foreach($data as $o)
                        <th>{{$o}}</th>
@endforeach
                </tr>


                </tbody>
            </table>
        </div>
    </div>
    {{--<!-- 为ECharts准备一个具备大小（宽高）的Dom -->--}}
    <div id="main" style="width: 600px;height:400px;"></div>
    <script type="text/javascript">
        // 基于准备好的dom，初始化echarts实例
        var myChart = echarts.init(document.getElementById('main'));

        // 指定图表的配置项和数据
        var option = {
            title: {
                text: '最近七天'
            },
            tooltip: {},
            legend: {
                data:['月份']
            },
            xAxis: {

                data: [
                @for($i=0;$i>-3;$i--)
                "{{date('Y-m', strtotime("$i month"))}}",
               @endfor
                ]
            },
            yAxis: {},
            series: [{
                name: '订单量',
                type: 'bar',
                data: [


                @foreach($data as $o)
                "{{$o}}",
                @endforeach







                ]
            }]
        };

        // 使用刚指定的配置项和数据显示图表。
        myChart.setOption(option);
    </script>
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
