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
<!--Begin::Row-->
<div class="row">
<div class="col-xl-4 col-lg-4 order-lg-1 order-xl-1">
									<div class="kt-portlet kt-portlet--height-fluid">
	<div class="kt-widget14">
		<div class="kt-widget14__header kt-margin-b-30">
			<h3 class="kt-widget14__title">
				Monthly Sales of <?php echo date("Y");?>           
			</h3>
			<span class="kt-widget14__desc">
				Check out each collumn for more details
			</span>
		</div>
		<div class="kt-widget14__chart" style="height:120px;"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
			<canvas id="kt_chart_daily_sales" style="display: block; width: 377px; height: 120px;" width="377" height="120" class="chartjs-render-monitor"></canvas>
		</div>
	</div>
</div>
								</div>
								<div class="col-xl-4 col-lg-4 order-lg-1 order-xl-1">

									<!--begin:: Widgets/Inbound Bandwidth-->
									<div class="kt-portlet kt-portlet--fit kt-portlet--head-noborder kt-portlet--height-fluid">
										<div class="kt-portlet__head kt-portlet__space-x">
											<div class="kt-portlet__head-label">
												<h3 class="kt-portlet__head-title">
													Online Payment 
												</h3>
											</div>
											
										</div>
										<div class="kt-portlet__body kt-portlet__body--fluid">
											<div class="kt-widget20">
												<div class="kt-widget20__content kt-portlet__space-x">
													<span class="kt-widget20__number " id="online_payment_total"></span>
													<span class="kt-widget20__desc">Successful transactions</span>
												</div>
												<div class="kt-widget20__chart" style="height:130px;">
													<canvas id="online_payment"></canvas>
												</div>
											</div>
										</div>
									</div>

									<!--end:: Widgets/Inbound Bandwidth-->
									<div class="kt-space-20"></div>

									
								</div>
								
								
								<div class="col-xl-4 col-lg-4 order-lg-1 order-xl-1">
								<!--begin:: Widgets/Outbound Bandwidth-->
									<div class="kt-portlet kt-portlet--fit kt-portlet--head-noborder kt-portlet--height-fluid">
										<div class="kt-portlet__head kt-portlet__space-x">
											<div class="kt-portlet__head-label">
												<h3 class="kt-portlet__head-title">
													Offline Payment
												</h3>
											</div>
											
										</div>
										<div class="kt-portlet__body kt-portlet__body--fluid">
											<div class="kt-widget20">
												<div class="kt-widget20__content kt-portlet__space-x">
													<span class="kt-widget20__number" id="banking_payment_total"></span>
													<span class="kt-widget20__desc">Successful transactions</span>
												</div>
												<div class="kt-widget20__chart" style="height:130px;">
													<canvas id="banking_payment"></canvas>
												</div>
											</div>
										</div>
									</div>

									<!--end:: Widgets/Outbound Bandwidth-->
								</div>
								
	<div class="col-xl-4 col-lg-4 order-lg-1 order-xl-1">							
	<div class="kt-portlet kt-portlet--height-fluid">
	<div class="kt-widget14">
		<div class="kt-widget14__header">
			<h3 class="kt-widget14__title">
				Consultants Total           
			</h3>
			<span class="kt-widget14__desc">
				Consultants total by Level 
			</span>
		</div>	 
		<div class="kt-widget14__content">	
			<div class="kt-widget14__chart"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
				<div class="kt-widget14__stat" id="agent_total"></div>
				<canvas id="agenttotal" style="height: 140px; width: 140px; display: block;" width="140" height="140" class="chartjs-render-monitor"></canvas>
			</div> 
			<div class="kt-widget14__legends">
				<div class="kt-widget14__legend">
					<span class="kt-widget14__bullet kt-bg-success"></span>
					<span class="kt-widget14__stats" id="gm_total" ></span>
				</div>
				<div class="kt-widget14__legend">
					<span class="kt-widget14__bullet kt-bg-brand"></span>
					<span class="kt-widget14__stats" id="sm_total" ></span>
				</div>
				<div class="kt-widget14__legend">
					<span class="kt-widget14__bullet kt-bg-danger"></span>
					<span class="kt-widget14__stats" id="cs_total"></span>
				</div>
			</div>			
		</div> 
	</div>
</div>							
	</div>						
								

<div class="col-xl-4 col-lg-4 order-lg-1 order-xl-1">
									<div class="kt-portlet kt-portlet--height-fluid">
	<div class="kt-widget14">
		<div class="kt-widget14__header kt-margin-b-30">
			<h3 class="kt-widget14__title">
				Membership Expiry              
			</h3>
			<span class="kt-widget14__desc">
				Membership expiry By Month  
			</span>
		</div>
		<div class="kt-widget14__chart" style="height:120px;"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
			<canvas id="member_expiry" style="display: block; width: 377px; height: 120px;" width="377" height="120" class="chartjs-render-monitor"></canvas>
		</div>
	</div>
</div>
								</div>


<div class="col-xl-4 col-lg-4 order-lg-1 order-xl-1">
	
										<div class="kt-portlet kt-portlet--height-fluid">
	<div class="kt-widget14">
		<div class="kt-widget14__header kt-margin-b-30">
			<h3 class="kt-widget14__title">
				Membership Total               
			</h3>
			<span class="kt-widget14__desc">
				Mmebership total by Age Range 				
			</span>
		</div>
		<div class="kt-widget14__content">	
	
		<div class="kt-widget14__chart"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
				<div class="kt-widget14__stat" id="age_total"></div>
				<canvas id="Membership_Total" style="height: 140px; width: 140px; display: block;" width="140" height="140" class="chartjs-render-monitor"></canvas>
			</div> 
		<div class="kt-widget14__legends">
				<div class="kt-widget14__legend">
					<span class="kt-widget14__bullet kt-bg-danger"></span>
					<span class="kt-widget14__stats" id="age_17_20" ></span>
				</div>
				<div class="kt-widget14__legend">
					<span class="kt-widget14__bullet kt-bg-warning"></span>
					<span class="kt-widget14__stats" id="age_20_30" ></span>
				</div>
				<div class="kt-widget14__legend">
					<span class="kt-widget14__bullet kt-bg-dark"></span>
					<span class="kt-widget14__stats" id="age_30_40"></span>
				</div>
				<div class="kt-widget14__legend">
					<span class="kt-widget14__bullet kt-bg-primary"></span>
					<span class="kt-widget14__stats" id="age_40_50" ></span>
				</div>
				<div class="kt-widget14__legend">
					<span class="kt-widget14__bullet kt-bg-success"></span>
					<span class="kt-widget14__stats" id="age_50_60" ></span>
				</div>
				<div class="kt-widget14__legend">
					<span class="kt-widget14__bullet kt-bg-info"></span>
					<span class="kt-widget14__stats" id="age_60_70"></span>
				</div>
				<div class="kt-widget14__legend">
					<span class="kt-widget14__bullet kt-label-bg-color-1"></span>
					<span class="kt-widget14__stats" id="above_70"></span>
				</div>
			</div>	
			</div>
	</div>
</div>
	
	
								</div>




</div>
<!--end::Row-->
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
		<script src="<?php echo base_url();?>assets/js/dashboard.js?v=<?php echo date("ydmsi"); ?>" type="text/javascript"></script>
	
	<script>
	/*
	            swal.fire({

                    "title": "",
                    "text": 'The Webportal is under further development and will be in full function on 29.02.2020, Kindly bear with us for time being and sorry for the inconvenience caused',
                    "type": "error",
                    "confirmButtonClass": "btn btn-secondary",
                    "onClose": function(e) {
                        console.log('on close event fired!');
                    }
                });
	*/
	</script>
		<!--end::Page Scripts -->
	
	</body>
	
	<!-- end::Body -->

</html>