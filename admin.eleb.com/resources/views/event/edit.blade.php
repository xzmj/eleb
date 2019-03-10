@extends('public.app')
@section('contents')



    {{--@include('vendor.ueditor.assets')--}}

                    <!-- 背景为白色的样式-->
                    <div class="col-lg-4">
                        <div class="card">
                            <div class="card-close">
                                <div class="dropdown">
                                    <button type="button" id="closeCard4" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-ellipsis-v"></i></button>
                                    <div aria-labelledby="closeCard4" class="dropdown-menu dropdown-menu-right has-shadow"><a href="#" class="dropdown-item remove"> <i class="fa fa-times"></i>Close</a><a href="#" class="dropdown-item edit"> <i class="fa fa-gear"></i>Edit</a></div>
                                </div>
                            </div>



                                     <!-- Modal-->
                                <div id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
                                    <div role="document" class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 id="exampleModalLabel" class="modal-title">Signin Modal</h4>
                                                <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
                                            </div>
                                            <div class="modal-body">
                                                <p>Lorem ipsum dolor sit amet consectetur.</p>
                                                <form>
                                                    <div class="form-group">
                                                        <label>Email</label>
                                                        <input type="email" placeholder="Email Address" class="form-control">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Password</label>
                                                        <input type="password" placeholder="Password" class="form-control">
                                                    </div>
                                                    <div class="form-group">
                                                        <input type="submit" value="Signin" class="btn btn-primary">
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" data-dismiss="modal" class="btn btn-secondary">Close</button>
                                                <button type="button" class="btn btn-primary">Save changes</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Form Elements -->
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-close">
                                <div class="dropdown">
                                    <button type="button" id="closeCard5" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-ellipsis-v"></i></button>
                                    <div aria-labelledby="closeCard5" class="dropdown-menu dropdown-menu-right has-shadow"><a href="#" class="dropdown-item remove"> <i class="fa fa-times"></i>Close</a><a href="#" class="dropdown-item edit"> <i class="fa fa-gear"></i>Edit</a></div>
                                </div>
                            </div>


                            {{--开始--}}
                            <div class="card-header d-flex align-items-center">
                                <h3 class="h4">添加试用活动</h3>
                            </div>


{{--提交表单--}}
                            <div class="card-body">
                                {{--{{ route('event.store') }}--}}
                                <form class="form-horizontal" method="post" action="{{route('event.update',[$event])}}" enctype="multipart/form-data">
                                    {{--错误提示--}}
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

                                    <div class="line"></div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 form-control-label">试用活动名称</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="title" class="form-control" value="{{$event->title}}">
                                        </div>
                                    </div>
                                    <div class="line"></div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 form-control-label">活动内容</label>
                                        <div class="col-sm-9">
                                            <input type="textarea" name="content" class="form-control" value="{{$event->content}}">
                                        </div>
                                    </div>


                                    <div class="line"></div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 form-control-label">开始时间</label>
                                        <div class="col-sm-9">
                                            <input type="datetime" name="signup_start" class="form-control" value="{{date('Y-m-d H:i:s',$event->signup_start)}}">
                                        </div>
                                    </div>

                                    <div class="line"></div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 form-control-label">结束时间</label>
                                        <div class="col-sm-9">
                                            <input type="datetime" name="signup_end" class="form-control" value="{{date('Y-m-d H:i:s',$event->signup_end)}}">
                                        </div>
                                    </div>
                                    <div class="line"></div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 form-control-label">开奖日期</label>
                                        <div class="col-sm-9">
                                            <input type="datetime" name="prize_date" class="form-control" value="{{($event->prize_date)}}">
                                        </div>
                                    </div>
                                    <div class="line"></div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 form-control-label">报名人数限制</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="signup_num" class="form-control" value="{{$event->signup_num}}">
                                        </div>
                                    </div>

                                    <div class="line"></div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 form-control-label">是否已开奖</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="is_prize" class="form-control" value="{{$event->is_prize}}">
                                        </div>
                                    </div>

                                    <div class="line"></div>
                                    <div class="form-group row">
                                        <div class="col-sm-4 offset-sm-3">
                                            <button type="submit" class="btn btn-secondary">重置</button>
                                            <button type="submit" class="btn btn-primary">提交</button>
                                        </div>
                                    </div>
                                    {{ csrf_field() }}
                                    {{ method_field('patch') }}
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>



@endsection
