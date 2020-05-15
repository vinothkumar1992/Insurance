<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 date_default_timezone_set("Asia/Kuala_Lumpur");
class CustomerForm extends CI_Controller {




    public function __construct()
	{
		parent::__construct();

	    $this->load->database();
		$this->load->library('encryption');
		$this->load->helper(array('url','form'));
     
	
	}
	

	
	public function index()
	{
		//$this->load->library('encryption');
		$param = $this->encryption->decrypt($this->input->get("token"));
				$param = $this->input->get("token");
	//	print_r($param);
		$param =explode("_",$param);
	//	print_r($param);
		$this->db->select('agent_id,agent_no,agent_name,agent_level,agent_gmid,agent_smid,agent_status');
		$query = $this->db->get_where('agents',array("agent_id"=>$param[0],'agent_status'=>1));
		if($query->num_rows())
		//if(0)
		{
		$datas = $query->row_array();
$datas["mytoken"]=$this->encryption->encrypt($datas["agent_level"]."_".$datas["agent_id"]."_".$datas["agent_gmid"]."_".$datas["agent_smid"]);		
		$this->load->view('customersform1',$datas);
		}
		else
		{
		$this->load->view('error');
		}			
	}

public function form_submit1()
{
echo json_encode($this->input->post());
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
 $this->form_validation->set_rules('postcode', 'Post Code', 'required');
  $this->form_validation->set_rules('home_office_phone_no', 'Home/ Office phone no', 'required');
   $this->form_validation->set_rules('mobile_phone_no', 'Mobile Phone No', 'required');
  $this->form_validation->set_rules('nric_no', 'NRIC', 'required|is_unique[forms.form_nric]');
$this->form_validation->set_rules('email', 'Email', 'required|is_unique[forms.form_email]');
 if ($this->form_validation->run() == FALSE)
                {
                      //   echo validation_errors();
						 redirect("CustomerForm?token=".$this->input->get("token")."&err=".validation_errors());
                }
                else
                {
					$input= $this->input->post();
				unset($input['csrf_check']);
				
				//$input['password']=md5($input['password']);
				
				$param = $this->input->get("token");
	//	print_r($param);
		$param =explode("_",$param);
	//	print_r($param);
		$this->db->select('agent_id,agent_no,agent_name,agent_level,agent_gmid,agent_smid,agent_status');
		$query = $this->db->get_where('agents',array("agent_id"=>$param[0],'agent_status'=>1));
		if($query->num_rows())
		//if(0)
		{
		$datas = $query->row_array();
	$inputs=$this->input->post();
	unset($inputs["csrf_check"]);	
					$datas=array("form_name"=>$this->input->post("members_name"),"form_nric"=>$this->input->post("nric_no"),"form_email"=>$this->input->post("email"),"form_phoneno"=>$this->input->post("mobile_phone_no"),"form_data"=>json_encode($inputs),"form_payment_status"=>0,"form_agent"=>json_encode($datas),"form_payment_type"=>$this->input->post("payment_type"));
				
                  $this->db->insert('forms', $datas);
				  $formid=$this->db->insert_id();
				  
				  // ORDER ID TEST
				  
				  $order="MES".str_pad($formid, 9, 0, STR_PAD_LEFT);
				  $this->db->update('forms',array('form_orderid'=>$order),array("id"=>$formid));
				  
if($this->input->post("payment_type")=="Online")

{	
   if($formid) redirect("PaymentGateway/eGHLgateway?id=".$order);  else echo "Please contact admin" ;  	
}
if($this->input->post("payment_type")=="Banking")
{
//$this->load->view("trstatus",array("sms"=>"Kindly check email for upload Bank Slip upload link",'tr'=>"Order number : ".$order));
$this->bankinslip($this->input->post("email"), $order);
}

		}
		else
		{
		 echo "Security issue , Please Dont modify URL Data" ;  
		}			
				
 
                
				
				
				}



}




public function sendlink($id=0)
{
if($this->input->post("email") || $this->input->post("phone") )
{
$date= new DateTime('+1 day');
//$ciphertext = $this->encryption->encrypt($this->input->post("agentid").'_'.$date->format('Y-m-d H:i:s'));	
$ciphertext = $this->input->post("agentid").'_'.$date->format('Y-m-d H:i:s');	

$link=MYDOMAIN."CustomerForm?token=".$ciphertext;

if($this->input->post("email"))
{
$this->load->library('email');
$this->email->from('info@myangkasaemas.com', 'MyAngkasaemas Support Team');
			$this->email->to($this->input->post("email")); 	
			$this->email->subject('Welcome to MyAngkasaemas Member');
			$html=$this->load->view("linkemail",array("name"=>"","link"=>$link),TRUE);	
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
	
$this->load->library('email');
$this->email->from('info@myangkasaemas.com', 'MyAngkasaemas Support Team');
			$this->email->to($email); 	
			$this->email->subject('Welcome to MyAngkasaemas Member / Order No:'.$orderid);
			$html=$this->load->view("bankinlink",array("order"=>$orderid,"link"=>$link),TRUE);	
		    $this->email->message($html);
			if($this->email->send())
		{
	$this->load->view("trstatus",array("sms"=>" Thank you ","bankin"=>"Kindly check Your Email inbox/Spam folder we sent Link for uploading Banking Slip ",'tr'=>"Order number: $orderid"));
		
		}
		else
		{
		$this->load->view("trstatus",array("sms"=>" Thank you ","bankin"=>"Kindly Contact Your Agent ",'tr'=>"Order number : $orderid"));	

		}

}


}

public function upload_slip()
{
if($this->input->get("email") && $this->input->get("orderid") && $this->input->get("token") )	
{

$this->db->select('form_orderid');
		$query = $this->db->get_where('forms',array("form_email"=>$this->input->get("email"),'form_upload_slip'=>'0','form_orderid'=> $this->input->get("orderid")));
		if($query->num_rows())
		
		{	
$email = $this->input->get("email");
$orderid =$this->input->get("orderid");
$key="#####@@@@@DONTMODIFY@@@@@####";
$token=$this->input->get("token");
$token1=hash('sha256',$email.$orderid.$key);

if($token==$token1)
{
$data=array("email"=>$email,"tr"=>"Order ID : $orderid","token"=>$token,"sms"=>"Please Upload Banking Slip","error"=>"");	
$this->load->view("file_upload",$data);
}
else
{
$this->load->view("error");
}	
}
else
{
$this->load->view("status",array("sms"=>"Banking Slip uploaded","msg"=>"Banking Slip has already been uploaded successfully"));	
}	


}



else
{
$this->load->view("error");
}	

}

public function doupload()
{

if($this->input->get("form_email") && $this->input->get("form_orderid") && $this->input->get("token") )	
{	
$email = $this->input->get("form_email");
$orderid =$this->input->get("form_orderid");
$key="#####@@@@@DONTMODIFY@@@@@####";
$token=$this->input->get("token");
$token1=hash('sha256',$email.$orderid.$key);

if($token==$token1)	
{	
$config['upload_path'] = APPPATH.'files/bankingslip/'; 

                $config['allowed_types']        = 'gif|jpg|png|pdf|jpeg';
                $config['max_size']             = 2048;
            //    $config['max_width']            = 1024;
            //    $config['max_height']           = 768;

                $this->load->library('upload', $config);

                if ( ! $this->upload->do_upload('slip'))
                {
                        $error = array('sts' =>"2", "msg"=> $this->upload->display_errors());

$this->output
        ->set_content_type('application/json')
        ->set_output(json_encode($error));

                        
                }
                else
                {
                       $data = $this->upload->data();
					   $this->db->update("forms",array('form_upload_slip'=>$data['file_name']),array("form_email"=>$this->input->get("form_email"),"form_orderid"=>$this->input->get("form_orderid")));
					   
$this->output
        ->set_content_type('application/json')
        ->set_output(json_encode(array("sts"=>1)));
                        
                }
}
else
{
$this->output
        ->set_content_type('application/json')
        ->set_output(json_encode(array("sts"=>0,"msg"=>"Something wrong in url ,Please  contact admin")));
}
}	
}




public function test()
{

//$this->load->view("trstatus",array("sms"=>" Thank you ","bankin"=>"Kindly check Your Email inbox/Spam folder we sent Link for uploading Bank In Slip",'tr'=>"Order number :MD00343434343 "));
$this->load->view("member_form_wizard");

}


}
