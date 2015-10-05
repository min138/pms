<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * Ingredient
 *
 * This model represents Employee data. It operates the following tables:
 * - Ingredient 
 *
 * @author	Minesh Mamrawala
 */
class Emp_model extends CI_Model {

    function checkemployee($email) {

        $this->db->where('email_id', $email);
        
        $this->db->limit(1);
        $query = $this->db->get('employee_master');

        if ($query->num_rows() == 1) {
            return $query->result();
        } else {
            return false;
        }
    }
    
    function emp_insert($param) {

        $this->db->insert('employee_master', $param);
        
        
    }
    function form_edit($id) {

        $query=$this->db->get_where('employee_master',array('employee_id'=>$id));
	return $query->result();
        
        
    }
    function form_update($id,$param) {

        
	$this->db->where('employee_id', $id);
        $this->db->update('employee_master', $param);
        
        
    }
    function form_delete($id) {

        
	$this->db->where('employee_id', $id);
        $this->db->delete('employee_master');
        
        
    }
    public function employee_getall(){
	
	$query=$this->db->get('employee_master');
	return $query->result();	
    }

}

/* End of file Brand_modal.php */
/* Location: ./application/models/Brand_modal.php */
