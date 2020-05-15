<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {

    

    public $sess;

    public function __construct()
	{
		parent::__construct();
	

		if($this->session->userdata('maemsid'))
		{
	    $s = $this->session->userdata('maemsid');
	//	$this->sess = $s["id"];	
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
        
        
        $this->load->view('profile');
        

	}

public function update()
{
if($this->input->post())
{

    $data = array('username' => $this->input->post("username"),'phone'=>$this->input->post("phone"));
$this->db->where(array('email'=>$this->input->post("email")));
$this->db->update('users', $data);			
if($this->db->affected_rows())
{	
echo 'profile has updated';             
}
else
{
echo '0'; 
}


}
else
{
    echo '0';  
}

}

public function pchange()
{

if($this->input->post("np") && $this->input->post("op") && $this->input->post("email"))
    {
$data = array('password' => md5($this->input->post("np")));
$this->db->where(array('email'=>$this->input->post("email"),"password"=>md5($this->input->post("op"))));
$this->db->update('users', $data);			
if($this->db->affected_rows())
{	
echo 'Password has updated';             
}
else
{
echo '0'; 
}
    }
    else
    {
        echo '0';
    }

}

}
