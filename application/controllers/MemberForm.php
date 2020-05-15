<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MemberForm extends CI_Controller {


	public $sess;
    public $formData;
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
	
	public function newform($id)

{
 $this->load->library('encryption');
		$this->db->select('agent_id,agent_no,agent_name,agent_level,agent_gmid,agent_smid,agent_status');
		$query = $this->db->get_where('agents',array("agent_id"=>$id,'agent_status'=>1));
		if(1)
		//if(0)
		{
		$datas = $query->row_array();
$datas["mytoken"]=$this->encryption->encrypt("0_0_0_0");	
$datas["token"]= $id;	
		$this->load->view('formwizard',$datas);
		}
		else
		{
		$this->load->view('error');
		}

}

public function editForm($id)

{
 $this->load->library('encryption');
 $datas['id']=$id;
		if($datas)
		{
		//$datas = $query->row_array();
$datas["mytoken"]=$this->encryption->encrypt("0_0_0_0");
 $this->db->select('form_agent_id');
		$this->db->from('forms');
		$this->db->where('forms.id =', $id);	
		$query = $this->db->get()->row();
		
$datas["token"]= $query->form_agent_id;	
$this->formData=$datas;
		$this->load->view('editmemformwizard',$datas);
		}
		else
		{
		$this->load->view('error');
		}

}

	
	public function index()
	{
		$this->load->view('mform');
	}

public function formdata($id=0){
	 $this->db->select('*');
		$this->db->from('forms');
		$this->db->where('forms.id =', $id);
		$query = $this->db->get();
		$datas = $query->row_array();
		
	 $this->output
            ->set_content_type('application/json')
  
            ->set_output(json_encode($datas));
}

public function getforms($id=1)
	{
	$pagination = $this->input->input_stream('pagination');
@$total =$pagination["total"];
if($pagination["page"]<0) $pagination["page"]=1;
	if($pagination["perpage"]<0) $pagination["perpage"]=10;
	

if($this->input->input_stream('query'))
{

	
$filter = $this->input->input_stream('query');
//echo $filter["generalSearch"];
$this->db->select('id,form_name,form_orderid,form_nric,form_type,form_email,form_agent_id,form_phoneno,form_cdate,form_payment_status,form_payment_type,form_upload_slip');
if($filter["generalSearch"])
{
$this->db->like('LCASE(form_name)', strtolower($filter["generalSearch"]));
 $this->db->or_like('form_orderid', strtolower($filter["generalSearch"]));
 $this->db->or_like('form_nric', strtolower($filter["generalSearch"]));
 $this->db->or_like('form_email', strtolower($filter["generalSearch"]));
 $this->db->or_like('form_phoneno', strtolower($filter["generalSearch"]));
$query= $this->db->order_by('id', 'DESC')->get_where('forms',array("form_member_approval"=>"0"));
$total=$query->num_rows();
}
else
{
$total= $this->db->query('SELECT id,form_name,form_orderid,form_cdate,form_type,form_nric,form_agent_id,form_email,form_phoneno,form_payment_status ,form_payment_type,form_upload_slip FROM forms where form_member_approval=0')->num_rows();
$this->db->select('id,form_name,form_orderid,form_nric,form_cdate,form_type,form_agent_id,form_email,form_phoneno,form_payment_status,form_payment_type,form_upload_slip');
	$query= $this->db->order_by('id', 'DESC')->limit($pagination["perpage"], (($pagination["page"]*$pagination["perpage"])-$pagination["perpage"]))->get_where('forms',array("form_member_approval"=>"0"));
}

}
else
{
	$total= $this->db->query('SELECT id,form_name,form_orderid,form_cdate,form_nric,form_agent_id,form_type,form_email,form_phoneno,form_payment_status,form_payment_type,form_upload_slip FROM forms where form_member_approval=0')->num_rows();
	$this->db->select('id,form_name,form_orderid,form_cdate,form_nric,form_email,form_agent_id,form_type,form_phoneno,form_payment_status,form_payment_type,form_upload_slip');
	$query= $this->db->order_by('id', 'DESC')->limit($pagination["perpage"], (($pagination["page"]*$pagination["perpage"])-$pagination["perpage"]))->get_where('forms',array("form_member_approval"=>"0"));
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



public function payment_approval($id=0)
{


$row = $this->db->get_where('form_view', array('id' => $id))->row();
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

$dataset=(array)json_decode($row->form_data);

$this->load->model("fileview");
$iccopy = $this->fileview->viewfrmCs(@$dataset['attachment1']);
$healthcopy = $this->fileview->viewfrmCs(@$dataset['attachment2']);
$nricupd2 = $this->fileview->viewfrmCs(@$dataset['nric_upd2']);
$nricupd3 = $this->fileview->viewfrmCs(@$dataset['nric_upd3']);
$nricupd4 = $this->fileview->viewfrmCs(@$dataset['nric_upd4']);





$dataset['attachment1']=$iccopy;
$dataset['attachment2']=$healthcopy;
$dataset['nric_upd2']=$nricupd2;
$dataset['nric_upd3']=$nricupd3;
$dataset['nric_upd4']=$nricupd4;
$dataset['agent_name']="DIRECT SALES";
$dataset['agent_no']="DIRECT SALES";
$dataset['role_name']="DIRECT SALES";
if ($row->agent_name && $row->agent_no){
	$dataset['agent_name']=$row->agent_name;
$dataset['agent_no']=$row->agent_no;
$dataset['role_name']=$row->role_name;
	
}

	



$dataset["nominees"]=json_decode($row->nominee_data);
$dataset["doctor"]=json_decode($row->doctor_data);
$dataset["ques"]=json_decode($row->ques_data);

$dataset["payment_img"]= $base64;
$dataset["id"]=$row->id;
$dataset["form_orderid"]=$row->form_orderid;
$dataset["trhistory"]=$tr;
$dataset["ptype"]=$row->form_payment_type;
if (@$dataset["sign"]){
$dataset["sign"]=str_replace("[removed]","data:image/png;base64,",$dataset["sign"]);
}
$this->load->view("payment_approval",$dataset);

}

public function cancelslip()
{
$this->db->update("forms",array("form_upload_slip"=>0),array("form_orderid"=>$this->input->post("form_orderid")));

redirect("MemberForm","refresh");

}
	

public function paryment_approval_do()
{
if($this->input->post())
{
$this->db->update("forms",array("form_payment_status"=>1,"form_payment_date"=> $this->input->post("form_payment_date"),"form_submission_date"=> $this->input->post("form_submission_date")),array("id"=>$this->input->post("id"),"form_orderid"=>$this->input->post("form_orderid") ,"form_payment_status"=>"0"));
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

public function member_approval($id=0)
{
$row = $this->db->get_where('form_view', array('id' => $id))->row();


if($row->form_upload_slip)
{
$path =  APPPATH.'files/bankingslip/'.$row->form_upload_slip;
$type = pathinfo($path, PATHINFO_EXTENSION);
$data = file_get_contents($path);
if($type=="pdf")
{
$base64= '<embed src="'.base_url().'Pdfviewer/view?fname='.$row->form_upload_slip.'" type="application/pdf" " height="500"> </embed>'	;
}else
{	
$base64 = '<img src="'.'data:image/' . $type . ';base64,' . base64_encode($data).'"  class="img-fluid">';
}
}
else
{
$base64=null;
}	
$dataset=(array)json_decode($row->form_data);


$this->load->model("fileview");
$iccopy = $this->fileview->viewfrmCs($dataset['attachment1']);
$healthcopy = $this->fileview->viewfrmCs($dataset['attachment2']);
$nricupd2 = $this->fileview->viewfrmCs(@$dataset['nric_upd2']);
$nricupd3 = $this->fileview->viewfrmCs(@$dataset['nric_upd3']);
$nricupd4 = $this->fileview->viewfrmCs(@$dataset['nric_upd4']);




$cus=null;
if($row->form_payment_type=="Online")
{
$q = $this->db->get_where('payment_transaction', array('OrderNumber' => $row->form_orderid))->row();
$tr =$q->datas;
$m = $this->db->get_where('customers', array('nric_no' => $row->form_nric))->row();
$dataset["membershipid"]=$m->membership_id;
$dataset["mid"]=$m->id;
$cus=$m;
}
else
{
$tr=null;
$m = $this->db->get_where('customers', array('nric_no' => $row->form_nric))->row();
$dataset["membershipid"]=$m->membership_id;
$dataset["mid"]=$m->id;
$cus=$m;

}	

if($cus)
{
$nominees= $this->db->get_where('nominees', array('nominee_customerid' =>$cus->id))->row();
$doctor= $this->db->get_where('doctors', array('doctor_customer_id' =>$cus->id))->row();
$ques= $this->db->get_where('checklist', array('customer_id' =>$cus->id))->row();
$mem= $this->db->get_where('policies', array('customer_id' =>$cus->id))->row();
$dataset["nominees"]=$nominees;
$dataset["doctor"]=$doctor;
$dataset["ques"]=$ques;
$dataset["mem"]=$mem;
$dataset["payment_img"]= $base64;
$dataset['attachment1']=$iccopy;
$dataset['attachment2']=$healthcopy;
$dataset['nric_upd2']=$nricupd2;
$dataset['nric_upd3']=$nricupd3;
$dataset['nric_upd4']=$nricupd4;
$dataset['agent_name']="DIRECT SALES";
$dataset['agent_no']="DIRECT SALES";
$dataset['role_name']="DIRECT SALES";
if ($row->agent_name && $row->agent_no){
	$dataset['agent_name']=$row->agent_name;
$dataset['agent_no']=$row->agent_no;
$dataset['role_name']=$row->role_name;
	
}
$dataset["id"]=$row->id;
$dataset["form_orderid"]=$row->form_orderid;
$dataset["trhistory"]=$tr;
$dataset["sign"]=str_replace("[removed]","data:image/png;base64,",$dataset["sign"]);
$dataset["ptype"]=$row->form_payment_type;
$dataset["form_payment_date"]=$row->form_payment_date;
$dataset["form_submission_date"]=$row->form_submission_date;



$this->load->view("member_approval",$dataset);
 ;	
}


}

public function memeber_approval_do()
{
if($this->input->post())
{
$param= $this->input->post();
if($param["ptype"]=="Online")
{
$this->load->model("online");
$r= $this->online->approval($param);

if($r!=0)
{
//echo json_encode($r);	
$this->output->set_status_header(200)->set_content_type('application/json')->set_output(json_encode(array("sts"=>$this->_sendmail($r))));
}
else
{
return 0;
}
}

if($param["ptype"]=="Banking")
{

$this->load->model("banking");
$r=$this->banking->approval($param);
if($r!=0)
{
//echo json_encode($r);		
$this->output->set_status_header(200)->set_content_type('application/json')->set_output(json_encode(array("sts"=>$this->_sendmail($r))));
}
else
{
return 0;
}	

}
	

}	
else
{	
$this->output->set_status_header(200)->set_content_type('application/json')->set_output(json_encode(array("sts"=>0)));
}
}

public function done($id)
{

$comm=array();

$amount = 1980;
$this->db->update("forms",array("form_payment_status"=>1),array("form_orderid"=> $id));

$this->db->select('*');
		$query = $this->db->get_where('forms',array("form_orderid"=> $id));
		
		
	
		
if($query->num_rows())		
{		

$row = $query->row();



$new_customer =(array)json_decode($row->form_data);
$doctor =(array)json_decode($row->doctor_data);
$nominees =(array)json_decode($row->nominee_data);
$qusans =(array)json_decode($row->ques_data);
$new_customer["membership_id"] ="MAEB".$new_customer["nric_no"]."/".date("my");
unset($new_customer["mytoken"]);

$this->db->select('*');
		$query1 = $this->db->get_where('agents',array("agent_id"=> $row->form_agent_id));	

if($query1->num_rows())		
{		

$row1 = $query1->row();
 $new_customer['gm_id']=0;
  $new_customer['sm_id']=0;
   $new_customer['agent_id']=0;
if($row1->agent_level=="GM")
{
 $new_customer['gm_id']=$row->agent_id;

}

if($row1->agent_level=="SM"  && $row1->agent_gmid>0)
{
	
	$new_customer['gm_id']=$row1->agent_gmid;
	$new_customer['sm_id']=$row1->agent_id;

}

if($row1->agent_level=="SM"  && $row1->agent_gmid==0)
{
	
		$new_customer['sm_id']=$row1->agent_id;
}


if($row1->agent_level=="CS" && $row1->agent_gmid>0 && $row1->agent_smid>0)
{
	
	$new_customer['gm_id']=$row1->agent_gmid;
	$new_customer['sm_id']=$row1->agent_smid;
	$new_customer['agent_id']=$row1->agent_id;

}

if($row1->agent_level=="CS" && $row1->agent_gmid==0 && $row1->agent_smid==0)
{
	
	$new_customer['agent_id']=$row1->agent_id;

}

if($row1->agent_level=="CS" && $row1->agent_gmid>0 && $row1->agent_smid==0)
{
   $new_customer['gm_id']=$row1->agent_gmid;
   $new_customer['agent_id']=$row1->agent_id;
}

if($row1->agent_level=="CS" && $row1->agent_gmid==0 && $row1->agent_smid>0)
{
		
	$new_customer['sm_id']=$row1->agent_smid;
	$new_customer['agent_id']=$row1->agent_id;

}
}



// adding customer 
$this->db->insert("customers",$new_customer);
$customerid=$this->db->insert_id();


$data= array("form_agent_id"=>$row->form_agent_id,"name"=>$row->form_name,"email"=>$row->form_email,"form_orderid"=>$row->form_orderid,"customerid"=>$customerid,'form_payment_type'=>$row->form_payment_type,"form_upload_slip"=>$row->form_upload_slip);
$this->_akgsmail($data);




if($customerid)
{

$doctor["doctor_customer_id"]=$customerid;
$nominees["nominee_customerid"]=$customerid;
$qusans['customer_id']=$customerid;
$this->db->insert("doctors",$doctor);
$this->db->insert("nominees",$nominees);
$this->db->insert("checklist",$qusans);	
	
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
'ac_prodcut_amount'=>$amount
);
}

if($row->agent_level=="SM"  && $row->agent_gmid>0)
{
$comm= array(
'ac_gm_id'=>$row->agent_gmid,'ac_gm_percentage'=> '1','ac_gm_amount'=>((1 / 100)*$amount),
'ac_sm_id'=>$row->agent_id,'ac_sm_percentage'=>'9','ac_sm_amount'=>((9 / 100)*$amount),
"ac_customer_id"=>$customerid,
'ac_prodcut_amount'=>$amount
);
}

if($row->agent_level=="SM"  && $row->agent_gmid==0)
{
$comm= array(
'ac_sm_id'=>$row->agent_id,'ac_sm_percentage'=>'9','ac_sm_amount'=>((9 / 100)*$amount),
"ac_customer_id"=>$customerid,
'ac_prodcut_amount'=>$amount
);
}


if($row->agent_level=="CS" && $row->agent_gmid>0 && $row->agent_smid>0)
{
$comm= array(
'ac_gm_id'=>$row->agent_gmid,'ac_gm_percentage'=>'1','ac_gm_amount'=>((1 / 100)*$amount),
'ac_sm_id'=>$row->agent_smid,'ac_sm_percentage'=>'2','ac_sm_amount'=>((2 / 100)*$amount),
'ac_agent_id'=>$row->agent_id,'ac_agent_percentage'=>'7','ac_agent_amount'=>((7 / 100)*$amount),
"ac_customer_id"=>$customerid,
'ac_prodcut_amount'=>$amount
);
}

if($row->agent_level=="CS" && $row->agent_gmid==0 && $row->agent_smid==0)
{
$comm= array(
'ac_agent_id'=>$row->agent_id,'ac_agent_percentage'=>'7','ac_agent_amount'=>((7 / 100)*$amount),
"ac_customer_id"=>$customerid,
'ac_prodcut_amount'=>$amount,

);
}

if($row->agent_level=="CS" && $row->agent_gmid>0 && $row->agent_smid==0)
{
$comm= array(
'ac_gm_id'=>$row->agent_gmid,'ac_gm_percentage'=>'3','ac_gm_amount'=>((3 / 100)*$amount),
'ac_agent_id'=>$row->agent_id,'ac_agent_percentage'=>'7','ac_agent_amount'=>((7 / 100)*$amount),
"ac_customer_id"=>$customerid,
'ac_prodcut_amount'=>$amount
);
}


if($row->agent_level=="CS" && $row->agent_gmid==0 && $row->agent_smid>0)
{
$comm= array(
'ac_sm_id'=>$row->agent_smid,'ac_sm_percentage'=>'2','ac_sm_amount'=>((2 / 100)*$amount),
'ac_agent_id'=>$row->agent_id,'ac_agent_percentage'=>'7','ac_agent_amount'=>((7 / 100)*$amount),
"ac_customer_id"=>$customerid,
'ac_prodcut_amount'=>$amount
);
}


$this->db->insert("agent_commission",$comm);
}else {
	
	
	$comm= array("ac_customer_id"=>$customerid,
'ac_prodcut_amount'=>$amount
);
	
	$this->db->insert("agent_commission",$comm);
	
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
			$this->email->subject('MyAngkasaemas | Web Portal ');
			$html=$this->load->view("memberlink",$data,TRUE);	
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



    function _akgsmail($data)
{
$dataset =$data;

$base64=null;
$cus =$this->db->get_where('customers', array('id' =>$data["customerid"]))->row();

$form=$this->db->get_where('forms', array('form_orderid' =>$data["form_orderid"]))->row();

$agent=$this->db->get_where('agents', array('agent_id' =>$data["form_agent_id"]))->row();
$dataAgent="";
if ($agent && $agent->agent_email){
$dataAgent= array("email"=>$agent->agent_email);
}


if($form->form_payment_type=="Banking")
{
if($form->form_upload_slip)
{
$path =  APPPATH.'files/bankingslip/'.$form->form_upload_slip;
$type = pathinfo($path, PATHINFO_EXTENSION);
$img = file_get_contents($path);
$base64 = 'data:image/' . $type . ';base64,' . base64_encode($img);
}
else
{
$base64=null;
}

$dataset["base64"]=$base64;
}	

if($form->form_payment_type=="Online")
{
$ptr =$this->db->get_where('payment_transaction', array('OrderNumber' =>$data["form_orderid"]))->row();	
$dataset["ptr"] = json_decode($ptr->datas);
}
else
{
$dataset["ptr"]=null;
}	
$dataset["cus"] = $cus;
$dataset["base64"]=$base64;
$dataset["form_date"]=$form->form_cdate;
$dataset["form_orderid"] = $form->form_orderid;
$dataset["form_payment_date"] = $form->form_payment_date;

$this->load->library('pdf');

$html = $this->load->view("akgpaymentlink",$dataset,true);
$this->pdf->loadHtml($html);
$this->pdf->setPaper('A4','portrait');//landscape
$this->pdf->render();
$pdf = $this->pdf->output();

$mes= "Dear Member, <br>
We have attached acknowledge receipt. <br>
Thank You.";

	$this->load->library('email');
			$this->email->from('info@myangkasaemas.com', 'MyAngkasaemas Support Team');
			$this->email->to($data["email"]);
//echo json_encode($dataAgent["email"]);			
			if($dataAgent && $dataAgent["email"]){
$this->email->cc(array($dataAgent["email"],"admin@myangkasaemas.com"));

			}else {
				$this->email->cc('admin@myangkasaemas.com');
			}

			
			$this->email->subject('MyAngkasaemas | Web Portal | ACKNOWLEDGEMENT OF THE PAYMENT FOR MEMBERSHIP');
	        $this->email->message($mes);
		    $this->email->attach($pdf, 'attachment', $data["form_orderid"].".pdf", 'application/pdf');
			
			if($this->email->send())
		{
		return "1";	
		}
		else
		{
		return "0";
		}
}	




public function test()
{
$data["form_orderid"]="MES2003190603381";
$data["customerid"]="1";
$base64=null;

$cus =$this->db->get_where('customers', array('id' =>$data["customerid"]))->row();

$form=$this->db->get_where('forms', array('form_orderid' =>$data["form_orderid"]))->row();

if($form->form_payment_type=="Banking")
{
if($form->form_upload_slip)
{
$path =  APPPATH.'files/bankingslip/'.$form->form_upload_slip;
$type = pathinfo($path, PATHINFO_EXTENSION);
$img = file_get_contents($path);
$base64 = 'data:image/' . $type . ';base64,' . base64_encode($img);
}
else
{
$base64=null;
}


}	



if($form->form_payment_type=="Online")
{
$ptr =$this->db->get_where('payment_transaction', array('OrderNumber' =>$data["form_orderid"]))->row();	
$dataset["ptr"] = json_decode($ptr->datas);

}
else
{
$dataset["ptr"]=null;
}	
$dataset["cus"] = $cus;
$dataset["form_date"]=$form->form_cdate;
$dataset["base64"]=$base64;

$dataset["cus"] = $cus;
$dataset["form_orderid"] = $form->form_orderid;

$this->load->library('pdf');
$html = $this->load->view("akgpaymentlink",$dataset,true);
$this->pdf->loadHtml($html);
$this->pdf->setPaper('A4','portrait');//landscape
$this->pdf->render();
$pdf = $this->pdf->output();

 
	$this->pdf->stream("abc.pdf", array('Attachment'=>0));


}

public function umrpt()


{
	
		$this->db->select(array('form_name','form_orderid','form_nric','form_email','form_phoneno','form_payment_type',
		'form_payment_status','form_member_approval','form_cdate'));
		$this->db->from('view_unconfirmed');
		$this->db->where('view_unconfirmed.form_cdate >="2020-01-01 2:07:37"');
        $this->db->where('view_unconfirmed.form_cdate <="2020-03-28 2:07:37"');
	     //$this->db->where('view_unconfirmed.agent_id =', $this->sess["agent_id"]);
	    $query = $this->db->get();
		 $str = $this->db->last_query();
		// print_r($str);
		//create by vinoth on 25/03/2020
		$fileName = 'unconfirmed';  
		$employeeData = $query->result_array();
		
		$dataset["new_row"] = $employeeData;
		//echo json_encode($employeeData);
	
	//$this->load->view("testrpt",$dataset);
	
	
$this->load->library('pdf');
$html = $this->load->view("umrpt",$dataset,true);
$this->pdf->loadHtml($html);
$this->pdf->setPaper('A4','landscape');//landscape
$this->pdf->render();
 //$pdf=$this->pdf->output();
 $this->pdf->stream("abc.pdf", array('Attachment'=>0));
 
}

public function cmrpt()


{
	$this->db->select(array('ac_id', 'ac_agent_id', 'ac_agent_percentage', 'ac_agent_amount', 'ac_sm_id', 'ac_sm_percentage',
		'ac_sm_amount', 'ac_gm_id', 'ac_gm_percentage', 'ac_gm_amount', 'ac_product_id', 'ac_product_name', 'ac_prodcut_amount',
		'ac_customer_id', 'ac_approval', 'ac_status', 'ac_cdate', 'ac_update', 'members_name', 'membership_id', 'cs_no', 'cs_name',
		'sm_no', 'sm_name', 'gm_no', 'gm_name'));
		$this->db->from('view_commission');
		$this->db->where('view_commission.ac_cdate >="2020-04-01 2:07:37"');
        $this->db->where('view_commission.ac_cdate <="2020-04-30 2:07:37"');
	     // $this->db->where('view_commission.ac_sm_id =443');
	    $query = $this->db->get();
		//$str = $this->db->last_query();
		//print_r($str);
		//create by vinoth on 25/03/2020
		$fileName = 'commission';  
		$employeeData = $query->result_array();
			//echo json_encode($employeeData);
		
	 $dataset["new_row"] = $employeeData;
		//echo json_encode($employeeData);
	
	$this->load->view("cm",$dataset);
	
	
$this->load->library('pdf');
$html = $this->load->view("cm",$dataset,true);
$this->pdf->loadHtml($html);
$this->pdf->setPaper('A4','landscape');//landscape
$this->pdf->render();
 //$pdf=$this->pdf->output(); 
  $this->pdf->stream("abc.pdf", array('Attachment'=>0));
 
}

public function renrpt(){
	
	$this->db->select(array('id','membership_type','membership_id','primary_nirc','members_name','nric_no','date_of_birth','gender','nationality',
		'race','marital_status','occupation','health_declaration','address1','city','state','postcode','home_office_phone_no',
		'mobile_phone_no','submission_date','email','cdate','gm_id','sm_id','agent_id','policy_start_date','policy_end_date'));
		$this->db->from('view_renewal');
		$this->db->where('view_renewal.policy_end_date >="2020-01-28 2:07:37"');
        $this->db->where('view_renewal.policy_end_date <="2021-03-28 2:07:37"');
	    $this->db->where('view_renewal.agent_id =2459');
	    $query = $this->db->get();
		 $str = $this->db->last_query();
		//print_r($str);
		//create by vinoth on 25/03/2020
		$fileName = 'renewal';  
		$employeeData = $query->result_array();
	 $dataset["new_row"] = $employeeData;
		//echo json_encode($employeeData);
	
	$this->load->view("renrpt",$dataset);
	
		
$this->load->library('pdf');
$html = $this->load->view("renrpt",$dataset,true);
$this->pdf->loadHtml($html);
$this->pdf->setPaper('A4','landscape');//landscape
$this->pdf->render();
 //$pdf=$this->pdf->output(); 
  $this->pdf->stream("abc.pdf", array('Attachment'=>0));
}


public function masterdatarpt(){
	
$this->db->select(array('id','membership_type','membership_id','primary_nirc','members_name','nric_no','date_of_birth','gender','nationality',
		'race','marital_status','occupation','health_declaration','address1','city','state','postcode','home_office_phone_no',
		'mobile_phone_no','submission_date','email','cdate','gm_id','sm_id','agent_id','SM_NAME','GM_NAME','AGENT_NAME'));
		$this->db->from('master_data');
		//$this->db->where('master_data.cdate >=', date('Y-m-d G:i:s', strtotime($userdata['start'])));
        //$this->db->where('master_data.cdate <=', date('Y-m-d G:i:s', strtotime($userdata['end'])));
		$this->db->where('master_data.AGENT =', $this->sess["agent_id"]);
	
	    $query = $this->db->get();
		 //$str = $this->db->last_query();
		// print_r($str);
		//create by vinoth on 25/03/2020
		$fileName = 'master_data';  
		$employeeData = $query->result_array();
			echo json_encode($employeeData);
		//echo json_encode($employeeData);
	
	//$this->load->view("renrpt",$dataset);
	
		
$this->load->library('pdf');
$html = $this->load->view("renrpt",$dataset,true);
$this->pdf->loadHtml($html);
$this->pdf->setPaper('A4','landscape');//landscape
$this->pdf->render();
 //$pdf=$this->pdf->output(); 
  $this->pdf->stream("abc.pdf", array('Attachment'=>0));
}
public function signtest(){
	
		
		$form=$this->db->get_where('forms', array('id' => 14))->row();
	
	

$data= array("form_agent_id"=>$form->form_agent_id,"name"=>$form->form_name,"email"=>$form->form_email,"form_orderid"=>$form->form_orderid,"customerid"=>"1074",'form_payment_type'=>$form->form_payment_type,"form_upload_slip"=>$form->form_upload_slip);

//echo json_encode($data);
//$this->_akgsmail($data);

//echo json_encode($data);
//$this->_akgsmail($data);

//echo "Success";

//$this->load->view('signFormExt');

}

public function sendlinkSign($id=0)
{
if($this->input->post("email") || $this->input->post("phone") )
{
$date= new DateTime('+1 day');
$time=$date->format('Y-m-d H:i:s');
$ciphertext = $this->input->post("agentid").'_'.$time.'_'.hash('sha256',$this->input->post("agentid").$time."@@@@@@@++@@@@@@");	
$this->db->select('form_name,form_nric');
		$query = $this->db->get_where('forms',array("id"=> $this->input->post("agentid")))->row();
	

$link="https://myangkasaemas.com/MAEM/MemberSignExt/signature?token=".$ciphertext."&".http_build_query($query);

if($this->input->post("email"))
{
$this->load->library('email');
$this->email->from('info@myangkasaemas.com', 'MyAngkasaemas Support Team');
			$this->email->to($this->input->post("email")); 	
			$this->email->subject('Welcome to MyAngkasaemas Member');
			$html=$this->load->view("linkemailsign",array("name"=>"","link"=>$link),TRUE);	
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

public function resendAkg(){
	
	
	
		$form=$this->db->get_where('forms', array('id' => 14))->row();
	
	

$data= array("form_agent_id"=>$form->form_agent_id,"name"=>$form->form_name,"email"=>$form->form_email,"form_orderid"=>$form->form_orderid,"customerid"=>"1074",'form_payment_type'=>$form->form_payment_type,"form_upload_slip"=>$form->form_upload_slip);

echo json_encode($data);
//$this->_akgsmail($data);

	
	
	
}

public function resendAkgEmail($id=0)
{

$email =$this->input->post("email");
$customerid =$this->input->post("id");

if ($customerid){

$base64=null;
$cus =$this->db->get_where('customers', array('id' =>$customerid))->row();
$form=$this->db->get_where('forms', array('form_nric' =>$cus->nric_no))->row();



if($form->form_payment_type=="Banking")
{
if($form->form_upload_slip)
{
$path =  APPPATH.'files/bankingslip/'.$form->form_upload_slip;
$type = pathinfo($path, PATHINFO_EXTENSION);
$img = file_get_contents($path);
$base64 = 'data:image/' . $type . ';base64,' . base64_encode($img);
}
else
{
$base64=null;
}

$dataset["base64"]=$base64;
}	

if($form->form_payment_type=="Online")
{
$ptr =$this->db->get_where('payment_transaction', array('OrderNumber' =>$form->form_orderid))->row();	
$dataset["ptr"] = json_decode($ptr->datas);
}
else
{
$dataset["ptr"]=null;
}	
$dataset["cus"] = $cus;
$dataset["base64"]=$base64;
$dataset["form_date"]=$form->form_cdate;
$dataset["form_orderid"] = $form->form_orderid;
$dataset["form_payment_date"] = $form->form_payment_date;

$this->load->library('pdf');

$html = $this->load->view("akgpaymentlink",$dataset,true);
$this->pdf->loadHtml($html);
$this->pdf->setPaper('A4','portrait');//landscape
$this->pdf->render();
$pdf = $this->pdf->output();

$mes= "Dear Member, <br>
We have attached acknowledge receipt. <br>
Thank You.";

	$this->load->library('email');
			$this->email->from('info@myangkasaemas.com', 'MyAngkasaemas Support Team');
			$this->email->to($email);
			$this->email->subject('MyAngkasaemas | Web Portal | ACKNOWLEDGEMENT OF THE PAYMENT FOR MEMBERSHIP');
	        $this->email->message($mes);
		    $this->email->attach($pdf, 'attachment', $form->form_orderid.".pdf", 'application/pdf');
			
			if($this->email->send())
		{
		$data = array("msg"=>"Payment acknowledgement sent, please check your mail inbox/Spam","phone"=>$this->input->post("phone"),"status"=>1);
 $this->output->set_content_type('application/json')->set_output(json_encode($data))->set_status_header(200);	
		
		}
		else
		{
		$data = array("msg"=>"Please contact admin","phone"=>$this->input->post("phone"),"status"=>0 );
 $this->output->set_content_type('application/json')->set_output(json_encode($data))->set_status_header(200);		

		}

}

}	



}

