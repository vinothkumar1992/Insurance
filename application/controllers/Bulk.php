<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bulk extends CI_Controller {

	
	public function index()
	{


$this->load->library('email');

/*
$info =array(
//array("name"=>"BAHARUDIN BIN BASRO","email"=>"baha.advisory@gmail.com","toemail"=>"karanraja@gmail.com"),
//array("name"=>"EMPERUMAL A/L SAMIKANNO","email"=>"semperumal77@gmail.com","toemail"=>"vinoth92.r@gmail.com"),
array("name"=>"IBRAHIM BIN ISHAK","email"=>"tasnimgold786@gmail.com","toemail"=>"ddineshkumar@myangkasaemasmedicare.com.my")
//array("name"=>"AL MURSHID CONSULTANCY","email"=>"murshideenmurad@gmail.com","toemail"=>"sivakmurali@gmail.com")
);
*/
if($this->input->get("f"))
{
$csv = array_map('str_getcsv', file('bulk/'.$this->input->get("f")));

$dataset =array();
foreach($csv as $c)
{
	$info[]=array("name"=>$c[0],"email"=>$c[1]);
}


foreach($info as $i)

{
$config['smtp_user'] = 'noreply@myangkasaemas.com';
$config['smtp_pass'] = 'P@$$w0rd123';
$this->email->initialize($config);
		$this->email->from('noreply@myangkasaemas.com', 'MyAngkasaemas Support Team');
			$this->email->to($i["email"]); 	
			$this->email->subject('MyAngkasaemas | Web Portal ');
			$html=$this->load->view("bulk",$i,TRUE);	
		    $this->email->message($html);
			if($this->email->send())
		{
		echo $i["name"].",".$i["email"].", Successful <br>";	
		}
		else
		{
		echo $i["name"].",".$i["email"].", Failed <br>";
		}
	
}
}
	}


public  function test()
{
$this->load->view("bulk");
}


public function listdata()
{

//$homepage = file_get_contents('https://myangkasaemas.com/email_list.csv');

$csv = array_map('str_getcsv', file('bulk/agents_list1.csv'));

$dataset =array();
foreach($csv as $c)
{
$dataset[] = array("name"=>$c[0],"email"=>$c[1]);
}

//print_r($dataset);

}



}
