<nav class="navbar p-0 fixed-top d-flex flex-row">
    <div class="navbar-brand-wrapper d-flex d-lg-none align-items-center justify-content-center">
        <a class="navbar-brand brand-logo-mini" href="{{ url('/home') }}">@yield('company_short_name')</a>
    </div>
    <div class="navbar-menu-wrapper flex-grow d-flex align-items-stretch">
        <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
            <span class="mdi mdi-menu"></span>
        </button>
        <ul class="navbar-nav w-100">
            <li class="nav-item w-100">
                <form class="nav-link mt-2 mt-md-0 d-none d-lg-flex search">
                    <label for="search"></label>
                    <input type="text" class="form-control" id="search" placeholder="Search products">
                </form>
            </li>
        </ul>
        <ul class="navbar-nav navbar-nav-right">
            <li class="nav-item nav-settings d-none d-lg-block">
                <a class="nav-link" href="{{ url('/home') }}" title="Dashboard">
                    <i class="mdi mdi-speedometer"></i>
                </a>
            </li>
            <li class="nav-item nav-settings d-none d-lg-block">
                <a class="nav-link" href="{{ url('/') }}" title="View website" target="_blank">
                    <i class="mdi mdi-eye-outline"></i>
                </a>
            </li>
            <li class="nav-item nav-settings d-none d-lg-block">
                <a id="theme-toggle" class="nav-link theme-toggle">
                    @if(isset(Auth::user()->theme->id))
                        @if(Auth::user()->theme->id == 1 or strtolower(Auth::user()->theme->theme_name) == 'dark')
                            <i class="mdi mdi-weather-sunny" title="Switch to light"></i>
                        @else
                            <i class="mdi mdi-weather-night" title="Switch to dark"></i>
                        @endif
                    @endif
                </a>
            </li>
            <li class="nav-item nav-settings d-none d-lg-block">
                <!-- Button to trigger page reload -->
                <a class="nav-link count-indicator" href="#" id="reloadPage" title="Reload page">
                    <i class="mdi mdi-reload"></i>
                    <span class="count bg-inverse-primary"></span>
                </a>
            </li>
            <li class="nav-item dropdown border-left">
                <a class="nav-link count-indicator dropdown-toggle" id="messageDropdown" href="#" data-toggle="dropdown"
                   aria-expanded="false">
                    <i class="mdi mdi-email"></i>
                    <span class="count bg-success"></span>
                </a>
                <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list"
                     aria-labelledby="messageDropdown">
                    <h6 class="p-3 mb-0">Messages</h6>
                    <div class="dropdown-divider"></div>
                    @foreach($latestMessages as $key=> $latestMessage)
                    <a class="dropdown-item preview-item">
                        <div class="preview-item-content">
                            <p class="preview-subject ellipsis mb-1">{{ $latestMessage->subject }}</p>
                            <p class="text-muted mb-0"> {{ \Carbon\Carbon::parse($latestMessage->created_at)->format('d-M-Y h:m') }} </p>
                        </div>
                    </a>
                    <div class="dropdown-divider"></div>
                    @endforeach
                    <p class="p-3 mb-0 text-center"><a href="{{ url('admin/pages/contact') }}">All messages</a></p>
                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link" id="profileDropdown" href="#" data-toggle="dropdown">
                    <div class="navbar-profile">
                        <img class="img-xs rounded-circle" src="{{ asset('assets/images/auth/' . Auth::user()->image) }}" alt="{{ Auth::user()->name }}">
                        <p class="mb-0 d-none d-sm-block navbar-profile-name">{{ Auth::user()->name }}</p>
                        <i class="mdi mdi-menu-down d-none d-sm-block"></i>
                    </div>
                </a>
                <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list"
                     aria-labelledby="profileDropdown">
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item preview-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <div class="preview-thumbnail">
                            <div class="preview-icon bg-dark rounded-circle">
                                <i class="mdi mdi-logout text-danger"></i>
                            </div>
                        </div>
                        <div class="preview-item-content">
                            <p class="preview-subject mb-1"> {{ __('Logout') }} </p>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </a>
                </div>
            </li>
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button"
                data-toggle="offcanvas">
            <span class="mdi mdi-format-line-spacing"></span>
        </button>
    </div>
</nav>
