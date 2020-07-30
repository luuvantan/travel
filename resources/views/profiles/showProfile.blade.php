@extends('layouts.app')
    <link href="{{ asset('css/profile.css') }}" rel="stylesheet">
@section('content')
<div class="card-body">
    <div class="container user-profile">
        <img src="" alt="">
    </div>
</div>
@endsection
@push('footer')
    <script src="{{ asset('js/profiles/index.js') }}"></script>
@endpush
