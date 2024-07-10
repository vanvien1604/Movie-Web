@extends('layouts.app')
@section('content')
<div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">Danh sách loại phim</h3>
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
          <th scope="col">Title</th>
          <th scope="col">Description</th>
          <th scope="col">Images</th>
          {{-- <th scope="col">Slug</th> --}}
          <th scope="col">Số tập</th>
          <th scope="col">Status</th>
          <th scope="col">Categories</th>
          <th scope="col">Genres</th>
          <th scope="col">Countries</th>
          <th scope="col">Thịnh hành</th>
          <th scope="col">Operation</th>
        </tr>
      </thead>
      <tbody class="table-group-divider">
          @foreach ($Movies as $key => $cate_phim)
        <tr>
          <th scope="row">{{ $key }}</th>
          <td>{{ $cate_phim->title }}</td>
          <td>{{ $cate_phim->description }}</td>
          <td><img width="80px" height="100px" src="{{ asset('backend/uploads/Movies/'.$cate_phim->image) }}" alt=""></td>
          <td>{{ $cate_phim->sotap }}</td>
          <td>
              @if($cate_phim->status==1)
              <span class="text text-success">Hiển thị</span>
              @else
              <span class="text text-danger">Không hiển thị</span>
              @endif
          </td>
          <td>{{ $cate_phim->category->title }}</td>
          <td>{{ $cate_phim->genre->title }}</td>
          <td>{{ $cate_phim->country->title }}</td>
          <td>
            @if($cate_phim->phim_thinh_hanh==1)
            <span class="text text-success">Có</span>
            @else
            <span class="text text-danger">Không</span>
            @endif
          </td>
          <td>
            <div class="btn-group">
              <a class="btn btn-warning mx-1" href="{{ route('Movie.edit',[$cate_phim->id]) }}">Edit</a>
                <form onsubmit="return confirm('Bạn có muốn xóa hàng này không ?')" action="{{ route('Movie.destroy',[$cate_phim->id]) }}" method="POST">
                    @method('DELETE')
                    @csrf
                    <input type="submit" class="btn btn-danger" value="Delete">
                </form>
            </div>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
@endsection