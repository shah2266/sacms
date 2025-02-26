@csrf

<div class="row">

    <!-- Left side column -->
    <div class="col-md-7 col-lg-7 col-sm-12">
        <div class="card">
            <div class="card-body">

                <div class="form-group row">

                    <div class="col-md-6 col-sm-12 mb-4">
                        <label for="status">Hero section type (Select slider for only Home page):<code>*</code></label>
                        <select class="form-control select2 " name="type" id="type">
                            @foreach($hero->heroTypeOptions() as $key => $value)
                                <option value="{{ $key }}"
                                    {{ (string) old('type', $hero->type) === (string) $key ? 'selected' : '' }}>
                                    {{ ucfirst($value) }}
                                </option>
                            @endforeach
                        </select>
                        @if ($errors->has('type'))
                            <span class="error-message" role="alert">
                               {{ $errors->first('type') }}
                            </span>
                        @endif
                    </div>

                    <div class="col-md-6 col-sm-12 mb-4">
                        <label for="page_id">Page:<code>*</code></label>
                        <select class="form-control select2 " name="page_id" id="page_id">
                            <option value="">---- Select page ----</option>
                            @foreach($pages as $key => $value)
                                <option value="{{ $value->id }}"
                                    {{ (string) old('page_id', $hero->page_id) === (string) $value->id ? 'selected' : '' }}>
                                    {{ ucfirst($value->title) }}
                                </option>
                            @endforeach
                        </select>
                        @if ($errors->has('page_id'))
                            <span class="error-message" role="alert">
                               {{ $errors->first('page_id') }}
                            </span>
                        @endif
                    </div>

                    <div class="col-md-3 col-sm-12 mb-4">
                        <label for="title">Title:<code>*</code></label>
                        <input
                            type="text"
                            class="form-control {{ $errors->has('title') ? ' has-error':'' }}"
                            name="title" id="title"
                            value="{{old('title') ?? $hero->title }}"
                            placeholder="Enter title"
                        >
                        @if ($errors->has('title'))
                            <span class="error-message" role="alert">
                                {{ $errors->first('title') }}
                            </span>
                        @endif
                    </div>
                    <div class="col-md-3 col-sm-12 mb-4">
                        <label for="title_color">Title color:</label>
                        <input
                            type="text"
                            class="form-control {{ $errors->has('title_color') ? ' has-error':'' }} coloris square"
                            name="title_color" id="title_color"
                            value="{{ old('title_color') ?? $hero->title_color ?? '#000000' }}"
                        >

                        @if ($errors->has('title_color'))
                            <span class="error-message" role="alert">
                                {{ $errors->first('title_color') }}
                            </span>
                        @endif
                    </div>


                    <div class="col-md-3 col-sm-12 mb-4">
                        <label for="sub_title">Sub title (Optional):</label>
                        <input
                            type="text"
                            class="form-control {{ $errors->has('sub_title') ? ' has-error':'' }}"
                            name="sub_title" id="sub_title"
                            value="{{old('sub_title') ?? $hero->sub_title }}"
                            placeholder="Enter sub title"
                        >
                        @if ($errors->has('sub_title'))
                            <span class="error-message" role="alert">
                                {{ $errors->first('sub_title') }}
                            </span>
                        @endif
                    </div>

                    <div class="col-md-3 col-sm-12 mb-4">
                        <label for="sub_title_color">Sub title color:</label>
                        <input
                            type="text"
                            class="form-control {{ $errors->has('sub_title_color') ? ' has-error':'' }} coloris square"
                            name="sub_title_color" id="sub_title_color"
                            value="{{old('sub_title_color') ?? $hero->sub_title_color ?? '#000000' }}"
                        >

                        @if ($errors->has('sub_title_color'))
                            <span class="error-message" role="alert">
                                {{ $errors->first('sub_title_color') }}
                            </span>
                        @endif
                    </div>

                    <div class="col-md-6 col-sm-12 mb-4">
                        <label for="status">Status:<code>*</code></label>
                        <select class="form-control select2 " name="status" id="status">
                            @foreach($hero->statusOptions() as $key => $value)
                                <option value="{{ $key }}"
                                    {{ (string) old('status', $hero->status) === (string) $key ? 'selected' : '' }}>
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
            </div>
        </div>
    </div>

    <!-- Right side column -->
    <div class="col-md-5 col-lg-5 col-sm-12">
        <div class="card">
            <div class="card-body">

                <div class="form-group row">

                    <div class="col-md-4 col-sm-12 mb-4">
                        <label for="bg_color">Hero section background color:</label>
                        <input
                            type="text"
                            class="form-control {{ $errors->has('bg_color') ? ' has-error':'' }} coloris square"
                            name="bg_color" id="bg_color"
                            value="{{old('bg_color') ?? $hero->bg_color ?? '#000000' }}"
                        >

                        @if ($errors->has('bg_color'))
                            <span class="error-message" role="alert">
                                {{ $errors->first('bg_color') }}
                            </span>
                        @endif
                    </div>

                    <!--image-->
                    <div class="col-md-4 col-sm-12 mb-4">
                        <label id="file">Upload hero section bg image:</label>
                        <input type="file" name="image" class="file-upload-default">
                        <div class="input-group col-xs-12">
                            <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Image">
                            <span class="input-group-append">
                              <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                            </span>
                        </div>
                        @if ($errors->has('image'))
                            <span class="error-message" role="alert">
                                {{ $errors->first('image') }}
                            </span>
                        @endif
                    </div>

                    @if(isset($hero->image))
                        <div class="col-md-4 col-sm-12 text-center">
                            <div class="img-box">
                                <a href="{{ asset('web/img/hero/' . $hero->image) }}">
                                    <img src="{{ asset('web/img/hero/' . $hero->image) }}" alt=" {{ __('Image missing') }}" loading="lazy">
                                </a>
                            </div>
                        </div>
                    @endif
                    <!--#image-->

                </div>

                <div class="form-group row">
                    <div class="col-md-6 col-sm-12 mb-4">
                        <label for="link1">Button link 1 (Optional):</label>
                        <input
                            type="text"
                            class="form-control {{ $errors->has('link1') ? ' has-error':'' }}"
                            name="link1" id="link1"
                            value="{{old('link1') ?? $hero->link1 }}"
                            placeholder="Enter link 1"
                        >
                        @if ($errors->has('link1'))
                            <span class="error-message" role="alert">
                                {{ $errors->first('link1') }}
                            </span>
                        @endif
                    </div>

                    <div class="col-md-6 col-sm-12 mb-4">
                        <label for="link2">Button link 2 (Optional):</label>
                        <input
                            type="text"
                            class="form-control {{ $errors->has('link2') ? ' has-error':'' }}"
                            name="link2" id="link2"
                            value="{{old('link2') ?? $hero->link2 }}"
                            placeholder="Enter link 2"
                        >
                        @if ($errors->has('link2'))
                            <span class="error-message" role="alert">
                                {{ $errors->first('link2') }}
                            </span>
                        @endif
                    </div>

                    <div class="col-md-12 col-sm-12 mb-4">
                        <label for="short_description">Short description (Optional):</label>
                        <textarea name="short_description" id="short_description" cols="30" rows="3" class="form-control {{ $errors->has('short_description') ? ' has-error':'' }}"
                                  placeholder="Enter short description"
                        >{{old('short_description') ?? $hero->short_description}}</textarea>
                        @if ($errors->has('short_description'))
                            <span class="error-message" role="alert">
                               {{ $errors->first('short_description') }}
                            </span>
                        @endif
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
