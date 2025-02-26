@php $page = 'page' @endphp
@extends('layouts.admin')
@section('title', $page)

@section('section-title', ucfirst($page) . " manager")
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

                    <div class="table-responsive">
                        <p class="float-right">
                            <a
                                class="btn btn-primary btn-fw"
                                href="{{ route( 'page.create' ) }}">
                                + {{ ucfirst($page) }} builder
                            </a>
                        </p>
                        <table class="table">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Title</th>
                                <th>Slug</th>
{{--                                <th>SEO title</th>--}}
{{--                                <th>SEO description</th>--}}
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($pages as $page)
                                <tr>
                                    <td>{{ $page->id }}</td>
                                    <td>{{ $page->title }}</td>
                                    <td>{{ $page->slug }}</td>
{{--                                    <td>{{ $page->seo_title }}</td>--}}
{{--                                    <td>{{ $page->seo_description }}</td>--}}
                                    <td>
                                        <span class="{{ $page->status ? 'text-success' : 'text-danger' }}">
                                           {{ $page->statusOptions()[$page->status] }}
                                        </span>
                                    </td>

                                    <td style="text-align: right">
                                        <div class="dropdown">
                                            <button class="btn btn-outline-primary dropdown-toggle" type="button"
                                                    id="dropdownMenuOutlineButton1" data-toggle="dropdown"
                                                    aria-haspopup="true" aria-expanded="false"> Action
                                            </button>
                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuOutlineButton1">
                                                <a class="dropdown-item" href="{{ url('admin/page-builder/page/'.$page->id.'/edit') }}">Edit info</a>

                                                @if(Auth::user()->user_type != 2)
                                                    <div class="dropdown-divider"></div>
                                                    <!-- Trigger modal when clicking the "Delete" link -->
                                                    <a class="dropdown-item" href="#"
                                                       data-toggle="modal"
                                                       data-target="#deleteModal"
                                                       data-prefix="admin/page-builder"
                                                       data-entity="page"
                                                       data-entity-id="{{ $page->id }}">
                                                        Delete
                                                    </a>
                                                @endif

                                            </div>
                                        </div>
                                    </td>

                                </tr>
                            @endforeach
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
