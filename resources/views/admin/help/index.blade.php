@php $page = 'help' @endphp
@extends('layouts.admin')
@section('title', $page)

@section('section-title', ucfirst($page) . " list")
@section('currentPage', ucfirst($page))

@section('content')

    @include('admin.includes.breadcrumb')
    @include('admin.includes.display-message')

    <!-- Data display Area -->
    <div class="row">
        <!-- User list -->
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">

                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>Serial</th>
                                <th>Title</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>Clear all website cache</td>
                                    <td>
                                        <a class="badge badge-outline-primary" href="{{ url('admin/setting/clear-cache') }}">
                                            <i class="mdi mdi-delete-empty-outline"></i>
                                            Clear cache
                                        </a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
        <!-- #User list -->

    </div>
    <!-- #Data display Area -->
@endsection
