@php $page = 'HTML' @endphp
@extends('layouts.admin')
@section('title', $page)

@section('section-title', ucfirst($page) . " Blocks")
@section('currentPage', ucfirst($page))

@section('content')

    @include('admin.includes.breadcrumb')
    @include('admin.includes.display-message')

    <!-- Data display Area -->
    <div class="row">
        <!-- Page list -->
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="row">

                        <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body bg-gradient-secondary">
                                    <h4 class="font-weight-normal text-dark">About blocks</h4>
                                    <div class="d-flex align-items-center align-self-start">
                                        <a href="{{ url('admin/page-builder/block/about') }}" class="mb-0 font-weight-medium d-block text-deep-success" target="_blank"> Click here</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body bg-gradient-secondary">
                                    <h4 class="font-weight-normal text-dark">Products</h4>
                                    <div class="d-flex align-items-center align-self-start">
                                        <a href="{{ url('admin/page-builder/block/product') }}" class="mb-0 font-weight-medium d-block text-deep-success" target="_blank"> Click here</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body bg-gradient-secondary">
                                    <h4 class="font-weight-normal text-dark">Service</h4>
                                    <div class="d-flex align-items-center align-self-start">
                                        <a href="{{ url('admin/page-builder/block/service') }}" class="mb-0 font-weight-medium d-block text-deep-success" target="_blank"> Click here</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body bg-gradient-secondary">
                                    <h4 class="font-weight-normal text-dark">Card</h4>
                                    <div class="d-flex align-items-center align-self-start">
                                        <a href="{{ url('admin/page-builder/block/card') }}" class="mb-0 font-weight-medium d-block text-deep-success" target="_blank"> Click here</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body bg-gradient-secondary">
                                    <h4 class="font-weight-normal text-dark">Paragraph</h4>
                                    <div class="d-flex align-items-center align-self-start">
                                        <a href="{{ url('admin/page-builder/block/paragraph') }}" class="mb-0 font-weight-medium d-block text-deep-success" target="_blank"> Click here</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body bg-gradient-secondary">
                                    <h4 class="font-weight-normal text-dark">Others</h4>
                                    <div class="d-flex align-items-center align-self-start">
                                        <a href="{{ url('admin/page-builder/block/others') }}" class="mb-0 font-weight-medium d-block text-deep-success" target="_blank"> Click here</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- #Data display Area -->
@endsection
