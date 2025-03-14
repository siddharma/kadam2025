// JavaScript Document
$(document).ready(function(e) {

    jQuery("#frm_role").validate({
        errorElement:'label',
        errorPlacement: function(label, element) {
            if(element[0].name=="role_privileges[]")
            {
                label.insertAfter("#pre_div");
            }
            else
            {
                label.insertAfter(element);
            }
        },
        rules: {
            role_name:{
                required: true,
                minlength: 3,
                remote:{
                    url: jQuery("#base_url").val()+"backend/role/check-role",
                    type: "post",
                    data:{
                        type:jQuery("#frm_type").val(),
                        old_role_name:jQuery('#old_role_name').val()
                    }
                }
            },
            "role_privileges[]": {
                required:true
            }
        },
        messages: {
            role_name:{
                required: "Please enter role name.",
                minlength: "Please enter at least 3 characters.",
                remote: "Role already exists."
            },
            "role_privileges[]": {
                required:"Please select atleast one privilege."
            }
        },
        // set this class to error-labels to indicate valid fields
        success: function(label) {
            // set &nbsp; as text for IE
            label.hide();
        }
    });
    jQuery("#frm_plans").validate({
        errorElement:'label',
        errorPlacement: function(label, element) {
            if(element[0].name=="role_privileges[]")
            {
                label.insertAfter("#pre_div");
            }
            else
            {
                label.insertAfter(element);
            }
        },
        rules: {
            role_name:{
                required: true,
                minlength: 3,
                remote:{
                    url: jQuery("#base_url").val()+"backend/plans/check-plans",
                    type: "post",
                    data:{
                        type:jQuery("#frm_type").val(),
                        old_role_name:jQuery('#old_role_name').val()
                    }
                }
            },
            duration: {
              required:true,
              number:true
            },
            price: {
              required:true,
            },
            "role_privileges[]": {
                required:true
            }
        },
        messages: {
            role_name:{
                required: "Please enter plan name.",
                minlength: "Please enter at least 3 characters.",
                remote: "Plan already exists."
            },
            duration:{
              required:"Please enter duration.",
              number:"Please enter valid duration"
            },
            price:{
              required:"Please enter price.",
            },
            "role_privileges[]": {
                required:"Please select atleast one type."
            }
        },
        // set this class to error-labels to indicate valid fields
        success: function(label) {
            // set &nbsp; as text for IE
            label.hide();
        }
    });
});