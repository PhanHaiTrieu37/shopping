@extends('layouts.admin')

@section('title')
    <title>Trang Chu</title>
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('admins/slider/index/index.css') }}"/>
@endsection

@section('js')
    <script src="{{ asset('vendor/sweetAlert2/sweetAlert2@11.js') }}"></script>
    <script src="{{ asset('admins/delete.js') }}"></script>
@endsection

@section('content')
    <div class="content-wrapper">
        @include('partials.content-header', ['name'=> 'Slider', 'key' => 'list'])

        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <a href="{{ route("slider.create") }}" class="btn btn-success float-right">Add</a>
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
                            @foreach($sliders as $slider)
                                <tr>
                                    <th scope="row">{{ $slider->id }}</th>
                                    <td>{{ $slider->name }}</td>
                                    <td>{{ $slider->description }}</td>
                                    <td>
                                        <img class="img_slider_150_100" src="{{ $slider->image_path }}">
                                    </td>
                                    <td>
                                        <a href="{{ route('slider.edit', ['id' => $slider->id]) }}"
                                           class="btn btn-default">Sửa</a>
                                        <a href=""
                                           data-url="{{ route('slider.delete', ['id' => $slider->id]) }}"
                                           class="btn btn-danger action_delete">Xóa</a>

                                    </td>
                                </tr>

                            @endforeach

                            </tbody>
                        </table>
                    </div>

                    <div class="col-md-12">
                        {{ $sliders->links() }}
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection




