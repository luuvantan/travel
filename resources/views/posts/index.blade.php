@extends('layouts.app')
<link href="{{ asset('css/overview.css') }}" rel="stylesheet">
@section('content')
    <div class="container">
        @foreach($posts as $key => $post)
        <div>
            {!! $post->content !!}
        </div>
        @endforeach
    </div>
@endsection
@push('footer')
    <script src="{{ asset('js/posts/index.js') }}"></script>
@endpush
