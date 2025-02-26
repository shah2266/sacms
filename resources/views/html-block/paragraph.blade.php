@extends('layouts.block')
@section('title', 'blocks')
@section('content')
    <div class="container-fluid bg-light">
        <div class="container">
            <div class="row">
                <h2 class="mb-4 mt-3"><a href="{{ url('admin/page-builder/block') }}">Go to dashboard</a></h2>
            </div>
        </div>
    </div>

    @php
        $text_block_one=<<<HTML
<!-- Text -->
<div class="container-fluid team py-5">
    <div class="container py-5">
        <div class="d-flex flex-column mx-auto text-center mb-5 wow fadeInUp" data-wow-delay="0.2s" style="max-width: 800px;">
            <h4 class="text-primary">Our Team</h4>
            <h1 class="display-4 mb-4">Electricity Service offerings</h1>
            <p class="mb-0">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quidem, deserunt provident ab voluptates rerum eaque eum magni autem atque in minus laboriosam corrupti deleniti voluptatibus rem reiciendis modi veniam animi?
            </p>
        </div>
    </div>
</div>
<!-- Text -->
HTML;
        $text_block_two =<<<HTML
<!-- Text -->
<div class="container-fluid team py-5">
    <div class="container py-5">
        <div class="d-flex flex-column mx-auto text-left mb-5 wow fadeInUp" data-wow-delay="0.2s" style="max-width: 800px;">
            <h4 class="text-primary">Our Team</h4>
            <h1 class="display-4 mb-4">Electricity Service offerings</h1>
            <p class="mb-0">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quidem, deserunt provident ab voluptates rerum eaque eum magni autem atque in minus laboriosam corrupti deleniti voluptatibus rem reiciendis modi veniam animi?
            </p>
        </div>
    </div>
</div>
<!-- Text -->
HTML;
        $text_block_three =<<<HTML
<!-- Text -->
<div class="container-fluid team py-5">
    <div class="container py-5">
        <div class="d-flex flex-column mx-auto text-center mb-5 wow fadeInUp" data-wow-delay="0.2s" style="max-width: 800px;">
            <p class="mb-0">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quidem, deserunt provident ab voluptates rerum eaque eum magni autem atque in minus laboriosam corrupti deleniti voluptatibus rem reiciendis modi veniam animi?
            </p>
        </div>
    </div>
</div>
<!-- Text -->
HTML;
        $text_block_four =<<<HTML
<!-- Text -->
<div class="container-fluid team py-5">
    <div class="container py-5">
        <div class="d-flex flex-column mx-auto text-left mb-5 wow fadeInUp" data-wow-delay="0.2s" style="max-width: 800px;">
            <p class="mb-0">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quidem, deserunt provident ab voluptates rerum eaque eum magni autem atque in minus laboriosam corrupti deleniti voluptatibus rem reiciendis modi veniam animi?
            </p>
        </div>
    </div>
</div>
<!-- Text -->
HTML;

        $text_block_five =<<<HTML
<!-- Text -->
<div class="container-fluid team py-5">
    <div class="container py-5">
        <div class="d-flex flex-column mx-auto text-left mb-5 wow fadeInUp" data-wow-delay="0.2s">
            <p class="mb-0">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quidem, deserunt provident ab voluptates rerum eaque eum magni autem atque in minus laboriosam corrupti deleniti voluptatibus rem reiciendis modi veniam animi?
            </p>
        </div>
    </div>
</div>
<!-- Text -->
HTML;

        $blocks = [
            'text_block_one' => 'Text block 1',
            'text_block_two' => 'Text block 2',
            'text_block_three' => 'Text block 3',
            'text_block_four' => 'Text block 4',
            'text_block_five' => 'Text block 5',
        ];
    @endphp

            <!-- Loop through blocks dynamically -->
    @foreach($blocks as $blockKey => $blockTitle)
        <div class="container-fluid bg-light">
            <div class="container">
                <div class="row">
                    <h2 class="mb-4 mt-5">{{ $blockTitle }}</h2>
                    <div class="col-md-12">
                        <!-- Replace image with preview content -->
                        <div class="code-container">
                            <button class="copy-btn" id="copy-btn-{{ $blockKey }}">Copy</button>
                            <button class="edit-btn" id="edit-btn-{{ $blockKey }}">Edit</button>
                            <button class="preview-btn" id="preview-btn-{{ $blockKey }}">Preview</button>
                            <pre class="line-numbers" id="pre-block-{{ $blockKey }}">
                            <code class="language-html" id="code-{{ $blockKey }}">{{ $$blockKey }}</code>
                        </pre>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12 mb-4">
                        <!-- Preview content area (hidden by default) -->
                        <div class="preview-container" id="preview-container-{{ $blockKey }}" style="display:none; margin-top: 20px; border: 1px solid #ccc;">
                            <div id="preview-content-{{ $blockKey }}" class="preview-content"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection

<!-- Pass dynamic block keys to JavaScript -->
<script>
    // Use the keys of the array and pass it to JavaScript
    const blocks = @json(array_keys($blocks));
</script>

