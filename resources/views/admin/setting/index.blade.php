@extends('layouts.admin')

@section('title')
    <title>Settings</title>
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
        @include('partials.content-header', ['name'=> 'Setting', 'key' => 'list'])

        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="dropdown float-right m-2">
                            <button class="btn btn-secondary dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false">
                                Add setting
                            </button>
                            <div class="dropdown-menu ">
                                <a class="dropdown-item" href="{{ route('settings.create'). '?type=Text' }}">Text</a>
                                <a class="dropdown-item" href="{{ route('settings.create'). '?type=Textarea' }}">Text area</a>

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
                                <th scope="col">actions </th>

                            </tr>
                            </thead>

                            <tbody>
                            @foreach($settings as $settingItem)
                                <tr>
                                    <th scope="row">{{ $settingItem ->id }}</th>
                                    <th scope="row">{{ $settingItem ->config_key }}</th>
                                    <th scope="row">{{ $settingItem ->config_value }}</th>

                                    <td>
                                        <a href="{{ route('settings.edit', ['id'=>$settingItem ->id. '?type=' .$settingItem ->type ] ) }}"
                                           class="btn btn-default">Sửa</a>
                                        <a href=""
                                            data-url ="{{ route('settings.delete', ['id'=>$settingItem ->id]) }}"
                                           class="btn btn-danger action_delete">Xóa</a>

                                    </td>
                                </tr>

                            @endforeach

                            </tbody>
                        </table>
                    </div>

                    <div class="col-md-12">
                        {{ $settings->links() }}
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection






