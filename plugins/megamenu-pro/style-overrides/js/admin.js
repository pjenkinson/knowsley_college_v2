jQuery(document).ready(function($) {


    $('.override_toggle_enabled').live('change', function() {
        var checkbox = $(this);
        var checked = checkbox.is(":checked");
        
        var inputs = checkbox.parent().siblings().find('input');

        inputs.each(function() {
            
            var name = $(this).attr('name');

            if (checked) {
                name = name.replace('disabled', 'enabled');
            } else {
                name = name.replace('enabled', 'disabled');
            }

            $(this).attr('name', name);

        });

        var parent = checkbox.parent().parent();

        parent.toggleClass('mega-enabled', 'mega-disabled');

    });

    $('.mm_tab.styling').live('click', function() {

        $(".mm_colorpicker").spectrum({
            preferredFormat: "rgb",
            showInput: true,
            showAlpha: true,
            clickoutFiresChange: true,
            change: function(color) { 
                if (color.getAlpha() === 0) {
                    $(this).siblings('div.chosen-color').html('transparent');
                } else {
                    $(this).siblings('div.chosen-color').html(color.toRgbString());
                }
            }
        });

    });

});