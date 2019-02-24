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
                                <h3 class="h4">修改商品分类</h3>

                            </div>



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
                            <div class="card-body">

                                <form class="form-horizontal" method="post" action="{{route('menu_category.update',[$menu_category])}}" enctype="multipart/form-data">
                                    <div class="line"></div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 form-control-label">菜品分类名</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="name" class="form-control" value="{{$menu_category->name}}">
                                        </div>
                                    </div>
                                    <div class="line"></div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 form-control-label">菜品编号</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="type_accumulation" class="form-control" value="{{$menu_category->type_accumulation}}">
                                        </div>
                                    </div>


                                    <div class="line"></div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 form-control-label">所属商家</label>
                                        <div class="col-sm-9">
                                            <select name="shop_id" class="form-control mb-3" >
                                                @foreach ($shops as $shop)
                                                <option value="{{$shop->id}}" @if($shop->id=$menu_category->shop_id)selected @endif>{{$shop->shop_name}}</option>

                                                    @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="line"></div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 form-control-label">菜品分类描述</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="description" class="form-control" value="{{$menu_category->description}}">
                                        </div>
                                    </div>

                                    <div class="line"></div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 form-control-label">是否默认分类</label>
                                        <div class="col-sm-9">
                                            <select name="is_selected" class="form-control mb-3" >
                                                <option value="1" @if($menu_category->is_selected===1)selected @endif>是</option>
                                                <option value="0" @if($menu_category->is_selected===0)selected @endif>否</option>

                                            </select>
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
