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

<div class="alert alert-light alert-elevate" role="alert">
								<div class="alert-icon"><i class="flaticon-warning kt-font-brand"></i></div>
								<!--
								<div class="alert-text">
									<span class="kt-badge kt-badge--success"> </span> <span>  </span>
									<span class="kt-badge kt-badge--danger"></span> <span>  </span>
								</div>
								-->
							</div>

							<div class="kt-portlet kt-portlet--mobile">
								<div class="kt-portlet__head kt-portlet__head--lg">
									<div class="kt-portlet__head-label">
										<span class="kt-portlet__head-icon">
											<i class="kt-font-brand flaticon-list-1"></i>
										</span>
										<h3 class="kt-portlet__head-title">
											Report
										</h3>
									</div>
									
								</div>


<?php echo form_open(base_url()."Reports/exceltest",array('id'=>'kt_form','class'=>'kt-form--label-right','method'=>'post')); ?>
		<div class="kt-portlet__body">
			
		<div class="form-group row">
				<label class="col-form-label col-lg-3 col-sm-12">Report For :</label>
				<div class="col-lg-4 col-md-9 col-sm-12">
					<div class="dropdown bootstrap-select form-control kt- dropup show">
					<select class="form-control kt-selectpicker" id="data_report" tabindex="-98" name="from">						
						<!--<option value="mdr">Master Data Report </option> -->
						<option value="cm">Commission Report</option>
						<option value="bank">Bank Commission Report</option>
						<option value="mdr">Master Report</option>
						<option value="rp">Renewal Report</option>
						<option value="um">Unconfirmed Member Report</option>
						<option value="GM">GM Member Report</option>
						<option value="SM">SM Member Report</option>
						<option value="CS">CS Member Report</option>
					</select>
</div>					
					</div>
			</div>					
			
			<div class="form-group row">
				<label class="col-form-label col-lg-3 col-sm-12">Select Dates :</label>
				<div class="col-lg-4 col-md-9 col-sm-12">
					<div class="input-daterange input-group" id="kt_datepicker_5">
						<input type="text" class="form-control" name="start" data-date-format="dd/mm/yyyy">
						<div class="input-group-append">
							<span class="input-group-text"><i class="la la-ellipsis-h"></i></span>
						</div>
						<input type="text" class="form-control" name="end" data-date-format="dd/mm/yyyy">
					</div>
					
				</div>
				
			</div>
			<div class="form-group row">
			<label class="col-form-label col-lg-3 col-sm-12">Consultant Number :</label>
				<div class="col-lg-4 col-md-9 col-sm-12">
					<div class="input-daterange input-group" id="kt_agentcode">
						<input type="text" class="form-control" name="agent_code" id="agent_code" style="display:none">
					</div>
					
				</div>
				
			</div>
<!--
	
		<div class="form-group row">
				<label class="col-form-label col-lg-3 col-sm-12">Type :</label>
				<div class="col-lg-4 col-md-9 col-sm-12">
					<div class="dropdown bootstrap-select form-control kt- dropup show">
					<select class="form-control kt-selectpicker" tabindex="-98" name="type">
						<option value="1"> </option>
						<option value="2"></option>
						<option value="3"></option>
							<option value="4"></option>
					</select>
</div>					
					</div>
			</div>
			
		-->	
			
			
		</div>
		<div class="kt-portlet__foot">
			<div class="kt-form__actions">
				<div class="row">
					<div class="col-lg-9 ml-lg-auto">
						<button  id="reportform_button" class="btn btn-brand"> <i class="fa fa-file-pdf"></i> Download </button>
						<button type="reset" class="btn btn-secondary">Clear</button>
					</div>
				</div>
			</div>
		</div>
	</form>
							
								
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

 <script src="<?php echo base_url();?>assets/js/pages/crud/forms/widgets/bootstrap-datepicker.js" type="text/javascript"></script>
   <script src="<?php echo base_url();?>assets/js/pages/crud/forms/widgets/bootstrap-select.js" type="text/javascript"></script>
   <script src="<?php echo base_url();?>assets/js2/report.js?v=<?php echo date("ymdhmi");?>" type="text/javascript"></script>
   
		<!--end::Page Scripts -->
	
	</body>
	
	<!-- end::Body -->

</html>