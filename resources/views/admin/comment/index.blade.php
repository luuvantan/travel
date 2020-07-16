@extends('admin.layout.master')

@section('title')
  Post
@endsection

@section('content')
  <!-- Begin Page Content -->
  <div class="container-fluid">

    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Danh sách các comment</h6>
      </div>
      <div class="card-body">
        <h6> Dữ liệu đang cập nhật</h6>
        @if(session('thongbao'))
          <div class="alert bg-success" style="color: white;">
            <button type="button" class="close" data-dismiss="alert"><span>×</span><span class="sr-only">Close</span></button>
            <span class="">Well done!</span> {{session('thongbao')}}
          </div>
        @endif
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
            <tr>
              <th class="text-center">STT</th>
              <th class="text-center">Tên Bài Viết</th>
              <th class="text-center">Tên Người Comment</th>
              <th class="text-center">Nội Dung Commnet</th>
              <th class="text-center">Chỉnh Sửa</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($comments as $key => $item)
              <tr>
                <td class="text-center">{{ $key + 1 }}</td>
                <td class="text-center">{{ $item->post->name }}</td>
                <td class="text-center">{{ $item->user->name }}</td>
                <td class="text-center">{{ $item->content }}</td>
                <td class="text-center">
                  <form action="{{ route('admin.comment.delete', ['id' => $item->id, 'postId' => $item->post->id]) }}" method="post">
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
            {!! $comments->links() !!}
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- /.container-fluid -->
@endsection