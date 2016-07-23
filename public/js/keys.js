$(function() {

    shifted = false;
    faded   = false;

    iterator = $('#item-table tr');
    selected = iterator.first();
    selected.addClass('selected');
    selected.find('i').toggle();

    $(document).keypress(function( event ) {
        shifted = event.shiftKey;
        press   = event.type == 'keypress';
        code    = event.charCode;

        console.log(code);

        fade    = $('#fade');
        if ( shifted && press && code == 63 ) {
            // ?: Show commands
            fade.toggle();
        }
        else if ( shifted && press && code == 97 ) {
            // A: Add to bottom of list
        }
        else if ( press && code == 97 ) {
            // a: Add to top of list
        }
        else if ( press && code == 106 ) {
            // j: Go down
            li = $('#item-table tr');
            li.each(function ( idx, element) {
                if ($(this).prev().hasClass('selected'))
                {
                    $(this).addClass('selected');
                    $(this).prev().removeClass('selected');
                    $(this).find('i').toggle();
                    $(this).prev().find('i').toggle();
                    return false;
                }
            });
        }
        else if ( press && code == 107 ) {
            // k: Go up
            li = $('#item-table tr');
            li.each(function ( idx, element) {
                if ($(this).next().hasClass('selected'))
                {
                    $(this).addClass('selected');
                    $(this).next().removeClass('selected');
                    $(this).find('i').toggle();
                    $(this).next().find('i').toggle();
                    return false;
                }
            });
        }
        else if ( shifted && press && code == 68 ) {
            // D: Go up
        }
        else if ( shifted && press && code == 103 ) {
            // g: Go to top
        }
        else if ( shifted && press && code == 71 ) {
            // G: Go to bottom
        }
    });

    $(document).keyup(function( event ) {
        shifted = false;
    });
});
