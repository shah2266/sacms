@php $page = 'company' @endphp
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
                        <p class="float-right">
                            <a
                                class="btn btn-primary btn-fw"
                                href="{{ route( 'company.create' ) }}">
                                + Add {{ $page }}
                            </a>
                        </p>
                        <table class="table">
                            <thead>
                            <tr>
                                <th>Id</th>
                                <th>Logo</th>
                                <th>Company name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($companies as $company)
                                <tr>
                                    <td>{{ $company->id }}</td>
                                    <td>
                                        <div class="img-box">
                                            <a href="{{ asset('web/img/company/' . $company->image) }}">
                                                <img src="{{ asset('web/img/company/' . $company->image) }}" alt=" {{ __('Image missing')}}" loading="lazy">
                                            </a>
                                        </div>
                                    </td>
                                    <td>{{ $company->company_name }}</td>
                                    <td>{{ $company->email }}</td>
                                    <td>{{ $company->phone }}</td>
                                    <td>
                                        <span class="{{ $company->status ? 'text-success' : 'text-danger' }}">
                                           {{ $company->statusOptions()[$company->status] }}
                                        </span>
                                    </td>

                                    <td style="text-align: right">
                                        <div class="dropdown">
                                            <button class="btn btn-outline-primary dropdown-toggle" type="button"
                                                    id="dropdownMenuOutlineButton1" data-toggle="dropdown"
                                                    aria-haspopup="true" aria-expanded="false"> Action
                                            </button>
                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuOutlineButton1">
                                                <a class="dropdown-item" href="{{ url('admin/site-settings/company/'.$company->id.'/edit') }}">Edit info</a>

                                                @if(Auth::user()->user_type != 2)
                                                    <div class="dropdown-divider"></div>
                                                    <!-- Trigger modal when clicking the "Delete" link -->
                                                    <a class="dropdown-item" href="#"
                                                       data-toggle="modal"
                                                       data-target="#deleteModal"
                                                       data-prefix="admin/site-settings"
                                                       data-entity="company"
                                                       data-entity-id="{{ $company->id }}">
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
