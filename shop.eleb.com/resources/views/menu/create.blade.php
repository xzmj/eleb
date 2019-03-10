@extends('public.app')
@section('contents')


    <!--引入CSS-->
    <link rel="stylesheet" type="text/css" href="/webuploader/webuploader.css">

    <!--引入JS-->
    <script type="text/javascript" src="/webuploader/webuploader.js/"></script>

    <!--SWF在初始化的时候指定，在后面将展示-->



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
                                <h3 class="h4">添加菜名</h3>
                            </div>


{{--提交表单--}}
                            <div class="card-body">
                                <form class="form-horizontal" method="post" action="{{ route('menu.store') }}" enctype="multipart/form-data">


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
                                            <input id="register-username" type="text" name="goods_name" required class="input-material">
                                            <label for="register-username" class="label-material">请输入菜品名称</label>
                                        </div>
                                    </div>

                                    <div class="line"></div>
                                    <label class="col-sm-3 form-control-label">菜品评分</label>
                                    <div class="col-sm-9">
                                        <div class="form-group-material">
                                            <input id="register-username" type="text" name="rating" required class="input-material">
                                            <label for="register-username" class="label-material">请输入菜品评分</label>
                                        </div>
                                    </div>

                                    <div class="line"></div>

                                        <label class="col-sm-3 form-control-label">所属商家id</label>
                                        <div class="col-sm-9">
                                            <input type="text" disabled="" name="shop_id" placeholder="{{auth()->user()->shop_id}}" value="{{auth()->user()->shop_id}}" class="form-control">
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
                                            <input id="register-username" type="text" name="goods_price" required class="input-material">
                                            <label for="register-username" class="label-material">请输入菜品价格</label>
                                        </div>
                                    </div>

                                    <div class="line"></div>
                                    <label class="col-sm-3 form-control-label">描述</label>
                                    <div class="col-sm-9">
                                        <div class="form-group-material">
                                            <input id="register-username" type="text" name="description" required class="input-material">
                                            <label for="register-username" class="label-material">请输入菜品描述</label>
                                        </div>
                                    </div>


                                    <div class="line"></div>
                                    <label class="col-sm-3 form-control-label">	月销量</label>
                                    <div class="col-sm-9">
                                        <div class="form-group-material">
                                            <input id="register-username" type="text" name="month_sales" required class="input-material">
                                            <label for="register-username" class="label-material">请输入月销量</label>
                                        </div>
                                    </div>



                                    <div class="line"></div>
                                    <label class="col-sm-3 form-control-label">	评分数量</label>
                                    <div class="col-sm-9">
                                        <div class="form-group-material">
                                            <input id="register-username" type="text" name="rating_count" required class="input-material">
                                            <label for="register-username" class="label-material">请输入菜品价格</label>
                                        </div>
                                    </div>

                                    <div class="line"></div>
                                    <label class="col-sm-3 form-control-label">	提示信息</label>
                                    <div class="col-sm-9">
                                        <div class="form-group-material">
                                            <input id="register-username" type="text" name="tips" required class="input-material">
                                            <label for="register-username" class="label-material">请输入菜品价格</label>
                                        </div>
                                    </div>

                                    <div class="line"></div>
                                    <label class="col-sm-3 form-control-label">	满意度数量</label>
                                    <div class="col-sm-9">
                                        <div class="form-group-material">
                                            <input id="register-username" type="text" name="satisfy_count" required class="input-material">
                                            <label for="register-username" class="label-material">请输入菜品价格</label>
                                        </div>
                                    </div>

                                    <div class="line"></div>
                                    <label class="col-sm-3 form-control-label">	满意度评分</label>
                                    <div class="col-sm-9">
                                        <div class="form-group-material">
                                            <input id="register-username" type="text" name="satisfy_rate" required class="input-material">
                                            <label for="register-username" class="label-material">请输入菜品价格</label>
                                        </div>
                                    </div>



                            {{--<label for="fileInput" class="col-sm-3 form-control-label">菜品图片</label>--}}
                            {{--<div class="col-sm-9">--}}
                            {{--<input id="fileInput" type="file" class="form-control-file" name="goods_img">--}}
                            {{--</div>--}}
{{--回显图片--}}
                                    {{--<div class="line"></div>--}}
                                    {{--<label class="col-sm-3 form-control-label">图片</label>--}}
                                    {{--<div class="col-sm-9">--}}
                                    {{--<input type="hidden" name="goods_img" id="img_val">--}}
                           {{--上传图片按钮     <!--dom结构部分-->--}}
                                    {{--<div id="uploader-demo">--}}
                                        {{--<!--用来存放item-->--}}
                                        {{--<div id="fileList" class="uploader-list"></div>--}}
                                        {{--<div id="filePicker">选择图片</div>--}}
                                        {{--<img width="90  px" src="" id="img" />--}}
                                    {{--</div>--}}
                                        {{--</div>--}}

                            <div class="line"></div>

                                        <label class="col-sm-3 form-control-label">上架状态</label>
                                        <div class="col-sm-9">
                                            <select name="status" class="form-control mb-3">
                                                <option value="1">上架</option>
                                                <option value="0">下架</option>

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
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>


    {{--<script>--}}
        {{--var uploader = WebUploader.create({--}}

            {{--// 选完文件后，是否自动上传。--}}
            {{--auto: true,--}}

            {{--// swf文件路径--}}
            {{--//swf: BASE_URL + '/js/Uploader.swf',--}}

            {{--// 文件接收服务端。--}}
            {{--server: '/upload',--}}

            {{--// 选择文件的按钮。可选。--}}
            {{--// 内部根据当前运行是创建，可能是input元素，也可能是flash.--}}
            {{--pick: '#filePicker',--}}

            {{--// 只允许选择图片文件。--}}
            {{--accept: {--}}
                {{--title: 'Images',--}}
                {{--extensions: 'gif,jpg,jpeg,bmp,png',--}}
                {{--mimeTypes: 'image/*'--}}
            {{--},--}}
            {{--formData:{--}}
                {{--_token:'{{csrf_token()}}'--}}
            {{--}--}}
        {{--});--}}
        {{--//监听上传成功事件--}}
        {{--uploader.on( 'uploadSuccess', function( file,response ) {--}}
            {{--// do some things.--}}
            {{--console.log(response.path);--}}
            {{--//图片回显--}}
            {{--$("#img").attr('src',response.path);--}}
            {{--//图片地址写入隐藏域--}}
            {{--$("#img_val").val(response.path);--}}
        {{--});--}}
    {{--</script>--}}
@endsection
