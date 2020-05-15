<!DOCTYPE html>
<html lang="en">

<!-- begin::Head -->
<?php  $this->load->view('header'); ?>
<!-- begin::Head -->

	<!-- begin::Body -->
	<body class="kt-quick-panel--right kt-demo-panel--right kt-offcanvas-panel--right kt-header--fixed kt-header-mobile--fixed kt-subheader--enabled kt-subheader--transparent kt-aside--enabled kt-aside--fixed kt-aside--minimize kt-page--loading">
<!-- begin:: Page -->

<!-- begin:: Header Mobile -->
<?php // $this->load->view('mobileheader'); ?>

<!-- end:: Header Mobile -->
	
	
<div class="kt-grid kt-grid--hor kt-grid--root">
		
		<div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--ver kt-page">

<!-- begin:: Aside -->
<?php  // $this->load->view('aside'); ?>
<!-- end:: Aside -->

	<div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor " id="kt_wrapper">

<!-- begin:: Header TopMenu -->
<?php // $this->load->view('headermenu'); ?>
<!-- end:: Header TopMenu-->


<!-- begin:: Main Content Area -->

<div class="kt-content  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" id="kt_content" style="padding-left: 10px;padding-right: 10px;padding-top: 10px;padding-bottom:3px;">

<!-- end:: Subheader -->
<?php // $this->load->view('subheaderform',array("page"=>"New Customers Form")); ?>
<!-- begain:: Subheader -->

<!-- begin:: Content -->
<style>
.kt-portlet .kt-portlet__body {
    display: flex;
    flex-direction: column;
    padding: 25px;
    padding-top: 25px;
    padding-right: 25px;
    padding-bottom: 5px;
    padding-left: 25px;
    border-radius: 4px;
}

.kt-portlet .kt-portlet__foot {
 /*   padding: 25px;*/
    padding-top: 10px;
    padding-right: 10px;
    padding-bottom: 10px;
    padding-left: 10px;
    border-top: 1px solid #ebedf2;
    border-bottom-left-radius: 4px;
    border-bottom-right-radius: 4px;
}

.kt-portlet {
    display: flex;
    flex-grow: 1;
    flex-direction: column;
    box-shadow: 0px 0px 13px 0px rgba(82, 63, 105, 0.05);
    background-color: #ffffff;
    /* margin-bottom: 20px; */
    border-radius: 4px;
}


</style>

<!--begin::Portlet-->
									<div class="kt-portlet">
										<div class="kt-portlet__head">
											<div class="kt-portlet__head-label">
												<h3 class="kt-portlet__head-title">
													<img src="<?php echo base_url();?>assets/media/logos/logo5h.png"> New Member Form  
												</h3>
											</div>
											<div class="kt-portlet__head-toolbar">
										<div class="kt-portlet__head-wrapper">
											<h5 class="kt-portlet__head-title">
												Consultants: <?php echo $agent_name." / ".$agent_no;?> 
												</h5>
											
										</div>
									</div>
										</div>

										<!--begin::Form-->
										
										
										<?php echo form_open(base_url()."CustomerForm/form_submit?token=".$this->input->get("token"),array('id'=>'customer_form','class'=>'kt-form kt-form--label-right','method'=>'post')); ?>
										
											<div class="kt-portlet__body">
											<h4 class="kt-portlet__head-title "style="font-size: 1.2rem;">SECTION A: DETAILS OF PROPOSER / BUTIR-BUTIR PENCADANG</h4>
												<div class="form-group row form-group-marginless kt-margin-t-10">
												<input type="hidden" name="mytoken" value="<?php echo $mytoken; ?>">
												<div class="col-lg-3">
													<label class="form-control-label">Membership Type: <span style="color: red;">*</span></label>
														<select class="form-control kt-selectpicker" data-size="5" data-live-search="true" id="membership_type" name="membership_type">
															<option value="">Select</option>
															<option value="PRINCIPAL">PRINCIPAL</option>
															<option value="SPOUSE">SPOUSE</option>
															<option value="DEPENDANT">DEPENDANT</option>
															</select>
													</div>
												
													<div class="col-lg-3">
													
													<label>Name (as in NRIC / Passport / Name (seperti dalam K.P. / Pasport): <span style="color: red;">*</span></label>
														<input type="text" class="form-control"  name="members_name" id="members_name" oninput="this.value = this.value.toUpperCase()">
														<span class="form-text text-muted"></span>
														
													</div>
													
													<div class="col-lg-3">
													<label>New NRIC / Passport No / No. K.P. Baru / Pasport: <span style="color: red;">*</span></label>
														<input type="text" class="form-control"  name="nric_no" id="nric_no" oninput="this.value = this.value.toUpperCase()">
														<span class="form-text text-muted"></span>
													</div>
													
													<div class="col-lg-3">
													<label>Nationality / Warganegara: <span style="color: red;">*</span></label>
														<select class="form-control kt-selectpicker" data-size="5" data-live-search="true" id="nationality" name="nationality">
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
													
													
												
													
													
													
												
												</div>
												
												<div class="form-group row form-group-marginless kt-margin-t-5">
												
												<div class="col-lg-3">
													<label>Address 1 / Alamat 1:<span style="color: red;">*</span></label>
														<input type="text" class="form-control" name="address1" id="address1" oninput="this.value = this.value.toUpperCase()">
														<span class="form-text text-muted"></span>
														
													</div>
													
													
													<div class="col-lg-3">
													<label>Address 2 / Alamat 2: </label>
														<input type="text" class="form-control" name="address2" oninput="this.value = this.value.toUpperCase()">
														
													</div>
													
													<div class="col-lg-3">
													<label>Address 3 / Alamat 3: </label>
														<input type="text" class="form-control" name="address3" oninput="this.value = this.value.toUpperCase()">
													
													</div>
													
													<div class="col-lg-3">
													<label>City / Bandar: <span style="color: red;">*</span></label>
														<input type="text" class="form-control" name="city" id="city" oninput="this.value = this.value.toUpperCase()">
													<span class="form-text text-muted"></span>
													</div>
													
													
												
													
												
												</div>
												
												
													<div class="form-group row form-group-marginless kt-margin-t-5">
												
													<div class="col-lg-3">
													<label>State / Negeri: <span style="color: red;">*</span></label>
														<div class="typeahead">
													<input class="form-control" id="kt_typeahead_1" type="text" dir="ltr" placeholder="" name="state" oninput="this.value = this.value.toUpperCase()">
													<span class="form-text text-muted"></span>
												</div>
												
													</div>
												
													<div class="col-lg-3">
													<label>Postcode / Poskod: <span style="color: red;">*</span></label>
														<input type="text" class="form-control" name="postcode" id="postcode" oninput="this.value = this.value.toUpperCase()">
														<span class="form-text text-muted"></span>
													</div>
													
													<div class="col-lg-3">
													<label>Country / Negara: <span style="color: red;">*</span></label>
														<select class="form-control kt-selectpicker" data-size="5" data-live-search="true" id="country" name="country">
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
													<label>Telephone No / No. Telefon: <span style="color: red;">*</span></label>
														<input type="text" class="form-control" name="home_office_phone_no" id="home_office_phone_no" oninput="this.value = this.value.toUpperCase()">
														
													</div>
													
													
												
													
										
												</div>
												
												
													<div class="form-group row form-group-marginless kt-margin-t-5">
												
													<div class="col-lg-3">
													<label>Mobile Phone / Telefon Bimbit: <span style="color: red;">*</span></label>
														<input type="text" class="form-control" name="mobile_phone_no" id="mobile_phone_no" oninput="this.value = this.value.toUpperCase()">
													<span class="form-text text-muted"></span>
													</div>
												
													<div class="col-lg-3">
													<label>Email / Emel: <span style="color: red;">*</span></label>
														<input type="text" class="form-control" name="email" id="email">
													<span class="form-text text-muted"></span>
													</div>
													
													<div class="col-lg-3">
													<label>Date of Birth / Tarikh Lahir: <span style="color: red;">*</span></label>
														<input type="text" class="form-control" id="kt_datepicker_1"  readonly placeholder="Select date" name="date_of_birth" id="date_of_birth" />
													<span class="form-text text-muted"></span>
													</div>
													
													<div class="col-lg-3">
													<label>Gender / Jantina: <span style="color: red;">*</span></label>
														<select class="form-control kt-selectpicker" data-size="5" data-live-search="true" name="gender" id="gender"  >
															<option value=""></option>
															<option value="Male">Male / Lelaki</option>
															<option value="Female">Female / Perempuan</option>
															</select>
														
													</div>
													
													
												
													
												</div>
												
						
						
						<div class="form-group row form-group-marginless kt-margin-t-5">
												
													<div class="col-lg-3">
													<label>Race / Bangsa: <span style="color: red;">*</span></label>
														<select class="form-control kt-selectpicker" data-size="5" data-live-search="true" name="race" id="race">
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
													<label>Marital Status / Taraf Perkahwinan: <span style="color: red;">*</span></label>
														<select class="form-control kt-selectpicker" data-size="5" data-live-search="true" name="marital_status" id="marital_status">
															<option value=""></option>
															<option value="Single">Single / Bujang</option>
															<option value="Married">Married / Kahwin</option>
															<option value="Divoced">Divoced / Bercerai</option>
															<option value="Widow">Widow / Balu</option>
															<option value="Widower">Widower / Duda</option>
														
															</select>
														
													</div>
												
													<div class="col-lg-3">
													<label>Occupation <span style="color: red;">*</span></label>
														<input type="text" class="form-control" name="occupation" id="occupation">
														<span class="form-text text-muted"></span>
													
													</div>
													
													<div class="col-lg-3">
													<label>	Health Declaration: <span style="color: red;">*</span></label>
														<textarea class="form-control" name="health_declaration"  id="health_declaration" data-provide="" rows="3"></textarea>
														<span class="form-text text-muted"></span>
													
													</div>
													
												
											
													
												</div>
						
						
						
												
												<div class="kt-separator kt-separator--border-dashed kt-separator--space-lg kt-separator--portlet-fit"></div>
												
												
												
												<div class="form-group row form-group-marginless kt-margin-t-10">
												<div class="col-lg-6">
												<h4 class="kt-portlet__head-title " style="font-size: 1.2rem;">SECTION B: PRIMARY DETAILS / BUTIR-BUTIR AHLI UTAMA</h4>
												</div>
												<div class="col-lg-3">
												<center>	<button type="button" class="btn btn-bold btn-label-brand btn-sm" data-toggle="modal" data-target="#kt_modal_1"> Customer Signature</button>	</center>
												</div>
												<div class="col-lg-3">
														<h4 class="kt-portlet__head-title" style="font-size: 1.2rem;">SECTION C: MEMBERSHIP PACKAGE / PAKEJ KEAHLIAN</h4>
												</div>
												</div>
												
												
												<div class="form-group row form-group-marginless kt-margin-t-10">
												
													<div class="col-lg-3">
													<label>Name (as in NRIC / Passport / Name (seperti dalam K.P. / Pasport): <span style="color: red;">*</span></label>
														<input type="text" class="form-control" id="primary_name" name="primary_name" oninput="this.value = this.value.toUpperCase()">
														<span class="form-text text-muted"></span>
												
													</div>
													
													<div class="col-lg-3">
													<label>New NRIC / Passport No / No. K.P. Baru / Pasport: <span style="color: red;">*</span></label>
														<input type="text" class="form-control" id="primary_nirc" name="primary_nirc" oninput="this.value = this.value.toUpperCase()">
														<span class="form-text text-muted"></span>
													
													</div>
													
													<div class="col-lg-3">
													<center>
													<input type="hidden" name="sign" id ="mem_sign"/>
													<img  id="sign_imag">
													<span class="form-text text-muted"></span>
													</center>
													</div>
													
													<div class="col-lg-3">
													<center>
													<label>Type of membership package</label> <br>
													<label>Jenis pakej keahlian</label> <br
													<label>Individual / individu</label> <br>
													<div class="kt-radio-inline">
													<span class="form-text text-muted"></span>
															<label class="kt-radio kt-radio--solid">
																<input type="radio" id="active" name="payment_type"   value="Online"> Online
																<span></span>
															</label>
															<label class="kt-radio kt-radio--solid">
																<input type="radio"  id="active2"  name="payment_type" value="Banking"> Bank Transfer
																<span></span>
															</label>
														</div>
													<label style="font-size: 1.5rem;font-weight: bold;">RM1980</label> <br>
													<button type="submit" class="btn btn-brand" id="">Pay Now</button> 
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
														<!--	<button type="submit" class="btn btn-brand">Save</button> -->
															<button type="reset" class="btn btn-secondary">Clear Form</button>
														</div>
													</div>
												</div>
											</div>
										</form>

										<!--end::Form-->
									</div>

									<!--end::Portlet-->
<!-- end:: Content -->
</div>
<!-- end::  Main Content Area -->

	<!-- begin:: Footer -->
	<?php $this->load->view('footer'); ?>
	
<!-- end:: Footer -->


<!--begin::Modal-->
							<?php $this->load->view("signform");?>
							<!--end::Modal-->

	
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
		<script src="<?php echo base_url();?>assets/plugins/global/plugins.bundle.js" type="text/javascript"></script>
		<script src="<?php echo base_url();?>assets/js/scripts.bundle.js" type="text/javascript"></script>

		<!--end::Global Theme Bundle -->

		<!--begin::Page Scripts(used by this page) -->
	<script src="<?php echo base_url();?>assets/js/pages/crud/forms/widgets/bootstrap-select.js" type="text/javascript"></script>
	<script src="<?php echo base_url();?>assets/js/pages/crud/forms/widgets/typeahead.js" type="text/javascript"></script>
	<script src="<?php echo base_url();?>assets/js2/customerform.js?v=<?php echo date("ymdhmi")?>" type="text/javascript"></script>
	<script src="<?php echo base_url();?>assets/js/pages/components/extended/sweetalert2.js" type="text/javascript"></script>
	<script src="https://cdn.jsdelivr.net/npm/signature_pad@2.3.2/dist/signature_pad.min.js"></script>
	<script src="<?php echo base_url();?>assets/js2/membersign.js"></script>
		<!--end::Page Scripts -->
	</body>
<?php if($this->input->get("err"))  {?>	
<script>
jQuery(document).ready(function() {
            swal.fire({

                    "title": "",
                    "text": "<?php echo $this->input->get("err") ;?>",
                    "type": "error",
                    "confirmButtonClass": "btn btn-secondary",
                    "onClose": function(e) {
                        console.log('on close event fired!');
                    }
                });
});
</script>
<?php } ?>
	<!-- end::Body -->

</html>