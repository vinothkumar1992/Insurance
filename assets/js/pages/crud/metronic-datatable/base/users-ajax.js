"use strict";
// Class definition

var KTDatatableRemoteAjaxDemo = function() {
	// Private functions

	// basic demo
	var demo = function() {
		
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
					field: 'id',
					title: '#',
					width:'20',
					
				}, 
				{
					field: 'username',
					title: 'Username',
			
				
				}, 
				{
					field: 'email',
					title: 'Email',
					width:'300',
					
				}, 

/*
 
 {
					field: 'menu',
					title: 'Role',
					// callback function support for column rendering
					template: function(row) {
						var status = {
							1: {'title': 'Admin', 'class': 'kt-badge--primary'},
							2: {'title': 'User', 'class': ' kt-badge--info'},
						
						};
						return '<span class="kt-badge ' + status[row.menu].class + ' kt-badge--inline kt-badge--pill">' + status[row.menu].title + '</span>';
					},
				},	
*/

 {
					field: 'active',
					title: 'Status',
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
					title: 'Actions',
					sortable: false,
					width: 110,
					overflow: 'visible',
					autoHide: false,
					template: function(row) {
						return '\
						<a href="'+base_url+row.company_id+'/'+row.id+'" class="btn btn-sm btn-clean btn-icon btn-icon-sm" title="Edit details">\
							<i class="flaticon2-paper"></i>\
						</a>\
				';
					},
				}
				

				
				],

		});

   

	};

	return {
		// public functions
		init: function() {
			demo();
		},
	};
}();

jQuery(document).ready(function() {
	KTDatatableRemoteAjaxDemo.init();
});