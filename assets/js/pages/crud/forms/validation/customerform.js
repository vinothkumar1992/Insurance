var KTFormControls = function() { // Private functions  
    var demo1 = function() {
        $("#customer_form").validate({

            // define validation rules 

            rules: {
				
				 members_name: {
                    required: true,
					minlength: 10
                },
				
				 nric_no: {
                    required: true,
					minlength: 10
                },
				
				 nationality: {
                    required: true,
					
                },
				 address1: {
                    required: true,
					minlength: 10
                },
				
				 city: {
                    required: true,
					minlength: 10
                },
				
				 state: {
                    required: true,
					minlength: 10
                },
				
				 postcode: {
                    required: true,
					minlength: 5
                },
				 country: {
                    required: true,
					
                },
				
				 home_office_phone_no: {
                    required: true,
					
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
			
            },
            errorPlacement: function(error, element) {
                var group = element.closest('.input-group');
                if (group.length) {
                    group.after(error.addClass('invalid-feedback'));
                } else {
                    element.after(error.addClass('invalid-feedback'));
                }
            },
            //display error alert on form submit    

            invalidHandler: function(event, validator) {
                var alert = $('#kt_form_1_msg');
                alert.removeClass('kt--hide').show();
                KTUtil.scrollTop();
            },
            submitHandler: function(form) {

                //form[0].submit(); // submit the form    
            }
        });
    }
    var demo2 = function() {
        $("#kt_form_2").validate({

            // define validation rules          
            rules: {
                //= Client Information(step 3)              

                // Billing Information              

                billing_card_name: {
                    required: true
                },
                billing_card_number: {
                    required: true,
                    creditcard: true
                },
                billing_card_exp_month: {
                    required: true
                },
                billing_card_exp_year: {
                    required: true
                },
                billing_card_cvv: {
                    required: true,
                    minlength: 2,
                    maxlength: 3
                },
                // Billing Address    
                billing_address_1: {
                    required: true
                },
                billing_address_2: {},
                billing_city: {
                    required: true
                },
                billing_state: {
                    required: true
                },
                billing_zip: {
                    required: true,
                    number: true
                },
                billing_delivery: {
                    required: true
                }
            },

            //display error alert on form submit           
            invalidHandler: function(event, validator) {
                swal.fire({

                    "title": "",
                    "text": "There are some errors in your submission. Please correct them.",
                    "type": "error",
                    "confirmButtonClass": "btn btn-secondary",
                    "onClose": function(e) {
                        console.log('on close event fired!');
                    }
                });
                event.preventDefault();
            },
            submitHandler: function(form) {
                //form[0].submit(); // submit the form          
                swal.fire({

                    "title": "",
                    "text": "Form validation passed. All good!",
                    "type": "success",
                    "confirmButtonClass": "btn btn-secondary"
                });
                return false;
            }
        });
    }
    return {
        // public functions       
        init: function() {
            demo1();
            demo2();
        }
    };
}();
jQuery(document).ready(function() {
    KTFormControls.init();
});