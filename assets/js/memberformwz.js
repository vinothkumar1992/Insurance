"use strict";

// Class definition
var KTWizard2 = function () {
    // Base elements
    var wizardEl;
    var formEl;
    var validator;
    var wizard;

    // Private functions
    var initWizard = function () {
        // Initialize form wizard
        wizard = new KTWizard('kt_wizard_v2', {
            startStep: 1, // initial active step number
			clickableSteps: true  // allow step clicking
        });

        // Validation before going to next page
        wizard.on('beforeNext', function(wizardObj) {
			
var nominee_share1 = 0;
			
if ($("#nominee_share1").val() != ""){
	
	
var nominee_share1 = $("#nominee_share1").val();

}	

var total = parseInt($("#nominee_share").val())+parseInt(nominee_share1);

if(total>100 || total<100)
{
wizardObj.stop();
			    swal.fire({
                    "title": "",
                    "text": "Please check Nominee Share Value ",
                    "type": "error",
                    "confirmButtonClass": "btn btn-secondary"
                });

}	

if(total<100)
{
wizardObj.stop();
			    swal.fire({
                    "title": "",
                    "text": "Nominee share must reach 100%",
                    "type": "error",
                    "confirmButtonClass": "btn btn-secondary"
                });

}


	if($("#age").val()>70)
			{
			   wizardObj.stop();
			    swal.fire({
                    "title": "",
                    "text": "Unable to Process the Membership of age above 70",
                    "type": "error",
                    "confirmButtonClass": "btn btn-secondary"
                });
			   
			
			
			}
			else
			{
			
		   if (validator.form() !== true) {
                wizardObj.stop();  // don't go to the next step
            }	
				
			}
			


						
        });
	
/*     

	 wizard.on('beforePrev', function(wizardObj) {
			if (validator.form() !== true) {
				wizardObj.stop();  // don't go to the next step
			}
		});

*/
        // Change event
        wizard.on('change', function(wizard) {
            KTUtil.scrollTop();
        });
    }
	
			
			$('#healthfile').hide();
		

    var initValidation = function() {
        validator = formEl.validate({
            // Validate only visible fields
            ignore: ":hidden",

            // Validation rules
            rules: {
               	//= Step 1

		
			membership_type: {
					required: true
				},
				members_name: {
					required: true
				},
				nric_no: {
					required: true,
					nriccheck: true,
					number:true
					
				},
				
				gender: {
					required: true
				},
				
				nationality: {
					required: true
				},
				address1: {
					required: true
				},
				postcode: {
					required: true,
					number:true
				},
				city: {
					required: true
				},
				state: {
					required: true
				},
				country: {
					required: true
				},
				
				home_office_phone_no: {
					required: true
				},
				
				mobile_phone_no: {
					required: true
				},
				
				
				country: {
					required: true
				},
				
				
				email: {
					required: true,
					email: true
				},
				
				kt_datepicker_1: {
					required: true
				},
				race: {
					required: true
				},
				
				marital_status: {
					required: true
				},
				occupation: {
					required: true
				},
				
				health_declaration: {
					required: true
				},
				
			

				
				
				
				primary_name: {
					required: true
				}
				,
				
				primary_nirc: {
					required: true,
					nriccheck: true,
					number:true
				}
				,

				//= Step 3
				delivery: {
					required: true
				},
				packaging: {
					required: true
				},
				preferreddelivery: {
					required: true
				},

			
				
				//= Step 4
			
			/*
				doctor_name:{
				required: true
				
				},
				doctor_address1:{
				required: true
				
				}
				,
				doctor_phone:{
				required: true
				
				},
				
				*/
				// Step 5
				
					nominee_name:{
				required: true
				
				},
				nominee_nric:{
				required: true,
				nriccheck: true,
					number:true
				
				},
				nominee_address:{
				required: true
				
				},
				nominee_postcode:{
				required: true,
				number:true
				
				},
				nominee_relationship:{
				required: true
				
				},
				nominee_share:{
				required: true
				
				},
			

witness_name:{
				required: true
				
				},
witness_nric: {
	required: true,
	required: true,
				nriccheck: true,
					number:true
},

attachment1:{
				filesize: true
				
				},


customFile: {
required: true
}
	
				
			
            },

            // Display error
            invalidHandler: function(event, validator) {
                KTUtil.scrollTop();

                swal.fire({
                    "title": "",
                    "text": "There are some errors in your submission. Please correct them.",
                    "type": "error",
                    "confirmButtonClass": "btn btn-secondary"
                });
            },

            // Submit valid form
            submitHandler: function (form) {

            }
     



	 });
   


$.validator.addMethod(
        "nriccheck",
        function(value, element) {
           if(value.match(/^(\d{2})(\d{2})(\d{2})-?\d{2}-?\d{4}$/)) {
			

var year = RegExp.$1;
    var month = (RegExp.$2);
    var day = (RegExp.$3);
console.log(month,day);
if((month>=1 && month<=12) && (day>=1 && day<=31)) return true; else return false; 
		   }
		   else 
		   {
		   return false
		   }			   
        },
        "Passport No invalid"
);


$.validator.addMethod(
        "filesize",
        function(value, element) {
				if (value != ""){
           if (element.files[0].size/1024/1024 >= 5 ){
	 
	 return false ;
	 
 }
		   
		   else 
		   {
		   return true;
		   }}
else {
return false;
}	
        },
        "File size  exceeds 5MB or is less than 1MB"
);


}



var QA= function ()
{
	
	
	 $("#ans1").hide();
	  $("#ans2").hide();
	   $("#ans3").hide();
	    $("#ans4").hide();
		 $("#ans5").hide();
		  $("#ans6").hide();
		   $("#ans7").hide();
		   $("#ans8").hide();
		   

 $('input:radio[name=qus1]').change(function() {
        if (this.value == 'Yes') {
            $("#ans1").show();
			$( "#ans1" ).rules( "add", {required:true});	
        }
		else
		{
		 $("#ans1").val("");
$( "#ans1" ).rules( "remove" );
$( "#ans1" ).removeClass("error");


	 
		 $("#ans1").hide();
		
		}			
        
    });
	

	
	 $('input:radio[name=qus2]').change(function() {
        if (this.value == 'Yes') {
            $("#ans2").show();
			$( "#ans2" ).rules( "add", {required:true});	
        }
		else
		{
 $("#ans2").val("");			
	$( "#ans2" ).rules( "remove" );	
		$("#ans2").hide();
		}			
        
    });
	
	 $('input:radio[name=qus3]').change(function() {
        if (this.value == 'Yes') {
            $("#ans3").show();
			$( "#ans3" ).rules( "add", {required:true});	
        }
		else
		{	
		 		 $("#ans3").val("");
$( "#ans3" ).rules( "remove" );


		 $("#ans3").hide();
		}			
        
    });
	
	
	 $('input:radio[name=qus4]').change(function() {
        if (this.value == 'Yes') {
            $("#ans4").show();
			$( "#ans4" ).rules( "add", {required:true});	
        }
		else
		{
		 		 $("#ans4").val("");
$( "#ans4" ).rules( "remove" );			
		 $("#ans4").hide();
		}			
        
    });
	
	 $('input:radio[name=qus5]').change(function() {
        if (this.value == 'Yes') {
            $("#ans5").show();
			$( "#ans5" ).rules( "add", {required:true});	
        }
		else
		{
		 		 $("#ans5").val("");
$( "#ans5" ).rules( "remove" );			
		 $("#ans5").hide();
		}			
        
    });
	
	 $('input:radio[name=qus6]').change(function() {
        if (this.value == 'Yes') {
            $("#ans6").show();
			$( "#ans6" ).rules( "add", {required:true});	
        }
		else
		{	
			 		 $("#ans6").val("");
$( "#ans6" ).rules( "remove" );
		 $("#ans6").hide();
		}			
        
    });
	
	 $('input:radio[name=qus7]').change(function() {
        if (this.value == 'Yes') {
            $("#ans7").show();
			$( "#ans7" ).rules( "add", {required:true});	
        
		}
		else
		{	
		 $("#ans7").hide();
				 		 $("#ans7").val("");
$( "#ans7" ).rules( "remove" );
		}			
        
    });
	
	
	
	 $('input:radio[name=qus8]').change(function() {
        if (this.value == 'Yes') {
            $("#ans8").show();
			$( "#ans8" ).rules( "add", {required:true});	
        }
		else
		{	
		 		 		 $("#ans8").val("");
$( "#ans8" ).rules( "remove" );
		 $("#ans8").hide();
		}			
        
    });
	
	

}

var NRIC_check = function() {


$("#primary_nirc").change(function() {

var ic =$(this).val();
ic =ic.replace(/-|\s/g,"")
$(this).val(ic);
});

$("#nominee_nric").change(function() {

var ic =$(this).val();
ic =ic.replace(/-|\s/g,"")
$(this).val(ic);
});

$("#nominee_nric1").change(function() {

var ic =$(this).val();
ic =ic.replace(/-|\s/g,"")
$(this).val(ic);
});

$("#witness_nric").change(function() {

var ic =$(this).val();
ic =ic.replace(/-|\s/g,"")
$(this).val(ic);
});




$("#nric_no").change(function() {

var ic =$(this).val();
ic =ic.replace(/-|\s/g,"")
$(this).val(ic);

 


var settings = {
  "url": window.location.origin+'/MAEM/Formsubmission/formCheckNric/'+ic,
  "method": "GET",
  "timeout": 0,
};

$.ajax(settings).done(function (chartData) {
	
	if (chartData.datasets.status==1){
  
   swal.fire({
                    "title": "",
                    "text": "NRIC number already exists",
                    "type": "error",
                    "confirmButtonClass": "btn btn-secondary"
                });
				
	}
  
});

/* 

   

var form = $(this).closest('form');
 
 form.ajaxSubmit({
                url: window.location.origin+'/MAEM/FormSubmission/formCheckNric',
				
				error:function(){
             
			                swal.fire({

                    "title": "",
                    "text": "Please try again later",
                    "type": "error",
                    "confirmButtonClass": "btn btn-secondary",
                    "onClose": function(e) {
                        console.log('on close event fired!');
                    }
                });
			   
            },
				
                success: function(response, status, xhr, $form) { 
				
				
				
				
if (response.status)
{
	
	                
  swal.fire({
                    "title": "",
                    "text": "NRIC number already exists",
                    "type": "error",
                    "confirmButtonClass": "btn btn-secondary"
                });
                	



}
               
                }
            }); */

if(ic.match(/^(\d{2})(\d{2})(\d{2})-?\d{2}-?\d{4}$/)) {
    var year = RegExp.$1;
    var month = RegExp.$2;
    var day = RegExp.$3;
    console.log(year, month, day);
    
    var now = new Date().getFullYear().toString();
    var decade = now.substr(0, 2);
    if (now.substr(2,2) > year) {
        year = parseInt(decade.concat(year.toString()), 10);
    }

    var date = new Date(year, (month-1), day, 0, 0, 0, 0);
	$("#date_of_birth").val(date.getFullYear()+"-"+month+"-"+day);
    console.log(date.toISOString());
	var diff_ms = Date.now() - date.getTime();
	 var age_dt = new Date(diff_ms); 
	 $("#age").val(Math.abs(age_dt.getUTCFullYear() - 1970));
	
	
	if($("#age").val()>65 && $("#age").val()<71)
		
		{
			$('#healthfile').show();
			$( "#customFile1" ).rules( "add", {required:true});	
			
		}else {
			
			$('#healthfile').hide();
			$( "#customFile1" ).rules( "remove" );
		}
	
	if($("#age").val()>70)
			{
			
			    swal.fire({
                    "title": "",
                    "text": "Unable to Process the Membership of age above 70",
                    "type": "error",
                    "confirmButtonClass": "btn btn-secondary"
                });
			   
			
			
			} 
console.log("Age  "+Math.abs(age_dt.getUTCFullYear() - 1970));
}
else {
     console.log("Invalied IC");
}
});

}



    var initSubmit = function() {
        var btn = formEl.find('[data-ktwizard-type="action-submit"]');

        btn.on('click', function(e) {
            e.preventDefault();

            if (validator.form()) {
                // See: src\js\framework\base\app.js
                KTApp.progress(btn);
                //KTApp.block(formEl);
//console.log(formEl.serialize());
                // See: http://malsup.com/jquery/form/#ajaxSubmit
			if(	$("#mem_sign").val() == ""){
				swal.fire({
                title: 'Are you sure?',
                text: "To submit without proposal signature ? ",
                type: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, Confirmed!'
            }).then(function(result) {
                if (result.value) {
                formEl.ajaxSubmit({
					
                    success: function(response) {
                        KTApp.unprogress(btn);
                        //KTApp.unblock(formEl);
console.log(response);
                        swal.fire({
                            "title": "",
							"html" :response.text,
						
                         //   "text": "The application has been successfully submitted!",
                            "type": response.type,
                            "confirmButtonClass": "btn btn-secondary",
							
                        }).then(function(result){
							if(response.type=="success")
							{	
							if(response.url!=0)
							{	
							window.location.href =response.url;
							}
						
							}					
					});
                    }
                });
				
				 }
			});}else {
				
				   formEl.ajaxSubmit({
					
                    success: function(response) {
                        KTApp.unprogress(btn);
                        //KTApp.unblock(formEl);
console.log(response);
                        swal.fire({
                            "title": "",
							"html" :response.text,
						
                         //   "text": "The application has been successfully submitted!",
                            "type": response.type,
                            "confirmButtonClass": "btn btn-secondary",
							
                        }).then(function(result){
							if(response.type=="success")
							{	
							if(response.url!=0)
							{	
							window.location.href =response.url;
							}
						
							}					
					});
                    }
                });
				
				
			}
            }
        });
    }

    return {
        // public functions
        init: function() {
            wizardEl = KTUtil.get('kt_wizard_v2');
            formEl = $('#kt_form');

            initWizard();
            initValidation();
            initSubmit();
			QA();
			NRIC_check();
        }
    };
}();

jQuery(document).ready(function() {
    KTWizard2.init();
});
