"use strict";
// Class definition

var UserAjex = function() {
	// Private functions

	// basic demo
	var users = function() {
		
		var base_url = window.location.origin+'/MAEM/Users/edituser/';

		var datatable = $('.kt-users').KTDatatable({
			// datasource definition
			data: {
				type: 'remote',
				source: {
					read: {
						url: window.location.origin+'/MAEM/Users/getusers',
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
					field: 'username',
					title: 'USERNAME',
			
				
				}, 
				{
					field: 'email',
					title: 'EMAIL',
					width:'300',
					
				}, 


 {
					field: 'active',
					title: 'STATUS',
					// callback function support for column rendering
					template: function(row) {
						var status = {
							0: {'title': 'Not Active', 'class': 'kt-badge--warning'},
							1: {'title': 'Active', 'class': ' kt-badge--success'},
						
						};
						return '<span class="kt-badge ' + status[row.active].class + ' kt-badge--inline kt-badge--pill">' + status[row.active].title + '</span>';
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
						return '\
		                  <button data-toggle="modal" data-target="#edituser" data-record-id="' + row.id + '" class="btn btn-sm btn-default btn-font-sm" title="Edit details">\
		                      <i class="flaticon-settings-1"></i> Edit\
		                  </button>\
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
	
var edituser = function(id) {

var settings = {
  "url": window.location.origin+"/MAEM/Users/edituser/"+id,
  "method": "POST",
  "timeout": 0,
  "headers": {
    "Content-Type": "application/x-www-form-urlencoded"
  },
};

$.ajax(settings).done(function (data) {
    $.each(data, function (key, val) {
    $("#"+key+"1").val(val);
  if(key=="active" && val==1)
  {
  $("#active").attr('checked', true);
  }
else
{
 $("#active2").attr('checked', true);
}	
  });
});
  

}	
	
	
 var newuser = function() {
        $('#newuser').click(function(e) {
            e.preventDefault();

            var btn = $(this);
            var form = $(this).closest('form');

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

            btn.addClass('kt-spinner kt-spinner--right kt-spinner--sm kt-spinner--light').attr('disabled', true);

            form.ajaxSubmit({
                url: window.location.origin+'/MAEM/Users/adduser',
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

	
	var team = function(id) {

var settings = {
  "url": window.location.origin+"/MAEM/Users/getRole",
  "method": "GET",
  "timeout": 0,
  "headers": {
    "Content-Type": "application/x-www-form-urlencoded"
  },
};

$.ajax(settings).done(function (data) {
	console.log("",data);
   for (var i = 0; i < data.length; i++) {
  var opt = document.createElement("option");
  document.getElementById("role").innerHTML += '<option value="' + data[i].role_id + '">' + data[i].role_name + '</option>';
  document.getElementById("role1").innerHTML += '<option value="' + data[i].role_id + '">' + data[i].role_name + '</option>';
}
});
	}

 var updateuser = function() {
        $('#updateuser').click(function(e) {
            e.preventDefault();

            var btn = $(this);
            var form = $(this).closest('form');

            form.validate({
                rules: {
                    username1: {
                        required: true,
                       
                    }
					
                }
            });

            if (!form.valid()) {
                return;
            }

            btn.addClass('kt-spinner kt-spinner--right kt-spinner--sm kt-spinner--light').attr('disabled', true);

            form.ajaxSubmit({
                url: window.location.origin+'/MAEM/Users/updateuser',
                success: function(response, status, xhr, $form) { 
				console.log(response);
				
				
if (response=="1")
{
	btn.removeClass('kt-spinner kt-spinner--right kt-spinner--sm kt-spinner--light').attr('disabled', false); // remove
	                    form.clearForm(); // clear form
	                    form.validate().resetForm(); // reset validation states
						 $('#edituser').modal('hide');
	                
 swal.fire({

                    "title": "",
                    "text": "Successfully updated!",
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

	


	return {
		// public functions
		init: function() {
			team();
			users();
			newuser();
			updateuser();
		},
	};
	
	
	
	
	
}();

jQuery(document).ready(function() {
	UserAjex.init();
});