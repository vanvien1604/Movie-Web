@extends('layouts.app')
@section('content')
<div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">Cập nhật phim</h3>
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
    <form method="POST" action="{{ route('Movie.update', [$Movies->id]) }}" enctype="multipart/form-data">
        @method('PUT')
        @csrf
      <div class="card-body">
        <div class="form-group">
          <label for="title">Tên phim</label>
          <input type="text" name="title" class="form-control" id="title" value="{{ old('title', $Movies->title) }}" placeholder="...">
        </div>
        <div class="form-group">
          <label for="description">Mô tả</label>
          <input type="text" name="description" class="form-control" id="description" value="{{ old('description', $Movies->description) }}" placeholder="...">
        </div>
        <div class="form-group">
          <label for="image">File image</label>
          <div class="input-group">
            <div class="custom-file">
              <input type="file" name="image" class="form-control-file" id="image">
              <label class="custom-file-label" for="image">Choose file</label>
            </div>
            <img height="80px" width="80px" src="{{ asset('backend/uploads/Movies/'.$Movies->image) }}" alt="">
          </div>
        </div>
        <div class="form-group">
          <label for="sotap">Số tập</label>
          <input type="text" name="sotap" class="form-control" id="sotap" value="{{ old('sotap', $Movies->sotap) }}" placeholder="...">
        </div>
        <div class="form-group">
          <label for="chatluong">Đồ họa</label>
          <select class="form-control" id="chatluong" name="chatluong">
            <option value="0" {{ old('chatluong', $Movies->chatluong) == '0' ? 'selected' : '' }}>HD</option>
            <option value="1" {{ old('chatluong', $Movies->chatluong) == '1' ? 'selected' : '' }}>FullHD</option>
            <option value="2" {{ old('chatluong', $Movies->chatluong) == '2' ? 'selected' : '' }}>HDCam</option>
            <option value="3" {{ old('chatluong', $Movies->chatluong) == '3' ? 'selected' : '' }}>Cam</option>
            <option value="4" {{ old('chatluong', $Movies->chatluong) == '4' ? 'selected' : '' }}>SD</option>
          </select>
        </div>
        <div class="form-group">
          <label for="ngon_ngu">Phụ đề</label>
          <select class="form-control" id="ngon_ngu" name="ngon_ngu">
            <option value="0" {{ old('ngon_ngu', $Movies->ngon_ngu) == '0' ? 'selected' : '' }}>Vietsub</option>
            <option value="1" {{ old('ngon_ngu', $Movies->ngon_ngu) == '1' ? 'selected' : '' }}>Thuyết minh</option>
            <option value="2" {{ old('ngon_ngu', $Movies->ngon_ngu) == '2' ? 'selected' : '' }}>Tiếng việt</option>
          </select>
        </div>
        <div class="form-group">
          <label for="thuocphim">Thuộc phim</label>
          <select class="form-control" id="thuocphim" name="thuocphim">
            <option value="phimbo" {{ old('thuocphim', $Movies->thuocphim) == 'phimbo' ? 'selected' : '' }}>Phim bộ</option>
            <option value="phimle" {{ old('thuocphim', $Movies->thuocphim) == 'phimle' ? 'selected' : '' }}>Phim lẻ</option>
          </select>
        </div>
        <div class="form-group">
          <label for="status">Trạng thái</label>
          <select class="form-control" id="status" name="status">
            <option value="1" {{ old('status', $Movies->status) == '1' ? 'selected' : '' }}>Hiển thị</option>
            <option value="0" {{ old('status', $Movies->status) == '0' ? 'selected' : '' }}>Không hiển thị</option>
          </select>
        </div>
        <div class="form-group">
            <label for="category_id">Danh mục</label>
            <select class="form-control" id="category_id" name="category_id">
              @foreach ($Category as $key => $view_dm)
                <option value="{{ $view_dm->id }}" {{ old('category_id', $Movies->category_id) == $view_dm->id ? 'selected' : '' }}>{{ $view_dm->title }}</option>
              @endforeach
            </select>
          </div>
          <div class="form-group">
            <label for="genre_id">Thể loại</label>
            <select class="form-control" id="genre_id" name="genre_id">
                @foreach ($Genres as $key => $view_tl)
                <option value="{{ $view_tl->id }}" {{ old('genre_id', $Movies->genre_id) == $view_tl->id ? 'selected' : '' }}>{{ $view_tl->title }}</option>
              @endforeach
            </select>
          </div>
          <div class="form-group">
            <label for="country_id">Quốc gia</label>
            <select class="form-control" id="country_id" name="country_id">
                @foreach ($Countries as $key => $view_qg)
                <option value="{{ $view_qg->id }}" {{ old('country_id', $Movies->country_id) == $view_qg->id ? 'selected' : '' }}>{{ $view_qg->title }}</option>
              @endforeach
            </select>
          </div>
          <div class="form-group">
            <label for="phim_thinh_hanh">Thịnh hành</label>
            <select class="form-control" id="phim_thinh_hanh" name="phim_thinh_hanh">
              <option value="1" {{ old('phim_thinh_hanh', $Movies->phim_thinh_hanh) == '1' ? 'selected' : '' }}>Có</option>
              <option value="0" {{ old('phim_thinh_hanh', $Movies->phim_thinh_hanh) == '0' ? 'selected' : '' }}>Không</option>
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
