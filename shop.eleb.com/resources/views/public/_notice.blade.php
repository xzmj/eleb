@foreach(['success','info','warning','danger'] as $status)
    @if(session()->has($status))
        <div class="alert alert-{{ $status }} alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            {{ session($status) }}</div>
    @endif
@endforeach



<div class="form-group row">
    <label class="col-sm-3 form-control-label"></label>
    <div class="col-sm-9 offset-sm-3">
        @if (count($errors) > 0)
            <select multiple="" class="form-control" style="color: red">

                <option> 请注意</option>
                @foreach($errors->all() as $error)
                    <option value="{{ $error }}">{{ $error }}</option>
                @endforeach
            </select>
        @endif
    </div>
</div>