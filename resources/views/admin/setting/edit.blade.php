@extends('layouts.admin')

@section('title')
    <title>Setting edit</title>
@endsection

@section('css')
    <link rel="stylesheet" href="{{asset('admins/slider/add/add.css')}}"/>
@endsection

@section('content')
    <div class="content-wrapper">
        @include('partials.content-header', ['name'=> 'Settings', 'key' => 'Edit'])

        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        <form action="{{ route('settings.update', ['id'=>$setting->id]) }}" method="post">
                            @csrf
                            <div class="col-md6">
                                <div class="form-group">
                                    <label >Config key: </label>
                                    <input type="text"
                                           class="form-control @error('config_key') is-invalid @enderror"
                                           placeholder="Nhập Config key"
                                           name="config_key"
                                           value="{{ $setting->config_key }}"
                                    >
                                    @error('config_key')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label >Config value: </label>
                                    @if(request()->type === 'Text')
                                        <input type="text"
                                               class="form-control @error('config_value') is-invalid @enderror"
                                               placeholder="Nhập Config value"
                                               name="config_value"
                                               value="{{ $setting->config_value }}"
                                        >
                                        @elseif(request()->type === 'Textarea')

                                            <textarea name="config_value" id=""
                                                      class="form-control @error('config_value') is-invalid @enderror"
                                                      rows="5"
                                                      value="{{ old('config_value') }}"
                                                      placeholder="Nhập Config value">{{ $setting->config_value }}</textarea>
                                    @endif
                                    @error('config_value')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary">Thêm</button>
                        </form>
                    </div>


                </div>
            </div>
        </div>

    </div>
@endsection




