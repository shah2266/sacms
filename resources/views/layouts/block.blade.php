<!doctype html>
<html lang="en">

<head>

    @include('web.includes.meta')

    <title>{{ $company->company_name }} - @yield('title')</title>

    @include('web.includes.style')
    <!-- Prism CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/prism/1.29.0/themes/prism-tomorrow.min.css">



    <!-- Prettier and HTML Parser -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/prettier/2.8.4/standalone.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/prettier/2.8.4/parser-html.min.js"></script>
    <!-- Prism.js Script -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/prism/1.29.0/prism.min.js"></script>

    <style>
        .code-container {
            position: relative;
            background: #2d2d2d;
            border-radius: 5px;
            overflow: hidden;
        }

        pre {
            margin: 0;
            overflow-x: auto;
            padding: 20px;
            border-radius: 5px;
            font-size: 12px!important;
            max-height: 400px;
            display: block;
        }

        /* Preview Button */
        .preview-btn {
            position: absolute;
            background-color: #007bff;
            color: white;
            border: none;
            top: 5px;
            left: 5px;
            padding: 5px 10px;
            font-size: 12px;
            cursor: pointer;
            border-radius: 5px;
            font-weight: bold;
            transition: 0.3s;
        }

        .preview-btn:hover {
            background-color: #0056b3;
        }
        .copy-btn, .edit-btn {
            position: absolute;
            top: 5px;
            background: #ffcc00;
            color: #000;
            border: none;
            padding: 5px 10px;
            cursor: pointer;
            font-size: 12px;
            border-radius: 5px;
            font-weight: bold;
            transition: 0.3s;
            z-index: 1;
        }

        .copy-btn {
            right: 50px;
        }

        .edit-btn {
            right: 10px;
        }

        .copy-btn:hover, .edit-btn:hover {
            background: #ffdb4d;
        }

        textarea {
            width: 100%;
            height: 200px;
            background-color: #2d2d2d;
            color: #fff;
            border: 1px solid #444;
            padding: 10px;
            font-family: monospace;
            font-size: 12px;
            border-radius: 5px;
            min-height: 200px; /* Ensure consistent size */
        }


    </style>

</head>

<body>

<!-- Spinner Start -->
{{--@include('web.includes.spinner')--}}
<!-- Spinner End -->


<!-- Top bar start -->
{{--@include('web.includes.top-bar')--}}
<!-- Top bar End -->

<!-- Navbar start -->
{{--@include('web.includes.navbar')--}}
<!-- Navbar End -->

<!-- Dynamic content start -->
@yield('content')
<!-- Dynamic content End -->


<!-- Footer Start -->
{{--@include('web.includes.footer')--}}
<!-- Footer End -->

<!-- back-to-top btn -->
{{--@include('web.includes.top-btn')--}}

@include('web.includes.script')

<!-- Template Javascript -->
<script src="{{ asset('web/js/block.js') }}"></script>

</body>

</html>
