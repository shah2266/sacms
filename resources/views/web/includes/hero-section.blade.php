<!-- Carousel Start -->
<div class="header-carousel owl-carousel">
    @foreach($sliders as $key=>$slider)
    <div class="header-carousel-item bg-primary" style="background-color: {{ $slider->bg_color }} !important;">
        <div class="carousel-caption">
            <div class="container">
                <div class="row g-4 align-items-center">
                    <div class="col-lg-7 animated fadeIn">
                        <div class="text-sm-center text-md-start">
                            <h4
                               class="text-uppercase fw-bold mb-4 wow fadeInDown"
                               style="color: {{ $slider->title_color }} !important;">
                                {{ Str::limit($slider->title, 30) }}
                            </h4>
                            <h1
                                class="display-3 mb-4 wow fadeInDown"
                                style="color: {{ $slider->sub_title_color }} !important;">
                                {{ Str::words($slider->sub_title, 6, '') }}
                            </h1>
                            <p class="mb-5 fs-5">{!! Str::words($slider->short_description, 12, '') !!} </p>
                            <div class="d-flex justify-content-center justify-content-md-start flex-shrink-0 mb-4">
                                @if(isset($slider->link1))
                                <a class="btn btn-dark rounded-pill py-3 px-4 px-md-5 ms-2" href="{{ $slider->link1 }}">Learn More</a>
                                @endif

                                @if(isset($slider->link2))
                                <a class="btn btn-dark rounded-pill py-3 px-4 px-md-5 ms-2" href="{{ $slider->link2 }}">Learn More</a>
                                @endif
                            </div>
                        </div>
                    </div>

                    @if($slider->image)
                    <div class="col-lg-5 animated fadeIn">
                        <div class="carousel-img" style="object-fit: cover;">
                            <img src="{{ asset('web/img/hero/' . $slider->image) }}" class="img-fluid w-100" alt="slider">
                        </div>
                    </div>
                    @endif

                </div>

            </div>
        </div>
    </div>
    @endforeach
</div>
<!-- Carousel End -->
