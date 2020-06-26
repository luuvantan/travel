@extends('layouts.app')
    <link href="{{ asset('css/experience.css') }}" rel="stylesheet">
@section('content')
<div class="container">
    <section id="tabs" class="project-tab">
        <div class="row">
            <!-- tin tuc  -->
            <div class="col-12 d-flex justify-content-center color-red mt-3 mb-5">
                <h4>KINH NGHIEM CHIA SE</h4>
            </div>
            
            <div class="col-md-12">
                <nav>
                    <div class="nav nav-tabs nav-fill mb-5" id="nav-tab" role="tablist">
                        <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Project Tab 1</a>
                        <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Project Tab 2</a>
                        <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Project Tab 3</a>
                    </div>
                </nav>
                <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                        <div class="row mg-bot30">
                            <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12 mg-bot">
                                <a href="/du-lich-bang-hinh-anh/du-lich-can-gio-choi-gi-va-an-o-dau-v6591.aspx" title="Du lịch Cần Giờ chơi gì và ăn ở đâu?">
                                <img src="https://wiki-travel.com.vn/uploads/post/camnhi-201526111540-du-lich-can-gio.png" class="img-responsive pic-news-l" alt="Du lịch Cần Giờ chơi gì và ăn ở đâu?"></a>
                            </div>
                            <div class="col-lg-9 col-md-9 col-sm-8 col-xs-12">
                                <div class="frame-news">
                                    <div class="frame-top">
                                        <h2 class="news-title-l">
                                            <a href="/du-lich-bang-hinh-anh/du-lich-can-gio-choi-gi-va-an-o-dau-v6591.aspx" title="Du lịch Cần Giờ chơi gì và ăn ở đâu?" class="dot-dot cut-name" style="overflow-wrap: break-word;">Du lịch Cần Giờ chơi gì và ăn ở đâu?</a>
                                        </h2>
                                        <div class="frame-date">
                                            <div class="f-left"><img src="/Content/themeHe/img/i-date.png" alt="date"></div>
                                            <div class="f-left date">26/06/2020</div>
                                            <div class="clear"></div>
                                        </div>
                                    </div>
                                    <div class="frame-bot">
                                        <div class="des-content dot-dot cut-content" style="overflow-wrap: break-word;">
                                            Cách trung tâm Sài Gòn khoảng 50km, Cần Giờ là điểm đến lý tưởng để thưởng thức hải sản và dạo biển. Đây cũng là bãi biển duy nhất của TP. HCM. Du lịch Cần Giờ du khách không những được thưởng thức những món hải sản tươi sống thơm-ngon-bổ-rẻ, mà còn được hòa mình vào không gian xanh mát của những khu rừng ngập mặn với những hoạt động trải nghiệm hết sức thú vị.
                                        </div>
                                        <div class="text-right">
                                            <a href="/du-lich-bang-hinh-anh/du-lich-can-gio-choi-gi-va-an-o-dau-v6591.aspx" class="color-red" title="Du lịch Cần Giờ chơi gì và ăn ở đâu?">Xem thêm &nbsp;
                                                <i class="fa fa-long-arrow-alt-right"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                        <h1>tab2</h1>
                    </div>
                    <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
                    <h1>tab3</h1>
                    </div>
                </div>
            </div>

           
        </div>
    </section>
</div>
@endsection

@push('footer')
    <!-- <script src="{{ asset('js/overviews/overview.js') }}"></script> -->
@endpush
