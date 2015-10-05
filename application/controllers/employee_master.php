<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Employee_master extends CI_Controller {

    function __construct() {
        parent::__construct();
//$this->load->view('employee_master/add_employee', $data);
        $this->load->model('emp/emp_model', '', TRUE);
    }

    public function index() {

// page level script
        $this->template->add_js('scripts/app.js');
        $this->template->add_js('scripts/emp/validation.js');

        $this->data['js'] = $this->template->js;
        $this->data['css'] = $this->template->css;


        $this->data['title'] = "Employee List";
        $this->data['page_title'] = "Employee List";
        $this->data['active_tab'] = "employee";
        $this->data['page_content'] = "employee/add_employee";

//$this->data['query'] = $this->emp_model->employee_getall();


        $this->load->view('template', $this->data);
    }

    public function add_employee() {
        if (!$this->input->is_ajax_request()) {

//page level css
            $this->template->add_css('plugins/select2/select2.css');
            $this->template->add_css('plugins/bootstrap-datepicker/css/datepicker.css');


//page level plugin
            $this->template->add_js('plugins/select2/select2.min.js');
            $this->template->add_js('plugins/bootstrap-datepicker/js/bootstrap-datepicker.js');
//$this->template->add_js('scripts/designation.js');
//IMPORTANT! Load jquery-ui-1.10.3.custom.min.js before bootstrap.min.js to fix bootstrap tooltip conflict with jquery ui tooltip 
            $this->template->add_js('plugins/jquery-ui/jquery-ui-1.10.3.custom.min.js');
            $this->template->add_js('plugins/bootstrap/js/bootstrap.min.js');
            $this->template->add_js('plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js');
            $this->template->add_js('plugins/jquery-slimscroll/jquery.slimscroll.min.js');
            $this->template->add_js('plugins/jquery.blockui.min.js');
            $this->template->add_js('plugins/uniform/jquery.uniform.min.js');


// page level script
            $this->template->add_js('scripts/app.js');
//$this->template->add_js('scripts/form-samples.js');
            $this->template->add_js('scripts/form-components.js');
            $this->template->add_js('scripts/emp/validation.js');

            $this->data['js'] = $this->template->js;
            $this->data['css'] = $this->template->css;


            $this->data['title'] = "Employee";
            $this->data['page_title'] = "Add Employee";
            $this->data['active_tab'] = "add-employee";
            $this->data['page_content'] = "employee/add_employee";


//        exit('No direct script access allowed');
        } else {
            $this->form_validation->set_rules('employee_code', 'employee_code', 'trim|required');
            $this->form_validation->set_rules('employee_first_name', 'employee_first_name', 'trim|required');

            if ($this->form_validation->run() == FALSE) {
//Field validation failed.  User redirected to login page
                $return = array(
                    'status' => FALSE,
                    'response' => validation_errors()
                );
            } else {
                $return = array(
                    'status' => TRUE,
                    'response' => "Done"
                );


                $param = array(
                    'employee_code' => $code,
                    'employee_gender' => $gender,
                    'employee_first_name' => $fname,
                    'employee_middle_name' => $mname,
                    'employee_last_name' => $lname,
                    'birth_date' => $dob,
                    'mobile_number' => $mo,
                    'employee_photo' => $image,
                    'department_id' => $dept,
                    'designation_id' => $desc,
                    'experience_year' => $exp_year,
                    'experience_month' => $exp_month,
                    'join_date' => $join_date,
                    'office_number' => $office_numer,
                    'email_id' => $emp,
                    'created_by' => $created_by,
                    'modified_by' => $created_by,
                    'modified_date' => CURRENT_TIMESTAMP,
                );
//Transfering data to Model
                $this->emp_model->emp_insert($param);

                $this->session->set_flashdata('success', 'Successfully Saved Employee');
                redirect(base_url('employee'));
            }
            echo json_encode($return);
        }
//redirect(base_url('employee_master'));
    }

}
