@csrf

<div class="row">

    <!-- Left side column -->
    <div class="col-md-7 col-lg-7 col-sm-12">
        <div class="card">
            <div class="card-body">
                <div class="form-group row">

                    <div class="col-md-6 col-sm-12 mb-4">
                        <label for="name">Name:<code>*</code></label>
                        <input
                            type="text"
                            class="form-control {{ $errors->has('name') ? ' has-error':'' }}"
                            name="name" id="name"
                            value="{{old('name') ?? $template->name }}"
                            placeholder="Enter name"
                        >
                        @if ($errors->has('name'))
                            <span class="error-message" role="alert">
                                {{ $errors->first('name') }}
                            </span>
                        @endif
                    </div>

                    <div class="col-md-6 col-sm-12 mb-4">
                        <label for="file_name">File Name (Without Extension):</label>
                        <input
                            type="text"
                            class="form-control {{ $errors->has('file_name') ? ' has-error':'' }}"
                            name="file_name" id="file_name"
                            value="{{old('file_name') ?? $template->file_name }}"
                            placeholder="Enter file name"
                        >
                        @if ($errors->has('file_name'))
                            <span class="error-message" role="alert">
                                {{ $errors->first('file_name') }}
                            </span>
                        @endif
                    </div>

                    <div class="col-md-12 col-sm-12">
                        <label for="content">Template Content (Blade Code):</label>
                        <textarea name="content" id="content" cols="30" rows="15" class="form-control {{ $errors->has('content') ? ' has-error':'' }}"
                                  placeholder="Template Content"
                        >{!!  old('content') ?? $content !!}</textarea>
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
    <div class="col-md-5 col-lg-5 col-sm-12">
        <div class="card">
            <div class="card-body">

                <div class="form-group row">

{{--                    <div class="col-md-4 col-sm-12 mb-4">--}}
{{--                        <label for="bg_color">Hero section background color:</label>--}}
{{--                        <input--}}
{{--                            type="text"--}}
{{--                            class="form-control {{ $errors->has('bg_color') ? ' has-error':'' }} coloris square"--}}
{{--                            name="bg_color" id="bg_color"--}}
{{--                            value="{{old('bg_color') ?? $template->bg_color ?? '#000000' }}"--}}
{{--                        >--}}

{{--                        @if ($errors->has('bg_color'))--}}
{{--                            <span class="error-message" role="alert">--}}
{{--                                {{ $errors->first('bg_color') }}--}}
{{--                            </span>--}}
{{--                        @endif--}}
{{--                    </div>--}}

                    <!--image-->
                    <div class="col-md-12 col-sm-12 mb-4">
                        <label id="file">Upload footer preview image:</label>
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
                    <!--#image-->

                    <div class="col-md-6 col-sm-6 mb-4">
                        <label for="width">Width:</label>
                        <input
                                type="text"
                                class="form-control {{ $errors->has('width') ? ' has-error':'' }}"
                                name="width" id="width"
                                value="{{old('width') ?? $company->width }}"
                                placeholder="Default: 800px"
                        >
                        @if ($errors->has('width'))
                            <span class="error-message" role="alert">
                                {{ $errors->first('width') }}
                            </span>
                        @endif
                    </div>

                    <div class="col-md-6 col-sm-6 mb-4">
                        <label for="height">Height:</label>
                        <input
                                type="text"
                                class="form-control {{ $errors->has('height') ? ' has-error':'' }}"
                                name="height" id="height"
                                value="{{old('height') ?? $company->height }}"
                                placeholder="Default: 300px;"
                        >
                        @if ($errors->has('height'))
                            <span class="error-message" role="alert">
                                {{ $errors->first('height') }}
                            </span>
                        @endif
                    </div>

                    @if(isset($template->image))
                        <div class="col-md-12 col-sm-12 text-center">
                            <div>
                                <a href="{{ asset('web/img/footer_preview_image/' . $template->image) }}">
                                    <img
                                        src="{{ asset('web/img/footer_preview_image/' . $template->image) }}"
                                        alt=" {{ __('Image missing') }}"
                                        loading="lazy"
                                        width="600px"
                                        class="img-fluid">
                                </a>
                            </div>
                        </div>
                    @endif

                </div>

            </div>
        </div>
    </div>
</div>
