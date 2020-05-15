<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Formsubmission extends CI_Controller {


	public $sess;

    public function __construct()
	{
		parent::__construct();
	

		if($this->session->userdata('maemsid'))
		{
	 $this->sess = $this->session->userdata('maemsid');
	
	    }
		else
		{
		  redirect('Login', 'refresh');
		}	

	    $this->load->database();
		$this->load->helper(array('url','form'));
     $this->load->library('encryption');
	
	}
	

public function form_submit()
{
	
	

$this->load->library('form_validation');
 $this->form_validation->set_rules('membership_type', 'Membership Type', 'required');
 $this->form_validation->set_rules('members_name', 'Name as in NRIC', 'required');
//  $this->form_validation->set_rules('nric_no', 'New NRIC', 'required');
 $this->form_validation->set_rules('date_of_birth', 'Date of Birth', 'required');
  $this->form_validation->set_rules('gender', 'Gender ', 'required');
 $this->form_validation->set_rules('nationality', 'Nationality', 'required');
  $this->form_validation->set_rules('race', 'Race', 'required');
 $this->form_validation->set_rules('marital_status', 'Marital Status', 'required');
 $this->form_validation->set_rules('occupation', 'Occupation', 'required');
 $this->form_validation->set_rules('health_declaration', 'Password', 'required');
  $this->form_validation->set_rules('city', 'City', 'required');
 $this->form_validation->set_rules('state', 'State', 'required');
  $this->form_validation->set_rules('country', 'Country', 'required');
   //$this->form_validation->set_rules('sign', 'Proposer Sign', 'required');
 $this->form_validation->set_rules('witness_sign', 'Witness Sign', 'required');
 $this->form_validation->set_rules('postcode', 'Post Code', 'required');
  $this->form_validation->set_rules('home_office_phone_no', 'Home/ Office phone no', 'required');
   $this->form_validation->set_rules('mobile_phone_no', 'Mobile Phone No', 'required');
  $this->form_validation->set_rules('nric_no', 'NRIC', 'required|is_unique[forms.form_nric]');
$this->form_validation->set_rules('email', 'Email', 'required|is_unique[forms.form_email]');
$this->form_validation->set_rules('payment_type', 'Payment Type', 'required');
 if ($this->form_validation->run() == FALSE)
                {
                        
					//	 redirect("MemberForm/newform/".$this->sess["agent_id"]."?token=".$this->input->get("token")."&err=".validation_errors());
                
				 $this->output->set_content_type('application/json')->set_status_header(200)->set_output(json_encode(array('text' => validation_errors(),'type' => 'error')));
				
				}
                else
                {
					
$inputs=$this->input->post();					
$this->load->model("doctor");
$this->load->model("nominee");
$this->load->model("customer");
$this->load->model("qusans");
$error=0;

      $config['upload_path'] = MEMICPATH.'files/'; 
                $config['allowed_types']        = 'gif|jpg|jpeg|png|pdf';
                $config['max_size']             = 5120;
              //  $config['max_width']            = 1024;
              //  $config['max_height']           = 768;

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('attachment1'))
                {
              $uploadData = $this->upload->data();
           $inputs["attachment1"] = $uploadData['file_name'];
          
		  $error=1;   

                }
				
				if(@$_FILES["attachment2"] && @$_FILES["attachment2"]["tmp_name"])
				{
				
				  if ($this->upload->do_upload('attachment2'))
                {
              $uploadData = $this->upload->data();
           $inputs["attachment2"] = $uploadData['file_name'];
          
		  $error=1;   

                }
				}
				
				if(@$_FILES["nric_upd2"] && @$_FILES["nric_upd2"]["tmp_name"])
				{
				
				  if ($this->upload->do_upload('nric_upd2'))
                {
              $uploadData = $this->upload->data();
           $inputs["nric_upd2"] = $uploadData['file_name'];
          
		  $error=1;   

                }
				}
				if(@$_FILES["nric_upd3"] && @$_FILES["nric_upd3"]["tmp_name"])
				{
				
				  if ($this->upload->do_upload('nric_upd3'))
                {
              $uploadData = $this->upload->data();
           $inputs["nric_upd3"] = $uploadData['file_name'];
          
		  $error=1;   

                }
				}
				if(@$_FILES["nric_upd4"] && @$_FILES["nric_upd4"]["tmp_name"])
				{
				
				  if ($this->upload->do_upload('nric_upd4'))
                {
              $uploadData = $this->upload->data();
           $inputs["nric_upd4"] = $uploadData['file_name'];
          
		  $error=1;   

                }
				}
				
                			

			
		if($error==0){
$this->output->set_content_type('application/json')->set_status_header(200)->set_output(json_encode(array('text' => $this->upload->display_errors()."uplaod",'type' => 'error')));
		}
else
	
					{			
	
				//$input['password']=md5($input['password']);
				
        $param = $this->input->get("token");

		$param =explode("_",$param);
		$this->db->select('agent_id,agent_no,agent_name,agent_level,agent_gmid,agent_smid,agent_status');
		$query = $this->db->get_where('agents',array("agent_id"=>$param[0],'agent_status'=>1));
		if($query->num_rows() || $param[0]=="0")
		//if(0)
		{
		if($param[0]==0)
		{
	$inputs["gm_id"] = 0; 
	$inputs["sm_id"]=0;
	$inputs["agent_id"]=0;

$datas["agent_no"]="DIRECT"; 
$datas["agent_name"]=""; 
$datas["agent_level"]="DIRECT"; 	
$datas["agent_gmid"]=0; 
$datas["agent_smid"]=0;
$datas["agent_id"]=0;
	
	}
else
	
{	
$datas = $query->row_array();

		$inputs["gm_id"] = $datas["agent_gmid"]; 
	
		$inputs["sm_id"]=$datas["agent_smid"];
	
	$inputs["agent_id"]=$datas["agent_id"];
	
	
}
	
					$datas=array(
					"form_name"=>$this->input->post("members_name"),
					"form_nric"=>$this->input->post("nric_no"),
					"form_email"=>$this->input->post("email"),
					"form_phoneno"=>$this->input->post("mobile_phone_no"),
					"form_data"=>json_encode($this->customer->makedataset($inputs)),
					"form_payment_status"=>0,
					"form_agent"=>json_encode($datas),
					"form_payment_type"=>$this->input->post("payment_type"),
					"doctor_data"=>json_encode($this->doctor->makedataset($inputs)),
					"nominee_data"=>json_encode($this->nominee->makedataset($inputs)),
					"ques_data"=>json_encode($this->qusans->makedataset($inputs)),
					"form_agent_id"=>$param[0],
					
					);
				
                  $this->db->insert('forms', $datas);
				  $formid=$this->db->insert_id();
				  
				  // ORDER ID TEST
				  
				  $order="MES".str_pad(date("ymdhmi").$formid, 9, 0, STR_PAD_LEFT);
				  $this->db->update('forms',array('form_orderid'=>$order),array("id"=>$formid));
				  
if($this->input->post("payment_type")=="Online")

{

$this->db->select('form_name,form_orderid,form_email,form_phoneno');
$query = $this->db->get_where('forms',array("id"=> $formid));
$row = $query->row();
$param=http_build_query($row);
	
  if($formid)  $this->output->set_content_type('application/json')->set_status_header(200)->set_output(json_encode(
  array('url'=>base_url()."PaymentGateway/eGHLgateway?".$param,
  'text' =>"Thank you registering ,Press 'OK' button for online payment" ,'type' => 'success')
  )); 
  else 
	  $this->output->set_content_type('application/json')->set_status_header(200)->set_output(json_encode(array('text' => "Please Contact admin",'type' => 'error'))); 	
}
if($this->input->post("payment_type")=="Banking")
{
//$this->load->view("trstatus",array("sms"=>"Kindly check email for upload Bank Slip upload link",'tr'=>"Order number : ".$order));
$this->bankinslip($this->input->post("email"), $order);
}

		}
		else
		{
		  $this->output->set_content_type('application/json')->set_status_header(200)->set_output(json_encode(array('text' => "Please Contact admin",'type' => 'error'))); 	
		}			
				
 
                
				}		
				
				}



}

public function form_update($formid=0){
	
$this->load->library('form_validation');
 $this->form_validation->set_rules('membership_type', 'Membership Type', 'required');
 $this->form_validation->set_rules('members_name', 'Name as in NRIC', 'required');
//  $this->form_validation->set_rules('nric_no', 'New NRIC', 'required');
 $this->form_validation->set_rules('date_of_birth', 'Date of Birth', 'required');
  $this->form_validation->set_rules('gender', 'Gender ', 'required');
 $this->form_validation->set_rules('nationality', 'Nationality', 'required');
  $this->form_validation->set_rules('race', 'Race', 'required');
 $this->form_validation->set_rules('marital_status', 'Marital Status', 'required');
 $this->form_validation->set_rules('occupation', 'Occupation', 'required');
 $this->form_validation->set_rules('health_declaration', 'Password', 'required');
  $this->form_validation->set_rules('city', 'City', 'required');
 $this->form_validation->set_rules('state', 'State', 'required');
  $this->form_validation->set_rules('country', 'Country', 'required');
   //$this->form_validation->set_rules('sign', 'Proposer Sign', 'required');
 $this->form_validation->set_rules('witness_sign', 'Witness Sign', 'required');
 $this->form_validation->set_rules('postcode', 'Post Code', 'required');
  $this->form_validation->set_rules('home_office_phone_no', 'Home/ Office phone no', 'required');
   $this->form_validation->set_rules('mobile_phone_no', 'Mobile Phone No', 'required');
 //$this->form_validation->set_rules('nric_no', 'NRIC', 'required|is_unique[forms.form_nric]');
//$this->form_validation->set_rules('email', 'Email', 'required|is_unique[forms.form_email]');
//echo "vinoth";

 if ($this->form_validation->run() == FALSE)
                {
                        
					//	 redirect("MemberForm/newform/".$this->sess["agent_id"]."?token=".$this->input->get("token")."&err=".validation_errors());
                
				 $this->output->set_content_type('application/json')->set_status_header(200)->set_output(json_encode(array('text' => validation_errors(),'type' => 'error')));
				
				}
                else
                {
					
$inputs=$this->input->post();					
$this->load->model("doctor");
$this->load->model("nominee");
$this->load->model("customer");
$this->load->model("qusans");
$error=1;

      $config['upload_path'] = MEMICPATH.'files/'; 
                $config['allowed_types']        = 'gif|jpg|jpeg|png|pdf';
                $config['max_size']             = 5120;
              //  $config['max_width']            = 1024;
              //  $config['max_height']           = 768;

                $this->load->library('upload', $config);

               if(@$_FILES["attachment1"] && @$_FILES["attachment1"]["tmp_name"])
			   {
			   if ($this->upload->do_upload('attachment1'))
                {
              $uploadData = $this->upload->data();
           $inputs["attachment1"] = $uploadData['file_name'];
             
		  
		  

                }
				
				}
				
                			
if(@$_FILES["attachment2"] && @$_FILES["attachment2"]["tmp_name"])
{	
				  if ($this->upload->do_upload('attachment2'))
                {
              $uploadData = $this->upload->data();
           $inputs["attachment2"] = $uploadData['file_name'];
          
		  $error=1;   

                }
}
				if(@$_FILES["nric_upd2"] && @$_FILES["nric_upd2"]["tmp_name"])
				{
				
				  if ($this->upload->do_upload('nric_upd2'))
                {
              $uploadData = $this->upload->data();
           $inputs["nric_upd2"] = $uploadData['file_name'];
          
		  $error=1;   

                }
				}
				if(@$_FILES["nric_upd3"] && @$_FILES["nric_upd3"]["tmp_name"])
				{
				
				  if ($this->upload->do_upload('nric_upd3'))
                {
              $uploadData = $this->upload->data();
           $inputs["nric_upd3"] = $uploadData['file_name'];
          
		  $error=1;   

                }
				}
				if(@$_FILES["nric_upd4"] && @$_FILES["nric_upd4"]["tmp_name"])
				{
				
				  if ($this->upload->do_upload('nric_upd4'))
                {
              $uploadData = $this->upload->data();
           $inputs["nric_upd4"] = $uploadData['file_name'];
          
		  $error=1;   

                }
				}
			
			
		if($error==0){
$this->output->set_content_type('application/json')->set_status_header(200)->set_output(json_encode(array('text' => $this->upload->display_errors()."uplaod",'type' => 'error')));
		}
else
	
					{			
	
				//$input['password']=md5($input['password']);
				
        $param = $this->input->get("token");

		$param =explode("_",$param);
		$this->db->select('agent_id,agent_no,agent_name,agent_level,agent_gmid,agent_smid,agent_status');
		$query = $this->db->get_where('agents',array("agent_id"=>$param[0],'agent_status'=>1));
		if($query->num_rows() || $param[0]=="0")
		//if(0)
		{
		if($param[0]==0)
		{
	$inputs["gm_id"] = 0; 
	$inputs["sm_id"]=0;
	$inputs["agent_id"]=0;

$datas["agent_no"]="DIRECT"; 
$datas["agent_name"]=""; 
$datas["agent_level"]="DIRECT"; 	
$datas["agent_gmid"]=0; 
$datas["agent_smid"]=0;
$datas["agent_id"]=0;
	
	}
else
	
{	
$datas = $query->row_array();
$inputs["gm_id"] = $datas["agent_gmid"]; 
	$inputs["sm_id"]=$datas["agent_smid"];
	$inputs["agent_id"]=$datas["agent_id"];
}
	
					$datas=array(
					"form_name"=>$this->input->post("members_name"),
					"form_nric"=>$this->input->post("nric_no"),
					"form_email"=>$this->input->post("email"),
					"form_phoneno"=>$this->input->post("mobile_phone_no"),
					"form_data"=>json_encode($this->customer->makedataset($inputs)),
					"form_payment_status"=>0,
					"form_agent"=>json_encode($datas),
					"form_payment_type"=>$this->input->post("payment_type"),
					"doctor_data"=>json_encode($this->doctor->makedataset($inputs)),
					"nominee_data"=>json_encode($this->nominee->makedataset($inputs)),
					"ques_data"=>json_encode($this->qusans->makedataset($inputs)),
					"form_agent_id"=>$param[0],
					);
				
                 // $this->db->insert('forms', $datas);
				 // $formid=$this->db->insert_id();
				  
				  // ORDER ID TEST
				  
				  //$order="MES".str_pad(date("ymdhmi").$formid, 9, 0, STR_PAD_LEFT);
				 // print_r($datas);
				 // echo json_encode($datas);
				 // exit;
				  $this->db->update('forms',$datas,array("id"=>$formid));
				  
/*if($this->input->post("payment_type")=="Online")

{

$this->db->select('form_name,form_orderid,form_email,form_phoneno');
$query = $this->db->get_where('forms',array("id"=> $formid));
$row = $query->row();
$param=http_build_query($row);
	
  if($formid)  $this->output->set_content_type('application/json')->set_status_header(200)->set_output(json_encode(
  array('url'=>base_url()."PaymentGateway/eGHLgateway?".$param,
  'text' =>"Thank you registering ,Press 'OK' button for online payment" ,'type' => 'success')
  )); 
  else 
	  $this->output->set_content_type('application/json')->set_status_header(200)->set_output(json_encode(array('text' => "Please Contact admin",'type' => 'error'))); 	
} */
/*if($this->input->post("payment_type")=="Banking")
{
//$this->load->view("trstatus",array("sms"=>"Kindly check email for upload Bank Slip upload link",'tr'=>"Order number : ".$order));
$this->bankinslip($this->input->post("email"), $order);
}*/
 if($formid)  $this->output->set_content_type('application/json')->set_status_header(200)->set_output(json_encode(
  array('url'=>base_url()."/MemberForm",
  'text' =>"Update Successfull" ,'type' => 'success')
  )); 	
		}
		else
		{
		 echo "Security issue , Please Dont modify URL Data" ;  
		}			
				
 
                
				}		
				
				}



}

public function banksliplink()
{

$email = $this->input->get("e");
$orderid =$this->input->get("o");
$key="#####@@@@@DONTMODIFY@@@@@####";

	
$token=hash('sha256',$email.$orderid.$key);	
$link ="https://myangkasaemas.com/MAEM/CustomerForm/upload_slip?email=$email&orderid=$orderid&token=$token";		
redirect($link , 'refresh');
}



public function bankinslip($email=0, $orderid=0)
{
//
//$email = $this->input->get("e");
//$orderid =$this->input->get("o");
$key="#####@@@@@DONTMODIFY@@@@@####";



if($email && $orderid)
{

$token=hash('sha256',$email.$orderid.$key);
$link=base_url()."CustomerForm/upload_slip?email=$email&orderid=$orderid&token=$token";	
//$link ="https://myangkasaemas.com/MAEM/CustomerForm/upload_slip?email=$email&orderid=$orderid&token=$token";	
$this->load->library('email');
$this->email->from('info@myangkasaemas.com', 'MyAngkasaemas Support Team');
			$this->email->to($email); 	
			$this->email->subject('Welcome to MyAngkasaemas Member / Order No:'.$orderid);
			$html=$this->load->view("bankinlink",array("order"=>$orderid,"link"=>$link),TRUE);	
		    $this->email->message($html);
			if($this->email->send())
		{
//	$this->load->view("trstatus",array("sms"=>" Thank you ","bankin"=>"Kindly check Your Email inbox/Spam folder we sent Link for uploading Banking Slip ",'tr'=>"Order number: $orderid"));
		
		 $this->output->set_content_type('application/json')->set_status_header(200)->set_output(json_encode(
  array('text' =>"Thank you registering ,Kindly check Your Email inbox/Spam folder we sent Link for uploading Banking Slip,<br> Order number: $orderid <br> ",'url'=>base_url() ,'type' => 'success')
  )); 
		
		
		}
		else
		{
		//$this->load->view("trstatus",array("sms"=>" Thank you ","bankin"=>"Kindly Contact Your Agent ",'tr'=>"Order number : $orderid"));	

		
		$this->output->set_content_type('application/json')->set_status_header(200)->set_output(json_encode(array('text' => "Please Contact Support",'type' => 'error')));
		
		}

}


}


public function test()
{
$this->load->view("trstatus");
}
public function formCheckNric($id=0)
{
	

$query =$this->db->query("SELECT COUNT(*) as countres FROM `forms` where form_nric=".$id."");
 $res= $query->result();
   if ($res[0]->countres == "0")
                {
					$data["type"]='success';
					$data["status"]=0;
               	   			$this->output->set_status_header(200)->set_content_type('application/json')->set_output(json_encode(array("datasets"=>$data)));
			
			}else {
			
			$data["type"]='error';
					$data["status"]=1;
				$this->output->set_status_header(200)->set_content_type('application/json')->set_output(json_encode(array("datasets"=>$data)));
				
					}	
				
}





}