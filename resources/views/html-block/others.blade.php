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
        $team_block_one = <<<HTML
        <!-- Team Start -->
         <div class="container-fluid team py-5">
            <div class="container py-5">
                <div class="d-flex flex-column mx-auto text-center mb-5 wow fadeInUp" data-wow-delay="0.2s" style="max-width: 800px;">
                    <h4 class="text-primary">Our Team</h4>
                    <h1 class="display-4 mb-4">Lorem ipsum dolor sit amet </h1>
                    <p class="mb-0">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quidem, deserunt provident ab voluptates rerum eaque eum magni autem atque in minus laboriosam corrupti deleniti voluptatibus rem reiciendis modi veniam animi?
                    </p>
                </div>
                <div class="row g-4">
                    <div class="col-md-6 col-lg-3 wow fadeInUp" data-wow-delay="0.2s">
                        <div class="team-item">
                            <div class="team-img">
                                <img src="http://azizpolymer.local/web/img/block/2.jpg" class="img-fluid w-100" alt="">
                                <!--<div class="team-icon">
                                    <a class="btn btn-square btn-primary mb-2" href=""><i class="fab fa-facebook-f"></i></a>
                                    <a class="btn btn-square btn-primary mb-2" href=""><i class="fab fa-twitter"></i></a>
                                    <a class="btn btn-square btn-primary mb-2" href=""><i class="fab fa-instagram"></i></a>
                                    <a class="btn btn-square btn-primary mb-2" href=""><i class="fab fa-linkedin-in"></i></a>
                                </div>-->
                            </div>
                            <div class="team-content bg-light text-center p-4">
                                <h4>Shoaib Bashir</h4>
                                <p class="mb-0">Profession</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3 wow fadeInUp" data-wow-delay="0.4s">
                        <div class="team-item">
                            <div class="team-img">
                                <img src="http://azizpolymer.local/web/img/block/2.jpg" class="img-fluid w-100" alt="">
                                <!--<div class="team-icon">
                                    <a class="btn btn-square btn-primary mb-2" href=""><i class="fab fa-facebook-f"></i></a>
                                    <a class="btn btn-square btn-primary mb-2" href=""><i class="fab fa-twitter"></i></a>
                                    <a class="btn btn-square btn-primary mb-2" href=""><i class="fab fa-instagram"></i></a>
                                    <a class="btn btn-square btn-primary mb-2" href=""><i class="fab fa-linkedin-in"></i></a>
                                </div>-->
                            </div>
                            <div class="team-content bg-light text-center p-4">
                                <h4>Shoaib Bashir</h4>
                                <p class="mb-0">Profession</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3 wow fadeInUp" data-wow-delay="0.6s">
                        <div class="team-item">
                            <div class="team-img">
                                <img src="http://azizpolymer.local/web/img/block/2.jpg" class="img-fluid w-100" alt="">
                                <!--<div class="team-icon">
                                    <a class="btn btn-square btn-primary mb-2" href=""><i class="fab fa-facebook-f"></i></a>
                                    <a class="btn btn-square btn-primary mb-2" href=""><i class="fab fa-twitter"></i></a>
                                    <a class="btn btn-square btn-primary mb-2" href=""><i class="fab fa-instagram"></i></a>
                                    <a class="btn btn-square btn-primary mb-2" href=""><i class="fab fa-linkedin-in"></i></a>
                                </div>-->
                            </div>
                            <div class="team-content bg-light text-center p-4">
                                <h4>Shoaib Bashir</h4>
                                <p class="mb-0">Profession</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3 wow fadeInUp" data-wow-delay="0.8s">
                        <div class="team-item">
                            <div class="team-img">
                                <img src="http://azizpolymer.local/web/img/block/2.jpg" class="img-fluid w-100" alt="">
                                <!--<div class="team-icon">
                                    <a class="btn btn-square btn-primary mb-2" href=""><i class="fab fa-facebook-f"></i></a>
                                    <a class="btn btn-square btn-primary mb-2" href=""><i class="fab fa-twitter"></i></a>
                                    <a class="btn btn-square btn-primary mb-2" href=""><i class="fab fa-instagram"></i></a>
                                    <a class="btn btn-square btn-primary mb-2" href=""><i class="fab fa-linkedin-in"></i></a>
                                </div>-->
                            </div>
                            <div class="team-content bg-light text-center p-4">
                                <h4>Shoaib Bashir</h4>
                                <p class="mb-0">Profession</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
         </div>
        <!-- Team End -->
        HTML;

        $faq_block_one =<<<HTML
        <!-- FAQ Start -->
        <div class="container-fluid faq-section bg-light pt-5">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.2s">
                        <h4 class="text-primary">Some Important FAQ's</h4>
                        <h1 class="display-4 mb-4">Common Frequently Asked Questions?</h1>
                        <p class="mb-4">Lorem ipsum dolor sit amet consectetur adipisicing elit. Eveniet pariatur sapiente, modi perspiciatis earum ab inventore vitae consequatur tempore quibusdam?
                        </p>
                        <a class="btn btn-primary py-3 px-5" href="/contact">Have Any Questions</a>
                    </div>
                    <div class="col-xl-6 wow fadeInUp" data-wow-delay="0.2s">
                        <div class="h-100">
                            <div class="accordion" id="accordionExample">
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingOne">
                                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                            Q: How Do I Sing Up For Your Electricity Services?
                                        </button>
                                    </h2>
                                    <div id="collapseOne" class="accordion-collapse collapse show active" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            A: Leverage agile frameworks to provide a robust synopsis for high level overviews. Iterative approaches to corporate strategy foster collaborative thinking to further the overall value proposition.
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingTwo">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                            Q: What Types Of Electricity Plans Do You Offer?
                                        </button>
                                    </h2>
                                    <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            A: Leverage agile frameworks to provide a robust synopsis for high level overviews. Iterative approaches to corporate strategy foster collaborative thinking to further the overall value proposition.
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingThree">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                            Q: What Are Your Billing And Payment Options?
                                        </button>
                                    </h2>
                                    <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            A: Leverage agile frameworks to provide a robust synopsis for high level overviews. Iterative approaches to corporate strategy foster collaborative thinking to further the overall value proposition.
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingFour">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                            Q: How Can I Track My Energy Usage With Your Services?
                                        </button>
                                    </h2>
                                    <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            A: Leverage agile frameworks to provide a robust synopsis for high level overviews. Iterative approaches to corporate strategy foster collaborative thinking to further the overall value proposition.
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
         </div>
        <!-- FAQ End -->
HTML;

        $blocks = [
            'team_block_one' => 'Team block 1',
            'faq_block_one' => 'Faq block',
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

