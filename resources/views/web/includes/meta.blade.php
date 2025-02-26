<meta charset="utf-8">
<meta content="width=device-width, initial-scale=1.0" name="viewport">
<meta content="keywords" name="{{ $content->seo_keywords ?? 'seo keywords' }}">
<meta content="description" name="{{ $content->seo_description ?? 'seo description' }}">
<meta name="author" content="{{ config('app.url') }}">
<meta name="robots" content="index, follow">

<!-- Open Graph Meta Tags (For Social Media) -->
<meta property="og:title" content="{{ $content->seo_title ?? 'seo title' }}">
<meta property="og:description" content="{{ $content->seo_description ?? 'seo description' }}">
<meta property="og:image" content="{{ asset('web/img/company/' . $company->image) }}">
<meta property="og:url" content="{{ url()->current() }}">

<!-- Twitter Meta Tags -->
<meta name="twitter:title" content="{{ $content->seo_title ?? 'seo title' }}">
<meta name="twitter:description" content="{{ $content->seo_description ?? 'seo description' }}">
<meta name="twitter:image" content="{{ asset('web/img/company/' . $company->image) }}">
<link rel="canonical" href="{{ url()->current() }}">
