
@extends('layouts.admin')

@section('title')
    <title xmlns="">product add </title>
@endsection

@section('css')

    <link rel="stylesheet" href="{{asset('vendor/select2/select2.min.css ')}}"/>
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
                                       name="feature_image_path"
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
                                <select class="form-control select_init" name="category_id" >
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

                        <textarea name="contents" class="form-control my-editor"></textarea>

                    </div>
                </div>
            </div>



            <button type="submit" class="btn btn-primary">Thêm</button>
        </form>
    </div>
@endsection

@section('js')
    <script src="{{ asset('vendor/select2/select2.min.js') }}" defer></script>
    <script src="{{ asset('adminlte/plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.js') }}"></script>
    <script src="{{ asset('admins/product/add/add.js ') }}"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/4.0.13/js/froala_editor.pkgd.min.js"></script>


<script src="https://cdn.tiny.cloud/1/2ask8mc9i8f77tashz218gbd2gubr1ikn97t6tp8dpatwr5f/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>

<script>
    var editor_config = {
        path_absolute : "/",
        selector: 'textarea.my-editor',
        height: 350,
        relative_urls: false,
        plugins: [
            "advlist autolink lists link image charmap print preview hr anchor pagebreak",
            "searchreplace wordcount visualblocks visualchars code fullscreen",
            "insertdatetime media nonbreaking save table directionality",
            "emoticons template paste textpattern"
        ],
        toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media",
        file_picker_callback : function(callback, value, meta) {
            var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
            var y = window.innerHeight|| document.documentElement.clientHeight|| document.getElementsByTagName('body')[0].clientHeight;

            var cmsURL = editor_config.path_absolute + 'laravel-filemanager?editor=' + meta.fieldname;
            if (meta.filetype == 'image') {
                cmsURL = cmsURL + "&type=Images";
            } else {
                cmsURL = cmsURL + "&type=Files";
            }

            tinyMCE.activeEditor.windowManager.openUrl({
                url : cmsURL,
                title : 'Filemanager',
                width : x * 0.8,
                height : y * 0.8,
                resizable : "yes",
                close_previous : "no",
                onMessage: (api, message) => {
                    callback(message.content);
                }
            });
        }
    };

    tinymce.init(editor_config);
</script>
@endsection




