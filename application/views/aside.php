<?php  
$myprofile=array(); 
$menuset=array();
$method="";
$class="";
if($this->session->userdata('maemsid'))
{
    $myprofile = $this->session->userdata('maemsid');

    $CI =& get_instance();
    $CI->load->model('menus');
	if($myprofile["role"]==1)
	{	
    $menuset= $CI->menus->get(1);
    }
	if($myprofile["role"]==2)
	{	
    $menuset= $CI->menus->get(1);
    }
	
	if($myprofile["role"]>2)
	{	
    $menuset= $CI->menus->get(3);
    }
	
	$method= $CI->router->fetch_method();
	$class=$this->router->fetch_class();
//print_r();

}

?>
				<button class="kt-aside-close " id="kt_aside_close_btn"><i class="la la-close"></i></button>
				<div class="kt-aside  kt-aside--fixed  kt-grid__item kt-grid kt-grid--desktop kt-grid--hor-desktop" id="kt_aside">

					<!-- begin:: Brand -->
					<?php //$this->load->view('brand'); ?>

					<!-- end:: Brand -->
					<!-- begin:: Aside Menu -->
					  <div class="kt-aside-menu-wrapper kt-grid__item kt-grid__item--fluid" id="kt_aside_menu_wrapper">
        <div id="kt_aside_menu"class="kt-aside-menu " data-ktmenu-vertical="1" data-ktmenu-scroll="1" data-ktmenu-dropdown-timeout="500" >
            <ul class="kt-menu__nav ">

        


            <?php 
            
            foreach ($menuset as $menu)
            {
            ?>

                <li class="kt-menu__item kt-menu__item--<?php if(strtolower($method)==strtolower($menu->name) || strtolower($class)==strtolower($menu->name) ) echo "active"; ?>" aria-haspopup="true" >
                 <?php  if(count($menu->submenu)>0)  {?>
                    <a href="javascript:;" class="kt-menu__link kt-menu__toggle"><i class="kt-menu__link-icon <?php echo $menu->icon; ?>"></i><span class="kt-menu__link-text"><?php echo $menu->name; ?></span><i class="kt-menu__ver-arrow la la-angle-right"></i></a>
                 <?php } else {  ?>
                    <a href="<?php echo base_url().$menu->url; ?>"  <?php if(isset($menu->target)) echo 'target="'.$menu->target.'"'; ?> class="kt-menu__link "><i class="kt-menu__link-icon <?php echo $menu->icon; ?>"></i><span class="kt-menu__link-text"><?php echo $menu->name; ?></span></a>
           
           
              <?php  }
             if(count($menu->submenu)>0) { ?>
              
              <div class="kt-menu__submenu ">
                        <span class="kt-menu__arrow"></span>
                        <ul class="kt-menu__subnav">


              <?php 
              foreach ($menu->submenu as $submenu)
              {
             ?>

<li class="kt-menu__item ">
                                <a href="<?php echo base_url().$submenu->url;?>" class="kt-menu__link ">
                                    <i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i>
                                    <span class="kt-menu__link-text"><?php echo $submenu->name; ?> </span>
                                </a>
                            </li>


              <?php }  ?>

              </ul>
                    </div>

              <?php } ?>          

                </li>
                <?php } ?> 

               
            </ul>
        </div>
    </div>
					<!-- end:: Aside Menu -->

			</div>
				<div class="kt-aside-menu-overlay"></div>



