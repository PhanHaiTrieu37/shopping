@extends('layouts.admin')

@section('title')
    <title>Product</title>
@endsection

@section('css')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endsection

@section('content')
    <div class="content-wrapper">
        @include('partials.content-header', ['name'=> 'Product', 'key' => 'list'])

        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <a href="{{ route('product.create') }}" class="btn btn-success float-right">Add</a>
                    </div>
                    <div class="col-md-12">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Tên sản phẩm</th>
                                <th scope="col">Giá</th>
                                <th scope="col">Hình ảnh</th>
                                <th scope="col">Danh mục</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>

                            <tbody>
{{--                            @foreach($menus as $menu)--}}
                                <tr>
                                    <th scope="row"> 1</th>
                                    <td>iphone 15</td>
                                    <td>1.000 $</td>
                                    <td>
                                        <img src="">
                                    </td>
                                    <td>Điện thoại</td>
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






