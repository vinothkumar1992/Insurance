<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Commission extends CI_Controller {

	
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
$this->load->view("commission");
}
	

public function getcommission($id=1)
	{
	$pagination = $this->input->input_stream('pagination');
@$total =$pagination["total"];
if($pagination["page"]<0) $pagination["page"]=1;
	if($pagination["perpage"]<0) $pagination["perpage"]=10;
	

if($this->input->input_stream('query'))
{

	
$filter = $this->input->input_stream('query');
//echo $filter["generalSearch"];
$this->db->select('*');
if($filter["generalSearch"])
{
$this->db->like('LCASE(cs_name)', strtolower($filter["generalSearch"]));
$this->db->or_like('LCASE(cs_no)', strtolower($filter["generalSearch"]));
$this->db->or_like('LCASE(sm_no)', strtolower($filter["generalSearch"]));
$this->db->or_like('LCASE(sm_name)', strtolower($filter["generalSearch"]));
$this->db->or_like('LCASE(gm_no)', strtolower($filter["generalSearch"]));
$this->db->or_like('LCASE(gm_name)', strtolower($filter["generalSearch"]));
 $this->db->or_like('members_name', strtolower($filter["generalSearch"]));
  $this->db->or_like('membership_id', strtolower($filter["generalSearch"]));	
$query= $this->db->order_by('ac_id', 'DESC')->get_where('view_commission',array("ac_approval"=>"1"));
$total=$query->num_rows();
}
else
{

$this->db->select('*');
	$query= $this->db->order_by('ac_id', 'DESC')->limit($pagination["perpage"], (($pagination["page"]*$pagination["perpage"])-$pagination["perpage"]))->get_where('view_commission',array("ac_approval"=>"1"));

	$total= $query->num_rows();
	}

}
else
{
	//$total= $this->db->query('SELECT *  from view_commission')->num_rows();
	$this->db->select('*');
	$query= $this->db->order_by('ac_id', 'DESC')->limit($pagination["perpage"], (($pagination["page"]*$pagination["perpage"])-$pagination["perpage"]))->get_where('view_commission',array("ac_approval"=>"1"));
$total= $query->num_rows();
	}


	$meta = array(
	"page"=>$pagination["page"],
	"pages"=> @$pagination["pages"],
	"perpage"=> $pagination["perpage"],
	"total"=> $total,
	"sort"=> "desc",
	"field" =>"ac_id");
		
		$dataset= json_encode(array("meta"=>$meta, "data"=>$query->result()));

		$this->output->set_status_header(200)->set_content_type('application/json')->set_output($dataset);
	
	}


	public function editagent($id=0)
	{

	
		$this->db->select('*');
		$query = $this->db->get_where('agents',array("ac_id"=> $id));
	//	echo json_encode($query->row());
		
		$this->output
            ->set_content_type('application/json')
            
            ->set_output(json_encode($query->row()));
	
	}


public function test()
{
$q=$query = $this->db->get('agent_commission');

echo json_encode($query->result());

}


}