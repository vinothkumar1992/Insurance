<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Subconsultants extends CI_Controller {

	
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
		$this->load->view('subagents');
	}

public function getagents($id=1)
	{
	$pagination = $this->input->input_stream('pagination');
@$total =$pagination["total"];
if($pagination["page"]<0) $pagination["page"]=1;
	if($pagination["perpage"]<0) $pagination["perpage"]=10;

	$agentwhere=array();
	$agentTotal="";
if($this->input->get("level")=="GM")
{
$agentwhere = array("agent_gmid"=>$this->input->get("id"));
$agentTotal=" where agent_gmid = ".$this->input->get("id");
}	

if($this->input->get("level")=="SM")
{
$agentwhere = array("agent_smid"=>$this->input->get("id"));
$agentTotal=" where agent_smid = ".$this->input->get("id");
}


if($this->input->input_stream('query'))
{
	
$filter = $this->input->input_stream('query');
//echo $filter["generalSearch"];
$this->db->select('agent_id,agent_no,agent_name,agent_level,agent_gmid,agent_smid,agent_status,agent_approval');
//$this->db->like($where);
if($filter["generalSearch"])
{
$this->db->like('LCASE(agent_name)', strtolower($filter["generalSearch"]));
 $this->db->or_like('agent_no', strtolower($filter["generalSearch"]));
  $this->db->or_like('agent_level', strtolower($filter["generalSearch"]));
$query= $this->db->order_by('agent_id', 'DESC')->get_where('agents',$agentwhere);
$total=$query->num_rows();
}
else
{

$this->db->select('agent_id,agent_no,agent_name,agent_level,agent_gmid,agent_smid,agent_status,agent_approval');

	$query= $this->db->order_by('agent_id', 'DESC')->limit($pagination["perpage"], (($pagination["page"]*$pagination["perpage"])-$pagination["perpage"]))->get_where('agents',$agentwhere);
$total= $this->db->query('SELECT * FROM agents	'.$agentTotal)->num_rows();
}

}
else
{
	$this->db->select('agent_id,agent_no,agent_name,agent_level,agent_gmid,agent_smid,agent_status,agent_approval');

	$query= $this->db->order_by('agent_id', 'DESC')->limit($pagination["perpage"], (($pagination["page"]*$pagination["perpage"])-$pagination["perpage"]))->get_where('agents',$agentwhere);
$total= $this->db->query('SELECT * FROM agents	'.$agentTotal)->num_rows();
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
}