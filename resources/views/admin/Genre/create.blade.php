@extends('layouts.app')
@section('content')
<div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">Thêm mới thể loại phim</h3>
    </div>
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <!-- /.card-header -->
    <!-- form start -->
    <form method="POST" action="{{ route('Genre.store') }}">
        @csrf
      <div class="card-body">
        <div class="form-group">
          <label for="exampleInputEmail1">Tên thể loại</label>
          <input type="name" name="title" class="form-control" id="exampleInputEmail1" placeholder="...">
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">Mô tả</label>
          <input type="text" name="description" class="form-control" id="exampleInputPassword1" placeholder="...">
        </div>
        {{-- <div class="form-group">
          <label for="exampleInputFile">File image</label>
          <div class="input-group">
            <div class="custom-file">
              <input type="file" name="image" class="form-control-file" id="exampleInputFile">
              <label class="custom-file-label" for="exampleInputFile">Choose file</label>
            </div>
          </div>
        </div> --}}
        <div class="form-group">
          <label for="exampleSelect1">Trạng thái</label>
          <select class="form-control" id="exampleSelect1" name="status">
            <option value="1">Hiển thị</option>
            <option value="0">Không hiển thị</option>
          </select>
        </div>
      </div>
      <!-- /.card-body -->

      <div class="card-footer">
        <button type="submit" class="btn btn-primary">Thêm mới</button>
      </div>
    </form>
  </div>
@endsection