<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Qusans extends CI_Model {

private $table;

public function __construct() {
       
$this->table="checklist";	   
    }    


function get_fields()
{
$fields= $this->db->field_data($this->table);
$fields1=array();
foreach ($fields as $field)
{
if($field->default!="CURRENT_TIMESTAMP" && $field->primary_key==0)
{
$fields1[]=$field->name;
}
}
return $fields1;
}	

function makedataset($dataset)
{
$newdataset=array();
$fields = $this->get_fields();
for($c=0;$c<count($fields);$c++)
{
if(isset($dataset[$fields[$c]]))
{
@$newdataset[$fields[$c]]=$dataset[$fields[$c]];
}
}
	
return $newdataset;
}


}