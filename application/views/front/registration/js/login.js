
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
    var user_sponser_id = $('.validate-input input[name="user_sponser_id"]');
    var user_password = $('.validate-input input[name="user_password"]');
   


    $('.validate-form').on('submit',function(){
        var check = true;

        if($(user_sponser_id).val().trim() == ''){
            showValidate(user_sponser_id);
            check=false;
        }
        if($(user_password).val().trim() == ''){
            showValidate(user_password);
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
