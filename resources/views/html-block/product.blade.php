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
        $product_block_one = <<<HTML
        <!-- Projects Start -->
        <div class="container-fluid project py-5">
            <div class="container py-5">
                <div class="text-center mx-auto pb-5 wow fadeInUp" data-wow-delay="0.2s" style="max-width: 800px;">
                    <p class="text-uppercase text-secondary fs-5 mb-0">Our Projects</p>
                    <h2 class="display-4 text-capitalize mb-3">Recent Completed Product/Projects</h2>
                </div>
                <div class="row g-5">
                    <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.2s">
                        <div class="project-item">
                            <div class="row g-4">
                                <div class="col-md-4">
                                    <div class="project-img">
                                        <img src="http://sacms.local/web/img/block/2.jpg" class="img-fluid w-100 pt-3 ps-3" alt="">
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="project-content mb-4">
                                        <p class="fs-5 text-secondary mb-2">Architecture</p>
                                        <a href="#" class="h4">We Building Everything</a>
                                        <p class="mb-0 mt-3">Lorem ipsum dolor sit amet consectetur adipisicing elit. Tenetur tempore perferendis velit minus, perspiciatis eveniet adipisci tempora voluptatem quis dolores.</p>
                                    </div>
                                    <a class="btn btn-primary py-2 px-4" href="#">Read More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.4s">
                        <div class="project-item">
                            <div class="row g-4">
                                <div class="col-md-4">
                                    <div class="project-img">
                                        <img src="http://sacms.local/web/img/block/2.jpg" class="img-fluid w-100 pt-3 ps-3" alt="">
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="project-content mb-4">
                                        <p class="fs-5 text-secondary mb-2">Interior Design</p>
                                        <a href="#" class="h4">We Building Everything</a>
                                        <p class="mb-0 mt-3">Lorem ipsum dolor sit amet consectetur adipisicing elit. Tenetur tempore perferendis velit minus, perspiciatis eveniet adipisci tempora voluptatem quis dolores.</p>
                                    </div>
                                    <a class="btn btn-primary py-2 px-4" href="#">Read More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.2s">
                        <div class="project-item">
                            <div class="row g-4">
                                <div class="col-md-4">
                                    <div class="project-img">
                                        <img src="http://sacms.local/web/img/block/2.jpg" class="img-fluid w-100 pt-3 ps-3" alt="">
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="project-content mb-4">
                                        <p class="fs-5 text-secondary mb-2">House & Exterior</p>
                                        <a href="#" class="h4">We Building Everything</a>
                                        <p class="mb-0 mt-3">Lorem ipsum dolor sit amet consectetur adipisicing elit. Tenetur tempore perferendis velit minus, perspiciatis eveniet adipisci tempora voluptatem quis dolores.</p>
                                    </div>
                                    <a class="btn btn-primary py-2 px-4" href="#">Read More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.4s">
                        <div class="project-item">
                            <div class="row g-4">
                                <div class="col-md-4">
                                    <div class="project-img">
                                        <img src="http://sacms.local/web/img/block/2.jpg" class="img-fluid w-100 pt-3 ps-3" alt="">
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="project-content mb-4">
                                        <p class="fs-5 text-secondary mb-2">Interior Design</p>
                                        <a href="#" class="h4">We Building Everything</a>
                                        <p class="mb-0 mt-3">Lorem ipsum dolor sit amet consectetur adipisicing elit. Tenetur tempore perferendis velit minus, perspiciatis eveniet adipisci tempora voluptatem quis dolores.</p>
                                    </div>
                                    <a class="btn btn-primary py-2 px-4" href="#">Read More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 text-center wow fadeInUp" data-wow-delay="0.2s">
                        <a class="btn btn-secondary py-3 px-5" href="#">More Projects</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Projects End -->
        HTML;

        $product_block_two = <<<HTML
        <!-- Product/Projects Start -->
        <div class="container-fluid projects bg-light py-5">
            <div class="container py-5">
                <div class="row g-5">
                    <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.2s">
                        <div>
                            <h4 class="text-primary">Our Product/Projects</h4>
                            <h1 class="display-4 mb-4">How to work Our Product/ Projects</h1>
                            <p class="mb-5">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Voluptatum fugiat quae nihil obcaecati,</p>
                            <ul class="nav">
                                <li class="nav-item bg-white mb-4 w-100">
                                    <a class="d-flex align-items-center h4 mb-0 p-3 active" data-bs-toggle="pill" href="#ProjectsTab-1">
                                        <div class="projects-icon btn-md-square bg-primary text-white me-3"><span class="fas fa-bolt small"></span></div><span>Power Path Unveiling Our process</span>
                                    </a>
                                </li>
                                <li class="nav-item bg-white mb-4 w-100">
                                    <a class="d-flex align-items-center h4 mb-0 p-3" data-bs-toggle="pill" href="#ProjectsTab-2">
                                        <div class="projects-icon btn-md-square bg-primary text-white me-3"><span class="fas fa-charging-station small"></span></div><span>Electro Flow Decoding Our method</span>
                                    </a>
                                </li>
                                <li class="nav-item bg-white mb-4 w-100">
                                    <a class="d-flex align-items-center h4 mb-0 p-3" data-bs-toggle="pill" href="#ProjectsTab-3">
                                        <div class="projects-icon btn-md-square bg-primary text-white me-3"><span class="fas fa-broadcast-tower small"></span></div><span>Energetic Engine Behind Scenes</span>
                                    </a>
                                </li>
                                <li class="nav-item bg-white mb-4 w-100">
                                    <a class="d-flex align-items-center h4 mb-0 p-3" data-bs-toggle="pill" href="#ProjectsTab-4">
                                        <div class="projects-icon btn-md-square bg-primary text-white me-3"><span class="fas fa-bolt small"></span></div><span>Watt Works Discover Operations</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.2s">
                        <div class="tab-content">
                            <div id="ProjectsTab-1" class="tab-pane fade show p-0 active">
                                <div class="projects-item">
                                    <img src="http://sacms.local/web/img/block/2.jpg" class="img-fluid w-100" alt="">
                                    <div class="projects-content bg-white p-4">
                                        <h4 class="mb-3">Power Path Unveiling Our process</h4>
                                        <p class="mb-4">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Consequatur, quo? Enim facere, praesentium voluptatem vero officiis libero fuga rem autem amet recusandae voluptates, dolorem quo magni. Corporis eveniet consequuntur accusantium.
                                        </p>
                                        <a class="btn btn-primary py-2 px-4" href="#">Read More</a>
                                    </div>
                                </div>
                            </div>
                            <div id="ProjectsTab-2" class="tab-pane fade show p-0">
                                <div class="projects-item">
                                    <img src="http://sacms.local/web/img/block/2.jpg" class="img-fluid w-100" alt="">
                                    <div class="projects-content bg-white p-4">
                                        <h4 class="mb-3">Electro Flow Decoding Our method</h4>
                                        <p class="mb-4">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Consequatur, quo? Enim facere, praesentium voluptatem vero officiis libero fuga rem autem amet recusandae voluptates, dolorem quo magni. Corporis eveniet consequuntur accusantium.
                                        </p>
                                        <a class="btn btn-primary py-2 px-4" href="#">Read More</a>
                                    </div>
                                </div>
                            </div>
                            <div id="ProjectsTab-3" class="tab-pane fade show p-0">
                                <div class="projects-item">
                                    <img src="http://sacms.local/web/img/block/2.jpg" class="img-fluid w-100" alt="">
                                    <div class="projects-content bg-white p-4">
                                        <h4 class="mb-3">Energetic Engine Behind Scenes</h4>
                                        <p class="mb-4">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Consequatur, quo? Enim facere, praesentium voluptatem vero officiis libero fuga rem autem amet recusandae voluptates, dolorem quo magni. Corporis eveniet consequuntur accusantium.
                                        </p>
                                        <a class="btn btn-primary py-2 px-4" href="#">Read More</a>
                                    </div>
                                </div>
                            </div>
                            <div id="ProjectsTab-4" class="tab-pane fade show p-0">
                                <div class="projects-item">
                                    <img src="http://sacms.local/web/img/block/2.jpg" class="img-fluid w-100" alt="">
                                    <div class="projects-content bg-white p-4">
                                        <h4 class="mb-4">Watt Works Discover Operations</h4>
                                        <p class="mb-4">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Consequatur, quo? Enim facere, praesentium voluptatem vero officiis libero fuga rem autem amet recusandae voluptates, dolorem quo magni. Corporis eveniet consequuntur accusantium.
                                        </p>
                                        <a class="btn btn-primary py-2 px-4" href="#">Read More</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Product/Projects End -->
        HTML;

        $blocks = [
            'product_block_one' => 'Product block 1',
            'product_block_two' => 'Product block 2',
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

