<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	
	public function index()
	{
		$this->load->view('login');
	}

    public function verify()
    {
if($this->input->post('email') && $this->input->post("password"))
{
        $query = $this->db->query('select id,email,phone,username,role from users where email="'.$this->input->post('email').'"
          and password= md5("'.$this->input->post("password").'") and active=1');
         
          $row = $query->row();

if (isset($row))
{
 $sessiondata = (array) $row;
 unset($sessiondata["password"]);
 //$sessiondata["sid"]=md5($row->controller.date("ymdhis"));
 //print_r( $sessiondata);

 $this->session->set_userdata("maemsid",$sessiondata);
 echo base_url().'dashboard';
}
else {echo "0";}
}
else
{
  echo "0";  
}
         
    

}


}
