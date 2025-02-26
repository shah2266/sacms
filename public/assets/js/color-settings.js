$(document).ready(function() {
    // Show modal for adding color
    $('#addColorBtn').click(function() {
        $('#colorForm')[0].reset();
        $('#colorId').val('');
        $('#colorModalLabel').text('Add New Color');
        $('#saveColorBtn').text('Add');
    });

    // Show modal for editing color
    $('.editColorBtn').click(function() {
        $('#colorId').val($(this).data('id'));
        $('#variableName').val($(this).data('variable'));
        $('#colorCode').val($(this).data('color'));
        $('#colorModalLabel').text('Edit Color');
        $('#saveColorBtn').text('Update');
        $('#colorModal').modal('show');
    });

    // Save (Add or Update) Color
    $('#colorForm').submit(function(e) {
        e.preventDefault();
        const id = $('#colorId').val();
        const url = id ? `/admin/site-settings/color/${id}` : $('#colorForm').attr('action');
        const method = id ? 'PUT' : 'POST';

        $.ajax({
            url: url,
            type: method,
            data: $(this).serialize(),
            success: function(response) {
                $('#colorModal').modal('hide');
                //alert(response.success);
                location.reload(); // Reload to update table and CSS variables
            },
            error: function(xhr) {
                alert('Error: ' + xhr.responseJSON.message);
            }
        });
    });

    // Delete Color
    $('.deleteColorBtn').click(function() {
        if (confirm('Are you sure you want to delete this color?')) {
            const id = $(this).data('id');

            $.ajax({
                url: `/admin/site-settings/color/${id}`,
                type: 'DELETE',
                data: {_token: $('meta[name="csrf-token"]').attr('content')},
                success: function(response) {
                    $(`#colorRow-${id}`).remove();
                    //alert(response.success);
                },
                error: function(xhr) {
                    alert('Error: ' + xhr.responseJSON.message);
                }
            });
        }
    });
});
