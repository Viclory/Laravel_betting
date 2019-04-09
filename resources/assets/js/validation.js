$('#full-registration-step1').validate({
			
            focusCleanup: true,
			debug: true,
			rules: {
                username: {
                    required: true,
                    minlength: 4,
                },
                firstname: {
                    required: true,
                    minlength: 2
                },
                lastname: {
                    required: true,
                    minlength: 2
                },
                email: {
                    required: true,
                    email: true,
                },
				password: {
					required: true,
					minlength: 8,
				},
				confirm_password: {
					
					equalTo: "#input-password"
				
				}

            },
            success: function (label, element) {
                $(element).parents('.field').find('.field-error').remove();
				//alert("yes");
            },
             
            errorPlacement: function(error, element){
			    var field_error = '<div class="field-error"><div class="align-m">' +
                    '<p>' + error.text() + '</p>' + '</div>' + '</div>';

                if ($(element).hasClass('select')) {
                    $(field_error).insertAfter($(element).next('span.select2'));
                } else {
                    $(field_error).insertAfter($(element));
                }


            },
		
            
 });
 
 /*$('#full-registration-step2').validate({
			
            focusCleanup: true,
			debug: true,
			rules: {
                username: {
                    required: true,
                    minlength: 4,
                },
                firstname: {
                    required: true,
                    minlength: 2
                },
                lastname: {
                    required: true,
                    minlength: 2
                },
                email: {
                    required: true,
                    email: true,
                },
				password: {
					required: true,
					minlength: 8,
				},
				confirm_password: {
					
					equalTo: "#input-password"
				
				}

            },
            success: function (label, element) {
                $(element).parents('.field').find('.field-error').remove();
				//alert("yes");
            },
             
            errorPlacement: function(error, element){
			    var field_error = '<div class="field-error"><div class="align-m">' +
                    '<p>' + error.text() + '</p>' + '</div>' + '</div>';

                if ($(element).hasClass('select')) {
                    $(field_error).insertAfter($(element).next('span.select2'));
                } else {
                    $(field_error).insertAfter($(element));
                }


            },
		
            
 });
 */

// Start Condition
$('.full-register-next-step-reg').click(function(e){
e.preventDefault();
if (!$('#full-registration-step1').validate().form()) {
    return false;
}
$(".full-register-block-1").css("display", "none");
$(".full-register-block-2").css("display", "block");

});

    
