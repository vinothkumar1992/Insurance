"use strict";
// Class definition

var MemFormAjex = function() {
	// Private functions

	// basic demo
	var mform = function() {
		
		var base_url = window.location.origin+'/MAEM/MemberForm';
		var base_url1 = window.location.origin+'/MAEM/Renewal';

		var datatable = $('.kt-users').KTDatatable({
			// datasource definition
			data: {
				type: 'remote',
				source: {
					read: {
						url: window.location.origin+'/MAEM/MemberForm/getforms',
						// sample custom headers
					//	headers: {'x-my-custokt-header': 'some value', 'x-test-header': 'the value'},
						contentType: 'application/json',
						map: function(raw) {
							console.log(raw);
							var dataSet = raw;
							if (typeof raw.data !== 'undefined') {
								dataSet = raw.data;
							}
							return dataSet;
						},
					
					timeout: 30000
					},
				},
				pageSize: 10,
				serverPaging: true,
				serverFiltering: true,
				serverSorting: true,
			},

			// layout definition
			layout: {
				scroll: false,
				footer: false,
			},

			// column sorting
			sortable: true,

			pagination: true,

			search: {
				input: $('#generalSearch'),
			},


			// columns definition
			columns: [
			
			{
					field: 'form_cdate',
					title: 'DATE',
					width : 100,
					template: function(row) {
					 var d = new Date(row.form_cdate),
        month = '' + (d.getMonth() + 1),
        day = '' + d.getDate(),
        year = d.getFullYear();

    if (month.length < 2) 
        month = '0' + month;
    if (day.length < 2) 
        day = '0' + day;

     return [day ,month,year].join('-');
						
					}
					},
				{
					field: 'form_orderid',
					title: 'ORDER ID',
					width : 100
					},
				{
					field: 'form_name',
					title: 'MEMBER NAME',
					width : 100
					}
				,
				{
					field: 'form_nric',
					title: 'MEMBER NRIC',
					width : 100
					}
				,
				
					{
					field: 'form_email',
					title: 'EMAIL',
					width:200
					}
				,{
				field: 'form_phoneno',
					title: 'PHONE NO',
					width:100
					}
				,
				{
				field: 'form_type',
					title: 'FORM TYPE',
					width:100,
					autoHide: false,
					template: function(row) {
					
						return '<span class="kt-badge kt-badge--info  kt-badge--inline kt-badge--pill">' + row.form_type+ '</span>';
					}
					
					},
				
				{
				field: 'form_payment_status',
					title: 'PAYMENT STATUS',
					template: function(row) {
					var status = {
							'0': {'title': 'Pending', 'class': 'kt-badge--danger'},
						'1': {'title': 'Done', 'class': ' kt-badge--info'},
						
						};
						return '<span class="kt-badge ' + status[row.form_payment_status].class + ' kt-badge--inline kt-badge--pill">' + status[row.form_payment_status].title + '</span>';
					},
					width:100
					},
					
					{
					field: 'Actions',
					title: 'ACTION',
					sortable: false,
					width: 110,
					overflow: 'visible',
					autoHide: false,
					template: function(row) {
						
						if(row.form_payment_status==1 && row.form_type=="New")
						{

if(row.form_member_approval==1)				
{				
					return '<div class="dropdown"><a href="javascript:;" class="btn btn-sm btn-clean btn-icon btn-icon-md" data-toggle="dropdown"><i class="la la-cog"></i></a><div class="dropdown-menu dropdown-menu-right"><a class="dropdown-item" data-approval="' + row.id + '" href="'+base_url+'/member_approval/'+row.id+'"><i class="la la-user"></i> Member Approval </a></div></div>';
}
else
{
return '<div class="dropdown"><a href="javascript:;" class="btn btn-sm btn-clean btn-icon btn-icon-md" data-toggle="dropdown"><i class="la la-cog"></i><span class="kt-badge kt-badge--brand kt-badge--dot kt-badge--lg"></span></a><div class="dropdown-menu dropdown-menu-right"><a class="dropdown-item" data-approval="' + row.id + '" href="'+base_url+'/member_approval/'+row.id+'"><i class="la la-user"></i> Member Approval </a></div></div>';
}	
						}
						
						
						
						if(row.form_payment_status==0 && row.form_type=="New")
						{
						
							
							
							
						
						if(row.form_upload_slip==0  && row.form_payment_type=="Banking" )				
{				
					return  '\
						<div class="dropdown">\
							<a href="javascript:;" class="btn btn-sm btn-clean btn-icon btn-icon-md" data-toggle="dropdown">\
                                <i class="la la-cog"></i>\
                            </a>\
						  	<div class="dropdown-menu dropdown-menu-right">\
							<a class="dropdown-item" href="'+ window.location.origin+'/MAEM/Formsubmission/banksliplink?e='+row.form_email+'&o='+row.form_orderid+'" target="_blank" ><i class="la la-upload"></i>Banking Slip upload</a>\
						    	<a  class=" dropdown-item"  id="edit" href="'+base_url+'/editForm/' + row.id + '" >\
												<i class="la la-edit"></i> Edit Details</a>\
											\
						    	<a class="dropdown-item"   data-approval="' + row.id + '" href="'+base_url+'/payment_approval/'+row.id+'"><i class="la la-dollar"></i> Payment Approval </a>\
						  	<button class="dropdown-item" data-toggle="modal"  data-target="#sendsignpadlink" data-record-id2="' + row.id + '" ><i class="la la-link"></i> Send Signature Link</a></button>\
							</div>\
						</div>\
						';
					
}else if( row.form_payment_type=="Online" ){
	
	return  '\
						<div class="dropdown">\
							<a href="javascript:;" class="btn btn-sm btn-clean btn-icon btn-icon-md" data-toggle="dropdown">\
                                <i class="la la-cog"></i>\
                            </a>\
						  	<div class="dropdown-menu dropdown-menu-right">\
							<a class="dropdown-item" href="'+ window.location.origin+'/MAEM/PaymentGateway/eGHLgateway?form_email='+row.form_email+'&form_orderid='+row.form_orderid+"&form_phoneno="+row.form_phoneno+"&form_name="+row.form_name+'" target="_blank" ><i class="la la-upload"></i>Retry Online </a>\
						    	<a  class=" dropdown-item"  id="edit" href="'+base_url+'/editForm/' + row.id + '" >\
												<i class="la la-edit"></i> Edit Details</a>\
											\
						    	<a class="dropdown-item"   data-approval="' + row.id + '" href="'+base_url+'/payment_approval/'+row.id+'"><i class="la la-dollar"></i> Payment Approval </a>\
						  	<button class="dropdown-item" data-toggle="modal"  data-target="#sendsignpadlink" data-record-id2="' + row.id + '" ><i class="la la-link"></i> Send Signature Link</a></button>\
							</div>\
						</div>\
						';
					

	
							
}else 	if(row.form_upload_slip!=0  && row.form_payment_type=="Banking" )				
{				
					return  '\
						<div class="dropdown">\
							<a href="javascript:;" class="btn btn-sm btn-clean btn-icon btn-icon-md" data-toggle="dropdown">\
                                <i class="la la-cog"></i>\
                            </a>\
						  	<div class="dropdown-menu dropdown-menu-right">\
							<a  class=" dropdown-item"  id="edit" href="'+base_url+'/editForm/' + row.id + '" >\
												<i class="la la-edit"></i> Edit Details</a>\
											\
						    	<a class="dropdown-item"   data-approval="' + row.id + '" href="'+base_url+'/payment_approval/'+row.id+'"><i class="la la-dollar"></i> Payment Approval </a>\
						  	<button class="dropdown-item" data-toggle="modal"  data-target="#sendsignpadlink" data-record-id2="' + row.id + '" ><i class="la la-link"></i> Send Signature Link</a></button>\
							</div>\
						</div>\
						';
					
}


else
{
return '\
						<div class="dropdown">\
							<a href="javascript:;" class="btn btn-sm btn-clean btn-icon btn-icon-md" data-toggle="dropdown"><i class="la la-cog"></i><span class="kt-badge kt-badge--brand kt-badge--dot kt-badge--lg"></span></a><div class="dropdown-menu dropdown-menu-right"><a class="dropdown-item"   data-approval="' + row.id + '" href="'+base_url+'/payment_approval/'+row.id+'">\
                                <i class="la la-dollar"></i> Payment Approval\
                            </a>\
						 </div>\
						';

}
						
						
						}
						


			if(row.form_payment_status==1 && row.form_type=="Renewal")
						{

if(row.form_member_approval==1)				
{				
					return '<div class="dropdown"><a href="javascript:;" class="btn btn-sm btn-clean btn-icon btn-icon-md" data-toggle="dropdown"><i class="la la-cog"></i></a><div class="dropdown-menu dropdown-menu-right"><a class="dropdown-item" data-approval="' + row.id + '" href="'+base_url1+'/member_approval/'+row.id+'"><i class="la la-user"></i> Member Approval </a></div></div>';
}
else
{
return '<div class="dropdown"><a href="javascript:;" class="btn btn-sm btn-clean btn-icon btn-icon-md" data-toggle="dropdown"><i class="la la-cog"></i><span class="kt-badge kt-badge--brand kt-badge--dot kt-badge--lg"></span></a><div class="dropdown-menu dropdown-menu-right"><a class="dropdown-item" data-approval="' + row.id + '" href="'+base_url1+'/member_approval/'+row.id+'"><i class="la la-user"></i> Member Approval </a></div></div>';
}	
						}
						
						
						
						if(row.form_payment_status==0 && row.form_type=="Renewal")
						{
						
						if(row.form_upload_slip==0)				
{				
					return '<div class="dropdown"><a href="javascript:;" class="btn btn-sm btn-clean btn-icon btn-icon-md" data-toggle="dropdown"><i class="la la-cog"></i></a><div class="dropdown-menu dropdown-menu-right"><a class="dropdown-item"   data-approval="' + row.id + '" href="'+base_url1+'/renewal_payment_approval/'+row.id+'"><i class="la la-dollar"></i> Payment Approval </a></div></div>';
}
else
{
return '<div class="dropdown"><a href="javascript:;" class="btn btn-sm btn-clean btn-icon btn-icon-md" data-toggle="dropdown"><i class="la la-cog"></i><span class="kt-badge kt-badge--brand kt-badge--dot kt-badge--lg"></span></a><div class="dropdown-menu dropdown-menu-right"><a class="dropdown-item"   data-approval="' + row.id + '" href="'+base_url1+'/renewal_payment_approval/'+row.id+'"><i class="la la-dollar"></i> Payment Approval </a></div></div>';
}
						
						
						}
						
				




				},
				}
				

				
				],

		});

   datatable.on('click', '[data-record-id]', function() {
			open_w($(this).data('record-id'));
	///alert("Hai");

		});







	};

var  open_w = function (id) {
$("#agentid").val(id);
}

$('#edit').on('shown.bs.modal', function (e) {
	

editagent($(e.relatedTarget).data('edit'));
});



$('#sendsignpadlink').on('shown.bs.modal', function (e) {
	
console.log($(e.relatedTarget).data('record-id2'));

$("#agentid3").val($(e.relatedTarget).data('record-id2'));

});


var editagent = function(id) {

var settings = {
  "url": window.location.origin+"/MAEM/Agents/editagent/"+id,
  "method": "POST",
  "timeout": 0,
  "headers": {
    "Content-Type": "application/x-www-form-urlencoded"
  },
};

$.ajax(settings).done(function (data) {
    $.each(data, function (key, val) {
    $("#"+key+"1").val(val);
  
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
 });
	

});
  
 
	 

}	

	
	
	var send = function(id) {
	$("#agentid").val(0);
	 $('#send').click(function(e) {
            e.preventDefault();

            var btn = $(this);
            var form = $(this).closest('form');

/*
            form.validate({
                rules: {
                    username: {
                        required: true,
                       
                    },
					
					password: {
                        required: true,
                       
                    }
					,
					email: {
                        required: true,
						email:true
                       
                    }
					
                }
            });

            if (!form.valid()) {
                return;
            }
*/
            btn.addClass('kt-spinner kt-spinner--right kt-spinner--sm kt-spinner--light').attr('disabled', true);

            form.ajaxSubmit({
                url: window.location.origin+'/MAEM/CustomerForm/sendlink',
				
				error:function(){
               btn.removeClass('kt-spinner kt-spinner--right kt-spinner--sm kt-spinner--light').attr('disabled', false); // remove
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
	btn.removeClass('kt-spinner kt-spinner--right kt-spinner--sm kt-spinner--light').attr('disabled', false); // remove
	                    form.clearForm(); // clear form
	                    form.validate().resetForm(); // reset validation states
						 $('#sendlink').modal('hide');
	                
 swal.fire({

                    "title": "",
                    "text": response.msg,
                    "type": "success",
                    "confirmButtonClass": "btn btn-secondary"
					
                   
                });
                	

 if(response.phone!="")
					{	
					var url="https://web.whatsapp.com/send?phone="+response.phone+"&text="+encodeURI(response.url);
					window.open(url,'_blank');
                    }
					

}
else
{

//form.clearForm(); // clear form
	//                    form.validate().resetForm()				
					// similate 2s delay
	                    btn.removeClass('kt-spinner kt-spinner--right kt-spinner--sm kt-spinner--light').attr('disabled', false);
	                     swal.fire({

                    "title": "",
                    "text": response.msg,
                    "type": "error",
                    "confirmButtonClass": "btn btn-secondary",
                    "onClose": function(e) {
                        console.log('on close event fired!');
                    }
                });

}	
				
               
                }
            });
        });
		
		
			$('#sendSignLink').click(function(e) {
            e.preventDefault();
            
            var btn = $(this);
            var form = $(this).closest('form');

/*
            form.validate({
                rules: {
                    username: {
                        required: true,
                       
                    },
					
					password: {
                        required: true,
                       
                    }
					,
					email: {
                        required: true,
						email:true
                       
                    }
					
                }
            });

            if (!form.valid()) {
                return;
            }
*/
            btn.addClass('kt-spinner kt-spinner--right kt-spinner--sm kt-spinner--light').attr('disabled', true);

            form.ajaxSubmit({
                url: window.location.origin+'/MAEM/MemberForm/sendlinkSign',
				
				error:function(){
               btn.removeClass('kt-spinner kt-spinner--right kt-spinner--sm kt-spinner--light').attr('disabled', false); // remove
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
	btn.removeClass('kt-spinner kt-spinner--right kt-spinner--sm kt-spinner--light').attr('disabled', false); // remove
	                    form.clearForm(); // clear form
	                    form.validate().resetForm(); // reset validation states
						 $('#sendlink').modal('hide');
	                
 swal.fire({

                    "title": "",
                    "text": response.msg,
                    "type": "success",
                    "confirmButtonClass": "btn btn-secondary"
					
                   
                });
                	

 if(response.phone!="")
					{	
					var url="https://web.whatsapp.com/send?phone="+response.phone+"&text="+encodeURI(response.url);
					window.open(url,'_blank');
                    }
					

}
else
{

//form.clearForm(); // clear form
	//                    form.validate().resetForm()				
					// similate 2s delay
	                    btn.removeClass('kt-spinner kt-spinner--right kt-spinner--sm kt-spinner--light').attr('disabled', false);
	                     swal.fire({

                    "title": "",
                    "text": response.msg,
                    "type": "error",
                    "confirmButtonClass": "btn btn-secondary",
                    "onClose": function(e) {
                        console.log('on close event fired!');
                    }
                });

}	
				
               
                }
            });
        });
	
	
	};
	
	
	// new AgentAjex
	
	
	var newAgent = function() {
        $('#newAgent').click(function(e) {
            e.preventDefault();

            var btn = $(this);
            var form = $(this).closest('form');

            form.validate({
                rules: {
                    agent_name: {
                        required: true,
                       
                    },
					agent_nric_no: {
                        required: true,
                       
                    },
					agent_age: {
                        required: true,
                       
                    },
					agent_address1: {
                        required: true,
                       
                    },
					agent_city: {
                        required: true,
                       
                    },
					agent_state: {
                        required: true,
                       
                    },
					agent_pincode: {
                        required: true,
                       
                    },
					date_of_birth: {
                        required: true,
                       
                    },
					agent_gender: {
                        required: true,
                       
                    },
					agent_race: {
                        required: true,
                       
                    }
					,
					agent_marital_status: {
                        required: true,
                       
                    },
					agent_level: {
                        required: true,
                       
                    },
					agent_password: {
                        required: true,
                       
                    },
					agent_bank_name: {
                        required: true,
                       
                    },
					agent_bank_ac_no: {
                        required: true,
                       
                    },
					agent_email: {
                        required: true,
						email:true
                       
                    }
					
                }
            });

            if (!form.valid()) {
                return;
            }

            btn.addClass('kt-spinner kt-spinner--right kt-spinner--sm kt-spinner--light').attr('disabled', true);

            form.ajaxSubmit({
                url: window.location.origin+'/MAEM/Agents/new_agents',
                success: function(response, status, xhr, $form) { 
				console.log(response);
				
				
if (response=="1")
{
	btn.removeClass('kt-spinner kt-spinner--right kt-spinner--sm kt-spinner--light').attr('disabled', false); // remove
	                    form.clearForm(); // clear form
	                    form.validate().resetForm(); // reset validation states
						 $('#adduser').modal('hide');
	                
 swal.fire({

                    "title": "",
                    "text": "Successfully created!",
                    "type": "success",
                    "confirmButtonClass": "btn btn-secondary"
					 
					
                });
                	
var table =$('.kt-users').KTDatatable();
table.reload();

}
else
{

//form.clearForm(); // clear form
	//                    form.validate().resetForm()				
					// similate 2s delay
	                    btn.removeClass('kt-spinner kt-spinner--right kt-spinner--sm kt-spinner--light').attr('disabled', false);
	                     swal.fire({

                    "title": "",
                    "text": response,
                    "type": "error",
                    "confirmButtonClass": "btn btn-secondary",
                    "onClose": function(e) {
                        console.log('on close event fired!');
                    }
                });

}	
				
               
                }
            });
        });
    };
	
	// new AgentAjex
	
	
	
	
	

	return {
		// public functions
		init: function() {
			mform();
			open_w();
			send();
			newAgent();
		//	editagent();
			
		},
	};
}();

jQuery(document).ready(function() {
	MemFormAjex.init();
});