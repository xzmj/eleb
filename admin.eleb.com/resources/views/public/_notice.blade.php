{{--@foreach(['success','info','warning','danger'] as $status)--}}
    {{--@if(session()->has($status))--}}
        {{--<div class="alert alert-{{ $status }} alert-dismissible" role="alert">--}}
            {{--<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>--}}
            {{--{{ session($status) }}</div>--}}
    {{--@endif--}}
{{--@endforeach--}}


<div class="line"></div>
<div class="form-group row">
    <label class="col-sm-3 form-control-label">是否显示</label>
    @foreach(['success','info','warning','danger'] as $status)
        @if(session()->has($status))
    <div class="col-sm-9">
        <select name="status" class="form-control mb-3">
            <option value="1"> {{ session($status) }}</option>


        </select>
    </div>
        @endif
    @endforeach
</div>