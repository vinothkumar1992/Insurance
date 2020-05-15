"use strict";

// Class Definition
var ProfileGeneral = function() {

   // var login = $('#kt_login');

    var showErrorMsg = function(form, type, msg) {
    
/*
    var alert = $('<div class="kt-alert kt-alert--outline alert alert-' + type + ' alert-dismissible" role="alert">\
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">x</button>\
			<span></span>\
		</div>');

        form.find('.alert').remove();
        alert.prependTo(form);
        //alert.animateClass('fadeIn animated');
        KTUtil.animateClass(alert[0], 'fadeIn animated');
        alert.find('span').html(msg);
*/

toastr.options = {
  "closeButton": false,
  "debug": false,
  "newestOnTop": true,
  "progressBar": false,
  "positionClass": "toast-top-right",
  "preventDuplicates": false,
  "onclick": null,
  "showDuration": "300",
  "hideDuration": "1000",
  "timeOut": "5000",
  "extendedTimeOut": "1000",
  "showEasing": "swing",
  "hideEasing": "linear",
  "showMethod": "fadeIn",
  "hideMethod": "fadeOut"
};

if("success"==type)
{
toastr.success(msg);
}
else
{
toastr.error(msg);
}



    }


    

  
    var pchange = function() {
        $('#kt_password_update').click(function(e) {
            e.preventDefault();

            var btn = $(this);
            var form = $(this).closest('form');

            form.validate({
                rules: {
                    np: {
                        required: true,
                       
                    },
					
					op: {
                        required: true,
                       
                    }
					
                }
            });

            if (!form.valid()) {
                return;
            }

            btn.addClass('kt-spinner kt-spinner--right kt-spinner--sm kt-spinner--light').attr('disabled', true);

            form.ajaxSubmit({
                url: window.location.origin+'/MAEM/Profile/pchange',
                success: function(response, status, xhr, $form) { 
				console.log(response);
				
				if (response=="0")
					{				
form.clearForm(); // clear form
	                    form.validate().resetForm()				
					// similate 2s delay
	                    btn.removeClass('kt-spinner kt-spinner--right kt-spinner--sm kt-spinner--light').attr('disabled', false);
	                    showErrorMsg(form, 'danger', 'Password update failed.');
					}
else
{
	btn.removeClass('kt-spinner kt-spinner--right kt-spinner--sm kt-spinner--light').attr('disabled', false); // remove
	                    form.clearForm(); // clear form
	                    form.validate().resetForm(); // reset validation states
	                

	                    showErrorMsg(form, 'success', 'Cool! Password has updated.');
                	
}	
				
               
                }
            });
        });
    }
	
	
	
	  var profileupdate = function() {
        $('#kt-form_profile_update').click(function(e) {
            e.preventDefault();

            var btn = $(this);
            var form = $(this).closest('form');

            form.validate({
                rules: {
                    username: {
                        required: true,
                       
                    },
					
					phone: {
                        required: true,
                       
                    }
					
                }
            });

            if (!form.valid()) {
                return;
            }

            btn.addClass('kt-spinner kt-spinner--right kt-spinner--sm kt-spinner--light').attr('disabled', true);

            form.ajaxSubmit({
                url: window.location.origin+'/MAEM/Profile/update',
                success: function(response, status, xhr, $form) { 
				console.log(response);
				
				if (response=="0")
					{				
form.clearForm(); // clear form
	                    form.validate().resetForm()				
					// similate 2s delay
	                    btn.removeClass('kt-spinner kt-spinner--right kt-spinner--sm kt-spinner--light').attr('disabled', false);
	                    showErrorMsg(form, 'danger', 'profile update failed.');
					}
else
{
	btn.removeClass('kt-spinner kt-spinner--right kt-spinner--sm kt-spinner--light').attr('disabled', false); // remove
	                    form.clearForm(); // clear form
	                    form.validate().resetForm(); // reset validation states
	                

	                    showErrorMsg(form, 'success', 'Cool! profile has updated.');
                	
}	
				
               
                }
            });
        });
    }

	
	
	
	

    // Public Functions
    return {
        // public functions
        init: function() {
        pchange();
		profileupdate();
        }
    };
}();

// Class Initialization
jQuery(document).ready(function() {
    ProfileGeneral.init();
});