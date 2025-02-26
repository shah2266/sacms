<div class="container-fluid footer pt-5 wow fadeIn" data-wow-delay="0.1s">
    <div class="container py-5">
        <div class="row g-4 footer-inner">
            <div class="col-md-6 col-lg-6 col-xl-4">
                <div class="footer-item mt-5">
                    @isset($about->short_description)
                        <h4 class="text-light mb-4">About<span class="text-primary"> Us</span></h4>
                        <p class="mb-4 text-secondary">{!! Str::words($about->short_description, 40, '') !!} </p>
                    @endisset
                    <a href="/contact" class="btn btn-primary py-2 px-4">Contact</a>
                </div>
            </div>
            <div class="col-md-6 col-lg-6 col-xl-4">
                <div class="footer-item mt-5">
                    <h4 class="text-light mb-4">Get in touch</h4>
                    <div class="d-flex flex-column">
                        <h6 class="text-secondary mb-0">Our Address</h6>
                        <div class="d-flex align-items-center border-bottom py-4">
                            <span class="flex-shrink-0 btn-square bg-primary me-3 p-4"><i class="fa fa-map-marker-alt text-dark"></i></span>
                            <a href="" class="text-body">{{ $company->address }}</a>
                        </div>
                        <h6 class="text-secondary mt-4 mb-0">Our Mobile</h6>
                        <div class="d-flex align-items-center py-4">
                            <span class="flex-shrink-0 btn-square bg-primary me-3 p-4"><i class="fa fa-phone-alt text-dark"></i></span>
                            <a href="" class="text-body">{{ $company->phone }}</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-6 col-xl-4">
                <div class="footer-item mt-5">
                    <h4 class="text-light mb-4">Explore Link</h4>
                    <div class="d-flex flex-column align-items-start">
                        <a class="text-body mb-2" href="#"><i class="fa fa-check text-primary me-2"></i>Terms and Policy</a>
                    </div>
                </div>
            </div>
{{--            <div class="col-md-6 col-lg-6 col-xl-3">--}}
{{--                <div class="footer-item mt-5">--}}
{{--                    <h4 class="text-light mb-4">Latest Articles</h4>--}}
{{--                    @foreach($latestArticles as $key => $la)--}}
{{--                    <div class="d-flex border-secondary py-4 {{ $key == 0 ? 'border-bottom' : 'border-0' }}">--}}
{{--                        @if($la->image)--}}
{{--                        <img src="{{ asset('web/img/article/' . $la->image)}}" class="img-fluid flex-shrink-0 mini-img rounded-3" alt="article image">--}}
{{--                        @endif--}}
{{--                        <div class="ps-3">--}}
{{--                            <p class="mb-0 text-muted">Article: {{ $la->article_name }}</p>--}}
{{--                            <span class="mb-0 text-muted d-block">Author: <em>{{ $la->author_name }}</em></span>--}}
{{--                            <a href="{{ url('/article/'. $la->id) }}" class="text-body">{{ Str::of(Str::words($la->description, 5))->stripTags() }}</a>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    @endforeach--}}
{{--                </div>--}}
{{--            </div>--}}
        </div>
    </div>
    <div class="container py-4">
        <div class="border-top border-secondary pb-4"></div>
        <div class="row">
            <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                <a class="border-bottom text-muted">{{ $company->copy_right_statement }}</a>
            </div>
        </div>
    </div>
</div>
