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
                                Miền Bắc
                            </a>
                            <div class="dropdown-menu items-hover">
                                <a class="dropdown-item nav-link" href="#">Mùa Xuân</a>
                                <a class="dropdown-item nav-link" href="#">Mùa Hè</a>
                                <a class="dropdown-item nav-link" href="#">Mùa Thu</a>
                                <a class="dropdown-item nav-link" href="#">Mùa Đông</a>
                            </div>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link items-menu" href="#">
                                Miền Trung
                            </a>
                            <div class="dropdown-menu items-hover">
                                <a class="dropdown-item nav-link" href="#">Mùa Xuân</a>
                                <a class="dropdown-item nav-link" href="#">Mùa Hè</a>
                                <a class="dropdown-item nav-link" href="#">Mùa Thu</a>
                                <a class="dropdown-item nav-link" href="#">Mùa Đông</a>
                            </div>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link items-menu" href="#">
                                Miền Nam
                            </a>
                            <div class="dropdown-menu items-hover">
                                <a class="dropdown-item nav-link" href="#">Mùa Xuân</a>
                                <a class="dropdown-item nav-link" href="#">Mùa Hè</a>
                                <a class="dropdown-item nav-link" href="#">Mùa Thu</a>
                                <a class="dropdown-item nav-link" href="#">Mùa Đông</a>
                            </div>
                        </li>
                    </ul>
                    <!-- form search  -->
                    <ul>
                        <div class="container">
                            <div class="d-flex justify-content-center">
                                <div class="searchbar">
                                    <input class="search_input" type="text" name="" placeholder="Search...">
                                    <a href="#" class="search_icon"><i class="fa fa-search"></i></a>
                                </div>
                            </div>
                        </div>
                    </ul>

                    <ul class="navbar-nav">
                        <!-- Authentication Links -->
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
