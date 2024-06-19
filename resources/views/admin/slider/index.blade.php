@extends('layouts.admin')

@section('title')
    <title>Trang Chu</title>
@endsection



@section('content')
    <div class="content-wrapper">
        @include('partials.content-header', ['name'=> 'Slider', 'key' => 'list'])

        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <a href="{{ route('slider.create') }}" class="btn btn-success float-right">Add</a>
                    </div>
                    <div class="col-md-12">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Tên slider</th>
                                <th scope="col">Mô tả</th>
                                <th scope="col">Hình ảnh </th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>

                            <tbody>
{{--                            @foreach($menus as $menu)--}}
                                <tr>
                                    <th scope="row">1 </th>
                                    <td>name 1</td>
                                    <td>description</td>
                                    <td>image</td>
                                    <td>
                                        <a href=""
                                           class="btn btn-default">Sửa</a>
                                        <a href=""
                                           class="btn btn-danger">Xóa</a>

                                    </td>
                                </tr>

{{--                            @endforeach--}}

                            </tbody>
                        </table>
                    </div>

                    <div class="col-md-12">
{{--                        {{ $menus->links() }}--}}
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection




