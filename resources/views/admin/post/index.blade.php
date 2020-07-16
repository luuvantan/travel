@extends('admin.layout.master')

@section('title')
  Post
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
            <span class="">Well done !</span> {{session('thongbao')}}
          </div>
        @elseif (session('msgError'))
          <div class="alert bg-success" style="color: white;">
            <button type="button" class="close" data-dismiss="alert"><span>×</span><span class="sr-only">Close</span></button>
            <span class="">Error !</span> {{session('msgError')}}
          </div>
        @endif
        <div class="table-responsive">
          <a class="btn btn-success mt-3 mb-3" href="">Thêm Bài Viết</a>
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
            <tr>
              <th class="text-center">STT</th>
              <th class="text-center">Name</th>
              <th class="text-center">Category</th>
              <th class="text-center">Place</th>
              <th class="text-center">Title</th>
              <th class="text-center">Content</th>
              <th class="text-center">Images</th>
              <th class="text-center">Chỉnh Sửa</th>
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
                <td class="text-center">{{ $item->content }}</td>
                <td class="text-center"><img src="{{ $item->url_img }}" alt="Load image fail"></td>
                <td class="text-center">
                  @if ($item->status == 0)
                    <a href="admin/post/change-status/{{$item->id}}" class="btn btn-warning">Duyệt Bài</a>
                  @elseif ($item->status == 1)
                    <a href="admin/post/change-status/{{$item->id}}" class="btn btn-success">Bỏ Duyệt Bài</a>
                  @endif
                  <a href="{{ route('admin.comment.list', ['postId' => $item->id]) }}" class="btn btn-info">Xem Comment</a>
                  <a href="" class="btn btn-primary">Chỉnh Sửa</a>
                  <form action="{{ route('admin.post.delete', ['id' => $item->id]) }}" method="post" style="display: inline">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger"
                      onclick="return window.confirm('Bạn có chắc chắn muốn xóa ?')">Xóa Comment</button>
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