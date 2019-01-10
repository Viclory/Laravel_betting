$(document).ready(function(){
    // console.log($.validator.prototype);
});


function initFormValidation(formId, formObj) {

    //console.log(formName == 'registration');
    if (formId == 'registration') {
        // console.log($.validator.defaults);
        $(formObj).validate({
            ignore: [],
            // debug: true,
            focusCleanup: true,
            focusInvalid: true,
            //onfocusout: true,
            errorPlacement: function(error, element){


                var field_error = '<div class="field-error"><div class="align-m">' +
                    '<p>' + error.text() + '</p>' + '</div>' + '</div>';

                if (element.attr('name') == 'registration_currency') {
                    $(field_error).insertAfter($(element).next('span.select2'));
                } else {
                    $(field_error).insertAfter($(element));
                }


            },
            // onkeyup: false,
            //errorClass: "field-error",
            // errorElement: "div",
            // errorContainer: ".field-error ",
            // wrapper: "div",
            success: function(label, element) {
                $(element).parents('.field').find('.field-error').remove();
            },
            submitHandler: function(form){
                console.log('form submitted');
                var data = $(form).serializeArray();
                var data_formatted = {};

                // console.log('erererere');
                // return false;


                // for (field in data) {
                //     if (data[field].name == 'registration_currency') {
                //         data[field].value = 'EUR';
                //     }
                //     if (data[field].name == 'registration_country_id') {
                //         data[field].value = 202 // Slovakia;
                //     }
                //     if (data[field].name == 'calendar1_[day]') {
                //         data[field].value = 12;
                //     }
                //     if (data[field].name == 'calendar1_[month]') {
                //         data[field].value = 07;
                //     }
                //     if (data[field].name == 'calendar1_[year]') {
                //         data[field].value = 1985;
                //     }
                //     // console.log(data[field]);
                // }

                for (field in data) {
                    data_formatted[data[field].name] = data[field].value;
                }
                // console.log($(form).find('[name="calendar1_[day]"]').val());
                // return false;


                var registerObj = {
                    // name: $('#register-player-form #name').val(),
                    email: data_formatted.registration_email,
                    username: data_formatted.registration_login,
                    password: data_formatted.registration_password,
                    dob: $(form).find('[name="calendar1"]').val(),
                    currency: data_formatted.registration_currency,
                    // phone: $('#register-player-form #phone').val(),
                    country_id: data_formatted.registration_country_id,
                    merchant_id: $(form).find('#merchant_id').val(),
                    // city: $('#register-player-form input[name="city"]').val(),
                    // address: $('#register-player-form input[name="address"]').val(),
                    // zip: $('#register-player-form input[name="zip"]').val()
                };

                // console.log(registerObj);
                // return false;




                $.post(
                    $(form).attr('action'),
                    registerObj,
                    function(result){
                        var res = $.parseJSON(result);
                        //console.log(res);return false;
                        if (res.status > 0) {
                            top.location.href='/player/just-registered';
                        } else {
                            alert(res.message);
                        }
                    }

                );

            },



            rules: {
                registration_login: {
                    required: true,
                    minlength: 6
                },
                // registration_currency: {
                //     required: true
                // },
                registration_password: {
                    required: true
                },
                registration_confirm_password: {
                    required: true,
                    equalTo: "#registration_password"
                },
                registration_email: {
                    required: true,
                    email: true
                },
                // registration_country_id: {
                //     required: true
                // },
                // calendar1_[day]: {
                //     required: true
                // }
            },
            // messages: {
                // registration_login: {
                //     required: "Login field is required"
                // }
            // }
        });
    }

    if (formId == 'login_form') {
        $(formObj).validate({
            focusCleanup: true,
            success: function(label, element){
                $(element).parents('.field').find('.field-error').remove();
            },
            submitHandler: function(form) {
                $.post(
                    $(form).attr('action'),
                    {
                        username: $(form).find('#login_username').val(),
                        password: $(form).find('#login_password').val(),
                    },
                    function(response) {
                        var resp = $.parseJSON(response);

                        if (typeof resp != 'object') {
                            resp = JSON.parse(resp);
                        }

                        if (resp.status == 0) {
                            alert(resp.message);
                            $(form).find('#login_username').focus();
                            return false;
                        } else {
                            if (resp.result.id > 0) {
                                top.location.reload();
                            }
                        }
                    }
                );
            },
            errorPlacement: function(error, element){
                var field_error = '<div class="field-error"><div class="align-m">' +
                    '<p>' + error.text() + '</p>' + '</div>' + '</div>';

                $(field_error).insertAfter($(element));
            },
            rules: {
                login_username: {
                    required: true
                },
                login_password: {
                    required: true
                }
            }
        });
    }

    return false;
}

function clearErrors(form)
{
    $(form).find('.field-error').remove();
}

function helpSectionsText()
{
    var url_string = window.location.href
    var url = new URL(url_string);
    var section = url.searchParams.get("section");
    console.log(section);

    if($('#' + section).length > 0) {
        $('#' + section + ' .title').trigger('click');
    }
}