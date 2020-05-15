<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Consultants extends CI_Controller {

	
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
     
	
	}
	
	
	public function index()
	{
		$this->load->view('agents');
	}

public function getagents($id=1)
	{
		
	$pagination = $this->input->input_stream('pagination');
@$total =$pagination["total"];
if($pagination["page"]<0) $pagination["page"]=1;
	if($pagination["perpage"]<0) $pagination["perpage"]=10;
	
	$rolewhere=array();
	$roleTotal="";
	
	if ($this->sess["role"] > 2){
		$rolewhere=array("agent_team"=> $this->sess["role"]);
		
		$roleTotal=" where agent_team = ".$this->sess["role"];
	}
	

if($this->input->input_stream('query'))
{

	
$filter = $this->input->input_stream('query');
//echo $filter["generalSearch"];
$this->db->select('agent_id,agent_no,agent_name,agent_level,agent_email,agnet_cdate,agent_gmid,agent_smid,agent_status,agent_approval');
if($filter["generalSearch"])
{
$this->db->like('LCASE(agent_name)', strtolower($filter["generalSearch"]));
 $this->db->or_like('agent_no', strtolower($filter["generalSearch"]));
 
  $this->db->or_like('agnet_cdate', strtolower($filter["generalSearch"]));
  $this->db->or_like('agent_level', strtolower($filter["generalSearch"]));
$query= $this->db->order_by('agent_id', 'DESC')->get_where('agents',$rolewhere);
$total=$query->num_rows();
}
else
{
//$total= $this->db->query('SELECT * FROM agents')->num_rows();
$this->db->select('agent_id,agent_no,agent_name,agent_level,agent_email,agnet_cdate,agent_gmid,agent_smid,agent_status,agent_approval');
	$query= $this->db->order_by('agent_id', 'DESC')->limit($pagination["perpage"], (($pagination["page"]*$pagination["perpage"])-$pagination["perpage"]))->get_where('agents',$rolewhere);
$total= $this->db->query('SELECT * FROM agents	'.$roleTotal)->num_rows();
	}

}
else
{
	//$total= $this->db->query('SELECT * FROM agents')->num_rows();
	$this->db->select('agent_id,agent_no,agent_name,agent_level,agent_email,agnet_cdate,agent_gmid,agent_smid,agent_status,agent_approval');
	$query= $this->db->order_by('agent_id', 'DESC')->limit($pagination["perpage"], (($pagination["page"]*$pagination["perpage"])-$pagination["perpage"]))->get_where('agents',$rolewhere);
$total= $this->db->query('SELECT * FROM agents	'.$roleTotal)->num_rows();
	}


	$meta = array(
	"page"=>$pagination["page"],
	"pages"=> @$pagination["pages"],
	"perpage"=> $pagination["perpage"],
	"total"=> $total,
	"sort"=> "desc",
	"field" =>"agent_id");
		
		$dataset= json_encode(array("meta"=>$meta, "data"=>$query->result()));

		$this->output->set_status_header(200)->set_content_type('application/json')->set_output($dataset);
	
	}


	public function editagentview($id=0)
	{

	  //echo ($id);
		//$this->db->select('*');
		//$query = $this->db->get_where('agents',array("agent_id"=> $id));
	    //echo json_encode($query->row());
		//$editdata=$query->row();
	    $data['agent_id']=$id;
		$this->load->view('editagentformwz', $data);
		//$this->output
        //  ->set_content_type('application/json')
            
           // ->set_output(json_encode($query->row()));
	
	}

public function editagent($id=0)
	{
       //testing by vinoth 19/03/2020
	   
		$this->db->select('*');
		$this->db->from('agents');
		$this->db->join('agent_employment_history', 'agents.agent_id = agent_employment_history.agentid','left');
		$this->db->join('agent_nominees', 'agents.agent_id = agent_nominees.agentid','left');
		$this->db->join('agent_otherinfo', 'agents.agent_id = agent_otherinfo.agentid','left');
		$this->db->where(array('agents.agent_id' =>  $id));	
	
	    $query = $this->db->get();
		//$this->db->select('*');
		//$query = $this->db->get_where('agents',array("agent_id"=> $id));
	//	echo json_encode($query->row());
	//	$editdata=$query->row();
	//	$this->load->view('editagentformwz',$editdata);
	$row =$query->row();
//$path =  APPPATH.'files/'.$row->agent_ic_copy;
//$type = pathinfo($path, PATHINFO_EXTENSION);
//$data = file_get_contents($path);
//$row->agent_ic_copy = 'data:image/' . $type . ';base64,' . base64_encode($data);
$row->agent_gmno=0;
$row->agent_gmname= "No Group Manager";
$row->agent_smno=0;
$row->agent_smname= "No Senior Manager";
if ($row->agent_gmid !=0){
	
	$this->db->select('agent_name,agent_no');
		$this->db->from('agents');
	$this->db->where(array('agents.agent_gmid' =>  $row->agent_gmid));
 $query1 = $this->db->get()->row();
$row->agent_gmno=$query1->agent_no;
$row->agent_gmname= $query1->agent_name;
}

if ($row->agent_smid !=0){
	
	$this->db->select('agent_name,agent_no');
		$this->db->from('agents');
	$this->db->where(array('agents.agent_smid' =>  $row->agent_smid));
 $query2 = $this->db->get()->row();
$row->agent_smno=$query2->agent_no;
$row->agent_smname= $query2->agent_name;
}



$this->load->model("fileview");
$row->agent_ic_copy = $this->fileview->agenticview($row->agent_ic_copy);
$row->agent_ic_copy1 = $this->fileview->agenticview($row->agent_ic_copy1);
$row->agent_ic_copy2 = $this->fileview->agenticview($row->agent_ic_copy2);
$row->agent_others = $this->fileview->agenticview($row->agent_others);


$row->agent_sign= str_replace("[removed]","data:image/png;base64,",$row->agent_sign);
	
		$this->output
            ->set_content_type('application/json')
  
            ->set_output(json_encode($row));
	
	}
	
	public function updateagent()
	{
	
		$userdata = $this->input->post();
		
		 //$userdata['agent_password']=md5($pass);
		if(empty($userdata["agent_password"]))
		{
		unset($userdata["agent_password"]);
		}
		else
		{
		$userdata["agent_password"]= md5($userdata["agent_password"]);
		}
		
		$this->db->update("agents", $userdata, array("agent_id"=> $userdata["agent_id"]) );
	
		echo $this->db->affected_rows();		
		


}


private  function randomPassword() {
        $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
        $pass = array(); //remember to declare $pass as an array
        $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
        for ($i = 0; $i < 8; $i++) {
            $n = rand(0, $alphaLength);
            $pass[] = $alphabet[$n];
        }
        return implode($pass); //turn the array into a string
    }



    function _sendmail($email,$name,$link)
{
	$this->load->library('email');
			$this->email->from('info@myangkasaemas.com', 'MyAngkasaemas Support Team');
			$this->email->to($email); 	
			$this->email->subject('MyAngkasaemas | Web Portal ');
			$html=$this->load->view("email",array("name"=>$name,"link"=>$link),TRUE);	
		    $this->email->message($html);
			if($this->email->send())
		{
		return "Thank you, please check your mail inbox/Spam";	
		}
		else
		{
		return "Failed to send Email to :" .$email;
		}
			
}


public function new_agents() { 
   
   
   
      $data = [];
   $error=0;
  $count = count($_FILES['agent_attachment']['name']);
 //   $count=array();
	//print_r($_FILES['agent_attachment']);
	
      for($i=0;$i<$count;$i++){
    
   //     if(!empty($_FILES['agent_attachment']['name'][$i])){
    
          $_FILES['file']['name'] = $_FILES['agent_attachment']['name'][$i];
          $_FILES['file']['type'] = $_FILES['agent_attachment']['type'][$i];
          $_FILES['file']['tmp_name'] = $_FILES['agent_attachment']['tmp_name'][$i];
          $_FILES['file']['error'] = $_FILES['agent_attachment']['error'][$i];
          $_FILES['file']['size'] = $_FILES['agent_attachment']['size'][$i];
  
          $config['upload_path'] = APPPATH.'files/'; 
          $config['allowed_types'] = 'jpg|jpeg|png|gif|pdf';
          $config['max_size'] = '5000';
          $config['file_name'] = $_FILES['agent_attachment']['name'][$i];
   
          $this->load->library('upload',$config); 
    
          if($this->upload->do_upload('file')){
            $uploadData = $this->upload->data();
            $filename = $uploadData['file_name'];
   
            $data["files"]= array("file"=>$filename);
          }
		  else
		  {
			  $error=1;
		     $data['totalFiles'][] = $this->upload->display_errors();

		  }			  
		  
     //   }
   
      }
	
if($error)
{
echo json_encode($data);
}	
else
{
$inputs=$this->input->post();

$inputs["agent_attachment"] = json_encode($data);	
unset($inputs["csrf_check"]);
unset($inputs["mytoken"]);
$inputs['agent_password']=md5($inputs['agent_password']);
$this->load->library('form_validation');
 $this->form_validation->set_rules('agent_nric_no', 'NRIC ', 'required|is_unique[agents.agent_nric_no]');
 $this->form_validation->set_rules('agent_name', 'Name', 'required');
 $this->form_validation->set_rules('agent_age', 'Age', 'required');
 $this->form_validation->set_rules('agent_gender', 'Gender', 'required');
 $this->form_validation->set_rules('agent_race', 'Race', 'required');
 $this->form_validation->set_rules('agent_marital_status', 'Marital Status', 'required');
 $this->form_validation->set_rules('agent_phone_no', 'Phone No', 'required');
 $this->form_validation->set_rules('agent_city', 'City', 'required');
 $this->form_validation->set_rules('agent_state', 'State', 'required');
 $this->form_validation->set_rules('agent_country', 'Country', 'required');
 $this->form_validation->set_rules('agent_pincode', 'Pincode', 'required');
 $this->form_validation->set_rules('agent_bank_name', 'Bank Name', 'required');
 $this->form_validation->set_rules('agent_bank_ac_no', 'Bank A/C No', 'required');
 $this->form_validation->set_rules('agent_sign', 'Signature', 'required');
 //$this->form_validation->set_rules('agent_email', 'Email', 'required|is_unique[agents.agent_email]');
 if ($this->form_validation->run() == FALSE)
                {
                         echo validation_errors();
                }
                else
                {
			
				
				
                  $this->db->insert('agents', $inputs);
   if($this->db->insert_id()) echo 1; else echo "Please contact admin" ;   
                }

//echo json_encode($inputs);

}	
   
   
   }


public function gm()
{
		$this->load->view('agents');

}	

public function sm()
{
		$this->load->view('agents');

}

public function cs()
{
		$this->load->view('agents');

}

public function addagent($id=0)
{
$data = array("agent_gmid"=>0,"agent_smid"=>0,"agent_level"=>"GM");

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
$this->load->view("agentformwz",$data);
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
$pass = $this->randomPassword();
//$inputs["agent_password"]=md5($pass);
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
	
 //echo  $this->_sendmail($inputs["agent_email"],$inputs["agent_name"], $pass);
$this->output->set_content_type('application/json')->set_status_header(200)->set_output(json_encode(array('url'=>"https://myangkasaemas.com/MAEM/Consultants",'text' =>'Successfully updated','type' => 'success')));
}
else
{
$this->output->set_content_type('application/json')->set_status_header(200)->set_output(json_encode(array('url'=>"https://myangkasaemas.com/MAEM/Consultants",'text' =>'Please change any field to update','type' => 'error')));

}	
	


}
			
			
			}	
				


}
else
{
$this->output->set_content_type('application/json')->set_status_header(200)->set_output(json_encode(array('text' =>'Failed to save','type' => 'error')));
}	


}


public function test()
{





}

public function sendagentlinksign($id=0)
{
if($this->input->post("email") || $this->input->post("phone") )
{
$date= new DateTime('+1 day');
$time=$date->format('Y-m-d H:i:s');
$ciphertext = $this->input->post("agentid").'_'.$time.'_'.hash('sha256',$this->input->post("agentid").$time."@@@@@@@++@@@@@@");	
$this->db->select('agent_name,agent_nric_no');
		$query = $this->db->get_where('agents',array("agent_id"=> $this->input->post("agentid")))->row();
	

$link="https://myangkasaemas.com/MAEM/AgentSignExt/signature?token=".$ciphertext."&".http_build_query($query);

if($this->input->post("email"))
{
$this->load->library('email');
$this->email->from('info@myangkasaemas.com', 'MyAngkasaemas Support Team');
			$this->email->to($this->input->post("email")); 	
			$this->email->subject('Welcome to MyAngkasaemas Agent');
			$html=$this->load->view("linkagentemailsign",array("name"=>"","link"=>$link),TRUE);	
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
	

}else
{
$data = array("msg"=>"Please check  Email / Phone ","status"=>0);
 $this->output->set_content_type('application/json')->set_output(json_encode($data))->set_status_header(200);
}	


}

public function getBanks()
	{

		$query = $this->db->query('SELECT * FROM banks');
		
		$dataset= json_encode($query->result());
	//echo json_encode($query->result());
		
		$this->output->set_status_header(200)->set_content_type('application/json')->set_output($dataset);
	
	
		
	}
	
public function sendEmailPassword()
	{

    $inputs =$this->input->get();	
	$pass = $this->randomPassword();
	
	
	$this->db->update('agents',array('agent_password'=> md5($pass)),array("agent_email"=>$inputs["agent_email"],"agent_id"=>$inputs["agent_id"]));
	
	$updated_status = $this->db->affected_rows();
	if ($updated_status){
		$res =$this->_sendemailpasswrd($inputs["agent_email"],$inputs["agent_name"], $pass);
		 $this->output->set_content_type('application/json')->set_status_header(200)->set_output(json_encode(array('text' =>$res,'type' => 'success')));
	}else {
	 $this->output->set_content_type('application/json')->set_status_header(200)->set_output(json_encode(array('text' =>'Please contact admin','type' => 'error')));	
		
	}
	
	
	}
	
	
	function _sendemailpasswrd($email,$name,$link)
{
	$this->load->library('email');
			$this->email->from('info@myangkasaemas.com', 'MyAngkasaemas Support Team');
			$this->email->to($email); 	
			$this->email->subject('MyAngkasaemas | Web Portal ');
			$html=$this->load->view("emailpasswrd",array("name"=>$name,"link"=>$link),TRUE);	
		    $this->email->message($html);
			if($this->email->send())
		{
		return "Thank you, please check your mail inbox/Spam";	
		}
		else
		{
		return "Failed to send Email to :" .$email;
		}
			
}

}