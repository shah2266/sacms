@php $page = 'contact' @endphp
@extends('layouts.admin')
@section('title', $page)

@section('section-title', ucfirst($page) . " message list")
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
                                <th>Id</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Contact</th>
                                <th>Address</th>
                                <th>Type</th>
                                <th>Subject</th>
                                <th>Message</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($contacts as $contact)
                                <tr>
                                    <td>{{ $contact->id }}</td>
                                    <td>{{ $contact->name }}</td>
                                    <td>{{ $contact->email }}</td>
                                    <td>{{ $contact->contact_number }}</td>
                                    <td>{{ $contact->address }}</td>
                                    <td>{{ $contact->contactTypeOptions()[$contact->contact_type] }}</td>
                                    <td>{{ $contact->subject }}</td>
                                    <td>{{ $contact->message }}</td>

                                    <!--<td style="text-align: right">
                                        <div class="dropdown">
                                            <button class="btn btn-outline-primary dropdown-toggle" type="button"
                                                    id="dropdownMenuOutlineButton1" data-toggle="dropdown"
                                                    aria-haspopup="true" aria-expanded="false"> Action
                                            </button>
                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuOutlineButton1">
                                                @if(Auth::user()->user_type != 2)
                                                    <div class="dropdown-divider"></div>
                                                    <a class="dropdown-item" href="#"
                                                       data-toggle="modal"
                                                       data-target="#deleteModal"
                                                       data-prefix="admin/pages"
                                                       data-entity="contact"
                                                       data-entity-id="{{ $contact->id }}">
                                                        Delete
                                                    </a>
                                                @endif
                                            </div>
                                        </div>
                                    </td>-->

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
