<?php
defined('BASEPATH') OR exit('No direct script access allowed');


use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
class Test extends CI_Controller {

	
	public function index()
	{
	
	}

public function exceltest()
{
	    $userdata = $this->input->post();
		echo json_encode($userdata);
      //$spreadsheet = new Spreadsheet();
      //$sheet = $spreadsheet->getActiveSheet();
		$this->db->select(array('ac_id', 'ac_agent_id', 'ac_agent_percentage', 'ac_agent_amount', 'ac_sm_id', 'ac_sm_percentage', 'ac_sm_amount', 'ac_gm_id', 'ac_gm_percentage', 'ac_gm_amount', 'ac_product_id', 'ac_product_name', 'ac_prodcut_amount', 'ac_customer_id', 'ac_approval', 'ac_status', 'ac_cdate', 'ac_update', 'members_name', 'membership_id', 'cs_no', 'cs_name', 'sm_no', 'sm_name', 'gm_no', 'gm_name'));
		$this->db->from('view_commission');
		//$this->db->where('view_commission.ac_cdate >=', $first_date);
        //$this->db->where('view_commission.ac_cdate <=', $second_date);
	
	    $query = $this->db->get();
		
		//create by vinoth on 25/03/2020
		$fileName = 'test.xlsx';  
		$employeeData = $query->result_array();
		$spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
       	$sheet->setCellValue('A1', 'ac_id');
        $sheet->setCellValue('B1', 'ac_agent_id');
        $sheet->setCellValue('C1', 'ac_agent_percentage');
        $sheet->setCellValue('D1', 'ac_agent_amount');
	    $sheet->setCellValue('E1', 'ac_sm_id');
        $sheet->setCellValue('F1', 'ac_sm_percentage');       
        $rows = 2;
        foreach ($employeeData as $val){
            $sheet->setCellValue('A' . $rows, $val['ac_id']);
            $sheet->setCellValue('B' . $rows, $val['ac_agent_id']);
            $sheet->setCellValue('C' . $rows, $val['ac_agent_percentage']);
            $sheet->setCellValue('D' . $rows, $val['ac_agent_amount']);
	        $sheet->setCellValue('E' . $rows, $val['ac_sm_id']);
            $sheet->setCellValue('F' . $rows, $val['ac_sm_percentage']);
            $rows++;
        } 
        $writer = new Xlsx($spreadsheet);
		//$writer->save("upload/".$fileName);
		header("Content-Type: application/vnd.ms-excel");
		header('Content-Disposition: attachment;filename="'. $filename .'.xlsx"'); 
        header('Cache-Control: max-age=0');
		 $writer->save('php://output');
        //redirect(base_url()."/upload/".$fileName); 
		
		
		
		
       // $sheet->setCellValue('A1', 'Hello World !');
        
       // $writer = new Xlsx($spreadsheet);
 
       // $filename = 'test';
 
       // header('Content-Type: application/vnd.ms-excel');
       // header('Content-Disposition: attachment;filename="'. $filename .'.xlsx"'); 
       // header('Cache-Control: max-age=0');
        
       // $writer->save('php://output');


}


}
