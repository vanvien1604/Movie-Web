@extends('layouts.app')
@section('content')
<div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">Thêm mới phim</h3>
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
    <form method="POST" action="{{ route('Movie.store') }}" enctype="multipart/form-data">
        @csrf
      <div class="card-body">
        <div class="form-group">
          <label for="exampleInputEmail1">Tên phim</label>
          <input type="name" name="title" class="form-control" id="exampleInputEmail1" placeholder="...">
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">Mô tả</label>
          <input type="text" name="description" class="form-control" id="exampleInputPassword1" placeholder="...">
        </div>
        <div class="form-group">
          <label for="exampleInputFile">File image</label>
          <div class="input-group">
            <div class="custom-file">
              <input type="file" name="image" class="form-control-file" id="exampleInputFile">
              <label class="custom-file-label" for="exampleInputFile">Choose file</label>
            </div>
          </div>
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">Số tập</label>
          <input type="text" name="sotap" class="form-control" id="exampleInputPassword1" placeholder="...">
        </div>
        <div class="form-group">
          <label for="exampleSelect1">Trạng thái</label>
          <select class="form-control" id="exampleSelect1" name="status">
            <option value="1">Hiển thị</option>
            <option value="0">Không hiển thị</option>
          </select>
        </div>
        <div class="form-group">
          <label for="exampleSelect1">Phụ đề</label>
          <select class="form-control" id="exampleSelect1" name="ngon_ngu">
            <option value="0">Vietsub</option>
            <option value="1">Thuyết minh</option>
            <option value="2">Tiếng việt</option>
          </select>
        </div>
        <div class="form-group">
            <label for="exampleSelect1">Danh mục</label>
            <select class="form-control" id="exampleSelect1" name="category_id">
              @foreach ($Category as $key => $view_dm)
                <option value="{{ $view_dm->id }}">{{ $view_dm->title }}</option>
              @endforeach
            </select>
          </div>
          <div class="form-group">
            <label for="exampleSelect1">Thể loại</label>
            <select class="form-control" id="exampleSelect1" name="genre_id">
                @foreach ($Genres as $key => $view_tl)
                <option value="{{ $view_tl->id }}">{{ $view_tl->title }}</option>
              @endforeach
            </select>
          </div>
          <div class="form-group">
            <label for="exampleSelect1">Quốc gia</label>
            <select class="form-control" id="exampleSelect1" name="country_id">
                @foreach ($Countries as $key => $view_qg)
                <option value="{{ $view_qg->id }}">{{ $view_qg->title }}</option>
              @endforeach
            </select>
          </div>
          <div class="form-group">
            <label for="exampleSelect1">Thịnh hành</label>
            <select class="form-control" id="exampleSelect1" name="phim_thinh_hanh">
              <option value="1">Có</option>
              <option value="0">Không</option>
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