
@extends('layouts.app')
<link href="{{ asset('css/overview.css') }}" rel="stylesheet">
@section('content')
    <div class="container">
        <h1>fdhdfd</h1>
        <form action="{{ route('posts.store') }}" method ="post">
            @csrf
            <div class="row">
                <input id="hihi" name="content" type="hidden">
                <textarea name="text" style="display:none" id="hiddenArea"></textarea>
                <div name="abc" id="editor" style="width:100%;">
                
                </div>
            </div>
            <div class="row">
                <button id="submitted" class="btn btn-primary" type="submit">Save Profile</button>
            </div>
        </form>
    </div>
@endsection
@push('footer')
    <script src="{{ asset('js/posts/create.js') }}"></script>
@endpush
