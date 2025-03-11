@php $section = 'footer' @endphp
@extends('layouts.admin')
@section('title', 'Edit Footer Template')

@section('section-title', 'Edit Footer Template')
@section('currentPage', 'Edit Footer')

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

        <div class="col-lg-12 grid-margin stretch-card">
            <!-- form start -->
            <form role="form" method="POST" action="{{ route('footer.update', $template->id) }}" enctype="multipart/form-data">
                @method('PUT')
                <button type="submit" class="btn btn-inverse-primary btn-fw mb-2">Update {{ $section }}</button>
                @include("web.$section.form")
                <button type="submit" class="btn btn-inverse-primary btn-fw mt-2">Update {{ $section }}</button>
            </form>
        </div>
    </div>

@endsection
