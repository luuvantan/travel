@extends('layouts.app')
    <link href="{{ asset('css/profile.css') }}" rel="stylesheet">
@section('content')
<div class="container mt-5">
<div class="row justify-content-center">
        <div class="col-md-8" style="margin-top: 50px !important;">
            <div class="">
                <div class="">
                    <h1 class="text-center" style="color:green;">Chỉnh sửa tài khoản của bạn</h1>
                    <br><br>
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('profile.updateProfile', $profile->id) }}" enctype="multipart/form-data">
                    @method('PATCH')
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Tên đăng nhập</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name', $profile->name) }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">Địa chỉ email</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $profile->email }}" required autocomplete="email" readonly>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right" for="upload">Chọn ảnh</label>

                            <div class="col-md-6">
                                <input type="file" class="form-control" id="upload" name="avatar">
                                @if($errors->has('avatar'))
                                    <div class="error color-red">{{ $errors->first('avatar') }}</div>
                                @endif
                                <img src="" alt="" id="img" class="img-resize hidden">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <a href="{{ route('profile.showProfile', $profile->email) }}" class="btn btn-danger">
                                    Hủy
                                </a>
                                <button type="submit" class="btn btn-primary">
                                    Chỉnh sửa
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('footer')
    <script src="{{ asset('js/profiles/index.js') }}"></script>
@endpush
