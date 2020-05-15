<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ConsultantsExt extends CI_Controller {

	
	public $sess;

    public function __construct()
	{
		parent::__construct();
	

		

	    $this->load->database();
		$this->load->helper(array('url','form'));
     
	
	}
	
	
	



public function addagent($id=0)
{
	
$param =explode("_",$this->input->get("token"));
$id= $param[0];
$data = new \stdClass();
if($id)
{
$this->db->select('agent_id,agent_no,agent_name,agent_level,agent_gmid,agent_smid,agent_status');
		$query = $this->db->get_where('agents',array("agent_id"=>$id,'agent_status'=>1));
if($query->num_rows())
{
$data = $query->row();
if($data->agent_level=="GM") $data->agent_gmid = $data->agent_id;
if($data->agent_level=="SM") $data->agent_smid = $data->agent_id;
if($data->agent_smid==null) $data->agent_smid =0;
if($data->agent_gmid==null) $data->agent_gmid =0;

}	
}
else {
$data->agent_smid =0;
$data->agent_gmid =0;

}
$this->load->view("agentformwzext",$data);
}


public function sendlink($id=0)
{
if($this->input->post("agentid") || $this->input->post("phone") || $this->input->post("email"))
{
$date= new DateTime('+1 day');
//$ciphertext = $this->encryption->encrypt($this->input->post("agentid").'_'.$date->format('Y-m-d H:i:s'));	
$ciphertext = $this->input->post("agentid").'_'.$date->format('Y-m-d H:i:s');	

$link=base_url()."ConsultantsExt/addagent?token=".$ciphertext;

if($this->input->post("email"))
{
$this->load->library('email');
$this->email->from('info@myangkasaemas.com', 'MyAngkasaemas Support Team');
			$this->email->to($this->input->post("email")); 	
			$this->email->subject('Welcome to MyAngkasaemas Agent');
			$html=$this->load->view("linkemailext",array("name"=>"","link"=>$link),TRUE);	
		    $this->email->message($html);
			if($this->email->send())
		{
		$data = array("msg"=>"Thank you, please check your mail inbox/Spam","phone"=>$this->input->post("phone"),"url"=>$link,"status"=>1);
 $this->output->set_content_type('application/json')->set_output(json_encode($data))->set_status_header(200);	
		
		}
		else
		{
		$data = array("msg"=>"Please contact admin","phone"=>$this->input->post("phone"),"url"=>$link,"status"=>0 );
 $this->output->set_content_type('application/json')->set_output(json_encode($data))->set_status_header(200);		

		}

}

if($this->input->post("phone"))
{
	$data = array("msg"=>"Please Check the Web Whatapp!","phone"=>$this->input->post("phone"),"url"=>$link,"status"=>1);
 $this->output->set_content_type('application/json')->set_output(json_encode($data))->set_status_header(200);	
}
	

}
else
{
$data = array("msg"=>"Please check  Email / Phone ","status"=>0);
 $this->output->set_content_type('application/json')->set_output(json_encode($data))->set_status_header(200);
}	


}




public function saveagent()
{
	
if($this->input->post())
{	
 $error=0; 
$inputs =$this->input->post();	
//print_r($this->input->post());

$this->load->library('form_validation');
 //$this->form_validation->set_rules('agent_team', 'Marketing Team', 'required');
 $this->form_validation->set_rules('agent_name', 'Name', 'required');
// $this->form_validation->set_rules('agent_nric_no', 'New NRIC', 'required');
 $this->form_validation->set_rules('agent_dob', 'Date of Birth', 'required');
  $this->form_validation->set_rules('agent_gender', 'Gender ', 'required');
 //$this->form_validation->set_rules('nationality', 'Nationality', 'required');
  $this->form_validation->set_rules('agent_race', 'Race', 'required');
 $this->form_validation->set_rules('agent_marital_status', 'Marital Status', 'required');
 //$this->form_validation->set_rules('occupation', 'Occupation', 'required');
// $this->form_validation->set_rules('health_declaration', 'Password', 'required');
  $this->form_validation->set_rules('agent_city', 'City', 'required');
 $this->form_validation->set_rules('agent_state', 'State', 'required');
  $this->form_validation->set_rules('agent_country', 'Country', 'required');
 $this->form_validation->set_rules('agent_pincode', 'Post Code', 'required');
 // $this->form_validation->set_rules('home_office_phone_no', 'Home/ Office phone no', 'required');
   $this->form_validation->set_rules('agent_phone_no', 'Mobile Phone No', 'required');
  $this->form_validation->set_rules('agent_nric_no', 'NRIC', 'required|is_unique[agents.agent_nric_no]');
$this->form_validation->set_rules('agent_email', 'Email', 'required|is_unique[agents.agent_email]');
 if ($this->form_validation->run() == FALSE)
                {
                        
					//	 redirect("MemberForm/newform/".$param[0]."?token=".$this->input->get("token")."&err=".validation_errors());
                
				 $this->output->set_content_type('application/json')->set_status_header(200)->set_output(json_encode(array('text' => validation_errors(),'type' => 'error')));
				
				}
                else
                {


 $config['upload_path'] = APPPATH.'files/'; 
                $config['allowed_types']        = 'gif|jpg|png|pdf|jpeg';
                $config['max_size']             = 5120;
               // $config['max_width']            = 1024;
               // $config['max_height']           = 768;

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('agent_ic_copy'))
                {
              $uploadData = $this->upload->data();
           $inputs["agent_ic_copy"] = $uploadData['file_name'];
          
		  $error=1;   

                }
				
				if ($this->upload->do_upload('agent_ic_copy1'))
                {
              $uploadData = $this->upload->data();
           $inputs["agent_ic_copy1"] = $uploadData['file_name'];
          

                }
				
				 if ($this->upload->do_upload('agent_ic_copy2'))
                {
              $uploadData = $this->upload->data();
           $inputs["agent_ic_copy2"] = $uploadData['file_name'];
          

                }
				
				 if ($this->upload->do_upload('agent_others'))
                {
              $uploadData = $this->upload->data();
           $inputs["agent_others"] = $uploadData['file_name'];
         

                }
					
							

			
		if($error==0){
$this->output->set_content_type('application/json')->set_status_header(200)->set_output(json_encode(array('text' => $this->upload->display_errors()."uplaod",'type' => 'error')));

//redirect("MemberForm/newform/".$param[0]."?token=".$this->input->get("token")."&err=".$this->upload->display_errors());
		}
else

{
$this->load->helper(array('url','form'));



$this->load->model("dataset");

$this->dataset->table="agents";
$data =$this->dataset->makedataset($inputs);


$this->db->insert("agents",$data);
$inputs["agentid"] = $this->db->insert_id();

$this->dataset->table="agent_nominees";
$data =$this->dataset->makedataset($inputs);
$this->db->insert("agent_nominees",$data);

$this->dataset->table="agent_otherinfo";
$data =$this->dataset->makedataset($inputs);
$this->db->insert("agent_otherinfo",$data);

$this->dataset->table="agent_employment_history";
$data =$this->dataset->makedataset($inputs);
$this->db->insert("agent_employment_history",$data);
if($this->db->insert_id())
{
$this->output->set_content_type('application/json')->set_status_header(200)->set_output(json_encode(array('url'=>"https://myangkasaemas.com/MAEM/Consultants",'text' =>'Successfully registered','type' => 'success')));
}
else
{
$this->output->set_content_type('application/json')->set_status_header(200)->set_output(json_encode(array('text' =>'Failed to save','type' => 'error')));

}	
	


}
			
			
			}	
				


}


}


public function approveagent($id=0)
{
	
if($this->input->post())
{	
 $error=1; 
$inputs =$this->input->post();
//@unset($input[""]);
//echo json_encode($inputs);
//exit;
$this->load->library('form_validation');
 //$this->form_validation->set_rules('agent_team', 'Marketing Team', 'required');
 $this->form_validation->set_rules('agent_name', 'Name', 'required');
// $this->form_validation->set_rules('agent_nric_no', 'New NRIC', 'required');
 $this->form_validation->set_rules('agent_dob', 'Date of Birth', 'required');
  $this->form_validation->set_rules('agent_gender', 'Gender ', 'required');
 //$this->form_validation->set_rules('nationality', 'Nationality', 'required');
  $this->form_validation->set_rules('agent_race', 'Race', 'required');
 $this->form_validation->set_rules('agent_marital_status', 'Marital Status', 'required');
 //$this->form_validation->set_rules('occupation', 'Occupation', 'required');
// $this->form_validation->set_rules('health_declaration', 'Password', 'required');
  $this->form_validation->set_rules('agent_city', 'City', 'required');
 $this->form_validation->set_rules('agent_state', 'State', 'required');
  $this->form_validation->set_rules('agent_country', 'Country', 'required');
 $this->form_validation->set_rules('agent_pincode', 'Post Code', 'required');
 // $this->form_validation->set_rules('home_office_phone_no', 'Home/ Office phone no', 'required');
   $this->form_validation->set_rules('agent_phone_no', 'Mobile Phone No', 'required');
  //$this->form_validation->set_rules('agent_nric_no', 'NRIC', 'required|is_unique[agents.agent_nric_no]');
//$this->form_validation->set_rules('agent_email', 'Email', 'required|is_unique[agents.agent_email]');
 if ($this->form_validation->run() == FALSE)
                {
                        
					//	 redirect("MemberForm/newform/".$param[0]."?token=".$this->input->get("token")."&err=".validation_errors());
                
				 $this->output->set_content_type('application/json')->set_status_header(200)->set_output(json_encode(array('text' => validation_errors(),'type' => 'error')));
				
				}
                else
                {


 $config['upload_path'] = APPPATH.'files/'; 
                $config['allowed_types']        = 'gif|jpg|png|pdf|jpeg';
                $config['max_size']             = 5120;
               // $config['max_width']            = 1024;
               // $config['max_height']           = 768;

                $this->load->library('upload', $config);
//echo json_encode($this->upload->do_upload('agent_ic_copy'));
                if ($this->upload->do_upload('agent_ic_copy'))
                {
              $uploadData = $this->upload->data();
           $inputs["agent_ic_copy"] = $uploadData['file_name'];
          
		  $error=1;   

                }
				else{
					unset ($inputs["agent_ic_copy"]);
				$error=1;
				
				}
				
				
				if ($this->upload->do_upload('agent_ic_copy1'))
                {
              $uploadData = $this->upload->data();
           $inputs["agent_ic_copy1"] = $uploadData['file_name'];
          

                }
				
				 if ($this->upload->do_upload('agent_ic_copy2'))
                {
              $uploadData = $this->upload->data();
           $inputs["agent_ic_copy2"] = $uploadData['file_name'];
          

                }
				
				 if ($this->upload->do_upload('agent_others'))
                {
              $uploadData = $this->upload->data();
           $inputs["agent_others"] = $uploadData['file_name'];
         

                }
							

			
		if($error==0){
$this->output->set_content_type('application/json')->set_status_header(200)->set_output(json_encode(array('text' => $this->upload->display_errors()."uplaod",'type' => 'error')));

//redirect("MemberForm/newform/".$param[0]."?token=".$this->input->get("token")."&err=".$this->upload->display_errors());
		}
else

{
$this->load->helper(array('url','form'));



$this->load->model("dataset");

$this->dataset->table="agents";
$data =$this->dataset->makedataset($inputs);
$this->db->where('agent_id', $id);
$this->db->update('agents', $data);

//$this->db->insert("agents",$data);
//$inputs["agentid"] = $this->db->insert_id();
$updated_status = $this->db->affected_rows();
$this->dataset->table="agent_nominees";
$data =$this->dataset->makedataset($inputs);
$this->db->where('agentid', $id);
$this->db->update("agent_nominees",$data);

$this->dataset->table="agent_otherinfo";
$data =$this->dataset->makedataset($inputs);
$this->db->where('agentid', $id);
$this->db->update("agent_otherinfo",$data);

$this->dataset->table="agent_employment_history";
$data =$this->dataset->makedataset($inputs);
$this->db->where('agentid', $id);
$this->db->update("agent_employment_history",$data);

if($updated_status)
{
$this->output->set_content_type('application/json')->set_status_header(200)->set_output(json_encode(array('url'=>"https://myangkasaemas.com/MAEM/Consultants",'text' =>'Successfully registered','type' => 'success')));
}
else
{
$this->output->set_content_type('application/json')->set_status_header(200)->set_output(json_encode(array('text' =>'Failed to save','type' => 'error')));

}	
	


}
			
			
			}	
				


}
else
{
$this->output->set_content_type('application/json')->set_status_header(200)->set_output(json_encode(array('text' =>'Failed to save','type' => 'error')));
}	


}

public function getBanks()
	{

		$query = $this->db->query('SELECT * FROM banks');
		
		$dataset= json_encode($query->result());
	//echo json_encode($query->result());
		
		$this->output->set_status_header(200)->set_content_type('application/json')->set_output($dataset);
	
	
		
	}
	


public function test()
{





}
}