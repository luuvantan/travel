@extends('layouts.app')
<link href="{{ asset('css/overview.css') }}" rel="stylesheet">
@section('content')
<div class="card-body container mt-3 mb-4">
    <!-- show slide recommended Places  -->
    <div id="carouselExample" class="carousel slide" data-ride="carousel" data-interval="9000">
        <div class="carousel-inner row w-100 mx-auto" role="listbox">
            <!-- <div class="carousel-item col-md-3 active">
               <div class="panel panel-default">
                    <div class="panel-thumbnail">
                        <a href="#" title="image 1" class="thumb">
                            <img class="card-img-top" src="/images/image/1.jpg" alt="Card image">
                            <div class="card-img-overlay div-text">
                                <h4 class="card-text">DU LỊCH AN TOÀN</h4>
                                <p class="card-text">Tiêu chí du lịch an toàn</p>
                            </div>
                        </a>
                    </div>
                </div>
            </div> -->
            @foreach($suggests as $key => $suggest)
            <div class="carousel-item col-md-3 {{ $key == 1 ? 'active' : '' }}">
               <div class="panel panel-default">
                    <div class="panel-thumbnail">
                        <a href="{{ $suggest->link }}" title="image 1" class="thumb">
                            <img class="card-img-top" src="{{ $suggest->url_img }}" alt="Card image">
                            <div class="card-img-overlay div-text">
                                <h4 class="card-text">Du Lịch {{ $suggest->provincial->name }}</h4>
                                <p class="card-text">{{ mb_substr($suggest->title, 0, 60, 'UTF-8') }}</p>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <a class="carousel-control-prev" href="#carouselExample" role="button" data-slide="prev">
            <i class="fa fa-chevron-left fa-3x color-white" aria-hidden="true"></i>
            <span class="carousel-control-prev-icon" aria-hidden="true" hidden></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next text-faded" href="#carouselExample" role="button" data-slide="next">
            <i class="fa fa-chevron-right fa-3x color-white" aria-hidden="true"></i>
            <span class="carousel-control-next-icon" aria-hidden="true" hidden></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
</div>

<!-- show slide highlight Places  -->
<div class="container mt-3">
    <div class="row">
        <div class="col-9 high-light" >
            <div class="row">
                <div class="col-12">
                    <h3 class="text-center mb-4" style="border-bottom: 2px solid green;">
                        <b class="color-green">ĐIỂM ĐẾN YÊU THÍCH - DU LỊCH KHẮP NƠI</b>
                        <!-- <hr class="mt-2"> -->
                    </h3>
                    <!-- <div class="p-2"><i style="color:red">TIN NỔI BẬT</i></div> -->
                </div>
                @foreach($highlights as $highlight)
                <div class="col-4 mb-4">
                    <div class="card">
                        <img src="{{ $highlight->url_img }}" class="img-fluid card-img-top" alt="Responsive image">
                        <div class="card-body">
                            <div style="margin-bottom: 1rem;" class="">
                                <a class="customSize" href="{{ $highlight->user->link }}">
                                    <img style="width: 22px;height: 22px;border-radius: 50%;"
                                        class="" src="{{ $highlight->user->avatar }}">
                                    {{ $highlight->user->name }}
                                </a>
                            </div>
                            <p class="customSize card-text">{{ mb_substr($highlight->title, 0, 100, 'UTF-8') }}...</p>
                            <a href="{{ $highlight->link }}" class="stretched-link">Chi Tiết >></a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>

        <!-- tin tuc -->
        <div class="col-3 float-right" style="padding-left: 15px">
            <div class="title p-2 d-flex justify-content-center color-red" style="border-left: 3px solid #3c98ca;">TIN TỨC MỚI</div>
            @foreach($news as $new)
            <div class="wrap-img-text mt-4 mb-2 col-md-12 postNews">
                <div class="">
                    <img src="{{ $new->url_img }}" alt="" style="max-width: 74px;" class="float-left hover-img mt-1">
                </div>
                <div class="text">
                    <p class="color-green" style="margin-bottom: 1px !important;">{{ $new->provincial->name }}</p>
                    <a href="{{ $new->link }}" class="text-title" style="color: black;"><b>{{ mb_substr($new->title, 0, 60, 'UTF-8') }}</b></a>
                </div>
            </div>
            <hr>
            @endforeach
        </div>

        <div class="col-md-6">
        </div>
        <div class="col-md-6">
            {{ $highlights->links("pagination") }}
        </div>
    </div>
</div>
@endsection

@push('footer')
    <script src="{{ asset('js/overviews/overview.js') }}"></script>
@endpush
