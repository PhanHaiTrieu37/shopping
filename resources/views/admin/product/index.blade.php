@extends('layouts.admin')

@section('title')
    <title>Product</title>
@endsection

@section('css')

    <link href="{{ asset('admins/product/index/list.css') }}" rel="stylesheet" />
@endsection

@section('js')
    <script src="{{ asset('vendor/sweetAlert2/sweetAlert2@11.js') }}"></script>
    <script src="{{ asset('admins/delete.js') }}"></script>
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
                            @foreach($products as $productItem)
                                <tr>
                                    <th scope="row">{{ $productItem->id }}</th>
                                    <td>{{ $productItem->name }}</td>
                                    <td>{{ number_format($productItem->price) }}</td>
                                    <td>
                                        <img class="product-image-150-200" src={{ $productItem->feature_image_path }}>
                                    </td>
                                    <td>{{ optional($productItem->category)->name }}</td>
                                    <td>
                                        <a href="{{ route('product.edit', ['id' => $productItem->id]) }}"
                                           class="btn btn-default">Sửa</a>
                                        <a href=""
                                           data-url="{{ route('product.delete', ['id' => $productItem->id]) }}"
                                           class="btn btn-danger action_delete">Xóa</a>

                                    </td>
                                </tr>

                            @endforeach

                            </tbody>
                        </table>
                    </div>

                    <div class="col-md-12">
                        {{ $products->links() }}
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection






