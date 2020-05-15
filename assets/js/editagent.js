"use strict";

// Class definition
var KTWizard2 = function () {
    // Base elements
    var wizardEl;
    var formEl;
    var validator;
    var wizard;
	var bankArray={};
	
	
	
	$("#agent_bank_name").change(function() {
	
	$("#agent_bank_bcode").val(bankArray[$("#agent_bank_name").val()]);
	
});

var bank = function(id) {

var settings = {
  "url": window.location.origin+"/MAEM/Consultants/getBanks",
  "method": "GET",
  "timeout": 0,
  "headers": {
    "Content-Type": "application/x-www-form-urlencoded"
  },
};

$.ajax(settings).done(function (data) {
	console.log("",data);
   for (var i = 0; i < data.length; i++) {
	   //bankArray={data[i].bank_name : "" + data[i].bank_bcode};
	   bankArray[data[i].bank_name] = data[i].bank_bcode
  var opt = document.createElement("option");
  document.getElementById("agent_bank_name").innerHTML += '<option value="' + data[i].bank_name + '">' + data[i].bank_name + '</option>';
  //document.getElementById("role1").innerHTML += '<option value="' + data[i].role_id + '">' + data[i].role_name + '</option>';
}
});
	}





var editagent = function(id) {
	id=$("#agentid"). val();
 //debugger;
var settings = {
  "url": window.location.origin+"/MAEM/Consultants/editagent/"+id,
  "method": "POST",
  "timeout": 0,
  "headers": {
    "Content-Type": "application/x-www-form-urlencoded"
  },
};

$.ajax(settings).done(function (data) {
	
	
	//debugger;
    $.each(data, function (key, val) {
		
		console.log(key+ ""+val)
	if(key=="agent_ic_copy")
{
 $("#agent_ic_copy_img").append(val);
} else if(key=="agent_ic_copy1")
{
 $("#agent_ic_copy_img1").append(val);
 
} else if(key=="agent_ic_copy2")
{
 $("#agent_ic_copy_img2").attr({ "src": val });
} else if(key=="agent_others")
{
 $("#agent_others_img").attr({ "src": val });
}else{
	
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
            if (validator.form() !== true) {
                wizardObj.stop();  // don't go to the next step
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
			
		
				agent_level: {
					required: true
				},
				agent_name: {
					required: true
				},
				agent_nric_no: {
					//required: true,
					nriccheck:true
				},
				agent_email: {
					required: true,
					email: true
				},

				//= Step 2
				agent_address1: {
					required: true
				},
			
				agent_pincode: {
					required: true
				},
				agent_city: {
					required: true
				},

				//= Step 3
				agent_state: {
					required: true
				},
				agent_county: {
					required: true
				},
				agent_phone_no: {
					required: true
				},

				//= Step 4
				agent_home_office_no: {
					required: true
				},
				agent_dob: {
					required: true
				},
				agent_age: {
					required: true
				},
				agent_marital_status: {
					required: true
				},
				agent_religion: {
					required: true
				},
				agent_gender: {
				required:true				
				}
,
				//= Step 5
				agent_race: {
					required: true
				},
				agent_bank_name: {
					required: true
				},
				agent_bank_ac_no: {
					required: true
				}
				,
				agent_bank_accountname: {
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
	
	
	
	}
	
	
	var QA= function ()
{
	
 $("#moreinfo").hide();
	  $("#moreinfo2").hide();
	  
	 $('input:radio[name=other_ans]').change(function() {
        if (this.value == 'Yes') {
            $("#moreinfo").show();
			$( "#moreinfo" ).rules( "add", {required:true});	
        }
		else
		{
		 $("#moreinfo").val("");
$( "#moreinfo" ).rules( "remove" );
$( "#moreinfo" ).removeClass("error");


	 
		 $("#moreinfo").hide();
		
		}			
        
    });
	
	
	 $('input:radio[name=answer2]').change(function() {
        if (this.value == 'Yes') {
            $("#moreinfo2").show();
			$( "#moreinfo2" ).rules( "add", {required:true});	
        }
		else
		{
 $("#moreinfo2").val("");			
	$( "#moreinfo2" ).rules( "remove" );	
		$("#moreinfo2").hide();
		}			
        
    });  
	  
}



	
	
	var NRIC_check = function() {


$("#agent_nric_no").change(function() {

var ic =$(this).val();
ic =ic.replace(/-|\s/g,"")
$(this).val(ic);
});





$("#agent_nric_no").change(function() {

var ic =$(this).val();
ic =ic.replace(/-|\s/g,"")
$(this).val(ic);


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

    var date = new Date(year, (month), day, 0, 0, 0, 0);
	$("#agent_dob").val(date.getFullYear()+"-"+month+"-"+day);
    console.log(date.toISOString());
	var diff_ms = Date.now() - date.getTime();
	 var age_dt = new Date(diff_ms); 
	 $("#agent_age").val(Math.abs(age_dt.getUTCFullYear() - 1970));
	 
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
              
                KTApp.progress(btn);
        
                formEl.ajaxSubmit({
                    success: function(response) {
                        KTApp.unprogress(btn);
                       
					     swal.fire({
                            "title": "",
							"html" :response.text,
						
                         //   "text": "The application has been successfully submitted!",
                            "type": response.type,
                            "confirmButtonClass": "btn btn-secondary",
							
                        }).then(function(result){
							if(response.type=="success")
							{	
								
						window.location.href="https://myangkasaemas.com/MAEM/Consultants";
						
							}	

                            if (response.text=="Please change any field to update"){
                               window.location.href="https://myangkasaemas.com/MAEM/Consultants";
						

                            }							
					});

                        
                    }
                });
            }
        });
    }

    return {
        // public functions
        init: function() {
            wizardEl = KTUtil.get('kt_wizard_v2');
            formEl = $('#kt_form');
            bank(); 
            initWizard();
         initValidation();
            initSubmit();
			QA();
			NRIC_check();
			editagent();
        }
    };
}();

jQuery(document).ready(function() {
    KTWizard2.init();
	
	$("#agent_approval").change(function() {
//debugger;
var agent_status_approval =$(this).val();
var agent_no=$("#agent_no").val();
var id=$("#agentid"). val();
//debugger;
if(agent_status_approval == 1 && (agent_no == '' || agent_no == undefined || agent_no == null ))
{
	var new_id=parseInt(id);
$("#agent_no").val("MA0"+new_id+"EB");
}
if (agent_status_approval == 0){
	$("#agent_no").val('');
}

});
});
