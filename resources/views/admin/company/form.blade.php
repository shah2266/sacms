@csrf

<div class="row">

    <!-- Left side column -->
    <div class="col-md-7 col-lg-7 col-sm-12">
        <div class="card">
            <div class="card-body">

                <div class="form-group row">
                    <div class="col-md-12 col-sm-12">
                        <h4 class="mb-3">Company profile required information:</h4>
                    </div>

                    <!--favicon-->
                    <div class="col-md-6 col-sm-12 mb-4">
                        <label id="file">Favicon:</label>
                        <input type="file" name="favicon" class="file-upload-default">
                        <div class="input-group col-xs-12">
                            <input type="text"
                                   class="form-control file-upload-info" disabled
                                   placeholder="Upload favicon"
                                   value="{{old('favicon')}}"
                            >
                            <span class="input-group-append">
                                <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                            </span>
                        </div>
                        @if ($errors->has('favicon'))
                            <span class="error-message" role="alert">
                                {{ $errors->first('favicon') }}
                            </span>
                        @endif
                    </div>

                    @if(isset($company->favicon))
                        <div class="col-md-6 col-sm-12 text-center">
                            <div class="img-box2">
                                <a href="{{ asset('web/img/company/' . $company->favicon) }}">
                                    <img src="{{ asset('web/img/company/' . $company->favicon) }}" alt=" {{ __('Favicon missing') }}" loading="lazy">
                                </a>
                            </div>
                        </div>
                    @endif
                    <!--#favicon-->

                </div>

                <div class="form-group row">
                    <!--image-->
                    <div class="col-md-3 col-sm-12 mb-4">
                        <label id="file">Logo:</label>
                        <input type="file" name="image" class="file-upload-default">
                        <div class="input-group col-xs-12">
                            <input type="text"
                                   class="form-control file-upload-info" disabled
                                   placeholder="Upload Image"
                                   value="{{old('image')}}"
                            >
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

                    <div class="col-md-3 col-sm-6 mb-4">
                        <label for="width">Width:</label>
                        <input
                            type="text"
                            class="form-control {{ $errors->has('width') ? ' has-error':'' }}"
                            name="width" id="width"
                            value="{{old('width') ?? $company->width }}"
                            placeholder="Default: 120px"
                        >
                        @if ($errors->has('width'))
                            <span class="error-message" role="alert">
                                {{ $errors->first('width') }}
                            </span>
                        @endif
                    </div>

                    <div class="col-md-3 col-sm-6 mb-4">
                        <label for="height">Height:</label>
                        <input
                            type="text"
                            class="form-control {{ $errors->has('height') ? ' has-error':'' }}"
                            name="height" id="height"
                            value="{{old('height') ?? $company->height }}"
                            placeholder="Default: 60px;"
                        >
                        @if ($errors->has('height'))
                            <span class="error-message" role="alert">
                                {{ $errors->first('height') }}
                            </span>
                        @endif
                    </div>

                    @if(isset($company->image))
                        <div class="col-md-3 col-sm-12 text-center">
                            <div class="img-box">
                                <a href="{{ asset('web/img/company/' . $company->image) }}">
                                    <img src="{{ asset('web/img/company/' . $company->image) }}" alt=" {{ __('Image missing') }}" loading="lazy">
                                </a>
                            </div>
                        </div>
                    @endif
                    <!--#image-->
                </div>

                <div class="form-group row">

                    <div class="col-md-6 col-sm-6 mb-4">
                        <label for="company_name">Company name:<code>*</code></label>
                        <input
                            type="text"
                            class="form-control {{ $errors->has('company_name') ? ' has-error':'' }}"
                            name="company_name" id="company_name"
                            value="{{old('company_name') ?? $company->company_name }}"
                            placeholder="Company name"
                        >
                        @if ($errors->has('company_name'))
                            <span class="error-message" role="alert">
                                {{ $errors->first('company_name') }}
                            </span>
                        @endif
                    </div>

                    <div class="col-md-6 col-sm-6 mb-4">
                        <label for="short_name">Short name:<code>*</code></label>
                        <input
                            type="text"
                            class="form-control {{ $errors->has('short_name') ? ' has-error':'' }}"
                            name="short_name" id="short_name"
                            value="{{old('short_name') ?? $company->short_name }}"
                            placeholder="Short name"
                        >
                        @if ($errors->has('short_name'))
                            <span class="error-message" role="alert">
                                {{ $errors->first('short_name') }}
                            </span>
                        @endif
                    </div>

                    <div class="col-md-6 col-sm-6 mb-4">
                        <label for="phone">Phone:<code>*</code></label>
                        <input
                            type="text"
                            class="form-control {{ $errors->has('phone') ? ' has-error':'' }}"
                            name="phone" id="phone"
                            value="{{old('phone') ?? $company->phone }}"
                            placeholder="Enter phone number"
                        >
                        @if ($errors->has('phone'))
                            <span class="error-message" role="alert">
                                {{ $errors->first('phone') }}
                            </span>
                        @endif

                    </div>

                    <div class="col-md-6 col-sm-6 mb-4">
                        <label for="email">Email:<code>*</code></label>
                        <input
                            type="text"
                            class="form-control {{ $errors->has('email') ? ' has-error':'' }}"
                            name="email" id="email"
                            value="{{old('email') ?? $company->email }}"
                            placeholder="Enter company email address"
                        >
                        @if ($errors->has('email'))
                            <span class="error-message" role="alert">
                                {{ $errors->first('email') }}
                            </span>
                        @endif
                    </div>

                    <div class="col-md-6 col-sm-12 mb-4">
                        <label for="address">Address:<code>*</code></label>
                        <textarea name="address" id="address" cols="30" rows="3" class="form-control {{ $errors->has('address') ? ' has-error':'' }}"
                                  placeholder="Enter vision statement"
                        >{{old('address') ?? $company->address}}</textarea>
                        @if ($errors->has('address'))
                            <span class="error-message" role="alert">
                               {{ $errors->first('address') }}
                            </span>
                        @endif
                    </div>

                    <div class="col-md-6 col-sm-12 mb-4">
                        <label for="copy_right_statement">Copy right statement:<code>*</code></label>
                        <textarea name="copy_right_statement" id="copy_right_statement" cols="30" rows="3" class="form-control {{ $errors->has('copy_right_statement') ? ' has-error':'' }}"
                                  placeholder="Copy right statement"
                        >{{old('copy_right_statement') ?? $company->copy_right_statement}}</textarea>
                        @if ($errors->has('copy_right_statement'))
                            <span class="error-message" role="alert">
                           {{ $errors->first('copy_right_statement') }}
                        </span>
                        @endif
                    </div>

                    <div class="col-md-6 col-sm-6 mb-4">
                        <label for="website">Website:<code>*</code></label>
                        <input
                            type="text"
                            class="form-control {{ $errors->has('website') ? ' has-error':'' }}"
                            name="website" id="website"
                            value="{{old('website') ?? $company->website }}"
                            placeholder="Website link"
                        >
                        @if ($errors->has('website'))
                            <span class="error-message" role="alert">
                                {{ $errors->first('website') }}
                            </span>
                        @endif
                    </div>

                    <div class="col-md-6 col-sm-6 mb-4">
                        <label for="status">Status:<code>*</code></label>
                        <select class="form-control select2 " name="status" id="status">
                            @foreach($company->statusOptions() as $key => $value)
                                <option value="{{ $key }}"
                                    {{ (string) old('status', $company->status) === (string) $key ? 'selected' : '' }}>
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
                    <div class="col-md-12 col-sm-12">
                        <h4 class="mb-3">Basic details:</h4>
                    </div>

                    <div class="col-md-6 col-sm-6 mb-4">
                        <label for="business_model">Business model (Optional):</label>
                        <input
                            type="text"
                            class="form-control {{ $errors->has('business_model') ? ' has-error':'' }}"
                            name="business_model" id="business_model"
                            value="{{old('business_model') ?? $company->business_model }}"
                            placeholder="Business model"
                        >
                        @if ($errors->has('business_model'))
                            <span class="error-message" role="alert">
                            {{ $errors->first('business_model') }}
                        </span>
                        @endif
                    </div>

                    <div class="col-md-6 col-sm-6 mb-4">
                        <label for="founded_date">Founded date (Optional):</label>
                        <input
                            type="text"
                            class="form-control date1 {{ $errors->has('founded_date') ? ' has-error':'' }}"
                            name="founded_date" id="founded_date"
                            value="{{old('founded_date') ?? $company->founded_date }}"
                            placeholder="Founded date"
                        >
                        @if ($errors->has('founded_date'))
                            <span class="error-message" role="alert">
                                {{ $errors->first('founded_date') }}
                            </span>
                        @endif
                    </div>

                    <div class="col-md-6 col-sm-6 mb-4">
                        <label for="employee_count">Employee count (Optional):</label>
                        <input
                            type="text"
                            class="form-control {{ $errors->has('employee_count') ? ' has-error':'' }}"
                            name="employee_count" id="employee_count"
                            value="{{old('employee_count') ?? $company->employee_count }}"
                            placeholder="Total number employees"
                        >
                        @if ($errors->has('employee_count'))
                            <span class="error-message" role="alert">
                            {{ $errors->first('employee_count') }}
                        </span>
                        @endif
                    </div>

                    <div class="col-md-6 col-sm-6 mb-4">
                        <label for="number_of_offices">Number of offices (Optional):</label>
                        <input
                            type="text"
                            class="form-control {{ $errors->has('number_of_offices') ? ' has-error':'' }}"
                            name="number_of_offices" id="number_of_offices"
                            value="{{old('number_of_offices') ?? $company->number_of_offices}}"
                            placeholder="Number of offices"
                        >
                        @if ($errors->has('number_of_offices'))
                            <span class="error-message" role="alert">
                            {{ $errors->first('number_of_offices') }}
                        </span>
                        @endif
                    </div>

                    <div class="col-md-12 col-sm-12">
                        <h4 class="mb-3">Statement details:</h4>
                    </div>

                    <div class="col-md-6 col-sm-12 mb-4">
                        <label for="mission_statement">Mission statement (Optional):</label>
                        <textarea name="mission_statement" id="mission_statement" cols="30" rows="3" class="form-control {{ $errors->has('mission_statement') ? ' has-error':'' }}"
                                  placeholder="Enter mission statement"
                        >{{old('mission_statement') ?? $company->mission_statement}}</textarea>
                        @if ($errors->has('mission_statement'))
                            <span class="error-message" role="alert">
                           {{ $errors->first('mission_statement') }}
                        </span>
                        @endif
                    </div>

                    <div class="col-md-6 col-sm-12 mb-4">
                        <label for="vision_statement">Vision statement (Optional):</label>
                        <textarea name="vision_statement" id="vision_statement" cols="30" rows="3" class="form-control {{ $errors->has('vision_statement') ? ' has-error':'' }}"
                                  placeholder="Enter vision statement"
                        >{{old('vision_statement') ?? $company->vision_statement}}</textarea>
                        @if ($errors->has('vision_statement'))
                            <span class="error-message" role="alert">
                           {{ $errors->first('vision_statement') }}
                        </span>
                        @endif
                    </div>

                    <div class="col-md-12 col-sm-12">
                        <h4 class="mb-3">Social link details:</h4>
                    </div>

                    <div class="col-md-12 col-sm-12 mb-4">
                        <label for="facebook">Facebook (Optional):</label>
                        <input
                            type="text"
                            class="form-control {{ $errors->has('facebook') ? ' has-error':'' }}"
                            name="facebook" id="facebook"
                            value="{{old('facebook') ?? $company->facebook }}"
                            placeholder="Enter facebook link"
                        >
                        @if ($errors->has('facebook'))
                            <span class="error-message" role="alert">
                            {{ $errors->first('facebook') }}
                        </span>
                        @endif
                    </div>

                    <div class="col-md-12 col-sm-12 mb-4">
                        <label for="youtube">Youtube (Optional):</label>
                        <input
                            type="text"
                            class="form-control {{ $errors->has('youtube') ? ' has-error':'' }}"
                            name="youtube" id="youtube"
                            value="{{old('youtube') ?? $company->youtube }}"
                            placeholder="Enter youtube link"
                        >
                        @if ($errors->has('youtube'))
                            <span class="error-message" role="alert">
                            {{ $errors->first('youtube') }}
                        </span>
                        @endif
                    </div>

                    <div class="col-md-12 col-sm-12 mb-4">
                        <label for="linkedin">linkedin (Optional): </label>
                        <input
                            type="text"
                            class="form-control {{ $errors->has('linkedin') ? ' has-error':'' }}"
                            name="linkedin" id="linkedin"
                            value="{{old('linkedin') ?? $company->linkedin }}"
                            placeholder="Enter linkedin link"
                        >
                        @if ($errors->has('linkedin'))
                            <span class="error-message" role="alert">
                            {{ $errors->first('linkedin') }}
                        </span>
                        @endif

                        <!-- Hidden Field -->
                        <input
                            type="hidden"
                            class="form-control {{ $errors->has('licence_key') ? ' has-error':'' }}"
                            name="licence_key" id="licence_key"
                            value="{{old('licence_key') ?? $company->licence_key }}"
                            placeholder="licence_key"
                        >
                    </div>

                </div>

            </div>
        </div>
    </div>
</div>
