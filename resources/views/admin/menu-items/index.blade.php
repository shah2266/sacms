@php $section = 'menu-items' @endphp
@extends('layouts.admin')
@section('title', $section)

@section('section-title', ucfirst($section) . " list")
@section('currentPage', ucfirst($section))

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
                        <p class="float-right">
                            <a
                                class="btn btn-primary btn-fw"
                                href="{{ route( 'menu-items.create' ) }}">
                                + Add {{ $section }}
                            </a>
                        </p>
                        <table class="table">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Menu</th>
                                <th>Title</th>
                                <th>Slug/url</th>
                                <th>Page id</th>
                                <th>Type</th>
                                <th>Parent menu name</th>
                                <th>Order</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($menuItems as $items)
                                <tr>
                                    <td>{{ $items->id }}</td>
                                    <td>{{ $items->menu->name }}</td>
                                    <td>{{ $items->title }}</td>
                                    <td>{{ $items->url }}</td>
                                    <td>{{ $items->page->title }}</td>
                                    <td>{{ $items->type }}</td>
                                    <td>{{ $items->parent ? $items->parent->title : 'No Parent' }}</td>
                                    <td>{{ $items->order }}</td>
                                    <td>
                                        <span class="{{ $items->status ? 'text-success' : 'text-danger' }}">
                                           {{ $items->statusOptions()[$items->status] }}
                                        </span>
                                    </td>

                                    <td style="text-align: right">
                                        <div class="dropdown">
                                            <button class="btn btn-outline-primary dropdown-toggle" type="button"
                                                    id="dropdownMenuOutlineButton1" data-toggle="dropdown"
                                                    aria-haspopup="true" aria-expanded="false"> Action
                                            </button>
                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuOutlineButton1">
                                                <a class="dropdown-item" href="{{ url('admin/site-options/menu-items/'.$items->id.'/edit') }}">Edit info</a>

                                                @if(Auth::user()->user_type != 2)
                                                    <div class="dropdown-divider"></div>
                                                    <!-- Trigger modal when clicking the "Delete" link -->
                                                    <a class="dropdown-item" href="#"
                                                       data-toggle="modal"
                                                       data-target="#deleteModal"
                                                       data-prefix="admin/site-options"
                                                       data-entity="menu-items"
                                                       data-entity-id="{{ $items->id }}">
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
