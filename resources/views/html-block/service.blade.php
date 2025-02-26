@extends('layouts.block')
@section('title', 'About blocks')
@section('content')
    <div class="container-fluid bg-light">
        <div class="container">
            <div class="row">
                <h2 class="mb-4 mt-3"><a href="{{ url('admin/page-builder/block') }}">Go to dashboard</a></h2>
            </div>
        </div>
    </div>

    @php
        $service_block_one=<<<HTML
    <!-- Services Start -->
    <div class="container-fluid services py-5 bg-gray-dark">
        <div class="container py-5">
            <div class="mx-auto text-center mb-5 wow fadeIn" data-wow-delay="0.1s" style="max-width: 700px;">
                <h1 class="display-4 text-muted-light">Services</h1>

                <p class="pb-4 text-center text-muted-light">Industries We Serve</p>
            </div>

            <div class="row g-4">

                <!--Card-->
                <div class="col-lg-6 col-xl-4">
                    <div class="services-item bg-box-6 p-1 wow fadeIn" data-wow-delay="0.3s">
                        <div class="px-3">
                            <h5 class="text-muted-light">Automotive</h5>
                            <p class="mb-4 text-muted-light">Lightweight and durable materials for vehicle manufacturing.</p>
                            <a class="d-block mb-3" href="#">Read More</a></div>
                    </div>
                </div>
                <!--Card End-->

            </div>
        </div>
    </div>
<!-- Services End -->
HTML;
        $service_block_two =<<<HTML
<!-- Services Start -->
<div class="container-fluid services py-5 bg-sky-light">
    <div class="container py-5">
        <div class="mx-auto text-center mb-5 wow fadeIn" data-wow-delay="0.1s" style="max-width: 700px;">
            <h1 class="display-4">Services</h1>
                <p class="pb-4 text-center">Industries We Serve</p>
        </div>
        <div class="row g-4">

            <!--Card-->
            <div class="col-lg-6 col-xl-4">
                <div class="services-item bg-box-8 p-1 wow fadeIn" data-wow-delay="0.3s">
                    <div class="px-3">
                       <i class="fa fa-car fa-3x my-3"></i>
                       <h5>Automotive</h5>
                       <p class="mb-4">Lightweight and durable materials for vehicle manufacturing.</p>
                       <a class="d-block mb-3" href="#">Read More</a>
                    </div>
                </div>
            </div>
            <!--Card End-->

        </div>
    </div>
</div>
<!-- Services End -->
HTML;


        $blocks = [
            'service_block_one' => 'service block 1',
            'service_block_two' => 'service block 2',
        ];
    @endphp

    <!-- Loop through blocks dynamically -->
    @foreach($blocks as $blockKey => $blockTitle)
        <div class="container-fluid bg-light">
            <div class="container">
                <div class="row">
                    <h2 class="mb-4 mt-5">{{ $blockTitle }}</h2>
                    <div class="col-md-12">
                        <!-- Replace image with preview content -->
                        <div class="code-container">
                            <button class="copy-btn" id="copy-btn-{{ $blockKey }}">Copy</button>
                            <button class="edit-btn" id="edit-btn-{{ $blockKey }}">Edit</button>
                            <button class="preview-btn" id="preview-btn-{{ $blockKey }}">Preview</button>
                            <pre class="line-numbers" id="pre-block-{{ $blockKey }}">
                            <code class="language-html" id="code-{{ $blockKey }}">{{ $$blockKey }}</code>
                        </pre>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12 mb-4">
                        <!-- Preview content area (hidden by default) -->
                        <div class="preview-container" id="preview-container-{{ $blockKey }}" style="display:none; margin-top: 20px; border: 1px solid #ccc;">
                            <div id="preview-content-{{ $blockKey }}" class="preview-content"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection

<!-- Pass dynamic block keys to JavaScript -->
<script>
    // Use the keys of the array and pass it to JavaScript
    const blocks = @json(array_keys($blocks));
</script>

