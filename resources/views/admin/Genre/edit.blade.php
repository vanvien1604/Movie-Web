@extends('layouts.app')
@section('content')
<div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">Cập nhật thể loại phim</h3>
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
    <form method="POST" action="{{ route('Genre.update',[$Genres->id]) }}">
        @method('PUT')
        @csrf
      <div class="card-body">
        <div class="form-group">
          <label for="exampleInputEmail1">Tên thể loại</label>
          <input type="name" name="title" class="form-control" value="{{ $Genres->title }}" id="exampleInputEmail1" placeholder="...">
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">Mô tả</label>
          <input type="text" name="description" class="form-control" value="{{ $Genres->description }}" id="exampleInputPassword1" placeholder="...">
        </div>
        <div class="form-group">
          <label for="exampleSelect1">Trạng thái</label>
          <select class="form-control" id="exampleSelect1" name="status">
            <option value="1" {{ old('status', $Genres->status) == 1 ? 'selected' : '' }}>Hiển thị</option>
            <option value="0" {{ old('status', $Genres->status) == 0 ? 'selected' : '' }}>Không hiển thị</option>
          </select>
        </div>
      </div>
      <!-- /.card-body -->

      <div class="card-footer">
        <button type="submit" class="btn btn-primary">Cập nhật</button>
      </div>
    </form>
  </div>
@endsection