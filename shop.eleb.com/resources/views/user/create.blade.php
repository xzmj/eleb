@extends('public.app')
@section('contents')

    <!--引入图片上传CSS-->
    {{--<link rel="stylesheet" type="text/css" href="/public/webuploader/webuploader.css">--}}

    {{--<!--引入JS-->--}}
    {{--<script type="text/javascript" src="/public/webuploader/webuploader.js"></script>--}}

    <!--SWF在初始化的时候指定，在后面将展示-->
    {{--<script>--}}

        {{--// 初始化Web Uploader--}}
        {{--var uploader = WebUploader.create({--}}

            {{--// 选完文件后，是否自动上传。--}}
            {{--auto: true,--}}

            {{--// swf文件路径--}}
            {{--// swf: BASE_URL + '/js/Uploader.swf',--}}

            {{--// 文件接收服务端。--}}
            {{--// server: 'http://webuploader.duapp.com/server/fileupload.php',--}}

            {{--// 选择文件的按钮。可选。--}}
            {{--// 内部根据当前运行是创建，可能是input元素，也可能是flash.--}}
            {{--pick: '#filePicker',--}}

            {{--// 只允许选择图片文件。--}}
            {{--accept: {--}}
                {{--title: 'Images',--}}
                {{--extensions: 'gif,jpg,jpeg,bmp,png',--}}
                {{--mimeTypes: 'image/*'--}}
            {{--}--}}
        {{--});--}}


    {{--</script>--}}



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
                                <h3 class="h4">注册商铺</h3>
                            </div>


{{--提交表单--}}
                            <div class="card-body">
                                <form class="form-horizontal" method="post" action="{{ route('user.store') }}" enctype="multipart/form-data">


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
                                            <input id="register-username" type="text" name="shop_name" required class="input-material">
                                            <label for="register-username" class="label-material">请输入店铺名称</label>
                                        </div>
                                    </div>

                                    <div class="line"></div>

                                        <label for="fileInput" class="col-sm-3 form-control-label">店铺图片</label>
                                        <div class="col-sm-9">
                                            <input id="filePicker" type="file" class="form-control-file" name="shop_img">
                                        </div></br>
                                <!--dom结构部分-->
                                    {{--<label for="fileInput" class="col-sm-3 form-control-label">店铺图片</label>--}}
                                    {{--<div class="col-sm-9">--}}
                                    {{--<div id="uploader-demo">--}}
                                        {{--<!--用来存放item-->--}}
                                        {{--<div id="fileList" class="uploader-list"></div>--}}
                                        {{--<div id="filePicker">选择图片</div>--}}
                                    {{--</div>--}}
                                    {{--</div></br>--}}


                                    <div class="line"></div>
                                    <label class="col-sm-3 form-control-label">评分</label>
                                    <div class="col-sm-9">
                                        <div class="form-group-material">
                                            <input id="register-username" type="text" name="shop_rating" required class="input-material">
                                            <label for="register-username" class="label-material">请输入店铺评分</label>
                                        </div>
                                    </div>



                                    <div class="line"></div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 form-control-label">店铺类别</label>
                                        <div class="col-sm-9">
                                            <select name="shop_category_id" class="form-control mb-3">
                                                @foreach($shop_category as $ds)
                                                <option value="{{$ds->id}}">{{$ds->name}} </option>
                                        @endforeach
                                            </select>
                                        </div>
                                    </div>


                                    <div class="line"></div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 form-control-label">是否品牌</label>
                                        <div class="col-sm-9">
                                            <select name="brand" class="form-control mb-3">
                                                <option value="1">是</option>
                                                <option value="0">否</option>

                                            </select>
                                        </div>
                                    </div>




                                    <div class="line"></div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 form-control-label">是否准时送达</label>
                                        <div class="col-sm-9">
                                            <select name="on_time" class="form-control mb-3">
                                                <option value="1">是</option>
                                                <option value="0">否</option>

                                            </select>
                                        </div>
                                    </div>


                                    <div class="line"></div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 form-control-label">是否蜂鸟配送</label>
                                        <div class="col-sm-9">
                                            <select name="fengniao" class="form-control mb-3">
                                                <option value="1">是</option>
                                                <option value="0">否</option>

                                            </select>
                                        </div>
                                    </div>

                                    <div class="line"></div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 form-control-label">是否保标记</label>
                                        <div class="col-sm-9">
                                            <select name="bao" class="form-control mb-3">
                                                <option value="1">是</option>
                                                <option value="0">否</option>

                                            </select>
                                        </div>
                                    </div>


                                    <div class="line"></div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 form-control-label">是否票标记</label>
                                        <div class="col-sm-9">
                                            <select name="piao" class="form-control mb-3">
                                                <option value="1">是</option>
                                                <option value="0">否</option>

                                            </select>
                                        </div>
                                    </div>

                                    <div class="line"></div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 form-control-label">是否准标记</label>
                                        <div class="col-sm-9">
                                            <select name="zhun" class="form-control mb-3">
                                                <option value="1">是</option>
                                                <option value="0">否</option>

                                            </select>
                                        </div>
                                    </div>

                                    <div class="line"></div>
                                    <label class="col-sm-3 form-control-label">起送金额</label>
                                    <div class="col-sm-9">
                                        <div class="form-group-material">
                                            <input id="register-username" type="text" name="start_send" required class="input-material">
                                            <label for="register-username" class="label-material">限整数</label>
                                        </div>
                                    </div>



                                    <div class="line"></div>
                                    <label class="col-sm-3 form-control-label">配送费</label>
                                    <div class="col-sm-9">
                                        <div class="form-group-material">
                                            <input id="register-username" type="text" name="send_cost" required class="input-material">
                                            <label for="register-username" class="label-material">限小数点后一位</label>
                                        </div>
                                    </div>

                                    <div class="line"></div>
                                    <label class="col-sm-3 form-control-label">店公告</label>
                                    <div class="col-sm-9">
                                        <div class="form-group-material">
                                            <input id="register-username" type="text" name="notice" required class="input-material">
                                            <label for="register-username" class="label-material">请输入店公告</label>
                                        </div>
                                    </div>



                                    <div class="line"></div>
                                    <label class="col-sm-3 form-control-label">优惠信息</label>
                                    <div class="col-sm-9">
                                        <div class="form-group-material">
                                            <input id="register-username" type="text" name="discount" required class="input-material">
                                            <label for="register-username" class="label-material">请输入优惠信息</label>
                                        </div>
                                    </div>


                                    <div class="line"></div>

                                        <label class="col-sm-3 form-control-label">店铺状态</label>
                                        <div class="col-sm-9">
                                            <select name="status" class="form-control mb-3">

                                                <option value="0">待审核</option>

                                            </select>
                                       </div>

                                    {{--开始--}}
                                    <div class="card-header d-flex align-items-center">
                                        <h3 class="h4">注册商家账号</h3>
                                    </div>
                                    <div class="row">
                                        <label class="col-sm-3 form-control-label">请填写注册信息</label>
                                        <div class="col-sm-9">
                                            <div class="form-group-material">
                                                <input id="register-username" type="text" name="name" required class="input-material">
                                                <label for="register-username" class="label-material">账户名称</label>
                                            </div>
                                            <div class="form-group-material">
                                                <input id="register-email" type="email" name="email" required class="input-material">
                                                <label for="register-email" class="label-material">邮箱      </label>
                                            </div>
                                            <div class="form-group-material">
                                                <input id="register-password" type="password" name="password" required class="input-material">
                                                <label for="register-password" class="label-material">密码    </label>
                                            </div>
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
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>


@endsection
