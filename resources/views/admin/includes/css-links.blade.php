<!-- plugins:css -->
<link rel="stylesheet" href="{{ asset('assets/vendors/mdi/css/materialdesignicons.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/vendors/css/vendor.bundle.base.css') }}">
<!-- endinject -->
<!-- Plugin css for this page -->
<link rel="stylesheet" href="{{ asset('assets/vendors/select2/select2.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/vendors/select2-bootstrap-theme/select2-bootstrap.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/vendors/jvectormap/jquery-jvectormap.css') }}">
<link rel="stylesheet" href="{{ asset('assets/vendors/color-picker/coloris.min.css') }}">

<link rel="stylesheet" href="{{ asset('assets/css/date-picker-custom.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/switch-button.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/custom-style.css') }}">
<!-- End plugin css for this page -->
<!-- inject:css -->
<!-- endinject -->

<!-- Theme styles -->
@auth
    @if(isset(Auth::user()->theme->theme_name))
        <!-- Layout styles, default CSS, and dark mode -->
        <link rel="stylesheet" href="{{ asset('assets/css/my-date-picker-custom.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
        @if(strtolower(Auth::user()->theme->theme_name) === 'light')
            <!-- Extended styles -->
            <link rel="stylesheet" href="{{ asset('assets/css/' . strtolower(Auth::user()->theme->stylesheet_name)) }}">
        @endif
    @endif
@endauth


<!-- End layout styles -->
<link rel="icon" href="{{ asset('web/img/company/' . $company->favicon) }}">
