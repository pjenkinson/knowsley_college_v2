jQuery(document).ready(function($) {

    var mm_choose_icon_frame;

    $('#mm_choose_icon, #mm_change_icon').live('click', function(event){

        event.preventDefault();

        var link = $(event.target);

        var $this = $(this);

        // Create the media frame.
        mm_choose_icon_frame = wp.media.frames.file_frame = wp.media({
            title: megamenu_custom_icon.file_frame_title,
            library: {type: 'image'},
            button: {
                text: $this.attr('data-button-text') // button text
            }
        });

        // When an image is selected, run a callback.
        mm_choose_icon_frame.on('select', function() {

            var selection = mm_choose_icon_frame.state().get('selection');

            selection.map( function(attachment) {
                attachment = attachment.toJSON();
                attachment_id = attachment.id;
                attachment_url = attachment.sizes.thumbnail.url;
            });


            $("#mm_icon").attr('src', attachment_url).show();
            $("input#custom_icon_id").val(attachment_id);

            if (link.attr('id') != 'mm_change_icon') {
                $("#mm_choose_icon").toggle();
                $("#mm_change_icon").toggle();
                $("#mm_remove_icon").toggle();
            }
        });

        mm_choose_icon_frame.open();

    });


    $('#mm_remove_icon').live('click', function(event){

        event.preventDefault();

        jQuery("#mm_icon").attr('src', "").hide();
        jQuery("input#custom_icon_id").val('false');
        jQuery("#mm_choose_icon").toggle();
        jQuery("#mm_change_icon").toggle();
        jQuery("#mm_remove_icon").toggle();

    });



});