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
                text: "Confirm Member Approval ",
                type: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, Confirmed!'
            }).then(function(result) {
                if (result.value) {
					

                   
               
 form.ajaxSubmit({
                url: window.location.origin+'/MAEM/MemberForm/memeber_approval_do',
                success: function(response, status, xhr, $form) { 
				console.log(response);
				
				if(response.sts)
				{
							swal.fire({

                    "title": "Approved!",
                    "text": 'Member has been Approved.',
                    "type":  'success',
                    "confirmButtonClass": "btn btn-secondary",
                    "onClose": function(e) {
                        window.location.href =window.location.origin+"/MAEM/Members";
                    }
                });
					
				}
else
{

 swal.fire("Sorry", "Member already Approved!", "error");
					

}	
				
               
                }
            });





			   }
            });
        });

     

    };

    return {
        // Init
        init: function() {
            pac();
        },
    };
}();

// Class Initialization
jQuery(document).ready(function() {
    PA.init();
});
