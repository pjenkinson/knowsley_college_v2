jQuery(document).ready(function($) {
    $('#mm_roles select').live('change', function() {
        
        var option = $(this);

        if (option.val() == 'by_role') {
            $('#mm_roles input[type=checkbox]').removeAttr('disabled');
        } else {
            $('#mm_roles input[type=checkbox]').attr('disabled', 'disabled');            
        }

    });

});