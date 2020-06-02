<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- CSRF Token -->
	<meta name="csrf-token" content="{{ csrf_token() }}">

	<title>{{ $title ?? '' }}</title>
<!-- Fonts -->
	<link rel="dns-prefetch" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

	<!-- Styles -->
	<link href="{{ asset('css/app.css') }}" rel="stylesheet">
	@stack('header')
</head>

<body>
<div id="app">
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-sm-12 col-xs-12">
                <img src="./logo/travel-experience.png" alt="" style="height:70px; width:auto;">
            </div>
            <div class="col-md-8 hidden-sm col-xs-12">
                <nav class="menu hidden-xs">
                    <ul>
                        <li class="hidden-xs">
                            <a href="/">Du lịch</a>
                            <ul class="sub-menu">
                                <li><a href="/du-lich-viet-nam.aspx">Du lịch trong nước</a></li>
                                <li><a href="/du-lich-nuoc-ngoai.aspx">Du lịch nước ngoài</a></li>
                                <li><a href="https://travel.com.vn/Hotel/Destination" rel="nofollow">Du lịch tự chọn</a></li>
                                <li><a href="http://vscc.edu.vn/" target="_blank" rel="nofollow">Du học</a></li>
                            </ul>
                        </li>                        
                    </ul>
                </nav>
            </div>
        </div>
    </div>

	@include('layouts.sidebar')

	<main id="main">
		<div class="container">
			<div class="row d-flex justify-content-center">
				<div class="col-lg-12 col-md-12">
					<div class="card" style="min-height: 80vh">
						<div class="card-body">
							<div class="flash-message">
								@foreach (['danger', 'warning', 'success', 'info'] as $msg)
									@if(Session::has('alert-' . $msg))
										<p class="alert alert-{{ $msg }}">
                                            {{ Session::get('alert-' . $msg) }} 
                                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                        </p>
									@endif
								@endforeach
							</div>
							@yield('content')
						</div>
					</div>
				</div>

			</div>
        </div>
        <!-- Custom popup -->
        <!--Popup success -->
        <div class="modal custum-modal-success" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div>
                        <h5 class="title alert alert-success"><i class="fas fa-check-circle"></i>&nbsp;Success!</h5>
                    </div>
                    <div class="content">
                        <p id="messenge"></p>
                    </div>
                    <div class="success">
                        <button id="submit" type="button" class="btn btn-outline-success">OK</button>
                    </div>  
                </div>
            </div>
        </div>
        <!--Popup comfirm -->
        <div class="modal custum-modal-comfirm" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div>
                        <h5 class="title alert alert-primary"><i class="far fa-edit"></i>&nbsp;Comfirm!</h5>
                    </div>
                    <div class="content">
                        <p id="messenge"></p>
                    </div>
                    <div class="comfirm">                        
                        <button id="submit" type="button" class="btn btn-outline-primary">OK</button>
                        <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Close</button>
                    </div>  
                </div>
            </div>
        </div> 
        <!--Popup warning -->
        <div class="modal custum-modal-warning" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div>
                        <h5 class="title alert alert-warning"><i class="fas fa-exclamation-triangle"></i>&nbsp;Warning!</h5>
                    </div>
                    <div class="content">
                        <p id="messenge"></p>
                    </div>
                    <div class="warning">
                        <button id="submit" type="button" class="btn btn-outline-warning">OK</button>
                        <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Close</button>
                    </div>  
                </div>
            </div>
        </div> 
        <!--Popup error -->
        <div class="modal custum-modal-error" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div>
                        <h5 class="title alert alert-danger"><i class="fas fa-times"></i>&nbsp;Error!</h5>
                    </div>
                    <div class="content">
                        <p id="messenge"></p>
                    </div>
                    <div class="error">
                        <button id="submit" type="button" class="btn btn-outline-danger">OK</button>
                    </div>  
                </div>
            </div>
        </div> 

		<!-- <div class="div-loading">
			<div class="image-loading-popup">
				<img src="/images/icons/loading.gif">
			</div>
		</div> -->
	</main>
</div><!-- /#app -->
<script src="{{url('js/app.js')}}?v={{time()}}"></script>
<script src="{{ asset('js/common.js') }}"></script>
@stack('footer')
@yield('js')
</body>

</html>