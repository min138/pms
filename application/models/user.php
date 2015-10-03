<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

Class User extends CI_Model {

    function login($username, $password) {

        $this->db->where('uname', $username);
        $this->db->where('pwd', $password);
        $this->db->limit(1);
        $query = $this->db->get('tbl_login');

        if ($query->num_rows() == 1) {
            return $query->result();
        } else {
            return false;
        }
    }

}
