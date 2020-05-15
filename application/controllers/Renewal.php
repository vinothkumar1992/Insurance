<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Renewal extends CI_Controller {

	
	
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
	
	}



public function renewal_payment_approval($id=0)
{


$row = $this->db->get_where('forms', array('id' => $id))->row();
$tr=null;
if($row->form_payment_type=="Online")
{
$q = $this->db->get_where('payment_transaction', array('OrderNumber' => $row->form_orderid))->row();
$tr =$q->datas;
}


if($row->form_upload_slip)
{
$path =  APPPATH.'files/bankingslip/'.$row->form_upload_slip;
$type = pathinfo($path, PATHINFO_EXTENSION);
$data = file_get_contents($path);
$base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
}
else
{
$base64=null;
}
$cus = $this->db->get_where('customers', array('nric_no' => $row->form_nric,'email'=>$row->form_email))->row();
$nominees= $this->db->get_where('nominees', array('nominee_customerid' =>$cus->id))->row();
$nominees= $this->db->get_where('nominees', array('nominee_customerid' =>$cus->id))->row();
$doctor= $this->db->get_where('doctors', array('doctor_customer_id' =>$cus->id))->row();
$ques= $this->db->get_where('checklist', array('customer_id' =>$cus->id))->row();
if($cus)
{	
$dataset=(array)$cus;
$dataset["payment_img"]= $base64;
$dataset["id"]=$row->id;
$dataset["form_orderid"]=$row->form_orderid;
$dataset["trhistory"]=$tr;
$dataset["ptype"]=$row->form_payment_type;
$dataset["nominees"]=$nominees;
$dataset["doctor"]=$doctor;
$dataset["ques"]=$ques;

$dataset["sign"]=str_replace("[removed]","data:image/png;base64,",$dataset["sign"]);
//print_r($dataset);
$this->load->view("renewal_payment_approval",$dataset);
}

}

public function renewal_payment_approval_do()
{
if($this->input->post())
{
$this->db->update("forms",array("form_payment_status"=>1),array("id"=>$this->input->post("id"),"form_orderid"=>$this->input->post("form_orderid") ,"form_payment_status"=>"0"));
$sts=$this->db->affected_rows();
if($sts)
{	
$this->done($this->input->post("form_orderid"));
}
$this->output->set_status_header(200)->set_content_type('application/json')->set_output(json_encode(array("sts"=>$sts)));
}
else
{
$this->output->set_status_header(200)->set_content_type('application/json')->set_output(json_encode(array("sts"=>"0")));
}	
}
public function done($id)
{

$comm=array();

$amount = 1980;
$this->db->update("forms",array("form_payment_status"=>1,"form_member_approval"=>1),array("form_orderid"=> $id));

$this->db->select('*');
		$query = $this->db->get_where('forms',array("form_orderid"=> $id));
if($query->num_rows())		
{		

$row = $query->row();

$cus = $this->db->get_where('customers', array('nric_no' => $row->form_nric,'email'=>$row->form_email))->row();
// adding customer 

$customerid=$cus->id;

$policy = $this->db->get_where('policies', array('customer_id' =>$customerid))->row();
$policy_end_date = date('Y-m-d', strtotime("+1 year", strtotime($policy->policy_end_date)));
$updatepolicy = array("policy_start_date"=>$policy->policy_end_date,"policy_end_date"=>$policy_end_date);
$this->db->update('policies',$updatepolicy,array('customer_id' =>$customerid));
if($customerid)
{

	
$input= json_decode($row->form_agent);

$this->db->select('agent_id,agent_no,agent_name,agent_level,agent_gmid,agent_smid');
		$query = $this->db->get_where('agents',array("agent_id"=> $input->agent_id));
		$row = $query->row();

if($query->num_rows())
{	
if($row->agent_level=="GM")
{
$comm= array(
'ac_gm_id'=>$row->agent_id,'ac_gm_percentage'=>'10','ac_gm_amount'=>((10 / 100)*$amount),"ac_customer_id"=>$customerid,
'ac_prodcut_amount'=>$amount,
'ac_approval'=>1
);
}

if($row->agent_level=="SM"  && $row->agent_gmid>0)
{
$comm= array(
'ac_gm_id'=>$row->agent_gmid,'ac_gm_percentage'=> '1','ac_gm_amount'=>((1 / 100)*$amount),
'ac_sm_id'=>$row->agent_id,'ac_sm_percentage'=>'9','ac_sm_amount'=>((9 / 100)*$amount),
"ac_customer_id"=>$customerid,
'ac_prodcut_amount'=>$amount,
'ac_approval'=>1
);
}

if($row->agent_level=="SM"  && $row->agent_gmid==0)
{
$comm= array(
'ac_sm_id'=>$row->agent_id,'ac_sm_percentage'=>'9','ac_sm_amount'=>((9 / 100)*$amount),
"ac_customer_id"=>$customerid,
'ac_prodcut_amount'=>$amount,
'ac_approval'=>1
);
}


if($row->agent_level=="CS" && $row->agent_gmid>0 && $row->agent_smid>0)
{
$comm= array(
'ac_gm_id'=>$row->agent_gmid,'ac_gm_percentage'=>'1','ac_gm_amount'=>((1 / 100)*$amount),
'ac_sm_id'=>$row->agent_smid,'ac_sm_percentage'=>'2','ac_sm_amount'=>((2 / 100)*$amount),
'ac_agent_id'=>$row->agent_id,'ac_agent_percentage'=>'7','ac_agent_amount'=>((7 / 100)*$amount),
"ac_customer_id"=>$customerid,
'ac_prodcut_amount'=>$amount,
'ac_approval'=>1
);
}

if($row->agent_level=="CS" && $row->agent_gmid==0 && $row->agent_smid==0)
{
$comm= array(
'ac_agent_id'=>$row->agent_id,'ac_agent_percentage'=>'7','ac_agent_amount'=>((7 / 100)*$amount),
"ac_customer_id"=>$customerid,
'ac_prodcut_amount'=>$amount,
'ac_approval'=>1

);
}

if($row->agent_level=="CS" && $row->agent_gmid>0 && $row->agent_smid==0)
{
$comm= array(
'ac_gm_id'=>$row->agent_gmid,'ac_gm_percentage'=>'3','ac_gm_amount'=>((3 / 100)*$amount),
'ac_agent_id'=>$row->agent_id,'ac_agent_percentage'=>'7','ac_agent_amount'=>((7 / 100)*$amount),
"ac_customer_id"=>$customerid,
'ac_prodcut_amount'=>$amount,
'ac_approval'=>1
);
}


if($row->agent_level=="CS" && $row->agent_gmid==0 && $row->agent_smid>0)
{
$comm= array(
'ac_sm_id'=>$row->agent_smid,'ac_sm_percentage'=>'2','ac_sm_amount'=>((2 / 100)*$amount),
'ac_agent_id'=>$row->agent_id,'ac_agent_percentage'=>'7','ac_agent_amount'=>((7 / 100)*$amount),
"ac_customer_id"=>$customerid,
'ac_prodcut_amount'=>$amount,
'ac_approval'=>1
);
}


$this->db->insert("agent_commission",$comm);
$data =array("email"=>$cus->email,"name"=>$cus->members_name,"policy"=>$policy->policy_id);
$this->_sendmail($data);
}
}
else
{
echo 0;
}	
}
}

    function _sendmail($data)
{	
	$this->load->library('email');
			$this->email->from('info@myangkasaemas.com', 'MyAngkasaemas Support Team');
			$this->email->to($data["email"]); 	
			$this->email->subject('MyAngkasaemas | Web Portal | Membership Renewal : '.$data["policy"]);
			$html=$this->load->view("renewalmember",$data,TRUE);	
		    $this->email->message($html);
			if($this->email->send())
		{
		return "1";	
		}
		else
		{
		return "0";
		}
			
			}


}