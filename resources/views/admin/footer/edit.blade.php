@extends('layouts.admin')

@section('content')
<h2>Edit Footer Content - {{ $template->name }}</h2>

<form id="footer-content-form">
    @csrf
    <div id="dynamic-fields">
        @foreach($template->content ?? [] as $key => $value)
            <div class="form-group">
                <label>{{ ucfirst($key) }}</label>
                <input type="text" name="content[{{ $key }}]" value="{{ $value }}" class="form-control">
            </div>
        @endforeach
    </div>

    <button type="button" id="add-field-btn" class="btn btn-secondary">+ Add Field</button>
    <button type="submit" class="btn btn-primary">Save Changes</button>
</form>

<script>
    document.getElementById('footer-content-form').addEventListener('submit', function(e) {
        e.preventDefault();

        let formData = new FormData(this);

        fetch('{{ route("admin.footer.update", $template->id) }}', {
            method: 'POST',
            body: formData,
            headers: { 'X-CSRF-TOKEN': '{{ csrf_token() }}' }
        })
        .then(response => response.json())
        .then(data => alert(data.message))
        .catch(error => console.error('Error:', error));
    });

    document.getElementById('add-field-btn').addEventListener('click', function() {
        let fieldContainer = document.getElementById('dynamic-fields');
        let fieldHTML = `
            <div class="form-group">
                <label>New Field</label>
                <input type="text" name="content[new_field]" class="form-control">
            </div>`;
        fieldContainer.insertAdjacentHTML('beforeend', fieldHTML);
    });
</script>
@endsection
