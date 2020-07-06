<div class="menu">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <nav class="navbar navbar-expand-sm navbar-dark">
                <!-- Brand/logo -->
                    <a class="navbar-brand" href="#">
                        <img src="/logo/travel.png" alt="logo" style="width:auto;height:70px">
                    </a>

                <!-- Links -->
                    <ul class="navbar-nav">
                        <li class="nav-item dropdown">
                            <a class="nav-link items-menu" href="#">
                                Trang Chủ
                            </a>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link items-menu" href="#">
                                Du Lịch
                            </a>
                            <div class="dropdown-menu items-hover">
                                <a class="dropdown-item nav-link" href="#">Miền Bắc</a>
                                <a class="dropdown-item nav-link" href="#">Miền Trung</a>
                                <a class="dropdown-item nav-link" href="#">Miền Nam</a>
                            </div>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link items-menu" href="#">
                                Kinh Nghiệm
                            </a>
                            <div class="dropdown-menu items-hover">
                                <a class="dropdown-item nav-link" href="#">Ẩm Thực</a>
                                <a class="dropdown-item nav-link" href="#">Cẩm Nang Du Lịch</a>
                                <a class="dropdown-item nav-link" href="#">Thông Tin Cần Biết</a>
                            </div>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link items-menu" href="#">
                                Đăng Bài
                            </a>
                            <div class="dropdown-menu items-hover">
                                <a class="dropdown-item nav-link" href="#">Chia Sẻ</a>
                                <a class="dropdown-item nav-link" href="#">Câu Hỏi</a>
                            </div>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link items-menu" href="#">
                                Liên Hệ
                            </a>
                        </li>
                      <button type="button" id="searchBtn" class="btn btn-default navbar-btn"><i class="fa fa-search"></i></button>
                      <div class="search-menu hidden" id="searchForm" >
                        <form class="navbar-form" role="search">
                          <div class="input-group">
                            <input type="text" class="form-control" placeholder="Search">
                            <span class="input-group-btn">
                            <button class="btn btn-default" type="submit"><i class="fa fa-search"></i></button>
                          </span>
                          </div>
                        </form>
                      </div>

                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    <img style="width: 30px;height: 30px;border-radius: 50%;" class="" src="{{ Auth::user()->avatar }}">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
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
