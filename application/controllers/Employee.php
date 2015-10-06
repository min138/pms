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
