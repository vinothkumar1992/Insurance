var KTFormControls = function() { 

// Private functions  

 var arrows;
    if (KTUtil.isRTL()) {
        arrows = {
            leftArrow: '<i class="la la-angle-right"></i>',
            rightArrow: '<i class="la la-angle-left"></i>'
        }
    } else {
        arrows = {
            leftArrow: '<i class="la la-angle-left"></i>',
            rightArrow: '<i class="la la-angle-right"></i>'
        }
    }
    
    // Private functions
    var dp = function () {
        // minimum setup
        $('#kt_datepicker_1, #kt_datepicker_1_validate').datepicker({
            rtl: KTUtil.isRTL(),
            todayHighlight: true,
			 format: "dd-mm-yyyy",
            orientation: "bottom left",
            templates: arrows
        });
	}

    var cform = function() {
        $("#customer_form").validate({

            // define validation rules 

            rules: {
				
				 members_name: {
                    required: true
					
                },
				
				 nric_no: {
                    required: true
					
                },
				
				 nationality: {
                    required: true
					
                },
				
				 membership_type: {
                    required: true
					
                },
				
				 address1: {
                    required: true
				
                },
				
				 city: {
                    required: true
					
                },
				
				 state: {
                    required: true
					
                },
				
				 postcode: {
                    required: true,
					minlength: 5
                },
				 country: {
                    required: true
					
                },
				
				 home_office_phone_no: {
                    required: true
					
                },
				
				 mobile_phone_no: {
                    required: true,
					
                },
				
		
                email: {
                    required: true,
                   email: true,
                    minlength: 10
                },
				
				
                date_of_birth: {
                    required: true
                },
                
				gender: {
                    required: true
                },
                
				race: {
                    required: true
                },
				
				marital_status: {
                    required: true
                },
				
				primary_name: {
                    required: true
                },
				
				primary_nirc: {
                    required: true
                },
				
				occupation: {
                    required: true
                },
				
				health_declaration: {
                    required: true
                }
			,
			payment_type: {
                    required: true
                },
				radio: {
                    required: true
                }
			
            },

        /* 
		   errorPlacement: function(error, element) {
                var group = element.closest('.input-group');
                if (group.length) {
                    group.after(error.addClass('invalid-feedback'));
                } else {
                    element.after(error.addClass('invalid-feedback'));
                }
            },
		*/
  //display error alert on form submit    

            invalidHandler: function(event, validator) {
         //       var alert = $('#kt_form_1_msg');
           //     alert.removeClass('kt--hide').show();
                KTUtil.scrollTop();
            },
            submitHandler: function(form) {
//form.addClass('was-validated');
                form[0].submit(); // submit the form    
            }
        });
    }
   
    return {
        // public functions       
        init: function() {
           cform();
		    dp();
           
        }
    };
}();
jQuery(document).ready(function() {
    KTFormControls.init();
});