@extends('layouts.web')
@section('title', 'contact')


@section('content')
    <!-- Hero Start -->
    @include('web.includes.single-page-hero-section')
    <!-- Hero End -->

    <!-- Contact Start -->
    <div class="container-fluid contact py-5">
        <div class="container py-5">
            <div class="text-center mx-auto mb-5 wow fadeIn" data-wow-delay="0.1s" style="max-width: 700px;">
                {{--                <p class="fs-5 text-uppercase text-primary">{{ $banner->title ?? 'Get In Touch' }}</p>--}}
                {{--                <h1 class="display-3">{{ $banner->sub_title ?? 'Contact For Any Queries' }}</h1>--}}
                <p class="mb-0">{{ $banner->short_description ?? 'Contact For Any Queries' }}</p>
            </div>
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            <form action="{{ route('contact.submit') }}" method="post">
                @csrf
                <div class="row g-4 wow fadeIn" data-wow-delay="0.3s">
                    <div class="col-sm-6">
                        @php
                        $types = [1 => 'General contact', 2 => 'Training']
                        @endphp
                        <select name="contact_type" id="contact_type" class="form-control bg-transparent p-3" required>
                            <option value="">--- Select type ---</option>
                            @foreach($types as $key=> $type)
                                <option value="{{ $key }}"
                                    {{ (string) old('contact_type', $type) === (string) $key ? 'selected' : '' }}>
                                    {{ ucfirst($type) }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-sm-6">
                        <input type="text" name="name" class="form-control bg-transparent p-3" value="{{ old('name') }}" placeholder="Enter your name" required>
                        @error('name') <p class="text-danger">{{ $message }}</p> @enderror
                    </div>
                    <div class="col-sm-6">
                        <input type="email" name="email" class="form-control bg-transparent p-3" value="{{ old('email') }}" placeholder="Enter email" required>
                        @error('email') <p class="text-danger">{{ $message }}</p> @enderror
                    </div>
                    <div class="col-sm-6">
                        <input type="text" name="contact_number" class="form-control bg-transparent p-3" value="{{ old('contact_number') }}" placeholder="Enter contact number" required>
                        @error('contact_number') <p class="text-danger">{{ $message }}</p> @enderror
                    </div>
                    <div class="col-12">
                        <textarea name="address" class="w-100 form-control bg-transparent p-3" rows="2" cols="10" placeholder="Enter address" required>{{ old('address') }}</textarea>
                        @error('address') <p class="text-danger">{{ $message }}</p> @enderror
                    </div>
                    <div class="col-12">
                        <input type="text" name="subject" class="form-control bg-transparent p-3" value="{{ old('subject') }}" placeholder="Enter subject" required>
                        @error('subject') <p class="text-danger">{{ $message }}</p> @enderror
                    </div>
                    <div class="col-12">
                        <textarea name="message" class="w-100 form-control bg-transparent p-3" rows="4" cols="10" placeholder="Enter message" required>{{ old('message') }}</textarea>
                        @error('message') <p class="text-danger">{{ $message }}</p> @enderror
                    </div>
                    <div class="col-12 text-center">
                        <button class="btn btn-primary border-0 py-3 px-5" type="submit">Send Message</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- Contact End -->

@endsection
