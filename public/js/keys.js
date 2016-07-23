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
        if ( press && code == 13 ) {
            // Return: Show commands
            fade.toggle();
        }
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
        else if ( press && code == 74 ) {
            // J: Move item down
        }
        else if ( press && code == 75 ) {
            // K: Move item up
        }
        else if ( shifted && press && code == 68 ) {
            // D: Delete item from list

            var id = 0;
            li = $('#item-table tr');
            li.each(function ( idx, element) {
                if ($(this).hasClass('selected'))
                {
                    id = $(this).find('.id').text();
                }
            });

            $.get( "/delete/" + id, function( data ) {
                li = $('#item-table tr');
                li.each(function ( idx, element) {
                    if ($(this).hasClass('selected'))
                    {
                        $(this).remove();
                    }
                });
            });
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
