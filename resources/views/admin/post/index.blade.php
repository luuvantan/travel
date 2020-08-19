@extends('admin.layout.master')
<link href="{{ asset('css/admin.css') }}" rel="stylesheet">
@section('title')
  Quản lí bài viết
@endsection

@section('content')
  <!-- Begin Page Content -->
  <div class="container-fluid">

    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Danh sách các bài post</h6>
      </div>
      <div class="card-body">
        <h6> Dữ liệu đang cập nhật</h6>
        @if (session('thongbao'))
          <div class="alert bg-success" style="color: white;">
            <button type="button" class="close" data-dismiss="alert"><span>×</span><span class="sr-only">Close</span></button>
            <span class="">Thành công !</span> {{session('thongbao')}}
          </div>
        @elseif (session('msgError'))
          <div class="alert bg-success" style="color: white;">
            <button type="button" class="close" data-dismiss="alert"><span>×</span><span class="sr-only">Close</span></button>
            <span class="">Error !</span> {{session('msgError')}}
          </div>
        @endif
        <div class="table-responsive">
          <a class="btn btn-success mt-3 mb-3" href="{{ route('posts.create') }}">Thêm Bài Viết</a>
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
            <tr>
              <th class="text-center">STT</th>
              <th class="text-center">Tên bài viết</th>
              <th class="text-center">Thể Loại</th>
              <th class="text-center">Địa Điểm</th>
              <th class="text-center">Tiêu đề</th>
              <th class="text-center" style="width:20%;">Duyệt bài</th>
              <th class="text-center" style="width:20%;">Chỉnh Sửa</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($posts as $key => $item)
              <tr>
                <td class="text-center">{{ $key + 1 }}</td>
                <td class="text-center">{{ $item->name }}</td>
                <td class="text-center">{{ $item->category->name ?? '' }}</td>
                <td class="text-center">{{ $item->place }}</td>
                <td class="text-center">{{ $item->title }}</td>
                <td class="text-center">
                  @if ($item->status == 0)
                  <a href="admin/post/change-status/{{$item->id}}" class="btn btn-warning w-130">Duyệt bài</a>
                  @elseif ($item->status == 1)
                  <a href="admin/post/change-status/{{$item->id}}" class="btn btn-success w-130">Bỏ duyệt bài</a>
                  @endif
                </td>
                <td class="text-center">
                  <a href="{{ route('admin.comment.list', ['postId' => $item->id]) }}" class="btn btn-info w-130">Xem bình luận</a>
                  <form action="{{ route('admin.post.delete', ['id' => $item->id]) }}" method="post" style="display: inline">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger w-130"
                      onclick="return window.confirm('Bạn có chắc chắn muốn xóa ?')">Xóa bài viết</button>
                  </form>
                </td>
              </tr>
            @endforeach
            </tbody>
          </table>
          <div class="float-right">
            {!! $posts->links() !!}
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- /.container-fluid -->
@endsection