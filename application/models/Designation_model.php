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
        return true;
    }

    function designation_edit($id) {
        //$this->db->join('department_master','department_master.department_id = designation_master.department_id');
        $query = $this->db->get_where('designation_master', array('designation_id' => $id));
        return $query->result();
    }

    function get_designation_by_id($id) {
        //$this->db->join('department_master','department_master.department_id = designation_master.department_id');
        $query = $this->db->get_where('designation_master', array('designation_id' => $id));
        return $query->result();
    }

    function getPosts() {
        $this->db->select("department_id,department_name");
        $query = $this->db->get('department_master');
        return $query->result();
    }

    function designation_update($id, $param) {


        $this->db->where('designation_id', $id);
        $this->db->update('designation_master', $param);
    }

    function get_department_id_by_designation($id) {
        $this->db->select('department_id');
        $this->db->where('designation_id', $id);
        $result = $this->db->get('designation_master')->first_row();
        return (isset($result->department_id) && !empty($result->department_id)) ? $result->department_id : "";
    }

    function get_department_name($department_id) {
        $this->db->select('department_name');
        $this->db->where('department_id', $department_id);
        $result = $this->db->get('department_master')->first_row();
        return (isset($result->department_name) && !empty($result->department_name)) ? $result->department_name : "";
    }

    function get_designtion_list() {
        $this->db->join('department_master', 'department_master.department_id = designation_master.department_id');
        $query = $this->db->get('designation_master');
        return $query->result();
    }

    function change_status_model($designation_id, $data) {
        $this->db->where('designation_id', $designation_id);
        $this->db->update('designation_master', $data);
    }

}

/* End of file Brand_modal.php */
/* Location: ./application/models/Brand_modal.php */
