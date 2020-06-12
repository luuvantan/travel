@extends('layouts.app')
<link href="{{ asset('css/post.css') }}" rel="stylesheet">
@section('content')
    <div class="container post-index">
        @foreach($posts as $key => $post)
        <div>
            {!! $post->content !!}
        </div>
        <div class="row">
        </div>
        @endforeach
    </div>
@endsection
@push('footer')
    <script src="{{ asset('js/posts/index.js') }}"></script>
@endpush
