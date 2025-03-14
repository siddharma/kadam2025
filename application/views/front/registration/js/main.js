
(function ($) {
    "use strict";


    /*==================================================================
    [ Focus Contact2 ]*/
    $('.input2').each(function(){
        $(this).on('blur', function(){
            if($(this).val().trim() != "") {
                $(this).addClass('has-val');
            }
            else {
                $(this).removeClass('has-val');
            }
        })    
    })
            
  
    
    /*==================================================================
    [ Validate ]*/
    var sponser_id = $('.validate-input input[name="sponser_id"]');
    var full_name = $('.validate-input input[name="full_name"]');
    var mobile_no = $('.validate-input input[name="mobile_no"]');
    var user_email = $('.validate-input input[name="user_email"]');


    $('.validate-form').on('submit',function(){
        var check = true;

        if($(sponser_id).val().trim() == ''){
            showValidate(sponser_id);
            check=false;
        }
        if($(full_name).val().trim() == ''){
            showValidate(full_name);
            check=false;
        }
        if($(mobile_no).val().trim() == ''){
            showValidate(mobile_no);
            check=false;
        }


        if($(user_email).val().trim().match(/^([a-zA-Z0-9_\-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([a-zA-Z0-9\-]+\.)+))([a-zA-Z]{1,5}|[0-9]{1,3})(\]?)$/) == null) {
            showValidate(user_email);
            check=false;
        }


        return check;
    });


    $('.validate-form .input2').each(function(){
        $(this).focus(function(){
           hideValidate(this);
       });
    });

    function showValidate(input) {
        var thisAlert = $(input).parent();

        $(thisAlert).addClass('alert-validate');
    }

    function hideValidate(input) {
        var thisAlert = $(input).parent();

        $(thisAlert).removeClass('alert-validate');
    }
    
})(jQuery);
