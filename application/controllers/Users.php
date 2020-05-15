<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {

	
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
		$this->load->view('users');
	}

public function getusers($id=1)
	{
	$pagination = $this->input->input_stream('pagination');
@$total =$pagination["total"];
if($pagination["page"]<0) $pagination["page"]=1;
	if($pagination["perpage"]<0) $pagination["perpage"]=10;
	

if($this->input->input_stream('query'))
{

	
$filter = $this->input->input_stream('query');
//echo $filter["generalSearch"];
$this->db->select('id,employee_no,username,ic_no,email,phone,department,active');
if($filter["generalSearch"])
{
$this->db->like('LCASE(username)', strtolower($filter["generalSearch"]));
$query= $this->db->order_by('id', 'DESC')->get('users');
$total=$query->num_rows();
}
else
{
$total= $this->db->query('SELECT * FROM users')->num_rows();
$this->db->select('id,employee_no,username,ic_no,email,phone,department,active');
	$query= $this->db->order_by('id', 'DESC')->limit($pagination["perpage"], (($pagination["page"]*$pagination["perpage"])-$pagination["perpage"]))->get('users');
}

}
else
{
	$total= $this->db->query('SELECT * FROM users')->num_rows();
	$this->db->select('id,employee_no,username,ic_no,email,phone,department,active');
	$query= $this->db->order_by('id', 'DESC')->limit($pagination["perpage"], (($pagination["page"]*$pagination["perpage"])-$pagination["perpage"]))->get('users');
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

public function adduser()
	{

$this->load->library('form_validation');
 $this->form_validation->set_rules('username', 'Username', 'required');
 //$this->form_validation->set_rules('password', 'Password', 'required');
 $this->form_validation->set_rules('email', 'Email', 'required|is_unique[users.email]');
 if ($this->form_validation->run() == FALSE)
                {
                         echo validation_errors();
                }
                else
                {
					$pass = $this->randomPassword();
					
					$input= $this->input->post();
				    unset($input['csrf_check']);
				
				    $input['password']=md5($pass);
                  $this->db->insert('users', $input);
   if($this->db->insert_id())
   {
   //echo 1;
   echo  $this->_sendmail($input['email'],$input['username'], $pass);
   }
   else
   {	   echo "Please contact admin" ;   

   }
   
   }



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
		return 1;	
		}
		else
		{
		return "Please contact admin";
		}
			
}

	public function edituser($id=0)
	{

		$this->db->select('id,username,ic_no,email,address,active,phone, role');
		$query = $this->db->get_where('users',array("id"=> $id));
		//echo json_encode($query->row());
		
		$this->output
            ->set_content_type('application/json')
            
            ->set_output(json_encode($query->row()));
		
		
	}
	
	public function getRole()
	{

		$query = $this->db->query('SELECT * FROM role');
		
		$dataset= json_encode($query->result());
	//echo json_encode($query->result());
		
		$this->output->set_status_header(200)->set_content_type('application/json')->set_output($dataset);
	
	
		
	}

	public function updateuser()
	{
	
		$userdata = $this->input->post();
		unset($userdata['csrf_check']);
		if(empty($userdata["password"]))
		{
		unset($userdata["password"]);
		}
		else
		{
		$userdata["password"]= md5($userdata["password"]);
		}
		$this->db->update("users", $userdata, array("id"=> $userdata["id"]) );
		   if($this->db->affected_rows()) echo 1; else echo "Please contact admin" ; 
				
		




}
}