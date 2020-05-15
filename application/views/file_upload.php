<!DOCTYPE html>


<html lang="en">

	<!-- begin::Head -->
	<head>
		<base href="../../../">
		<meta charset="utf-8" />
		<title>Transaction Status</title>
		<meta name="description" content="">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

		<!--begin::Fonts -->
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700|Roboto:300,400,500,600,700">

		<!--end::Fonts -->

		<!--begin::Page Custom Styles(used by this page) -->
		<link href="<?php echo base_url();?>assets/css/pages/error/error-1.css" rel="stylesheet" type="text/css" />

		<!--end::Page Custom Styles -->

		<!--begin::Global Theme Styles(used by all pages) -->
		<link href="<?php echo base_url();?>assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
		<link href="<?php echo base_url();?>assets/css/style.bundle.css" rel="stylesheet" type="text/css" />

		<!--end::Global Theme Styles -->

		<!--begin::Layout Skins(used by all pages) -->

		<!--end::Layout Skins -->
		<link rel="shortcut icon" href="<?php echo base_url();?>assets/media/logos/favicon.ico" />
	<style>
	.kt-error-v1 .kt-error-v1__container .kt-error-v1__number {
    font-size: 50px;
    margin-left: 80px;
    margin-top: 1rem;
    font-weight: 700;
    color: #595d6e;
}
	</style>
	
	</head>

	<!-- end::Head -->

	<!-- begin::Body -->
	<body class="kt-quick-panel--right kt-demo-panel--right kt-offcanvas-panel--right kt-header--fixed kt-header-mobile--fixed kt-subheader--enabled kt-subheader--solid kt-aside--enabled kt-aside--fixed kt-aside--minimize kt-page--loading">
<!-- style="background-image: url(<?php echo base_url();?>assets/media/error/bg1.jpg);" -->
		<!-- begin:: Page -->
		<div class="kt-grid kt-grid--ver kt-grid--root kt-page">
			<div class="kt-grid__item kt-grid__item--fluid kt-grid  kt-error-v1"  >
				<div class="kt-error-v1__container">
				
					
					<form class="kt-form kt-form--label-center">
									<div class="kt-portlet__body">
									
										
										<div class="form-group row">
											
											<div class="col-lg-4 col-md-9 col-sm-12" >
											
											
										<div style="padding:10px;">
										
					<center>
					<p class="kt-error-v1__desc">
					<img src ="<?php echo base_url();?>assets/media/logos/logo.png"/> <br>
					<?php if(isset($sms)) echo  $sms; ?> <br>
					<?php if(isset($bankin)) echo $bankin;  ?>
				
					</p>
					
					<p class="kt-error-v1__desc">
		
					
					<?php if(isset($tr)) echo $tr;  ?>
					<input type="hidden" name="form_orderid" id="form_orderid" value="<?php echo $this->input->get("orderid");?>" >
					<input type="hidden" name="form_email" id="form_email" value="<?php echo $this->input->get("email");?>" >
					<input type="hidden" name="token" id="token" value="<?php echo $this->input->get("token");?>" >
					
					
					</p>
					<center>					
										<div class="dropzone dropzone-default dropzone-success" id="kt_dropzone_3">
													<div class="dropzone-msg dz-message needsclick">
														<h3 class="dropzone-msg-title">Drop Banking Slip here or click to upload.</h3>
														<span class="dropzone-msg-desc">Only image, pdf and psd files are allowed for upload , File Size maximum size: 2MB.</span>
													</div>
												</div>
											</div>	
											</div>
										</div>
									</div>
									
								</form>
					
				</div>
			</div>
		</div>

		<!-- end:: Page -->

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
		<script src="<?php echo base_url();?>assets/plugins/global/plugins.bundle.js" type="text/javascript"></script>
		<script src="<?php echo base_url();?>assets/js/scripts.bundle.js" type="text/javascript"></script>
			<script src="<?php echo base_url();?>assets/js/pages/components/extended/sweetalert2.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/js2/bankingslip.js?v=<?php echo date("ymdhmi");?>" type="text/javascript"></script>
		<!--end::Global Theme Bundle -->
	</body>

	<!-- end::Body -->
</html>