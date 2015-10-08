<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * Ingredient
 *
 * This model represents department data. It operates the following tables:
 * - Ingredient 
 *
 * @author	hetvi patel
 */
class department_model extends CI_Model {

    // insert department data.
    function department_insert($param) {

        $this->db->insert('department_master', $param);
         $insert_id = $this->db->insert_id();
        return $insert_id;
    }

    function get_department_list() {
        $query = $this->db->get('department_master');
        return $query->result();
    }

    function change_status_model($department_id, $data) {
        $this->db->where('department_id', $department_id);
        $this->db->update('department_master', $data);
    }

//    function get_department_name($department_id) {
//        $this->db->select('department_name');
//        $this->db->where('department_id', $department_id);
//        $result = $this->db->get('department_master')->first_row();
//        return (isset($result->department_name) && !empty($result->department_name)) ? $result->department_name : "";
//    }
    function department_update($id, $param) {


        $this->db->where('department_id', $id);
        $this->db->update('department_master', $param);
    }
    
     function get_department_by_id($id) {
        //$this->db->join('department_master','department_master.department_id = designation_master.department_id');
        $query = $this->db->get_where('department_master', array('department_id' => $id));
        return $query->first_row();
    }

}
