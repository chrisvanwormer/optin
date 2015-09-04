$(document).ready(function() {
    $('#sendOptIn').on('click', function() {
        // grab form field data
        var formName    = $('#name').val();
        var formEmail    = $('#email').val();
        var formdata    = 'name=' + formName + '&email=' + formEmail;
        $('#content-thank-you').foundation('reveal', 'open', {
            url: 'php/app.php?script=optin',
            type: 'POST',
            data: formdata,
            success: function(data) {
                //$('#messageName').val('');
                //$('#messageEmail').val('');
                //$('#messageMessage').val('');
            },
            error: function(data) {

                var html = '<h4 class="clickit-section-centered-text">We\'re sorry. Something didn\'t quite go right.  Please try again.</h4><a class="close-reveal-modal">&#215;</a>';
                $('#content-thank-you').html(html);
                $('#content-thank-you').foundation('reveal', 'open');
            }
        });
        return false;
    });
});

$(document).foundation();