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

    // Switch between login && signup
    $('h1 span').click(function() {
        $(this).addClass('selected').siblings().removeClass('selected');
        $('form').hide();
        $('.' + $(this).data('class')).fadeIn(100);
    });



    // Add asterisk on required field
    $('input').each(function() {
        if ($(this).attr('required') === 'required') {
            $(this).after('<span class="asterisk">*</span>');
        }
    });

    $('.main-form input').each(function() {
        if ($(this).attr('required') === 'required') {
            $(this).after('<span class="asterisk">*</span>');
        }
    });



    // Hide placeholder on form focus
    $('[placeholder]').focus(function() {
        $(this).attr('datatext', $(this).attr('placeholder'));
        $(this).attr('placeholder', '');
    }).blur(function() {
        $(this).attr('placeholder', $(this).attr('datatext'));
    });



    // Convert password field to text field on hover
    $('.show-pass').hover(function() {
        $('.pass').attr('type', 'text');
    }, function() {
        $('.pass').attr('type', 'password');
    });

    // Confirmation message on button
    $('.confirm').click(function() {
        return confirm('Are you sure ?');
    });

    // view item
    // $('.live-name').keyup(function(){
    //     $('.live-preview .captin h3').text($(this).val());
    // });

    // $('.live-desc').keyup(function(){
    //     $('.live-preview .captin p').text($(this).val());
    // });

    // $('.live-price').keyup(function(){
    //     $('.live-preview .price').text('$' + $(this).val());
    // });

    $('.live').keyup(function() {
        $($(this).data('class')).text($(this).val());
    });

});
