<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	
		
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
		$this->load->helper('url');
     
	
	}
	
	
	public function index()
	{
		$this->load->view('dashboard');
	}



public function monthlysales()
{
	
$months=  array("January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December");
$query =$this->db->query("SELECT MONTHNAME(form_cdate) AS month, COUNT(*) as total  FROM forms  where form_payment_status=1 and form_member_approval=1 and YEAR(form_cdate) = YEAR(CURDATE())  GROUP BY MONTHNAME(form_cdate)");

$data=array();
$data1=array();
foreach ($query->result() as $row)
{
for($c=0;$c<count($months);$c++)
{
if($row->month==$months[$c])
{$data[$c]=$row->total;
$data1[$c]=$row->total;
}
else 
{
$data[$c]=0;
$data1[$c]=0;	
}
}	

}
$chartData["labels"] =$months;
$chartData["datasets"][0]= array("backgroundColor"=>"#34bfa3","data"=>$data);
//$chartData["datasets"][1]= array("backgroundColor"=>"#EFEFF4","data"=>$data1);

$this->output->set_status_header(200)->set_content_type('application/json')->set_output(json_encode($chartData));

}

public function onlinepayment()
{
	$months=  array("January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December");

$query =$this->db->query("SELECT MONTHNAME(form_cdate) AS month, COUNT(*) as total FROM `forms` WHERE `form_payment_type` = 'Online' and form_payment_status=1 and form_member_approval=1 and YEAR(form_cdate) = YEAR(CURDATE()) GROUP BY MONTHNAME(form_cdate)");

$total =0;
$data=array();

foreach ($query->result() as $row)
{
for($c=0;$c<count($months);$c++)
{
if($row->month==$months[$c])
{$data[$c]=$row->total;
$total =$total +$row->total;
}
else 
{
$data[$c]=0;

}
}	
}

$chartData["labels"] = $months;
$chartData["datasets"][0] =array("label"=>"Online Payment","backgroundColor"=>"#34bfa3","data"=>$data);
$this->output->set_status_header(200)->set_content_type('application/json')->set_output(json_encode(array("total"=>$total,"chartdata"=>$chartData)));

}

public function bankingpayment()
{
	$months=  array("January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December");

$query =$this->db->query("SELECT MONTHNAME(form_cdate) AS month, COUNT(*) as total FROM `forms` WHERE `form_payment_type` = 'Banking' and form_payment_status=1 and form_member_approval=1 and YEAR(form_cdate) = YEAR(CURDATE()) GROUP BY MONTHNAME(form_cdate)");

$total =0;
$data=array();
//print_r($query->result());
$new_count=0;
foreach ($query->result() as $row)
{
for($c=0;$c<count($months);$c++)
{
if($row->month==$months[$c])
{
	
$datarecord[$new_count]=array("month"=>$months[$c],"count"=>$row->total,"position"=>$c); //$row->total;

$total =$total +$row->total;
}
}
$new_count++;
}
$data=array(0,0,0,0,0,0,0,0,0,0,0,0);
for($c=0;$c<count($datarecord);$c++)
{
//$datarecord[$new_count]=array("month"=>$months[$c],"count"=>$row->total); //$row->total;
$data[$datarecord[$c]['position']]=$datarecord[$c]['count'];
}


$chartData["labels"] = $months;
$chartData["datasets"][0] =array("label"=>"Offline Payment","backgroundColor"=>"#ffb822","data"=>$data);
$this->output->set_status_header(200)->set_content_type('application/json')->set_output(json_encode(array("total"=>$total,"chartdata"=>$chartData)));

}

public function agenttotal()
{
$gm =$this->db->query("SELECT count(agent_level) as gm_total FROM `agents` WHERE `agent_level` = 'GM' ORDER BY `agent_id` DESC")->row();
$sm =$this->db->query("SELECT count(agent_level) as sm_total FROM `agents` WHERE `agent_level` = 'SM' ORDER BY `agent_id` DESC")->row();
$cs =$this->db->query("SELECT count(agent_level) as cs_total FROM `agents` WHERE `agent_level` = 'CS' ORDER BY `agent_id` DESC")->row();


$datasets["data"]=array($gm->gm_total,$sm->sm_total,$cs->cs_total);
$datasets["backgroundColor"] = array("#34bfa3","#36a3f7","#fd3995"); 
$chartData["labels"] =array("GROUP MANAGER","SENIOR MANAGER","CONSULTANTS");

$chartData["datasets"][0] =$datasets;
$this->output->set_status_header(200)->set_content_type('application/json')->set_output(json_encode(array("total"=>($gm->gm_total+$sm->sm_total+$cs->cs_total),"chartdata"=>$chartData)));

}


public function agerange()
{
	

$age_17_20 =$this->db->query("SELECT count(*) as age_17_20  FROM `view_agerange` WHERE `age` <= 20")->row();
$age_20_30 =$this->db->query("SELECT count(*) as age_20_30 FROM `view_agerange` WHERE `age` between 21 and 30")->row();
$age_30_40 =$this->db->query("SELECT count(*) as age_30_40 FROM `view_agerange` WHERE `age` >=31 and `age`<=40")->row();
$age_40_50 =$this->db->query("SELECT count(*) as age_40_50 FROM `view_agerange` WHERE `age` >=41 and `age`<=50")->row();
$age_50_60 =$this->db->query("SELECT count(*) as age_50_60 FROM `view_agerange` WHERE `age` >=51 and  `age`<=60")->row();
$age_60_70 =$this->db->query("SELECT count(*) as age_60_70 FROM `view_agerange` WHERE `age` >=61 and `age`<=70")->row();
$age_71= $this->db->query("SELECT count(*) as age_71  FROM `view_agerange` WHERE `age` >= 71")->row();


$datasets["data"]=array($age_17_20->age_17_20,$age_20_30->age_20_30,$age_30_40->age_30_40,$age_40_50->age_40_50,$age_50_60->age_50_60,$age_60_70->age_60_70,$age_71->age_71);
$datasets["backgroundColor"] = array("#fd3995","#ffb822","#282a3c","#5867dd","#34bfa3","#36a3f7","#A2A5B9"); 
$chartData["labels"] =array("17-20","20-40","30-40","40-50","50-60","60-70","Above 70");

$chartData["datasets"][0] =$datasets;
$this->output->set_status_header(200)->set_content_type('application/json')->set_output(json_encode(array("total"=>($age_17_20->age_17_20 + $age_20_30->age_20_30 + $age_30_40->age_30_40 +$age_40_50->age_40_50 + $age_50_60->age_50_60 + $age_60_70->age_60_70+$age_71->age_71),"chartdata"=>$chartData)));

}

}
