<?php  
$myprofile=array(); 
if($this->session->userdata('maemsid'))
{
    $myprofile = $this->session->userdata('maemsid');

}

?>
<!-- begin:: Header -->
					<div id="kt_header" class="kt-header kt-grid kt-grid--ver  kt-header--fixed ">
	<div class="kt-aside__brand kt-grid__item " id="kt_aside_brand">
						<div class="kt-aside__brand-logo">
							<a href="<?php echo base_url();?>">
							<center>	<img style="
    padding-left: 25px;
" alt="Logo" src="<?php echo base_url();?>assets/media/logos/logo5h1.png" /> </center>
							</a>
						</div>
					</div>
						<!-- begin: Header Menu -->
						<button class="kt-header-menu-wrapper-close" id="kt_header_menu_mobile_close_btn"><i class="la la-close"></i></button>
						
				
						<div class="kt-header-menu-wrapper kt-grid__item kt-grid__item--fluid" id="kt_header_menu_wrapper">
							<div id="kt_header_menu" class="kt-header-menu kt-header-menu-mobile  kt-header-menu--layout- ">
										
								<!--
								<ul class="kt-menu__nav ">
									<li class="kt-menu__item  kt-menu__item--active " aria-haspopup="true"><a href="<?php echo base_url(); ?>Dashboard" class="kt-menu__link "><span class="kt-menu__link-text">Dashboard</span></a></li>
												<li class="kt-menu__item  kt-menu__item--active " aria-haspopup="true"><a href="<?php echo base_url(); ?>Agents" class="kt-menu__link "><span class="kt-menu__link-text">Agents</span></a></li>
												<li class="kt-menu__item  kt-menu__item--active " aria-haspopup="true"><a href="<?php echo base_url(); ?>Customers" class="kt-menu__link "><span class="kt-menu__link-text">Customers</span></a></li>
														</ul>
							-->
							</div>
						</div>
<h4 style="
    padding-right: 400px;
    padding-top: 20px;
"> My Angkasa Emas Medicare </h4>
						<!-- end: Header Menu -->

						<!-- begin:: Header Topbar -->
						<div class="kt-header__topbar">

							<!--begin: Search -->
							<!--
							<div class="kt-header__topbar-item kt-header__topbar-item--search">
								<div class="kt-header__topbar-wrapper">
									<div class="kt-quick-search kt-quick-search--inline kt-quick-search--result-compact" id="kt_quick_search_inline">
										<form method="get" class="kt-quick-search__form">
											<div class="input-group">
												<div class="input-group-prepend"><span class="input-group-text"><i class="flaticon2-search-1"></i></span></div>
												<input type="text" class="form-control kt-quick-search__input" placeholder="Search...">
												<div class="input-group-append"><span class="input-group-text"><i class="la la-close kt-quick-search__close" style="display: none;"></i></span></div>
											</div>
										</form>
										<div id="kt_quick_search_toggle" data-toggle="dropdown" data-offset="0px,10px"></div>
										<div class="dropdown-menu dropdown-menu-fit dropdown-menu-right dropdown-menu-anim dropdown-menu-lg">
											<div class="kt-quick-search__wrapper kt-scroll" data-scroll="true" data-height="300" data-mobile-height="200">
											</div>
										</div>
									</div>
								</div>
							</div>
-->
							<!--end: Search -->

							
					
							<!--begin: Language bar -->
							<!--
							<div class="kt-header__topbar-item kt-header__topbar-item--langs">
								<div class="kt-header__topbar-wrapper" data-toggle="dropdown" data-offset="10px,0px">
									<span class="kt-header__topbar-icon kt-header__topbar-icon--brand">
										<img class="" src="assets/media/flags/260-united-kingdom.svg" alt="" />
									</span>
								</div>
								<div class="dropdown-menu dropdown-menu-fit dropdown-menu-right dropdown-menu-anim">
									<ul class="kt-nav kt-margin-t-10 kt-margin-b-10">
										<li class="kt-nav__item kt-nav__item--active">
											<a href="#" class="kt-nav__link">
												<span class="kt-nav__link-icon"><img src="assets/media/flags/226-united-states.svg" alt="" /></span>
												<span class="kt-nav__link-text">English</span>
											</a>
										</li>
										<li class="kt-nav__item">
											<a href="#" class="kt-nav__link">
												<span class="kt-nav__link-icon"><img src="assets/media/flags/118-malasya.svg" alt="" /></span>
												<span class="kt-nav__link-text">Malay</span>
											</a>
										</li>
										
									</ul>
								</div>
							</div>
-->
							<!--end: Language bar -->

							<!--begin: User bar -->
							<div class="kt-header__topbar-item kt-header__topbar-item--user">
								<div class="kt-header__topbar-wrapper" data-toggle="dropdown" data-offset="10px,0px">
									<span class="kt-hidden kt-header__topbar-welcome">Hi,</span>
									<span class="kt-hidden kt-header__topbar-username"><?php echo  strtoupper($myprofile["username"][0]);?></span>
									<img class="kt-hidden" alt="Pic" src="assets/media/users/300_21.jpg" />
									<span class="kt-header__topbar-icon"><i class="flaticon2-user-outline-symbol"></i></span>
								</div>
								<div class="dropdown-menu dropdown-menu-fit dropdown-menu-right dropdown-menu-anim dropdown-menu-xl">

									<!--begin: Head -->
									<div class="kt-user-card kt-user-card--skin-light kt-notification-item-padding-x">
										<div class="kt-user-card__avatar">
											<!--<img class="kt-hidden-" alt="Pic" src="assets/media/users/300_25.jpg" />-->

											<!--use below badge element instead the user avatar to display username's first letter(remove kt-hidden class to display it) -->
											<span class="kt-badge kt-badge--username kt-badge--unified-success kt-badge--lg kt-badge--rounded kt-badge--bold "><?php echo  strtoupper($myprofile["username"][0]);?></span>
										</div>
										<div class="kt-user-card__name">
											<?php echo  strtoupper($myprofile["username"]);?>
										</div>
										<!--
										<div class="kt-user-card__badge">
											<span class="btn btn-label-primary btn-sm btn-bold btn-font-md">23 messages</span>
										</div>
										-->
									</div>

									<!--end: Head -->

									<!--begin: Navigation -->
									<div class="kt-notification">
										<a href="<?php base_url()?>Profile" class="kt-notification__item">
											<div class="kt-notification__item-icon">
												<i class="flaticon2-calendar-3 kt-font-success"></i>
											</div>
											<div class="kt-notification__item-details">
												<div class="kt-notification__item-title kt-font-bold">
													My Profile
												</div>
												
											</div>
										</a>
									
								
										<div class="kt-notification__custom kt-space-between">
											<a href="<?php echo base_url();?>Logout"  class="btn btn-label btn-label-brand btn-sm btn-bold">Sign Out</a>
										
										</div>
									</div>

									<!--end: Navigation -->
								</div>
							</div>

							<!--end: User bar -->

							<!--begin: Quick panel toggler -->
<!--						
						<div class="kt-header__topbar-item kt-header__topbar-item--quickpanel" data-toggle="kt-tooltip" title="Quick panel" data-placement="top">
								<div class="kt-header__topbar-wrapper">
									<span class="kt-header__topbar-icon" id="kt_quick_panel_toggler_btn"><i class="flaticon2-cube-1"></i></span>
								</div>
							</div>
-->
							<!--end: Quick panel toggler -->
						</div>

						<!-- end:: Header Topbar -->
					</div>

					<!-- end:: Header -->
				
				
				
				