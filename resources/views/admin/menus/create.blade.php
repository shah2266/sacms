@php $section = 'menus' @endphp
@extends('layouts.admin')
@section('title', $section)

@section('section-title', "Create new $section")
@section('currentPage', ucfirst($section))


@section('content')

    @include('admin.includes.breadcrumb')
    @include('admin.includes.display-message')

    <div class="row">

        <div class="col-lg-12 grid-margin">
            <div class="float-right">
                <a
                    class="btn btn-inverse-info btn-fw"
                    href="{{ URL::to("admin/site-options/$section") }}">
                    Back
                </a>
            </div>
        </div>

        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <!-- form start -->
                    <form role="form" method="POST" action="{{ route("$section.store") }}" enctype="multipart/form-data">
                        @include("admin.$section.form")
                        <button type="submit" class="btn btn-inverse-primary btn-fw">Create {{ $section }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
