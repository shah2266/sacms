@php $page = 'color-settings' @endphp
@extends('layouts.admin')
@section('title', $page)

@section('section-title', ucfirst($page))
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
                            <a class="btn btn-primary btn-fw" data-toggle="modal" data-target="#colorModal" id="addColorBtn"> +Add New Color</a>
                        </p>
                        <table class="table">
                            <thead>
                            <tr>
                                <th>Variable Name</th>
                                <th>Color Code</th>
                                <th>Preview</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($colors as $color)
                                <tr id="colorRow-{{ $color->id }}">
                                    <td>{{ $color->variable_name }}</td>
                                    <td>{{ $color->color_code }}</td>
                                    <td><div style="width: 40px; height: 20px; background-color: {{ $color->color_code }};"></div></td>
                                    <td>
                                        <button class="btn btn-inverse-warning btn-fw editColorBtn" data-id="{{ $color->id }}" data-variable="{{ $color->variable_name }}" data-color="{{ $color->color_code }}">Edit</button>
                                        <button class="btn btn-inverse-danger btn-fw deleteColorBtn" data-id="{{ $color->id }}">Delete</button>
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

    <!-- Modal -->
    <div class="modal fade" id="colorModal" tabindex="-1" role="dialog" aria-labelledby="colorModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form id="colorForm">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="colorModalLabel">Add/Edit Color</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" id="colorId">
                        <div class="form-group">
                            <label>Variable Name:</label>
                            <input type="text" name="variable_name" id="variableName" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Color Code:</label>
                            <input type="text" name="color_code" id="colorCode" class="form-control coloris square" data-coloris required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" id="saveColorBtn">Save</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
