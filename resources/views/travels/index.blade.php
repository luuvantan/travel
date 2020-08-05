@extends('layouts.app')
    <link href="{{ asset('css/travel.css') }}" rel="stylesheet">
@section('content')
<div class="container">
    <section id="tabs" class="project-tab">
        <div class="row">
            <div class="col-12 title d-flex border-title p-2 mt-5 mb-2">
                <label for="sel1" style="width:400px; padding-top: 7px;">
                    {{ $title }}
                </label>
                <select class="form-control selectpicker" id="sel1" name="sellist1" style="width:200px;"
                    onchange="window.location.href = '?provincial=' + this.options[this.selectedIndex].value;">
                    <option value="">----- Tất cả -----</option>
                    @foreach($provincials as $provincial)
                        <option value="{{ $provincial->name }}" {{ app('request')->get('provincial') == $provincial->name ? 'selected' : '' }}>{{ $provincial->name }}</option> 
                    @endforeach
                </select>
            </div>
            @foreach($datas as $key => $data)
            <div class="col-md-12">
                <div class="row mg-bot30 show-item">
                    <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12 mg-bot">
                        <a href="/du-lich-bang-hinh-anh/du-lich-can-gio-choi-gi-va-an-o-dau-v6591.aspx" title="Du lịch Cần Giờ chơi gì và ăn ở đâu?">
                        <img src="{{ $data->url_img }}" class="img-responsive pic-news-l"></a>
                    </div>
                    <div class="col-lg-9 col-md-9 col-sm-8 col-xs-12">
                        <div class="frame-news">
                            <div class="frame-top">
                                <h2 class="news-title-l">
                                    <a href="#"class="dot-dot cut-name" style="overflow-wrap: break-word;">{{ $data->title }}</a>
                                </h2>
                                <div class="frame-date">
                                    <div class="f-left"><img src="" alt="date"></div>
                                    <div class="f-left date">{{ $data->created_at }}</div>
                                    <div class="clear"></div>
                                </div>
                            </div>
                            <div class="frame-bot">
                                <div class="des-content dot-dot cut-content" style="overflow-wrap: break-word;">
                                    {!! mb_substr(strip_tags($data->content), 0, 150, 'UTF-8') !!}
                                </div>
                                <div class="text-right">
                                    <a href="" class="color-red">Xem thêm &nbsp;
                                        <i class="fa fa-long-arrow-alt-right"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        {{ $datas->links() }}
    </section>
</div>
@endsection

@push('footer')
    <script src="{{ asset('js/travels/index.js') }}"></script>
@endpush
