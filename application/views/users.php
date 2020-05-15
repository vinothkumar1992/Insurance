<!DOCTYPE html>
<html lang="en">

<!-- begin::Head -->
<?php $this->load->view('header'); ?>
<!-- begin::Head -->

	<!-- begin::Body -->
	<body class="kt-quick-panel--right kt-demo-panel--right kt-offcanvas-panel--right kt-header--fixed kt-header-mobile--fixed kt-subheader--enabled kt-subheader--solid kt-aside--enabled kt-aside--fixed kt-aside--minimize kt-page--loading">
<!-- begin:: Page -->

<!-- begin:: Header Mobile -->
<?php $this->load->view('mobileheader'); ?>

<!-- end:: Header Mobile -->
	
	
<div class="kt-grid kt-grid--hor kt-grid--root">
		
		<div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--ver kt-page">

<!-- begin:: Aside -->
<?php $this->load->view('aside'); ?>
<!-- end:: Aside -->

	<div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor kt-wrapper" id="kt_wrapper">

<!-- begin:: Header TopMenu -->
<?php $this->load->view('headermenu'); ?>
<!-- end:: Header TopMenu-->


<!-- begin:: Main Content Area -->

<div class="kt-content  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" id="kt_content">

<!-- end:: Subheader -->
<?php //$this->load->view('subheader',array("page"=>"Dashboard")); ?>
<!-- begain:: Subheader -->

<!-- begin:: Content -->

<div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">

<div class="alert" >
</div>


							
							<div class="kt-portlet kt-portlet--mobile">
								<div class="kt-portlet__head kt-portlet__head--lg">
									<div class="kt-portlet__head-label">
										<span class="kt-portlet__head-icon">
											<i class="kt-font-brand flaticon-users-1	"></i>
										</span>
										<h3 class="kt-portlet__head-title">
											Users
										</h3>
									</div>
									<div class="kt-portlet__head-toolbar">
										<div class="kt-portlet__head-wrapper">
											<button data-toggle="modal" data-target="#adduser" class="btn btn-brand btn-icon-sm">
												<i class="la la-plus"></i>
												Add New User
											</button>
											
										</div>
									</div>
								</div>
								<div class="kt-portlet__body">

									<!--begin: Search Form -->
								
									<div class="kt-form kt-form--label-right kt-margin-t-20 kt-margin-b-10">
										<div class="row align-items-center">
											<div class="col-xl-8 order-2 order-xl-1">
												<div class="row align-items-center">
													<div class="col-md-4 kt-margin-b-20-tablet-and-mobile">
														<div class="kt-input-icon kt-input-icon--left">
															<input type="text" class="form-control" placeholder="Search by Username" id="generalSearch">
															<span class="kt-input-icon__icon kt-input-icon__icon--left">
																<span><i class="la la-search"></i></span>
															</span>
														</div>
													</div>
												
												</div>
											</div>
											
										</div>
									</div>

									<!--end: Search Form -->
								</div>
								<div class="kt-portlet__body kt-portlet__body--fit">

									<!--begin: Datatable -->
                                    <div class="kt-users" id="ajax_data"></div>

									<!--end: Datatable -->
								</div>
							</div>
						</div>
<!-- end:: Content -->
</div>
<!-- end::  Main Content Area -->

	<!-- begin:: Footer -->
	<?php $this->load->view('footer'); ?>
	
<!-- end:: Footer -->
	
</div>
</div>
</div>	
	
	<!-- The Modal  Start -->
 <div id="adduser" class="modal fade" role="dialog" aria-hidden="true">
								<div class="modal-dialog modal-xl">
									<div class="modal-content" style="min-height: 590px;">
										<div class="modal-header">
											<h5 class="modal-title">
											<span class="kt-portlet__head-icon">
											<i class="kt-font-brand flaticon-users-1	"></i>
										</span>	Add New User
											<!--	<small>local data source</small> -->
											</h5>
											<button type="button" class="close" data-dismiss="modal" aria-label="Close">
												<span aria-hidden="true">&times;</span>
											</button>
										</div>
										<div class="modal-body">
<!--begin::Form-->

<?php echo form_open('form',array('action'=>'#','class'=>'kt-form kt-form--label-right','method'=>'post')); ?>


										
											<div class="kt-portlet__body">
											<h4 class="kt-portlet__head-title "style="font-size: 1.2rem;">LOGIN INFORMATION</h4>
												<div class="form-group row form-group-marginless kt-margin-t-20">
													
													<label class="col-lg-1 col-form-label">Username:</label>
													<div class="col-lg-3">
													<div class="input-group">
															<div class="input-group-prepend"><span class="input-group-text"><i class="la la-user"></i></span></div>
															<input type="text" name="username" id="username" class="form-control" placeholder="Username">
														</div>
														
														<span class="form-text text-muted">Please enter your Username:</span>
													</div>
												

												   <label class="col-lg-1 col-form-label">Email:</label>
													<div class="col-lg-3">
													<div class="input-group">
															<div class="input-group-prepend"><span class="input-group-text"><i class="la la-envelope-o"></i></span></div>
															<input type="text"  name="email" id="email" class="form-control" placeholder="Email">
														</div>
														
														<span class="form-text text-muted">Please enter your Email:</span>
													</div>
												
											<!--	<label class="col-lg-1 col-form-label">Password:</label>
													<div class="col-lg-3">
													<div class="input-group">
															<div class="input-group-prepend"><span class="input-group-text"><i class="la la-key"></i></span></div>
															<input type="password" name="password" id="password" class="form-control" placeholder="Password">
														</div>
														
														<span class="form-text text-muted">Please enter your Password:</span>
													</div>   -->
											
												
												
												</div>

												
												<div class="kt-separator kt-separator--border-dashed kt-separator--space-lg kt-separator--portlet-fit"></div>

<h4 class="kt-portlet__head-title "style="font-size: 1.2rem;">PERSONAL INFORMATION</h4>
												<div class="form-group row form-group-marginless">
													<label class="col-lg-1 col-form-label">NRIC/Passport:</label>
													<div class="col-lg-3">
														<div class="input-group">
															<div class="input-group-prepend"><span class="input-group-text"><i class="la la-credit-card"></i></span></div>
														<input type="text" name="ic_no" class="form-control" placeholder="NRIC/Passport">
														</div>
														
														<span class="form-text text-muted">Please enter your NRIC/Passport</span>
													</div>
													<label class="col-lg-1 col-form-label">Mobile No:</label>
													<div class="col-lg-3">
														<div class="input-group">
																<div class="input-group-prepend"><span class="input-group-text"><i class="la la-mobile"></i></span></div>
															<input type="text" name="phone" class="form-control" placeholder="Mobile No">
															
														</div>
														<span class="form-text text-muted">Please enter Mobile No</span>
													</div>
													<label class="col-lg-1 col-form-label">Address:</label>
													<div class="col-lg-3">
														<div class="input-group">
														<div class="input-group-prepend"><span class="input-group-text"><i class="la la-map-marker"></i></span></div>
															<input type="text" name="address" class="form-control" placeholder="Enter your address">
															
														</div>
														<span class="form-text text-muted">Please enter your address</span>
													</div>
												</div>
												<div class="kt-separator kt-separator--border-dashed kt-separator--space-lg kt-separator--portlet-fit"></div>
												<h4 class="kt-portlet__head-title "style="font-size: 1.2rem;">USER STATUS</h4>
												<div class="form-group row">
											
													
													<label class="col-lg-1 col-form-label">User Status:</label>
													<div class="col-lg-3">
														<div class="kt-radio-inline">
															<label class="kt-radio kt-radio--solid">
																<input type="radio" name="active" checked value="1"> Active
																<span></span>
															</label>
															<label class="kt-radio kt-radio--solid">
																<input type="radio" name="active" value="0"> De-Active
																<span></span>
															</label>
														</div>
														<span class="form-text text-muted">Please select user status</span>
													</div>
												</div>
												<div class="kt-separator kt-separator--border-dashed kt-separator--space-lg kt-separator--portlet-fit"></div>
												<h4 class="kt-portlet__head-title "style="font-size: 1.2rem;">TEAM</h4>
												<div class="form-group row">
											
													
													<label class="col-lg-1 col-form-label">Team:</label>
													<div class="col-lg-3">
														<select name="role" id="role" class="form-control">
																		<option value="">Select</option>
																	</select>
														<span class="form-text text-muted">Please select team</span>
													</div>
												</div>
											</div>
											<div class="kt-portlet__foot">
												<div class="kt-form__actions">
													<div class="row">
														<div class="col-lg-5"></div>
														<div class="col-lg-7">
															<button type="button" class="btn btn-brand" id="newuser">Submit</button>
															<button type="reset" class="btn btn-secondary">Clear</button>
														</div>
													</div>
												</div>
											</div>
										</form>

										<!--end::Form-->
										
										</div>
										
										<div class="modal-footer kt-hidden">
											<button type="button" class="btn btn-clean btn-bold btn-upper btn-font-md" data-dismiss="modal">Close</button>
											<button type="button" class="btn btn-default btn-bold btn-upper btn-font-md">Submit</button>
										</div>
									</div>
								</div>
							</div>
							
 

 <div id="edituser" class="modal fade" role="dialog" aria-hidden="true">
								<div class="modal-dialog modal-xl">
									<div class="modal-content" style="min-height: 590px;">
										<div class="modal-header">
											<h5 class="modal-title">
											<span class="kt-portlet__head-icon">
											<i class="kt-font-brand flaticon-users-1	"></i>
										</span>	Edit user
											<!--	<small>local data source</small> -->
											</h5>
											<button type="button" class="close" data-dismiss="modal" aria-label="Close">
												<span aria-hidden="true">&times;</span>
											</button>
										</div>
										<div class="modal-body">
<!--begin::Form-->

<?php echo form_open('form',array('action'=>'#','class'=>'kt-form kt-form--label-right','method'=>'post')); ?>


										
											<div class="kt-portlet__body">
											<h4 class="kt-portlet__head-title "style="font-size: 1.2rem;">LOGIN INFORMATION</h4>
												<div class="form-group row form-group-marginless kt-margin-t-20">
													
													<label class="col-lg-1 col-form-label">Username:</label>
													<div class="col-lg-3">
													<div class="input-group">
															<div class="input-group-prepend"><span class="input-group-text"><i class="la la-user"></i></span></div>
															<input type="text" name="username" id="username1" class="form-control" placeholder="Username">
															<input type="hidden" name="id" id="id1">
														</div>
														
														<span class="form-text text-muted">Please enter your Username:</span>
													</div>
												

												   <label class="col-lg-1 col-form-label">Eamil:</label>
													<div class="col-lg-3">
													<div class="input-group">
															<div class="input-group-prepend"><span class="input-group-text"><i class="la la-envelope-o"></i></span></div>
															<input type="text"  name="email" id="email1" class="form-control" placeholder="Email" readonly>
														</div>
														
														<span class="form-text text-muted">Please enter your Email:</span>
													</div>
												
												<label class="col-lg-1 col-form-label">Password:</label>
													<div class="col-lg-3">
													<div class="input-group">
															<div class="input-group-prepend"><span class="input-group-text"><i class="la la-key"></i></span></div>
															<input type="password" name="password" id="password1" class="form-control" placeholder="Password">
														</div>
														
														<span class="form-text text-muted">Please enter your Password:</span>
													</div>
											
												
												
												</div>

												
												<div class="kt-separator kt-separator--border-dashed kt-separator--space-lg kt-separator--portlet-fit"></div>

<h4 class="kt-portlet__head-title "style="font-size: 1.2rem;">PERSONAL INFORMATION</h4>
												<div class="form-group row form-group-marginless">
													<label class="col-lg-1 col-form-label">NRIC/Passport:</label>
													<div class="col-lg-3">
														<div class="input-group">
															<div class="input-group-prepend"><span class="input-group-text"><i class="la la-credit-card"></i></span></div>
														<input type="text" name="ic_no"  id="ic_no1" class="form-control" placeholder="NRIC/Passport">
														</div>
														
														<span class="form-text text-muted">Please enter your NRIC/Passport</span>
													</div>
													<label class="col-lg-1 col-form-label">Mobile No:</label>
													<div class="col-lg-3">
														<div class="input-group">
																<div class="input-group-prepend"><span class="input-group-text"><i class="la la-mobile"></i></span></div>
															<input type="text" name="phone" id="phone1" class="form-control" placeholder="Mobile No">
															
														</div>
														<span class="form-text text-muted">Please enter Mobile No</span>
													</div>
													<label class="col-lg-1 col-form-label">Address:</label>
													<div class="col-lg-3">
														<div class="input-group">
														<div class="input-group-prepend"><span class="input-group-text"><i class="la la-map-marker"></i></span></div>
															<input type="text" name="address" id="address1" class="form-control" placeholder="Enter your address">
															
														</div>
														<span class="form-text text-muted">Please enter your address</span>
													</div>
												</div>
												<div class="kt-separator kt-separator--border-dashed kt-separator--space-lg kt-separator--portlet-fit"></div>
												<h4 class="kt-portlet__head-title "style="font-size: 1.2rem;">USER STATUS</h4>
												<div class="form-group row">
											
													
													<label class="col-lg-1 col-form-label">User Status:</label>
													<div class="col-lg-3">
														<div class="kt-radio-inline">
															<label class="kt-radio kt-radio--solid">
																<input type="radio" id="active" name="active"  value="1"> Active
																<span></span>
															</label>
															<label class="kt-radio kt-radio--solid">
																<input type="radio"  id="active2"  name="active" value="0"> De-Active
																<span></span>
															</label>
														</div>
														<span class="form-text text-muted">Please select user status</span>
													</div>
												</div>
												<div class="kt-separator kt-separator--border-dashed kt-separator--space-lg kt-separator--portlet-fit"></div>
												<h4 class="kt-portlet__head-title "style="font-size: 1.2rem;">TEAM</h4>
												<div class="form-group row">
											
														
													<label class="col-lg-1 col-form-label">Team:</label>
													<div class="col-lg-3">
													<div class="form-group">
														<select name="role" id="role1" class="form-control">
																		<option value="">Select</option>							
																	</select>
																	</div>
														<span class="form-text text-muted">Please select team</span>
													</div>
												</div>
											</div>
											<div class="kt-portlet__foot">
												<div class="kt-form__actions">
													<div class="row">
														<div class="col-lg-5"></div>
														<div class="col-lg-7">
															<button type="button" class="btn btn-brand" id="updateuser">Update</button>
															
														</div>
													</div>
												</div>
											</div>
										</form>

										<!--end::Form-->
										
										</div>
										
										<div class="modal-footer kt-hidden">
											<button type="button" class="btn btn-clean btn-bold btn-upper btn-font-md" data-dismiss="modal">Close</button>
											<button type="button" class="btn btn-default btn-bold btn-upper btn-font-md">Submit</button>
										</div>
									</div>
								</div>
							</div>

 <!-- The Modal  End -->
  
	
	<!-- begin::Global Config(global config for global JS sciprts) -->
		<script>
			var KTAppOptions = {
				"colors": {
					"state": {
						"brand": "#22b9ff",
						"light": "#ffffff",
						"dark": "#282a3c",
						"primary": "#5867dd",
						"success": "#34bfa3",
						"info": "#36a3f7",
						"warning": "#ffb822",
						"danger": "#fd3995"
					},
					"base": {
						"label": ["#c5cbe3", "#a1a8c3", "#3d4465", "#3e4466"],
						"shape": ["#f0f3ff", "#d9dffa", "#afb4d4", "#646c9a"]
					}
				}
			};
		</script>

		<!-- end::Global Config -->

		<!--begin::Global Theme Bundle(used by all pages) -->
		<script src="<?php echo base_url();?>assets6/plugins/global/plugins.bundle.js" type="text/javascript"></script>
		<script src="<?php echo base_url();?>assets6/js/scripts.bundle.js" type="text/javascript"></script>

		<!--end::Global Theme Bundle -->

		<!--begin::Page Vendors(used by this page) -->
		<script src="<?php echo base_url();?>assets6/plugins/custom/fullcalendar/fullcalendar.bundle.js" type="text/javascript"></script>


		<!--end::Page Vendors -->

		<!--begin::Page Scripts(used by this page) -->
	<script src="<?php echo base_url();?>assets/js/pages/components/extended/sweetalert2.js" type="text/javascript"></script>
		<script src="<?php echo base_url();?>assets/js2/users-ajax.js?v=<?php echo date("ymdhmi");?>" type="text/javascript"></script>

		<!--end::Page Scripts -->
	
	</body>
	
	<!-- end::Body -->

</html>