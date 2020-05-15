<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customers extends CI_Controller {


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
		$this->load->view('customers');
	}
}
