<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Ingredient
 *
 * This model represents leave data. It operates the following tables:
 * - Ingredient 
 *
 * @author	hetvi patel.
 * 
 */
Class holiday_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }
//insert model
    function form_insert_holiday($t1, $t2, $t3, $t4) {
// Inserting in Table(students) of Database(college)

        $data = array(
            'holiday_name' => $t1,
            'holiday_description' => $t2,
            'date_from' => $t3,
            'date_to' => $t4,
        );



        $query = $this->db->insert('holiday_master', $data);


        if ($query) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
// view model
    function getPosts() {
        $this->db->select("holiday_id,holiday_name,holiday_description,date_from,date_to,status");
        $this->db->from('holiday_master');
        $query = $this->db->get();
        return $query->result();
    }
//status model
    function change_status_model($holiday_id, $data) {
        $this->db->where('holiday_id', $holiday_id);
        $this->db->update('holiday_master', $data);
    }
 //update model   
     function update_holiday($id) {
        $this->db->where('holiday_id', $id);
        $query = $this->db->get('holiday_master')->result();
        return $query;
    }
//update model
    function f_update_holiday($id,$holiday_name,$holiday_description,$date_from,$date_to) {


        $data = array(
           'holiday_name' => $holiday_name,
            'holiday_description' => $holiday_description,
            'date_from' => $date_from,
            'date_to' => $date_to,
        );
        
        $this->db->where('holiday_id', $id);
        $query = $this->db->update('holiday_master', $data);



        if ($query) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
 }


?>