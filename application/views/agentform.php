<div id="adduser" class="modal fade" role="dialog" aria-hidden="true">
								<div class="modal-dialog modal-xl">
									<div class="modal-content" style="min-height: 590px;">
										<div class="modal-header">
											<h5 class="modal-title">
											<span class="kt-portlet__head-icon">
											<i class="kt-font-brand flaticon-users-1	"></i>
										</span>	Add New Consultants
											<!--	<small>local data source</small> -->
											</h5>
											<button type="button" class="close" data-dismiss="modal" aria-label="Close">
												<span aria-hidden="true">&times;</span>
											</button>
										</div>
										<div class="modal-body">
<!--begin::Form-->

<?php echo form_open('#',array('class'=>'kt-form kt-form--label-right','method'=>'post', 'enctype'=>'multipart/form-data')); ?>
										
											<div class="kt-portlet__body">
										<h4 class="kt-portlet__head-title "style="font-size: 1.2rem;">PERSONAL INFORMATION</h4>
												<div class="form-group row form-group-marginless kt-margin-t-10">
												
													<div class="col-lg-3">
													<input type="hidden" name="mytoken" value="" >
													<label>Name (as in NRIC / Name (seperti dalam K.P.): </label>
														<input type="text" class="form-control" id="agent_name" name="agent_name" oninput="this.value = this.value.toUpperCase()">
														
													</div>
													
													<div class="col-lg-3">
													<label>New NRIC / Passport No / No. K.P. Baru / Pasport:</label>
														<input type="text" class="form-control" id="agent_nric_no" name="agent_nric_no">
											
													</div>
													
													<div class="col-lg-3">
													<label>Age / Age:</label>
														<input type="text" class="form-control" id="agent_age" name="agent_age">
														
													</div>
													
													
													<div class="col-lg-3">
													<label>Address 1 / Alamat 1:</label>
														<input type="text" class="form-control" name="agent_address1" id="agent_address1">
													
													</div>
													
												
												</div>
												
												<div class="form-group row form-group-marginless kt-margin-t-5">
												
													<div class="col-lg-3">
													<label>Address 2 / Alamat 2:</label>
														<input type="text" class="form-control" name="agent_address2" id="agent_address2">
														<span class="form-text text-muted"></span>
													</div>
													
													<div class="col-lg-3">
													<label>Address 3 / Alamat 3:</label>
														<input type="text" class="form-control" name="agent_address3" id="agent_address3">
													
													</div>
													
													<div class="col-lg-3">
													<label>City / Bandar:</label>
														<input type="text" class="form-control" name="agent_city" id="agent_city">
													
													</div>
													
													
													<div class="col-lg-3">
													<label>State / Negeri:</label>
														<div class="typeahead">
													<input class="form-control" id="kt_typeahead_1"  type="text" dir="ltr" placeholder="" name="agent_state">
												</div>
													
													</div>
													
												
												</div>
												
												
													<div class="form-group row form-group-marginless kt-margin-t-5">
												
													<div class="col-lg-3">
													<label>Postcode / Poskod:</label>
														<input type="text" class="form-control" name="agent_pincode" id="agent_pincode">
													
													</div>
													
													<div class="col-lg-3">
													<label>Country / Negara:</label>
														<select class="form-control kt-selectpicker" data-size="5" data-live-search="true" id="agent_country" name="agent_country">
															<option value="">Select</option>
															<option value="AF">Afghanistan</option>
															<option value="AX">Åland Islands</option>
															<option value="AL">Albania</option>
															<option value="DZ">Algeria</option>
															<option value="AS">American Samoa</option>
															<option value="AD">Andorra</option>
															<option value="AO">Angola</option>
															<option value="AI">Anguilla</option>
															<option value="AQ">Antarctica</option>
															<option value="AG">Antigua and Barbuda</option>
															<option value="AR">Argentina</option>
															<option value="AM">Armenia</option>
															<option value="AW">Aruba</option>
															<option value="AU">Australia</option>
															<option value="AT">Austria</option>
															<option value="AZ">Azerbaijan</option>
															<option value="BS">Bahamas</option>
															<option value="BH">Bahrain</option>
															<option value="BD">Bangladesh</option>
															<option value="BB">Barbados</option>
															<option value="BY">Belarus</option>
															<option value="BE">Belgium</option>
															<option value="BZ">Belize</option>
															<option value="BJ">Benin</option>
															<option value="BM">Bermuda</option>
															<option value="BT">Bhutan</option>
															<option value="BO">Bolivia, Plurinational State of</option>
															<option value="BQ">Bonaire, Sint Eustatius and Saba</option>
															<option value="BA">Bosnia and Herzegovina</option>
															<option value="BW">Botswana</option>
															<option value="BV">Bouvet Island</option>
															<option value="BR">Brazil</option>
															<option value="IO">British Indian Ocean Territory</option>
															<option value="BN">Brunei Darussalam</option>
															<option value="BG">Bulgaria</option>
															<option value="BF">Burkina Faso</option>
															<option value="BI">Burundi</option>
															<option value="KH">Cambodia</option>
															<option value="CM">Cameroon</option>
															<option value="CA">Canada</option>
															<option value="CV">Cape Verde</option>
															<option value="KY">Cayman Islands</option>
															<option value="CF">Central African Republic</option>
															<option value="TD">Chad</option>
															<option value="CL">Chile</option>
															<option value="CN">China</option>
															<option value="CX">Christmas Island</option>
															<option value="CC">Cocos (Keeling) Islands</option>
															<option value="CO">Colombia</option>
															<option value="KM">Comoros</option>
															<option value="CG">Congo</option>
															<option value="CD">Congo, the Democratic Republic of the</option>
															<option value="CK">Cook Islands</option>
															<option value="CR">Costa Rica</option>
															<option value="CI">Côte d'Ivoire</option>
															<option value="HR">Croatia</option>
															<option value="CU">Cuba</option>
															<option value="CW">Curaçao</option>
															<option value="CY">Cyprus</option>
															<option value="CZ">Czech Republic</option>
															<option value="DK">Denmark</option>
															<option value="DJ">Djibouti</option>
															<option value="DM">Dominica</option>
															<option value="DO">Dominican Republic</option>
															<option value="EC">Ecuador</option>
															<option value="EG">Egypt</option>
															<option value="SV">El Salvador</option>
															<option value="GQ">Equatorial Guinea</option>
															<option value="ER">Eritrea</option>
															<option value="EE">Estonia</option>
															<option value="ET">Ethiopia</option>
															<option value="FK">Falkland Islands (Malvinas)</option>
															<option value="FO">Faroe Islands</option>
															<option value="FJ">Fiji</option>
															<option value="FI">Finland</option>
															<option value="FR">France</option>
															<option value="GF">French Guiana</option>
															<option value="PF">French Polynesia</option>
															<option value="TF">French Southern Territories</option>
															<option value="GA">Gabon</option>
															<option value="GM">Gambia</option>
															<option value="GE">Georgia</option>
															<option value="DE">Germany</option>
															<option value="GH">Ghana</option>
															<option value="GI">Gibraltar</option>
															<option value="GR">Greece</option>
															<option value="GL">Greenland</option>
															<option value="GD">Grenada</option>
															<option value="GP">Guadeloupe</option>
															<option value="GU">Guam</option>
															<option value="GT">Guatemala</option>
															<option value="GG">Guernsey</option>
															<option value="GN">Guinea</option>
															<option value="GW">Guinea-Bissau</option>
															<option value="GY">Guyana</option>
															<option value="HT">Haiti</option>
															<option value="HM">Heard Island and McDonald Islands</option>
															<option value="VA">Holy See (Vatican City State)</option>
															<option value="HN">Honduras</option>
															<option value="HK">Hong Kong</option>
															<option value="HU">Hungary</option>
															<option value="IS">Iceland</option>
															<option value="IN">India</option>
															<option value="ID">Indonesia</option>
															<option value="IR">Iran, Islamic Republic of</option>
															<option value="IQ">Iraq</option>
															<option value="IE">Ireland</option>
															<option value="IM">Isle of Man</option>
															<option value="IL">Israel</option>
															<option value="IT">Italy</option>
															<option value="JM">Jamaica</option>
															<option value="JP">Japan</option>
															<option value="JE">Jersey</option>
															<option value="JO">Jordan</option>
															<option value="KZ">Kazakhstan</option>
															<option value="KE">Kenya</option>
															<option value="KI">Kiribati</option>
															<option value="KP">Korea, Democratic People's Republic of</option>
															<option value="KR">Korea, Republic of</option>
															<option value="KW">Kuwait</option>
															<option value="KG">Kyrgyzstan</option>
															<option value="LA">Lao People's Democratic Republic</option>
															<option value="LV">Latvia</option>
															<option value="LB">Lebanon</option>
															<option value="LS">Lesotho</option>
															<option value="LR">Liberia</option>
															<option value="LY">Libya</option>
															<option value="LI">Liechtenstein</option>
															<option value="LT">Lithuania</option>
															<option value="LU">Luxembourg</option>
															<option value="MO">Macao</option>
															<option value="MK">Macedonia, the former Yugoslav Republic of</option>
															<option value="MG">Madagascar</option>
															<option value="MW">Malawi</option>
															<option value="MY" selected="selected">Malaysia</option>
															<option value="MV">Maldives</option>
															<option value="ML">Mali</option>
															<option value="MT">Malta</option>
															<option value="MH">Marshall Islands</option>
															<option value="MQ">Martinique</option>
															<option value="MR">Mauritania</option>
															<option value="MU">Mauritius</option>
															<option value="YT">Mayotte</option>
															<option value="MX">Mexico</option>
															<option value="FM">Micronesia, Federated States of</option>
															<option value="MD">Moldova, Republic of</option>
															<option value="MC">Monaco</option>
															<option value="MN">Mongolia</option>
															<option value="ME">Montenegro</option>
															<option value="MS">Montserrat</option>
															<option value="MA">Morocco</option>
															<option value="MZ">Mozambique</option>
															<option value="MM">Myanmar</option>
															<option value="NA">Namibia</option>
															<option value="NR">Nauru</option>
															<option value="NP">Nepal</option>
															<option value="NL">Netherlands</option>
															<option value="NC">New Caledonia</option>
															<option value="NZ">New Zealand</option>
															<option value="NI">Nicaragua</option>
															<option value="NE">Niger</option>
															<option value="NG">Nigeria</option>
															<option value="NU">Niue</option>
															<option value="NF">Norfolk Island</option>
															<option value="MP">Northern Mariana Islands</option>
															<option value="NO">Norway</option>
															<option value="OM">Oman</option>
															<option value="PK">Pakistan</option>
															<option value="PW">Palau</option>
															<option value="PS">Palestinian Territory, Occupied</option>
															<option value="PA">Panama</option>
															<option value="PG">Papua New Guinea</option>
															<option value="PY">Paraguay</option>
															<option value="PE">Peru</option>
															<option value="PH">Philippines</option>
															<option value="PN">Pitcairn</option>
															<option value="PL">Poland</option>
															<option value="PT">Portugal</option>
															<option value="PR">Puerto Rico</option>
															<option value="QA">Qatar</option>
															<option value="RE">Réunion</option>
															<option value="RO">Romania</option>
															<option value="RU">Russian Federation</option>
															<option value="RW">Rwanda</option>
															<option value="BL">Saint Barthélemy</option>
															<option value="SH">Saint Helena, Ascension and Tristan da Cunha</option>
															<option value="KN">Saint Kitts and Nevis</option>
															<option value="LC">Saint Lucia</option>
															<option value="MF">Saint Martin (French part)</option>
															<option value="PM">Saint Pierre and Miquelon</option>
															<option value="VC">Saint Vincent and the Grenadines</option>
															<option value="WS">Samoa</option>
															<option value="SM">San Marino</option>
															<option value="ST">Sao Tome and Principe</option>
															<option value="SA">Saudi Arabia</option>
															<option value="SN">Senegal</option>
															<option value="RS">Serbia</option>
															<option value="SC">Seychelles</option>
															<option value="SL">Sierra Leone</option>
															<option value="SG">Singapore</option>
															<option value="SX">Sint Maarten (Dutch part)</option>
															<option value="SK">Slovakia</option>
															<option value="SI">Slovenia</option>
															<option value="SB">Solomon Islands</option>
															<option value="SO">Somalia</option>
															<option value="ZA">South Africa</option>
															<option value="GS">South Georgia and the South Sandwich Islands</option>
															<option value="SS">South Sudan</option>
															<option value="ES">Spain</option>
															<option value="LK">Sri Lanka</option>
															<option value="SD">Sudan</option>
															<option value="SR">Suriname</option>
															<option value="SJ">Svalbard and Jan Mayen</option>
															<option value="SZ">Swaziland</option>
															<option value="SE">Sweden</option>
															<option value="CH">Switzerland</option>
															<option value="SY">Syrian Arab Republic</option>
															<option value="TW">Taiwan, Province of China</option>
															<option value="TJ">Tajikistan</option>
															<option value="TZ">Tanzania, United Republic of</option>
															<option value="TH">Thailand</option>
															<option value="TL">Timor-Leste</option>
															<option value="TG">Togo</option>
															<option value="TK">Tokelau</option>
															<option value="TO">Tonga</option>
															<option value="TT">Trinidad and Tobago</option>
															<option value="TN">Tunisia</option>
															<option value="TR">Turkey</option>
															<option value="TM">Turkmenistan</option>
															<option value="TC">Turks and Caicos Islands</option>
															<option value="TV">Tuvalu</option>
															<option value="UG">Uganda</option>
															<option value="UA">Ukraine</option>
															<option value="AE">United Arab Emirates</option>
															<option value="GB">United Kingdom</option>
															<option value="US">United States</option>
															<option value="UM">United States Minor Outlying Islands</option>
															<option value="UY">Uruguay</option>
															<option value="UZ">Uzbekistan</option>
															<option value="VU">Vanuatu</option>
															<option value="VE">Venezuela, Bolivarian Republic of</option>
															<option value="VN">Viet Nam</option>
															<option value="VG">Virgin Islands, British</option>
															<option value="VI">Virgin Islands, U.S.</option>
															<option value="WF">Wallis and Futuna</option>
															<option value="EH">Western Sahara</option>
															<option value="YE">Yemen</option>
															<option value="ZM">Zambia</option>
															<option value="ZW">Zimbabwe</option>
														</select>
													
													</div>
													
													<div class="col-lg-3">
													<label>Telephone No / No. Telefon:</label>
														<input type="text" class="form-control" name="agent_home_office_no" id="agent_home_office_no">
										
													</div>
													
													
													<div class="col-lg-3">
													<label>Mobile Phone / Telefon Bimbit:</label>
														<input type="text" class="form-control" name="agent_phone_no" id="agent_phone_no">
														
													</div>
													
										
												</div>
												
												
													<div class="form-group row form-group-marginless kt-margin-t-5">
												
													
													
													<div class="col-lg-3">
													<label>Date of Birth / Tarikh Lahir:</label>
														<input type="text" class="form-control" id="kt_datepicker_1" readonly placeholder="Select date" name="agent_dob" id="date_of_birth" />
														
													</div>
													
													<div class="col-lg-3">
													<label>Gender / Jantina:</label>
														<select class="form-control kt-selectpicker" data-size="5" data-live-search="true" name="agent_gender" id="agent_gender" >
															<option value=""></option>
															<option value="Male">Male / Lelaki</option>
															<option value="Female">Female / Perempuan</option>
															</select>
													
													</div>
														<div class="col-lg-3">
													<label>Race / Bangsa:</label>
														<select class="form-control kt-selectpicker" data-size="5" data-live-search="true" name="agent_race" id="agent_race">
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
													
												<div class="col-lg-3">
													<label>Marital Status / Taraf Perkahwinan:</label>
														<select class="form-control kt-selectpicker" data-size="5" data-live-search="true" name="agent_marital_status" id="agent_marital_status">
															<option value=""></option>
															<option value="Single">Single / Bujang</option>
															<option value="Married">Married / Kahwin</option>
															<option value="Divoced">Divoced / Bercerai</option>
															<option value="Widow">Widow / Balu</option>
															<option value="Widower">Widower / Duda</option>
														
															</select>
													
													</div>
													
													
												</div>
												
												
													<div class="form-group row form-group-marginless kt-margin-t-5">
												
												
													
												
													
												
													
														<div class="col-lg-3">
													<label>Category:</label>
														<select class="form-control kt-selectpicker" data-size="5" data-live-search="true" name="agent_level" id="agent_level">
															<option value=""></option>
															<option value="GM">GROUP MANAGER</option>
															<option value="SM">SENIOR MANAGER</option>
															<option value="CS">CONSULTANTS</option>
														
														
															</select>
													
													</div>
													
													
														<div class="col-lg-3">
													<label>Referral:</label>
																			<input type="text" class="form-control" name="agent_intro" id="agent_intro">
														
													</div>

<div class="col-lg-3">
													<label>Email / Emel:</label>
														<input type="text" class="form-control" name="agent_email" id="agent_email">
														
													</div>


<div class="col-lg-3">
													<label>Password / Password:</label>
														<input type="password" class="form-control" name="agent_password" id="agent_password">
														
													</div>



												</div>
												
													
												<div class="kt-separator kt-separator--border-dashed kt-separator--space-lg kt-separator--portlet-fit kt-margin-b-10"></div>
												
												<h4 class="kt-portlet__head-title "style="font-size: 1.2rem;">BANK INFORMATION</h4>
												
							
													<div class="form-group row form-group-marginless kt-margin-t-5">
		
													<div class="col-lg-3">
													<label>Bank Name:</label>
																			<input type="text" class="form-control" name="agent_bank_name" id="agent_bank_name">
														
													</div>
													<div class="col-lg-3">
													<label>Bank A/C No:</label>
																			<input type="text" class="form-control" name="agent_bank_ac_no" id="agent_bank_ac_no">
														
													</div>
														
													<div class="col-lg-3">
													<label >Active Status:</label>
														<div class="kt-radio-inline">
															<label class="kt-radio kt-radio--solid">
																<input type="radio" id="agent_status" name="agent_status"  selected value="1"> Active
																<span></span>
															</label>
															<label class="kt-radio kt-radio--solid">
																<input type="radio"  id="agent_status"  name="agent_status" value="0"> De-Active
																<span></span>
															</label>
														</div>
														<span class="form-text text-muted">Please select user status</span>
													</div>	
												
													
													
													
												</div>
												
												<div class="kt-separator kt-separator--border-dashed kt-separator--space-lg kt-separator--portlet-fit"></div>
												<div class="form-group row form-group-marginless kt-margin-t-10">
												
													
													<div class="col-lg-4">
													<label>Upload KYC Copy:</label>
													<input type="file" class="form-control" name="agent_attachment[]" id="agent_attachment" multiple>
													</div>
													
													
													<div class="col-lg-3">
													<center><button type="button" class="btn btn-bold btn-label-brand btn-sm" data-toggle="modal" data-target="#kt_modal_1"> Signature</button>
													<input type="hidden" name="agent_sign" id ="agent_sign"/>
													<img  id="sign_imag" >
													</center>
													</div>
												

												</div>
												
													
										
		<div class="kt-separator kt-separator--border-dashed kt-separator--space-lg kt-separator--portlet-fit"></div>
											</div>
											<div class="kt-portlet__foot">
												<div class="kt-form__actions">
													<div class="row">
														<div class="col-lg-5"></div>
														<div class="col-lg-7">
															<button type="button" id="newAgent" class="btn btn-brand">Save</button>
															<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
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