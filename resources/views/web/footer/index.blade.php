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

                    <div class="table-responsive">
                        <p class="float-right">
                            <a
                                class="btn btn-primary btn-fw"
                                href="{{ route( 'footer.create' ) }}">
                                + {{ ucfirst($page) }} builder
                            </a>
                        </p>
                        <table class="table">
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th>Preview</th>
                                <th>Active</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody id="sortable">
                            @foreach($templates as $template)
                                <tr data-id="{{ $template->id }}">
                                    <td>{{ $template->name }}</td>
                                    <td><img src="{{ asset('web/img/footer_preview_image/'.$template->image) }}" width="50" alt="Preview image"></td>
                                    <td>
                                        @if($template->is_active)
                                            <span class="badge bg-success">Active</span>
                                        @else
                                            <button class="btn btn-sm btn-outline-primary activate-btn" data-id="{{ $template->id }}">Activate</button>
                                        @endif
                                    </td>
                                    <td>
                                        <a class="btn btn-sm btn-warning edit-btn" href="{{ url('admin/site-options/footer/'.$template->id.'/edit') }}">Edit</a>
{{--                                        <a class="btn btn-sm btn-danger delete-btn" href="{{ url('admin/footer/delete/'. $template->id ) }}">Delete</a>--}}
                                        <form action="{{ route('footer.destroy', $template->id) }}" method="POST" style="display:inline;">
                                            @csrf @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                        <script>
                            document.querySelectorAll('.activate-btn').forEach(button => {
                                button.addEventListener('click', function() {
                                    let id = this.dataset.id;
                                    fetch(`/admin/site-options/footer/activate/${id}`, { method: 'GET' })
                                        .then(response => response.json())
                                        .then(data => {
                                            if (data.success) location.reload();
                                        });
                                });
                            });

                            new Sortable(document.getElementById('sortable'), {
                                animation: 150,
                                onEnd: function() {
                                    let order = [...document.querySelectorAll('#sortable tr')].map(el => el.dataset.id);
                                    fetch(`/admin/site-options/footer/update-order`, {
                                        method: 'POST',
                                        headers: { 'Content-Type': 'application/json', 'X-CSRF-TOKEN': '{{ csrf_token() }}' },
                                        body: JSON.stringify({ order })
                                    }).then(() => location.reload());
                                }
                            });
                        </script>

                    </div>

                </div>
            </div>
        </div>
        <!-- #User list -->

    </div>
    <!-- #Data display Area -->
@endsection
