<div class="menu fixed-top">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <nav class="navbar navbar-expand-sm navbar-dark">
                <!-- Brand/logo -->
                    <a class="navbar-brand" href="{{ route('homes.index') }}">
                        <img src="/images/logo/travel5.png" alt="logo" style="width:auto;height:70px; padding:8px;">
                    </a>

                <!-- Links -->
                    <ul class="navbar-nav">
                        <li class="nav-item dropdown">
                            <a class="nav-link items-menu" href="{{ route('homes.index') }}">
                                Trang Chủ
                            </a>
                        </li>
 
                        <li class="nav-item dropdown">
                            <a class="nav-link items-menu" href="#">
                                Du Lịch
                                <span class="fa fa-caret-down" title="Toggle dropdown menu"></span>
                            </a>
                            <div class="dropdown-menu items-hover">
                                <a class="dropdown-item nav-link" href="{{ route('travels.northern') }}">Miền Bắc</a>
                                <a class="dropdown-item nav-link" href="{{ route('travels.central') }}">Miền Trung</a>
                                <a class="dropdown-item nav-link" href="{{ route('travels.southern') }}">Miền Nam</a>
                            </div>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link items-menu" href="#">
                                Kinh Nghiệm
                                <span class="fa fa-caret-down" title="Toggle dropdown menu"></span>
                            </a>
                            <div class="dropdown-menu items-hover">
                                <a class="dropdown-item nav-link" href="{{ route('experiences.food-and-drink') }}">Ẩm Thực</a>
                                <a class="dropdown-item nav-link" href="{{ route('experiences.travel-hand-book') }}">Cẩm Nang Du Lịch</a>
                                <a class="dropdown-item nav-link" href="{{ route('experiences.information') }}">Thông Tin Cần Biết</a>
                            </div>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link items-menu" href="{{ route('posts.create') }}">
                                Đăng Bài
                                <!-- <span class="fa fa-caret-down" title="Toggle dropdown menu"></span> -->
                            </a>
                            <!-- <div class="dropdown-menu items-hover">
                                <a class="dropdown-item nav-link" href="{{ route('posts.create') }}">Chia Sẻ</a>
                                <a class="dropdown-item nav-link" href="#">Câu Hỏi</a>
                            </div> -->
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link items-menu" href="{{ route('aboutMe') }}">
                                Giới thiệu
                            </a>
                        </li>
                        <button type="button" id="searchBtn" class="btn btn-default navbar-btn"><i class="fa fa-search"></i></button>
                        <div class="search-menu hidden" id="searchForm" >
                            <form class="navbar-form" role="search">
                                <div class="input-group">
                                    <input type="text" class="form-control input-form" placeholder="Search" id="search-ajax" autocomplete="on">
                                        <span class="input-group-btn">
                                        <button class="btn btn-default" type="submit"><i class="fa fa-search"></i></button>
                                    </span>
                                </div>
                            </form>
                        </div>

                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">Đăng nhập</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">Đăng kí</a>
                                </li>
                            @endif
                        @else

                            <li class="nav-item dropdown">
                                <a style="margin-top: 4px;" class="nav-link items-menu" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-expanded="false">
                                    <i class="fa fa-bell"></i>
                                    <!-- Counter - Alerts -->
                                    <span class="badge badge-danger badge-counter">3+</span>
                                </a>
                                <!-- Dropdown - Alerts -->
                                <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown">
                                    @foreach (Auth::user()->notifications as $notification)
                                        <a class="dropdown-item" href="#">
                                            <span>{{ $notification->data['title'] }}</span><br>
                                            <small>{{ $notification->data['content'] }}</small>
                                        </a>
                                    @endforeach
                                </div>
                            </li>

                            <div class="topbar-divider d-none d-sm-block"></div>

                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown"
                                    style="padding-top: 6.5px !important;" aria-haspopup="true" aria-expanded="false" v-pre>

                                    <img style="width: 30px;height: 30px;border-radius: 50%;" class="" src="{{ Auth::user()->avatar }}">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ Auth::user()->link }}">
                                        Hồ sơ
                                    </a>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                                        Đăng xuất
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</div>
