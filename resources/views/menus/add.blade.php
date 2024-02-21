
@extends('layouts.admin')

@section('title')
    <title>Trang Chu</title>
@endsection



@section('content')
    <div class="content-wrapper">
        @include('partials.content-header', ['name'=> 'Menu', 'key' => 'Add'])

        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        <form action="{{ route('menus.store') }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label >Tên menu</label>
                                <input type="text"
                                       class="form-control"
                                       placeholder="Nhập tên menu"
                                       name="name"
                                >
                            </div>
                            <div class="form-group">
                                <label >Chọn menu cha</label>
                                <select class="form-control" name="parent_id" >
                                    <option value="0">Danh mục cha</option>
{{--                                    {!! $htmlOption !!}--}}
                                </select>
                            </div>

                            <button type="submit" class="btn btn-primary">Thêm</button>
                        </form>
                    </div>


                </div>
            </div>
        </div>

    </div>
@endsection




