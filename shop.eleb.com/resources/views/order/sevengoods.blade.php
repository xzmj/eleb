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

          <th>菜品名称</th>
@for($i=0;$i>-7;$i--)
                    <th>{{date('Y-m-d', strtotime("$i days"))}}</th>

    @endfor

                </tr>
                </thead>
                <tbody>

                <tr>


                </tr>


                </tbody>
            </table>
        </div>
    </div>

    {{--<!-- 为ECharts准备一个具备大小（宽高）的Dom -->--}}
    {{--<div id="main" style="width: 600px;height:400px;"></div>--}}
    {{--<script type="text/javascript">--}}
        {{--// 基于准备好的dom，初始化echarts实例--}}
        {{--var myChart = echarts.init(document.getElementById('main'));--}}

        {{--// 指定图表的配置项和数据--}}
        {{--var option = {--}}
            {{--title: {--}}
                {{--text: '最近七天'--}}
            {{--},--}}
            {{--tooltip: {},--}}
            {{--legend: {--}}
                {{--data:['销量']--}}
            {{--},--}}
            {{--xAxis: {--}}
                {{--data: [--}}
                    {{--@for($i=0;$i>-7;$i--)--}}
                        {{--"{{date('Y-m-d', strtotime("$i days"))}}",--}}
                    {{--@endfor--}}
                {{--]--}}
            {{--},--}}
            {{--yAxis: {},--}}
            {{--series: [{--}}
                {{--name: '销量',--}}
                {{--type: 'bar',--}}
                {{--data: [  @foreach($data as $o)--}}
                    {{--"{{$o}}",--}}
                    {{--@endforeach]--}}
            {{--}]--}}
        {{--};--}}

        {{--// 使用刚指定的配置项和数据显示图表。--}}
        {{--myChart.setOption(option);--}}
    {{--</script>--}}




@endsection
