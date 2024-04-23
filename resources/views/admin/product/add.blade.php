
@extends('layouts.admin')

@section('title')
    <title xmlns="">product add </title>
@endsection

@section('css')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

{{--    <link rel="stylesheet" href="{{asset('vendor/select2/select2.min.css ')}}"/>--}}
    <link rel="stylesheet" href="{{asset('admins/product/add/add.css')}}"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/4.0.13/css/froala_editor.pkgd.min.css">
@endsection

@section('content')
    <div class="content-wrapper">
        @include('partials.content-header', ['name'=> 'Product', 'key' => 'Add'])

        <form action="{{ route('product.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md6">
                            <div class="form-group">
                                <label >Tên sản phẩm</label>
                                <input type="text"
                                       class="form-control"
                                       placeholder="Nhập tên sản phẩm"
                                       name="name"
                                >
                            </div>

                            <div class="form-group">--}}
                                <label >Giá sản phẩm</label>
                                <input type="text"
                                       class="form-control"
                                       placeholder="Nhập giá sản phẩm"
                                       name="price"
                                >
                            </div>

                            <div class="form-group">
                                <label >Ảnh đại diện</label>
                                <input type="file"
                                       class="form-control-file"
                                       placeholder="chọn ảnh đại diện"
                                       name="feature_path_img"
                                >
                            </div>

                            <div class="form-group">
                                <label >Ảnh chi tiết</label>
                                <input type="file"
                                       multiple
                                       class="form-control-file"
                                       name="image_path[]"
                                >
                            </div>

                            <div class="form-group">
                                <label >Chọn danh mục </label>
                                <select class="form-control select_init" name="parent_id" >
                                    <option value="0">Danh mục cha</option>
                                    {!! $htmlOption !!}
                                </select>
                            </div>

                            <div class="form-group">
                                <label >Nhập tags cho sản phẩm</label>
                                <select name="tags[]" class="form-control tags_select_choose" multiple="multiple">

                                </select>
                            </div>
                        </div>

                        <div class="form-group">

                            <label>Description:</label>
                            <textarea
                                id="description" name="description" class="form-control" rows="8"
                                placeholder="description" required>{{ isset($post) ? $post->description : ''}}
                                    </textarea>

                            <div class="invalid-tooltip">This field is required</div>
                        </div>

                    </div>
                </div>
            </div>



            <button type="submit" class="btn btn-primary">Thêm</button>
        </form>


{{--        <form action="{{ route('product.store') }}" method="post" enctype="multipart/form-data">--}}
{{--            @csrf--}}
{{--            <div class="content">--}}
{{--                <div class="container-fluid">--}}
{{--                    <div class="row">--}}
{{--                        <div class="col-md-6">--}}

{{--                            <div class="form-group">--}}
{{--                                <label >Tên sản phẩm</label>--}}
{{--                                <input type="text"--}}
{{--                                       class="form-control"--}}
{{--                                       placeholder="Nhập tên sản phẩm"--}}
{{--                                       name="name"--}}
{{--                                >--}}
{{--                            </div>--}}


{{--                            <div class="form-group">--}}
{{--                                <label >Giá sản phẩm</label>--}}
{{--                                <input type="text"--}}
{{--                                       class="form-control"--}}
{{--                                       placeholder="Nhập giá sản phẩm"--}}
{{--                                       name="price"--}}
{{--                                >--}}
{{--                            </div>--}}

{{--                            <div class="form-group">--}}
{{--                                <label >Ảnh đại diện</label>--}}
{{--                                <input type="file"--}}
{{--                                       class="form-control-file"--}}
{{--                                       placeholder="chọn ảnh đại diện"--}}
{{--                                       name="feature_path_img"--}}
{{--                                >--}}
{{--                            </div>--}}

{{--                            <div class="form-group">--}}
{{--                                <label >Ảnh chi tiết</label>--}}
{{--                                <input type="file"--}}
{{--                                       multiple--}}
{{--                                       class="form-control-file"--}}
{{--                                       name="image_path[]"--}}
{{--                                >--}}
{{--                            </div>--}}

{{--                            <div class="form-group">--}}
{{--                                <label >Chọn danh mục </label>--}}
{{--                                <select class="form-control select_init" name="parent_id" >--}}
{{--                                    <option value="0">Danh mục cha</option>--}}
{{--                                    {!! $htmlOption !!}--}}
{{--                                </select>--}}
{{--                            </div>--}}

{{--                            <div class="form-group">--}}
{{--                                <label >Nhập tags cho sản phẩm</label>--}}
{{--                                <select name="tags[]" class="form-control tags_select_choose" multiple="multiple">--}}

{{--                                </select>--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                        <div class="form-group">--}}

{{--                            <label>Description:</label>--}}
{{--                            <textarea--}}

{{--                                id="description" name="description" class="form-control" rows="8"--}}
{{--                                placeholder="description" required>{{ isset($post) ? $post->description : ''}}--}}
{{--                                    </textarea>--}}

{{--                            <div class="invalid-tooltip">This field is required</div>--}}
{{--                        </div>--}}

{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}

{{--            <button type="submit" class="btn btn-primary">Thêm </button>--}}
{{--        </form>--}}
    </div>
@endsection

@section('js')
{{--    <script src="{{ asset('vendor/select2/select2.min.js') }}"></script>--}}
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="{{ asset('admins/product/add/add.js ') }}"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/4.0.13/js/froala_editor.pkgd.min.js"></script>

    <script>
        $(".tags_select_choose").select2({
            tags: true,
            tokenSeparators: [',', ' ']
        })
    </script>
@endsection




