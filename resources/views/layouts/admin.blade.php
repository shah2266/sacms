<!-- Dashboard initials setting -->
@section('company_name', Str::ucfirst($company->company_name))
@section('company_short_name', Str::upper($company->short_name))
@section('copy_right', $company->copy_right_statement)

<!doctype html>
<html lang="en">

<head>
    @include('admin.includes.meta-info')

    <title>@yield('company_short_name') - @yield('title') </title>

    @include('admin.includes.css-links')

</head>

<body class="sidebar-fixed">

<div class="container-scroller">

    @include('admin.includes.sidebar')

    <!-- partial -->
    <div class="container-fluid page-body-wrapper">

        <!-- partial:partials/_navbar.html -->
        @include('admin.includes.navbar')

        <!-- partial -->
        <div class="main-panel">
            <div class="content-wrapper">

                @yield('content')

            </div>
            <!-- content-wrapper ends -->

            <!-- partial:partials/_footer.html -->
            @include('admin.includes.footer')
            <!-- partial -->

        </div>
        <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
</div>
<!-- container-scroller -->

<!-- Confirmation model -->
@include('admin.includes.model')

<!-- plugins:js -->
@include('admin.includes.footer-script')

</body>

</html>
