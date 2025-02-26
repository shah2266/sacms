<!-- Navbar & Hero Start -->
<div class="container-fluid nav-bar">
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light">
            <a href="#" class="navbar-brand p-0">
                <!--<h3 class="text-primary mb-0"><i class="fab fa-slack me-2"></i> {{ $company->company_name }}</h3>-->
                <img src="{{ asset('web/img/company/' . $company->image) }}" alt="logo" loading="eager">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="fa fa-bars"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav mx-0 mx-lg-auto">

                    @foreach ($menuItems as $menu)
                        @if ($menu->children->isNotEmpty())
                            {{-- Parent with children (Dropdown) --}}
                            <div class="nav-item dropdown">
                                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                                    {{ $menu->title }}
                                </a>
                                <div class="dropdown-menu">
                                    @foreach ($menu->children as $submenu)
                                        {{-- Ensure child has a valid parent before rendering --}}
                                        @if ($submenu->parent_id == $menu->id)
                                            <a href="{{ url($submenu->url) }}" class="dropdown-item">{{ $submenu->title }}</a>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        @elseif ($menu->parent_id == null)
                            {{-- Parent with no children (Regular Menu Item) --}}
                            <a href="{{ url($menu->url) }}" class="nav-item nav-link {{ request()->is($menu->url) ? 'active' : '' }}">
                                {{ $menu->title }}
                            </a>
                        @endif
                    @endforeach

                </div>
                <div class="nav-btn px-3">
                    <a href="/contact" class="btn btn-primary rounded-pill py-2 px-4 ms-3 flex-shrink-0"> Contact</a>
                </div>
            </div>
        </nav>
    </div>
</div>
<!-- Navbar & Hero End -->
