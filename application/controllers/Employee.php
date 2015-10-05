<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Employee extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('employee_model', '', TRUE);
    }

    public function index() {

        //page level css
        $this->template->add_css('plugins/select2/select2.css');
        $this->template->add_css('plugins/datatables/plugins/bootstrap/dataTables.bootstrap.css');

        //page level plugin
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

    public function employee_list_datatable() {
        if ($this->input->is_ajax_request()) {
            $aaData = array();
            $resultSet = $this->employee_model->get_employee_list();
            $total_records = count($resultSet);
            $sql = $this->db->last_query();

            $limit = isset($_POST['iDisplayLength']) ? $_POST['iDisplayLength'] : 5;
            $start = isset($_POST['iDisplayStart']) ? $_POST['iDisplayStart'] : 0;
            $sql .= " LIMIT $start , $limit ";
            $resultSet = $this->db->query($sql)->result();
            $singleListArray = array();
            if ($resultSet) {
                foreach ($resultSet as $row) {
                    $singleListArray['DT_RowId'] = 'employee_' . $row->employee_id;
                    $singleListArray['DT_RowClass'] = 'sp5';
                    $singleListArray['employee_name'] = $row->employee_first_name . ' ' . $row->employee_middle_name . ' ' . $row->employee_last_name;
                    $singleListArray['gender'] = $row->employee_gender;
                    $singleListArray['birth_date'] = $row->birth_date;
                    $singleListArray['mobile_number'] = $row->mobile_number;
                    $singleListArray['email_id'] = $row->email_id;
                    $singleListArray['action'] = " Edit | Delete";

                    $aaData[] = $singleListArray;
                }
            }
            $finalJsonArray['sEcho'] = $_POST['sEcho'] ? $_POST['sEcho'] : 1;
            $finalJsonArray['iTotalRecords'] = $total_records;
            $finalJsonArray['iTotalDisplayRecords'] = $total_records;
            $finalJsonArray['aaData'] = $aaData;
            echo json_encode($finalJsonArray);
        } else {
            redirect(base_url() . 'permissionDenied');
        }
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
            $result = $this->employee_model->checkemployee($email);

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
