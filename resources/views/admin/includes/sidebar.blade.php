<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <div class="sidebar-brand-wrapper d-none d-lg-flex align-items-center justify-content-center fixed-top">
        <a class="sidebar-brand brand-logo" href="{{ url('/home') }}">@yield('company_short_name')</a>
        <a class="sidebar-brand brand-logo-mini" href="{{ url('/home') }}">@yield('company_short_name')</a>
    </div>
    <ul class="nav">
        <li class="nav-item profile">
            <div class="profile-desc">
                <div class="profile-pic">
                    <div class="count-indicator">
                        <img class="img-xs rounded-circle " src="{{ asset('assets/images/auth/' . Auth::user()->image) }}" alt="{{ Auth::user()->name }}">
                        <span class="count bg-success"></span>
                    </div>
                    <div class="profile-name">
                        <h5 class="mb-0 font-weight-normal" title="{{ Auth::user()->name }}">{{ Auth::user()->name }}</h5>
                        <span>{{ ['Super admin', 'Admin', 'User'] [Auth::user()->user_type] }}</span>
                    </div>
                </div>
                <a href="#" id="profile-dropdown" data-toggle="dropdown"><i class="mdi mdi-dots-vertical"></i></a>
                <div class="dropdown-menu dropdown-menu-right sidebar-dropdown preview-list"
                     aria-labelledby="profile-dropdown">
                    <a href="#" class="dropdown-item preview-item">
                        <div class="preview-thumbnail">
                            <div class="preview-icon bg-dark rounded-circle">
                                <i class="mdi mdi-settings text-primary"></i>
                            </div>
                        </div>
                        <div class="preview-item-content">
                            <p class="preview-subject ellipsis mb-1 text-small">Account settings</p>
                        </div>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item preview-item">
                        <div class="preview-thumbnail">
                            <div class="preview-icon bg-dark rounded-circle">
                                <i class="mdi mdi-onepassword  text-info"></i>
                            </div>
                        </div>
                        <div class="preview-item-content">
                            <p class="preview-subject ellipsis mb-1 text-small">Change Password</p>
                        </div>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item preview-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <div class="preview-thumbnail">
                            <div class="preview-icon bg-dark rounded-circle">
                                <i class="mdi mdi-calendar-today text-success"></i>
                            </div>
                        </div>
                        <div class="preview-item-content">
                            <p class="preview-subject ellipsis mb-1 text-small">Logout</p>
                        </div>
                    </a>
                </div>
            </div>
        </li>

        <li class="nav-item nav-category">
            <span class="nav-link">Navigation</span>
        </li>

        <!-- Dashboard -->
        <li class="nav-item menu-items {{ (request()->is('home') OR request()->is('home/*')) ? 'active' : '' }}">
            <a class="nav-link" href="{{ url('/home') }}">
            <span class="menu-icon">
              <i class="mdi mdi-speedometer"></i>
            </span>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>
        <!-- #Dashboard -->

        <!-- Site settings -->
        <li class="nav-item menu-items {{ (request()->is('admin/site-settings') OR request()->is('admin/site-settings/*')) ? 'active' : '' }}">
            <a class="nav-link" data-toggle="collapse" href="#site-settings" aria-expanded="false" aria-controls="site-settings">
            <span class="menu-icon">
              <i class="mdi mdi-settings-box"></i>
            </span>
                <span class="menu-title">Site setting</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse {{ (request()->is('admin/site-settings') OR request()->is('admin/site-settings/*')) ? 'show' : '' }}" id="site-settings">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                        <a class="nav-link {{ (request()->is('admin/site-settings/color') OR request()->is('admin/site-settings/color/*')) ? 'active' : '' }}"
                           href="{{ url('admin/site-settings/color') }}">
                            Color
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link {{ (request()->is('admin/site-settings/company') OR request()->is('admin/site-settings/company/*')) ? 'active' : '' }}"
                           href="{{ url('admin/site-settings/company') }}">
                            Website
                        </a>
                    </li>
                </ul>
            </div>
        </li>
        <!-- #Site setting -->

        <li class="nav-item menu-items {{ (request()->is('admin/media') OR request()->is('admin/media/*')) ? 'active' : '' }}">
            <a class="nav-link" href="{{ url('admin/media') }}">
            <span class="menu-icon">
              <i class="mdi mdi-folder-multiple-image"></i>
            </span>
                <span class="menu-title">Media</span>
            </a>
        </li>

        <!-- Page builder -->
        <li class="nav-item menu-items {{ (request()->is('admin/page-builder') OR request()->is('admin/page-builder/*')) ? 'active' : '' }}">
            <a class="nav-link" data-toggle="collapse" href="#page-builder" aria-expanded="false" aria-controls="page-builder">
            <span class="menu-icon">
              <i class="mdi mdi-page-layout-body"></i>
            </span>
                <span class="menu-title">Page Builder</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse {{ (request()->is('admin/page-builder') OR request()->is('admin/page-builder/*')) ? 'show' : '' }}" id="page-builder">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                        <a class="nav-link {{ (request()->is('admin/page-builder/page') OR request()->is('admin/page-builder/page/*')) ? 'active' : '' }}"
                           href="{{ url('admin/page-builder/page') }}">
                            Page
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link {{ (request()->is('admin/page-builder/block') OR request()->is('admin/page-builder/block/*')) ? 'active' : '' }}"
                           href="{{ url('admin/page-builder/block') }}">
                            Blocks
                        </a>
                    </li>
                </ul>
            </div>
        </li>
        <!-- #Page builder -->

        <!-- Site options -->
        <li class="nav-item menu-items {{ (request()->is('admin/site-options') OR request()->is('admin/site-options/*')) ? 'active' : '' }}">
            <a class="nav-link" data-toggle="collapse" href="#site-options" aria-expanded="false" aria-controls="site-options">
            <span class="menu-icon">
              <i class="mdi mdi-sitemap"></i>
            </span>
                <span class="menu-title">Site options</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse {{ (request()->is('admin/site-options') OR request()->is('admin/site-options/*')) ? 'show' : '' }}" id="site-options">
                <ul class="nav flex-column sub-menu">

                    <li class="nav-item">
                        <a class="nav-link {{ (request()->is('admin/site-options/menus') OR request()->is('admin/site-options/menus/*')) ? 'active' : '' }}"
                           href="{{ url('admin/site-options/menus') }}">
                            Menus
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link {{ (request()->is('admin/site-options/menu-items') OR request()->is('admin/site-options/menu-items/*')) ? 'active' : '' }}"
                           href="{{ url('admin/site-options/menu-items') }}">
                            Menu items
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link {{ (request()->is('admin/site-options/hero') OR request()->is('admin/site-options/hero/*')) ? 'active' : '' }}"
                           href="{{ url('admin/site-options/hero') }}">
                            Banner
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link {{ (request()->is('admin/site-options/menus') OR request()->is('admin/site-options/menus/*')) ? 'active' : '' }}"
                           href="{{ url('admin/site-options/menus') }}">
                            Header
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link {{ (request()->is('admin/site-options/menus') OR request()->is('admin/site-options/menus/*')) ? 'active' : '' }}"
                           href="{{ url('admin/site-options/menus') }}">
                            Footer
                        </a>
                    </li>
                </ul>
            </div>
        </li>
        <!-- #Site options -->

        <!-- Setting -->
        <li class="nav-item menu-items {{ (request()->is('admin/users') OR request()->is('admin/users/*')) ? 'active' : '' }}">
            <a class="nav-link" data-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
            <span class="menu-icon">
              <i class="mdi mdi-settings"></i>
            </span>
                <span class="menu-title">Setting</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse {{ (request()->is('admin/setting/') OR request()->is('admin/setting/*')) ? 'show' : '' }}" id="auth">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                        <a class="nav-link {{ (request()->is('admin/setting/users') OR request()->is('admin/setting/users/*')) ? 'active' : '' }}"
                           href="{{ url('admin/setting/users') }}">
                            Users
                        </a>
                    </li>
                    @if(Auth::user()->user_type != 2)
                    <li class="nav-item">
                        <a class="nav-link {{ (request()->is('admin/setting/themes') OR request()->is('admin/setting/themes/*')) ? 'active' : '' }}"
                           href="{{ url('admin/setting/themes') }}">
                            Themes
                        </a>
                    </li>
                    @endif

                    <li class="nav-item">
                        <a class="nav-link {{ (request()->is('admin/setting/help') OR request()->is('admin/setting/help/*')) ? 'active' : '' }}"
                           href="{{ url('admin/setting/help') }}">
                            Help
                        </a>
                    </li>
                </ul>
            </div>
        </li>
        <!-- #Setting -->

    </ul>
</nav>
