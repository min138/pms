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
class Select2_model extends CI_Model {

    function search_department($keyword_name) {
        $this->db->like("department_name", $keyword_name);
        $result = $this->db->get("department_master")->result();
        return $result;
    }

    function get_department() {
        $result = $this->db->get("department_master")->result();
        return $result;
    }

}

/* End of file Brand_modal.php */
/* Location: ./application/models/Select2_modal.php */