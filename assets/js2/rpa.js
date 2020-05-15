"use strict";

// Class definition
var PA = function() {

    // Demos
    var pac = function() {
       
     


        $('#pa_pac').click(function(e) {
			  e.preventDefault();

			 var form = $(this).closest('form');
            swal.fire({
                title: 'Are you sure?',
                text: "Confirm Banking slip ",
                type: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, Confirmed!'
            }).then(function(result) {
                if (result.value) {
					

                   
               
 form.ajaxSubmit({
                
                success: function(response, status, xhr, $form) { 
				console.log(response);
				
				if(response.sts)
				{
					 swal.fire(
                        'Approved!',
                        'Payment has been Approved.',
                        'success'
                    )
					
				}
else
{

 swal.fire("Sorry", "Approval has issue!", "error");
					

}	
				
               
                }
            });





			   }
            });
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
            pac();
			cancel_slip();
        },
    };
}();

// Class Initialization
jQuery(document).ready(function() {
    PA.init();
});
