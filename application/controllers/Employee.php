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
        $this->template->add_js('plugins/jquery-validation/js/jquery.validate.min.js');
        $this->template->add_js('plugins/bootstrap-datepicker/js/bootstrap-datepicker.js');

        //Page Script
        $this->template->add_js('scripts/app.js');
        $this->template->add_js('scripts/employee/employee-function.js');


        $this->data['js'] = $this->template->js;
        $this->data['css'] = $this->template->css;

        $this->data['title'] = "Employee";
        $this->data['page_title'] = "Add Employee";
        $this->data['active_tab'] = "employee";
        $this->data['page_content'] = "employee/add_employee";

        $this->data['leave'] = $this->employee_model->leave_type();

        $this->form_validation->set_rules('employee_code', 'Employee Code', 'trim|required');
        $this->form_validation->set_rules('employee_first_name', 'First Name', 'trim|required|alpha');
        $this->form_validation->set_rules('employee_middle_name', 'Middle Name', 'trim|required|alpha');
        $this->form_validation->set_rules('employee_last_name', 'Last Name', 'trim|required|alpha');
        $this->form_validation->set_rules('birth_date', 'Birth Date', 'trim|required');
        $this->form_validation->set_rules('mobile_number', 'Mobile Number', 'trim|required|numeric');
        $this->form_validation->set_rules('department_id', 'Department', 'trim|required');
        $this->form_validation->set_rules('designation_id', 'Designation', 'trim|required');
        $this->form_validation->set_rules('join_date', 'Joining Date', 'trim|required');
        $this->form_validation->set_rules('email_id', 'Email Id', 'trim|required');
        $this->form_validation->set_rules('login', 'Username', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');

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

            $img_name = $this->input->post('employee_photo');
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

            $emp_leave = $this->input->post('leave');
            $emp_leave_type = $this->input->post('leave_type_id');

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

            $uname = $this->session->userdata('username');

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
                'created_by' => $uname,
                'created_date' => date('Y-m-d H:i:s'),
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
                'create_by' => $uname,
                'created_date' => date('Y-m-d H:i:s'),
                'status' => 'active'
            );
            //Transfering data to Model

            $addr_id = $this->employee_model->emp_insert('address_master', $addr_param);

            $login_param = array(
                'login_employee_id' => $emp_id,
                'company_email_id' => $login,
                'password' => $password,
                'create_by' => $uname,
                'created_date' => date('Y-m-d H:i:s'),
                'status' => 'active'
            );
            //Transfering data to Model

            $login_id = $this->employee_model->emp_insert('login_master', $login_param);


            for ($i = 0; $i < count($emp_leave); $i++) {

                if ($emp_leave[$i] != '') {
                    $leave_param = array(
                        'employee_id' => $emp_id,
                        'leave_type_id' => $emp_leave_type[$i],
                        'allowed_days' => $emp_leave[$i],
                        'created_by' => $uname,
                        'created_date' => date('Y-m-d H:i:s')
                    );
                    $this->employee_model->leave_insert('employee_leave', $leave_param);
                }
            }


            $this->session->set_flashdata('success', 'Successfully Saved Employee.');
            redirect(base_url('employee'));
        }
    }

    public function edit_employee($id) {

        //page level css
        $this->template->add_css('plugins/select2/select2.css');
        $this->template->add_css('plugins/bootstrap-datepicker/css/datepicker.css');

        //page level plugin
        $this->template->add_js('plugins/select2/select2.min.js');
        $this->template->add_js('plugins/jquery-validation/js/jquery.validate.min.js');
        $this->template->add_js('plugins/bootstrap-datepicker/js/bootstrap-datepicker.js');

        //Page Script
        $this->template->add_js('scripts/app.js');
        $this->template->add_js('scripts/employee/employee-function.js');


        $this->data['title'] = "Employee";
        $this->data['page_title'] = "Edit Employee";
        $this->data['active_tab'] = "employee";
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
        $dept_id = $this->data['employee']->department_id;
        $script = "$(document).ready(function (){"
                . "$('#department_id').select2('data', $json_department_data);"
                . "designation_list($dept_id);"
                . "$('#designation_id').select2('data', $json_designation_data);"
                . "});";

        $this->template->add_js($script, "embed");

        $this->data['js'] = $this->template->js;
        $this->data['css'] = $this->template->css;


        $this->data['leave'] = $this->employee_model->get_employee_leave_data($id);


        $this->form_validation->set_rules('employee_code', 'Employee Code', 'trim|required');
        $this->form_validation->set_rules('employee_first_name', 'First Name', 'trim|required|alpha');
        $this->form_validation->set_rules('employee_middle_name', 'Middle Name', 'trim|required|alpha');
        $this->form_validation->set_rules('employee_last_name', 'Last Name', 'trim|required|alpha');
        $this->form_validation->set_rules('birth_date', 'Birth Date', 'trim|required');
        $this->form_validation->set_rules('mobile_number', 'Mobile Number', 'trim|required|numeric');
        $this->form_validation->set_rules('department_id', 'Department', 'trim|required');
        $this->form_validation->set_rules('designation_id', 'Designation', 'trim|required');
        $this->form_validation->set_rules('join_date', 'Joining Date', 'trim|required');
        $this->form_validation->set_rules('email_id', 'Email Id', 'trim|required');
        $this->form_validation->set_rules('login', 'Username', 'trim|required');


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

            $img_name = $this->input->post('employee_photo');
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

            $emp_leave = $this->input->post('leave');

            $emp_leave_id = $this->input->post('employee_leave_id');

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

            $uname = $this->session->userdata('username');

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
                    'modified_by' => $uname,
                    'modified_date' => date('Y-m-d H:i:s')
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
                    'modified_by' => $uname,
                    'modified_date' => date('Y-m-d H:i:s')
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
                'modified_by' => $uname,
                'modified_date' => date('Y-m-d H:i:s')
            );
            //Transfering data to Model

            $this->employee_model->emp_update('address_master', $addr_param, $id, 'address_employee_id');

            $login_param = array(
                'company_email_id' => $login,
                'modified_by' => $uname,
                'modified_date' => date('Y-m-d H:i:s')
            );
            //Transfering data to Model

            $this->employee_model->emp_update('login_master', $login_param, $id, 'login_employee_id');


            for ($i = 0; $i < count($emp_leave); $i++) {

                if ($emp_leave[$i] != '') {
                    $leave_param = array(
                        'allowed_days' => $emp_leave[$i],
                        'modified_by' => $uname,
                        'modified_date' => date('Y-m-d H:i:s')
                    );

                    $this->employee_model->leave_update('employee_leave', $leave_param, $emp_leave_id[$i]);
                }
            }

            $this->session->set_flashdata('success', "Record Of $lname $fname $mname is Been Update Sucessfully.");
            redirect(base_url('employee'));
        }
    }

    public function get_department_list() {
        if (!$this->input->is_ajax_request()) {
            exit('No direct script access allowed');
        } else {
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
    }

    public function get_designation_list($id) {
        if (!$this->input->is_ajax_request()) {
            exit('No direct script access allowed');
        } else {
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
    }

    public function change_status() {
        if (!$this->input->is_ajax_request()) {
            exit('No direct script access allowed');
        } else {
            $employee_id = $this->input->post("employee_id");
            $status = $this->input->post("status");
            $status = ($status == "active") ? "deactive" : "active";
            $uname = $this->session->userdata('username');
            $data = array(
                "status" => $status,
                'modified_by' => $uname,
                'modified_date' => date('Y-m-d H:i:s')
            );
            $this->employee_model->change_status_model("employee_master",$employee_id, $data, "employee_id");
            $this->employee_model->change_status_model("address_master",$employee_id, $data, "address_employee_id");
            $this->employee_model->change_status_model("login_master",$employee_id, $data, "login_employee_id");
            echo $status;
        }
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
