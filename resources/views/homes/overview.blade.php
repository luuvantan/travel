@extends('layouts.app')
<link href="{{ asset('css/overview.css') }}" rel="stylesheet">
@section('content')
<div class="card-body container mt-3 mb-4">
    <!-- show slide recommended Places  -->
    <div id="carouselExample" class="carousel slide" data-ride="carousel" data-interval="9000">
        <div class="carousel-inner row w-100 mx-auto" role="listbox">
            <div class="carousel-item col-md-3  active">
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
            </div>
            <div class="carousel-item col-md-3 ">
                <div class="panel panel-default">
                    <div class="panel-thumbnail">
                        <a href="#" title="image 2" class="thumb">
                            <img class="card-img-top" src="/images/image/2.jpg" alt="Card image">
                            <div class="card-img-overlay div-text">
                                <h4 class="card-text">Kỳ nghỉ gia đình</h4>
                                <p class="card-text">Dịch vụ tự chọn dành riêng cho gia đình bạn</p>
                            </div>                        
                        </a>
                    </div>
                </div>
            </div>
            <div class="carousel-item col-md-3 ">
                <div class="panel panel-default">
                    <div class="panel-thumbnail">
                        <a href="#" title="image 3" class="thumb">
                            <img class="card-img-top" src="/images/image/3.jpg" alt="Card image">
                            <div class="card-img-overlay div-text">
                                <p class="card-text">Some example text.</p>
                                <p class="card-text">Some example text.</p>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <div class="carousel-item col-md-3 ">
                <div class="panel panel-default">
                    <div class="panel-thumbnail">
                        <a href="#" title="image 4" class="thumb">
                            <img class="card-img-top" src="/images/image/3.jpg" alt="Card image">
                            <div class="card-img-overlay div-text">
                                <p class="card-text">Some example text.</p>
                                <p class="card-text">Some example text.</p>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <div class="carousel-item col-md-3 ">
              <div class="panel panel-default">
                    <div class="panel-thumbnail">
                        <a href="#" title="image 5" class="thumb">
                            <img class="card-img-top" src="/images/image/3.jpg" alt="Card image">
                            <div class="card-img-overlay div-text">
                                <p class="card-text">Some example text.</p>
                                <p class="card-text">Some example text.</p>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <div class="carousel-item col-md-3 ">
               <div class="panel panel-default">
                    <div class="panel-thumbnail">
                        <a href="#" title="image 6" class="thumb">
                            <img class="card-img-top" src="/images/image/3.jpg" alt="Card image">
                            <div class="card-img-overlay div-text">
                                <p class="card-text">Some example text.</p>
                                <p class="card-text">Some example text.</p>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <div class="carousel-item col-md-3 ">
               <div class="panel panel-default">
                    <div class="panel-thumbnail">
                        <a href="#" title="image 7" class="thumb">
                            <img class="card-img-top" src="/images/image/3.jpg" alt="Card image">
                            <div class="card-img-overlay div-text">
                                <p class="card-text">Some example text.</p>
                                <p class="card-text">Some example text.</p>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <div class="carousel-item col-md-3">
                <div class="panel panel-default">
                    <div class="panel-thumbnail">
                        <a href="#" title="image 8" class="thumb">
                            <img class="card-img-top" src="/images/image/3.jpg" alt="Card image">
                            <div class="card-img-overlay div-text">
                                <p class="card-text">Some example text.</p>
                                <p class="card-text">Some example text.</p>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
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


    <!-- <div class="row">
        <div class="col-3">
            <div class="card">
                <img class="card-img-top" src="/images/image/1.jpg" alt="Card image">
                <div class="card-img-overlay div-text">
                    <h4 class="card-text">DU LỊCH AN TOÀN</h4>
                    <p class="card-text">Tiêu chí du lịch an toàn</p>
                </div>
            </div>
        </div>
        <div class="col-3">
            <div class="card">
                <img class="card-img-top" src="/images/image/2.jpg" alt="Card image">
                <div class="card-img-overlay div-text">
                    <h4 class="card-text">Kỳ nghỉ gia đình</h4>
                    <p class="card-text">Dịch vụ tự chọn dành riêng cho gia đình bạn</p>
                </div>
            </div>
        </div>
        <div class="col-3">
            <div class="card">
                <img class="card-img-top" src="/images/image/3.jpg" alt="Card image">
                <div class="card-img-overlay div-text">
                    <p class="card-text">Some example text.</p>
                    <p class="card-text">Some example text.</p>
                </div>
            </div>
        </div>
        <div class="col-3">
            <div class="card">
                <img class="card-img-top" src="/images/image/4.jpg" alt="Card image">
                <div class="card-img-overlay div-text">
                    <p class="card-text">Some example text.</p>
                </div>
            </div>
        </div>
    </div> -->
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
                <div class="col-4 mb-4">
                    <div class="card">
                        <img src="/images/image/2.jpg" class="img-fluid card-img-top" alt="Responsive image">
                        <div class="card-body">
                            <h4 class="card-title">John Doe</h4>
                            <p class="card-text">Some example text some example text. John Doe is an architect and engineer</p>
                            <a href="#" class="stretched-link">Chi Tiết >></a>
                        </div>
                    </div>
                </div>
                <div class="col-4 mb-4">
                    <div class="card">
                        <img class="card-img-top" src="/images/image/2.jpg" alt="Card image" style="width:100%">
                        <div class="card-body">
                            <h4 class="card-title">John Doe</h4>
                            <p class="card-text">Some example text some example text. John Doe is an architect and engineer</p>
                            <a href="#" class="stretched-link">Chi Tiết >></a>
                        </div>
                    </div>
                </div>
                <div class="col-4 mb-4">
                    <div class="card">
                        <img class="card-img-top" src="/images/image/2.jpg" alt="Card image" style="width:100%">
                        <div class="card-body">
                            <h4 class="card-title">John Doe</h4>
                            <p class="card-text">Some example text some example text. John Doe is an architect and engineer</p>
                            <a href="#" class="stretched-link">Chi Tiết >></a>
                        </div>
                    </div>
                </div>
                <div class="col-4 mb-4">
                    <div class="card">
                        <img class="card-img-top" src="/images/image/2.jpg" alt="Card image" style="width:100%">
                        <div class="card-body">
                            <h4 class="card-title">John Doe</h4>
                            <p class="card-text">Some example text some example text. John Doe is an architect and engineer</p>
                            <a href="#" class="stretched-link">Chi Tiết >></a>
                        </div>
                    </div>
                </div>
                <div class="col-4 mb-4">
                    <div class="card">
                        <img class="card-img-top" src="/images/image/2.jpg" alt="Card image" style="width:100%">
                        <div class="card-body">
                            <h4 class="card-title">John Doe</h4>
                            <p class="card-text">Some example text some example text. John Doe is an architect and engineer</p>
                            <a href="#" class="stretched-link">Chi Tiết >></a>
                        </div>
                    </div>
                </div>
                <div class="col-4 mb-4">
                    <div class="card">
                        <img class="card-img-top" src="/images/image/2.jpg" alt="Card image" style="width:100%">
                        <div class="card-body">
                            <h4 class="card-title">John Doe</h4>
                            <p class="card-text">Some example text some example text. John Doe is an architect and engineer</p>
                            <a href="#" class="stretched-link">Chi Tiết >></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-3 float-right" style="padding-left: 15px">
            <div class="title p-2 d-flex justify-content-center color-red" style="border-left: 3px solid #3c98ca;">TIN TỨC MỚI</div>
            <div class="wrap-img-text mt-4 mb-2">
                <div class="">
                    <img src="/images/image/5.jpg" alt="" style="max-width: 74px;" class="float-left hover-img mt-2">
                </div>
                <div class="text">
                    <a href="" class="color-green">QUẢNG NAM</a>
                    <p class="text-title"><b>Sắc màu ngập tràn làng chiếu Thạch Bàn, Quảng Nam</b></p>
                </div>
                <hr>
            </div>
            <div class="wrap-img-text mt-4 mb-2">
                <div class="">
                    <img src="/images/image/5.jpg" alt="" style="max-width: 74px;" class="float-left hover-img mt-2">
                </div>
                <div class="text">
                    <a href="" class="color-green">QUẢNG NAM</a>
                    <p class="text-title"><b>Sắc màu ngập tràn làng chiếu Thạch Bàn, Quảng Nam</b></p>
                </div>
                <hr>
            </div>
        </div>
    </div>
</div>
@endsection

@push('footer')
    <script src="{{ asset('js/overviews/overview.js') }}"></script>
@endpush
