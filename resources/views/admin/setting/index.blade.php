@extends('layouts.admin')

@section('title')
    <title>Settings</title>
@endsection

@section('css')

    <link href="{{ asset('admins/product/index/list.css') }}" rel="stylesheet" />
@endsection

@section('js')
    <script src="{{ asset('vendor/sweetAlert2/sweetAlert2@11.js') }}"></script>
    <script src="{{ asset('admins/product/index/list.js') }}"></script>
@endsection



@section('content')
    <div class="content-wrapper">
        @include('partials.content-header', ['name'=> 'Setting', 'key' => 'list'])

        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <a href="" class="btn btn-success float-right">Add</a>
                    </div>
                    <div class="col-md-12">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Tên sản phẩm</th>

                            </tr>
                            </thead>

                            <tbody>
{{--                            @foreach($products as $productItem)--}}
                                <tr>
                                    <th scope="row">0</th>

                                    <td>
                                        <a href=""
                                           class="btn btn-default">Sửa</a>
                                        <a href=""

                                           class="btn btn-danger action_delete">Xóa</a>

                                    </td>
                                </tr>

{{--                            @endforeach--}}

                            </tbody>
                        </table>
                    </div>

                    <div class="col-md-12">
{{--                        {{ $products->links() }}--}}
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection






