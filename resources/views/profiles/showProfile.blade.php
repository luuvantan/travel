@extends('layouts.app')
    <link href="{{ asset('css/profile.css') }}" rel="stylesheet">
@section('content')
<div class="container mt-5">
    <div class="row">
        @if (session('thongbao'))
            <div class="alert bg-success col-md-8 offset-md-2" style="color: white;">
                <button type="button" class="close" data-dismiss="alert"><span>×</span><span class="sr-only">Close</span></button>
                <span class="">Well done !</span> {{session('thongbao')}}
            </div>
        @endif
        <div class="col-md-1 mr-5 offset-md-2">
            <img src="{{ asset($userSearch->avatar ? $userSearch->avatar : 'images/image/no-image.png') }}"
                 alt="no-images" class="avatar" style="width: 80px;height: 80px; border-radius: 50%">
        </div>
        <div class="" style="min-width: 100px">
            <div class="edit-profile">
                <div class="name">
                    <h4>{{ $userSearch->name }}</h4>
                </div>
                <div>
                  <p> Posts: {{ $countPost }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-2">
          @if ($isCheckUser)
            <button class="btn btn-sm btn-outline-primary is-edit">
              Edit
            </button>
          @endif
        </div>
    </div>
    <div class="row mt-5">
        <div class="col-md-10 offset-md-2">
            <table class="table">
                <tbody>
                @if (!$posts->isEmpty())
                    @foreach($posts as $key => $post)
                    <tr>
                        <td>{{ $key+1 }}</td>
                        <td><a href="{{ $post->link }}">{{ mb_substr($post->title, 0, 70, 'utf-8') }}...</a></td>
                        @if ($isCheckUser)
                            <td style="color: #9b9b9b !important; padding-top:auto;">
                                {{ $post->status == 1 ? 'đã phê duyệt' : "chờ phê duyệt" }}
                            </td>
                            <td>
                                <form action="{{ route('post.delete', ['post_id' => $post->id, 'checkUser' => $isCheckUser, 'name' => $userSearch->name]) }}"
                                    method="post" style="display: inline">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-outline-danger is-delete float-right"
                                        onclick="return window.confirm('Bạn có chắc chắn muốn xóa ?')">
                                        Xóa bài viết
                                    </button>
                                </form>
                            </td>
                        @endif
                    </tr>
                @endforeach
                @else
                    <div class="text-center font-weight-bold text-muted my-05">
                        There is nothing here.
                    </div>
                @endif
                </tbody>
            </table>
            <div class="d-flex justify-content-center">
                {{ $posts->links() }}
            </div>
        </div>
    </div>
</div>
@endsection
@push('footer')
    <script src="{{ asset('js/profiles/index.js') }}"></script>
@endpush
