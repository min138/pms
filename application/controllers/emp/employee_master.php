<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Employee_master extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->view('employee/add_employee', $data);
        $this->load->model('emp/emp_model', '', TRUE);
    }

    public function index() {

        //page level css
        $this->template->add_css('plugins/select2/select2.css');
        $this->template->add_css('plugins/datatables/extensions/Scroller/css/dataTables.scroller.min.css');
        $this->template->add_css('plugins/datatables/extensions/ColReorder/css/dataTables.colReorder.min.css');
        $this->template->add_css('plugins/datatables/plugins/bootstrap/dataTables.bootstrap.css');

        //page level plugin
        $this->template->add_js('plugins/select2/select2.min.js');
        $this->template->add_js('plugins/datatables/media/js/jquery.dataTables.min.js');
        $this->template->add_js('plugins/datatables/extensions/TableTools/js/dataTables.tableTools.min.js');
        $this->template->add_js('plugins/datatables/extensions/ColReorder/js/dataTables.colReorder.min.js');
        $this->template->add_js('plugins/datatables/extensions/Scroller/js/dataTables.scroller.min.js');
        $this->template->add_js('plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js');




        //IMPORTANT! Load jquery-ui-1.10.3.custom.min.js before bootstrap.min.js to fix bootstrap tooltip conflict with jquery ui tooltip 
        $this->template->add_js('plugins/jquery-ui/jquery-ui-1.10.3.custom.min.js');
        $this->template->add_js('plugins/bootstrap/js/bootstrap.min.js');

        $this->template->add_js('plugins/jstreet/dist/libs/jquery.js');
        $this->template->add_js('plugins/jquery-validation/js/jquery.validate.js');

        $this->template->add_js('plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js');
        $this->template->add_js('plugins/jquery-slimscroll/jquery.slimscroll.min.js');
        $this->template->add_js('plugins/jquery.blockui.min.js');
        $this->template->add_js('plugins/uniform/jquery.uniform.min.js');


        // page level script
        $this->template->add_js('scripts/app.js');
        $this->template->add_js('scripts/table-advanced.js');
        $this->template->add_js('scripts/employee/table_list.js');

        $this->data['js'] = $this->template->js;
        $this->data['css'] = $this->template->css;


        $this->data['title'] = "Employee List";
        $this->data['page_title'] = "Employee List";
        $this->data['active_tab'] = "employee";
        $this->data['page_content'] = "employee/index";

        $this->data['query'] = $this->emp_model->employee_getall();


        $this->load->view('template', $this->data);
    }

    public function add_employee() {

        //page level css
        $this->template->add_css('plugins/select2/select2.css');
        $this->template->add_css('plugins/bootstrap-datepicker/css/datepicker.css');



        //page level plugin
        $this->template->add_js('plugins/select2/select2.min.js');
        $this->template->add_js('plugins/bootstrap-datepicker/js/bootstrap-datepicker.js');


        //IMPORTANT! Load jquery-ui-1.10.3.custom.min.js before bootstrap.min.js to fix bootstrap tooltip conflict with jquery ui tooltip 
        $this->template->add_js('plugins/jquery-ui/jquery-ui-1.10.3.custom.min.js');
        $this->template->add_js('plugins/bootstrap/js/bootstrap.min.js');
        $this->template->add_js('plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js');
        $this->template->add_js('plugins/jquery-slimscroll/jquery.slimscroll.min.js');
        $this->template->add_js('plugins/jquery.blockui.min.js');
        $this->template->add_js('plugins/uniform/jquery.uniform.min.js');


        // page level script
        $this->template->add_js('scripts/app.js');
        $this->template->add_js('scripts/upload/Validation/validation.js');
        //$this->template->add_js('scripts/form-samples.js');
        $this->template->add_js('scripts/form-components.js');
        $this->template->add_js('scripts/employee/table_list.js');

        $this->data['js'] = $this->template->js;
        $this->data['css'] = $this->template->css;


        $this->data['title'] = "Employee";
        $this->data['page_title'] = "Add Employee";
        $this->data['active_tab'] = "add-employee";
        $this->data['page_content'] = "employee/add_employee";

        //This method will have the credentials validation

        $this->form_validation->set_rules('employee_code', 'Employee Code', 'required');

        if ($this->form_validation->run() == FALSE) {
            //Field validation failed.  User redirected to login page
            echo json_encode(array('st' => 0, 'msg' => validation_errors()));
        } else {
            //Field validation succeeded.  Validate against database
            // $dob = implode("-", array_reverse(explode("/", $this->input->post('dob'))));
            $code = $this->input->post('employee_code');
            $gender = $this->input->post('employee_gender');
            $fname = $this->input->post('employee_first_namer');
            $mname = $this->input->post('employee_middle_name');
            $lname = $this->input->post('employee_last_name');
            $dob = $this->input->post('birth_date');
            $mo = $this->input->post('mobile_number');
            $image = $this->input->post('employee_photo');
            $dept = $this->input->post('department_id');
            $desc = $this->input->post('designation_id');
            $exp_year = $this->input->post('experience_year');
            $exp_month = $this->input->post('experience_month');
            $join_date = $this->input->post('$join_date');
            $office_numer = $this->input->post('office_number');
            $emp = $this->input->post('email_id');
            //  $created_by = $this->input->post('created_by'); 
            //query the database
            $result = $this->employee_model->checkemployee($email);

            if ($result) {
                $this->session->set_flashdata('error', 'Email Id Already Exist');
                $this->load->view('template', $this->data);
                //redirect('Dashboard', 'refresh');
            } else {
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
        }
        //$this->load->view('template', $this->data);
    }

    public function edit_employee($id) {




        //page level css
        $this->template->add_css('plugins/select2/select2.css');


        //page level plugin
        $this->template->add_js('plugins/select2/select2.min.js');


        //IMPORTANT! Load jquery-ui-1.10.3.custom.min.js before bootstrap.min.js to fix bootstrap tooltip conflict with jquery ui tooltip 
        $this->template->add_js('plugins/jquery-ui/jquery-ui-1.10.3.custom.min.js');
        $this->template->add_js('plugins/bootstrap/js/bootstrap.min.js');
        $this->template->add_js('plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js');
        $this->template->add_js('plugins/jquery-slimscroll/jquery.slimscroll.min.js');
        $this->template->add_js('plugins/jquery.blockui.min.js');
        $this->template->add_js('plugins/uniform/jquery.uniform.min.js');


        // page level script
        $this->template->add_js('scripts/app.js');
        $this->template->add_js('scripts/form-samples.js');
        $this->template->add_js('scripts/employee/table_list.js');

        $this->data['js'] = $this->template->js;
        $this->data['css'] = $this->template->css;


        $this->data['title'] = "Employee";
        $this->data['page_title'] = "Edit Employee";
        $this->data['active_tab'] = "edit-employee";
        $this->data['page_content'] = "employee/edit_employee";
        $this->data['emp_id'] = $id;

        $this->data['query'] = $this->employee_model->form_edit($id);

        //This method will have the credentials validation

        $this->form_validation->set_rules('firstname', 'Firstname', 'trim|required|alpha');
        $this->form_validation->set_rules('lastname', 'Lastname', 'trim|required|alpha');
        $this->form_validation->set_rules('gender', 'Gender', 'trim|required');
        $this->form_validation->set_rules('dob', 'Birthdate', 'trim|required');
        $this->form_validation->set_rules('mob', 'Mobile', 'trim|required|numeric');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');

        if ($this->form_validation->run() == FALSE) {
            //Field validation failed.  User redirected to login page
            $this->load->view('template', $this->data);
        } else {
            //Field validation succeeded.  Validate against database

            $fname = $this->input->post('firstname');
            $lname = $this->input->post('lastname');
            $gender = $this->input->post('gender');
            $dob = implode("-", array_reverse(explode("/", $this->input->post('dob'))));
            $mob = $this->input->post('mob');
            $email = $this->input->post('email');

            //query the database

            $param = array(
                'emp_fname' => $fname,
                'emp_lname' => $lname,
                'gender' => $gender,
                'bdate' => $dob,
                'mobile' => $mob,
                'email' => $email,
            );
            //Transfering data to Model
            $this->employee_model->form_update($id, $param);

            $this->session->set_flashdata('success', 'Successfully Modified Employee Information');
            redirect(base_url('employee'));
        }




        //$this->load->view('template', $this->data);
    }

    public function delete_employee($id) {



        //Transfering data to Model
        $this->employee_model->form_delete($id);

        $this->session->set_flashdata('success', 'Successfully Delete Employee Information');
        redirect(base_url('employee'));





        //$this->load->view('template', $this->data);
    }

}
