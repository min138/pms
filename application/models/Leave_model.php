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

    function get_leave_list() {
        $query = $this->db->get('leave_category_master');
        return $query->result();
    }

    function leave_update($id, $param) {


        $this->db->where('leave_category_id', $id);
        $this->db->update('leave_category_master', $param);
    }
    
     function get_leave_by_id($id) {
        //$this->db->join('department_master','department_master.department_id = designation_master.department_id');
        $query = $this->db->get_where('leave_category_master', array('leave_category_id' => $id));
        return $query->first_row();
    }

}
