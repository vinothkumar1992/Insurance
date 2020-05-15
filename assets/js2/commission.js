"use strict";
// Class definition

var AgentAjex = function() {
	// Private functions

	// basic demo
	var agent = function() {
		
		//var base_url = window.location.origin+'/MAEM/Agents/editagent/';

		var datatable = $('.kt-users').KTDatatable({
			// datasource definition
			data: {
				type: 'remote',
				source: {
					read: {
						url: window.location.origin+'/MAEM/Commission/getcommission',
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
					field: 'form_submission_date',
					title: 'Submission Date',
					width : 100,
					template: function(row) {
					 var d = new Date(row.form_submission_date),
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
					field: 'form_payment_date',
					title: 'Payment Date',
					width : 100,
					template: function(row) {
					 var d = new Date(row.form_payment_date),
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
					field: 'members_name',
					title: 'MEMBER NAME',
			template: function(row) {
						
						return ''+row.members_name+'<h6 class="kt-font-info">ID:'+row.membership_id+'</h6>';
					},
					width:100
				
				},

{
					field: 'gm_name',
					title: 'GROUP MANAGER',
					
			template: function(row) {
						
						return row.gm_name==null ? 'NO GROUP MANAGER ' : ''+row.gm_name+'<h6 class="kt-font-info">ID: '+row.gm_no+'</h6>';
					},
					width:100
				
				},
				
				{
					field: 'ac_gm_amount',
					title: 'GM AMOUNT(%)',
			template: function(row) {
						
						return row.ac_gm_amount==null ?'<h6 class="kt-font-danger">NO GROUP AMOUNT </h6>' : ''+row.ac_gm_amount+' ('+row.ac_gm_percentage+'%)</h6>';
					},
					width:100
				
				},
				

	
{
					field: 'sm_name',
					title: 'SENIOR MANAGER',

			template: function(row) {
						
						return row.sm_name==null ? 'NO SENIOR MANAGER' :  ''+row.sm_name+'<h6 class="kt-font-info">ID: '+row.sm_no+'</h6>';
					},
width:100
				
			
				
				},
				
				{
					field: 'ac_sm_amount',
					title: 'SM AMOUNT(%)',
			template: function(row) {
						
						return row.ac_sm_amount==null ? '<h5 class="kt-font-danger">NO SENIOR AMOUNT </h5>' :''+row.ac_sm_amount+' ('+row.ac_sm_percentage+'%)</h6>';
					},
					width:100
				
				},
				
	{
					field: 'cs_name',
					title: 'CONSULTANTS',

			template: function(row) {
						
						return row.cs_name==null ? 'DIRECT SALES' :  ''+row.cs_name+'<h6 class="kt-font-info">ID: '+row.cs_no+'</h6>';
					},
width:100
				
			
				
				},
				{
					field: 'ac_agent_amount',
					title: 'CS AMOUNT(%)',
			template: function(row) {
						
						return row.ac_agent_amount==null ? '<h5 class="kt-font-danger">NO CS AMOUNT </h5>' :''+row.ac_agent_amount+' ('+row.ac_agent_percentage+'%)</h6>';
					},
					width:100
				
				},
				
	
	{
					field: '',
					title: 'TOTAL AMOUNT',
					align: "center",
					
			template: function(row) {
				var tot = 0.0;
				if(row.ac_gm_amount != null){
                 tot= tot + parseFloat( row.ac_gm_amount) ;
				}
				if (row.ac_sm_amount != null){
                 tot= tot + parseFloat( row.ac_sm_amount );
				} 

				if (row.ac_agent_amount != null) {
                 tot= tot + parseFloat(row.ac_agent_amount );
				}				
				
						
						return tot.toFixed(2);
					},
					width:100,
				
				},
				

	
/*
 
 {
					field: 'ac_approval',
					title: 'APPROVAL',
					// callback function support for column rendering
					template: function(row) {
						var status = {
							'0': {'title': 'Pending', 'class': 'kt-badge--primary'},
						'1': {'title': 'Approved', 'class': ' kt-badge--info'},
						
						};
						return '<span class="kt-badge ' + status[row.ac_approval].class + ' kt-badge--inline kt-badge--pill">' + status[row.ac_approval].title + '</span>';
					},
				},	


 {
					field: 'agent_status',
					title: 'Status',
					// callback function support for column rendering
					template: function(row) {
						var status = {
							0: {'title': 'Not Active', 'class': 'kt-badge--warning'},
							1: {'title': 'Active', 'class': ' kt-badge--success'},
						
						};
						return '<span class="kt-badge ' + status[row.agent_status].class + ' kt-badge--inline kt-badge--pill">' + status[row.agent_status].title + '</span>';
					},
				},
				

	{
					field: 'Links',
					title: 'Link',
					sortable: false,
					width: 110,
					overflow: 'visible',
					autoHide: false,
					template: function(row) {
						return '\
		                  <button data-toggle="modal" data-target="#sendlink" data-record-id="' + row.agent_id + '" class="btn btn-sm btn-default btn-font-sm" title="Generate Link">\
		                      <i class="flaticon2-document"></i> Generate\
		                  </button>\
				';
					},
				}
				
			,
				

				
				{
					field: 'Actions',
					title: 'Actions',
					sortable: false,
					width: 110,
					overflow: 'visible',
					autoHide: false,
					template: function(row) {
						return '\
						<div class="dropdown">\
							<a href="javascript:;" class="btn btn-sm btn-clean btn-icon btn-icon-md" data-toggle="dropdown">\
                                <i class="la la-cog"></i>\
                            </a>\
						  	<div class="dropdown-menu dropdown-menu-right">\
						    	<a  class="dropdown-item" data-toggle="modal" data-target="#edit"   data-edit="' + row.agent_id + '" ><i class="la la-edit"></i> Edit Details</a>\
						    	<a class="dropdown-item" data-toggle="modal" data-target="#approval"  data-approval="' + row.agent_id + '"><i class="la la-leaf"></i> Agent approval Status</a>\
						  	</div>\
						</div>\
						';
					},
				}
				
*/
				
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