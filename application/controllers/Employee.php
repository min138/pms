<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Employee extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('employee_model', '', TRUE);
    }

    public function index() {

        //page level css test
        $this->template->add_css('plugins/select2/select2.css');
        $this->template->add_css('plugins/datatables/plugins/bootstrap/dataTables.bootstrap.css');

        //page level plugin test
        $this->template->add_js('plugins/select2/select2.min.js');
        $this->template->add_js('plugins/datatables/media/js/jquery.dataTables.min.js');
        $this->template->add_js('plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js');
        // page level script
        $this->template->add_js('scripts/app.js');
        $this->template->add_js('scripts/employee/employee-list.js');

        $this->data['js'] = $this->template->js;
        $this->data['css'] = $this->template->css;

        $this->data['title'] = "Employee List";
        $this->data['page_title'] = "Employee List";
        $this->data['active_tab'] = "employee";
        $this->data['page_content'] = "employee/index";

        $this->data['employees'] = $this->employee_model->get_employee_list();

        $this->load->view('template', $this->data);
    }

    public function add_employee() {
        //page level css
        $this->template->add_css('plugins/select2/select2.css');
        $this->template->add_css('plugins/bootstrap-datepicker/css/datepicker.css');

        //page level plugin
        $this->template->add_js('plugins/select2/select2.min.js');
        $this->template->add_js('plugins/bootstrap-datepicker/js/bootstrap-datepicker.js');

        //Page Script
        $this->template->add_js('scripts/app.js');
        $this->template->add_js('scripts/employee/employee-function.js');

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
            $code = $this->input->post('employee_code');
            $fname = $this->input->post('employee_first_name');
            $mname = $this->input->post('employee_middle_name');
            $lname = $this->input->post('employee_last_name');
            $dob = date('Y-m-d', strtotime($this->input->post('birth_date')));
            $mo = $this->input->post('mobile_number');
            $gender = $this->input->post('employee_gender');

            $image = $this->input->post('employee_photo');
            $dept = $this->input->post('department_id');
            $desc = $this->input->post('designation_id');
            $exp_year = $this->input->post('experience_year');
            $exp_month = $this->input->post('experience_month');
            $join_date = date('Y-m-d', strtotime($this->input->post('join_date')));
            $email = $this->input->post('email_id');

            $bno = $this->input->post('bno');
            $landmark = $this->input->post('landmark');
            $country = $this->input->post('country');
            $state = $this->input->post('state');
            $city = $this->input->post('city');
            $pincode = $this->input->post('pincode');
            $homeno = $this->input->post('homeno');

            $login = $this->input->post('login');
            $password = $this->input->post('password');

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

            $emp_param = array(
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
                'email_id' => $email,
                'created_date' => date('Y-m-d H:i:s'),
                'modified_date' => date('Y-m-d H:i:s'),
                'status' => 'active'
            );
            //Transfering data to Model

            $emp_id = $this->employee_model->emp_insert('employee_master', $emp_param);

            $addr_param = array(
                'address_employee_id' => $emp_id,
                'block_no' => $bno,
                'area' => $landmark,
                'country' => $country,
                'state' => $state,
                'city' => $city,
                'pin_code' => $pincode,
                'created_date' => date('Y-m-d H:i:s'),
                'modified_date' => date('Y-m-d H:i:s'),
                'status' => 'active'
            );
            //Transfering data to Model

            $addr_id = $this->employee_model->emp_insert('address_master', $addr_param);

            $login_param = array(
                'login_employee_id' => $emp_id,
                'company_email_id' => $login,
                'password' => $password,
                'created_date' => date('Y-m-d H:i:s'),
                'modified_date' => date('Y-m-d H:i:s'),
                'status' => 'active'
            );
            //Transfering data to Model

            $login_id = $this->employee_model->emp_insert('login_master', $login_param);

            $this->session->set_flashdata('success', 'Successfully Saved Employee.');
            redirect(base_url('employee'));
        }

//redirect(base_url('employee_master'));
    }

    public function edit_employee($id) {

        //page level css
        $this->template->add_css('plugins/select2/select2.css');
        $this->template->add_css('plugins/bootstrap-datepicker/css/datepicker.css');

        //page level plugin
        $this->template->add_js('plugins/select2/select2.min.js');
        $this->template->add_js('plugins/bootstrap-datepicker/js/bootstrap-datepicker.js');

        //Page Script
        $this->template->add_js('scripts/app.js');
        $this->template->add_js('scripts/employee/employee-function.js');

        $this->data['title'] = "Employee";
        $this->data['page_title'] = "Edit Employee";
        $this->data['active_tab'] = "edit-employee";
        $this->data['page_content'] = "employee/edit_employee";

        $this->data['employee'] = $this->employee_model->get_employee_data($id);

        $json_department_data = json_encode(array(
            'id' => $this->data['employee']->department_id,
            'text' => $this->data['employee']->department_name
        ));

        $json_designation_data = json_encode(array(
            'id' => $this->data['employee']->designation_id,
            'text' => $this->data['employee']->designation_name
        ));

        $script = "$(document).ready(function (){"
                . "$('#department-id').select2('data', $json_department_data);"
                . "$('#designation-id').select2('data', $json_designation_data);"
                . "});";

        $this->template->add_js($script, "embed");

        $this->data['js'] = $this->template->js;
        $this->data['css'] = $this->template->css;

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
            $code = $this->input->post('employee_code');
            $fname = $this->input->post('employee_first_name');
            $mname = $this->input->post('employee_middle_name');
            $lname = $this->input->post('employee_last_name');
            $dob = date('Y-m-d', strtotime($this->input->post('birth_date')));
            $mo = $this->input->post('mobile_number');
            $gender = $this->input->post('employee_gender');

            $image = $this->input->post('employee_photo');
            $dept = $this->input->post('department_id');
            $desc = $this->input->post('designation_id');
            $exp_year = $this->input->post('experience_year');
            $exp_month = $this->input->post('experience_month');
            $join_date = date('Y-m-d', strtotime($this->input->post('join_date')));
            $email = $this->input->post('email_id');

            $bno = $this->input->post('bno');
            $landmark = $this->input->post('landmark');
            $country = $this->input->post('country');
            $state = $this->input->post('state');
            $city = $this->input->post('city');
            $pincode = $this->input->post('pincode');
            $homeno = $this->input->post('homeno');

            $login = $this->input->post('login');
            $password = $this->input->post('password');

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

            if ($img_name == '') {

                $emp_param = array(
                    'employee_code' => $code,
                    'employee_first_name' => $fname,
                    'employee_middle_name' => $mname,
                    'employee_last_name' => $lname,
                    'birth_date' => $dob,
                    'mobile_number' => $mo,
                    'employee_gender' => $gender,
                    'department_id' => $dept,
                    'designation_id' => $desc,
                    'experience_year' => $exp_year,
                    'experience_month' => $exp_month,
                    'join_date' => $join_date,
                    'office_number' => $homeno,
                    'email_id' => $email,
                    'created_date' => date('Y-m-d H:i:s'),
                    'modified_date' => date('Y-m-d H:i:s'),
                    'status' => 'active'
                );
            } else {
                $emp_param = array(
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
                    'email_id' => $email,
                    'created_date' => date('Y-m-d H:i:s'),
                    'modified_date' => date('Y-m-d H:i:s'),
                    'status' => 'active'
                );
            }
            //Transfering data to Model


            $this->employee_model->emp_update('employee_master', $emp_param, $id, 'employee_id');

            $addr_param = array(
                
                'block_no' => $bno,
                'area' => $landmark,
                'country' => $country,
                'state' => $state,
                'city' => $city,
                'pin_code' => $pincode,
                'created_date' => date('Y-m-d H:i:s'),
                'modified_date' => date('Y-m-d H:i:s'),
                'status' => 'active'
            );
            //Transfering data to Model

            $this->employee_model->emp_update('address_master', $addr_param, $id, 'address_employee_id');

            $login_param = array(
                
                'company_email_id' => $login,
                'password' => $password,
                'created_date' => date('Y-m-d H:i:s'),
                'modified_date' => date('Y-m-d H:i:s'),
                'status' => 'active'
            );
            //Transfering data to Model

            $this->employee_model->emp_update('login_master', $login_param, $id, 'login_employee_id');

            $this->session->set_flashdata('success', "Record Of $lname $fname $mname is Been Update Sucessfully.");
            redirect(base_url('employee'));
        }
    }

    public function delete_employee($id) {

        //Transfering data to Model
        $this->employee_model->form_delete($id);

        $this->session->set_flashdata('success', 'Successfully Delete Employee Information');
        redirect(base_url('employee'));

        //$this->load->view('template', $this->data);
    }

    public function get_department_list() {

        $row = array();
        $return_arr = array();
        $row_array = array();
        $keyword_name = $this->input->post("department_id");
        if ($keyword_name != '') {
            $result = $this->employee_model->search_department($keyword_name);
            if (count($result) > 0) {
                foreach ($result as $row) {
                    $row_array['id'] = $row->department_id;
                    $row_array['text'] = utf8_encode($row->department_name);
                    array_push($return_arr, $row_array);
                }
            }
        } else {
            $result = $this->employee_model->get_department();
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

    public function get_designation_list($id) {

        $row = array();
        $return_arr = array();
        $row_array = array();
        $keyword_name = $this->input->post("designation_id");
        if ($keyword_name != '') {
            $result = $this->employee_model->search_designation($keyword_name, $id);
            if (count($result) > 0) {
                foreach ($result as $row) {
                    $row_array['id'] = $row->designation_id;
                    $row_array['text'] = utf8_encode($row->designation_name);
                    array_push($return_arr, $row_array);
                }
            }
        } else {
            $result = $this->employee_model->get_designation($id);
            if (count($result) > 0) {
                foreach ($result as $row) {
                    $row_array['id'] = $row->designation_id;
                    $row_array['text'] = utf8_encode($row->designation_name);
                    array_push($return_arr, $row_array);
                }
            }
        }

        $ret['items'] = $return_arr;
        echo json_encode($ret);
    }

    public function change_status() {
        $employee_id = $this->input->post("employee_id");
        $status = $this->input->post("status");
        $status = ($status == "active") ? "deactive" : "active";

        $data = array(
            "status" => $status
        );
        $this->employee_model->change_status_model($employee_id, $data);
        echo $status;
    }
    
    public function view_employee_profile($id) {

        //page level css
        $this->template->add_css('plugins/bootstrap-fileupload/bootstrap-fileupload.css');
        
        

        //page level plugin
        $this->template->add_js('plugins/bootstrap-fileupload/bootstrap-fileupload.js');
        
        //Page Css
        $this->template->add_css('css/pages/profile.css');
        
        //Page Script
        $this->template->add_js('scripts/app.js');
        

        $this->data['title'] = "Employee";
        $this->data['page_title'] = "View Employee";
        $this->data['active_tab'] = "view-employee";
        $this->data['page_content'] = "employee/view_employee_profile";

        $this->data['employee'] = $this->employee_model->get_employee_data($id);

        

        $this->data['js'] = $this->template->js;
        $this->data['css'] = $this->template->css;

        //Field validation failed.  User redirected to login page
        $this->load->view('template', $this->data);
        
    }

}
