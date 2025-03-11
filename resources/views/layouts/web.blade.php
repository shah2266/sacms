<!doctype html>
<html lang="en">

<head>

    @include('web.includes.meta')

    <title>@yield('title') - {{ $company->company_name }}</title>

    @include('web.includes.style')

</head>

<body>

    <!-- Spinner Start -->
    @include('web.includes.spinner')
    <!-- Spinner End -->


    <!-- Top bar start -->
    @include('web.includes.top-bar')
    <!-- Top bar End -->

    <!-- Navbar start -->
    @include('web.includes.navbar')
    <!-- Navbar End -->

    <!-- Dynamic content start -->
    @yield('content')
    <!-- Dynamic content End -->


    <!-- Footer Start -->
    {{--@include('web.includes.footer')--}}
    @include("web.footer.templates." . ($footer->file_name ?? 'default_footer'))
    <!-- Footer End -->

    <!-- back-to-top btn -->
    @include('web.includes.top-btn')

    @include('web.includes.script')
</body>

</html>
