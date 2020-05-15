<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Banking extends CI_Model {


  function approval($param)
   {
$pws= $this->randomPassword();
   $today = $param["pymntdate"];
   $end = date('Y-m-d', strtotime('+1 years'));
   $m = $this->db->get_where('customers', array('id' =>$param["mid"]))->row();
   $this->db->update("agent_commission",array("ac_approval"=>"1"),array("ac_customer_id"=>$param["mid"]));
   $ch1=$this->db->affected_rows();
   $this->db->update("customers",array("approval"=>"1","password"=>md5($pws)),array("id"=>$param["mid"]));
   $ch2=$this->db->affected_rows();
   $this->db->insert("policies",array("policy_id"=>$m->membership_id,"policy_start_date"=>$today,"policy_end_date"=>$end,"customer_id"=>$param["mid"]));
   $ch3 =$this->db->insert_id();
  $this->db->update("forms",array("form_member_approval"=>"1"),array("form_orderid"=>$param["form_orderid"]));
   $ch4=$this->db->affected_rows();
   
  
  if($ch1 && $ch2 && $ch3 && $ch4)
  {
$row = $this->db->get_where('customers', array('id' =>$param["mid"]))->row();
return array("email"=>$row->email,"name"=>$row->members_name,"password"=>$pws,"link"=>"https://myangkasaemas.com/MEMBERS/");
  }
else
{
return 0;
} 
 
 
 }

 function randomPassword() {
        $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
        $pass = array(); //remember to declare $pass as an array
        $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
        for ($i = 0; $i < 8; $i++) {
            $n = rand(0, $alphaLength);
            $pass[] = $alphabet[$n];
        }
        return implode($pass); //turn the array into a string
    }


}