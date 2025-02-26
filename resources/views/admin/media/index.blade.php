@php $section = 'media' @endphp
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
                                href="{{ route( 'admin.media.create' ) }}">
                                + Add {{ $section }}
                            </a>
                        </p>
                        <table class="table">
                            <thead>
                            <tr>
                                <th>Id</th>
                                <th>Image</th>
                                <th>Path</th>
                                <th>Size</th>
                                <th>Type</th>
                                <th>Width</th>
                                <th>Height</th>
                                <th>Alt text</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($medias as $media)
                                <tr>
                                    <td>{{ $media->id }}</td>
                                    <td>
                                        <a href="{{ asset('web/img/media' . $media->image) }}">
                                            <img src="{{ asset('web/img/media/' . $media->image) }}" alt=" {{ __('Image')}}" loading="lazy">
                                        </a>
                                    </td>
                                    <td>
                                        <p class="copy-container">
                                            <span class="copyUrl">{{ asset($media->file_path) }}</span>
                                            <span class="tooltip-text">Double-click to copy</span>
                                        </p>
                                    </td>
                                    <td>{{ $media->file_size }}</td>
                                    <td>{{ $media->file_type }}</td>
                                    <td>{{ $media->width }}</td>
                                    <td>{{ $media->height }}</td>
                                    <td>{{ $media->alt_text }}</td>

                                    <td style="text-align: right">
                                        <div class="dropdown">
                                            <button class="btn btn-outline-primary dropdown-toggle" type="button"
                                                    id="dropdownMenuOutlineButton1" data-toggle="dropdown"
                                                    aria-haspopup="true" aria-expanded="false"> Action
                                            </button>
                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuOutlineButton1">
                                                <a class="dropdown-item" href="{{ url('admin/media/'.$media->id.'/edit') }}">Edit info</a>

                                                @if(Auth::user()->user_type != 2)
                                                    <div class="dropdown-divider"></div>
                                                    <!-- Trigger modal when clicking the "Delete" link -->
                                                    <a class="dropdown-item" href="#"
                                                       data-toggle="modal"
                                                       data-target="#deleteModal"
                                                       data-prefix="admin"
                                                       data-entity="media"
                                                       data-entity-id="{{ $media->id }}">
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

<script>
    document.addEventListener("DOMContentLoaded", function () {
        const copyContainers = document.querySelectorAll(".copy-container");

        copyContainers.forEach(container => {
            const textElement = container.querySelector(".copyUrl");
            const tooltip = container.querySelector(".tooltip-text");

            container.addEventListener("dblclick", function () {
                const text = textElement.innerText || textElement.textContent;

                if (navigator.clipboard && window.isSecureContext) {
                    navigator.clipboard.writeText(text).then(() => {
                        showCopiedMessage(container, tooltip);
                    }).catch(err => {
                        console.error("Clipboard copy failed: ", err);
                    });
                } else {
                    const textarea = document.createElement("textarea");
                    textarea.value = text;
                    document.body.appendChild(textarea);
                    textarea.select();
                    try {
                        document.execCommand("copy");
                        showCopiedMessage(container, tooltip);
                    } catch (err) {
                        console.error("Fallback copy failed: ", err);
                    }
                    document.body.removeChild(textarea);
                }
            });
        });

        function showCopiedMessage(container, tooltip) {
            tooltip.textContent = "Copied!";
            container.classList.add("copied");
            setTimeout(() => {
                tooltip.textContent = "Double-click to copy";
                container.classList.remove("copied");
            }, 1500);
        }
    });

</script>
