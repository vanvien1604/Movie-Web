@extends('layouts.app')
@section('content')
<div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">Danh sách tập phim</h3>
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
    <table class="table" id="myTable">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Phim</th>
          <th scope="col">Ảnh phim</th>
          <th scope="col">Link phim</th>
          <th scope="col">Tập</th>
          <th scope="col">Hành động</th>
        </tr>
      </thead>
      <tbody class="table-group-divider">
          @foreach ($Episodes as $key => $cate_phim)
        <tr>
          <td scope="row">{{ $key }}</td>
          <td>{{ $cate_phim->Movie->title }}</td>
          <td><img src="{{ asset('backend/uploads/Movies/'.$cate_phim->Movie->image) }}" width="80px" height="100px" alt=""></td>
          <td>{{ $cate_phim->linkphim }}</td>
          <td>{{ $cate_phim->episode }}</td>
          <td>
            <div class="btn-group">
              <a class="btn btn-warning mx-1" href="{{ route('Episode.edit',[$cate_phim->id]) }}">Sửa</a>
                <form onsubmit="return confirm('Bạn có muốn xóa hàng này không ?')" action="{{ route('Episode.destroy',[$cate_phim->id]) }}" method="POST">
                    @method('DELETE')
                    @csrf
                    <input type="submit" class="btn btn-danger" value="Xóa">
                </form>
            </div>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
@endsection