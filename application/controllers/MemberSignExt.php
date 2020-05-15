<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MemberSignExt extends CI_Controller {

	
	public $sess;

    public function __construct()
	{
		parent::__construct();
	

		

	    $this->load->database();
		$this->load->helper(array('url','form'));
     
	
	}
	
	
	
public function signature(){
$this->load->view("signFormExt");
}

public function signatureSubmit(){

$param = $this->input->post("token");
		//print_r($param);
		$param =explode("_",$param);
		
		$id = $param[0];
		$time = $param[1];
		$hashkey=$param[2];
		$mem_sign = $this->input->post("sign");
		
		$ciphertext = hash('sha256',$id.$time."@@@@@@@++@@@@@@");

 if ($hashkey == $ciphertext){
	 
	 
$this->db->select('form_data');
		$query = $this->db->get_where('forms',array("id"=> $id))->row();
	
	
$sign =json_decode($query->form_data);



$sign->sign= $mem_sign;

$this->db->update("forms",array("form_data"=>json_encode($sign)),array("id"=>$id));

$ch=$this->db->affected_rows();
if($ch)
{
$this->load->view("status",array("sms"=>"Success","msg"=>"Signature updated successfully"));	
}	
else
{
$this->load->view("status",array("sms"=>"Error","msg"=>"Signature not updated . Please try again later."));	

}	

}else {
	
 redirect('E404'); 
	}
}

}