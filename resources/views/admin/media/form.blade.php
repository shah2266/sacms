@csrf

<div class="form-group row">
    <!--image-->
    <div class="col-md-6 col-sm-12 mb-4">
        <label id="file">File upload:</label>
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

    @if(isset($media->image))
        <div class="col-md-6 col-sm-12 text-center">
            <div class="img-box">
                <a href="{{ asset('web/img/media/' . $media->image) }}">
                    <img src="{{ asset('web/img/media/' . $media->image) }}" alt=" {{ __('Image') }}" loading="lazy">
                </a>
            </div>
        </div>
    @endif
    <!--#image-->

    <div class="col-md-6 col-sm-12 mb-4">
        <label for="file_name">File name:<code>*</code></label>
        <input
                type="text"
                class="form-control {{ $errors->has('file_name') ? ' has-error':'' }}"
                name="file_name" id="file_name"
                value="{{old('file_name') ?? $media->file_name }}"
                placeholder="Enter file name"
        >
        @if ($errors->has('file_name'))
            <span class="error-message" role="alert">
                {{ $errors->first('file_name') }}
            </span>
        @endif
    </div>

    <div class="col-md-6 col-sm-12 mb-4">
        <label for="alt_text">Alt text:<code>*</code></label>
        <input
                type="text"
                class="form-control {{ $errors->has('alt_text') ? ' has-error':'' }}"
                name="alt_text" id="alt_text"
                value="{{old('alt_text') ?? $media->alt_text }}"
                placeholder="Enter alt text"
        >
        @if ($errors->has('alt_text'))
            <span class="error-message" role="alert">
                {{ $errors->first('alt_text') }}
            </span>
        @endif
    </div>

    <div class="col-md-6 col-sm-12 mb-4">
        <label for="width">Width:<code>*</code></label>
        <input
                type="text"
                class="form-control {{ $errors->has('width') ? ' has-error':'' }}"
                name="width" id="width"
                value="{{old('width') ?? $media->width }}"
                placeholder="Enter width in px"
        >
        @if ($errors->has('width'))
            <span class="error-message" role="alert">
                {{ $errors->first('width') }}
            </span>
        @endif
    </div>

    <div class="col-md-6 col-sm-12 mb-4">
        <label for="height">Height:<code>*</code></label>
        <input
                type="text"
                class="form-control {{ $errors->has('height') ? ' has-error':'' }}"
                name="height" id="height"
                value="{{old('height') ?? $media->height }}"
                placeholder="Enter height in px"
        >
        @if ($errors->has('height'))
            <span class="error-message" role="alert">
                {{ $errors->first('height') }}
            </span>
        @endif
    </div>


</div>





