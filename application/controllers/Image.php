<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Image extends CI_Controller {

	
	public function index()
	{
	$this->load->library('image_lib');
	$im = new Imagick();
	//$im = new Imagick( ); 
$im->setResolution(300,300);
$im->readimage( APPPATH."/files/Consultant_Form_(Afif).pdf"); 
$im->setImageFormat('jpeg');    
$im->writeImage('thumb.jpg'); 
$im->clear(); 
$im->destroy();
	
	
	
	}



}
