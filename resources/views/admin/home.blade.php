@extends('layouts.admin')
@section('title', 'Home')

@section('content')

    <div class="row">
        <div class="col-lg-12">
            <p class="callout bg-inverse-success alert alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <span>Welcome to <b>@yield('company_name')</b> dashboard</span>
            </p>
        </div>
    </div>

    <div class="row">
        <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
            <div class="card">
                <div class="card-body bg-inverse-danger">
                    <div class="row">
                        <div class="col-9">
                            <div class="d-flex align-items-center align-self-start">
                                <p class="mb-0 font-weight-medium"> Total: {{ $Users }}</p>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="icon icon-box-primary">
                                <a href="{{ url('admin/setting/users') }}" class="small-box-footer">
                                    <span class="mdi mdi-link-variant icon-item"></span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <h4 class="text-muted font-weight-normal">Active users</h4>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
            <div class="card">
                <div class="card-body bg-inverse-info">
                    <div class="row">
                        <div class="col-9">
                            <div class="d-flex align-items-center align-self-start">
                                <p class="mb-0 font-weight-medium"> Total: {{ $Contacts }}</p>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="icon icon-box-primary">
                                <a href="{{ url('admin/pages/contact') }}" class="small-box-footer">
                                    <span class="mdi mdi-link-variant icon-item"></span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <h4 class="text-muted font-weight-normal">Total message</h4>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
            <div class="card">
                <div class="card-body bg-gradient-secondary">
                    <div class="row">
                        <div class="col-12">
                            <h4 class="font-weight-normal text-dark">Image optimizer</h4>
                            <div class="d-flex align-items-center align-self-start">
                                <a href="https://compressor.io/" class="mb-0 font-weight-medium d-block text-warning" target="_blank"> https://compressor.io/</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
            <div class="card">
                <div class="card-body bg-gradient-secondary">
                    <div class="row">
                        <div class="col-12">
                            <h4 class="font-weight-normal text-dark">Site cache clean</h4>
                            <div class="d-flex align-items-center align-self-start">
                                <a href="{{ url('admin/setting/help') }}" class="mb-0 font-weight-medium d-block text-deep-success" target="_blank"> Clean</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
