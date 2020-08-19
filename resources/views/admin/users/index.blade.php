@extends('admin.layout.master')
<link href="{{ asset('css/admin.css') }}" rel="stylesheet">
@section('title')
  Quản lý người dùng
@endsection

@section('content')
  <!-- Begin Page Content -->
  <div class="container-fluid">

    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Danh sách Users</h6>
      </div>
      <div class="card-body">
        <h6> Dữ liệu đang cập nhật</h6>
        @if (session('thongbao'))
          <div class="alert bg-success" style="color: white;">
            <button type="button" class="close" data-dismiss="alert"><span>×</span><span class="sr-only">Close</span></button>
            <span class="">Thành công !</span> {{session('thongbao')}}
          </div>
        @elseif (session('msgError'))
          <div class="alert bg-danger" style="color: white;">
            <button type="button" class="close" data-dismiss="alert"><span>×</span><span class="sr-only">Close</span></button>
            <span class="">Thất bại !</span> {{session('msgError')}}
          </div>
        @endif
        <div class="table-responsive">
          <!-- <a class="btn btn-success mt-3 mb-3" href="">Thêm User</a> -->
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
            <tr>
              <th class="text-center">STT</th>
              <th class="text-center">Tên người dùng</th>
              <th class="text-center">Email</th>
              <th class="text-center">Quyền truy cập</th>
              <th class="text-center">Chỉnh Sửa</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($users as $key => $item)
              <tr>
                <td class="text-center">{{ $key + 1 }}</td>
                <td class="text-center">{{ $item->name }}</td>
                <td class="text-center">{{ $item->email }}</td>
                <td class="text-center"><span>{{ $item->role == 1 ? "quản lí" : " người dùng" }}</span></td>
                <td class="text-center">
                    <form action="{{ route('users.destroy', $item->id) }}" method="post" style="display: inline" class="">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger w-150 {{ $item->role == 1 ? 'disabled' : ''}}"
                        onclick="return window.confirm('Bạn có chắc chắn muốn xóa ?')">Xóa người dùng</button>
                    </form>
                    @if($item->role==0)
                    <a href="{{ route('users.change-status', $item->id) }}" class="btn btn-warning w-150">Thêm quyền</a>
                    @endif
                </td>
              </tr>
            @endforeach
            </tbody>
          </table>
          <div class="float-right">
            {!! $users->links() !!}
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- /.container-fluid -->
@endsection