@extends('layouts.app')
<link href="{{ asset('css/overview.css') }}" rel="stylesheet">
@section('content')
    <div class="container">
        <h1>fdhdfd</h1>
        <form action="{{route('posts.store')}}" method="post">
            @csrf
            <input type="text" name="title">
            <input type="text" name="name">
            <button class="btn btn-success" type="submit">submit</button>
        </form>
    </div>
@endsection
@push('footer')
    <script src="{{ asset('js/posts/index.js') }}"></script>
@endpush
