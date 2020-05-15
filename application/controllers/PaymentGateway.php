<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PaymentGateway extends CI_Controller {

	
	public function index()
	{
	
	}


public function callbackurl()
{

$data = json_encode($this->input->post());
$datas=array("PaymentID"=>$this->input->post("PaymentID"),"OrderNumber"=>$this->input->post("OrderNumber"),"TxnID"=>$this->input->post("TxnID"),"TxnMessage"=>$this->input->post("TxnMessage"),"datas"=>$data);
$this->db->insert('payment_transaction', $datas);
echo "OK";
$this->done($this->input->post("OrderNumber"),$this->input->post("TxnID"));
}

public function returnurl()
{

if($this->input->get())
{
$data = json_encode($this->input->get());
$datas=array("PaymentID"=>$this->input->get("PaymentID"),"OrderNumber"=>$this->input->get("OrderNumber"),"TxnID"=>$this->input->get("TxnID"),"TxnMessage"=>$this->input->get("TxnMessage"),"datas"=>$data);
$this->db->insert('payment_transaction', $datas);
$this->load->view("trstatus",array("sms"=>$this->input->get("TxnMessage"),'tr'=>"Order number : ".$this->input->get("OrderNumber")));
}	
	
if($this->input->post())
{

$data = json_encode($this->input->post());
$datas=array("PaymentID"=>$this->input->post("PaymentID"),"OrderNumber"=>$this->input->post("OrderNumber"),"TxnID"=>$this->input->post("TxnID"),"TxnMessage"=>$this->input->post("TxnMessage"),"datas"=>$data);
//$this->db->insert('payment_transaction', $datas);
//echo "OK";
//$this->done($this->input->post("OrderNumber"),$this->input->post("TxnID"));

$this->load->view("trstatus",array("sms"=>$this->input->post("TxnMessage"),'tr'=>"Order number : ".$this->input->post("OrderNumber")));

}	

}

public function done($id,$txnid)
{

$comm=array();

$amount = 1980;
$this->db->update("forms",array("form_payment_status"=>0,"form_txn_id"=>$txnid),array("form_orderid"=> $id));
/*
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

// adding customer 
$this->db->insert("customers",$new_customer);
$customerid=$this->db->insert_id();




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
}
}
else
{
echo 0;
}	
}
*/
}

public function eGHLgateway()
{
	
if($this->input->get("form_orderid")) {
	
		$query =$this->db->query("SELECT COUNT(*) as countres FROM `payment_transaction` where OrderNumber='".$this->input->get("form_orderid")."'");
 $res= $query->result();
	
 if ($res[0]->countres == "0"){	
$formname =array("name"=>"eGHL" ,"id"=>"eGHL");
$url="https://securepay.e-ghl.com/IPG/Payment.aspx";
$paymentid=$order="MYA".str_pad(date("ymdHis"), 9, 0, STR_PAD_LEFT);;
$orderno=$this->input->get("form_orderid");
//$paymentid="MEPID".$this->input->get("id");
//$orderno="MEOID".$this->input->get("id");
$ip= $this->input->ip_address();
$callbackurl=base_url().'PaymentGateway/callbackurl';
$returnurl= base_url().'PaymentGateway/returnurl';
$amount ="1980.00";
$hash=hash('sha256',"zWEvA6HUMYA".$paymentid.$returnurl.$callbackurl.$amount."MYR".$ip."600");

$hidden= array (
 'TransactionType' => 'SALE',
  'ServiceID' => 'MYA',
  'MerchantName' => 'MYANGKASA EMAS MEDICARE SDN BHD',
  'MerchantCallBackURL' => base_url().'PaymentGateway/callbackurl',
  'MerchantReturnURL' => base_url().'PaymentGateway/returnurl',
  'LanguageCode' => 'en',
  'PageTimeout' => '600',
  'PaymentDesc' => 'Myangkasa Emas Membership Payment',
  'CurrencyCode' => 'MYR',
  'PymtMethod' => 'ANY',
  'PaymentID' => $paymentid,
  'OrderNumber' => $orderno,
  'CustIP' => $this->input->ip_address(),
  'CustName' => $this->input->get("form_name"),
  'CustEmail' => $this->input->get("form_email"),
  'CustPhone' => $this->input->get("form_phoneno"),
  'Amount' => $amount,
  'HashValue' => $hash
);


$this->load->helper('form');
$this->load->view('eghl',array("url"=>$url,"formname"=>$formname,"hidden"=>$hidden));
}else {
	 
	 $this->load->view("status",array("sms"=>"Payment is already complete","msg"=>"We have already received your Online Payment"));	
	 
 }


}else
{
$this->load->view('error');
}	
}

public function eGHLgatewayTest()
{
	
if($this->input->get("form_orderid")) {
	
	$query =$this->db->query("SELECT COUNT(*) as countres FROM `payment_transaction` where OrderNumber=".$this->input->get("form_orderid")."");
 $res= $query->result();
	
 if ($res[0]->countres == "0"){	
$formname =array("name"=>"eGHL" ,"id"=>"eGHL");
$url="https://test2pay.ghl.com/IPGSG/Payment.aspx";
$paymentid=$order="MEP".str_pad(date("ymdHis"), 9, 0, STR_PAD_LEFT);;
$orderno=$this->input->get("form_orderid");
//$paymentid="MEPID".$this->input->get("id");
//$orderno="MEOID".$this->input->get("id");
$ip= $this->input->ip_address();
$callbackurl=base_url().'PaymentGateway/callbackurl';
$returnurl= base_url().'PaymentGateway/returnurl';

$hash=hash('sha256',"sit12345SIT".$paymentid.$returnurl.$callbackurl."1980.00MYR".$ip."600");

$hidden= array (
 'TransactionType' => 'SALE',
  'ServiceID' => 'SIT',
  'MerchantName' => 'Myangkasa Emas',
  'MerchantCallBackURL' => base_url().'PaymentGateway/callbackurl',
  'MerchantReturnURL' => base_url().'PaymentGateway/returnurl',
  'LanguageCode' => 'en',
  'PageTimeout' => '600',
  'PaymentDesc' => 'Myangkasa Emas Membership Payment',
  'CurrencyCode' => 'MYR',
  'PymtMethod' => 'ANY',
  'Password' => 'sit12345',
  'PaymentID' => $paymentid,
  'OrderNumber' => $orderno,
  'CustIP' => $this->input->ip_address(),
  'CustName' => $this->input->get("form_name"),
  'CustEmail' => $this->input->get("form_email"),
  'CustPhone' => $this->input->get("form_phoneno"),
  'Amount' => '1980.00',
  'HashValue' => $hash
);


$this->load->helper('form');
$this->load->view('eghl',array("url"=>$url,"formname"=>$formname,"hidden"=>$hidden));

 }else {
	 
	 $this->load->view("status",array("sms"=>"Online Payment is complete","msg"=>"We have received your Online Payment"));	
	 
 }


}else
{
$this->load->view('error');
}





	
}

public function test()
{
//echo $this->input->ip_address();

echo "MAEB820505123456/".date("my");
}
}


