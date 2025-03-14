// JavaScript Document
$(document).ready(function(e) {        
    $("#frm_ad_details").validate({
        errorElement: "div",
        errorPlacement: function(label, element) {
            if(element[0].name=="admin_privileges[]")
            {
                label.insertAfter("#pre_div");
            }
            else
            {
                label.insertAfter(element);
            }
        },
        rules: {
            trade_type:{
                required:true
            },
            location:{
                required:true
            },
			contact_hrs: {
				required:true
			},
			premium: {
				number:true
			},
			min_amt: {
				number:true
			},
			max_amt: {
				number:true
			},
			min_volume: {
				number:true
			},
			min_feedback: {
				number:true
			},
			buyer_limit: {
				number:true
			},
			volume_coefficient: {
				number:true
			},
        },
        messages:{
            trade_type:{
                required:"Please select trade type."
            },
            location:{
                required:"Please enter location."
            },
			contact_hrs:{
                required:"Example: Mon-Sun 08:00-22:00 "
            },
			premium:{
                required:"Enter whole number "
            },
			min_amt:{
                required:"Enter whole number "
            },
			max_amt:{
                required:"Enter whole number "
            },
			min_volume:{
                required:"Enter whole number "
            },
			min_feedback:{
                required:"Enter whole number "
            },
			buyer_limit:{
                required:"Enter whole number "
            },
			volume_coefficient:{
                required:"Enter whole number "
            },
        }
    });
	
	yesnoCheck();
	
	$('#floating_price_chk').click(function() {
		if ( $('#floating_price_chk:checked').length > 0) {
			$("#row_id_floating_premium").show();
			$("#row_id_premium").hide();
			$("#row_id_price_equation").hide();
			
		} else {
			$("#row_id_floating_premium").hide();
			$("#row_id_premium").show();
			$("#row_id_price_equation").show();
		}
	}); 
	
	$('input[type="radio"]').click(function(){
		if($(this).attr("id")=="id_sell_online"){
			$("#row_id_online_provider").show();
			$("#online_sell_fieldset").show();
			$("#online_buy_fieldset").hide();
			$("#liquidity_options_fieldset").hide();
			$("#row_id_real_name_chk").show();
			$("#row_id_floating_price_chk").hide();
			
		}
		if($(this).attr("id")=="id_buy_online"){
			$("#row_id_online_provider").show();
			$("#online_sell_fieldset").hide();
			$("#online_buy_fieldset").show();
			$("#liquidity_options_fieldset").show();
			$("#row_id_real_name_chk").hide();
			$("#row_id_floating_price_chk").hide();
			
			
		}
		if($(this).attr("id")=="id_sell_cash"){
			$("#row_id_online_provider").hide();
			$("#online_sell_fieldset").hide();
			$("#online_buy_fieldset").hide();
			$("#liquidity_options_fieldset").show();
			$("#row_id_real_name_chk").hide();
			$("#row_id_floating_price_chk").show();
			
		}
		if($(this).attr("id")=="id_buy_cash"){
			$("#row_id_online_provider").hide();
			$("#online_sell_fieldset").hide();
			$("#online_buy_fieldset").hide();
			$("#liquidity_options_fieldset").show();
			$("#row_id_real_name_chk").hide();
			$("#row_id_floating_price_chk").hide();
		}
	});
});

function yesnoCheck() {

	if($("input:radio[id='id_sell_online']").is(":checked")) {
		$("#row_id_online_provider").show();
		$("#online_sell_fieldset").show();
		$("#online_buy_fieldset").hide();
		$("#liquidity_options_fieldset").hide();
		$("#row_id_real_name_chk").show();
		$("#row_id_floating_price_chk").hide();
	}
	
	if($("input:radio[id='id_buy_online']").is(":checked")) {
		$("#row_id_online_provider").show();
		$("#online_sell_fieldset").hide();
		$("#online_buy_fieldset").show();
		$("#liquidity_options_fieldset").show();
		$("#row_id_real_name_chk").hide();
		$("#row_id_floating_price_chk").hide();
	
	}
	
	if($("input:radio[id='id_sell_cash']").is(":checked")) {
		$("#row_id_online_provider").hide();
		$("#online_sell_fieldset").hide();
		$("#online_buy_fieldset").hide();
		$("#liquidity_options_fieldset").show();
		$("#row_id_real_name_chk").hide();
		$("#row_id_floating_price_chk").show();
	
	}
	
	if($("input:radio[id='id_buy_cash']").is(":checked")) {
		$("#row_id_online_provider").hide();
		$("#online_sell_fieldset").hide();
		$("#online_buy_fieldset").hide();
		$("#liquidity_options_fieldset").show();
		$("#row_id_real_name_chk").hide();
		$("#row_id_floating_price_chk").hide();
	
	}

}