@csrf

<div class="row">

    <!-- Left side column -->
    <div class="col-md-8 col-lg-8 col-sm-12">
        <div class="card">
            <div class="card-body">
                <div class="form-group row">

                    <div class="col-md-6 col-sm-12 mb-4">
                        <label for="status">Status:<code>*</code></label>
                        <select class="form-control select2 " name="status" id="status">
                            @foreach($page->statusOptions() as $key => $value)
                                <option value="{{ $key }}"
                                    {{ (string) old('status', $page->status) === (string) $key ? 'selected' : '' }}>
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

                    <!--Input Fields-->
                    <div class="col-md-6 col-sm-6 mb-4">
                        <label for="template">Template:<code>*</code></label>
                        <select class="form-control select2 " name="template" id="template">
                            <option value="">---- Select template ----</option>
                            @foreach($templates as $key => $name)
                                @php
                                    $lowercaseName = strtolower(str_replace('-', '_', $name));
                                    $isSelected = (old('template') === $lowercaseName) ||
                                      ($page->template && $lowercaseName === $page->template) ||
                                      (strpos($name, "Default") !== false && !$page->template);
                                @endphp
                                <option value="{{ $lowercaseName }}" {{ $isSelected ? 'selected' : '' }} >
                                    {{ $name }}
                                </option>
                            @endforeach
                        </select>
                        @if ($errors->has('template'))
                            <span class="error-message" role="alert">
                            {{ $errors->first('template') }}
                        </span>
                        @endif
                    </div>

                    <!--Input Fields-->
                    <div class="col-md-6 col-sm-12 mb-4">
                        <label for="title">Page title:<code>*</code></label>
                        <input
                            type="text"
                            class="form-control {{ $errors->has('title') ? ' has-error':'' }}"
                            name="title" id="title"
                            value="{{old('title') ?? $page->title }}"
                            placeholder="Enter page title"
                        >
                        @if ($errors->has('title'))
                            <span class="error-message" role="alert">
                                {{ $errors->first('title') }}
                            </span>
                        @endif
                    </div>

                    <div class="col-md-6 col-sm-12 mb-4">
                        <label for="slug">Slug:<code>*</code></label>
                        <input
                            type="text"
                            class="form-control {{ $errors->has('slug') ? ' has-error':'' }}"
                            name="slug" id="slug"
                            value="{{old('slug') ?? $page->slug }}"
                            placeholder="Enter page slug"
                        >
                        @if ($errors->has('slug'))
                            <span class="error-message" role="alert">
                                {{ $errors->first('slug') }}
                            </span>
                        @endif
                    </div>

                    <div class="col-md-12 col-sm-12 mb-4">
                        <label for="description">Content (Optional):</label>
                        <textarea name="content" id="description" cols="30" rows="3" class="form-control {{ $errors->has('content') ? ' has-error':'' }}"
                                  placeholder="Enter page content"
                        >{!! old('content') ?? $page->content !!}</textarea>
                        @if ($errors->has('content'))
                            <span class="error-message" role="alert">
                                {{ $errors->first('content') }}
                            </span>
                        @endif
                    </div>

                </div>
            </div>
        </div>
    </div>

    <!-- Right side column -->
    <div class="col-md-4 col-lg-4 col-sm-12">
        <div class="card">
            <div class="card-body">
                <div class="col-md-12 col-sm-12 mb-4">
                    <h4 class="mb-3">SEO Setting</h4>
                    <label for="seo_title">SEO title (Optional):</label>
                    <textarea name="seo_title" id="seo_title" cols="30" rows="3" class="form-control {{ $errors->has('seo_title') ? ' has-error':'' }}"
                              placeholder="Enter seo title"
                    >{{old('seo_title') ?? $page->seo_title}}</textarea>
                    @if ($errors->has('seo_title'))
                        <span class="error-message" role="alert">
                            {{ $errors->first('seo_title') }}
                        </span>
                    @endif
                </div>

                <div class="col-md-12 col-sm-12 mb-4">
                    <label for="seo_description">SEO description (Optional):</label>
                    <textarea name="seo_description" id="seo_description" cols="30" rows="3" class="form-control {{ $errors->has('seo_description') ? ' has-error':'' }}"
                              placeholder="Enter seo description"
                    >{{old('seo_description') ?? $page->seo_description}}</textarea>
                    @if ($errors->has('seo_description'))
                        <span class="error-message" role="alert">
                            {{ $errors->first('seo_description') }}
                        </span>
                    @endif
                </div>

                <div class="col-md-12 col-sm-12 mb-4">
                    <label for="seo_keywords">SEO keywords (Optional):</label>
                    <textarea name="seo_keywords" id="seo_keywords" cols="30" rows="3" class="form-control {{ $errors->has('seo_keywords') ? ' has-error':'' }}"
                              placeholder="Enter seo keywords"
                    >{{old('seo_keywords') ?? $page->seo_keywords}}</textarea>
                    @if ($errors->has('seo_keywords'))
                        <span class="error-message" role="alert">
                            {{ $errors->first('seo_keywords') }}
                        </span>
                    @endif
                </div>

            </div>
        </div>
    </div>
</div>
