@extends('layouts.web')
@section('title', 'Home')


@section('content')
    <!-- Hero Start -->
    @include('web.includes.hero-section')
    <!-- Hero End -->
    @isset($content->content)
        {!! $content->content !!}
    @endisset
@endsection
