
@extends('layouts.app')
<link href="{{ asset('css/post.css') }}" rel="stylesheet">
@section('content')
    <div class="container mt-5">
        <form enctype="multipart/form-data" id="form-post" action="{{ route('posts.store') }}" method ="post">
            @csrf

            <!-- <div class="row p-2">
                <div class="col-3">
                    <label for="">Tên Bài Chia Sẻ :</label>
                </div>
                <div class="col-9">
                    <input class="form-control" type="text">
                </div>
            </div> -->

            <div class="row p-3">
                <div class="col-3">
                    <label for="">Tiêu Đề Bài Viết <span style="color:red;font-size:20px;">*</span> :</label>
                </div>
                <div class="col-9">
                    <textarea class="form-control" type="text" name="title">{{ old('title') }}</textarea>
                    @if($errors->has('title')) 
                        <div class="error color-red">{{ $errors->first('title') }}</div>
                    @endif
                </div>
            </div>

            <div class="row p-3">
                <div class="col-3">
                    <label for="">Ảnh Tiêu Đề <span style="color:red;font-size:20px;">*</span> :</label>
                </div>
                <div class="col-9">
                    <input id="upload" class="" type="file" name="image">
                    @if($errors->has('image'))
                        <div class="error color-red">{{ $errors->first('image') }}</div>
                    @endif
                    <img src="" alt="" id="img" class="img-resize hidden">
                </div>
            </div>

            <div class="row p-3">
                <div class="col-3">
                    <label for="">Địa Điểm <span style="color:red;font-size:20px;">*</span> :</label>
                </div>
                <div class="col-9">
                    <select id="provincial" name="provincial_id" class="form-control" style="width: 100%;">
                        <option value="">----- Chọn Địa Điểm ------</option>
                        @foreach($provincials as $provincial)
                            <option value="{{ $provincial->id }}">{{ $provincial->name }}</option> 
                        @endforeach
                    </select>
                    @if($errors->has('provincial_id'))
                        <div class="error color-red">{{ $errors->first('provincial_id') }}</div>
                    @endif
                </div>
            </div>

            <div class="row p-3">
                <div class="col-3">
                    <label for="">Địa Danh Cụ Thể <span style="color:red;font-size:20px;">*</span> :</label>
                </div>
                <div class="col-9">
                    <input class="form-control" type="text" name="place" value="{{ old('place') }}">
                    @if($errors->has('place'))
                        <div class="error color-red">{{ $errors->first('place') }}</div>
                    @endif
                </div>
            </div>

            <div class="row p-3">
                <div class="col-3">
                    <label for="">Thể Loại <span style="color:red;font-size:20px;">*</span> :</label>
                </div>
                <div class="col-9">
                <select id="category" name="category_id" class="form-control" style="width: 100%;">
                    <option value="">----- Chọn thể loại ------</option>
                    @foreach($categorys as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option> 
                    @endforeach
                </select>
                @if($errors->has('category_id'))
                    <div class="error color-red">{{ $errors->first('category_id') }}</div>
                @endif
                </div>
            </div>
            
            <div class="row p-3">
                <div class="col-3">
                    <label for="">Nội Dung <span style="color:red;font-size:20px;">*</span> :</label>
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

            <div class="row p-3">
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
