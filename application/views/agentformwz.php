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
<link href="<?php base_url()?>assets/css/pages/wizard/wizard-2.css" rel="stylesheet" type="text/css" />
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
<div class="alert" >
</div>

<style>

.kt-wizard-v2 .kt-wizard-v2__wrapper .kt-form {
    width: 90%;
    padding: 4rem 6rem 6rem;
}

</style>


<!-- begin:: Content -->
						<div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
						
						
								<div class="kt-portlet kt-portlet--mobile">
								<div class="kt-portlet__head kt-portlet__head--lg">
									<div class="kt-portlet__head-label">
										<span class="kt-portlet__head-icon">
											<i class="kt-font-brand flaticon-users-1	"></i>
										</span>
										<h3 class="kt-portlet__head-title">
										
                                             Add New Consultants
										</h3>
									</div>
									<div class="kt-portlet__head-toolbar">
										<div class="kt-portlet__head-wrapper">
											<button type="button" onclick="window.history.back();" class="btn btn-danger btn-elevate btn-circle btn-icon"><i class="la la-close"></i></button>
											
										</div>
									</div>
								</div>
						
							<div class="kt-portlet">
								<div class="kt-portlet__body kt-portlet__body--fit">
									<div class="kt-grid  kt-wizard-v2 kt-wizard-v2--white" id="kt_wizard_v2" data-ktwizard-state="step-first">
										<div class="kt-grid__item kt-wizard-v2__aside">

											<!--begin: Form Wizard Nav -->
											<div class="kt-wizard-v2__nav">

												<!--doc: Remove "kt-wizard-v2__nav-items--clickable" class and also set 'clickableSteps: false' in the JS init to disable manually clicking step titles -->
												<div class="kt-wizard-v2__nav-items kt-wizard-v2__nav-items--clickable">
													
													<div class="kt-wizard-v2__nav-item" data-ktwizard-type="step" data-ktwizard-state="current">
														<div class="kt-wizard-v2__nav-body">
															<div class="kt-wizard-v2__nav-icon">
																<i class="flaticon-speech-bubble"></i>
															</div>
															<div class="kt-wizard-v2__nav-label">
																<div class="kt-wizard-v2__nav-label-title">
																	Personal Details
																</div>
																<div class="kt-wizard-v2__nav-label-desc">
																	Enter your Personal Details
																</div>
															</div>
														</div>
													</div>
													<div class="kt-wizard-v2__nav-item" href="#" data-ktwizard-type="step">
														<div class="kt-wizard-v2__nav-body">
															<div class="kt-wizard-v2__nav-icon">
																<i class="flaticon-customer"></i>
															</div>
															<div class="kt-wizard-v2__nav-label">
																<div class="kt-wizard-v2__nav-label-title">
																	Employment History
																</div>
																<div class="kt-wizard-v2__nav-label-desc">
																	Add Your Employment History
																</div>
															</div>
														</div>
													</div>
													<div class="kt-wizard-v2__nav-item" data-ktwizard-type="step">
														<div class="kt-wizard-v2__nav-body">
															<div class="kt-wizard-v2__nav-icon">
																<i class="flaticon-speech-bubble-1"></i>
															</div>
															<div class="kt-wizard-v2__nav-label">
																<div class="kt-wizard-v2__nav-label-title">
																	Other Information
																</div>
																<div class="kt-wizard-v2__nav-label-desc">
																	Enter your information
																</div>
															</div>
														</div>
													</div>
													<div class="kt-wizard-v2__nav-item" data-ktwizard-type="step">
														<div class="kt-wizard-v2__nav-body">
															<div class="kt-wizard-v2__nav-icon">
																<i class="flaticon-users"></i>
															</div>
															<div class="kt-wizard-v2__nav-label">
																<div class="kt-wizard-v2__nav-label-title">
																	Nominee Beneficiery
																</div>
																<div class="kt-wizard-v2__nav-label-desc">
																	Enter your Nominee Details
																</div>
															</div>
														</div>
													</div>
													<div class="kt-wizard-v2__nav-item" data-ktwizard-type="step">
														<div class="kt-wizard-v2__nav-body">
															<div class="kt-wizard-v2__nav-icon">
																<i class="flaticon-user-settings"></i>
															</div>
															<div class="kt-wizard-v2__nav-label">
																<div class="kt-wizard-v2__nav-label-title">
																	Bank Details
																</div>
																<div class="kt-wizard-v2__nav-label-desc">
																	Completed!
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>

											<!--end: Form Wizard Nav -->
										</div>
										<div class="kt-grid__item kt-grid__item--fluid kt-wizard-v2__wrapper">

											<!--begin: Form Wizard Form-->
											


											
	<?php echo form_open(base_url()."Consultants/saveagent",array('id'=>'kt_form','class'=>'kt-form','method'=>'post')); ?>
	<input  type="hidden" name="agent_gmid" value="<?php echo $agent_gmid;?>" >
	<input type="hidden" name="agent_smid" value="<?php echo $agent_smid; ?>" >

	<!--begin: Form Wizard Step 2-->
												<div class="kt-wizard-v2__content" data-ktwizard-type="step-content">
													<div class="kt-heading kt-heading--md">Personal Details</div>
													<div class="kt-form__section kt-form__section--first">
															<div class="kt-wizard-v2__form">
															
															<div class="form-group">
																<label>Title</label>
																	<select name="agent_level" id="agent_level" class="form-control">
																		<option value="">Select</option>
																	<?php if($agent_level =="" || $agent_level=="GM")   {?>		<option value="GM">Group Manager</option> <?php } ?>
																	<?php if($agent_level=="SM" || $agent_level=="GM")  {?>		<option value="SM">Senior Manager</option> <?php } ?>
																		<option value="CS">Consultant</option>
																	</select>
																<span class="form-text text-muted"></span>
															</div>
															
															<div class="form-group">
																<label>Name as per NRIC</label>
																<input type="text" class="form-control" name="agent_name"  id="agent_name" >
																<span class="form-text text-muted"></span>
															</div>
															
															<div class="form-group">
																<label>Introduced By</label>
																<input type="text" class="form-control"  name="agent_introduced_by"  id="agent_introduced_by" >
																<span class="form-text text-muted"></span>
															</div>
															<div class="row">
																<div class="col-xl-6 col-lg-6 col-md-6">
																	<div class="form-group">
																		<label>NRIC No/ No. KP</label>
																		<input type="text" class="form-control" name="agent_nric_no"  id="agent_nric_no" >
																		<span class="form-text text-muted"></span>
																	</div>
																</div>
																<div class="col-xl-6 col-lg-6 col-md-6">
																	<div class="form-group">
																		<label>Old NRIC No/ No. KP Lama</label>
																		<input type="text" class="form-control" name="agent_oldnric_no"  id="agent_oldnric_no" >
																		<span class="form-text text-muted"></span>
																	</div>
																</div>
															</div>
															<div class="row">
																<div class="col-xl-6 col-lg-6 col-md-6"> 	
																	<div class="form-group">
																		<label>Address Line 1</label>
																		<input type="text" class="form-control" name="agent_address1"  id="agent_address1">
																		<span class="form-text text-muted"></span>
																	</div>
																</div>
																<div class="col-xl-6 col-lg-6 col-md-6">	
																	<div class="form-group">
																		<label>Address Line 2</label>
																		<input type="text" class="form-control" name="agent_address2"  id="agent_address2">
																		<span class="form-text text-muted"></span>
																	</div>
																</div>
															</div>
															<div class="row">
																<div class="col-xl-6 col-lg-6 col-md-6"> 	
																	<div class="form-group">
																		<label>Address Line 3</label>
																		<input type="text" class="form-control" name="agent_address3"  id="agent_address3">
																		<span class="form-text text-muted"></span>
																	</div>
																</div>
																<div class="col-xl-6 col-lg-6 col-md-6"> 	
																	<div class="form-group">
																		<label>Postcode</label>
																		<input type="text" class="form-control" name="agent_pincode" id="agent_pincode" >
																		<span class="form-text text-muted"></span>
																	</div>
																</div>
															</div>

															<div class="row">
																<div class="col-xl-6 col-lg-6 col-md-6"> 	
																	<div class="form-group">
																		<label>City</label>
																		<input type="text" class="form-control" name="agent_city" id="agent_city" >
																		<span class="form-text text-muted"></span>
																	</div>
																</div>
																<div class="col-xl-6 col-lg-6 col-md-6"> 	
																	<div class="form-group">
																		<label>State</label>
																		<input type="text" class="form-control" name="agent_state" id="agent_state">
																		<span class="form-text text-muted"></span>
																	</div>
																</div>
															</div>
															<div class="row">
																<div class="col-xl-6 col-lg-6 col-md-6"> 	
																		<div class="form-group">
																		<label>Country:</label>
																		<select name="agent_country" class="form-control" id="agent_country" name="agent_country">
																			<option value="">Select</option>
																			<option value="Afghanistan">Afghanistan</option>
																			<option value="Åland Islands">Åland Islands</option>
																			<option value="Albania">Albania</option>
																			<option value="Algeria">Algeria</option>
																			<option value="American Samoa">American Samoa</option>
																			<option value="Andorra">Andorra</option>
																			<option value="Angola">Angola</option>
																			<option value="Anguilla">Anguilla</option>
																			<option value="Antarctica">Antarctica</option>
																			<option value="Antigua and Barbuda">Antigua and Barbuda</option>
																			<option value="Argentina">Argentina</option>
																			<option value="Armenia">Armenia</option>
																			<option value="Aruba">Aruba</option>
																			<option value="Australia" selected>Australia</option>
																			<option value="Austria">Austria</option>
																			<option value="Azerbaijan">Azerbaijan</option>
																			<option value="Bahamas">Bahamas</option>
																			<option value="Bahrain">Bahrain</option>
																			<option value="Bangladesh">Bangladesh</option>
																			<option value="Barbados">Barbados</option>
																			<option value="Belarus">Belarus</option>
																			<option value="Belgium">Belgium</option>
																			<option value="Belize">Belize</option>
																			<option value="Benin">Benin</option>
																			<option value="Bermuda">Bermuda</option>
																			<option value="Bhutan">Bhutan</option>
																			<option value="Bolivia, Plurinational State of">Bolivia, Plurinational State of</option>
																			<option value="Bonaire, Sint Eustatius and Saba">Bonaire, Sint Eustatius and Saba</option>
																			<option value="Bosnia and Herzegovina">Bosnia and Herzegovina</option>
																			<option value="Botswana">Botswana</option>
																			<option value="Bouvet Island">Bouvet Island</option>
																			<option value="Brazil">Brazil</option>
																			<option value="British Indian Ocean Territory">British Indian Ocean Territory</option>
																			<option value="Brunei Darussalam">Brunei Darussalam</option>
																			<option value="Bulgaria">Bulgaria</option>
																			<option value="Burkina Faso">Burkina Faso</option>
																			<option value="Burundi">Burundi</option>
																			<option value="Cambodia">Cambodia</option>
																			<option value="Cameroon">Cameroon</option>
																			<option value="Canada">Canada</option>
																			<option value="Cape Verde">Cape Verde</option>
																			<option value="Cayman Islands">Cayman Islands</option>
																			<option value="Central African Republic">Central African Republic</option>
																			<option value="Chad">Chad</option>
																			<option value="Chile">Chile</option>
																			<option value="China">China</option>
																			<option value="Christmas Island">Christmas Island</option>
																			<option value="Cocos (Keeling) Islands">Cocos (Keeling) Islands</option>
																			<option value="Colombia">Colombia</option>
																			<option value="Comoros">Comoros</option>
																			<option value="Congo">Congo</option>
																			<option value="Congo, the Democratic Republic of the">Congo, the Democratic Republic of the</option>
																			<option value="Cook Islands">Cook Islands</option>
																			<option value="Costa Rica">Costa Rica</option>
																			<option value="Côte d'Ivoire">Côte d'Ivoire</option>
																			<option value="Croatia">Croatia</option>
																			<option value="Cuba">Cuba</option>
																			<option value="Curaçao">Curaçao</option>
																			<option value="Cyprus">Cyprus</option>
																			<option value="Czech Republic">Czech Republic</option>
																			<option value="Denmark">Denmark</option>
																			<option value="Djibouti">Djibouti</option>
																			<option value="Dominica">Dominica</option>
																			<option value="Dominican Republic">Dominican Republic</option>
																			<option value="Ecuador">Ecuador</option>
																			<option value="Egypt">Egypt</option>
																			<option value="El Salvador">El Salvador</option>
																			<option value="Equatorial Guinea">Equatorial Guinea</option>
																			<option value="Eritrea">Eritrea</option>
																			<option value="Estonia">Estonia</option>
																			<option value="Ethiopia">Ethiopia</option>
																			<option value="Falkland Islands (Malvinas)">Falkland Islands (Malvinas)</option>
																			<option value="Faroe Islands">Faroe Islands</option>
																			<option value="Fiji">Fiji</option>
																			<option value="Finland">Finland</option>
																			<option value="France">France</option>
																			<option value="French Guiana">French Guiana</option>
																			<option value="French Polynesia">French Polynesia</option>
																			<option value="French Southern Territories">French Southern Territories</option>
																			<option value="Gabon">Gabon</option>
																			<option value="Gambia">Gambia</option>
																			<option value="Georgia">Georgia</option>
																			<option value="Germany">Germany</option>
																			<option value="Ghana">Ghana</option>
																			<option value="Gibraltar">Gibraltar</option>
																			<option value="Greece">Greece</option>
																			<option value="Greenland">Greenland</option>
																			<option value="Grenada">Grenada</option>
																			<option value="Guadeloupe">Guadeloupe</option>
																			<option value="Guam">Guam</option>
																			<option value="Guatemala">Guatemala</option>
																			<option value="Guernsey">Guernsey</option>
																			<option value="Guinea">Guinea</option>
																			<option value="Guinea-Bissau">Guinea-Bissau</option>
																			<option value="Guyana">Guyana</option>
																			<option value="Haiti">Haiti</option>
																			<option value="Heard Island and McDonald Islands">Heard Island and McDonald Islands</option>
																			<option value="Holy See (Vatican City State)">Holy See (Vatican City State)</option>
																			<option value="Honduras">Honduras</option>
																			<option value="Hong Kong">Hong Kong</option>
																			<option value="Hungary">Hungary</option>
																			<option value="Iceland">Iceland</option>
																			<option value="India">India</option>
																			<option value="Indonesia">Indonesia</option>
																			<option value="Iran, Islamic Republic of">Iran, Islamic Republic of</option>
																			<option value="Iraq">Iraq</option>
																			<option value="Ireland">Ireland</option>
																			<option value="Isle of Man">Isle of Man</option>
																			<option value="Israel">Israel</option>
																			<option value="Italy">Italy</option>
																			<option value="Jamaica">Jamaica</option>
																			<option value="Japan">Japan</option>
																			<option value="Jersey">Jersey</option>
																			<option value="Jordan">Jordan</option>
																			<option value="Kazakhstan">Kazakhstan</option>
																			<option value="Kenya">Kenya</option>
																			<option value="Kiribati">Kiribati</option>
																			<option value="Korea, Democratic People's Republic of">Korea, Democratic People's Republic of</option>
																			<option value="Korea, Republic of">Korea, Republic of</option>
																			<option value="Kuwait">Kuwait</option>
																			<option value="Kyrgyzstan">Kyrgyzstan</option>
																			<option value="Lao People's Democratic Republic">Lao People's Democratic Republic</option>
																			<option value="Latvia">Latvia</option>
																			<option value="Lebanon">Lebanon</option>
																			<option value="Lesotho">Lesotho</option>
																			<option value="Liberia">Liberia</option>
																			<option value="Libya">Libya</option>
																			<option value="Liechtenstein">Liechtenstein</option>
																			<option value="Lithuania">Lithuania</option>
																			<option value="Luxembourg">Luxembourg</option>
																			<option value="Macao">Macao</option>
																			<option value="Macedonia, the former Yugoslav Republic of">Macedonia, the former Yugoslav Republic of</option>
																			<option value="Madagascar">Madagascar</option>
																			<option value="Malawi">Malawi</option>
																			<option value="Malaysia" selected>Malaysia</option>
																			<option value="Maldives">Maldives</option>
																			<option value="Mali">Mali</option>
																			<option value="Malta">Malta</option>
																			<option value="Marshall Islands">Marshall Islands</option>
																			<option value="Martinique">Martinique</option>
																			<option value="Mauritania">Mauritania</option>
																			<option value="Mauritius">Mauritius</option>
																			<option value="Mayotte">Mayotte</option>
																			<option value="Mexico">Mexico</option>
																			<option value="Micronesia, Federated States of">Micronesia, Federated States of</option>
																			<option value="Moldova, Republic of">Moldova, Republic of</option>
																			<option value="Monaco">Monaco</option>
																			<option value="Mongolia">Mongolia</option>
																			<option value="Montenegro">Montenegro</option>
																			<option value="Montserrat">Montserrat</option>
																			<option value="Morocco">Morocco</option>
																			<option value="Mozambique">Mozambique</option>
																			<option value="Myanmar">Myanmar</option>
																			<option value="Namibia">Namibia</option>
																			<option value="Nauru">Nauru</option>
																			<option value="Nepal">Nepal</option>
																			<option value="Netherlands">Netherlands</option>
																			<option value="New Caledonia">New Caledonia</option>
																			<option value="New Zealand">New Zealand</option>
																			<option value="Nicaragua">Nicaragua</option>
																			<option value="Niger">Niger</option>
																			<option value="Nigeria">Nigeria</option>
																			<option value="Niue">Niue</option>
																			<option value="Norfolk Island">Norfolk Island</option>
																			<option value="Northern Mariana Islands">Northern Mariana Islands</option>
																			<option value="Norway">Norway</option>
																			<option value="Oman">Oman</option>
																			<option value="Pakistan">Pakistan</option>
																			<option value="Palau">Palau</option>
																			<option value="Palestinian Territory, Occupied">Palestinian Territory, Occupied</option>
																			<option value="Panama">Panama</option>
																			<option value="Papua New Guinea">Papua New Guinea</option>
																			<option value="Paraguay">Paraguay</option>
																			<option value="Peru">Peru</option>
																			<option value="Philippines">Philippines</option>
																			<option value="Pitcairn">Pitcairn</option>
																			<option value="Poland">Poland</option>
																			<option value="Portugal">Portugal</option>
																			<option value="Puerto Rico">Puerto Rico</option>
																			<option value="Qatar">Qatar</option>
																			<option value="Réunion">Réunion</option>
																			<option value="Romania">Romania</option>
																			<option value="Russian Federation">Russian Federation</option>
																			<option value="Rwanda">Rwanda</option>
																			<option value="Saint Barthélemy">Saint Barthélemy</option>
																			<option value="Saint Helena, Ascension and Tristan da Cunha">Saint Helena, Ascension and Tristan da Cunha</option>
																			<option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option>
																			<option value="Saint Lucia">Saint Lucia</option>
																			<option value="Saint Martin (French part)">Saint Martin (French part)</option>
																			<option value="Saint Pierre and Miquelon">Saint Pierre and Miquelon</option>
																			<option value="Saint Vincent and the Grenadines">Saint Vincent and the Grenadines</option>
																			<option value="Samoa">Samoa</option>
																			<option value="San Marino">San Marino</option>
																			<option value="Sao Tome and Principe">Sao Tome and Principe</option>
																			<option value="Saudi Arabia">Saudi Arabia</option>
																			<option value="Senegal">Senegal</option>
																			<option value="Serbia">Serbia</option>
																			<option value="Seychelles">Seychelles</option>
																			<option value="Sierra Leone">Sierra Leone</option>
																			<option value="Singapore">Singapore</option>
																			<option value="Sint Maarten (Dutch part)">Sint Maarten (Dutch part)</option>
																			<option value="Slovakia">Slovakia</option>
																			<option value="Slovenia">Slovenia</option>
																			<option value="Solomon Islands">Solomon Islands</option>
																			<option value="Somalia">Somalia</option>
																			<option value="South Africa">South Africa</option>
																			<option value="South Georgia and the South Sandwich Islands<">South Georgia and the South Sandwich Islands</option>
																			<option value="South Sudan">South Sudan</option>
																			<option value="Spain">Spain</option>
																			<option value="Sri Lanka<">Sri Lanka</option>
																			<option value="Sudan">Sudan</option>
																			<option value="Suriname">Suriname</option>
																			<option value="Svalbard and Jan Mayen">Svalbard and Jan Mayen</option>
																			<option value="Swaziland">Swaziland</option>
																			<option value="Sweden">Sweden</option>
																			<option value="Switzerland">Switzerland</option>
																			<option value="Syrian Arab Republic">Syrian Arab Republic</option>
																			<option value="Taiwan, Province of China">Taiwan, Province of China</option>
																			<option value="Tajikistan">Tajikistan</option>
																			<option value="Tanzania, United Republic of">Tanzania, United Republic of</option>
																			<option value="Thailand">Thailand</option>
																			<option value="Timor-Leste">Timor-Leste</option>
																			<option value="Togo">Togo</option>
																			<option value="Tokelau">Tokelau</option>
																			<option value="Tonga">Tonga</option>
																			<option value="Trinidad and Tobago">Trinidad and Tobago</option>
																			<option value="Tunisia">Tunisia</option>
																			<option value="Turkey">Turkey</option>
																			<option value="Turkmenistan">Turkmenistan</option>
																			<option value="Turks and Caicos Islands">Turks and Caicos Islands</option>
																			<option value="Tuvalu">Tuvalu</option>
																			<option value="Uganda">Uganda</option>
																			<option value="Ukraine">Ukraine</option>
																			<option value="United Arab Emirates">United Arab Emirates</option>
																			<option value="United Kingdom">United Kingdom</option>
																			<option value="United States">United States</option>
																			<option value="United States Minor Outlying Islands">United States Minor Outlying Islands</option>
																			<option value="Uruguay">Uruguay</option>
																			<option value="Uzbekistan">Uzbekistan</option>
																			<option value="Vanuatu">Vanuatu</option>
																			<option value="Venezuela, Bolivarian Republic of">Venezuela, Bolivarian Republic of</option>
																			<option value="Viet Nam<">Viet Nam</option>
																			<option value="Virgin Islands, British">Virgin Islands, British</option>
																			<option value="Virgin Islands, U.S.">Virgin Islands, U.S.</option>
																			<option value="Wallis and Futuna">Wallis and Futuna</option>
																			<option value="Western Sahara">Western Sahara</option>
																			<option value="Yemen">Yemen</option>
																			<option value="Zambia">Zambia</option>
																			<option value="Zimbabwe">Zimbabwe</option>
																		</select>
																	</div>
																</div>
																<div class="col-xl-6 col-lg-6 col-md-6"> 
																	<div class="form-group">
																		<label>Email</label>
																		<input type="email" class="form-control" name="agent_email" id="agent_email" value="email@email.com">
																		<span class="form-text text-muted"></span>
																	</div>
																</div>
															</div>
														    <div class="row">
																<div class="col-xl-6 col-lg-6 col-md-6"> 
																	<div class="form-group">
																		<label>Handphone Number</label>
																		<input type="tel" class="form-control" name="agent_phone_no" id="agent_phone_no">
																		<span class="form-text text-muted"></span>
																	</div>
																</div>
																<div class="col-xl-6 col-lg-6 col-md-6"> 
																	<div class="form-group">
																		<label>House/Office Number</label>
																		<input type="tel" class="form-control" name="agent_home_office_no" id="agent_home_office_no" >
																		<span class="form-text text-muted"></span>
																	</div>
																</div>
															</div>
														    <div class="row">
															<div class="col-xl-4 col-lg-4 col-md-4">
																<div class="form-group">
																	<label>Am I a Malaysian Citizen</label>
																	<div class="kt-radio-inline">
																		<label class="kt-radio">
																			<input type="radio" value="Yes" id="agent_mycitizen" checked name="agent_mycitizen"> Yes 
																			<span></span>
																		</label>
																		<label class="kt-radio">
																			<input type="radio" value="No" id="agent_mycitizen1" name="agent_mycitizen"> No
																			<span></span>
																		</label>
																	</div>
																	<span class="form-text text-muted"></span>
																</div>
															</div>
																<div class="col-xl-4 col-lg-4 col-md-4">
																<div class="form-group ">
																<label class="">Date of Birth</label>
																	<div class="">
																		<div class="input-group date">
																			<input type="date" class="form-control"  name="agent_dob" id="agent_dob" />
																			
																		</div>
																	</div>
																</div>
																</div>
																<div class="col-xl-4 col-lg-4 col-md-4">
																<div class="form-group">
																		<label>Age</label>
																		<input type="number" class="form-control" name="agent_age" id="agent_age" >
																		<span class="form-text text-muted"></span>
																	</div>
																</div>
															</div>
														    <div class="row">
																<div class="col-xl-6 col-lg-6 col-md-6">
																	<div class="form-group">
																		<label>Marital Status</label>
																			<select name="agent_marital_status" id="agent_marital_status" class="form-control">
																				<option value="">Select</option>
																				<option value="Single">Single</option>
																				<option value="Married">Married</option>
																				<option value="Widow">Widow</option>
																				<option value="Widower">Widower</option>
																				<option value="Divorced">Divorced</option>
																			</select>
																		<span class="form-text text-muted"></span>
																	</div> 
																</div>
																<div class="col-xl-6 col-lg-6 col-md-6"> 
																	<div class="form-group">
																		<label>Religion</label>
																			<select name="agent_religion" id="agent_religion" class="form-control">
																				<option value="">Select</option>
																				<option value="Is">Islam</option>
																				<option value="Chri">Christianity</option>
																				<option value="Hind">Hinduisum</option>
																				<option value="Bhud">Bhuddism</option>
																				<option value="Others">Others</option>
																			</select>
																		<span class="form-text text-muted"></span>
																	</div> 
																</div>
															</div>
															<div class="row">
																<div class="col-xl-6 col-lg-6 col-md-6">
																<div class="form-group">
																	<label>Race</label>
																		<select name="agent_race" id="agent_race" class="form-control">
																			<option value="">Select</option>
																			<option value="Malay">Malay</option>
																			<option value="chiness">Chinese</option>
																			<option value="India">Indian</option>
																			<option value="other">Others</option>
																		</select>
																	<span class="form-text text-muted"></span>
																</div>
																</div>
																<div class="col-xl-6 col-lg-6 col-md-6">
																<div class="form-group">
																	<label>Gender</label>
																		<select name="agent_gender" id="agent_gender" class="form-control">
																			<option value="">Select</option>
																			<option value="Ma">Male</option>
																			<option value="Fe">Female</option>
																		</select>
																	<span class="form-text text-muted"></span>
																</div> 
																</div>
															</div>
														 
														
														
													    
														
														</div>
													</div>
												</div>

												<!--end: Form Wizard Step 2-->

												<!--begin: Form Wizard Step 3-->
												<div class="kt-wizard-v2__content" data-ktwizard-type="step-content">
													<div class="kt-heading kt-heading--md">Employment History</div>
													<div class="kt-form__section kt-form__section--first">
														<div class="kt-wizard-v2__form">
														<div class="row">

<div class="col-xl-2 col-lg-2 col-md-2 col-sm-12">
																	<div class="form-group">
																		<label>Name of company</label>
																		<input type="text" class="form-control mb-1" name="company"  >
																		
																		<span class="form-text text-muted"></span>
																	</div>

</div>

<div class="col-xl-2 col-lg-2 col-md-2 col-sm-12">
																	<div class="form-group">
																		<label>Position</label>
																		<input type="text" class="form-control mb-1" name="position" >
																		
																		<span class="form-text text-muted"></span>
																	</div>

</div>


<div class="col-xl-2 col-lg-2 col-md-2 col-sm-12">
																	<div class="form-group">
																		<label>From</label>
																		<input type="date" class="form-control mb-1" name="date_from"  >
																		
																		<span class="form-text text-muted"></span>
																	</div>

</div>


<div class="col-xl-2 col-lg-2 col-md-2 col-sm-12">
																	<div class="form-group">
																		<label>To</label>
																		<input type="date" class="form-control mb-1" name="date_to" >
																		
																		<span class="form-text text-muted"></span>
																	</div>

</div>

<div class="col-xl-3 col-lg-3 col-md-3 col-sm-12">
																	<div class="form-group">
																		<label>Reason for Leaving</label>
																		<input type="text" class="form-control mb-1" name="leaving_reason">
																		
																		<span class="form-text text-muted"></span>
																	</div>

</div>



</div>														


<div class="row">

<div class="col-xl-2 col-lg-2 col-md-2 col-sm-12">
																	<div class="form-group">
																		
																		<input type="text" class="form-control mb-1" name="company1">
																		
																		<span class="form-text text-muted"></span>
																	</div>

</div>

<div class="col-xl-2 col-lg-2 col-md-2 col-sm-12">
																	<div class="form-group">
																		
																		<input type="text" class="form-control mb-1" name="position1">
																		
																		<span class="form-text text-muted"></span>
																	</div>

</div>


<div class="col-xl-2 col-lg-2 col-md-2 col-sm-12">
																	<div class="form-group">
																		
																		<input type="date" class="form-control mb-1" name="date_from1" >
																		
																		<span class="form-text text-muted"></span>
																	</div>

</div>


<div class="col-xl-2 col-lg-2 col-md-2 col-sm-12">
																	<div class="form-group">
																		
																		<input type="date" class="form-control mb-1" name="date_to1" >
																		
																		<span class="form-text text-muted"></span>
																	</div>

</div>

<div class="col-xl-3 col-lg-3 col-md-3 col-sm-12">
																	<div class="form-group">
																	
																		<input type="text" class="form-control mb-1" name="leaving_reason1">
																		
																		<span class="form-text text-muted"></span>
																	</div>

</div>



</div>	


<div class="row">

<div class="col-xl-2 col-lg-2 col-md-2 col-sm-12">
																	<div class="form-group">
																		
																		<input type="text" class="form-control mb-1" name="company2">
																		
																		<span class="form-text text-muted"></span>
																	</div>

</div>

<div class="col-xl-2 col-lg-2 col-md-2 col-sm-12">
																	<div class="form-group">
																		
																		<input type="text" class="form-control mb-1" name="position2">
																		
																		<span class="form-text text-muted"></span>
																	</div>

</div>


<div class="col-xl-2 col-lg-2 col-md-2 col-sm-12">
																	<div class="form-group">
																		
																		<input type="date" class="form-control mb-1" name="date_from2" >
																		
																		<span class="form-text text-muted"></span>
																	</div>

</div>


<div class="col-xl-2 col-lg-2 col-md-2 col-sm-12">
																	<div class="form-group">
																		
																		<input type="date" class="form-control mb-1" name="date_to2" >
																		
																		<span class="form-text text-muted"></span>
																	</div>

</div>

<div class="col-xl-3 col-lg-3 col-md-3 col-sm-12">
																	<div class="form-group">
																	
																		<input type="text" class="form-control mb-1" name="leaving_reason2">
																		
																		<span class="form-text text-muted"></span>
																	</div>

</div>



</div>	
															
														
															
															
														</div>
													</div>
												</div>

												<!--end: Form Wizard Step 3-->

												<!--begin: Form Wizard Step 4-->
												<div class="kt-wizard-v2__content" data-ktwizard-type="step-content">
													<div class="kt-heading kt-heading--md">Other Information</div>
													<div class="kt-form__section kt-form__section--first">
														<div class="kt-wizard-v2__form">
														<div class="form-group">
															<label>Are you an un-discharged bankrupt and/or have criminal record what so ever and / or have any discipilinary actions in ny previous employment?</label>
															<div class="kt-radio-inline mb-2">
																<label class="kt-radio">
																	<input type="radio" name="other_ans" id="other_ans" value="Yes"> Yes 
																	<span></span>
																</label>
																<label class="kt-radio">
																	<input type="radio" name="other_ans" checked  id="other_ans1" value="No"> No
																	<span></span>
																</label>
															</div>
														
															<textarea class="form-control" name="moreinfo"  id="moreinfo"> </textarea>
															<span class="form-text text-muted"></span>
														</div>
														<div class="form-group">
															<label>Educational Level</label>
																<select name="edu_level" id="edu_level" class="form-control">
																	<option value="">Select</option>
																	<option value="SRP">SRP</option>
																	<option value="SPM">SPM</option>
																	<option value="STPM">STPM</option>
																	<option value="UNI">University/College</option>
																</select>
															<span class="form-text text-muted"></span>
														</div>
														</div>
													</div>
												</div>

												<!--end: Form Wizard Step 4-->

												<!--begin: Form Wizard Step 5-->
												<div class="kt-wizard-v2__content" data-ktwizard-type="step-content">
													<div class="kt-heading kt-heading--md">Nominee Beneficiery</div>
													<div class="kt-form__section kt-form__section--first">
														<div class="kt-wizard-v2__form">
															<div class="form-group">
															<label>Nominee Name</label>
															<input type="text" class="form-control" name="nominee_name" >
															<span class="form-text text-muted"></span>
														</div>
														<div class="row">
															<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
																<div class="form-group">
																	<label>NRIC No/ No. KP</label>
																	<input type="text" class="form-control" name="nric_no"  >
																	<span class="form-text text-muted"></span>
																</div>
															</div>
															<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
																<div class="form-group">
																	<label>Old NRIC No/ No. KP Lama</label>
																	<input type="text" class="form-control" name="oldnric_no"  >
																	<span class="form-text text-muted"></span>
																</div>
															</div>
														</div>
														<div class="form-group">
															<label>Is your spouse or immediate family member was an Consultant OR Staff with MYANGKASAEMAS MEDICARE SDN BHD (MAEB),If yes please give details.</label>
															<div class="kt-radio-inline mb-2">
																<label class="kt-radio">
																	<input type="radio" name="answer2" id="answer2" value="Yes"> Yes 
																	<span></span>
																</label>
																<label class="kt-radio">
																	<input type="radio" name="answer2" id="answer21" checked value="No"> No
																	<span></span>
																</label>
															</div>
															
															<textarea class="form-control" name="moreinfo2" id="moreinfo2" > </textarea>
															<span class="form-text text-muted"></span>
															
														</div>	
														</div>
													</div>
												</div>

												<!--end: Form Wizard Step 5-->

												<!--begin: Form Wizard Step 6-->
												<div class="kt-wizard-v2__content" data-ktwizard-type="step-content">
													<div class="kt-heading kt-heading--md">Bank Details</div>
													<div class="kt-form__section kt-form__section--first">
														<div class="kt-wizard-v2__review">
															<div class="row">
															<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
																<div class="form-group">
																	<label>Bank Name</label>
																	
																	
																	
														<select name="agent_bank_name" id="agent_bank_name" class="form-control">
																		<option value="">Select</option>
																	</select>
														<span class="form-text text-muted"></span>
													
																	
																	
																</div>
															</div>
															
															<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
																<div class="form-group">
																	<label>Bank Code:</label>
																	<input type="text" class="form-control"name="agent_bank_bcode"  id ="agent_bank_bcode" readonly >
																
																	<span class="form-text text-muted"></span>
																</div>
															</div>
															
														</div>
														<div class="row">
															<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
																<div class="form-group">
																	<label>Account Number</label>
																	<input type="text" class="form-control" name="agent_bank_ac_no" >
																	<span class="form-text text-muted"></span>
																</div>
															</div>
														
														
														<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
														<div class="form-group">
															<label>Name Of Account Holder</label>
															<input type="text" class="form-control" name="agent_bank_accountname" id="agent_bank_accountname">
															<span class="form-text text-muted"></span>
														</div>
														
														</div>
															</div>
													<div class="row">
													
													<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12"> 
													<label>NRIC Front page</label>
														<div class="form-group">
														
													<input type="file" name="agent_ic_copy" id ="agent_ic_copy"/><br>
												
													</center>
														</div>
														
															<label>NRIC Back page</label>
														<div class="form-group">
														
													<input type="file" name="agent_ic_copy1" id ="agent_ic_copy1"/><br>
												
													</center>
														</div>
														
															<label>NRIC with selfie</label>
														<div class="form-group">
														
													<input type="file" name="agent_ic_copy2" id ="agent_ic_copy2"/><br>
												
													</center>
														</div>
														
															<label>Others</label>
														<div class="form-group">
														
													<input type="file" name="agent_others" id ="agent_others"/><br>
												
													</center>
														</div>
													</div>
													
													
													
													<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12"> 
														<div class="form-group">
														<center><button type="button" class="btn btn-bold btn-label-brand btn-sm" data-toggle="modal" data-target="#kt_modal_1"> Signature</button>
													<input type="hidden" name="agent_sign" id ="agent_sign"/><br>
													<img  id="sign_imag" >
													</center>
														</div>
													</div>
													
													</div>
														</div>
													</div>
												</div>

												<!--end: Form Wizard Step 6-->

												<!--begin: Form Actions -->
												<div class="kt-form__actions">
													<button class="btn btn-secondary btn-md btn-tall btn-wide kt-font-bold kt-font-transform-u" data-ktwizard-type="action-prev">
														Previous
													</button>
													<button class="btn btn-success btn-md btn-tall btn-wide kt-font-bold kt-font-transform-u" data-ktwizard-type="action-submit">
														Submit
													</button>
													<button class="btn btn-brand btn-md btn-tall btn-wide kt-font-bold kt-font-transform-u" data-ktwizard-type="action-next">
														Next Step
													</button>
												</div>

												<!--end: Form Actions -->
											</form>

											<!--end: Form Wizard Form-->
										</div>
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
	
	<!-- The Modal  Start -->
 <?php //$this->load->view('agentform'); ?>
	 <?php //$this->load->view('agenteditform'); ?>						
  <!-- The Modal  End -->
  
  <!--begin::Modal-->
							<?php $this->load->view("signform");?>
							<!--end::Modal-->


	
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
	<script src="<?php echo base_url();?>assets/js/addagent.js?v=<?php echo date("ymdhmi");?>" type="text/javascript"></script>
	
	<script src="https://cdn.jsdelivr.net/npm/signature_pad@2.3.2/dist/signature_pad.min.js"></script>
	<script src="<?php echo base_url();?>assets/js2/agentsign.js?v=<?php echo date("ymdhmi");?>"></script>
	
	<!--end::Page Scripts -->
	
	</body>
	
	<!-- end::Body -->

</html>