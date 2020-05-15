<!DOCTYPE html>


<html lang="en">
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


					<!-- end:: Header -->
					<div class="kt-content  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" id="kt_content">
				

						<!-- begin:: Content -->
						<div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid" style="padding-top: 10px;">

<div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
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
																<i class="flaticon2-writing"></i>
															</div>
															
															<input type="hidden" id="mem_id" value="<?php echo $id ?>" />
															<div class="kt-wizard-v2__nav-label">
																<div class="kt-wizard-v2__nav-label-title">
																	SECTION A 
																</div>
																<div class="kt-wizard-v2__nav-label-desc">
																DETAILS OF PROPOSER / BUTIR-BUTIR PENCADANG
																</div>
															</div>
														</div>
													</div>
													<div class="kt-wizard-v2__nav-item" data-ktwizard-type="step">
														<div class="kt-wizard-v2__nav-body">
															<div class="kt-wizard-v2__nav-icon">
																<i class="flaticon2-writing"></i>
															</div>
															<div class="kt-wizard-v2__nav-label">
																<div class="kt-wizard-v2__nav-label-title">
																	SECTION B
																</div>
																<div class="kt-wizard-v2__nav-label-desc">
																 PRIMARY DETAILS / BUTIR-BUTIR AHLI UTAMA
																</div>
															</div>
														</div>
													</div>
													<div class="kt-wizard-v2__nav-item" href="#" data-ktwizard-type="step">
														<div class="kt-wizard-v2__nav-body">
															<div class="kt-wizard-v2__nav-icon">
																<i class="flaticon2-writing"></i>
															</div>
															<div class="kt-wizard-v2__nav-label">
																<div class="kt-wizard-v2__nav-label-title">
																	SECTION C 
																</div>
																<div class="kt-wizard-v2__nav-label-desc">
																	MEMBERSHIP PACKAGE / PAKEJ KEAHLIAN
																</div>
															</div>
														</div>
													</div>
													<div class="kt-wizard-v2__nav-item" data-ktwizard-type="step">
														<div class="kt-wizard-v2__nav-body">
															<div class="kt-wizard-v2__nav-icon">
																<i class="flaticon2-writing"></i>
															</div>
															<div class="kt-wizard-v2__nav-label">
																<div class="kt-wizard-v2__nav-label-title">
																	SECTION D
																</div>
																<div class="kt-wizard-v2__nav-label-desc">
																	QUESTIONNAIRE / SOAL SELIDIK
																</div>
															</div>
														</div>
													</div>
													
													<div class="kt-wizard-v2__nav-item" data-ktwizard-type="step">
														<div class="kt-wizard-v2__nav-body">
															<div class="kt-wizard-v2__nav-icon">
																<i class="flaticon2-writing"></i>
															</div>
															<div class="kt-wizard-v2__nav-label">
																<div class="kt-wizard-v2__nav-label-title">
																	SECTION E
																</div>
																<div class="kt-wizard-v2__nav-label-desc">
																	NOMINEE DETAILS / BUTIR-BUTIR WARIS
																</div>
															</div>
														</div>
													</div>
													<div class="kt-wizard-v2__nav-item" data-ktwizard-type="step">
														<div class="kt-wizard-v2__nav-body">
															<div class="kt-wizard-v2__nav-icon">
																<i class="flaticon2-writing"></i>
															</div>
															<div class="kt-wizard-v2__nav-label">
																<div class="kt-wizard-v2__nav-label-title">
																	SECTION F
																</div>
																<div class="kt-wizard-v2__nav-label-desc">
																	DECLARATION / PENGAKUAN
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
										
											
										<?php echo form_open_multipart(base_url()."Formsubmission/form_update/".$id."/?token=".$token."_".$mytoken,array('id'=>'kt_form','class'=>'kt-form kt-form--label-right','method'=>'post')); ?>	

												<!--begin: Form Wizard Step 1-->
												<div class="kt-wizard-v2__content" data-ktwizard-type="step-content" data-ktwizard-state="current">
													<div class="kt-heading kt-heading--md">DETAILS OF PROPOSER / BUTIR-BUTIR PENCADANG</div>
													<div class="kt-form__section kt-form__section--first">
														<div class="kt-wizard-v2__form">
															<div class="form-group">
														<label class="form-control-label">Membership Type: <span style="color: red;">*</span></label>
														<select class="form-control" data-size="5" data-live-search="true" id="membership_type" name="membership_type">
															<option value="">Select</option>
															<option value="PRINCIPAL">PRINCIPAL</option>
															<option value="SPOUSE">SPOUSE</option>
															<option value="DEPENDANT">DEPENDANT</option>
															<option value="BOD">BOARD OF DIRECTOR</option>
															</select>
																
															</div>
													
															<div class="row">

																<div class="col-xl-6">
																	<div class="form-group">
																		<label>Name (as in NRIC / Passport / Name (seperti dalam K.P. / Pasport): <span style="color: red;">*</span></label>
														<input type="text" class="form-control"  name="members_name" id="members_name" oninput="this.value = this.value.toUpperCase()">
														<span class="form-text text-muted"></span>
																	</div>
																</div>
																<div class="col-xl-6">
																	<div class="form-group">
																		<label>New NRIC / Passport No / No. K.P. Baru / Pasport: <span style="color: red;">*</span></label>
														<input type="text" class="form-control"  name="nric_no" id="nric_no" oninput="this.value = this.value.toUpperCase()">
														<span class="form-text text-muted"></span>
																	</div>
																</div>

															</div>
															
															
																								<div class="row">

	<div class="col-xl-3">
																	<div class="form-group">
																		<label>Gender / Jantina: <span style="color: red;">*</span></label>
														<select class="form-control " data-size="5" data-live-search="true" name="gender" id="gender"  >
															<option value=""></option>
															<option value="Male">Male / Lelaki</option>
															<option value="Female">Female / Perempuan</option>
															</select>
																	</div>
																</div>
																
																
																<div class="col-xl-3">
																	<div class="form-group">
																		<label>Nationality / Warganegara: <span style="color: red;">*</span></label>
														<select class="form-control " data-size="5" data-live-search="true" id="nationality" name="nationality">
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
																<div class="col-xl-6">
																	<div class="form-group">
																		<label>Address 1 / Alamat 1:<span style="color: red;">*</span></label>
														<input type="text" class="form-control" name="address1" id="address1" oninput="this.value = this.value.toUpperCase()">
														<span class="form-text text-muted"></span>
																	</div>
																</div>

															</div>
															
															
															
															<div class="row">

																<div class="col-xl-3">
																	<div class="form-group">
																		<label>Address 2 / Alamat 2: </label>
														<input type="text" class="form-control" name="address2" oninput="this.value = this.value.toUpperCase()">
																	</div>
																</div>
																<div class="col-xl-3">
																	<div class="form-group">
																		<label>Address 3 / Alamat 3: </label>
														<input type="text" class="form-control" name="address3" oninput="this.value = this.value.toUpperCase()">
																	</div>
																</div>
																
																	<div class="col-xl-3">
																	<div class="form-group">
																			<label>City / Bandar: <span style="color: red;">*</span></label>
														<input type="text" class="form-control" name="city" id="city" oninput="this.value = this.value.toUpperCase()">
													<span class="form-text text-muted"></span>
																	</div>
																</div>
																<div class="col-xl-3">
																	<div class="form-group">
																		<label>State / Negeri: <span style="color: red;">*</span></label>
														
															<select class="form-control " data-size="5" data-live-search="true" id="state" name="state">
																			<option value="">Select</option>
																			<option value="JOHOR">JOHOR</option>
																			<option value="KEDAH">KEDAH</option>
																			<option value=" WILAYAH PERSEKUTUAN KUALA LUMPUR"> WILAYAH PERSEKUTUAN KUALA LUMPUR</option>
																			<option value="LABUAN">LABUAN</option>
																			<option value="NEGERI SEMBILAN">NEGERI SEMBILAN</option>
																			<option value="PAHANG">PAHANG</option>
																			<option value="PERAK">PERAK</option>
																				<option value="PERLIS">PERLIS</option>
																					<option value="PENANG">PENANG</option>
																						<option value="SABAH">SABAH</option>
																						<option value="SARAWAK">SARAWAK</option>
																						<option value="KELANTAN">KELANTAN</option>
																						<option value="SELANGOR">SELANGOR</option>
																						<option value="TERENGGANU">TERENGGANU</option>
																						<option value="WILAYAH PERSEKUTUAN PUTRAJAYA">WILAYAH PERSEKUTUAN PUTRAJAYA</option>
																						
																						
																	</select>
														
														
																</div>

															</div>
																
																

															</div>
															

		
															<div class="row">

																												

															<div class="col-xl-3">
																	<div class="form-group">
																			<label>Postcode / Poskod: <span style="color: red;">*</span></label>
														<input type="text" class="form-control" name="postcode" id="postcode" oninput="this.value = this.value.toUpperCase()">
														<span class="form-text text-muted"></span>
																	</div>
																</div>
																
																
																<div class="col-xl-3">
																
																<div class="form-group">
																<label>Country / Negara: <span style="color: red;">*</span></label>
														<select class="form-control " data-size="5" data-live-search="true" id="country" name="country">
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



																	<div class="col-xl-3">
																	<div class="form-group">
																			<label>Telephone No / No. Telefon: <span style="color: red;">*</span></label>
														<input type="text" class="form-control" name="home_office_phone_no" id="home_office_phone_no" oninput="this.value = this.value.toUpperCase()">
												
														<span class="form-text text-muted"></span>
																	</div>
																</div>
																
																
																
																	<div class="col-xl-3">
																	<div class="form-group">
																			<label>Mobile Phone / Telefon Bimbit: <span style="color: red;">*</span></label>
														<input type="text" class="form-control" name="mobile_phone_no" id="mobile_phone_no" oninput="this.value = this.value.toUpperCase()">
													<span class="form-text text-muted"></span>
												
																	</div>
																</div>
																

</div>

												
													<div class="row">

																<div class="col-xl-4">
																	<div class="form-group">
																		<label>Email / Emel: <span style="color: red;">*</span></label>
														<input type="text" class="form-control" name="email" id="email">
													<span class="form-text text-muted"></span>
																	</div>
																</div>
																
																<div class="col-xl-2">
																	<div class="form-group">
																		<label>Age: <span style="color: red;">*</span></label>
														<input type="text" class="form-control" id="age" readonly    name="age"  />
																	</div>
																</div>
																
																<div class="col-xl-3">
																	<div class="form-group">
																		<label>Date of Birth / Tarikh Lahir: <span style="color: red;">*</span></label>
														<input type="date" class="form-control" id="date_of_birth" readonly   placeholder="Select date" name="date_of_birth"  />
																	</div>
																</div>
															<div class="col-xl-3">
													<label>Race / Bangsa: <span style="color: red;">*</span></label>
														<select class="form-control " data-size="5" data-live-search="true" name="race" id="race">
															<option value=""></option>
															<option value="Malay">Malay / Melayu</option>
															<option value="Chinese">Chinese / Cina</option>
															<option value="Indian">Indian / India</option>
															<option value="Others">Others / Lain-lain</option>
															<option value="Iban">Iban</option>
															<option value="Bidayuh">Bidayuh</option>
															<option value="Kadazan-Dusun">Kadazan-Dusun</option>
															<option value="Bajau">Bajau</option>
															</select>
														
													</div>	
		
															</div>
															

			<div class="row">

															
																
																
																<div class="col-xl-3">
																
																<label>Marital Status / Taraf Perkahwinan: <span style="color: red;">*</span></label>
														<select class="form-control " data-size="5" data-live-search="true" name="marital_status" id="marital_status">
															<option value=""></option>
															<option value="Single">Single / Bujang</option>
															<option value="Married">Married / Kahwin</option>
															<option value="Divoced">Divoced / Bercerai</option>
															<option value="Widow">Widow / Balu</option>
															<option value="Widower">Widower / Duda</option>
														
															</select>
																
																</div>
															<div class="col-xl-3">
														<label>Occupation:<span style="color: red;">*</span></label>
														<input type="text" class="form-control" name="occupation" id="occupation">
														<span class="form-text text-muted"></span>
														
													</div>	
													
													<div class="col-xl-3">
																<div id="healthfile">
																<div class="kt-wizard-v2__review-content">
																	<div class="form-group">
													<label>Upload Health Document <span style="color: red;">*</span></label>
													<div></div>
													<input type="text" class="form-control" name="attachment2" id="attachment2" disabled>
													
													<div class="custom-file">
														<input type="file" name="attachment2" class="custom-file-input" id="customFile1">
														<label class="custom-file-label selected" for="customFile"></label>
													</div>
												</div>
																</div>
																</div>
															</div>
													
													<div class="col-xl-6">
													
														<label>	Health Declaration: <span style="color: red;">*</span></label>
														<textarea class="form-control" name="health_declaration"  id="health_declaration" data-provide="" rows="2"></textarea>
														<span class="form-text text-muted"></span>
														</div>
														
														
														 <div class="col-xl-6">
																<div class="form-group">
																	<label>Are you a cooperative member <span style="color: red;">*</span></label>
																	<div class="kt-radio-inline">
																		<label class="kt-radio">
																			<input type="radio" value="Yes" id="member_coop" checked name="member_coop"> Yes 
																			<span></span>
																		</label>
																		<label class="kt-radio">
																			<input type="radio" value="No" id="member_coop1" name="member_coop"> No
																			<span></span>
																		</label>
																	</div>
																	<span class="form-text text-muted"></span>
																</div>
																</div>
		
															</div>

															
															
															
														</div>
													</div>
												</div>

												<!--end: Form Wizard Step 1-->

												<!--begin: Form Wizard Step 2-->
												<div class="kt-wizard-v2__content" data-ktwizard-type="step-content">
													<div class="kt-heading kt-heading--md">SECTION B: PRIMARY DETAILS / BUTIR-BUTIR AHLI UTAMA</div>
													<div class="kt-form__section kt-form__section--first">
														<div class="kt-wizard-v2__form">
															<div class="row">
																<div class="col-xl-6">
																	<div class="form-group">
																	<label>Name (as in NRIC / Passport / Name (seperti dalam K.P. / Pasport): <span style="color: red;">*</span></label>
														<input type="text" class="form-control" id="primary_name" name="primary_name" oninput="this.value = this.value.toUpperCase()">
														<span class="form-text text-muted"></span>
																	</div>
																</div>
																<div class="col-xl-6">
																	<div class="form-group">
																		<label>New NRIC / Passport No / No. K.P. Baru / Pasport: <span style="color: red;">*</span></label>
														<input type="text" class="form-control" id="primary_nirc" name="primary_nirc" oninput="this.value = this.value.toUpperCase()">
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
													<div class="kt-heading kt-heading--md">SECTION C : MEMBERSHIP PACKAGE / PAKEJ KEAHLIAN</div>
													<div class="kt-form__section kt-form__section--first">
														
															<div class="kt-wizard-v2__form">
															<div class="row">
																<div class="col-xl-6">
																	<div class="form-group">
																	<label>
																	Type of membership package  / Jenis pakej keahlian
																	</label>
													
																	</div>
																</div>
																<div class="col-xl-6">
																	<div class="form-group">
																	Individual / individu
																		<label class="kt-checkbox">
															
															<input type="checkbox" checked="checked" disabled>  RM1980
															<span></span>
														</label>
																		
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
													<div class="kt-heading kt-heading--md">SECTION D: QUESTIONNAIRE / SOAL SELIDIK</div>
													<div class="kt-form__section kt-form__section--first">
														<div class="kt-wizard-v2__form">
															<div class="row">
																<div class="col-xl-12">
													
													
													<div class="form-group">
													<label> <span class="kt-badge kt-badge--warning kt-badge--lg">1</span> Does the person to be covered have any deformity or illness? /
													Adakah orang yang dilindungi mempunyai sebarang kecacatan atau penyakit?
													</label>
													<br>	
													<br>
													<div class="kt-radio-inline" align = "right">
													
													<input type="hidden" name="q1" value="Does the person to be covered have any deformity or illness? /
													Adakah orang yang dilindungi mempunyai sebarang kecacatan atau penyakit?" />
													
														<label class="kt-radio">
															<input type="radio" name="qus1"   value="Yes"> Yes / Ya
															<span></span>
														</label>
														<label class="kt-radio">
															<input type="radio" name="qus1" checked value="No"> No / Tidak
															<span></span>
														</label>
													<input type="text" class="form-control" name="ans1" id="ans1" >	
													</div>
													
												</div>
												
									<div class="kt-separator kt-separator--space-lg kt-separator--border-dashed"></div>				
														<div class="form-group">
														
													<label><span class="kt-badge kt-badge--warning kt-badge--lg">2</span>
													 Has the person to be covered ever undergone any surgical operation? /
Pernahkah orang yang dilindungi mengalami sebarang pembedahan?
													</label>
													<br>	
													<br>
													<div class="kt-radio-inline" align = "right">
													<input type="hidden" name="q2" value="Has the person to be covered ever undergone any surgical operation? /
Pernahkah orang yang dilindungi mengalami sebarang pembedahan?" />
													
													
														<label class="kt-radio">
															<input type="radio" name="qus2" value="Yes"> Yes / Ya
															<span></span>
														</label>
														<label class="kt-radio">
															<input type="radio" name="qus2"  value="No" checked> No / Tidak
															<span></span>
														</label>
													<input type="text" class="form-control" name="ans2" id="ans2" >	
													</div>
													
												</div>
												
										<div class="kt-separator kt-separator--space-lg kt-separator--border-dashed"></div>			
												
														<div class="form-group">
													<label>
													<div>
													<span class="kt-badge kt-badge--warning kt-badge--lg">3</span>
													Has the person to be covered ever been hospitalised for any illness or injury? /
													</div>
													<div>
Pernahkah orang yang dilindungi dimasukkan ke hospital untuk sebarang penyakit atau kecederaan?
													</div>
													</label>
													<br>	
													<br>
													<div class="kt-radio-inline" align="right">
													
													<input type="hidden" name="q3" value="Has the person to be covered ever been hospitalised for any illness or injury? /
	Pernahkah orang yang dilindungi dimasukkan ke hospital untuk sebarang penyakit atau kecederaan?" />
														<label class="kt-radio">
															<input type="radio" name="qus3" value="Yes"> Yes / Ya
															<span></span>
														</label>
														<label class="kt-radio">
															<input type="radio" name="qus3" checked value="No"> No / Tidak
															<span></span>
														</label>
													<input type="text" class="form-control" name="ans3" id="ans3" >	
													</div>
													
												</div>
													<div class="kt-separator kt-separator--space-lg kt-separator--border-dashed"></div>
												
														<div class="form-group">
														
													<label> <div><span class="kt-badge kt-badge--warning kt-badge--lg">4</span>
													
													Is the person to covered currently under medication or supervision of a doctor or physician for any illness or disability? /
													</div>
													<div>
Adakah orang yang dilindungi sedang mengambil ubat atau diawasi oleh doktor untuk sebarang penyakit atatu kecacatan?</div>
													</label>
													<br>
													<br>
													
													<div class="kt-radio-inline" align="right">
													<input type="hidden" name="q4" value="Is the person to covered currently under medication or supervision of a doctor or physician for any illness or disability? /
Adakah orang yang dilindungi sedang mengambil ubat atau diawasi oleh doktor untuk sebarang penyakit atatu kecacatan?" />
														<label class="kt-radio">
															<input type="radio" name="qus4" value="Yes"> Yes / Ya
															<span></span>
														</label>
														<label class="kt-radio">
															<input type="radio" name="qus4" value="No" checked> No / Tidak
															<span></span>
														</label>
													<input type="text" class="form-control" name="ans4" id="ans4">	
													</div>
													
												</div>
													<div class="kt-separator kt-separator--space-lg kt-separator--border-dashed"></div>
												
														<div class="form-group">
													<label><div>
													<span class="kt-badge kt-badge--warning kt-badge--lg">5</span>
													Has the person to be covered ever been advised to have a surgical operation which has yet to be performed? /
													<div>
													</div>
Pernahkah orang yang dilindungi dinashihatkan supaya menjalani pembedahan yang belum lagi dilaksanakan?</div>
													</label>
													<br>
													<br>
													
													<div class="kt-radio-inline" align="left">
													<input type="hidden" name="q5" value="Has the person to be covered ever been advised to have a surgical operation which has yet to be performed? /
Pernahkah orang yang dilindungi dinashihatkan supaya menjalani pembedahan yang belum lagi dilaksanakan?" />
														<label class="kt-radio">
															<input type="radio" name="qus5" value="Yes"> Yes / Ya
															<span></span>
														</label>
														<label class="kt-radio">
															<input type="radio" name="qus5" value="No" checked> No / Tidak
															<span></span>
														</label>
													<input type="text" class="form-control" name="ans5"  id="ans5">	
													</div>
													
												</div>
												
													<div class="kt-separator kt-separator--space-lg kt-separator--border-dashed"></div>
														
														<div class="form-group">
													<label><div> <span class="kt-badge kt-badge--warning kt-badge--lg">6</span>
													Is the person to be covered a carrier of any condition, such as hepatitis, etc.. ? /</div>
													<div>
Adakah orang Yang Dilindungi pembawa sebarang penyakit, seperti hepatitis, dil..?</div>
													</label>
													<br>
													<br>
													<div class="kt-radio-inline" align="right">
													<input type="hidden" name="q6" value="Is the person to be covered a carrier of any condition, such as hepatitis, etc.. ? /
Adakah orang Yang Dilindungi pembawa sebarang penyakit, seperti hepatitis, dil..?" />
														<label class="kt-radio">
															<input type="radio" name="qus6" value="Yes"> Yes / Ya
															<span></span>
														</label>
														<label class="kt-radio">
															<input type="radio" name="qus6" value="No" checked> No / Tidak
															<span></span>
														</label>
													<input type="text" class="form-control" name="ans6" id="ans6" >	
													</div>
													
												</div>
										
	<div class="kt-separator kt-separator--space-lg kt-separator--border-dashed"></div>										

													<div class="form-group">
													<label>
													<div>
													<span class="kt-badge kt-badge--warning kt-badge--lg">7</span>
													Has the person to be covered ever had an application for or renewal of health insurance /
													
takaful certificate declined or accepted at other than normal terms?  </div> <br><div>
Pernahkah permohonan insurans / takaful kesihatan atau pembaharuan sijil kesihatan untuk
orang yang akan dilindungi ditolak atau diterima dengan terma yang luar biasa?</div>
													</label>
													<br>
													<br>
													<div class="kt-radio-inline" align="right">
													<input type="hidden" name="q7" value="Has the person to be covered ever had an application for or renewal of health insurance /
takaful certificate declined or accepted at other than normal terms? 
Pernahkah permohonan insurans / takaful kesihatan atau pembaharuan sijil kesihatan untuk
orang yang akan dilindungi ditolak atau diterima dengan terma yang luar biasa?" />
														<label class="kt-radio">
															<input type="radio" name="qus7" value="Yes"> Yes / Ya
															<span></span>
														</label>
														<label class="kt-radio">
															<input type="radio" name="qus7" value="No" checked> No / Tidak
															<span></span>
														</label>
													<input type="text" class="form-control" name="ans7" id="ans7" >	
													</div>
													
												</div>												
	<div class="kt-separator kt-separator--space-lg kt-separator--border-dashed"></div>

								<div class="form-group">
													<label> <div> <span class="kt-badge kt-badge--warning kt-badge--lg">8</span>
												Is the person to be covered currently covered under any other health insurance / takaful certificate? </div><br><div>
Adakah orang yang akan dilindungi kini dilindungi dengan lain-lain insurans kesihatan / Sijil takeful?</div>
													</label>
													<br>
													<br>
													
													<div class="kt-radio-inline" align="right">
													<input type="hidden" name="q8" value="Is the person to be covered currently covered under any other health insurance / takaful certificate? <br>
Adakah orang yang akan dilindungi kini dilindungi dengan lain-lain insurans kesihatan / Sijil takeful?" />
														<label class="kt-radio">
															<input type="radio" name="qus8" value="Yes"> Yes / Ya
															<span></span>
														</label>
														<label class="kt-radio">
															<input type="radio" name="qus8" value="No" checked> No / Tidak
															<span></span>
														</label>
													<input type="text" class="form-control" name="ans8" id="ans8" >	
													</div>
													
												</div>	

		<div class="kt-separator kt-separator--space-lg kt-separator--border-dashed"></div>		
												
																</div>
																
															</div>
															
																<div class="row">
																	<h5> My usual doctor is / Doktor biasa saya adalah<span style="color: red;"></span></h5>
																</div>
															
															
														
																<div class="row">
																
																<div class="col-xl-4">
																
																	<div class="form-group">
																	<label>Name /  Nama:<span style="color: red;"></span></label>
														<input type="text" class="form-control" id="doctor_name" name="doctor_name" oninput="this.value = this.value.toUpperCase()">
														<span class="form-text text-muted"></span>
																	</div>
																</div>
																<div class="col-xl-4">
																	<div class="form-group">
																		<label>Address / Alamat:<span style="color: red;"></span></label>
														<input type="text" class="form-control" id="doctor_address1" name="doctor_address1" oninput="this.value = this.value.toUpperCase()">
														<span class="form-text text-muted"></span>
																	</div>
																</div>
																<div class="col-xl-4">
																	<div class="form-group">
																		<label>Telephone No / No. Telefon. <span style="color: red;"></span></label>
														<input type="text" class="form-control" id="doctor_phone" name="doctor_phone" oninput="this.value = this.value.toUpperCase()">
														<span class="form-text text-muted"></span>
																	</div>
																</div>
																
																
															</div>
															
															
															
														</div>
													</div>
												</div>

												<!--end: Form Wizard Step 4-->

												<!--begin: Form Wizard Step 5-->
												<div class="kt-wizard-v2__content" data-ktwizard-type="step-content">
													<div class="kt-heading kt-heading--md">NOMINEE DETAILS / BUTIR-BUTIR WARIS</div>
													<div class="kt-form__section kt-form__section--first">
														<div class="kt-wizard-v2__form">
														
<div class="row">
																	<h5> NOMINEE 1:-</h5>
																</div>
															

														<div class="row">
																<div class="col-xl-6">
																	<div class="form-group">
																		<label>Name (as in NRIC) / Name (seperti dalam K.P): <span style="color: red;">*</span></label>
																		<input type="text" class="form-control" name="nominee_name" id="nominee_name"  oninput="this.value = this.value.toUpperCase()">
																		<span class="form-text text-muted"></span>
																	</div>
																</div>
																<div class="col-xl-6">
																	<div class="form-group">
																		<label>NRIC No / No. K.P. :<span style="color: red;">*</span></label>
																		<input type="text" class="form-control" name="nominee_nric" id="nominee_nric" >
																		<span class="form-text text-muted"></span>
																	</div>
																</div>
															</div>
															
															<div class="row">
																<div class="col-xl-6">
																	<div class="form-group">
																		<label>Address / Alamat :<span style="color: red;">*</span></label>
																		<input type="text" class="form-control" name="nominee_address" id="nominee_address" oninput="this.value = this.value.toUpperCase()">
																		<span class="form-text text-muted"></span>
																	</div>
																</div>
																<div class="col-xl-6">
																	<div class="form-group">
																		<label>Postcode / Poskod :<span style="color: red;">*</span></label>
																		<input type="text" class="form-control" name="nominee_postcode" id="nominee_postcode"  >
																		<span class="form-text text-muted"></span>
																	</div>
																</div>
															</div>
															
																<div class="row">
																<div class="col-xl-6">
																	<div class="form-group">
																		<label>Relationship / Perhubungan : <span style="color: red;">*</span></label>
																		<input type="text" class="form-control" name="nominee_relationship" id="nominee_relationship" oninput="this.value = this.value.toUpperCase()" >
																		<span class="form-text text-muted"></span>
																	</div>
																</div>
																<div class="col-xl-6">
																	<div class="form-group">
																		<label>% of Share / Perkongsian :<span style="color: red;">*</span></label>
																		<input type="number" class="form-control" name="nominee_share"  id="nominee_share" placeholder="">
																		<span class="form-text text-muted"></span>
																	</div>
																</div>
															</div>
															
																<div class="kt-separator kt-separator--space-lg kt-separator--border-dashed"></div>		
																
																
																<div class="row">
																	<h5> NOMINEE 2:-</h5>
																</div>
															

														<div class="row">
																<div class="col-xl-6">
																	<div class="form-group">
																		<label>Name (as in NRIC) / Name (seperti dalam K.P):  </span></label>
																		<input type="text" class="form-control" name="nominee_name1" id="nominee_name1"  oninput="this.value = this.value.toUpperCase()">
																		<span class="form-text text-muted"></span>
																	</div>
																</div>
																<div class="col-xl-6">
																	<div class="form-group">
																		<label>NRIC No / No. K.P. : </label>
																		<input type="text" class="form-control" name="nominee_nric1" id="nominee_nric1" >
																		<span class="form-text text-muted"></span>
																	</div>
																</div>
															</div>
															
															<div class="row">
																<div class="col-xl-6">
																	<div class="form-group">
																		<label>Address / Alamat : </label>
																		<input type="text" class="form-control" name="nominee_address1" id="nominee_address1" oninput="this.value = this.value.toUpperCase()">
																		<span class="form-text text-muted"></span>
																	</div>
																</div>
																<div class="col-xl-6">
																	<div class="form-group">
																		<label>Postcode / Poskod : </label>
																		<input type="text" class="form-control" name="nominee_postcode1" id="nominee_postcode1"  >
																		<span class="form-text text-muted"></span>
																	</div>
																</div>
															</div>
															
																<div class="row">
																<div class="col-xl-6">
																	<div class="form-group">
																		<label>Relationship / Perhubungan : </label>
																		<input type="text" class="form-control" name="nominee_relationship1" id="nominee_relationship1" oninput="this.value = this.value.toUpperCase()" >
																		<span class="form-text text-muted"></span>
																	</div>
																</div>
																<div class="col-xl-6">
																	<div class="form-group">
																		<label>% of Share / Perkongsian : </label>
																		<input type="number" class="form-control" name="nominee_share1"  id="nominee_share1" placeholder="">
																		<span class="form-text text-muted"></span>
																	</div>
																</div>
															</div>
																

<div class="row">
																	<h5> WITNESS :- </h5>
																</div>
																														
															
																<div class="row">
																<div class="col-xl-6">
																	<div class="form-group">
																		<label>Name (as in NRIC) / Name (seperti dalam K.P): <span style="color: red;">*</span></label>
																		<input type="text" class="form-control" name="witness_name" id="witness_name"  oninput="this.value = this.value.toUpperCase()">
																		<span class="form-text text-muted"></span>
																	</div>
																</div>
																<div class="col-xl-6">
																	<div class="form-group">
																		<label>NRIC No / No. K.P. : <span style="color: red;">*</span></label>
																		<input type="text" class="form-control" name="witness_nric" id="witness_nric" >
																		<span class="form-text text-muted"></span>
																	</div>
																</div>
															</div>
															
															
														</div>
													</div>
												</div>

												<!--end: Form Wizard Step 5-->

												<!--begin: Form Wizard Step 6-->
												<div class="kt-wizard-v2__content" data-ktwizard-type="step-content">
													<div class="kt-heading kt-heading--md">DECLARATION / PENGAKUAN</div>
													<div class="kt-form__section kt-form__section--first">
														<div class="kt-wizard-v2__review">
															<div class="kt-wizard-v2__review-item">
																<div class="kt-wizard-v2__review-title">
																	NRIC COPY 
																</div>
																<span style="color: red;">*Max file size should be below 5MB</span>
																<div class="kt-wizard-v2__review-content">
																	<div class="form-group">
													<label>NRIC Front Page</label>
													<div></div>
													<input type="text" class="form-control" name="attachment1" id="attachment1" disabled>
													<div class="custom-file">
														<input type="file" name="attachment1" class="custom-file-input" id="customFile">
														<label class="custom-file-label selected" for="customFile"></label>
													</div>
												</div>
																</div>
																<div class="kt-wizard-v2__review-content">
																	<div class="form-group">
													<label>NRIC Back Page</label>
													<div></div>
													<input type="text" class="form-control" name="nric_upd2" id="nric_upd2" disabled>
													<div class="custom-file">
														<input type="file" name="nric_upd2" class="custom-file-input" id="customFile">
														<label class="custom-file-label selected" for="customFile"></label>
													</div>
												</div>
																</div>
																<div class="kt-wizard-v2__review-content">
																	<div class="form-group">
													<label>NRIC with selfie</label>
													<div></div>
													<input type="text" class="form-control" name="nric_upd3" id="nric_upd3" disabled>
													<div class="custom-file">
														<input type="file" name="nric_upd3" class="custom-file-input" id="customFile">
														<label class="custom-file-label selected" for="customFile"></label>
													</div>
												</div>
																</div>
																<div class="kt-wizard-v2__review-content">
																	<div class="form-group">
													<label>Others</label>
													<div></div>
													<input type="text" class="form-control" name="nric_upd4" id="nric_upd4" disabled>
													<div class="custom-file">
														<input type="file" name="nric_upd4" class="custom-file-input" id="customFile">
														<label class="custom-file-label selected" for="customFile"></label>
													</div>
												</div>
																</div>
															</div>

														
															<div class="kt-wizard-v2__review-item">
																	<div class="kt-wizard-v2__review-title">
																<div class="row">
															<div class="col-lg-6">
															Signature of Proposer / Tandatangan Pencadang
															</div>
															<div class="col-lg-6">
															Signature of Witness / Tandatangan Saksi
															
															</div>
															</div>
																</div>
																
																
																		<div class="kt-wizard-v2__review-content">
																<div class="row">
															<div class="col-lg-6">
														
																<button type="button" class="btn btn-bold btn-label-brand btn-sm" data-toggle="modal" data-target="#kt_modal_1">	Signature of Proposer</button>	
																<input type="hidden" name="sign" id ="mem_sign"/>
													<img id="sign" width="230" height="180">
													
															</div>
															<div class="col-lg-6">
														
																<button type="button" class="btn btn-bold btn-label-brand btn-sm" data-toggle="modal" data-target="#kt_modal_2"> Signature of Witness </button>		
														<input type="hidden" name="witness_sign" id ="mem_sign1"/>
													<img  id="witness_sign" width="230" height="180">
															
															</div>
															</div>
																</div>
																
																
															</div>
															
															<div class="kt-wizard-v2__review-item">
																<div class="kt-wizard-v2__review-title">
																	Payment Method :
																</div>
																<div class="kt-wizard-v2__review-content">
																	<div class="form-group row form-group-marginless">
													<label class="col-lg-2 col-form-label">TYPE:</label>
													<div class="col-lg-10">
														<div class="row">
															<div class="col-lg-6">
																<label class="kt-option">
																	<span class="kt-option__control">
																		<span class="kt-radio kt-radio--bold kt-radio--brand" checked="">
																			<input type="radio" name="payment_type" id ="payment_type" value="Online" disabled>
																			<span></span>
																		</span>
																	</span>
																	<span class="kt-option__label">
																		<span class="kt-option__head">
																			<span class="kt-option__title">
																				Online
																			</span>
																			<span class="kt-option__focus">
																				RM1980.00
																			</span>
																		</span>
																		<span class="kt-option__body">
																			Credit Card, Debit card & Net Banking 
																		</span>
																	</span>
																</label>
															</div>
															<div class="col-lg-6">
																<label class="kt-option">
																	<span class="kt-option__control">
																		<span class="kt-radio kt-radio--bold kt-radio--brand">
																			<input type="radio" name="payment_type" id="payment_type1" value="Banking">
																			<span></span>
																		</span>
																	</span>
																	<span class="kt-option__label">
																		<span class="kt-option__head">
																			<span class="kt-option__title">
																				Offline
																			</span>
																			<span class="kt-option__focus">
																				RM1980.00
																			</span>
																		</span>
																		<span class="kt-option__body">
																			Bank Cash Deposit, Bank Cheque Deposit & Bank Cheque Postal
																		</span>
																	</span>
																</label>
															</div>
														</div>
													</div>
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
														Update
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

					<!-- begin:: Footer -->
					<?php $this->load->view("footer"); ?>

					<!-- end:: Footer -->
				</div>
			</div>
		</div>

		<!-- end:: Page -->

	

		<!-- begin::Scrolltop -->
		<div id="kt_scrolltop" class="kt-scrolltop">
			<i class="fa fa-arrow-up"></i>
		</div>

		<!-- end::Scrolltop -->

<?php $this->load->view("signform");?>
<?php  $this->load->view("signform1");?>

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

		<!--end::Global Theme Bundle -->

		<!--begin::Page Vendors(used by this page) -->
	<script src="<?php echo base_url();?>assets/js/bootstrap-select.js?v=<?php echo date("ymdhmi")?>" type="text/javascript"></script>
	<script src="<?php echo base_url();?>assets/js/typeahead.js?v=<?php echo date("ymdhmi")?>" type="text/javascript"></script>
		<!--end::Page Vendors -->

		<!--begin::Page Scripts(used by this page) -->
		
			<script src="https://cdn.jsdelivr.net/npm/signature_pad@2.3.2/dist/signature_pad.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/editmemberformwz.js?v=<?php echo date("ymdhmi")?>" type="text/javascript"></script>
	<script src="<?php echo base_url();?>assets/js/membersign.js?v=<?php echo date("ymdhmi")?>"></script>

		<!--end::Page Scripts -->
	</body>

	<!-- end::Body -->
</html>