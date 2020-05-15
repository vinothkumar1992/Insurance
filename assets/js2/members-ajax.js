"use strict";
// Class definition

var UserAjex = function() {
	// Private functions

	// basic demo
	var users = function() {
		
		
		var datatable = $('.kt-users').KTDatatable({
			// datasource definition
			data: {
				type: 'remote',
				source: {
					read: {
						url: window.location.origin+'/MAEM/Members/getmembers',
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
					field: 'form_submission_date',
					title: 'SUBMISSION DATE',
					width : 150,
					template: function(row) {
						
						if (row.form_submission_date!=null){
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
else { return ""; }
						
					}
					},
					{
					field: 'form_payment_date',
					title: 'PAYMENT DATE',
					width : 150,
					template: function(row) {
						if (row.form_payment_date!=null){
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
else { return ""; }
						
					}
					},
			
				{
					field: 'membership_id',
					title: 'MEMBERSHIP ID',
			
				
				}, 
				{
					field: 'members_name',
					title: 'NAME',
					width:'200',
					
				}, 


{
					field: 'nric_no',
					title: 'NRIC NO',
					width:'200',
					
				}, 

				
				
				
				{
					field: 'Actions',
					title: 'ACTION',
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
		                  <a  class=" dropdown-item"  href="'+window.location.origin+'/MAEM/Members/memberprofile/'+row.id+'" class="btn btn-sm btn-default btn-font-sm" title="details">\
		                      <i class="flaticon-file-2"> </i> View Details\
		                  </a>\
						  <button class="dropdown-item" data-toggle="modal"  data-target="#sendakglink" data-record-id2="' + row.id + '" ><i class="la la-link"></i> Resend Acknowlegment Letter</a></button>\
						 </div>\
				';
					},
				}
				

				
				],

		});

   datatable.on('click', '[data-record-id]', function() {
			edituser($(this).data('record-id'));
			//$('#kt_modal_sub_KTDatatable_remote').modal('show');
		});

	};
	
	$('#sendakglink').on('shown.bs.modal', function (e) {
	

$("#id").val($(e.relatedTarget).data('record-id2'));

});
	
	
	
	$('#sendakgemail').click(function(e) {
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
                url: window.location.origin+'/MAEM/MemberForm/resendAkgEmail',
				
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
	

	

	return {
		// public functions
		init: function() {
			users();
		//	newuser();
		//	updateuser();
		},
	};
}();

jQuery(document).ready(function() {
	UserAjex.init();
});