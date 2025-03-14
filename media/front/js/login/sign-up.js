jQuery(document).ready(function(e) {
    // Call captcha function to load the security code
    refreshCaptha();
$(".navbar-fixed-top").addClass("top-nav-collapse");
    //Call check password strength function to display the message
    $('#user_password').keyup(function() {
        checkStrength($('#user_password').val());
    })

    //For terms and conditions page start
    //jQuery(".ajax").colorbox();

    // For registration form validation start 
    jQuery("#mmm_registration_frm").validate({
        debug: true,
        errorClass: 'text-danger',
        rules: {
            firstname: {required: true},
            phone: {required: true},
            how_find_us: {required: true},
            invite: {email: true},
            parent_email: {email: true},
            email: {
                required: true,
                email: true,
                remote: {
                    url: javascript_site_path + 'chk-email-duplicate',
                    method: 'post'
                }
            },
            phone: {
                required: true,
                remote: {
                    url: javascript_site_path + 'chk-phone-duplicate',
                    method: 'post'
                }
               // chk_phone_duplicate: true
            },
            password: {
                required: true
            },
            password_confirm: {
                required: true,
                equalTo: "#password_input"
            },
            agree: {
                required: true
            },
            input_captcha_value: {
                required: true,
                remote: {
                    url: javascript_site_path + 'check-captcha',
                    method: 'post'
                }
            }
        },
        messages: {
firstname: {
required : "Please enter nickname."
},
            email: {
                required: "Please enter email.",
                email: "Please enter valid email.",
                remote: "This email address already registered with site."
            },
             phone: {
             required: "Please enter phone.",
             //minlength: jQuery.format("Please enter at least {0} charcters."),
           //  chk_username_field:"Please enter a valid username. It must contain 5-20 characters. Characters other than <b>0-9, A-Z , a-z , _ , . , - </b>  are not allowed.",
             remote: "This phone already registered with site."
             },
            password: {
                required: "Please enter password.",
                minlength: jQuery.format("Password must be combination of atleast 1 number, 1 special character and 1 upper case letter with minimum 8 characters.")
            },
            password_confirm: {
                required: "Please re-enter password.",
                equalTo: "Please enter confirm password same as above."
            },
            agree: {
                required: "Please accept you read terms and conditions."
            },
            input_captcha_value: {
                required: "Please enter security code.",
                remote: "Please enter valid security code."
            }
        },
        submitHandler: function(form) {
            jQuery("#btn_register").hide();
            jQuery("#btn_loader").show();
            form.submit();
        }/*,
         // set this class to error-labels to indicate valid fields
         success: function(label) {
         // set &nbsp; as text for IE
         label.html("&nbsp;").addClass("checked");
         }*/
    });




    jQuery.validator.addMethod('chk_phone_duplicate', function(value, element, param) {
        var code = '';
        code = prompt("Please Enter Verification code");
        return $.post(javascript_site_path + 'verify-phone', {code: code}, function(data) {
            return data;
        });
    }, "Please enter correct verification code");

    // For registration form validation end
    /*   jQuery.validator.addMethod('chk_username_field', function(value, element, param) {
     if ( value.match('^[a-zA-Z0-9-._-]{5,20}$') ) {
     return true;
     } else {
     return false;
     }
     
     },"");
     /*
     jQuery.validator.addMethod("password_strenth", function(value, element) {
     return isPasswordStrong(value,element);
     }, "Password must be combination of atleast 1 number, 1 special character and 1 upper case letter with minimum 8 characters.");
     jQuery.validator.addMethod("password_chk", function(value, element) {
     if(value=='Password'){
     return false;
     }
     }, "Please enter password");    */
});


/* Funcaton to refresh captcha image*/
function refreshCaptha()
{
    jQuery("#captcha").attr('src', javascript_site_path + 'generate-captcha/' + Math.random());
    jQuery("#input_captcha_value").val('');
    jQuery('#input_captcha_value').focus();
    jQuery('#input_captcha_value').next().remove();
    return;
}