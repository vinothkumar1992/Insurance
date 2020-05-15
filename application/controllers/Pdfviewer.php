<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pdfviewer extends CI_Controller {


	

public function view()
{

if($this->input->get("fname"))
{

$file = APPPATH.'files/bankingslip/'.$this->input->get("fname");
 $filename = 'viewfile.pdf';
 header('Content-type: application/pdf');
 header('Content-Disposition: inline; filename="' . $filename . '"');
 header('Content-Transfer-Encoding: binary');
 header('Accept-Ranges: bytes');
 @readfile($file);

}	




}	

public function viewtwo()
{

if($this->input->get("fname"))
{

$file = MEMICPATH.'files/'.$this->input->get("fname");
 $filename = 'filename.pdf';
 header('Content-type: application/pdf');
 header('Content-Disposition: inline; filename="' . $filename . '"');
 header('Content-Transfer-Encoding: binary');
 header('Accept-Ranges: bytes');
 @readfile($file);

}	



}

public function agentic()
{

if($this->input->get("fname"))
{

$file = APPPATH.'files/'.$this->input->get("fname");
 $filename = 'filename.pdf';
 header('Content-type: application/pdf');
 header('Content-Disposition: inline; filename="' . $filename . '"');
 header('Content-Transfer-Encoding: binary');
 header('Accept-Ranges: bytes');
 @readfile($file);

}	



}

	
	}
