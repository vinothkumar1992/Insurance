<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Fileview extends CI_Model {
	
	public function view ($filename){
		
		
		if(isset($filename) && @$filename!=""){
$path = APPPATH.'files/'.$filename;
$type = pathinfo($path, PATHINFO_EXTENSION);
$data = file_get_contents($path);
//$iccopy = 'data:image/' . $type . ';base64,' . base64_encode($data);


if($type=="pdf")
{
return '<embed src="'.base_url().'Pdfviewer/viewtwo?fname='.$filename .'" type="application/pdf" " height="500"> </embed>'	;
//$base64='<embed src="http://www.africau.edu/images/default/sample.pdf" width="600" height="500"> </embed>'	; 
}else
{	
return '<img src="'.'data:image/' . $type . ';base64,' . base64_encode($data).'"  class="img-fluid">';
}
}else{
	return "";
	
}
		
		
	}
	
	public function viewfrmCs ($filename){
		
		
		if(isset($filename) && @$filename!=""){
$path = MEMICPATH.'files/'.$filename;
$type = pathinfo($path, PATHINFO_EXTENSION);
$data = file_get_contents($path);
//$iccopy = 'data:image/' . $type . ';base64,' . base64_encode($data);


if($type=="pdf")
{
return '<embed src="'.base_url().'Pdfviewer/viewtwo?fname='.$filename .'" type="application/pdf" " height="500"> </embed>'	;
//$base64='<embed src="http://www.africau.edu/images/default/sample.pdf" width="600" height="500"> </embed>'	; 
}else
{	
return '<img src="'.'data:image/' . $type . ';base64,' . base64_encode($data).'"  class="img-fluid">';
}
}else{
	return "";
	
}
		
		
	}
	
	
	public function agenticview ($filename){
		
		
		if(isset($filename) && @$filename!=""){
$path = APPPATH.'/files/'.$filename;
$type = pathinfo($path, PATHINFO_EXTENSION);
$data = file_get_contents($path);
//$iccopy = 'data:image/' . $type . ';base64,' . base64_encode($data);


if($type=="pdf")
{
return '<embed src="'.base_url().'Pdfviewer/agentic?fname='.$filename .'" type="application/pdf" " height="500"> </embed>'	;
//$base64='<embed src="http://www.africau.edu/images/default/sample.pdf" width="600" height="500"> </embed>'	; 
}else
{	
return '<img src="'.'data:image/' . $type . ';base64,' . base64_encode($data).'"  class="img-fluid">';
}
}else{
	return "";
	
}
		
		
	}
	
	
}