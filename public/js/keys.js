$(function() {

    shifted = false;
    faded   = false;

    iterator = $('#item-table tr');
    selected = iterator.first();
    selected.addClass('selected');
    selected.find('i').toggle();

    $('input').keypress(function( event ) {
        shifted = event.shiftKey;
        press   = event.type == 'keypress'; 
        code    = event.charCode;

        console.log(code);

        if ( press && code == 13 ) {
            // Return: 
            
            // prevents document and body from handling this event.
            event.stopPropagation();

            upperrowfocused   = $('#upper-name-input').is(':focus') || $('#upper-due-input').is(':focus');
            lowerrowfocused   = $('#lower-name-input').is(':focus') || $('#lower-due-input').is(':focus');

            iname = upperrowfocused ? $('#upper-name-input').val() : $('#lower-name-input').val();
            idue  = upperrowfocused ? 'today' : 'someday';

            if (iname !== '')
            {
                $.ajax({
                    url: '/add/' + iname + '/' + idue,
                    type: 'get',
                    success: function (data) {
                        location.reload();
                    }
                });
            }

            $('#upper-name-input').val('');
            $('#lower-name-input').val('');
            $('#upper-due-input').val('');
            $('#lower-due-input').val('');

            $('input').blur();
            $('#upper-input-row').hide();
            $('#lower-input-row').hide();
        }
    });

    $(document).keypress(function( event ) {

        if ( $('input:focus').length > 0 
        ||   $('#focused').length > 0 ) {  
            return; 
        }

        shifted = event.shiftKey;
        press   = event.type == 'keypress'; 
        code    = event.charCode;

        console.log(code);

        fade    = $('#fade');
        form    = $('#input-form');
        title   = $('#title');
        if ( press && code == 13 ) {
            // Return: Edit an existing item
            li = $('#item-table tr');
            li.each(function ( idx, element) {
                if ($(this).hasClass('selected'))
                {
                    // Convert col to input
                    col = $(this).find('td.leftcol');
                    content = col.text();
                    col.text('');
                    input = '<input class="focused" type="text" value="' + content + '"></input>';
                    col.append(input)
                    $('.focused').focus().select();

                    $('.focused').keypress(function( event ) {

                        shifted = event.shiftKey;
                        press   = event.type == 'keypress'; 
                        code    = event.charCode;

                        if ( press && code == 13 ) {

                            iname = $(this).val();
                            if (iname !== '')
                            {
                                var id = 0;
                                li = $('#item-table tr');
                                li.each(function ( idx, element) {
                                    if ($(this).hasClass('selected'))
                                    {
                                        id = $(this).find('.id').text();
                                    }
                                });

                                // Update value in DB
                                $.ajax({
                                    url: '/update/' + id + '/' + iname,
                                    type: 'get',
                                    success: function (data) {
                                        location.reload();
                                    }
                                });
                            }
                        }
                    });
                }
            });
        }
        if ( shifted && press && code == 63 ) {
            // ?: Show commands
            fade.toggle();
            form.toggle();
            title.toggle();
        }
        if ( press && ( code == 73 || code == 65 )) {
            // A or I: Add to bottom of list
            $('#upper-input-row').hide();
            $('#lower-input-row').toggle();
            $('#lower-name-input').focus();
        }
        if ( press && ( code == 97 || code == 105 )) {
            // a or i: Add to top of list
            $('#lower-input-row').hide();
            $('#upper-input-row').toggle();
            $('#upper-name-input').focus();
        }
        if ( press && code == 106 ) {
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
        if ( press && code == 107 ) {
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
        if ( shifted && press && code == 74 ) {
            // J: Move item down
            li = $('#item-table tr');
            li.each(function ( idx, element) {
                if ($(this).hasClass('selected'))
                {
                    id = $(this).find('.id').text();
                }
            });

            $.ajax({
                url: '/incridx/' + id,
                type: 'get',
                success: function (data) {
                    location.reload();
                }
            });
        }
        if ( shifted && press && code == 75 ) {
            // K: Move item up
            li = $('#item-table tr');
            li.each(function ( idx, element) {
                if ($(this).hasClass('selected'))
                {
                    id = $(this).find('.id').text();
                }
            });

            $.ajax({
                url: '/decridx/' + id,
                type: 'get',
                success: function (data) {
                    location.reload();
                }
            });
        }
        if ( press && code == 100 ) {
            // d: Defer an item
            var id = 0;
            li = $('#item-table tr');
            li.each(function ( idx, element) {
                if ($(this).hasClass('selected'))
                {
                    id = $(this).find('.id').text();
                }
            });

            $.ajax({
                url: '/defer/' + id,
                type: 'get',
                success: function (data) {
                    location.reload();
                }
            });
        }
        if ( shifted && press && code == 68 ) {
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

                iterator = $('#item-table tr');
                selected = iterator.first();
                selected.addClass('selected');
                selected.find('i').toggle();
            });
        }
        if ( press && code == 103 ) {
            // g: Go to top
            li = $('#item-table tr');
            li.each(function ( idx, element) {
                $(this).removeClass('selected');
                $(this).find('i').hide();
            });

            iterator = $('#item-table tr');
            selected = iterator.first();
            selected.addClass('selected');
            selected.find('i').toggle();
        }
        if ( shifted && press && code == 71 ) {
            // G: Go to bottom
            li = $('#item-table tr');
            li.each(function ( idx, element) {
                $(this).removeClass('selected');
                $(this).find('i').hide();
            });

            iterator = $('#item-table tr');
            selected = iterator.last();
            selected.addClass('selected');
            selected.find('i').toggle();
        }
        if ( press && code == 116 ) {
            // t: Filter by day
            li = $('#item-table tr');
            li.each(function ( idx, element) {
                todays = $(this).find('.rightcol').text() == 'today';
                if (!todays)
                    $(this).hide();
            });

        }
        event.preventDefault();
    });

    $(document).keyup(function( event ) {
        shifted = false;
    });
});
