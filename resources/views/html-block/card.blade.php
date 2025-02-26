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
        $card_block_one =<<<HTML
<!-- Card-1 Start -->
        <div class="container-fluid card-1 overflow-hidden py-5">
            <div class="container">
                <div class="section-title text-center mb-5 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="sub-style">
                        <h5 class="sub-title text-primary px-3">Card-1 heading</h5>
                    </div>
                    <h1 class="display-5 mb-4">Lorem ipsum dolor sit amet consectetu</h1>
                    <p class="mb-0">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quaerat deleniti amet at atque sequi quibusdam cumque itaque repudiandae temporibus, eius nam mollitia voluptas maxime veniam necessitatibus saepe in ab? Repellat!</p>
                </div>
                <div class="row g-4 justify-content-center text-center">
                    <div class="col-md-6 col-lg-6 col-xl-3 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="card-1-item text-center p-4">
                            <div class="card-1-icon p-3 mb-4">
                                <i class="fas fa-atlas fa-4x text-primary"></i>
                            </div>
                            <div class="card-1-content d-flex flex-column">
                                <h5 class="mb-3">Cost-Effective</h5>
                                <p class="mb-3">Dolor, sit amet consectetur adipisicing elit. Soluta inventore cum accusamus,</p>
                                <a class="btn btn-secondary rounded-pill" href="#">Read More<i class="fas fa-arrow-right ms-2"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6 col-xl-3 wow fadeInUp" data-wow-delay="0.3s">
                        <div class="card-1-item text-center p-4">
                            <div class="card-1-icon p-3 mb-4">
                                <i class="fas fa-atlas fa-4x text-primary"></i>
                            </div>
                            <div class="card-1-content d-flex flex-column">
                                <h5 class="mb-3">Visa Assistance</h5>
                                <p class="mb-3">Dolor, sit amet consectetur adipisicing elit. Soluta inventore cum accusamus,</p>
                                <a class="btn btn-secondary rounded-pill" href="#">Read More<i class="fas fa-arrow-right ms-2"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6 col-xl-3 wow fadeInUp" data-wow-delay="0.5s">
                        <div class="card-1-item text-center p-4">
                            <div class="card-1-icon p-3 mb-4">
                                <i class="fas fa-atlas fa-4x text-primary"></i>
                            </div>
                            <div class="card-1-content d-flex flex-column">
                                <h5 class="mb-3">Faster Processing</h5>
                                <p class="mb-3">Dolor, sit amet consectetur adipisicing elit. Soluta inventore cum accusamus,</p>
                                <a class="btn btn-secondary rounded-pill" href="#">Read More<i class="fas fa-arrow-right ms-2"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6 col-xl-3 wow fadeInUp" data-wow-delay="0.7s">
                        <div class="card-1-item text-center p-4">
                            <div class="card-1-icon p-3 mb-4">
                                <i class="fas fa-atlas fa-4x text-primary"></i>
                            </div>
                            <div class="card-1-content d-flex flex-column">
                                <h5 class="mb-3">Direct Interviews</h5>
                                <p class="mb-3">Dolor, sit amet consectetur adipisicing elit. Soluta inventore cum accusamus,</p>
                                <a class="btn btn-secondary rounded-pill" href="#">Read More<i class="fas fa-arrow-right ms-2"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <a class="btn btn-primary border-secondary rounded-pill py-3 px-5 wow fadeInUp" data-wow-delay="0.1s" href="#">More Features</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Card-1 End -->
HTML;
        $card_block_two =<<<HTML
<!-- Card-2 Start -->
    <div class="container-fluid py-5">
        <div class="container">
            <div class="text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 800px;">
                <h1 class="display-6">Card-2 heading</h1>
                <p class="text-primary fs-5 mb-5">Clita erat ipsum et lorem et sit</p>
            </div>
            <div class="row g-5">
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="d-flex align-items-start">
                        <i class="fas fa-atlas fa-4x text-primary"></i>
                        <div class="ps-4">
                            <h5 class="mb-3">Easy To Start</h5>
                            <span>Aliqu diam amet diam et eos. Clita erat ipsum et lorem et sit, sed stet lorem sit clita duo justo</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="d-flex align-items-start">
                        <i class="fas fa-atlas fa-4x text-primary"></i>
                        <div class="ps-4">
                            <h5 class="mb-3">Safe & Secure</h5>
                            <span>Aliqu diam amet diam et eos. Clita erat ipsum et lorem et sit, sed stet lorem sit clita duo justo</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="d-flex align-items-start">
                        <i class="fas fa-atlas fa-4x text-primary"></i>
                        <div class="ps-4">
                            <h5 class="mb-3">Affordable Plans</h5>
                            <span>Aliqu diam amet diam et eos. Clita erat ipsum et lorem et sit, sed stet lorem sit clita duo justo</span>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- Card-2 End -->
HTML;

        $card_block_three =<<<HTML
    <!-- Card-3 Start -->
    <div class="container-fluid bg-light py-5 my-5">
        <div class="container py-5">
            <div class="text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 800px;">
                <h1 class="display-6">Card-3 heading</h1>
                <p class="text-primary fs-5 mb-5">Aliqu diam amet diam et eos</p>
            </div>
            <div class="row g-4">
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="bg-white p-5">
                        <h5 class="mb-3">Currency Wallet</h5>
                        <p>Aliqu diam amet diam et eos. Clita erat ipsum et lorem et sit, sed stet lorem sit clita duo justo</p>
                        <a href="">Read More <i class="fa fa-arrow-right ms-2"></i></a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="bg-white p-5">
                        <h5 class="mb-3">Currency Transaction</h5>
                        <p>Aliqu diam amet diam et eos. Clita erat ipsum et lorem et sit, sed stet lorem sit clita duo justo</p>
                        <a href="">Read More <i class="fa fa-arrow-right ms-2"></i></a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="bg-white p-5">
                        <h5 class="mb-3">Bitcoin Investment</h5>
                        <p>Aliqu diam amet diam et eos. Clita erat ipsum et lorem et sit, sed stet lorem sit clita duo justo</p>
                        <a href="">Read More <i class="fa fa-arrow-right ms-2"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Card-3 End -->
HTML;

        $blocks = [
            'card_block_one' => 'Card-1 block',
            'card_block_two'   => 'Card-2 block',
            'card_block_three'   => 'Card-3 block'
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

