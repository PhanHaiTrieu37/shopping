
@extends('layouts.admin')

@section('title')
    <title>product add </title>
@endsection

@section('css')
    <link rel="stylesheet" href="{{asset('vendor/select2/select2.min.css')}}"/>
    <link rel="stylesheet" href="{{asset('admin/product/add/add.css')}}"/>
@endsection

@section('content')
    <div class="content-wrapper">
        @include('partials.content-header', ['name'=> 'Product', 'key' => 'Add'])

        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        <form action="" method="post" multiple="muti" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label >Tên sản phẩm</label>
                                <input type="text"
                                       class="form-control"
                                       placeholder="Nhập tên sản phẩm"
                                       name="name"
                                >
                            </div>


                            <div class="form-group">
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
                                <label for="1">Tags</label>
                                <select name="tags[]" class="form-control tags_select_choose" multiple="multiple">

                                </select>
                            </div>

                            <div class="form-group">
                                <label >Nhập mô tả</label>
                                <textarea class="form-control " id="my-editor-id"  rows="8"></textarea>
                            </div>

                            <button type="submit" class="btn btn-primary">Thêm</button>
                        </form>
                    </div>


                </div>
            </div>
        </div>

    </div>
@endsection

@section('js')
    <script src="{{ asset('vendor/select2/select2.min.js') }}"></script>

    <script src="{{ asset('admin/product/add/add.js') }}"></script>



@endsection




