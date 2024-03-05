
@extends('layouts.admin')

@section('title')
    <title>Trang Chu</title>
@endsection



@section('content')
    <div class="content-wrapper">
        @include('partials.content-header', ['name'=> 'Menu', 'key' => 'Edit'])

        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        <form action="{{ route('menus.update', ['id' => $menuFind->id]) }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label >Tên menu </label>
                                <input type="text"
                                       class="form-control"
                                       placeholder="Nhập tên danh mục"
                                       value="{{ $menuFind -> name }}"
                                       name="name"
                                >
                            </div>
                            <div class="form-group">
                                <label >Chọn menu mục cha</label>
                                <select class="form-control" name="parent_id" >
                                    <option value="0">Menu cha</option>
                                    {!! $optionSelectIdParent !!}
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




