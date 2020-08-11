@extends('admin.layout.master')
<link href="{{ asset('css/admin.css') }}" rel="stylesheet">

@section('title')
  trang chủ
@endsection

@section('content')
<div class="admin-dashboard">
    <div class="container-fluid">
        <div class="row mt-5">

            <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Report chờ</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">10</div>
                    </div>
                    <div class="col-auto">
                    <i class="fa fa-file iconFontsize text-gray-300"></i>
                    </div>
                </div>
                </div>
            </div>
            </div>

            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Tổng số bài đăng</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalPosts }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fa fa-plus text-gray-300 iconFontsize"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Người dùng</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalUsers }}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fa fa-user-plus text-gray-300 iconFontsize"></i>
                    </div>
                </div>
                </div>
            </div>
            </div>

            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-warning shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Bài đăng chờ</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $pendingPosts }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-comments fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-6 mt-5">
                <div id="container" data-post="{{ $postByDate }}"></div>
                <h3 class="text-center mt-5" style="color:green;">Biểu đồ bài đăng theo tháng</h3>
            </div>
            <div class="col-6 mt-5">
                <div id="category" data-category="{{ $postByCategory }}"></div>
                <h3 class="text-center mt-5" style="color:green;">Biểu đồ thể loại du lịch </h3>
            </div>
        </div>
    </div>
</div>
@endsection
@push('footer')
    <script src="{{ asset('js/admins/dashboard.js') }}"></script>
    <!-- <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/modules/export-data.js"></script> -->
@endpush
