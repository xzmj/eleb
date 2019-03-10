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
                                <h3 class="h4">修改菜品</h3>
                            </div>


{{--提交表单--}}
                            <div class="card-body">
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
                                    <label class="col-sm-3 form-control-label">菜品名称</label>
                                    <div class="col-sm-9">
                                        <div class="form-group-material">
                                            {{$menu->goods_name}}

                                        </div>
                                    </div>

                                    <div class="line"></div>
                                    <label class="col-sm-3 form-control-label">菜品评分</label>
                                    <div class="col-sm-9">
                                        <div class="form-group-material">
                                           {{$menu->rating}}

                                        </div>
                                    </div>

                                    <div class="line"></div>

                                        <label class="col-sm-3 form-control-label">所属商家id</label>
                                        <div class="col-sm-9">
                                            {{auth()->user()->shop_id}}
                                        </div>



                                    <div class="line"></div>

                                        <label class="col-sm-3 form-control-label">所属菜品分类</label>
                                        <div class="col-sm-9">

                                                {{$menu->menu_category->name}}


                                    </div>


                                    <div class="line"></div>
                                    <label class="col-sm-3 form-control-label">价格</label>
                                    <div class="col-sm-9">
                                        <div class="form-group-material">
                                           {{$menu->goods_price}}

                                        </div>
                                    </div>

                                    <div class="line"></div>
                                    <label class="col-sm-3 form-control-label">描述</label>
                                    <div class="col-sm-9">
                                        <div class="form-group-material">
                                         {{$menu->description}}

                                        </div>
                                    </div>


                                    <div class="line"></div>
                                    <label class="col-sm-3 form-control-label">	月销量</label>
                                    <div class="col-sm-9">
                                        <div class="form-group-material">
                                          {{$menu->month_sales}}

                                        </div>
                                    </div>



                                    <div class="line"></div>
                                    <label class="col-sm-3 form-control-label">	评分数量</label>
                                    <div class="col-sm-9">
                                        <div class="form-group-material">
                                        {{$menu->rating_count}}

                                        </div>
                                    </div>

                                    <div class="line"></div>
                                    <label class="col-sm-3 form-control-label">	提示信息</label>
                                    <div class="col-sm-9">
                                        <div class="form-group-material">
                                   {{$menu->tips}}

                                        </div>
                                    </div>

                                    <div class="line"></div>
                                    <label class="col-sm-3 form-control-label">	满意度数量</label>
                                    <div class="col-sm-9">
                                        <div class="form-group-material">
                                        {{$menu->satisfy_count}}

                                        </div>
                                    </div>

                                    <div class="line"></div>
                                    <label class="col-sm-3 form-control-label">	满意度评分</label>
                                    <div class="col-sm-9">
                                        <div class="form-group-material">
                                     {{$menu->satisfy_rate}}

                                        </div>
                                    </div>

                                    <div class="line"></div>

                                        <label for="fileInput" class="col-sm-3 form-control-label">菜品图片</label>
                                        <div class="col-sm-9">
                                            <img width="70px" src="{{$menu->goods_img}}">

                                        </div>

                                    <div class="line"></div>

                                        <label class="col-sm-3 form-control-label">上架状态</label>
                                        <div class="col-sm-9">
                                            @if($menu->status==1)上架@else 下架 @endif




                                    </div>






                                    <div class="line"></div>
                                    <div class="form-group row">
                                        <div class="col-sm-4 offset-sm-3">
                                            <a href="{{route('menu.index')}}" class="btn btn-primary">返回</a>
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
