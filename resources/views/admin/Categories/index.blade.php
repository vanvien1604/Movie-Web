@extends('layouts.app')
@section('content')
<div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">Danh sách danh mục</h3>
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
    <table class="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Tên danh mục</th>
            <th scope="col">Mô tả</th>
            <th scope="col">Trạng thái</th>
            <th scope="col">Thời gian tạo</th>
            <th scope="col">Thời gian cập nhật</th>
            <th scope="col">Hành động</th>
          </tr>
        </thead>
        <tbody class="table-group-divider">
            @foreach ($Categories as $key => $cate)
          <tr>
            <th scope="row">{{ $key }}</th>
            <td>{{ $cate->title }}</td>
            <td>{{ $cate->description }}</td>
            {{-- <td><img width="80px" height="80px" src="{{ asset('uploads/categories/'.$cate->image) }}" alt=""></td>
            <td>{{ $cate->slug }}</td> --}}
            <td>
                @if($cate->status==1)
                <span class="text text-success">Hiển thị</span>
                @else
                <span class="text text-danger">Không hiển thị</span>
                @endif
            </td>
            <td>{{ $cate->created_at }}</td>
            <td>{{ $cate->updated_at }}</td>
            <td>
              <div class="btn-group">
                <a class="btn btn-warning mx-1" href="{{ route('Categories.edit',[$cate->id]) }}">Sửa</a>
                  <form onsubmit="return confirm('Bạn có muốn xóa hàng này không ?')" action="{{ route('Categories.destroy',[$cate->id]) }}" method="POST">
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