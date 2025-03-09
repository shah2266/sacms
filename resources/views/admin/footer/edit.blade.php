@php $page = 'footer' @endphp
@extends('layouts.admin')
@section('title', 'Edit Footer Template')

@section('section-title', 'Edit Footer Template')
@section('currentPage', 'Edit Footer')

@section('content')

    @include('admin.includes.breadcrumb')
    @include('admin.includes.display-message')

    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="container">
                        <h2>Edit Footer Template</h2>
                        <form action="{{ route('admin.footer.update', $template->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label>Name</label>
                                <input type="text" name="name" class="form-control" value="{{ $template->name }}" required>
                            </div>
                            <div class="mb-3">
                                <label>File Name (Without Extension)</label>
                                <input type="text" name="file_name" class="form-control" value="{{ $template->file_name }}" required>
                            </div>
                            <div class="mb-3">
                                <label>Template Content (Blade Code)</label>
                                <textarea name="content" class="form-control" id="description"  rows="6" required>{{ $content }}</textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
