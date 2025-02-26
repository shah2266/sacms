<script src="{{ asset('assets/vendors/js/vendor.bundle.base.js') }}"></script>
<!-- end-inject -->
<!-- Plugin js for this page -->
<script src="{{ asset('assets/vendors/select2/select2.min.js') }}"></script>
<script src="{{ asset('assets/vendors/jvectormap/jquery-jvectormap.min.js') }}"></script>
<script src="{{ asset('assets/vendors/jvectormap/jquery-jvectormap-world-mill-en.js') }}"></script>
<!-- End plugin js for this page -->

<!-- CK Editor -->
<script src="{{ asset('assets/vendors/ckeditor/ckeditor.js') }}"></script>

<!-- Color Picker -->
<script src="{{ asset('assets/vendors/color-picker/coloris.min.js') }}"></script>

<!-- inject:js -->
<script src="{{ asset('assets/js/off-canvas.js') }}"></script>
<script src="{{ asset('assets/js/hoverable-collapse.js') }}"></script>
<script src="{{ asset('assets/js/misc.js') }}"></script>
<script src="{{ asset('assets/js/settings.js') }}"></script>
<script src="{{ asset('assets/js/todolist.js') }}"></script>
<script src="{{ asset('assets/js/file-upload.js') }}"></script>
<!-- end-inject -->

<!-- Custom js for this page -->
<script src="{{ asset('assets/js/dashboard.js') }}"></script>
<!-- End custom js for this page -->
<script src="{{ asset('assets/js/select2.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap-datepicker.js') }}"></script>


<script>
    $(document).ready(function() {
        //Icon search
        $('.icon_search').select2();

        $('#theme-toggle').click(function() {
            // Send AJAX request to toggle theme preference
            $.ajax({
                type: 'POST',
                url: '{{ route("toggleTheme") }}',
                data: {
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {
                    // Handle success response if needed
                    console.log(response.message);
                    // Reload the page in the background
                    location.reload();
                },
                error: function(xhr, status, error) {
                    // Handle error response if needed
                    console.error(error);
                }
            });
        });

        //ckEditor instance, using default configuration.
        CKEDITOR.replace('description', {
            skin: 'moono-lisa', //kama, moono, moono-lisa
            allowedContent: true
        });

    });
</script>

<script>

    /** Color Picker Default configuration **/
    Coloris({
        el: '.coloris',
        themeMode: '{{ isset(Auth::user()->theme->theme_name) && strtolower(Auth::user()->theme->theme_name) === 'light' ? 'light' : 'dark' }}',
        closeButton: true,
        clearButton: true,
        formatToggle: true,
        defaultFormat: 'hex',
        swatches: [
            '#264653',
            '#2a9d8f',
            '#e9c46a',
            '#f4a261',
            '#e76f51',
            '#d62828',
            '#023e8a',
            '#0077b6',
            '#0096c7',
            '#00b4d8',
            '#48cae4'
        ]
    });
</script>

<script src="{{ asset('assets/js/color-settings.js') }}"></script>


