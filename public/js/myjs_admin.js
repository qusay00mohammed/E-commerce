$(document).ready(function() {
    'use strict';

    // Trigger the selectboxit
    $("select").selectBoxIt({
        autoWidth: false
    });

    // Calls the selectBoxIt method on your HTML select box
    $("select").selectBoxIt({

        // Uses the jQueryUI 'shake' effect when opening the drop down
        showEffect: "shake",

        // Sets the animation speed to 'slow'
        showEffectSpeed: 'slow',

        // Sets jQueryUI options to shake 1 time when opening the drop down
        showEffectOptions: { times: 1 },

        // Uses the jQueryUI 'explode' effect when closing the drop down
        hideEffect: "explode"

    });


    // Dashboard
    $('.toggle-info').click(function() {
        // $('.panel-body').fadeToggle(200);
        $(this).toggleClass('selected').parent().next('.panel-body').fadeToggle(300);

        if ($(this).hasClass('selected')) {
            $(this).html('<i class="fa fa-minus fa-lg"></i>');
        } else {
            $(this).html('<i class="fa fa-plus fa-lg"></i>');
        }
    });


    // Hide placeholder on form focus
    $('[placeholder]').focus(function() {
        $(this).attr('datatext', $(this).attr('placeholder'));
        $(this).attr('placeholder', '');
    }).blur(function() {
        $(this).attr('placeholder', $(this).attr('datatext'));
    });

    // // Add asterisk on required field
    // $('input').each(function(){
    //     if($(this).attr('required')==='required') {
    //         $(this).after('<span class="asterisk">*</span>');
    // }
    // })

    // Convert password field to text field on hover
    $('.show-pass').hover(function() {
        $('.pass').attr('type', 'text');
    }, function() {
        $('.pass').attr('type', 'password');
    });

    // Confirmation message on button
    $('.confirm').click(function() {
        return confirm('Are you sure ?');
    })

    // Category view option
    $('.cat h3').click(function() {
        $(this).next('.full-view').fadeToggle(200);
    });


    // Show delete button on child cats
    $('.child-link').hover(function() {
        $(this).find('.show-del').fadeIn();
    }, function() {
        $(this).find('.show-del').fadeOut();
    })

    $('.option span').click(function() {
        $(this).addClass('active').siblings('span').removeClass('active');

        if ($(this).data('view') === 'full') {
            $('.full-view').fadeIn(200);
        } else {
            $('.full-view').fadeOut(200);
        }
    });


});
