@extends('layouts.app')
@section('content')
<div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">Cập nhật tập phim</h3>
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
    <form method="POST" action="{{ route('Episode.update',[$Episodes->id]) }}">
        @method('PUT')
        @csrf
        <div class="card-body">
          <div class="form-group">
              <label for="exampleSelect1">Chọn phim</label>
              <select class="form-control select-movie" id="exampleSelect1" name="movie_id">
                  <option value="">--- chọn phim ---</option>
                  @foreach ($list_movie as $key => $list_mov)
                      <option value="{{ $list_mov->id }}">{{ $list_mov->title }}</option>
                  @endforeach
              </select>
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Link phim</label>
            <input type="text" name="linkphim" class="form-control" id="exampleInputPassword1" value="{{ $Episodes->linkphim }}" placeholder="...">
          </div>
          <div class="form-group">
              <label for="exampleSelect1">Tập</label>
              <select class="form-control" id="episode" name="episode">

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