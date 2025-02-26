@csrf

<div class="form-group row">
    <div class="col-md-6 col-sm-12 mb-4">
        <label for="menu_id">Menu id:<code>*</code></label>
        <select class="form-control select2 " name="menu_id" id="menu_id">
            <option value="">---- Select menu ----</option>
            @foreach($menus as $key => $menu)
                <option
                    value="{{ $menu->id }}"
                    {{ (string) old('menu_id', $menuItem->menu_id) === (string) $menu->id ? 'selected' : '' }} >
                    {{ $menu->name }}
                </option>
            @endforeach
        </select>
        @if ($errors->has('menu_id'))
            <span class="error-message" role="alert">
                {{ $errors->first('menu_id') }}
            </span>
        @endif
    </div>
    <div class="col-md-6 col-sm-12 mb-4">
        <label for="title">Title:<code>*</code></label>
        <input
            type="text"
            class="form-control {{ $errors->has('title') ? ' has-error':'' }}"
            name="title" id="title"
            value="{{old('title') ?? $menuItem->title }}"
            placeholder="Enter page title"
        >
        @if ($errors->has('title'))
            <span class="error-message" role="alert">
                {{ $errors->first('title') }}
            </span>
        @endif
    </div>

    <div class="col-md-6 col-sm-12 mb-4">
        <label for="url">Slug/url:<code>*</code></label>
        <input
            type="text"
            class="form-control {{ $errors->has('url') ? ' has-error':'' }}"
            name="url" id="url"
            value="{{old('url') ?? $menuItem->url }}"
            placeholder="Enter page url"
        >
        @if ($errors->has('url'))
            <span class="error-message" role="alert">
                {{ $errors->first('url') }}
            </span>
        @endif
    </div>

    <div class="col-md-6 col-sm-12 mb-4">
        <label for="page_id">Page:<code>*</code></label>
        <select class="form-control select2 " name="page_id" id="page_id">
            <option value="">---- Select page ----</option>
            @foreach($pages as $key => $page)
                <option
                    value="{{ $page->id }}"
                    {{ (string) old('page_id', $menuItem->page_id) === (string) $page->id ? 'selected' : '' }}>
                    {{ $page->title }}
                </option>
            @endforeach
        </select>
        @if ($errors->has('page_id'))
            <span class="error-message" role="alert">
                {{ $errors->first('page_id') }}
            </span>
        @endif
    </div>

    <div class="col-md-6 col-sm-12 mb-4">
        <label for="parent_id">Parent Menu Item (Optional):</label>
        <select class="form-control select2 " name="parent_id" id="parent_id">
            <option value="">---- Select Parent Menu Item ----</option>
            @foreach($parents as $key => $parent)
                <option
                    value="{{ $parent->id }}"
                    {{ (string) old('parent_id', $menuItem->parent_id) === (string) $parent->id ? 'selected' : '' }}>
                    {{ $parent->title }}
                </option>
            @endforeach
        </select>
        @if ($errors->has('parent_id'))
            <span class="error-message" role="alert">
                {{ $errors->first('parent_id') }}
            </span>
        @endif
    </div>
    <div class="col-md-6 col-sm-12 mb-4">
        <label for="order">Order:<code>*</code></label>
        <input
            type="text"
            class="form-control {{ $errors->has('order') ? ' has-error':'' }}"
            name="order" id="order"
            value="{{old('order') ?? $menuItem->order }}"
            placeholder="Enter order"
        >
        @if ($errors->has('order'))
            <span class="error-message" role="alert">
                {{ $errors->first('order') }}
            </span>
        @endif
    </div>
    <div class="col-md-6 col-sm-12 mb-4">
        <label for="status">Status:<code>*</code></label>
        <select class="form-control select2 " name="status" id="status">
            @foreach($menuItem->statusOptions() as $key => $value)
                <option value="{{ $key }}"
                    {{ (string) old('status', $menuItem->status) === (string) $key ? 'selected' : '' }}>
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
