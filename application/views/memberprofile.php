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
											<i class="kt-font-brand flaticon2-user"></i>
										</span>
										<h3 class="kt-portlet__head-title">
											Member Details
										</h3>
									</div>
									<div class="kt-portlet__head-toolbar">
										<div class="kt-portlet__head-wrapper">
										
										<button type="button" onclick="window.history.back();" class="btn btn-danger btn-elevate btn-circle btn-icon" ><i class="la la-close"></i></i></button>
									
											
										</div>
									</div>
								</div>
	
			<!--Begin::Section-->
											<div class="kt-portlet">
												<div class="kt-portlet__body kt-portlet__body--fit">



											<ul class="nav nav-pills nav-fill" role="tablist">
												<li class="nav-item">
													<a class="nav-link active" data-toggle="tab" href="#kt_tabs_5_1">DETAILS OF PROPOSER </a>
												</li>
												<li class="nav-item">
													<a class="nav-link" data-toggle="tab" href="#kt_tabs_5_2">NOMINEE 1
 DETAILS & MEMBERSHIP PACKAGE</a>
												</li>
												<li class="nav-item">
													<a class="nav-link" data-toggle="tab" href="#kt_tabs_5_3">QUESTIONNAIRE</a>
												</li>
												<li class="nav-item">
													<a class="nav-link" data-toggle="tab" href="#kt_tabs_5_4">NOMINEE, WITNESS & DOCTOR DETAILS</a>
												</li>
											</ul>
											<div class="tab-content">
												<div class="tab-pane active" id="kt_tabs_5_1" role="tabpanel">

<div class="row row-no-padding row-col-separator-xl">


<div class="col-md-12 col-lg-12 col-xl-3">

															<!--begin:: Widgets/Stats2-1 -->
															<div class="kt-widget1">
															<div class="kt-widget1__item">
															
																	<div class="kt-widget1__info">
																	
																		<h3 class="kt-widget1__title">Agent Name</h3>
																		<span class="kt-widget1__desc"><?php echo $agent_name; ?></span>
																		
																	</div>
																	
																</div>
																<div class="kt-widget1__item">
																	<div class="kt-widget1__info">
																		<h3 class="kt-widget1__title">Agent Number</h3>
																		<span class="kt-widget1__desc"><?php echo $agent_no; ?></span>
																		
																	</div>
																	
																</div>
																<div class="kt-widget1__item">
																	<div class="kt-widget1__info">
																		<h3 class="kt-widget1__title">Agent Role</h3>
																		<span class="kt-widget1__desc"><?php echo $role_name; ?></span>
																		
																	</div>
																	
																</div>
																
																<hr>
																<div class="kt-widget1__item">
																	<div class="kt-widget1__info">
																		<h3 class="kt-widget1__title">Membership ID</h3>
																		<span class="kt-widget1__desc"><?php echo $mem->policy_id; ?></span>
																		
																	</div>
																	
																</div>
																<div class="kt-widget1__item">
																	<div class="kt-widget1__info">
																		<h3 class="kt-widget1__title"> Membership Start Date </h3>
																		<span class="kt-widget1__desc"><?php echo $mem->policy_start_date; ?></span>
																	</div>
																	
																</div>
																<div class="kt-widget1__item">
																	<div class="kt-widget1__info">
																		<h3 class="kt-widget1__title">Membership End Date </h3>
																		<span class="kt-widget1__desc"><?php echo $mem->policy_end_date; ?></span>
																	</div>
																	
																</div>
																
																<div class="kt-widget1__item">
																	<div class="kt-widget1__info">
																		<h3 class="kt-widget1__title">NRIC Front Page  </h3>
																		<span class="kt-widget1__desc">
																		<?php echo $attachment1; ?>
																		
																		</span>
																	</div>
																	
																</div>
																<div class="kt-widget1__item">
																	<div class="kt-widget1__info">
																		<h3 class="kt-widget1__title">NRIC Back Page  </h3>
																		<span class="kt-widget1__desc">
																		<?php echo $nric_upd2; ?>
																		
																		</span>
																	</div>
																	
																</div>
																<div class="kt-widget1__item">
																	<div class="kt-widget1__info">
																		<h3 class="kt-widget1__title">NRIC with selfie  </h3>
																		<span class="kt-widget1__desc">
																		<?php echo $nric_upd3; ?>
																		
																		</span>
																	</div>
																	
																</div>
																<div class="kt-widget1__item">
																	<div class="kt-widget1__info">
																		<h3 class="kt-widget1__title">Others  </h3>
																		<span class="kt-widget1__desc">
																		<?php echo $nric_upd4; ?>
																		
																		</span>
																	</div>
																	
																</div>
																
																</div>
																</div>





														<div class="col-md-12 col-lg-12 col-xl-3">

															<!--begin:: Widgets/Stats2-1 -->
															<div class="kt-widget1">
																<div class="kt-widget1__item">
																	<div class="kt-widget1__info">
																		<h3 class="kt-widget1__title">Membership Type</h3>
																		<span class="kt-widget1__desc"><?php echo $membership_type; ?></span>
																	</div>
																	
																</div>
																<div class="kt-widget1__item">
																	<div class="kt-widget1__info">
																		<h3 class="kt-widget1__title">Name </h3>
																		<span class="kt-widget1__desc"><?php echo $nric_no; ?></span>
																	</div>
																	
																</div>
																<div class="kt-widget1__item">
																	<div class="kt-widget1__info">
																		<h3 class="kt-widget1__title">New NRIC / Passport No </h3>
																		<span class="kt-widget1__desc"><?php echo $members_name; ?></span>
																	</div>
																	
																</div>
															
																<div class="kt-widget1__item">
																	<div class="kt-widget1__info">
																		<h3 class="kt-widget1__title">Nationality / Warganegara</h3>
																		<span class="kt-widget1__desc"><?php echo $nationality; ?></span>
																	</div>
																	
																</div>
															
																<div class="kt-widget1__item">
																	<div class="kt-widget1__info">
																		<h3 class="kt-widget1__title">Address 1 / Alamat 1</h3>
																		<span class="kt-widget1__desc"><?php echo $address1; ?></span>
																	</div>
																	
																</div>
																	<div class="kt-widget1__item">
																	<div class="kt-widget1__info">
																		<h3 class="kt-widget1__title">Address 2 / Alamat 2</h3>
																		<span class="kt-widget1__desc"><?php echo $address2; ?></span>
																	</div>
																	
																</div>
															
																	<div class="kt-widget1__item">
																	<div class="kt-widget1__info">
																		<h3 class="kt-widget1__title">Address 3 / Alamat 3</h3>
																		<span class="kt-widget1__desc"><?php echo $address3; ?></span>
																	</div>
																	
																</div>
															
															<div class="kt-widget1__item">
																	<div class="kt-widget1__info">
																		<h3 class="kt-widget1__title">City / Bandar</h3>
																		<span class="kt-widget1__desc"><?php echo $city; ?></span>
																	</div>
																	
																</div>
															
															</div>

															<!--end:: Widgets/Stats2-1 -->
														</div>
														<div class="col-md-12 col-lg-12 col-xl-3">

															<!--begin:: Widgets/Stats2-2 -->
															<div class="kt-widget1">
																<div class="kt-widget1__item">
																	<div class="kt-widget1__info">
																		<h3 class="kt-widget1__title">State / Negeri</h3>
																		<span class="kt-widget1__desc"><?php echo $state; ?></span>
																	</div>
																	
																</div>
																<div class="kt-widget1__item">
																	<div class="kt-widget1__info">
																		<h3 class="kt-widget1__title">Postcode / Poskod</h3>
																		<span class="kt-widget1__desc"><?php echo $postcode; ?></span>
																	</div>
																	
																</div>
																<div class="kt-widget1__item">
																	<div class="kt-widget1__info">
																		<h3 class="kt-widget1__title">Country / Negara</h3>
																		<span class="kt-widget1__desc"><?php echo $country; ?></span>
																	</div>
																
																</div>
															
																<div class="kt-widget1__item">
																	<div class="kt-widget1__info">
																		<h3 class="kt-widget1__title"> Telephone No / No. Telefon</h3>
																		<span class="kt-widget1__desc"><?php echo $home_office_phone_no; ?></span>
																	</div>
																
																</div>
															
																<div class="kt-widget1__item">
																	<div class="kt-widget1__info">
																		<h3 class="kt-widget1__title">Mobile Phone / Telefon Bimbit</h3>
																		<span class="kt-widget1__desc"><?php echo $mobile_phone_no; ?></span>
																	</div>
																
																</div>
																
																	<div class="kt-widget1__item">
																	<div class="kt-widget1__info">
																		<h3 class="kt-widget1__title">Email / Emel</h3>
																		<span class="kt-widget1__desc"><?php echo $email; ?></span>
																	</div>
																
																</div>
																	<div class="kt-widget1__item">
																	<div class="kt-widget1__info">
																		<h3 class="kt-widget1__title">Date of Birth / Tarikh Lahir:</h3>
																		<span class="kt-widget1__desc"><?php echo $date_of_birth; ?></span>
																	</div>
																
																</div>
															
															<div class="kt-widget1__item">
																	<div class="kt-widget1__info">
																		<h3 class="kt-widget1__title">Gender / Jantina</h3>
																		<span class="kt-widget1__desc"><?php echo $gender; ?></span>
																	</div>
																
																</div>
															
															
															</div>

															<!--end:: Widgets/Stats2-2 -->
														</div>
														<div class="col-md-12 col-lg-12 col-xl-3">

															<!--begin:: Widgets/Stats2-3 -->
															<div class="kt-widget1">
																<div class="kt-widget1__item">
																	<div class="kt-widget1__info">
																		<h3 class="kt-widget1__title">Race / Bangsa</h3>
																		<span class="kt-widget1__desc"><?php echo $race; ?></span>
																	</div>
																	
																</div>
																<div class="kt-widget1__item">
																	<div class="kt-widget1__info">
																		<h3 class="kt-widget1__title">Marital Status / Taraf Perkahwinan</h3>
																		<span class="kt-widget1__desc"><?php echo $marital_status; ?></span>
																	</div>
																
																</div>
																<div class="kt-widget1__item">
																	<div class="kt-widget1__info">
																		<h3 class="kt-widget1__title">Occupation</h3>
																		<span class="kt-widget1__desc"><?php echo $occupation; ?></span>
																	</div>
																	
																</div>
																
																	<div class="kt-widget1__item">
																	<div class="kt-widget1__info">
																		<h3 class="kt-widget1__title">Upload Health Document</h3>
																	<?php echo $attachment2; ?>
																	</div>
																	
																</div>
																	<div class="kt-widget1__item">
																	<div class="kt-widget1__info">
																		<h3 class="kt-widget1__title">Health Declaration</h3>
																		<span class="kt-widget1__desc"><?php echo $health_declaration; ?></span>
																	</div>
																	
																</div>
																	<div class="kt-widget1__item">
																	<div class="kt-widget1__info">
																		<h3 class="kt-widget1__title">State / Negeri</h3>
																		<span class="kt-widget1__desc"><?php echo $state; ?></span>
																	</div>
																	
																</div>
																	<div class="kt-widget1__item">
																	<div class="kt-widget1__info">
																		<h3 class="kt-widget1__title">Member Sign</h3>
																		<span class="kt-widget1__desc">
																		<img src="<?php echo $sign; ?>" class="img-fluid">
																		</span>
																	
																	</div>
																
															</div>

															<!--end:: Widgets/Stats2-3 -->
														</div>
												
													</div>
													
													<div class="col-md-12 col-lg-12 col-xl-3">
													
													
													<div class="kt-portlet">
										<div class="kt-portlet__head kt-portlet__head--noborder  kt-ribbon kt-ribbon--clip kt-ribbon--right kt-ribbon--border-dash-hor kt-ribbon--warning">
											<div class="kt-ribbon__target" style="top: 12px;">
												<span class="kt-ribbon__inner"></span>Verified
											</div>
											<div class="kt-portlet__head-label">
												<h3 class="kt-portlet__head-title">
												<?php if($trhistory)  echo "Online" ; else echo "Banking Slip";  ?>
												</h3>
											</div>
										</div>
										<div class="kt-portlet__body kt-portlet__body--fit-top">
										
										<?php if($trhistory) { 
										$tr =(array)json_decode($trhistory);
										?>
										
										<div class="kt-widget1">
											
												<div class="kt-widget1__item">
																	<div class="kt-widget1__info">
																		<h3 class="kt-widget1__title">Date & Time</h3>
																		<span class="kt-widget1__desc"><?php echo $tr["RespTime"]; ?></span>
																	</div>
																	
																</div>
											
																<div class="kt-widget1__item">
																	<div class="kt-widget1__info">
																		<h3 class="kt-widget1__title">Payment ID</h3>
																		<span class="kt-widget1__desc"><?php echo $tr["PaymentID"]; ?></span>
																	</div>
																	
																</div>
																<div class="kt-widget1__item">
																	<div class="kt-widget1__info">
																		<h3 class="kt-widget1__title">Order Number</h3>
																		<span class="kt-widget1__desc"><?php echo $tr["OrderNumber"]; ?></span>
																	</div>
																
																</div>
																<div class="kt-widget1__item">
																	<div class="kt-widget1__info">
																		<h3 class="kt-widget1__title">Amount</h3>
																		<span class="kt-widget1__desc"><?php echo $tr["Amount"]; ?></span>
																	</div>
																	
																</div>
																	<div class="kt-widget1__item">
																	<div class="kt-widget1__info">
																		<h3 class="kt-widget1__title">Bank Ref No</h3>
																		<span class="kt-widget1__desc"><?php echo $tr["BankRefNo"]; ?></span>
																	</div>
																	
																</div>
																	<div class="kt-widget1__item">
																	<div class="kt-widget1__info">
																		<h3 class="kt-widget1__title">Txn Message</h3>
																		<span class="kt-widget1__desc"><?php echo $tr["TxnMessage"];  ?></span>
																	</div>
																	
																</div>
																

															<!--end:: Widgets/Stats2-3 -->
														</div>
										
										<?php } else { ?>
										
												<?php echo $payment_img; ?>
												
												
										<?php  } ?>
										</div>
									</div>
													
													
												
													
													</div>
												
													
													
													
												
												
												
												</div>
																							


											</div>
												<div class="tab-pane" id="kt_tabs_5_2" role="tabpanel">
													<div class="row row-no-padding row-col-separator-xl">
													<div class="col-md-12 col-lg-12 col-xl-3">

															<!--begin:: Widgets/Stats2-1 -->
															<div class="kt-widget1">
																<div class="kt-widget1__item">
																	<div class="kt-widget1__info">
																		<h3 class="kt-widget1__title">PRIMARY DETAILS </h3>
																		
																		
																		
																		<span class="kt-widget1__desc"></span>
																	</div>
																	
																</div>
																<div class="kt-widget1__item">
																	<div class="kt-widget1__info">
																		<h3 class="kt-widget1__title"> Name </h3>
																		<span class="kt-widget1__desc"><?php echo $primary_name; ?></span>
																	</div>
																	
																</div>
																<div class="kt-widget1__item">
																	<div class="kt-widget1__info">
																		<h3 class="kt-widget1__title"> New NRIC / Passport No </h3>
																		<span class="kt-widget1__desc"><?php echo $primary_nirc; ?></span>
																	</div>
																	
																</div>
															
															
															
															
															
															</div>

															<!--end:: Widgets/Stats2-1 -->
														</div>
														
															<div class="col-md-12 col-lg-12 col-xl-3">

															<!--begin:: Widgets/Stats2-1 -->
															<div class="kt-widget1">
																<div class="kt-widget1__item">
																	<div class="kt-widget1__info">
																		<h3 class="kt-widget1__title">MEMBERSHIP PACKAGE </h3>
																		
																		
																		
																		<span class="kt-widget1__desc"></span>
																	</div>
																	
																</div>
																<div class="kt-widget1__item">
																	<div class="kt-widget1__info">
																		<h3 class="kt-widget1__title"> PACKAGE </h3>
																		<span class="kt-widget1__desc">Individual </span>
																	</div>
																	
																</div>
																<div class="kt-widget1__item">
																	<div class="kt-widget1__info">
																		<h3 class="kt-widget1__title"> Amount </h3>
																		<span class="kt-widget1__desc">RM1980</span>
																	</div>
																	
																</div>
															
															
															
															
															
															</div>

															<!--end:: Widgets/Stats2-1 -->
														</div>
														
														
													
													</div>
													
													
												</div>
												<div class="tab-pane" id="kt_tabs_5_3" role="tabpanel">
													<div class="row row-no-padding row-col-separator-xl">
													<div class="col-md-12 col-lg-12 col-xl-6">

															<!--begin:: Widgets/Stats2-1 -->
															<div class="kt-widget1">
																<div class="kt-widget1__item">
																	<div class="kt-widget1__info">
																		<h3 class="kt-widget1__title"> <?php echo $ques->q1; ?>  <span class="kt-badge kt-badge--primary  kt-badge--inline kt-badge--pill"><?php echo $ques->qus1; ?></span></h3>
																		<?php if($ques->qus1=="Yes") {?>
																		<span class="kt-widget1__desc"> ANS: <?php echo $ques->ans1; ?></span>
																		<?php } ?>
																	</div>
																	
																</div>
															
														<div class="kt-widget1__item">
																	<div class="kt-widget1__info">
																		<h3 class="kt-widget1__title"> <?php echo $ques->q2; ?>  <span class="kt-badge kt-badge--primary  kt-badge--inline kt-badge--pill"><?php echo $ques->qus2; ?></span></h3>
																		<?php if($ques->qus2=="Yes") {?>
																		<span class="kt-widget1__desc"> ANS: <?php echo $ques->ans2; ?></span>
																		<?php } ?>
																	</div>
																	
																</div>
																
																
																<div class="kt-widget1__item">
																	<div class="kt-widget1__info">
																		<h3 class="kt-widget1__title"> <?php echo $ques->q3; ?>  <span class="kt-badge kt-badge--primary  kt-badge--inline kt-badge--pill"><?php echo $ques->qus3; ?></span></h3>
																		<?php if($ques->qus3=="Yes") {?>
																		<span class="kt-widget1__desc"> ANS: <?php echo $ques->ans3; ?></span>
																		<?php } ?>
																	</div>
																	
																</div>
																
																
																<div class="kt-widget1__item">
																	<div class="kt-widget1__info">
																		<h3 class="kt-widget1__title"> <?php echo $ques->q4; ?>  <span class="kt-badge kt-badge--primary  kt-badge--inline kt-badge--pill"><?php echo $ques->qus4; ?></span></h3>
																		<?php if($ques->qus4=="Yes") {?>
																		<span class="kt-widget1__desc"> ANS: <?php echo $ques->ans4; ?></span>
																		<?php } ?>
																	</div>
																	
																</div>
															
															
															
															
															</div>

															<!--end:: Widgets/Stats2-1 -->
														</div>
													
													
													<div class="col-md-12 col-lg-12 col-xl-6">

															<!--begin:: Widgets/Stats2-1 -->
															<div class="kt-widget1">
																<div class="kt-widget1__item">
																	<div class="kt-widget1__info">
																		<h3 class="kt-widget1__title"> <?php echo $ques->q5; ?>  <span class="kt-badge kt-badge--primary  kt-badge--inline kt-badge--pill"><?php echo $ques->qus5; ?></span></h3>
																		<?php if($ques->qus5=="Yes") {?>
																		<span class="kt-widget1__desc"> ANS: <?php echo $ques->ans5; ?></span>
																		<?php } ?>
																	</div>
																	
																</div>
															
														<div class="kt-widget1__item">
																	<div class="kt-widget1__info">
																		<h3 class="kt-widget1__title"> <?php echo $ques->q6; ?>  <span class="kt-badge kt-badge--primary  kt-badge--inline kt-badge--pill"><?php echo $ques->qus6; ?></span></h3>
																		<?php if($ques->qus6=="Yes") {?>
																		<span class="kt-widget1__desc"> ANS: <?php echo $ques->ans6; ?></span>
																		<?php } ?>
																	</div>
																	
																</div>
																
																
																<div class="kt-widget1__item">
																	<div class="kt-widget1__info">
																		<h3 class="kt-widget1__title"> <?php echo $ques->q7; ?>  <span class="kt-badge kt-badge--primary  kt-badge--inline kt-badge--pill"><?php echo $ques->qus7; ?></span></h3>
																		<?php if($ques->qus7=="Yes") {?>
																		<span class="kt-widget1__desc"> ANS: <?php echo $ques->ans7; ?></span>
																		<?php } ?>
																	</div>
																	
																</div>
																
																
																<div class="kt-widget1__item">
																	<div class="kt-widget1__info">
																		<h3 class="kt-widget1__title"> <?php echo $ques->q8; ?>  <span class="kt-badge kt-badge--primary  kt-badge--inline kt-badge--pill"><?php echo $ques->qus8; ?></span></h3>
																		<?php if($ques->qus8=="Yes") {?>
																		<span class="kt-widget1__desc"> ANS: <?php echo $ques->ans8; ?></span>
																		<?php } ?>
																	</div>
																	
																</div>
															
															
															
															
															</div>

															<!--end:: Widgets/Stats2-1 -->
														</div>
													</div>
													
													
													</div>
												<div class="tab-pane" id="kt_tabs_5_4" role="tabpanel">
													<div class="row row-no-padding row-col-separator-xl">
														<div class="col-md-12 col-lg-12 col-xl-3">

															<!--begin:: Widgets/Stats2-1 -->
															<div class="kt-widget1">
																<div class="kt-widget1__item">
																	<div class="kt-widget1__info">
																		<h3 class="kt-widget1__title ">NOMINEE 1</h3>
																		<span class="kt-widget1__desc"></span>
																	</div>
																	
																</div>
																<div class="kt-widget1__item">
																	<div class="kt-widget1__info">
																		<h3 class="kt-widget1__title"> Name </h3>
																		<span class="kt-widget1__desc"><?php echo $nominees->nominee_name; ?></span>
																	</div>
																	
																</div>
																<div class="kt-widget1__item">
																	<div class="kt-widget1__info">
																		<h3 class="kt-widget1__title"> New NRIC / Passport No </h3>
																		<span class="kt-widget1__desc"><?php echo $nominees->nominee_nric; ?></span>
																	</div>
																	
																</div>
															
																<div class="kt-widget1__item">
																	<div class="kt-widget1__info">
																		<h3 class="kt-widget1__title">Address  / Alamat </h3>
																		<span class="kt-widget1__desc"><?php echo $nominees->nominee_address; ?></span>
																	</div>
																	
																</div>
															
																<div class="kt-widget1__item">
																	<div class="kt-widget1__info">
																		<h3 class="kt-widget1__title">Postcode </h3>
																		<span class="kt-widget1__desc"><?php echo $nominees->nominee_postcode; ?></span>
																	</div>
																	
																</div>
																	<div class="kt-widget1__item">
																	<div class="kt-widget1__info">
																		<h3 class="kt-widget1__title">Relationship</h3>
																		<span class="kt-widget1__desc"><?php echo $nominees->nominee_relationship; ?></span>
																	</div>
																	
																</div>
															
																	<div class="kt-widget1__item">
																	<div class="kt-widget1__info">
																		<h3 class="kt-widget1__title">Share</h3>
																		<span class="kt-widget1__desc"><?php echo 	 $nominees->nominee_share; ?>%</span>
																	</div>
																	
																</div>
															
															
															
															</div>

															<!--end:: Widgets/Stats2-1 -->
														</div>
														
														<div class="col-md-12 col-lg-12 col-xl-3">

															<!--begin:: Widgets/Stats2-1 -->
															<div class="kt-widget1">
																<div class="kt-widget1__item">
																	<div class="kt-widget1__info">
																		<h3 class="kt-widget1__title">NOMINEE 2</h3>
																		<span class="kt-widget1__desc"></span>
																	</div>
																	
																</div>
																<div class="kt-widget1__item">
																	<div class="kt-widget1__info">
																		<h3 class="kt-widget1__title"> Name </h3>
																		<span class="kt-widget1__desc"><?php echo $nominees->nominee_name1; ?></span>
																	</div>
																	
																</div>
																<div class="kt-widget1__item">
																	<div class="kt-widget1__info">
																		<h3 class="kt-widget1__title"> New NRIC / Passport No </h3>
																		<span class="kt-widget1__desc"><?php echo $nominees->nominee_nric1; ?></span>
																	</div>
																	
																</div>
															
																<div class="kt-widget1__item">
																	<div class="kt-widget1__info">
																		<h3 class="kt-widget1__title">Address  / Alamat </h3>
																		<span class="kt-widget1__desc"><?php echo $nominees->nominee_address1; ?></span>
																	</div>
																	
																</div>
															
																<div class="kt-widget1__item">
																	<div class="kt-widget1__info">
																		<h3 class="kt-widget1__title">Postcode </h3>
																		<span class="kt-widget1__desc"><?php echo $nominees->nominee_postcode1; ?></span>
																	</div>
																	
																</div>
																	<div class="kt-widget1__item">
																	<div class="kt-widget1__info">
																		<h3 class="kt-widget1__title">Relationship</h3>
																		<span class="kt-widget1__desc"><?php echo $nominees->nominee_relationship1; ?></span>
																	</div>
																	
																</div>
															
																	<div class="kt-widget1__item">
																	<div class="kt-widget1__info">
																		<h3 class="kt-widget1__title">Share</h3>
																		<span class="kt-widget1__desc"><?php echo 	 $nominees->nominee_share1; ?>%</span>
																	</div>
																	
																</div>
															
															
															
															</div>

															<!--end:: Widgets/Stats2-1 -->
														</div>
														
														
														
														<div class="col-md-12 col-lg-12 col-xl-3">

															<!--begin:: Widgets/Stats2-1 -->
															<div class="kt-widget1">
																<div class="kt-widget1__item">
																	<div class="kt-widget1__info">
																		<h3 class="kt-widget1__title">WITNESS </h3>
																		
																		
																		
																		<span class="kt-widget1__desc"></span>
																	</div>
																	
																</div>
																<div class="kt-widget1__item">
																	<div class="kt-widget1__info">
																		<h3 class="kt-widget1__title"> Name </h3>
																		<span class="kt-widget1__desc"><?php echo $nominees->witness_name; ?></span>
																	</div>
																	
																</div>
																<div class="kt-widget1__item">
																	<div class="kt-widget1__info">
																		<h3 class="kt-widget1__title"> New NRIC / Passport No </h3>
																		<span class="kt-widget1__desc"><?php echo $nominees->witness_nric; ?></span>
																	</div>
																	
																</div>
															
																<div class="kt-widget1__item">
																	<div class="kt-widget1__info">
																		<h3 class="kt-widget1__title"> Sign</h3>
																		<span class="kt-widget1__desc">
																		<img src="<?php echo  str_replace("[removed]","data:image/png;base64,",$nominees->witness_sign); ?>" class="img-fluid">
																		</span>
																	
																	</div>
																
															</div>
															
															
															
															
															</div>

															<!--end:: Widgets/Stats2-1 -->
														</div>
														
														
														
													
												
													
													<div class="col-md-12 col-lg-12 col-xl-3">
													
													
											<div class="kt-widget1">
																<div class="kt-widget1__item">
																	<div class="kt-widget1__info">
																		<h3 class="kt-widget1__title"> DOCTOR  </h3>
																		
																		
																		
																		<span class="kt-widget1__desc"></span>
																	</div>
																	
																</div>
																<div class="kt-widget1__item">
																	<div class="kt-widget1__info">
																		<h3 class="kt-widget1__title"> Name </h3>
																		<span class="kt-widget1__desc"><?php echo $doctor->doctor_name; ?></span>
																	</div>
																	
																</div>
																<div class="kt-widget1__item">
																	<div class="kt-widget1__info">
																		<h3 class="kt-widget1__title"> Contact No </h3>
																		<span class="kt-widget1__desc"><?php echo $doctor->doctor_phone; ?></span>
																	</div>
																	
																</div>
															
															<div class="kt-widget1__item">
																	<div class="kt-widget1__info">
																		<h3 class="kt-widget1__title"> Address </h3>
																		<span class="kt-widget1__desc"><?php echo $doctor->doctor_address1; ?></span>
																	</div>
																	
																</div>
																
																
															</div>
												
													
													</div>
													
												
												
												
												</div>
												</div>
											</div>



													
													

												
												
												
												
												
												</div>
												
												<div class="kt-portlet__foot">
												<div class="kt-form__actions">
													<div class="row">
														
													</div>
												</div>
											</div>
												
												
											</div>

											<!--End::Section-->




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




		<!--end::Page Scripts -->
	
	</body>
	
	<!-- end::Body -->

</html>