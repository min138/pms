<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

defined('BASEPATH') OR exit('No direct script access allowed');

class Select2 extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('select2_model', '', TRUE);
    }

    public function index() {

        //page level css
        $this->template->add_css('plugins/select2/select2.css');

        //page level plugin
        $this->template->add_js('plugins/select2/select2.min.js');

        // page level script
        $this->template->add_js('scripts/app.js');
        $this->template->add_js('scripts/select2_js/select2.js');


        $this->data['js'] = $this->template->js;
        $this->data['css'] = $this->template->css;


        $this->data['title'] = "Select2 Dropdownlist";
        $this->data['page_title'] = "Select2 Dropdownlist";
        $this->data['active_tab'] = "employee";
        $this->data['page_content'] = "select2_demo/index";

        //$data['department'] = $this->select2_model->get_dropdown_list();


        $this->load->view('template', $this->data);
    }

    public function get_department_list() {

        $row = array();
        $return_arr = array();
        $row_array = array();
        $keyword_name = $this->input->post("Keywords");
        if ($keyword_name != '') {
            $result = $this->select2_model->search_department($keyword_name);
            if (count($result) > 0) {
                foreach ($result as $row) {
                    $row_array['id'] = $row->department_id;
                    $row_array['text'] = utf8_encode($row->department_name);
                    array_push($return_arr, $row_array);
                }
            }
        } else {
            $result = $this->select2_model->get_department();
            if (count($result) > 0) {
                foreach ($result as $row) {
                    $row_array['id'] = $row->department_id;
                    $row_array['text'] = utf8_encode($row->department_name);
                    array_push($return_arr, $row_array);
                }
            }
        }

        $ret['items'] = $return_arr;
        echo json_encode($ret);
    }
    public function add_select() {

        //page level css
        $this->template->add_css('plugins/select2/select2.css');

        //page level plugin
        $this->template->add_js('plugins/select2/select2.min.js');

        // page level script
        $this->template->add_js('scripts/app.js');
        $this->template->add_js('scripts/select2_js/select2.js');


        $this->data['js'] = $this->template->js;
        $this->data['css'] = $this->template->css;


        $this->data['title'] = "Select2 Dropdownlist";
        $this->data['page_title'] = "Select2 Dropdownlist";
        $this->data['active_tab'] = "employee";
        $this->data['page_content'] = "select2_demo/index";


        
        //This method will have the credentials validation

        $this->form_validation->set_rules('Keywords', 'Keywords', 'trim|required');
        

        if ($this->form_validation->run() == FALSE) {
            //Field validation failed.  User redirected to login page
            $this->load->view('template', $this->data);
        } else {
            //Field validation succeeded.  Validate against database
            $fname = $this->input->post('Keywords');
            echo $fname;

            //query the database
            /*$result = $this->employee_model->checkemployee($email);

            if ($result) {
                $this->session->set_flashdata('error', 'Email Id Already Exist');
                $this->load->view('template', $this->data);
                //redirect('Dashboard', 'refresh');
            } else {
                $param = array(
                    'emp_fname' => $fname,
                    'emp_lname' => $lname,
                    'gender' => $gender,
                    'bdate' => $dob,
                    'mobile' => $mob,
                    'email' => $email,
                );
                //Transfering data to Model
                $this->employee_model->form_insert($param);

                $this->session->set_flashdata('success', 'Successfully Saved Employee');
                redirect(base_url('employee'));
            }*/
        }
        //$this->load->view('template', $this->data);
    }
}
