@php $page = 'footer' @endphp
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
                    <div class="container">
                        <h2>Create Footer Template</h2>
                        <form action="{{ route('admin.footer.store') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label>Name</label>
                                <input type="text" name="name" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label>File Name (Without Extension)</label>
                                <input type="text" name="file_name" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label>Template Content (Blade Code)</label>
                                <textarea name="content" class="form-control" rows="6" required></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
