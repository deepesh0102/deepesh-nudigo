var spinner = $('#loader');
// Set default CSRF header
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
        'X-Requested-With': 'XMLHttpRequest'
    }
});
// Intercept login form
$('#login-form').submit(function(e){

    // Prevent normal form submission, we well do in JS instead
    e.preventDefault();

    //loader show
    spinner.show();

    // Get form data
    var data = {
        email: $('#email-login').val(),
        password: $('#password-login').val(),
        user_type: $('#user_type').val(),

       // remember: $('[name=remember]').val(),
    };

    //action of form
    var action = $('#action_login').val();

    // Send the request
    $.ajax({
        type:'POST',
        url: action,
        contentType: 'application/x-www-form-urlencoded; charset=UTF-8',
//            data:{ price: price,  _token: $('#_token').val()},
        data:data,
        beforeSend: function () {
            $('#signin').attr("disabled","disabled");
            // $('.modal-body').css('opacity', '.5');
        },
        success:function(response){
            console.log(response);
            console.log(response.success);

            if(response.success) {
                // If register success, redirect
                window.location.replace(base_url+response.redirect);

            } else {
                spinner.hide();
                    // console.log(key + "_error______________"+val[0]); <strong>{{ $errors->first('name') }}</strong>
                   $("#email_error_login").text(response.error.email);


            }


            $('#signin').removeAttr("disabled");




        },
        error: function (response) {
            //loader hide
            spinner.hide();

            var errorsJson = $.parseJSON(response.responseText);
            // console.log(key + "_error______________"+val[0]); <strong>{{ $errors->first('name') }}</strong>
            $("#email_error_login").text(errorsJson.error.email).css('color','red');

            $('#signin').removeAttr("disabled");

        }
    });
});
// Intercept register form
$('#register-form').submit(function(e){

    // Prevent normal form submission, we well do in JS instead
    e.preventDefault();

    //loader show
    spinner.show();


    // Get form data
    var data = {
        name: $('#name').val(),
        email: $('#email').val(),
        password: $('#password').val(),
        password_confirmation: $('#password-confirm').val(),
    };
    console.log($('#action').val());
    // Send the request

     var action = $('#action').val();

    $.ajax({
        type:'POST',
        url: action,
//            data:{ price: price,  _token: $('#_token').val()},
        data:data,
        beforeSend: function () {
            $('#signup').attr("disabled","disabled");
            // $('.modal-body').css('opacity', '.5');
        },
        success:function(response){
            console.log(response.success);
            console.log(response.error);
            if(response.success) {
                // If register success, redirect
                window.location.replace(base_url+response.redirect);
            } else {

                $.each(response.error, function (key, val) {
                    console.log(key + "_error______________"+val[0]);
                    $("#" + key + "_error").text(val[0]);
                });

            }


            $('#signup').removeAttr("disabled");

            //loader hide
            spinner.hide();

        },
        error: function (response) {


            spinner.hide();
            var errorsJson = $.parseJSON(response.responseText);
            // console.log(key + "_error______________"+val[0]); <strong>{{ $errors->first('name') }}</strong>
            $("#email_error_login").text(errorsJson.error.email).css('color','red');
            $('#signup').removeAttr("disabled");


        }
    });



});
