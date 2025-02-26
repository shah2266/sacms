@csrf

<div class="form-group row">
    <div class="col-md-6 col-sm-12 mb-4">
        <label for="name">Name:<code>*</code></label>
        <input
            type="text"
            class="form-control {{ $errors->has('name') ? ' has-error':'' }}"
            name="name" id="name"
            value="{{old('name') ?? $menu->name }}"
            placeholder="Enter menu name"
        >
        @if ($errors->has('name'))
            <span class="error-message" role="alert">
                {{ $errors->first('name') }}
            </span>
        @endif
    </div>

    <div class="col-md-6 col-sm-12 mb-4">
        <label for="position">Position:<code>*</code></label>
        <select class="form-control select2 " name="position" id="position">
            <option value="">--- Select position ---</option>
            @foreach($menu->menuPositions() as $key => $value)
                <option value="{{ $key }}"
                        {{ (string) old('position', $menu->position) === (string) $key ? 'selected' : '' }}>
                    {{ ucfirst($value) }}
                </option>
            @endforeach
        </select>
        @if ($errors->has('position'))
            <span class="error-message" role="alert">
               {{ $errors->first('position') }}
            </span>
        @endif
    </div>


    <div class="col-md-6 col-sm-12 mb-4">
        <label for="status">Status:<code>*</code></label>
        <select class="form-control select2 " name="status" id="status">
            @foreach($menu->statusOptions() as $key => $value)
                <option value="{{ $key }}"
                    {{ (string) old('status', $menu->status) === (string) $key ? 'selected' : '' }}>
                    {{ ucfirst($value) }}
                </option>
            @endforeach
        </select>
        @if ($errors->has('status'))
            <span class="error-message" role="alert">
               {{ $errors->first('status') }}
            </span>
        @endif
    </div>

</div>
