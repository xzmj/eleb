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
                                <form class="form-horizontal" method="post" action="{{ route('menu.update',[$menu]) }}" enctype="multipart/form-data">


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
                                            <input id="register-username" type="text" name="goods_name" value="{{$menu->goods_name}}" required class="input-material">
                                            <label for="register-username" class="label-material">请输入菜品名称</label>
                                        </div>
                                    </div>

                                    <div class="line"></div>
                                    <label class="col-sm-3 form-control-label">菜品评分</label>
                                    <div class="col-sm-9">
                                        <div class="form-group-material">
                                            <input id="register-username" type="text" name="rating"  value="{{$menu->rating}}" required class="input-material">
                                            <label for="register-username" class="label-material">请输入菜品评分</label>
                                        </div>
                                    </div>

                                    <div class="line"></div>

                                        <label class="col-sm-3 form-control-label">所属商家id</label>
                                        <div class="col-sm-9">
                                            <input type="text" disabled="" name="shop_id" placeholder="" value="{{auth()->user()->shop_id}}" class="form-control">
                                        </div>



                                    <div class="line"></div>

                                        <label class="col-sm-3 form-control-label">所属菜品分类</label>
                                        <div class="col-sm-9">
                                            <select name="category_id" class="form-control mb-3">
                                                @foreach($menu_category as $ds)
                                                    <option value="{{$ds->id}}">{{$ds->name}} </option>
                                                @endforeach
                                            </select>

                                    </div>


                                    <div class="line"></div>
                                    <label class="col-sm-3 form-control-label">价格</label>
                                    <div class="col-sm-9">
                                        <div class="form-group-material">
                                            <input id="register-username" type="text" name="goods_price"  value="{{$menu->goods_price}}" required class="input-material">
                                            <label for="register-username" class="label-material">请输入菜品价格</label>
                                        </div>
                                    </div>

                                    <div class="line"></div>
                                    <label class="col-sm-3 form-control-label">描述</label>
                                    <div class="col-sm-9">
                                        <div class="form-group-material">
                                            <input id="register-username" type="text" name="description"  value="{{$menu->description}}" required class="input-material">
                                            <label for="register-username" class="label-material">请输入菜品描述</label>
                                        </div>
                                    </div>


                                    <div class="line"></div>
                                    <label class="col-sm-3 form-control-label">	月销量</label>
                                    <div class="col-sm-9">
                                        <div class="form-group-material">
                                            <input id="register-username" type="text" name="month_sales" value="{{$menu->month_sales}}" required class="input-material">
                                            <label for="register-username" class="label-material">请输入月销量</label>
                                        </div>
                                    </div>



                                    <div class="line"></div>
                                    <label class="col-sm-3 form-control-label">	评分数量</label>
                                    <div class="col-sm-9">
                                        <div class="form-group-material">
                                            <input id="register-username" type="text" name="rating_count" value="{{$menu->rating_count}}"  required class="input-material">
                                            <label for="register-username" class="label-material">请输入菜品价格</label>
                                        </div>
                                    </div>

                                    <div class="line"></div>
                                    <label class="col-sm-3 form-control-label">	提示信息</label>
                                    <div class="col-sm-9">
                                        <div class="form-group-material">
                                            <input id="register-username" type="text" name="tips" value="{{$menu->tips}}" required class="input-material">
                                            <label for="register-username" class="label-material">请输入菜品价格</label>
                                        </div>
                                    </div>

                                    <div class="line"></div>
                                    <label class="col-sm-3 form-control-label">	满意度数量</label>
                                    <div class="col-sm-9">
                                        <div class="form-group-material">
                                            <input id="register-username" type="text" name="satisfy_count" value="{{$menu->satisfy_count}}" required class="input-material">
                                            <label for="register-username" class="label-material">请输入菜品价格</label>
                                        </div>
                                    </div>

                                    <div class="line"></div>
                                    <label class="col-sm-3 form-control-label">	满意度评分</label>
                                    <div class="col-sm-9">
                                        <div class="form-group-material">
                                            <input id="register-username" type="text" name="satisfy_rate" value="{{$menu->satisfy_rate}}" required class="input-material">
                                            <label for="register-username" class="label-material">请输入菜品价格</label>
                                        </div>
                                    </div>

                                    <div class="line"></div>

                                        <label for="fileInput" class="col-sm-3 form-control-label">菜品图片</label>
                                        <div class="col-sm-9">
                                            <img width="70px" src="{{$menu->goods_img}}">
                                            <input id="fileInput" type="file" class="form-control-file" name="goods_img">
                                        </div>

                                    <div class="line"></div>

                                        <label class="col-sm-3 form-control-label">上架状态</label>
                                        <div class="col-sm-9">
                                            <select name="status" class="form-control mb-3">
                                                <option value="1" @if($menu->status==1)selected @endif>上架</option>
                                                <option value="0" @if($menu->status==0)selected @endif>下架</option>

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
                                    {{ method_field('patch') }}
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>



@endsection
