<!-- resources/views/Users/index.blade.php -->
@extends('layouts.admin')
@section('title', 'Users')

@section('section-title', 'Users list')
@section('currentPage', 'Users')

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
                        @if(Auth::user()->user_type != 2)
                        <p class="float-right">
                            <a
                                class="btn btn-primary btn-fw"
                                href="{{ route( 'users.create' ) }}">
                                Create new user
                            </a>
                        </p>
                        @endif
                        <table class="table">
                            <thead>
                            <tr>
                                <th>Id</th>
                                <th>Picture</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Contact</th>
                                <th>User roles</th>
                                <th>Theme</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $user)
                                <tr class="{{ (Auth::user()->name === $user->name) ? 'text-success' : ''}}">
                                    <td>{{ $user->id }}</td>
                                    <td>
                                        <a href="{{ asset('assets/images/auth/' . $user->image) }}">
                                            <img src="{{ asset('assets/images/auth/' . $user->image) }}" alt=" {{ __('Missing profile image of ') . $user->name }}">
                                        </a>
                                    </td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->contact_number }}</td>
                                    <td>{{ ['Super admin', 'Admin', 'User'][$user->user_type] }}</td>
                                    <td>{{ $user->theme->theme_name ?? 'Theme is not assigned.' }}</td>

                                    <td style="text-align: right">
                                        <div class="dropdown">
                                            <button class="btn btn-outline-primary dropdown-toggle" type="button"
                                                    id="dropdownMenuOutlineButton1" data-toggle="dropdown"
                                                    aria-haspopup="true" aria-expanded="false"> Action
                                            </button>
                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuOutlineButton1">
                                                <a class="dropdown-item" href="{{ url('admin/setting/users/'.$user->id.'/edit') }}">Edit info</a>

                                                @if(Auth::user()->user_type != 2)
                                                <div class="dropdown-divider"></div>
                                                    <a class="dropdown-item" href="#"
                                                       data-toggle="modal"
                                                       data-target="#deleteModal"
                                                       data-prefix="admin/setting"
                                                       data-entity="users"
                                                       data-entity-id="{{ $user->id }}">
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
