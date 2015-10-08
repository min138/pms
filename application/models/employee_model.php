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

    function checkemployee($email, $code) {

        $this->db->where('email_id', $email);
        $this->db->where('employee_code', $code);


        $query = $this->db->get('employee_master');

        if ($query->num_rows() == 1) {
            return $query->result();
        } else {
            return false;
        }
    }

    function emp_insert($table_name, $param) {
        $this->db->insert($table_name, $param);
        $insert_id = $this->db->insert_id();
        return $insert_id;
    }

    function leave_insert($table_name, $param) {
        $this->db->insert($table_name, $param);
    }

    function emp_update($table_name, $param, $id, $field) {
        $this->db->where($field, $id);
        $this->db->update($table_name, $param);
    }

    function emp_delete($id) {
        $this->db->where('employee_id', $id);
        $this->db->delete('employee_master');
    }

    function get_employee_list() {
        $this->db->join('designation_master', 'designation_master.designation_id = employee_master.designation_id');
        $query = $this->db->get('employee_master');
        return $query->result();
    }

    function leave_type() {
        $this->db->select("leave_category_id,leave_name");
        $this->db->from('leave_category_master');
        $query = $this->db->get();
        return $query->result();
    }

    function get_employee_data($id) {
        $this->db->join('login_master', 'login_master.login_employee_id = employee_master.employee_id');
        $this->db->join('designation_master', 'designation_master.designation_id = employee_master.designation_id');
        $this->db->join('department_master', 'department_master.department_id = employee_master.department_id');
        $this->db->join('address_master', 'address_master.address_employee_id = employee_master.employee_id');
        $query = $this->db->get_where('employee_master', array('employee_master.employee_id' => $id));
        return $query->first_row();
    }

    function get_department() {
        $result = $this->db->get("department_master")->result();
        return $result;
    }

    function search_department($keyword_name) {
        $this->db->like("department_name", $keyword_name);
        $result = $this->db->get("department_master")->result();
        return $result;
    }

    function get_designation($id) {
        $result = $this->db->get_where("designation_master", array('department_id' => $id))->result();
        return $result;
    }

    function search_designation($keyword_name, $id) {
        $this->db->like("designation_name", $keyword_name);
        $result = $this->db->get_where("designation_master", array('department_id' => $id))->result();
        return $result;
    }

    function change_status_model($employee_id, $data) {
        $this->db->where('employee_id', $employee_id);
        $this->db->update('employee_master', $data);
    }

    function get_department_id_by_employee($id) {
        $this->db->select('department_id');
        $this->db->where('employee_id', $id);
        $result = $this->db->get('employee_master')->first_row();
        return (isset($result->department_id) && !empty($result->department_id)) ? $result->department_id : "";
    }

    function get_department_name($department_id) {
        $this->db->select('department_name');
        $this->db->where('department_id', $department_id);
        $result = $this->db->get('department_master')->first_row();
        return (isset($result->department_name) && !empty($result->department_name)) ? $result->department_name : "";
    }

}

/* End of file Brand_modal.php */
/* Location: ./application/models/Brand_modal.php */
