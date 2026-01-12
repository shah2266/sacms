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
                        @php
                            // Check if the current URL is the home URL
                            $isActive = request()->is('/') && $menu->url == '' || request()->is($menu->url);

                            // Check if any child of this parent is active
                            $hasActiveChild = $menu->children->contains(function ($submenu) {
                                return request()->is($submenu->url);
                            });
                        @endphp

                        @if ($menu->children->isNotEmpty())
                            {{-- Parent with children (Dropdown) --}}
                            <div class="nav-item dropdown {{ $isActive || $hasActiveChild ? 'active' : '' }}">
                                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                                    {{ $menu->title }}
                                </a>
                                <div class="dropdown-menu">
                                    @foreach ($menu->children as $submenu)
                                        {{-- Ensure child has a valid parent before rendering --}}
                                        @if ($submenu->parent_id == $menu->id)
                                            <a href="{{ url($submenu->url) }}" class="dropdown-item {{ request()->is($submenu->url) ? 'active' : '' }}">
                                                {{ $submenu->title }}
                                            </a>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        @elseif ($menu->parent_id == null)
                            {{-- Parent with no children (Regular Menu Item) --}}
                            <a href="{{ url($menu->url) }}" class="nav-item nav-link {{ $isActive ? 'active' : '' }}">
                                {{ $menu->title }}
                            </a>
                        @endif
                    @endforeach

                </div>
                
            </div>
        </nav>
    </div>
</div>
<!-- Navbar & Hero End -->
