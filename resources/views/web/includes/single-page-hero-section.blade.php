@if(isset($banner->type) && $banner->type === 'banner')
    <div class="container-fluid hero-header"
         style="background-image: url({{asset('web/img/hero/'. $banner->image)}});
     background-size: cover; background-position: center center; background-repeat: no-repeat; background-color: {{ $banner->bg_color }}">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="animated fadeIn text-center">
                        <h1 class="display-3 py-5" style="color: {{ $banner->title_color }}!important;">{{ $banner->title }}</h1>
                        <p class="mb-5 fs-5" style="color: {{ $banner->sub_title_color }}!important;">{{ Str::words($banner->sub_title, 6, '') }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@else
    <div class="container-fluid hero-header">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="animated fadeIn text-center">
                        {{--<h5 class="display-5 text-danger">{{ 'Set banner'}}</h5>--}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif

