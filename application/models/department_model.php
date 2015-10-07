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
        return true;
    }

    function get_department_list() {
        $query = $this->db->get('department_master');
        return $query->result();
    }

    function update_department($id) {
        $this->db->where('department_id', $id);
        $query = $this->db->get('department_master')->result();
        return $query;
    }

    function f_update_department($id,$department_name) {


        $data = array(
            'department_name' => $department_name
            
        );
        $this->db->where('department_id', $id);
        $query = $this->db->update('department_master', $data);



        if ($query) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

}
