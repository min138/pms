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
class Employee_model extends CI_Model {

    function checkemployee($email) {

        $this->db->where('email', $email);

        $this->db->limit(1);
        $query = $this->db->get('tbl_employee');

        if ($query->num_rows() == 1) {
            return $query->result();
        } else {
            return false;
        }
    }

    function form_insert($param) {
        $this->db->insert('tbl_employee', $param);
    }

    function form_edit($id) {
        $query = $this->db->get_where('tbl_employee', array('emp_id' => $id));
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

    function get_employee_list() {
        $query = $this->db->get('employee_master');
        return $query->result();
    }

}

/* End of file Brand_modal.php */
/* Location: ./application/models/Brand_modal.php */
