@extends('public.app')
@section('contents')





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
                                <h3 class="h4">{{$shop->shop_name}}的详情</h3>
                            </div>


{{--提交表单--}}
                            <div class="card-body">
                                <form class="form-horizontal" method="post" action="{{route('shop.update',[$shop])}}" enctype="multipart/form-data">



{{--分类--}}

                                    <div class="line"></div>
                                    <label class="col-sm-3 form-control-label">店铺名称</label>
                                    <div class="col-sm-9">
                                        <div class="form-group-material">
                                            {{$shop->shop_name}}
                                            <label for="register-username" class="label-material"></label>
                                        </div>
                                    </div>

                                    <div class="line"></div>

                                        <label for="fileInput" class="col-sm-3 form-control-label">店铺图片</label>
                                        <div class="col-sm-9">
                                            <img  width=" 80px" src="{{$shop->shop_img}}">

                                        </div></br>


                                    <div class="line"></div>
                                    <label class="col-sm-3 form-control-label">评分</label>
                                    <div class="col-sm-9">
                                        <div class="form-group-material">
                                           {{$shop->shop_rating}}
                                            <label for="register-username" class="label-material"></label>
                                        </div>
                                    </div>



                                    <div class="line"></div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 form-control-label">店铺类别</label>
                                        <div class="col-sm-9">

                                             {{$shop->shop_category->name}}

                                        </div>
                                    </div>


                                    <div class="line"></div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 form-control-label">是否品牌</label>
                                        <div class="col-sm-9">

                                              @if($shop->brand ==1) 是 @endif
                                                 @if($shop->brand ==0) 否@endif


                                        </div>
                                    </div>




                                    <div class="line"></div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 form-control-label">是否准时送达</label>
                                        <div class="col-sm-9">
                                            @if($shop->on_time ==1) 是 @endif
                                            @if($shop->on_time==0) 否@endif
                                        </div>
                                    </div>


                                    <div class="line"></div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 form-control-label">是否蜂鸟配送</label>
                                        <div class="col-sm-9">
                                            @if($shop->fengniao ==1) 是 @endif
                                            @if($shop->fengniao ==0) 否 @endif
                                        </div>
                                    </div>

                                    <div class="line"></div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 form-control-label">是否保标记</label>
                                        <div class="col-sm-9">

                                                @if($shop->bao ==1) 是 @endif
                                                @if($shop->bao ==0) 否 @endif


                                        </div>
                                    </div>


                                    <div class="line"></div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 form-control-label">是否票标记</label>
                                        <div class="col-sm-9">
                                            @if($shop->piao ==1) 是 @endif
                                            @if($shop->piao ==0) 否 @endif
                                        </div>
                                    </div>

                                    <div class="line"></div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 form-control-label">是否准标记</label>
                                        <div class="col-sm-9">
                                            @if($shop->zhun ==1) 是 @endif
                                            @if($shop->zhun ==0) 否@endif
                                        </div>
                                    </div>

                                    <div class="line"></div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 form-control-label">是否准标记</label>
                                        <div class="col-sm-9">
                                            {{$shop->start_send}}
                                        </div>
                                    </div>


                                    <div class="line"></div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 form-control-label">是否准标记</label>
                                        <div class="col-sm-9">
                                            {{$shop->send_cost}}
                                        </div>
                                    </div>




                                    <div class="line"></div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 form-control-label">是否准标记</label>
                                        <div class="col-sm-9">
                                            {{$shop->notice}}
                                        </div>
                                    </div>



                                    <div class="line"></div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 form-control-label">是否准标记</label>
                                        <div class="col-sm-9">
                                            {{$shop->discount}}
                                        </div>
                                    </div>


                                    <div class="line"></div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 form-control-label">店铺状态</label>
                                        <div class="col-sm-9">

                                              @if($shop->status ==1)正常 @endif
                                                @if($shop->status ==0) 待审核 @endif
                                                 @if($shop->status ==-1) 禁用 @endif
                                        </div>
                                    </div>



                                    {{ csrf_field() }}
                                    {{ method_field('patch')}}
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>



@endsection
