<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
class Reports extends CI_Controller {

	
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
		$this->load->view('report');
	}

public function getAgentsList()
{
$gm =$this->db->query("SELECT distinct(agent_no) as GM_LIST FROM `agents` where agent_level='GM' ");
$sm =$this->db->query("SELECT distinct(agent_no) as SM_LIST FROM `agents` where agent_level='SM' ");
$cs =$this->db->query("SELECT distinct(agent_no) as CS_LIST FROM `agents` where agent_level='CS' ");
 //echo json_encode()
 $gm_data=$gm->result();
 $sm_data=$gm->result();
 $cs_data=$gm->result();
$datasets["GM"]=$gm_data;
$datasets["SM"]=$sm_data;
$datasets["CS"]=$cs_data;
$this->output->set_status_header(200)->set_content_type('application/json')->set_output(json_encode(array("datasets"=>$datasets)));


}





public function exceltest()
{
	    $userdata = $this->input->post();
		//echo date('Y-m-d G:i:s', strtotime($userdata['start']));
		//echo json_encode($userdata['start']);
      //$spreadsheet = new Spreadsheet();
      //$sheet = $spreadsheet->getActiveSheet();
	  if($userdata['from']== 'bank'){
		  $this->db->select('DISTINCT(ac_sm_id),sum(ac_sm_amount) as total_commission');
		  $this->db->where('view_commission.form_submission_date >=', date('Y-m-d G:i:s', strtotime($userdata['start'])));
          $this->db->where('view_commission.form_submission_date <=', date('Y-m-d G:i:s', strtotime($userdata['end'])));
		  $this->db->where('view_commission.ac_sm_id <> 0');
		  $this->db->group_by("ac_sm_id");
          $query = $this->db->get('view_commission');
		  $querySMID=$query->result_array();
		  $len=$query->num_rows();
		  //print_r($querySMID['1']);
		  
		  for($i=0;$i< $len;$i++){
			  $id=$querySMID[$i]['ac_sm_id'];
		 $dataSM[$i]= $this->db->query("SELECT a.agent_name as agent_name,a.agent_nric_no as agent_nric_no,a.agent_phone_no as agent_phone_no,a.agent_bank_name as agent_bank_name,a.agent_bank_ac_no as agent_bank_ac_no,a.agent_level as agent_level,a.agent_team as agent_team,b.bank_bcode as bank_code from agents a left join banks b on a.agent_bank_name=b.bank_name WHERE agent_id =".$id)->row();
		 $dataSMSets[$i]=array('NAME'=> ($dataSM[$i]->agent_name),'BANKCODE' =>($dataSM[$i]->bank_code) ,'NRIC'=>($dataSM[$i]->agent_nric_no),'PHONE'=>($dataSM[$i]->agent_phone_no),'BANKNAME'=>($dataSM[$i]->agent_bank_name),'BANKACC'=>($dataSM[$i]->agent_bank_ac_no),'LEVEL'=>($dataSM[$i]->agent_level),'TEAM'=>($dataSM[$i]->agent_team),"TOTAL_COMMISSION"=>$querySMID[$i]['total_commission']);
		
		  }
		  //print_r($dataSMSets);
		  $this->db->select('DISTINCT(ac_gm_id),sum(ac_gm_amount) as total_commission');
		  $this->db->where('view_commission.form_submission_date >=', date('Y-m-d', strtotime($userdata['start'])));
          $this->db->where('view_commission.form_submission_date <=', date('Y-m-d', strtotime($userdata['end'])));
		  $this->db->where('view_commission.ac_gm_id <> 0');
		  $this->db->group_by("ac_gm_id");
          $query = $this->db->get('view_commission');
		  $queryGMID=$query->result_array();
		  $len=$query->num_rows();
		  for($i=0;$i< $len;$i++){
			   $id=$queryGMID[$i]['ac_gm_id'];
		  $dataGM[$i]= $this->db->query("SELECT a.agent_name as agent_name,a.agent_nric_no as agent_nric_no,a.agent_phone_no as agent_phone_no,a.agent_bank_name as agent_bank_name,a.agent_bank_ac_no as agent_bank_ac_no,a.agent_level as agent_level,a.agent_team as agent_team,b.bank_bcode as bank_code from agents a left join banks b on a.agent_bank_name=b.bank_name WHERE agent_id =".$id)->row();
		  $dataGMSets[$i]=array('NAME'=> ($dataGM[$i]->agent_name),'BANKCODE' =>($dataGM[$i]->bank_code) ,'NRIC'=>($dataGM[$i]->agent_nric_no),'PHONE'=>($dataGM[$i]->agent_phone_no),'BANKNAME'=>($dataGM[$i]->agent_bank_name),'BANKACC'=>($dataGM[$i]->agent_bank_ac_no),'LEVEL'=>($dataGM[$i]->agent_level),'TEAM'=>($dataGM[$i]->agent_team),"TOTAL_COMMISSION"=>$queryGMID[$i]['total_commission']);
		  }
		   //print_r($dataGMSets);
		  $this->db->select('DISTINCT(ac_agent_id),sum(ac_agent_amount) as total_commission');
		  $this->db->where('view_commission.form_submission_date >=', date('Y-m-d G:i:s', strtotime($userdata['start'])));
          $this->db->where('view_commission.form_submission_date <=', date('Y-m-d G:i:s', strtotime($userdata['end'])));
		  $this->db->where('view_commission.ac_agent_id <> 0');
		  $this->db->group_by("ac_agent_id");
          $query = $this->db->get('view_commission');
		  $queryCSID=$query->result_array();
		  $len=$query->num_rows();
		  for($i=0;$i< $len;$i++){
			  $id=$queryCSID[$i]['ac_agent_id'];
		  $dataCS[$i]= $this->db->query("SELECT a.agent_name as agent_name,a.agent_nric_no as agent_nric_no,a.agent_phone_no as agent_phone_no,a.agent_bank_name as agent_bank_name,a.agent_bank_ac_no as agent_bank_ac_no,a.agent_level as agent_level,a.agent_team as agent_team,b.bank_bcode as bank_code from agents a left join banks b on a.agent_bank_name=b.bank_name WHERE agent_id =".$id)->row();
		  $dataCSSets[$i]=array('NAME'=> ($dataCS[$i]->agent_name),'BANKCODE' =>($dataCS[$i]->bank_code) ,'NRIC'=>($dataCS[$i]->agent_nric_no),'PHONE'=>($dataCS[$i]->agent_phone_no),'BANKNAME'=>($dataCS[$i]->agent_bank_name),'BANKACC'=>($dataCS[$i]->agent_bank_ac_no),'LEVEL'=>($dataCS[$i]->agent_level),'TEAM'=>($dataCS[$i]->agent_team),"TOTAL_COMMISSION"=>$queryCSID[$i]['total_commission']);
		 //$masterData['sm'][$i]=
		  }
		 // print_r($dataCSSets);
		 $DATAALL['bank_detail']=	array("gm_data" => $dataGMSets, "sm_data" => $dataSMSets, "cs_data" => $dataCSSets);
		 $fileName = 'bank_detail';  
		//$employeeData = $query->result_array();
	

		$spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
		
		$sheet->getColumnDimension('A')->setAutoSize(false);
        $sheet->getColumnDimension('A')->setWidth(35);
		$sheet->getColumnDimension('B')->setAutoSize(false);
        $sheet->getColumnDimension('B')->setWidth(30);
		$sheet->getColumnDimension('C')->setAutoSize(false);
        $sheet->getColumnDimension('C')->setWidth(25);
		$sheet->getColumnDimension('F')->setAutoSize(false);
        $sheet->getColumnDimension('F')->setWidth(25);
		$sheet->getColumnDimension('G')->setAutoSize(false);
        $sheet->getColumnDimension('G')->setWidth(40);
		$sheet->getColumnDimension('H')->setAutoSize(false);
        $sheet->getColumnDimension('H')->setWidth(25);
		$sheet->getColumnDimension('I')->setAutoSize(false);
        $sheet->getColumnDimension('I')->setWidth(20);
		$sheet->getStyle('B1')->getAlignment()->setWrapText(true);
		$sheet->getStyle('H1')->getAlignment()->setWrapText(true);
		$sheet->setCellValue('A1', 'NAME');
		 $sheet->setCellValue('B1', 'IC');
        $sheet->setCellValue('C1', 'CONTACT NO');
		$sheet->setCellValue('D1', 'CONSULTANT LEVEL');
		$sheet->setCellValue('E1', 'TEAM'); 
        $sheet->setCellValue('F1', 'IBG BIC CODE ');
		$sheet->setCellValue('G1', 'BANK');
		$sheet->setCellValue('H1', 'ACC NO');
		$sheet->setCellValue('I1', 'TOTAL COMMISSION');
  
		    $rows = 2;
			$gm_total_commission=0;
			$sm_total_commission=0;
			$cs_total_commission=0;
        foreach ($DATAALL['bank_detail']['gm_data']as $val){
		$sheet->setCellValue('A'. $rows, $val['NAME']);
	    $sheet->setCellValueExplicit('B'. $rows, $val['NRIC'],\PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING);
        $sheet->setCellValue('C'. $rows, $val['PHONE']);
		$sheet->setCellValue('D'. $rows, $val['LEVEL']);
		$sheet->setCellValue('E'. $rows, $val['TEAM']);
        $sheet->setCellValue('F'. $rows, $val['BANKCODE']);
		$sheet->setCellValue('G'. $rows, $val['BANKNAME']);
		$sheet->setCellValueExplicit('H'. $rows, $val['BANKACC'],\PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING);
		//$sheet->setCellValue('H'. $rows, $val['BANKACC']);
		$sheet->getStyle('I'.$rows)->getFont()->applyFromArray( [  'bold' => TRUE, 'italic' => FALSE,  'strikethrough' => FALSE, 'color' => [ 'rgb' => '000000' ] ] );
		$X= number_format((float)$val['TOTAL_COMMISSION'], 2, '.', '');
		//ECHO($X);
		$sheet->setCellValue('I'. $rows, ' '.$X.' ');// number_format((float)($val['TOTAL_COMMISSION']), 2));
		
            $rows++; 
			$gm_total_commission=$gm_total_commission+$val['TOTAL_COMMISSION'];
        } 
		
		 foreach ($DATAALL['bank_detail']['sm_data']as $val){
		$sheet->setCellValue('A'. $rows, $val['NAME']);
	    $sheet->setCellValueExplicit('B'. $rows, $val['NRIC'],\PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING);
        $sheet->setCellValue('C'. $rows, $val['PHONE']);
		$sheet->setCellValue('D'. $rows, $val['LEVEL']);
		$sheet->setCellValue('E'. $rows, $val['TEAM']);
        $sheet->setCellValue('F'. $rows, $val['BANKCODE']);
		$sheet->setCellValue('G'. $rows, $val['BANKNAME']);
		$sheet->setCellValueExplicit('H'. $rows, $val['BANKACC'],\PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING);
		//$sheet->setCellValue('H'. $rows, $val['BANKACC']);
		$sheet->getStyle('I'.$rows)->getFont()->applyFromArray( [  'bold' => TRUE, 'italic' => FALSE,  'strikethrough' => FALSE, 'color' => [ 'rgb' => '000000' ] ] );
		$X= number_format((float)$val['TOTAL_COMMISSION'], 2, '.', '');
		//ECHO($X);
		$sheet->setCellValue('I'. $rows, ' '.$X.' ');// number_format((float)($val['TOTAL_COMMISSION']), 2));
            $rows++; 
			$sm_total_commission=$sm_total_commission+$val['TOTAL_COMMISSION'];
        } 
		 foreach ($DATAALL['bank_detail']['cs_data']as $val){
		$sheet->setCellValue('A'. $rows, $val['NAME']);
	    $sheet->setCellValueExplicit('B'. $rows, $val['NRIC'],\PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING);
        $sheet->setCellValue('C'. $rows, $val['PHONE']);
		$sheet->setCellValue('D'. $rows, $val['LEVEL']);
		$sheet->setCellValue('E'. $rows, $val['TEAM']);
        $sheet->setCellValue('F'. $rows, $val['BANKCODE']);
		$sheet->setCellValue('G'. $rows, $val['BANKNAME']);
		$sheet->setCellValueExplicit('H'. $rows, $val['BANKACC'],\PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING);
		//$sheet->setCellValue('H'. $rows, $val['BANKACC']);
		$sheet->getStyle('I'.$rows)->getFont()->applyFromArray( [  'bold' => TRUE, 'italic' => FALSE,  'strikethrough' => FALSE, 'color' => [ 'rgb' => '000000' ] ] );
		$X= number_format((float)$val['TOTAL_COMMISSION'], 2, '.', '');
		//ECHO($X);
		$sheet->setCellValue('I'. $rows, ' '.$X.' ');// number_format((float)($val['TOTAL_COMMISSION']), 2));
            $rows++; 
			$cs_total_commission=$cs_total_commission+$val['TOTAL_COMMISSION'];
        } 
		$total_commission=$gm_total_commission+$sm_total_commission+$cs_total_commission;
		$sheet->setCellValue('H'. $rows, "TOTAL");
		$sheet->getStyle('I'.$rows)->getFont()->applyFromArray( [  'bold' => TRUE, 'italic' => FALSE,  'strikethrough' => FALSE, 'color' => [ 'rgb' => '000000' ] ] );
		$sheet->setCellValue('I'. $rows, ' '.number_format((float)($total_commission), 2, '.', '').' ');
         $writer = new Xlsx($spreadsheet);
		$writer->setOffice2003Compatibility(true);
		//$writer->save("upload/".$fileName);
		header("Content-Type: application/vnd.ms-excel");
		header('Content-Disposition: attachment;filename="'. $fileName .'.xlsx"'); 
        header('Cache-Control: max-age=0');
		//$writer->save("upload/".$fileName);
		$writer->save($fileName); 
		echo file_get_contents($fileName);
		//$writer->save('php://output');
        //redirect(base_url()."/upload/".$fileName);  
	  }
	   if($userdata['from']== 'cm'){
		$this->db->select(array('ac_id', 'ac_agent_id', 'ac_agent_percentage', 'ac_agent_amount', 'ac_sm_id', 'ac_sm_percentage',
		'ac_sm_amount', 'ac_gm_id', 'ac_gm_percentage', 'ac_gm_amount', 'form_submission_date','date_of_birth','form_payment_date', 'ac_product_name', 'ac_prodcut_amount',
		'ac_customer_id', 'ac_approval', 'ac_status', 'ac_cdate', 'total_commission', 'ac_update', 'members_name', 'membership_id', 'cs_no', 'cs_name',
		'sm_no', 'sm_name', 'gm_no', 'gm_name'));
		$this->db->from('view_commission');
		$this->db->where('view_commission.form_submission_date >=', date('Y-m-d', strtotime($userdata['start'])));
        $this->db->where('view_commission.form_submission_date <=', date('Y-m-d', strtotime($userdata['end'])));
	    $query = $this->db->get();
		// $str = $this->db->last_query();
		// print_r($str);
		// create by vinoth on 25/03/2020
		$fileName = 'commission';  
		$employeeData = $query->result_array();
		$spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
		$sheet->setCellValue('A1', 'SUBMISSION DATE');
		$sheet->setCellValue('B1', 'PAYMENT DATE');
        $sheet->setCellValue('C1', 'MEMBERS NAME');
		$sheet->setCellValue('D1', 'MEMBERSHIP ID');
        $sheet->setCellValue('E1', 'GM NO');
		$sheet->setCellValue('F1', 'GM NAME');
		$sheet->setCellValue('G1', 'GM AMOUNT');
		$sheet->setCellValue('H1', 'GM PERCENTAGE');
        $sheet->setCellValue('I1', 'SM NO'); 
		$sheet->setCellValue('J1', 'SM NAME');
		$sheet->setCellValue('K1', 'SM AMOUNT');
		$sheet->setCellValue('L1', 'SM PERCENTAGE');
        $sheet->setCellValue('M1', 'CS NO'); 
		$sheet->setCellValue('N1', 'CS NAME');
		$sheet->setCellValue('O1', 'CS AMOUNT');
		$sheet->setCellValue('P1', 'CS PERCENTAGE');
       	$sheet->setCellValue('Q1', 'ACCUMULATION TOTAL');
 		$total_commission=0;
		$gm_commission=0;
		$sm_commission=0;
		$cs_commission=0;
        $rows = 2;
        foreach ($employeeData as $val){
			$sheet->setCellValue('A'. $rows,  date('d-m-Y', strtotime($val['form_submission_date'])));
			$sheet->setCellValue('B'. $rows, date('d-m-Y', strtotime($val['form_payment_date']))); 
            $sheet->setCellValue('C'. $rows, $val['members_name']);
            $sheet->setCellValue('D'. $rows, $val['membership_id']);
            $sheet->setCellValue('E'. $rows, $val['gm_no']);
	        $sheet->setCellValue('F'. $rows, $val['gm_name']);
            $sheet->setCellValue('G'. $rows, ' '.number_format((float)($val['ac_gm_amount']), 2, '.', '').' ' ); 
			$sheet->setCellValue('H'. $rows, $val['ac_gm_percentage']."%");
			$sheet->setCellValue('I'. $rows, $val['sm_no']);
			$sheet->setCellValue('J'. $rows, $val['sm_name']);
			$sheet->setCellValue('K'. $rows, ' '.number_format((float)($val['ac_sm_amount']), 2, '.', '').' ' );
			$sheet->setCellValue('L'. $rows, $val['ac_sm_percentage']."%");
			$sheet->setCellValue('M'. $rows, $val['cs_no']);
            $sheet->setCellValue('N'. $rows, $val['cs_name']);
		    $sheet->setCellValue('O'. $rows, ' '.number_format((float)($val['ac_agent_amount']), 2, '.', '').' ' );
		    $sheet->setCellValue('P'. $rows, $val['ac_agent_percentage']."%");
			$sheet->getStyle('Q'.$rows)->getFont()->applyFromArray( [  'bold' => TRUE, 'italic' => FALSE,  'strikethrough' => FALSE, 'color' => [ 'rgb' => '000000' ] ] );
		    $sheet->setCellValue('Q'. $rows, ' '.number_format((float)($val['total_commission']), 2, '.', '').' ' );
			
			$total_commission=$total_commission+$val['total_commission'];
			$gm_commission=$gm_commission+$val['ac_gm_amount'];
			$sm_commission=$sm_commission+$val['ac_sm_amount'];
			$cs_commission=$cs_commission+$val['ac_agent_amount'];
			
			//$sheet->setCellValue('S'. $rows, $val['date_of_birth']);
		/*
            $sheet->setCellValue('A'. $rows, $val['ac_id']);
            $sheet->setCellValue('B'. $rows, $val['ac_agent_id']);
            $sheet->setCellValue('C'. $rows, $val['ac_agent_percentage']);
            $sheet->setCellValue('D'. $rows, $val['ac_agent_amount']);
	        $sheet->setCellValue('E'. $rows, $val['ac_sm_id']);
            $sheet->setCellValue('F'. $rows, $val['ac_sm_percentage']);
			$sheet->setCellValue('G'. $rows, $val['ac_sm_amount']);
			$sheet->setCellValue('H'. $rows, $val['ac_gm_id']);
			$sheet->setCellValue('I'. $rows, $val['ac_agent_percentage']);
			$sheet->setCellValue('J'. $rows, $val['ac_gm_amount']);
			$sheet->setCellValue('K'. $rows, $val['ac_product_id']);
			$sheet->setCellValue('L'. $rows, $val['ac_product_name']); 
            $sheet->setCellValue('M'. $rows, $val['ac_prodcut_amount']);
			$sheet->setCellValue('N'. $rows, $val['ac_customer_id']);
			$sheet->setCellValue('O'. $rows, $val['ac_approval']);
			$sheet->setCellValue('P'. $rows, $val['ac_status']);
			$sheet->setCellValue('Q'. $rows, $val['ac_cdate']);
			$sheet->setCellValue('R'. $rows, $val['ac_update']);
			$sheet->setCellValue('S'. $rows, $val['members_name']);
			$sheet->setCellValue('T'. $rows, $val['membership_id']);
			$sheet->setCellValue('U'. $rows, $val['cs_no']);
			$sheet->setCellValue('V'. $rows, $val['cs_name']);
			$sheet->setCellValue('W'. $rows, $val['sm_no']);
			$sheet->setCellValue('X'. $rows, $val['sm_name']); 
			$sheet->setCellValue('Y'. $rows, $val['gm_no']);
			$sheet->setCellValue('Z'. $rows, $val['gm_name']);
			*/
            $rows++;
        } 
		$sheet->setCellValue('F'. $rows, "TOTAL");
		$sheet->getStyle('Q'.$rows)->getFont()->applyFromArray( [  'bold' => TRUE, 'italic' => FALSE,  'strikethrough' => FALSE, 'color' => [ 'rgb' => '000000' ] ] );
		$sheet->setCellValue('Q'. $rows, ' '.number_format((float)($total_commission), 2, '.', '').' ');
        
		$sheet->getStyle('G'.$rows)->getFont()->applyFromArray( [  'bold' => TRUE, 'italic' => FALSE,  'strikethrough' => FALSE, 'color' => [ 'rgb' => '000000' ] ] );
		$sheet->setCellValue('G'. $rows, ' '.number_format((float)($gm_commission), 2, '.', '').' ');
		
		$sheet->getStyle('K'.$rows)->getFont()->applyFromArray( [  'bold' => TRUE, 'italic' => FALSE,  'strikethrough' => FALSE, 'color' => [ 'rgb' => '000000' ] ] );
		$sheet->setCellValue('K'. $rows, ' '.number_format((float)($sm_commission), 2, '.', '').' ');
		
		$sheet->getStyle('O'.$rows)->getFont()->applyFromArray( [  'bold' => TRUE, 'italic' => FALSE,  'strikethrough' => FALSE, 'color' => [ 'rgb' => '000000' ] ] );
		$sheet->setCellValue('O'. $rows, ' '.number_format((float)($cs_commission), 2, '.', '').' ');
		
        $writer = new Xlsx($spreadsheet);
		$writer->setOffice2003Compatibility(true);
		//$writer->save("upload/".$fileName);
		header("Content-Type: application/vnd.ms-excel");
		header('Content-Disposition: attachment;filename="'. $fileName .'.xlsx"'); 
        header('Cache-Control: max-age=0');
		//$writer->save("upload/".$fileName);
		$writer->save($fileName); 
		echo file_get_contents($fileName);
		/* $writer->save('php://output');
        redirect(base_url()."/upload/".$fileName);  */
	   }
		
		//master data report by vinoth 25/03/2020
		if( $userdata['from']== 'mdr'){
		$this->db->select(array('id','membership_type','membership_id','primary_name','primary_nirc','members_name','nric_no','date_of_birth','gender','nationality',
		'race','marital_status','occupation','health_declaration','address1','city','state','postcode','home_office_phone_no',
		'mobile_phone_no','submission_date','email','cdate','gm_id','sm_id','form_payment_date','agent_id','SM_NAME','GM_NAME','AGENT_NAME'));
		$this->db->from('master_data');
		$this->db->where('master_data.cdate >=', date('Y-m-d G:i:s', strtotime($userdata['start'])));
        $this->db->where('master_data.cdate <=', date('Y-m-d G:i:s', strtotime($userdata['end'])));
	
	    $query = $this->db->get();
		 //$str = $this->db->last_query();
		//print_r($str);
		//create by vinoth on 25/03/2020
		$fileName = 'master_data';  
		$employeeData = $query->result_array();
		$spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
		$sheet->getColumnDimension('E')->setAutoSize(false);
        $sheet->getColumnDimension('E')->setWidth(20);
		$sheet->getColumnDimension('G')->setAutoSize(false);
        $sheet->getColumnDimension('G')->setWidth(20);
		$sheet->getStyle('E1')->getAlignment()->setWrapText(true);
		$sheet->getStyle('G1')->getAlignment()->setWrapText(true);
		$sheet->setCellValue('A1', 'DATE');
		$sheet->setCellValue('B1', 'PAYMENT DATE');
        $sheet->setCellValue('C1', 'SUBMISSION DATE');
		$sheet->setCellValue('D1', 'MEMBERSHIP ID');
		$sheet->setCellValue('E1', 'PRIMARY NRIC');
        $sheet->setCellValue('F1', 'MEMBERS NAME');     
        $sheet->setCellValue('G1', 'NRIC NO');
        $sheet->setCellValue('H1', 'DOB');
		$sheet->setCellValue('I1', 'GENDER');
        $sheet->setCellValue('J1', 'NATIONALITY');
	    $sheet->setCellValue('K1', 'RACE');
        $sheet->setCellValue('L1', 'MARITAL STATUS'); 
        $sheet->setCellValue('M1', 'OCCUPATION');
        $sheet->setCellValue('N1', 'HEALTH DECLARATION');
        $sheet->setCellValue('O1', 'ADDRESS');
		$sheet->setCellValue('P1', 'CITY');
	    $sheet->setCellValue('Q1', 'STATE');
        $sheet->setCellValue('R1', 'POSTCODE');
        $sheet->setCellValue('S1', 'HOME OFFICE PH.NO');
        $sheet->setCellValue('T1', 'MOBILE NO');
        $sheet->setCellValue('U1', 'EMAIL');
		$sheet->setCellValue('V1', 'GM ID');
        $sheet->setCellValue('W21', 'GM NAME'); 
		$sheet->setCellValue('X1', 'SM ID');
        $sheet->setCellValue('Y1', 'SM NAME');
		$sheet->setCellValue('Z1', 'AGENT ID');
        $sheet->setCellValue('AA1', 'AGENT NAME');
		$sheet->setCellValue('AB1', 'MEMBERSHIP TYPE');
		$sheet->setCellValue('AC1', 'PRIMARY NAME');
        $rows = 2;
        foreach ($employeeData as $val){
		$sheet->setCellValue('A'. $rows,date('d-m-Y G:i:s', strtotime( $val['cdate'])));  
		$sheet->setCellValue('B'. $rows,date('d-m-Y', strtotime( $val['form_payment_date'])));
		$sheet->setCellValue('AB'. $rows, $val['membership_type']);
		$sheet->setCellValue('AC'. $rows, $val['primary_name']);
		$sheet->setCellValue('C'. $rows,  date('d-m-Y', strtotime( $val['submission_date'])));
        $sheet->setCellValue('D'. $rows, $val['membership_id']);
		$sheet->setCellValueExplicit('E'. $rows, $val['primary_nirc'],\PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING);
        $sheet->setCellValue('F'. $rows, $val['members_name']);     
        $sheet->setCellValueExplicit('G'. $rows, $val['nric_no'],\PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING);
        $sheet->setCellValue('H'. $rows, date('d-m-Y', strtotime( $val['date_of_birth']))); 
		$sheet->setCellValue('I'. $rows, $val['gender']);
        $sheet->setCellValue('J'. $rows, $val['nationality']);
	    $sheet->setCellValue('K'. $rows, $val['race']);
        $sheet->setCellValue('L'. $rows, $val['marital_status']); 
        $sheet->setCellValue('M'. $rows, $val['occupation']);
        $sheet->setCellValue('N'. $rows, $val['health_declaration']);
        $sheet->setCellValue('O'. $rows, $val['address1']);
		$sheet->setCellValue('P'. $rows, $val['city']);
	    $sheet->setCellValue('Q'. $rows, $val['state']);
        $sheet->setCellValue('R'. $rows, $val['postcode']);
        $sheet->setCellValue('S'. $rows, $val['home_office_phone_no']);
        $sheet->setCellValue('T'. $rows, $val['mobile_phone_no']);
        $sheet->setCellValue('U'. $rows, $val['email']);
        $sheet->setCellValue('V'. $rows, date('d-m-Y', strtotime( $val['submission_date'])));
		$sheet->setCellValue('V'. $rows, $val['gm_id']);
        $sheet->setCellValue('W'. $rows, $val['GM_NAME']); 
		$sheet->setCellValue('X'. $rows, $val['sm_id']);
        $sheet->setCellValue('Y'. $rows, $val['SM_NAME']);
		$sheet->setCellValue('Z'. $rows, $val['agent_id']);
        $sheet->setCellValue('AA'. $rows, $val['AGENT_NAME']);
            $rows++;
        } 
        $writer = new Xlsx($spreadsheet);
		//$writer->save("upload/".$fileName);
		header("Content-Type: application/vnd.ms-excel");
		header('Content-Disposition: attachment;filename="'. $fileName .'.xlsx"'); 
        header('Cache-Control: max-age=0');
		//$writer->save("upload/".$fileName);
		$writer->save($fileName); 
		echo file_get_contents($fileName);
	/* 	$writer->save('php://output');
        redirect(base_url()."/upload/".$fileName);  */
		
		}
		
		
		//Renewal report by vinoth 26/03/2020
		if( $userdata['from']== 'rp'){
		$this->db->select(array('id','membership_type','membership_id','primary_nirc','members_name','nric_no','date_of_birth','gender','nationality',
		'race','marital_status','occupation','health_declaration','address1','city','state','postcode','home_office_phone_no',
		'mobile_phone_no','submission_date','email','cdate','gm_id','sm_id','agent_id','policy_start_date','policy_end_date'));
		$this->db->from('view_renewal');
		$this->db->where('view_renewal.policy_end_date >=', date('Y-m-d G:i:s', strtotime($userdata['start'])));
        $this->db->where('view_renewal.policy_end_date <=', date('Y-m-d G:i:s', strtotime($userdata['end'])));
	
	    $query = $this->db->get();
		 //$str = $this->db->last_query();
		//print_r($str);
		//create by vinoth on 25/03/2020
		$fileName = 'renewal';  
		$employeeData = $query->result_array();
		$spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
		$sheet->setCellValue('A1', 'DATE');
		$sheet->setCellValue('B1', 'POLICY START DATE');
		$sheet->setCellValue('C1', 'POLICY END DATE');
		$sheet->setCellValue('D1', 'MEMBERSHIP TYPE');
        $sheet->setCellValue('E1', 'MEMBERSHIP ID');
		$sheet->setCellValue('E1', 'PRIMARY NRIC');
        $sheet->setCellValue('G1', 'MEMBERS NAME');     
        $sheet->setCellValue('H1', 'NRIC NO');
        $sheet->setCellValue('I1', 'DOB');
		$sheet->setCellValue('J1', 'GENDER');
        $sheet->setCellValue('K1', 'NATIONALITY');
	    $sheet->setCellValue('L1', 'RACE');
        $sheet->setCellValue('M1', 'MARITAL STATUS'); 
        $sheet->setCellValue('N1', 'OCCUPATION');
        $sheet->setCellValue('O1', 'HEALTH DECLARATION');
        $sheet->setCellValue('P1', 'ADDRESS');
		$sheet->setCellValue('Q1', 'CITY');
	    $sheet->setCellValue('R1', 'STATE');
        $sheet->setCellValue('S1', 'POSTCODE');
        $sheet->setCellValue('T1', 'HOME OFFICE PH.NO');
        $sheet->setCellValue('U1', 'MOBILE NO');
        $sheet->setCellValue('V1', 'EMAIL');
        $sheet->setCellValue('W1', 'SUBMISSION DATE');
		$sheet->setCellValue('X1', 'GM ID');
        //$sheet->setCellValue('X1', 'GM NAME'); 
		$sheet->setCellValue('Y1', 'SM ID');
       // $sheet->setCellValue('Z1', 'SM NAME');
		$sheet->setCellValue('Z1', 'AGENT ID');
        //$sheet->setCellValue('AB1', 'POLICY START DATE');
		//$sheet->setCellValue('AB1', 'POLICY END DATE');
        $rows = 2;
        foreach ($employeeData as $val){
		$sheet->setCellValue('A'. $rows, $val['cdate']);
		$sheet->setCellValue('B'. $rows, $val['policy_start_date']);
        $sheet->setCellValue('C'. $rows, $val['policy_end_date']);
		$sheet->setCellValue('D'. $rows, $val['membership_type']);
        $sheet->setCellValue('E'. $rows, $val['membership_id']);
		$sheet->setCellValue('F'. $rows, $val['primary_nirc']);
        $sheet->setCellValue('G'. $rows, $val['members_name']);     
        $sheet->setCellValue('H'. $rows, $val['nric_no']);
        $sheet->setCellValue('I'. $rows, $val['date_of_birth']);
		$sheet->setCellValue('J'. $rows, $val['gender']);
        $sheet->setCellValue('K'. $rows, $val['nationality']);
	    $sheet->setCellValue('L'. $rows, $val['race']);
        $sheet->setCellValue('M'. $rows, $val['marital_status']); 
        $sheet->setCellValue('N'. $rows, $val['occupation']);
        $sheet->setCellValue('O'. $rows, $val['health_declaration']);
        $sheet->setCellValue('P'. $rows, $val['address1']);
		$sheet->setCellValue('Q'. $rows, $val['city']);
	    $sheet->setCellValue('R'. $rows, $val['state']);
        $sheet->setCellValue('S'. $rows, $val['postcode']);
        $sheet->setCellValue('T'. $rows, $val['home_office_phone_no']);
        $sheet->setCellValue('U'. $rows, $val['mobile_phone_no']);
        $sheet->setCellValue('V'. $rows, $val['email']);
        $sheet->setCellValue('W'. $rows, $val['submission_date']);
		$sheet->setCellValue('X'. $rows, $val['gm_id']);
		$sheet->setCellValue('Y'. $rows, $val['sm_id']);
		$sheet->setCellValue('Z'. $rows, $val['agent_id']);
            $rows++;
        } 
        $writer = new Xlsx($spreadsheet);
		//$writer->save("upload/".$fileName);
		header("Content-Type: application/vnd.ms-excel");
		header('Content-Disposition: attachment;filename="'. $fileName .'.xlsx"'); 
        header('Cache-Control: max-age=0');
		//$writer->save("upload/".$fileName);
		$writer->save($fileName); 
		echo file_get_contents($fileName);
		/* $writer->save('php://output');
        redirect(base_url()."/upload/".$fileName); */ 
		
		}
		
		
		//master data report by vinoth 25/03/2020
		if( $userdata['from']== 'um'){
		$this->db->select(array('form_name','form_orderid','form_nric','form_email','form_phoneno','form_payment_type',
		'form_payment_status','form_member_approval','form_cdate'));
		$this->db->from('view_unconfirmed');
		$this->db->where('view_unconfirmed.form_cdate >=', date('Y-m-d G:i:s', strtotime($userdata['start'])));
        $this->db->where('view_unconfirmed.form_cdate <=', date('Y-m-d G:i:s', strtotime($userdata['end'])));
	
	    $query = $this->db->get();
		 //$str = $this->db->last_query();
		//print_r($str);
		//create by vinoth on 25/03/2020
		$fileName = 'unconfirmed';  
		$employeeData = $query->result_array();
		$spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
		$sheet->setCellValue('A1', 'DATE');
		$sheet->setCellValue('B1', 'FORM NAME');
        $sheet->setCellValue('C1', 'FORM ORDERID');
		$sheet->setCellValue('D1', 'FORM NRIC');
        $sheet->setCellValue('E1', 'FORM EMAIL');     
        $sheet->setCellValue('F1', 'FORM PHONE NO');
        $sheet->setCellValue('G1', 'FORM PAYMENT TYPE');
		$sheet->setCellValue('H1', 'FORM PAYMENT STATUS');
        $sheet->setCellValue('I1', 'FORM MEMBER APPROVAL');
        $rows = 2;
        foreach ($employeeData as $val){
		$sheet->setCellValue('A'. $rows, $val['form_cdate']);
		$sheet->setCellValue('B'. $rows, $val['form_name']);
        $sheet->setCellValue('C'. $rows, $val['form_orderid']);
		$sheet->setCellValue('D'. $rows, $val['form_nric']);
        $sheet->setCellValue('E'. $rows, $val['form_email']);     
        $sheet->setCellValue('F'. $rows, $val['form_phoneno']);
        $sheet->setCellValue('G'. $rows, $val['form_payment_type']);
		$sheet->setCellValue('H'. $rows, $val['form_payment_status']);
        $sheet->setCellValue('I'. $rows, $val['form_member_approval']);
	    $rows++;
        } 
        $writer = new Xlsx($spreadsheet);
		//$writer->save("upload/".$fileName);
		header("Content-Type: application/vnd.ms-excel");
		header('Content-Disposition: attachment;filename="'. $fileName .'.xlsx"'); 
        header('Cache-Control: max-age=0');
		//$writer->save("upload/".$fileName);
		$writer->save($fileName); 
		echo file_get_contents($fileName);
		/* $writer->save('php://output');
        redirect(base_url()."/upload/".$fileName);  */
		
		}


}


}
