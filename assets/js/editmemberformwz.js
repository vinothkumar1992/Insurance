"use strict";

// Class definition
var KTWizard2 = function () {
    // Base elements
    var wizardEl;
    var formEl;
    var validator;
    var wizard;
	
	
		$('#healthfile').hide();
		
		
	
var editform = function(id) {
	id=$("#mem_id").val();

var settings = {
  "url": window.location.origin+"/MAEM/MemberForm/formdata/"+id,
  "method": "POST",
  "timeout": 0,
  "headers": {
    "Content-Type": "application/x-www-form-urlencoded"
  },
};

$.ajax(settings).done(function (data) {
	
	console.log(data);
    $.each(data, function (key, val) {
	if(key=="form_data")
{
	var formData= JSON.parse(val);
	console.log(formData);
	$.each(formData, function (form_key, form_val) {
	
		console.log(form_key +":"+form_val);
		
		if (form_key == "sign"){
			$("#mem_sign").val(form_val);
		 
		form_val=	form_val.replace("[removed]","data:image/png;base64,");
		//console.log("tessstttttttttt>>>>>>>>"+form_val )
		document.getElementById(form_key).setAttribute(
        'src', form_val
    );
	
		
		}else {
		$("#"+form_key).val(form_val);  
		
		}
		
		
	});
 //$("#agent_ic_copy_img").attr({ "src": val });
} 


	if(key=="nominee_data")
{
	var nomineeData= JSON.parse(val);
	console.log(nomineeData);
	$.each(nomineeData, function (nominee_key, nominee_val) {
		console.log(nominee_key +":"+nominee_val);
		if (nominee_key == "witness_sign") {
			
			$("#mem_sign1").val(nominee_val);
			nominee_val=	nominee_val.replace("[removed]","data:image/png;base64,");
		//console.log("tessstttttttttt>>>>>>>>"+form_val )
		document.getElementById(nominee_key).setAttribute(
        'src', nominee_val
    );
		}else {
		
		$("#"+nominee_key).val(nominee_val);  
		}
		
	});
 //$("#agent_ic_copy_img").attr({ "src": val });
} 

	if(key=="doctor_data")
{
	var doctorData= JSON.parse(val);
	console.log(doctorData);
	$.each(doctorData, function (doctor_key, doctor_val) {
		console.log(doctor_key +":"+doctor_val);
		$("#"+doctor_key).val(doctor_val);  
	});
 //$("#agent_ic_copy_img").attr({ "src": val });
} 

	if(key=="ques_data")
{
	var quesData= JSON.parse(val);
	console.log(quesData);
	$.each(quesData, function (ques_key, ques_val) {
		console.log(ques_key +":"+ques_val);
		$("#"+ques_key).val(ques_val);  
	});
 //$("#agent_ic_copy_img").attr({ "src": val });
} 
if($("#age").val()>65 && $("#age").val()<71)
		
		{
			$('#healthfile').show();
			
		}else {
			
			$('#healthfile').hide();
			
		}

	if(key=="form_agent")
{
	var formAgentData= JSON.parse(val);
	console.log(formAgentData);
	$.each(formAgentData, function (formAgent_key, formAgent_val) {
		console.log(formAgent_key +":"+formAgent_val);
		$("#"+formAgent_key).val(formAgent_val);  
	});
 //$("#agent_ic_copy_img").attr({ "src": val });
 
 
} 

	
		if (key == "form_payment_type"){
			
			if (val=="Banking"){
			var radiobtn = document.getElementById("payment_type1");
radiobtn.checked = true;
			
			}else {
				var radiobtn = document.getElementById("payment_type");
radiobtn.checked = true;
				
			}
			
			
		}
    


else{
	
    $("#"+key).val(val);                                          
  

  
  if(key=="agent_status" && val==1)
  {
  $("#agent_status1").attr('checked', true);
  }
else
{
 $("#agent_status2").attr('checked', true);
}	
if(key=="agent_sign")
{
 $("#sign_imag").attr({ "src": val });
} 

if(key=="agent_ic_copy")
{
 $("#agent_ic_copy_img").attr({ "src": val });
} 

if(key=="other_ans" && val=='Yes')
{
	 $("#answer").attr('checked', true);
}
if(key=="other_ans" && val=='No')
{
	$("#answer1").attr('checked', true);
}
if(key=="answer2" && val=='Yes')
{
	$("#answer2").attr('checked', true);
	$("#moreinfo2").css("display", "block");
}
if(key=="answer2" && val=='No')
{
	$("#answer2").attr('checked', true);
}
if(key=="agent_ic_copy")
{
 $("#agent_ic_copy1").attr({ "src": val });

}
}	
	});
	

});
  
 
	 

}



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
		   }

			}
 else 
		   {
		   return true;
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
			
			
		}else {
			
			$('#healthfile').hide();
			
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
                });}
				else {
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
			editform();
        }
    };
}();

jQuery(document).ready(function() {
    KTWizard2.init();
});
