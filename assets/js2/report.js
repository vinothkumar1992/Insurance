"use strict";

// Class Definition
var ReportGeneral = function() {

   // var login = $('#kt_login');
$("#data_report").change(function() {
	debugger;
	$("#agent_bank_bcode").val(bankArray[$("#agent_bank_name").val()]);
	
});
    var showErrorMsg = function(form, type, msg) {
        var alert = $('<div class="kt-alert kt-alert--outline alert alert-' + type + ' alert-dismissible" role="alert">\
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">x</button>\
			<span></span>\
		</div>');

        form.find('.alert').remove();
        alert.prependTo(form);
        //alert.animateClass('fadeIn animated');
        KTUtil.animateClass(alert[0], 'fadeIn animated');
        alert.find('span').html(msg);
    }


        var agentsList = function() {


var settings = {
  "url": window.location.origin+"/MAEM/reports/getAgentsList",
  "method": "GET",
  "timeout": 0,
};

$.ajax(settings).done(function (chartData) {
  
  debugger;
  console.log(chartData);
  
});

    }
	
	

  
    var reportForm = function() {
        $('#reportform_button').click(function(e) {
            e.preventDefault();

            var btn = $(this);
            var form = $(this).closest('form');

            form.validate({
                rules: {
                    start: {
						required:true
					},
					
					end : {
					required:true
					},
					
					types:{
						required:true
					}
					
					
					
                }
            });

            if (!form.valid()) {
                return;
            }

          btn.addClass('kt-spinner kt-spinner--right kt-spinner--sm kt-spinner--light').attr('disabled', true);

            form.ajaxSubmit({
                url: 'https://myangkasaemas.com/MAEM/Reports/exceltest',    //window.location.origin+'/Mbm/getreport',
                success: function(response, status, xhr, $form) { 
				console.log(response);
				
				if (response=="0")
					{				
form.clearForm(); // clear form
	                    form.validate().resetForm()				
					// similate 2s delay
	                    btn.removeClass('kt-spinner kt-spinner--right kt-spinner--sm kt-spinner--light').attr('disabled', false);
	             //       showErrorMsg(form, 'danger', 'New User added failed.');
					}
else
{
	btn.removeClass('kt-spinner kt-spinner--right kt-spinner--sm kt-spinner--light').attr('disabled', false); // remove
	                    form.clearForm(); // clear form
	                    form.validate().resetForm(); // reset validation states
	                

	                  //  showErrorMsg(form, 'success', 'Cool! New User added.');
                	
}	
				
               
                }
            });
       

form.submit();

	   });
    }
	


	
	

    // Public Functions
    return {
        // public functions
        init: function() {
        reportForm();
	    agentsList();
	
        }
    };
}();

// Class Initialization
jQuery(document).ready(function() {
    ReportGeneral.init();
});