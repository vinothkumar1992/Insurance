
<?php  
$myprofile=array(); 
if($this->session->userdata('maemsid'))
{
    $myprofile = $this->session->userdata('maemsid');

}

?>




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
											Profile
										</h3>
									</div>
									<div class="kt-portlet__head-toolbar">
										<div class="kt-portlet__head-wrapper">
											
											
										</div>
									</div>
								</div>
								<div class="kt-portlet__body">

	<div class="row">
                            <div class="col-md-6">


									<!--begin::Portlet-->
									<div class="kt-portlet">
										

										<!--begin::Form-->
										<form class="kt-form" method="post" >
											<div class="kt-portlet__body">
                                             <input type="hidden" name="email" value="<?php echo  $myprofile["email"]; ?>"/>      
                                            <div class="form-group">
													<label>Email: <?php echo  $myprofile["email"]; ?></label>
													
                                                </div>
                                                
                                               

												<div class="form-group">
													<label>User Name:</label>
													<input type="text" name="username" value="<?php echo  $myprofile["username"]; ?>" class="form-control"  placeholder="Enter User name">
													
                                                </div>

                                                <div class="form-group">
													<label>Phone: </label>
													<input type="text" name="phone" value="<?php echo  $myprofile["phone"]; ?>" class="form-control"  placeholder="Enter Phone">
													
												
                                                </div>
                                                
                                                <!--

												<div class="form-group">
													<label for="exampleInputPassword1">Contact No:</label>
													<input type="text"   name="phone"  value="<?php echo  $myprofile["phone"]; ?>" class="form-control" id="exampleInputPassword1" placeholder="Contact No">
												</div>
											
												-->
												
											</div>
											<div class="kt-portlet__foot">
												<div class="kt-form__actions">
													<button id="kt-form_profile_update" type="button" class="btn btn-primary">Update</button>
													
												</div>
											</div>
										</form>

										<!--end::Form-->
									</div>

									<!--end::Portlet-->
                        </div>    

                        <div class="col-md-6">


<!--begin::Portlet-->
<div class="kt-portlet">
    <div class="kt-portlet__head">
        <div class="kt-portlet__head-label">
            <h3 class="kt-portlet__head-title">
            Password change
            </h3>
        </div>
    </div>

    <!--begin::Form-->
    <form class="kt-form" id="kt_password_update_form"  method="post">
        <div class="kt-portlet__body">
            
     <input type="hidden" name="email" value="<?php echo  $myprofile["email"]; ?>"/>

            <div class="form-group">
                <label>Current Password:</label>
                <input type="password" id="op" name="op" class="form-control"  placeholder="Current password">
                
            </div>
            

            <div class="form-group">
                <label for="exampleInputPassword1"> New Password:</label>
                <input type="password" id="np" name="np" class="form-control" id="exampleInputPassword1" placeholder="New password">
            </div>
                   
            
        </div>
        <div class="kt-portlet__foot">
            <div class="kt-form__actions">  
                <button type="button" id="kt_password_update"  class="btn btn-primary">Update</button>
                
            </div>
        </div>
    </form>

    <!--end::Form-->
</div>

<!--end::Portlet-->
</div>   
</div>

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
	
		<script src="<?php echo base_url();?>assets/js2/profile.js?v=<?php echo date("ymdhmi");?>" type="text/javascript"></script>

		<!--end::Page Scripts -->
	
	</body>
	
	<!-- end::Body -->

</html>






                                    