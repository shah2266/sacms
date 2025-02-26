@extends('layouts.web')
@section('title', ucfirst($content->slug) )


@section('content')
    <!-- Hero Start -->
    @include('web.includes.single-page-hero-section')
    <!-- Hero End -->
    @if($content->content)
    {!! $content->content !!}
    @endif
@endsection
