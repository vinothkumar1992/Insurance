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

<button class="kt-aside-close " id="kt_aside_close_btn"><i class="la la-close"></i></button>
				<div class="kt-aside  kt-aside--fixed  kt-grid__item kt-grid kt-grid--desktop kt-grid--hor-desktop" id="kt_aside">

					<!-- begin:: Aside Menu -->
				<?php $this->load->view("aside"); ?>

					<!-- end:: Aside Menu -->
				</div>

	<div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor kt-wrapper" id="kt_wrapper">

<!-- begin:: Header TopMenu -->
<div id="kt_header" class="kt-header kt-grid kt-grid--ver  kt-header--fixed ">

						<!-- begin:: Aside -->
						<?php $this->load->view("brand"); ?>
						<!-- end:: Aside -->

						<!-- begin:: Title -->
				

						<!-- end:: Title -->

						<!-- begin: Header Menu -->
						<?php //$this->load->view("headermenu"); ?>

						<!-- end: Header Menu -->

						<!-- begin:: Header Topbar -->
						<?php $this->load->view("headertoolbar"); ?>

						<!-- end:: Header Topbar -->
					</div>

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
											Consultants
										</h3>
									</div>
									<div class="kt-portlet__head-toolbar">
										<div class="kt-portlet__head-wrapper">
										<?php  $myprofile = $this->session->userdata('myemassid'); ?>
											<input type="hidden" name="agentid" id="agentid" value="<?php  echo $myprofile["agent_id"] ?>" >
											<!--
											<button data-toggle="modal" data-target="#adduser" class="btn btn-brand btn-icon-sm">
												<i class="la la-plus"></i>
												Add New Consultants
											</button>
											-->
										<div class="dropdown">
																<button class="btn btn-brand dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
																	<i class="la la-plus"></i>
												 Add New Consultants
																</button>
																<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
												            <a class="dropdown-item" href="<?php echo base_url()?>Consultants/addagent/<?php  echo $myprofile["agent_id"] ?>"><i class="la la-edit"></i> Create New Agent Form </a>
																<button class="dropdown-item" data-toggle="modal" data-target="#sendagentlink" data-record-id2="<?php  echo $myprofile["agent_id"] ?>" ><i class="la la-link"></i> Send New Agent Form Link</a></button>
																</div>
															</div>
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
		  <?php $this->load->view("sendagentsignlink");?>
	
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
  
   <?php $this->load->view("sendlink");?>
    <?php $this->load->view("sendagentlink");?>
  
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
		<script src="<?php echo base_url();?>assets/js/agents-ajax-pend.js?v=<?php echo date("ymdhmi");?>" type="text/javascript"></script>
	<script src="https://cdn.jsdelivr.net/npm/signature_pad@2.3.2/dist/signature_pad.min.js"></script>
	<script src="<?php echo base_url();?>assets/js/agentsign.js?v=<?php echo date("ymdhmi");?>"></script>
	
	<!--end::Page Scripts -->
	
	</body>
	
	<!-- end::Body -->

</html>