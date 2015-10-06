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
        //$this->template->add_js('scripts/emp/validation.js');

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

        $this->template->add_js('scripts/app.js');

        $this->data['js'] = $this->template->js;
        $this->data['css'] = $this->template->css;

        $this->data['title'] = "Employee";
        $this->data['page_title'] = "Add Employee";
        $this->data['active_tab'] = "add-employee";
        $this->data['page_content'] = "employee/add_employee";

//        exit('No direct script access allowed');

        $this->form_validation->set_rules('employee_code', 'Employee Code', 'trim|required');
        $this->form_validation->set_rules('employee_first_name', 'First Name', 'trim|required');
        $this->form_validation->set_rules('employee_middle_name', 'Middle Name', 'trim|required');
        $this->form_validation->set_rules('employee_last_name', 'Last Name', 'trim|required');
        $this->form_validation->set_rules('birth_date', 'Birth Date', 'trim|required');
        $this->form_validation->set_rules('mobile_number', 'Mobile Number', 'trim|required');

        if ($this->form_validation->run() == FALSE) {
//Field validation failed.  User redirected to login page
            $this->load->view('template', $this->data);
        } else {

            $dir = './assets/uploads';
            if (!file_exists($dir) && !is_dir($dir)) {
                mkdir('./assets/uploads', 0755, true);
            }

            $img_config = array();
            $img_config['upload_path'] = './assets/uploads/';
            $img_config['allowed_types'] = 'gif|jpg|png';
            $this->load->library('upload', $img_config);

            $this->upload->do_upload('employee_photo');

            $path = $this->upload->data();
            $img_name = $path['file_name'];


            //$image = $this->input->$_FILES['employee_photo']['name'];

            $code = $this->input->post('employee_code');
            $fname = $this->input->post('employee_first_name');
            $mname = $this->input->post('employee_middle_name');
            $lname = $this->input->post('employee_last_name');
            $dob = $this->input->post('birth_date');
            $mo = $this->input->post('mobile_number');
            $gender = $this->input->post('employee_gender');

            $image = $this->input->post('employee_photo');
            $dept = $this->input->post('department_id');
            $desc = $this->input->post('designation_id');
            $exp_year = $this->input->post('experience_year');
            $exp_month = $this->input->post('experience_month');
            $join_date = $this->input->post('join_date');
            $emp = $this->input->post('email_id');
            $bno = $this->input->post('bno');

            $landmark = $this->input->post('landmark');
            $country = $this->input->post('country');
            $state = $this->input->post('state');
            $city = $this->input->post('city');
            $pincode = $this->input->post('pincode');
            $homeno = $this->input->post('homeno');

            $login = $this->input->post('login');
            $password = $this->input->post('password');

            $param = array(
                'employee_code' => $code,
                'employee_first_name' => $fname,
                'employee_middle_name' => $mname,
                'employee_last_name' => $lname,
                'birth_date' => $dob,
                'mobile_number' => $mo,
                'employee_gender' => $gender,
                'employee_photo' => $img_name,
                'department_id' => $dept,
                'designation_id' => $desc,
                'experience_year' => $exp_year,
                'experience_month' => $exp_month,
                'join_date' => $join_date,
                'office_number' => $homeno,
                'email_id' => $emp,
                'created_date' => date('Y-m-d H:i:s'),
                'modified_date' => date('Y-m-d H:i:s'),
            );
            //Transfering data to Model

            $this->emp_model->emp_insert($param);

            $this->session->set_flashdata('success', 'Successfully Saved Employee');
            //redirect(base_url('employee'));
        }

//redirect(base_url('employee_master'));
    }

}
