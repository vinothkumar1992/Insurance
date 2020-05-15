<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Members extends CI_Controller {

	
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
		$this->load->view('members');
	}

public function getmembers($id=1)
	{
	$pagination = $this->input->input_stream('pagination');
@$total =$pagination["total"];
if($pagination["page"]<0) $pagination["page"]=1;
	if($pagination["perpage"]<0) $pagination["perpage"]=10;
	

if($this->input->input_stream('query'))
{

	
$filter = $this->input->input_stream('query');
//echo $filter["generalSearch"];
$this->db->select('id,membership_id,members_name,form_payment_date,form_submission_date,submission_date,cdate,nric_no,email,mobile_phone_no');
if($filter["generalSearch"])
{
$this->db->like('LCASE(members_name)', strtolower($filter["generalSearch"]));
 $this->db->or_like('membership_id', strtolower($filter["generalSearch"]));
  $this->db->or_like('nric_no', strtolower($filter["generalSearch"]));
$query= $this->db->order_by('id', 'DESC')->get_where('customer_list_view',array("approval"=>"1"));
$total=$query->num_rows();
}
else
{

$this->db->select('id,membership_id,members_name,nric_no,form_payment_date,form_submission_date,submission_date,cdate,email,mobile_phone_no');
	$query= $this->db->order_by('id', 'DESC')->limit($pagination["perpage"], (($pagination["page"]*$pagination["perpage"])-$pagination["perpage"]))->get_where('customer_list_view',array("approval"=>"1"));;

	$total= $query->num_rows();
	}

}
else
{
	
	$this->db->select('id,membership_id,members_name,submission_date,form_payment_date,form_submission_date,cdate,nric_no,email,mobile_phone_no');
	$query= $this->db->order_by('id', 'DESC')->limit($pagination["perpage"], (($pagination["page"]*$pagination["perpage"])-$pagination["perpage"]))->get_where('customer_list_view',array("approval"=>"1"));;
$total= $query->num_rows();
	}


	$meta = array(
	"page"=>$pagination["page"],
	"pages"=> @$pagination["pages"],
	"perpage"=> $pagination["perpage"],
	"total"=> $total,
	"sort"=> "desc",
	"field" =>"id");
		
		$dataset= json_encode(array("meta"=>$meta, "data"=>$query->result()));

		$this->output->set_status_header(200)->set_content_type('application/json')->set_output($dataset);
	
	}

public function memberprofile($id=0)
{

$cus = $this->db->get_where('customer_view',array("id"=>$id))->row();
$nominees= $this->db->get_where('nominees', array('nominee_customerid' =>$cus->id))->row();
$doctor= $this->db->get_where('doctors', array('doctor_customer_id' =>$cus->id))->row();
$ques= $this->db->get_where('checklist', array('customer_id' =>$cus->id))->row();
$mem= $this->db->get_where('policies', array('customer_id' =>$cus->id))->row();
$row= $this->db->get_where('forms', array('form_nric' =>$cus->nric_no))->row();
if($cus)
{	
$dataset=(array)$cus;
$dataset["id"]=$id;
$dataset["nominees"]=$nominees;
$dataset["doctor"]=$doctor;
$dataset["ques"]=$ques;
$dataset["mem"]=$mem;
$this->load->model("fileview");
$tr=null;
if($row->form_payment_type=="Online")
{
$q = $this->db->get_where('payment_transaction', array('TxnID' => $row->form_txn_id))->row();

if($q)
$tr =$q->datas;
}

if($row->form_upload_slip)
{
$path =  APPPATH.'files/bankingslip/'.$row->form_upload_slip;
$type = pathinfo($path, PATHINFO_EXTENSION);
$data = file_get_contents($path);
if($type=="pdf")
{
$base64= '<embed src="'.base_url().'Pdfviewer/view?fname='.$row->form_upload_slip.'" type="application/pdf" " height="500"> </embed>'	;
//$base64='<embed src="http://www.africau.edu/images/default/sample.pdf" width="600" height="500"> </embed>'	; 
}else
{	
$base64 = '<img src="'.'data:image/' . $type . ';base64,' . base64_encode($data).'"  class="img-fluid">';
}
}
else
{
$base64=null;
}
$iccopy = $this->fileview->viewfrmCs($dataset['attachment1']);
$healthcopy = $this->fileview->viewfrmCs($dataset['attachment2']);
$nricupd2 = $this->fileview->viewfrmCs(@$dataset['nric_upd2']);
$nricupd3 = $this->fileview->viewfrmCs(@$dataset['nric_upd3']);
$nricupd4 = $this->fileview->viewfrmCs(@$dataset['nric_upd4']);

$dataset["payment_img"]= $base64;
$dataset["trhistory"]=$tr;
$dataset["ptype"]=$row->form_payment_type;
$dataset['attachment1']=$iccopy;
$dataset['attachment2']=$healthcopy;
$dataset['nric_upd2']=$nricupd2;
$dataset['nric_upd3']=$nricupd3;
$dataset['nric_upd4']=$nricupd4;
$dataset["sign"]=str_replace("[removed]","data:image/png;base64,",$dataset["sign"]);

//echo json_encode($dataset);

$this->load->view("memberprofile",$dataset);

}
}

}