<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * Ingredient
 *
 * This model represents Employee data. It operates the following tables:
 * - Ingredient 
 *
 * @author	Abhay Suchak
 */
class Designation_model extends CI_Model {

    function insert_designation($param) {

        $this->db->insert('designation_master', $param);
    }

    function form_edit($id) {

        $query = $this->db->get_where('tbl_employee', array('emp_id' => $id));
        return $query->result();
    }
    
    function getPosts() {
        $this->db->select("department_id,department_name");
        $query = $this->db->get('department_master');
        return $query->result();
    }

    function form_update($id, $param) {


        $this->db->where('emp_id', $id);
        $this->db->update('tbl_employee', $param);
    }

    function form_delete($id) {


        $this->db->where('emp_id', $id);
        $this->db->delete('tbl_employee');
    }

    public function employee_getall() {

        $query = $this->db->get('tbl_employee');
        return $query->result();
    }

}

/* End of file Brand_modal.php */
/* Location: ./application/models/Brand_modal.php */
