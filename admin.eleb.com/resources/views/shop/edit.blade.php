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
                                <h3 class="h4">修改店铺信息</h3>
                            </div>


{{--提交表单--}}
                            <div class="card-body">
                                <form class="form-horizontal" method="post" action="{{route('shop.update',[$shop])}}" enctype="multipart/form-data">


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
{{--分类--}}

                                    <div class="line"></div>
                                    <label class="col-sm-3 form-control-label">店铺名称</label>
                                    <div class="col-sm-9">
                                        <div class="form-group-material">
                                            <input id="register-username" type="text" name="shop_name" required class="input-material" value="{{$shop->shop_name}}">
                                            <label for="register-username" class="label-material"></label>
                                        </div>
                                    </div>

                                    <div class="line"></div>

                                        <label for="fileInput" class="col-sm-3 form-control-label">店铺图片</label>
                                        <div class="col-sm-9">
                                            <img  width=" 80px" src="{{$shop->shop_img}}">
                                            <input id="fileInput" type="file" class="form-control-file" name="shop_img">
                                        </div></br>


                                    <div class="line"></div>
                                    <label class="col-sm-3 form-control-label">评分</label>
                                    <div class="col-sm-9">
                                        <div class="form-group-material">
                                            <input id="register-username" type="text" name="shop_rating" required class="input-material" value="{{$shop->shop_rating}}">
                                            <label for="register-username" class="label-material"></label>
                                        </div>
                                    </div>



                                    <div class="line"></div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 form-control-label">店铺类别</label>
                                        <div class="col-sm-9">
                                            <select name="shop_category_id" class="form-control mb-3">
                                                @foreach($shop_categories as $ds)
                                                <option value="{{$ds->id}}"  @if($shop->shop_category_id == $ds->id) selected @endif>{{$ds->name}} </option>
                                        @endforeach
                                            </select>
                                        </div>
                                    </div>


                                    <div class="line"></div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 form-control-label">是否品牌</label>
                                        <div class="col-sm-9">
                                            <select name="brand" class="form-control mb-3">
                                                <option value="1" @if($shop->brand ==1) selected @endif>是</option>
                                                <option value="0" @if($shop->brand ==0) selected @endif>否</option>

                                            </select>
                                        </div>
                                    </div>




                                    <div class="line"></div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 form-control-label">是否准时送达</label>
                                        <div class="col-sm-9">
                                            <select name="on_time" class="form-control mb-3">
                                                <option value="1" @if($shop->on_time ==1) selected @endif>是</option>
                                                <option value="0" @if($shop->on_time ==0) selected @endif>否</option>

                                            </select>
                                        </div>
                                    </div>


                                    <div class="line"></div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 form-control-label">是否蜂鸟配送</label>
                                        <div class="col-sm-9">
                                            <select name="fengniao" class="form-control mb-3">
                                                <option value="1" @if($shop->fengniao ==1) selected @endif>是</option>
                                                <option value="0" @if($shop->fengniao ==0) selected @endif>否</option>

                                            </select>
                                        </div>
                                    </div>

                                    <div class="line"></div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 form-control-label">是否保标记</label>
                                        <div class="col-sm-9">
                                            <select name="bao" class="form-control mb-3">
                                                <option value="1" @if($shop->bao ==1) selected @endif>是</option>
                                                <option value="0" @if($shop->bao ==0) selected @endif>否</option>

                                            </select>
                                        </div>
                                    </div>


                                    <div class="line"></div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 form-control-label">是否票标记</label>
                                        <div class="col-sm-9">
                                            <select name="piao" class="form-control mb-3">
                                                <option value="1" @if($shop->piao ==1) selected @endif>是</option>
                                                <option value="0" @if($shop->piao ==1) selected @endif>否</option>

                                            </select>
                                        </div>
                                    </div>

                                    <div class="line"></div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 form-control-label">是否准标记</label>
                                        <div class="col-sm-9">
                                            <select name="zhun" class="form-control mb-3">
                                                <option value="1" @if($shop->zhun ==1) selected @endif>是</option>
                                                <option value="0" @if($shop->zhun ==1) selected @endif>否</option>

                                            </select>
                                        </div>
                                    </div>

                                    <div class="line"></div>
                                    <label class="col-sm-3 form-control-label">起送金额</label>
                                    <div class="col-sm-9">
                                        <div class="form-group-material">
                                            <input id="register-username" type="text" name="start_send" required class="input-material" value="{{$shop->start_send}}">
                                            <label for="register-username" class="label-material"></label>
                                        </div>
                                    </div>



                                    <div class="line"></div>
                                    <label class="col-sm-3 form-control-label">配送费</label>
                                    <div class="col-sm-9">
                                        <div class="form-group-material">
                                            <input id="register-username" type="text" name="send_cost" required class="input-material" value="{{$shop->send_cost}}">
                                            <label for="register-username" class="label-material"></label>
                                        </div>
                                    </div>

                                    <div class="line"></div>
                                    <label class="col-sm-3 form-control-label">店公告</label>
                                    <div class="col-sm-9">
                                        <div class="form-group-material">
                                            <input id="register-username" type="text" name="notice" required class="input-material" value="{{$shop->notice}}">
                                            <label for="register-username" class="label-material"></label>
                                        </div>
                                    </div>



                                    <div class="line"></div>
                                    <label class="col-sm-3 form-control-label">优惠信息</label>
                                    <div class="col-sm-9">
                                        <div class="form-group-material">
                                            <input id="register-username" type="text" name="discount" required class="input-material" value="{{$shop->discount}}">
                                            <label for="register-username" class="label-material"></label>
                                        </div>
                                    </div>


                                    <div class="line"></div>

                                        <label class="col-sm-3 form-control-label">店铺状态</label>
                                        <div class="col-sm-9">
                                            <select name="status" class="form-control mb-3">
                                                <option value="1"  @if($shop->status ==1) selected @endif>正常</option>
                                                <option value="0"  @if($shop->status ==0) selected @endif>待审核</option>
                                                <option value="-1"  @if($shop->status ==-1) selected @endif>禁用</option>
                                            </select>

                                    </div>


                                    <div class="line"></div>
                                    <div class="form-group row">
                                        <div class="col-sm-4 offset-sm-3">
                                            <button type="submit" class="btn btn-secondary">Cancel</button>
                                            <button type="submit" class="btn btn-primary">Save changes</button>
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
