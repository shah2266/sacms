<div class="container-fluid footer pt-5 wow fadeIn" data-wow-delay="0.1s">
<div class="container py-5">
<div class="row g-4 footer-inner">
<div class="col-md-6 col-lg-6 col-xl-4">
<div class="footer-item mt-5">@isset($about-&gt;short_description)
<h4 class="text-light mb-4">About<span class="text-primary"> Usdddd</span></h4>

<p>About<span class="text-primary"> Usdddd</span></p>

<p class="mb-4 text-secondary">{!! Str::words($about-&gt;short_description, 40, &#39;&#39;) !!}</p>
@endisset <a class="btn btn-primary py-2 px-4" href="/contact">Contact</a></div>
</div>

<div class="col-md-6 col-lg-6 col-xl-4">
<div class="footer-item mt-5">
<h4 class="text-light mb-4">Get in touch</h4>

<div class="d-flex flex-column">
<h6 class="text-secondary mb-0">Our Address</h6>

<div class="d-flex align-items-center border-bottom py-4"><a class="text-body" href="">{{ $company-&gt;address }}</a></div>

<h6 class="text-secondary mt-4 mb-0">Our Mobile</h6>

<div class="d-flex align-items-center py-4"><a class="text-body" href="">{{ $company-&gt;phone }}</a></div>
</div>
</div>
</div>

<div class="col-md-6 col-lg-6 col-xl-4">
<div class="footer-item mt-5">
<h4 class="text-light mb-4">Explore Link</h4>

<div class="d-flex flex-column align-items-start"><a class="text-body mb-2" href="#">Terms and Policy</a></div>
</div>
</div>
{{--

<div class="col-md-6 col-lg-6 col-xl-3">--}} {{--
<div class="footer-item mt-5">--}} {{--
<h4 class="text-light mb-4">Latest Articles</h4>

<p>Latest Articles</p>
--}} {{-- @foreach($latestArticles as $key =&gt; $la)--}} {{--

<div class="d-flex border-secondary py-4 {{ $key == 0 ? 'border-bottom' : 'border-0' }}">--}} {{-- @if($la-&gt;image)--}} {{-- <img alt="article image" class="img-fluid flex-shrink-0 mini-img rounded-3" src="{{ asset('web/img/article/' . $la-&gt;image)}}" />--}} {{-- @endif--}} {{--
<div class="ps-3">--}} {{--
<p class="mb-0 text-muted">Article: {{ $la-&gt;article_name }}</p>
--}} {{-- <span class="mb-0 text-muted d-block">Author: <em>{{ $la-&gt;author_name }}</em></span>--}} {{-- <a class="text-body" href="{{ url('/article/'. $la-&gt;id) }}">{{ Str::of(Str::words($la-&gt;description, 5))-&gt;stripTags() }}</a>--}} {{--</div>
--}} {{--</div>
--}} {{-- @endforeach--}} {{--</div>
--}} {{--</div>
--}}</div>
</div>

<div class="container py-4">
<div class="border-top border-secondary pb-4">&nbsp;</div>

<div class="row">
<div class="col-md-6 text-center text-md-start mb-3 mb-md-0"><a class="border-bottom text-muted">{{ $company-&gt;copy_right_statement }}</a></div>
</div>
</div>
</div>