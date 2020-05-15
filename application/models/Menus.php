<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Menus extends CI_Model {


    function get($id)
    {
    $query = $this->db->get_where('menu',array("id"=>$id));
    $row = $query->row();
    
  return json_decode($row->menus);

    }

}