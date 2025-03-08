@php $page = 'hero' @endphp
@extends('layouts.admin')
@section('title', $page)

@section('section-title', ucfirst($page) . " section list")
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
                        <p class="float-right">
                            <a
                                class="btn btn-primary btn-fw"
                                href="{{ route( 'hero.create' ) }}">
                                + Add {{ $page }} section
                            </a>
                        </p>
                        <table class="table">
                            <thead>
                            <tr>
                                <th>Id</th>
                                <th>Image</th>
                                <th>Page</th>
                                <th>Title</th>
                                <th>Sub title</th>
                                <th>Type</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($heroes as $hero)
                                <tr>
                                    <td>{{ $hero->id }}</td>
                                    <td>
                                        <span
                                            class="d-inline-block p-2 mr-2"
                                            style="background-color: {{$hero->bg_color}}; border-radius: 5px;">
                                        <b>{{$hero->bg_color}}</b>
                                        </span>
                                        <a href="{{ asset('web/img/hero/' . $hero->image) }}">
                                            <img src="{{ asset('web/img/hero/' . $hero->image) }}" alt=" {{ __('Image missing')}}" loading="lazy">
                                        </a>
                                    </td>
                                    <td>{{ $pageNames[$hero->page_id] ?? 'Unknown Page' }}</td>
                                    <td>
                                        <span
                                            class="d-inline-block p-2 mr-2"
                                            style="background-color: {{$hero->title_color}}; border-radius: 5px;">
                                            <b>{{$hero->title_color}}</b>
                                        </span>
                                        {{ Str::limit($hero->title,20) }}
                                    </td>
                                    <td>
                                        <span
                                            class="d-inline-block p-2 mr-2"
                                            style="background-color: {{$hero->sub_title_color}}; border-radius: 5px;">
                                            <b>{{$hero->sub_title_color}}</b>
                                        </span>
                                        {{ Str::limit($hero->sub_title, 30) }}
                                    </td>
                                    <td>{{ $hero->hero_type }}</td>
                                    <td>
                                        <span class="{{ $hero->status ? 'text-success' : 'text-danger' }}">
                                           {{ $hero->statusOptions()[$hero->status] }}
                                        </span>
                                    </td>

                                    <td style="text-align: right">
                                        <div class="dropdown">
                                            <button class="btn btn-outline-primary dropdown-toggle" type="button"
                                                    id="dropdownMenuOutlineButton1" data-toggle="dropdown"
                                                    aria-haspopup="true" aria-expanded="false"> Action
                                            </button>
                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuOutlineButton1">
                                                <a class="dropdown-item" href="{{ url('admin/site-options/hero/'.$hero->id.'/edit') }}">Edit info</a>

                                                @if(Auth::user()->user_type != 2)
                                                    <div class="dropdown-divider"></div>
                                                    <!-- Trigger modal when clicking the "Delete" link -->
                                                    <a class="dropdown-item" href="#"
                                                       data-toggle="modal"
                                                       data-target="#deleteModal"
                                                       data-prefix="admin/site-options"
                                                       data-entity="hero"
                                                       data-entity-id="{{ $hero->id }}">
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
