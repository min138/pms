<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * Ingredient
 *
 * This model represents department data. It operates the following tables:
 * - Ingredient 
 *
 * @author	Minesh Mamrawala
 */
class leave_model extends CI_Model {

    // insert department data.
    function leave_insert($param) {

        $this->db->insert('leave_category_master', $param);
        $insert_id = $this->db->insert_id();
        return $insert_id;
    }

    function emp_leave_insert($table_name, $leave_param) {

        $this->db->insert($table_name, $leave_param);
    }

    function get_leave_list() {
        $query = $this->db->get('leave_category_master');
        return $query->result();
    }

    function leave_update($id, $param) {


        $this->db->where('leave_category_id', $id);
        $this->db->update('leave_category_master', $param);
    }

    function leave_update_employee($emp_leave_id_hidden, $param) {


        $this->db->where('leave_id', $emp_leave_id_hidden);
        $this->db->update('leave_master', $param);
    }

    function get_leave_by_id($id) {

        $query = $this->db->get_where('leave_category_master', array('leave_category_id' => $id));
        return $query->first_row();
    }

    function get_employee_leave_by_id($employee_leave_id) {
        $this->db->join('leave_category_master', 'leave_category_master.leave_category_id = leave_master.leave_category_id');
        $this->db->join('employee_master', 'employee_master.employee_id = leave_master.employee_id');
        $query = $this->db->get_where('leave_master', array('leave_id' => $employee_leave_id));
        return $query->first_row();
    }

    function get_employee_allow_leave_by_id($employee_id) {
        $this->db->select('sum(allowed_days) as totalleave');
        $this->db->from('employee_leave');

        $this->db->where('leave_employee_id', $employee_id);
        //$this->db->where('leave_type_id',$leave_cat_id);
        $query = $this->db->get();
        return $query->result();
    }
    
    function get_employee_taken_leave_by_id($employee_id) {
        $this->db->select('sum(ndays) as totalleavetaken');
        $this->db->from('leave_master');

        $this->db->where('employee_id', $employee_id);
        //$this->db->where('leave_type_id',$leave_cat_id);
        $query = $this->db->get();
        return $query->result();
    }

    function get_employee_leave_list($emp_id) {
        if ($emp_id == 0) {
            $this->db->join('leave_category_master', 'leave_category_master.leave_category_id = leave_master.leave_category_id');
            $this->db->join('employee_master', 'employee_master.employee_id = leave_master.employee_id');
            $query = $this->db->get('leave_master');
            return $query->result();
        } else {
            $this->db->join('leave_category_master', 'leave_category_master.leave_category_id = leave_master.leave_category_id');
            $this->db->join('employee_master', 'employee_master.employee_id = leave_master.employee_id');
            $query = $this->db->get_where('leave_master', array('leave_master.employee_id' => $emp_id));
            return $query->result();
        }
    }

    function get_employee() {
        $result = $this->db->get("employee_master")->result();
        return $result;
    }

    function search_employee($keyword_name) {
        $this->db->like("employee_first_name", $keyword_name);
        $this->db->like("employee_middle_name", $keyword_name);
        $this->db->like("employee_last_name", $keyword_name);
        $result = $this->db->get("employee_master")->result();
        return $result;
    }

    function get_leave() {
        $result = $this->db->get("leave_category_master")->result();
        return $result;
    }

    function search_leave($keyword_name) {
        $this->db->like("leave_name", $keyword_name);
        $result = $this->db->get("leave_category_master")->result();
        return $result;
    }

}
