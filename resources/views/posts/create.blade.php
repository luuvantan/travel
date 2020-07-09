
@extends('layouts.app')
<link href="{{ asset('css/post.css') }}" rel="stylesheet">
@section('content')
    <div class="container mt-5">
        <form id="form-post" action="{{ route('posts.store') }}" method ="post">
            @csrf

            <!-- <div class="row p-2">
                <div class="col-3">
                    <label for="">Tên Bài Chia Sẻ :</label>
                </div>
                <div class="col-9">
                    <input class="form-control" type="text">
                </div>
            </div> -->

            <div class="row p-2">
                <div class="col-3">
                    <label for="">Tiêu Đề :</label>
                </div>
                <div class="col-9">
                    <textarea class="form-control" type="text"></textarea>
                </div>
            </div>
            <div class="row p-2">
                <div class="col-3">
                    <label for="">Địa Điểm :</label>
                </div>
                <div class="col-9">
                    <select id="provincial" name="provincial" class="form-control" style="width: 100%;">
                        @foreach($provincials as $provincial)
                            <option>{{ $provincial->name }}</option> 
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="row p-2">
                <div class="col-3">
                    <label for="">Địa Danh Cụ Thể :</label>
                </div>
                <div class="col-9">
                    <input class="form-control" type="text">
                </div>
            </div>
            <div class="row p-2">
                <div class="col-3">
                    <label for="">Thể Loại :</label>
                </div>
                <div class="col-9">
                <select id="category" name="category" class="form-control" style="width: 100%;">
                    @foreach($categorys as $category)
                        <option>{{ $category->name }}</option> 
                    @endforeach
                </select>
                </div>
            </div>
            <div class="row p-2">
                <div class="col-3">
                    <label for="">Ảnh :</label>
                </div>
                <div class="col-9">
                    <input class="" type="file">
                </div>
            </div>

            <div class="row p-2">
                <div class="col-3">
                    <label for="">Nội Dung :</label>
                </div>
                <div class="col-9">
                    <div class="h-100">
                        <input id="hihi" name="content" type="hidden">
                        <textarea name="text" style="display:none" id="hiddenArea" type="hidden"></textarea>
                        <div name="abc" id="editor" class="content-post">
                        
                        </div>
                    </div>
                </div>
            </div>     

            <div class="row p-2">
                <div class="col-3">
                   
                </div>
                <div class="col-9">
                    <div class="row d-flex justify-content-center">
                        <a href="{{ route('posts.index') }}" class="btn btn-outline-secondary mt-5">Cancel</a>
                        <button id="submitted" class="btn btn-outline-primary mt-5 ml-5" type="submit">Submit</button>
                    </div>
                </div>
            </div>           
            
        </form>
    </div>
@endsection
@push('footer')
    <script src="{{ asset('js/posts/create.js') }}"></script>
@endpush
