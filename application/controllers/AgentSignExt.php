<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AgentSignExt extends CI_Controller {

	
	public $sess;

    public function __construct()
	{
		parent::__construct();
	
	
		

	    $this->load->database();
		$this->load->helper(array('url','form'));
     
	
	}
	
	
	
public function signature(){
$this->load->view("signAgentFormExt");
}

public function signatureSubmit(){

$param = $this->input->post("token");
		//print_r($param);
		$param =explode("_",$param);
		
		$id = $param[0];
		$time = $param[1];
		$hashkey=$param[2];
		$ciphertext = hash('sha256',$id.$time."@@@@@@@++@@@@@@");

 if ($hashkey == $ciphertext){
	 
	 
	 $inputs =$this->input->post();	
	 
	 
	 $this->load->model("dataset");

$this->dataset->table="agents";
$data =$this->dataset->makedataset($inputs);


$this->db->update("agents",$data,array("agent_id"=>$id));

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