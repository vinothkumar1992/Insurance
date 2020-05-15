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
											Consultants Commision
										</h3>
									</div>
									<!--
									<div class="kt-portlet__head-toolbar">
										<div class="kt-portlet__head-wrapper">
											<button data-toggle="modal" data-target="#adduser" class="btn btn-brand btn-icon-sm">
												<i class="la la-plus"></i>
												 
											</button>
											
										</div>
									</div>
									-->
								</div>
								<div class="kt-portlet__body">

									<!--begin: Search Form -->
								
									<div class="kt-form kt-form--label-right kt-margin-t-20 kt-margin-b-10">
										<div class="row align-items-center">
											<div class="col-xl-8 order-2 order-xl-1">
												<div class="row align-items-center">
													<div class="col-md-4 kt-margin-b-20-tablet-and-mobile">
														<div class="kt-input-icon kt-input-icon--left">
															<input type="text" class="form-control" placeholder="Search " id="generalSearch">
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
 <?php $this->load->view('agentform'); ?>
	 <?php $this->load->view('agenteditform'); ?>						
  <!-- The Modal  End -->
  
  <!--begin::Modal-->
							<?php $this->load->view("signform");?>
							<!--end::Modal-->

  
  <!-- Model Link Start -->
  
   <div id="sendlink" class="modal fade" role="dialog" aria-hidden="true">
								<div class="modal-dialog modal-lg">
									<div class="modal-content">
										<div class="modal-header">
											<h5 class="modal-title">
											<span class="kt-portlet__head-icon">
											<i class="kt-font-brand flaticon2-paper-plane"></i>
										</span>	Send New Member Form Link  
											<!--	<small>local data source</small> -->
											</h5>
											<button type="button" class="close" data-dismiss="modal" aria-label="Close">
												<span aria-hidden="true">&times;</span>
											</button>
										</div>
										<div class="modal-body">
										
										<div class="row">
								<div class="col">
									<div class="alert alert-light alert-elevate fade show" role="alert">
										<div class="alert-icon"><i class="flaticon-warning kt-font-brand"></i></div>
										<div class="alert-text">
											Before send the link to whatsapp,You have to Login the Whatsapp first in your browser.
											<br>
											Whatsapp Link here <a class="kt-link kt-font-bold" href="https://web.whatsapp.com/" target="_blank">Whatsapp Link</a> .
										</div>
									</div>
								</div>
							</div>
										
										
<!--begin::Form-->
										<form class="kt-form kt-form--label-right" method="post">
											<div class="kt-portlet__body">
											
												<div class="form-group row form-group-marginless kt-margin-t-20 kt-margin-b-20">
													
													<label class="col-lg-2 col-form-label">Email:</label>
													<div class="col-lg-8">
													<div class="input-group">
															<div class="input-group-prepend"><span class="input-group-text"><i class="flaticon2-envelope"></i></span></div>
															<input type="text" name="email" class="form-control" placeholder="Email">
															<input type="hidden" name="agentid" id="agentid" >
															
														</div>
														<span class="form-text text-muted">Please enter your Email:</span>
													
													</div>
											

												  
												</div>
	
	
	<center>	<h4 class="kt-portlet__head-title "style="font-size: 1.2rem;">OR</h4> </center>
	
	<div class="form-group row form-group-marginless kt-margin-t-20 kt-margin-b-20">
													
													
												   <label class="col-lg-2 col-form-label">Whatsapp No:</label>
													<div class="col-lg-8">
													<div class="input-group">
															<div class="input-group-prepend"><span class="input-group-text"><i class="flaticon2-phone"></i></span></div>
															<input type="text" name="phone" class="form-control" placeholder="Phone">
														</div>
														
														<span class="form-text text-muted">Please enter your Whatsapp No Like 601234567890</span>
													</div>
												
												</div>
	
	
	
											</div>
											<div class="kt-portlet__foot">
												<div class="kt-form__actions">
													<div class="row">
														<div class="col-lg-5"></div>
														<div class="col-lg-7">
															<button type="button" class="btn btn-brand" id="send">Send</button>
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
  
  <!-- Model Link End -->
  
	
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
		<script src="<?php echo base_url();?>assets/js/pages/crud/forms/widgets/bootstrap-select.js" type="text/javascript"></script>
	<script src="<?php echo base_url();?>assets/js/pages/crud/forms/widgets/bootstrap-datepicker.js" type="text/javascript"></script>
	<script src="<?php echo base_url();?>assets/js/pages/crud/forms/widgets/typeahead.js" type="text/javascript"></script>
	<script src="<?php echo base_url();?>assets/js/pages/components/extended/sweetalert2.js" type="text/javascript"></script>
		<script src="<?php echo base_url();?>assets/js2/agents-ajax.js?v=<?php echo date("ymdhmi");?>" type="text/javascript"></script>
	<script src="https://cdn.jsdelivr.net/npm/signature_pad@2.3.2/dist/signature_pad.min.js"></script>
	<script src="<?php echo base_url();?>assets/js2/commission.js?v=<?php echo date("ymdhmi");?>"></script>
	
	<!--end::Page Scripts -->
	
	</body>
	
	<!-- end::Body -->

</html>