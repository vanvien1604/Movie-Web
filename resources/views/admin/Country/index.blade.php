@extends('layouts.app')
@section('content')
<div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">Danh sách quốc gia phim</h3>
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
          <th scope="col">Title</th>
          <th scope="col">Description</th>
          <th scope="col">Status</th>
          <th scope="col">Create data</th>
          <th scope="col">Updated data</th>
          <th scope="col">Operation</th>
        </tr>
      </thead>
      <tbody class="table-group-divider">
          @foreach ($Countries as $key => $qg)
        <tr>
          <th scope="row">{{ $key }}</th>
          <td>{{ $qg->title }}</td>
          <td>{{ $qg->description }}</td>
          {{-- <td><img width="80px" height="80px" src="{{ asset('uploads/categories/'.$cate->image) }}" alt=""></td>
          <td>{{ $cate->slug }}</td> --}}
          <td>
              @if($qg->status==1)
              <span class="text text-success">Hiển thị</span>
              @else
              <span class="text text-danger">Không hiển thị</span>
              @endif
          </td>
          <td>{{ $qg->updated_at }}</td>
          <td>{{ $qg->created_at }}</td>
          <td>
            <div class="btn-group">
              <a class="btn btn-warning mx-1" href="{{ route('Country.edit',[$qg->id]) }}">Edit</a>
                <form onsubmit="return confirm('Bạn có muốn xóa hàng này không ?')" action="{{ route('Country.destroy',[$qg->id]) }}" method="POST">
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