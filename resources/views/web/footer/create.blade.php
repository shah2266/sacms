@php $section = 'footer' @endphp
@extends('layouts.admin')
@section('title', $section)

@section('section-title', ucfirst($section) . " manager")
@section('currentPage', ucfirst($section))

@section('content')

    @include('admin.includes.breadcrumb')
    @include('admin.includes.display-message')


    <div class="row">

        <div class="col-lg-12 grid-margin">
            <div class="float-right">
                <a
                    class="btn btn-inverse-info btn-fw"
                    href="{{ route('footer.index') }}">
                    Back
                </a>
            </div>
        </div>

        <div class="col-lg-12 grid-margin">
            <!-- form start -->
            <form role="form" method="POST" action="{{ route("$section.store") }}" enctype="multipart/form-data">
                <button type="submit" class="btn btn-inverse-primary btn-fw mb-2">Create {{ $section }}</button>
                @include("web.$section.form")
                <button type="submit" class="btn btn-inverse-primary btn-fw mt-2">Create {{ $section }}</button>
            </form>
        </div>
    </div>

@endsection
