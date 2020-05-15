"use strict";

// Class definition
var PA = function() {
 var formEl;
    var validator;
    // Demos
	
	var initValidation = function() {
		      validator = formEl.validate({
            // Validate only visible fields
            ignore: ":hidden",

            // Validation rules
            rules: {
               	//= Step 1

		
			form_payment_date: {
					required: true
				},
				form_submission_date: {
					required: true
				},
				
				 },

            // Display error
            invalidHandler: function(event, validator) {
                KTUtil.scrollTop();

                swal.fire({
                    "title": "",
                    "text": "Both Payment Date and Submission date is required",
                    "type": "error",
                    "confirmButtonClass": "btn btn-secondary"
                });
            },

            // Submit valid form
            submitHandler: function (form) {

            }
     



	 });
	 console.log(validator);
	 	 console.log(formEl);
	}
	
    var pac = function() {
       
     


        $('#pa_pac').click(function(e) {
			  e.preventDefault();

			 var form = $(this).closest('form');
			 
			   
			   if (validator.form()){
            swal.fire({
                title: 'Are you sure?',
                text: "Confirm online payment / Banking slip  ",
                type: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, Confirmed!'
            }).then(function(result) {
                if (result.value) {
					

                   
               
 form.ajaxSubmit({
                url: window.location.origin+'/MAEM/MemberForm/paryment_approval_do',
                success: function(response, status, xhr, $form) { 
				console.log(response);
				
				if(response.sts)
				{
					
					
					swal.fire({

                    "title": "Approved!",
                    "text": 'Payment has been Approved.',
                    "type":  'success',
                    "confirmButtonClass": "btn btn-secondary",
                    "onClose": function(e) {
                        window.history.back();
                    }
                });
					
					
					
					
					
				}
else
{

 swal.fire("Sorry", "Please Contact admin!", "error");
					

}	
				
               
                }
            });





			   }
            });
			}
        });
		

     

    };
	
	
var cancel_slip = function ()
{

 $('#cancelslip').click(function(e) {
			  e.preventDefault();

			 var form = $(this).closest('form');
            swal.fire({
                title: 'Are you sure?',
                text: "Remove the Banking slip ",
                type: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, Confirmed!'
            }).then(function(result) {
                if (result.value) {
					

                   
               
 form[0].submit();
             





			   }
            });
        });


}	
	

    return {
        // Init
        init: function() {
			formEl = $('#kt-form');
			initValidation();
            pac();
			cancel_slip();
			
        },
    };
}();

// Class Initialization
jQuery(document).ready(function() {
    PA.init();
});
