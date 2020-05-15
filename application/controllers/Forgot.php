<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Forgot extends CI_Controller {

	public function index()
	{

        if($this->input->post('email') )
        {
                $query = $this->db->query('select id,email,username from users where email="'.$this->input->post('email').'"');
                 
                  $row = $query->row();
        
        if (isset($row))
        {
         $sessiondata = (array) $row;
         $pass = $this->randomPassword();
         $this->db->update("users",array("password"=>md5($pass)),array("id"=>$row->id,"email"=>$row->email));
         //$sessiondata["sid"]=md5($row->controller.date("ymdhis"));
         //print_r( $sessiondata);
         echo  $this->_sendmail($row->email,$row->username, $pass);
        
        
        }
        else {echo "0";}    
        }
        else
        {
          echo "0";  
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
		return "Thank you, please check your mail inbox/Spam";	
		}
		else
		{
		return "Please contact admin";
		}
			
			}



}
