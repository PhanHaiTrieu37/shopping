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
                        <div class="dropdown float-right m-2">
                            <button class="btn btn-secondary dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false">
                                select text
                            </button>
                            <div class="dropdown-menu ">
                                <a class="dropdown-item" href="{{ route('settings.create'). '?type=Text' }}">Text</a>
                                <a class="dropdown-item" href="{{ route('settings.create'). '?type=Textarean' }}">Text arean</a>

                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Config key </th>
                                <th scope="col">Config value </th>

                            </tr>
                            </thead>

                            <tbody>
{{--                            @foreach($products as $productItem)--}}
                                <tr>
                                    <th scope="row">0</th>
                                    <th scope="row">2</th>

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






