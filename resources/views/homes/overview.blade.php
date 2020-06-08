@extends('layouts.app')
<link href="{{ asset('css/overview.css') }}" rel="stylesheet">
@section('content')
<div class="container">
        <div class="row">
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
        </div>
    </div>
    <div class="container mt-3">
        <div class="row">
            <div class="col-9">
                <div class="row">
                    <div class="col-12 mb-3">
                        <div class="title p-2">TIN NỔI BẬT</div>
                    </div>
                    <div class="col-4">
                        <div class="card">
                            <img class="card-img-top" src="/images/image/2.jpg" alt="Card image" style="width:100%">
                            <div class="card-body">
                                <h4 class="card-title">John Doe</h4>
                                <p class="card-text">Some example text some example text. John Doe is an architect and
                                    engineer</p>
                                <a href="#" class="stretched-link">Chi Tiết >></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="card">
                            <img class="card-img-top" src="/images/image/2.jpg" alt="Card image" style="width:100%">
                            <div class="card-body">
                                <h4 class="card-title">John Doe</h4>
                                <p class="card-text">Some example text some example text. John Doe is an architect and
                                    engineer</p>
                                <a href="#" class="stretched-link">Chi Tiết >></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-4">
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
                <div class="title p-2">TIN TỨC MỚI</div>
                <div class="wrap-img-text mt-3">
                    <img src="/images/image/5.jpg" alt="" style="max-width: 84px;" class="float-left hover-img">
                    <div class="text">
                        <h4 class="category">QUẢNG NAM TIN TỨC</h4>
                        <p class="text-title"><b>Sắc màu ngập tràn làng chiếu Thạch Bàn, Quảng Nam</b></p>
                        <p class="text-text">Cùng Phượt – Làng chiếu Bàn Thạch, một làng nghề</p>
                    </div>
                </div>
                <div class="wrap-img-text mt-3">
                    <img src="/images/image/5.jpg" alt="" style="width: 84px;" class="float-left">
                    <div class="text">
                        <h4 class="category">QUẢNG NAM TIN TỨC</h4>
                        <p class="text-title"><b>Sắc màu ngập tràn làng chiếu Thạch Bàn, Quảng Nam</b></p>
                        <p class="text-text">Cùng Phượt – Làng chiếu Bàn Thạch, một làng nghề</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-9">
                <div class="row">
                    <div class="col-4">
                        <div class="card">
                            <img class="card-img-top" src="/images/image/2.jpg" alt="Card image" style="width:100%">
                            <div class="card-body">
                                <h4 class="card-title">John Doe</h4>
                                <p class="card-text">Some example text some example text. John Doe is an architect and
                                    engineer</p>
                                <a href="#" class="stretched-link">Chi Tiết >></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="card">
                            <img class="card-img-top" src="/images/image/2.jpg" alt="Card image" style="width:100%">
                            <div class="card-body">
                                <h4 class="card-title">John Doe</h4>
                                <p class="card-text">Some example text some example text. John Doe is an architect and
                                    engineer</p>
                                <a href="#" class="stretched-link">Chi Tiết >></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="card">
                            <img class="card-img-top" src="/images/image/2.jpg" alt="Card image" style="width:100%">
                            <div class="card-body">
                                <h4 class="card-title">John Doe</h4>
                                <p class="card-text">Some example text some example text. John Doe is an architect and
                                    engineer</p>
                                <a href="#" class="stretched-link">Chi Tiết >></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="row mt-3">
            <div class="col-9">
                <div class="row">
                    <div class="col-4">
                        <div class="card">
                            <img class="card-img-top" src="/images/image/2.jpg" alt="Card image" style="width:100%">
                            <div class="card-body">
                                <h4 class="card-title">John Doe</h4>
                                <p class="card-text">Some example text some example text. John Doe is an architect and
                                    engineer</p>
                                <a href="#" class="stretched-link">Chi Tiết >></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="card">
                            <img class="card-img-top" src="/images/image/2.jpg" alt="Card image" style="width:100%">
                            <div class="card-body">
                                <h4 class="card-title">John Doe</h4>
                                <p class="card-text">Some example text some example text. John Doe is an architect and
                                    engineer</p>
                                <a href="#" class="stretched-link">Chi Tiết >></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="card">
                            <img class="card-img-top" src="/images/image/2.jpg" alt="Card image" style="width:100%">
                            <div class="card-body">
                                <h4 class="card-title">John Doe</h4>
                                <p class="card-text">Some example text some example text. John Doe is an architect and
                                    engineer</p>
                                <a href="#" class="stretched-link">Chi Tiết >></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection