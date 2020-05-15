"use strict";
// Class definition

var AgentAjex = function() {
	// Private functions

	// basic demo
	var agent = function() {
		
		var base_url = window.location.origin+'/CONSULTANT/Consultants/editagent/';

		var datatable = $('.kt-users').KTDatatable({
			// datasource definition
			data: {
				type: 'remote',
				source: {
					read: {
						url: window.location.origin+'/MAEM/ConsultantsPending/getagents?id='+$("#agentid").val(),
						// sample custom headers
						headers: {'x-my-custokt-header': 'some value', 'x-test-header': 'the value'},
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
					field: 'agnet_cdate',
					title: 'DATE',
					width : 100,
					template: function(row) {
					 var d = new Date(row.agnet_cdate),
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
					field: 'agent_no',
					title: 'CONSULTANT NO',
					//width:'20',
					
				}, 
				{
					field: 'agent_name',
					title: 'CONSULTANT NAME',
			
				
				}, 
			

 
 {
					field: 'agent_level',
					title: 'CONSULTANT TYPE',
					// callback function support for column rendering
					template: function(row) {
						var status = {
							'GM': {'title': 'GROUP MANAGER', 'class': 'kt-badge--primary'},
						'SM': {'title': 'SENIOR MANAGER', 'class': ' kt-badge--info'},
						'CS': {'title': 'CONSULTANT', 'class': ' kt-badge--success'},
						'IB': {'title': 'INTRODUCED BY', 'class': ' kt-badge--brand'}
						
						};
						return '<span class="kt-badge ' + status[row.agent_level].class + ' kt-badge--inline kt-badge--pill">' + status[row.agent_level].title + '</span>';
					},
				},	


 {
					field: 'agent_status',
					title: 'STATUS',
					// callback function support for column rendering
					template: function(row) {
					var status = {
							'0': {'title': 'Pending', 'class': 'kt-badge--danger'},
						'1': {'title': 'Approved', 'class': ' kt-badge--info'},
						
						};
						return '<span class="kt-badge ' + status[row.agent_approval].class + ' kt-badge--inline kt-badge--pill">' + status[row.agent_approval].title + '</span>';
					},
				},
				

							
				

				
				{
					field: 'Actions',
					title: 'ACTION',
					sortable: false,
					width: 110,
					overflow: 'visible',
					autoHide: false,
					template: function(row) {
						
						
						var append = '' ;
										
						return '\
						<div class="dropdown">\
							<a href="javascript:;" class="btn btn-sm btn-clean btn-icon btn-icon-md" data-toggle="dropdown">\
                                <i class="la la-cog"></i>\
                            </a>\
						  	<div class="dropdown-menu dropdown-menu-right">\
						    	<a  class=" dropdown-item"  id="edit" href="/MAEM/Consultants/editagentview/' + row.agent_id + '" >\
												<i class="la la-edit"></i> Edit Details</a>\
								<button class="dropdown-item" data-toggle="modal"  data-target="#sendagentsignlink" data-record-id3="' + row.agent_id + '" ><i class="la la-link"></i> Send Agent Signature Link</a></button>\
						    	</div>\
						</div>\
						';
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

var  open_w2 = function (id) {
$("#agentid2").val(id);
}

$('#sendagentlink').on('shown.bs.modal', function (e) {
console.log($(e.relatedTarget).data('record-id2'));
$("#agentid2").val($(e.relatedTarget).data('record-id2'));
});


$('#sendagentsignlink').on('shown.bs.modal', function (e) {


$("#agentid4").val($(e.relatedTarget).data('record-id3'));

});


$('#edit').on('shown.bs.modal', function (e) {
	

editagent($(e.relatedTarget).data('edit'));
});

var editagent = function(id) {

var settings = {
  "url": window.location.origin+"/CONSULTANT/Consultants/editagent/"+id,
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
                url: window.location.origin+'/CONSULTANT/CustomerForm/sendlink',
				
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
		
		$('#sendExt').click(function(e) {
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
                url: window.location.origin+'/CONSULTANT/ConsultantsExt/sendlink',
				
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
		
		$('#sendAgentSignLink').click(function(e) {
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
                url: window.location.origin+'/MAEM/Consultants/sendagentlinksign',
				
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
                url: window.location.origin+'/CONSULTANT/Consultants/new_agents',
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
			agent();
			open_w();
			send();
			newAgent();
		//	editagent();
			
		},
	};
}();

jQuery(document).ready(function() {
	AgentAjex.init();
});