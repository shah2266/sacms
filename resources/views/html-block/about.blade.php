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
        $about_block_one = <<<HTML
        <!-- About Start -->
        <div class="container-fluid bg-light">
            <div class="container">
                <div class="row wow fadeInUp" data-wow-delay="0.2s">
                    <div class="col-lg-5">
                        <div class="d-flex flex-column align-items-center justify-content-center bg-primary h-100 py-5 px-3">
                            <i class="flaticon-brickwall display-1 font-weight-normal text-dark mb-3"></i>
                            <h4 class="display-3 mb-3">25+</h4>
                            <h1 class="m-0">Years Experience</h1>
                        </div>
                    </div>
                    <div class="col-lg-7 m-0 my-lg-5 pt-5 pb-5 pb-lg-2 pl-lg-5">
                        <h6 class="text-primary font-weight-normal text-uppercase mb-3">Learn About Us</h6>
                        <h1 class="mb-4 section-title">Invidunt lorem justo sanctus clita.</h1>
                        <p>Invidunt lorem justo sanctus clita.</p>
                        <div class="row py-2">

                            <div class="col-sm-6">
                                <div class="d-flex align-items-center mb-4">
                                    <h1 class="flaticon-house font-weight-normal text-primary m-0 mr-3"></h1>
                                    <h5 class="text-truncate m-0">Automotive</h5>
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="d-flex align-items-center mb-4">
                                    <h1 class="flaticon-stairs font-weight-normal text-primary m-0 mr-3"></h1>
                                    <h5 class="text-truncate m-0">Packaging</h5>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- About End -->
        HTML;

        $about_block_two = <<<HTML
        <!-- About Start -->
        <div class="container-fluid team py-5">
            <div class="container py-5">
                <div class="d-flex flex-column mx-auto text-center mb-5 wow fadeInUp" data-wow-delay="0.2s" style="max-width: 800px;">
                    <h4 class="text-primary">About us</h4>
                    <h1 class="display-4 mb-4">Lorem ipsum dolor sit amet consectetur adipisicing elit</h1>
                    <p class="mb-0">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quidem, deserunt provident ab voluptates rerum eaque eum magni autem atque in minus laboriosam corrupti deleniti voluptatibus rem reiciendis modi veniam animi?
                    </p>
                </div>
            </div>
        </div>
        <!-- About End -->
        HTML;

        $about_block_three =<<<HTML
    <!-- Features Start -->
    <div class="container-fluid bg-white">
        <div class="container">
            <div class="row">
                <div class="col-lg-7 mt-5 py-5 pr-lg-5">
                    <h6 class="text-primary font-weight-normal text-uppercase mb-3">Why Choose Us?</h6>
                    <h1 class="mb-4 section-title">25+ Years Experience Dolores lorem lorem ipsum Industry</h1>
                    <p class="mb-4">Dolores lorem lorem ipsum sit et ipsum. Sadip sea amet diam dolore sed et. Sit rebum labore sit sit ut vero no sit. Et elitr stet dolor sed sit et sed ipsum et kasd ut. Erat duo eos et erat sed diam duo</p>
                    <ul class="list-inline">
                        <li><h5><i class="far fa-check-square text-primary mr-3"></i>25+ Years Experience</h5></li>
                        <li><h5><i class="far fa-check-square text-primary mr-3"></i>Best Interior Design</h5></li>
                        <li><h5><i class="far fa-check-square text-primary mr-3"></i>Customer Satisfaction</h5></li>
                    </ul>
                    <a href="" class="btn btn-primary mt-3 py-2 px-4">View More</a>
                </div>
                <div class="col-lg-5">
                    <div class="d-flex flex-column align-items-center justify-content-center h-100 overflow-hidden">
                        <img class="h-100" src="http://azizpolymer.local/web/img/block/2.jpg" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Features End -->
    HTML;


        $blocks = [
            'about_block_one' => 'About block 1',
            'about_block_two' => 'About block 2',
            'about_block_three' => 'About block 3',
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

