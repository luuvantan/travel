
@extends('layouts.app')
<link href="{{ asset('css/post.css') }}" rel="stylesheet">
@section('content')
    <div class="container">
        <form action="{{ route('posts.store') }}" method ="post">
            @csrf
            <div class="row h-100">
                <input id="hihi" name="content" type="hidden">
                <textarea name="text" style="display:none" id="hiddenArea" type="hidden"></textarea>
                <div name="abc" id="editor" class="content-post">
                
                </div>
            </div>
            <div class="row d-flex justify-content-center">
                <a href="{{ route('posts.index') }}" class="btn btn-outline-secondary mt-5">Cancel</a>
                <button id="submitted" class="btn btn-outline-primary mt-5 ml-5" type="submit">Submit</button>
            </div>
        </form>
    </div>
@endsection
@push('footer')
    <script src="{{ asset('js/posts/create.js') }}"></script>
@endpush
