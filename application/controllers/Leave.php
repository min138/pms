<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Leave extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('leave_model');
    }

    /**
     * Ingredient
     *
     * This model represents Employee data. It operates the following tables:
     * - Ingredient 
     *
     * @author	Abhay Suchak
     */
    public function index() {

        //page level css
        $this->template->add_css('plugins/select2/select2.css');
        $this->template->add_css('plugins/datatables/plugins/bootstrap/dataTables.bootstrap.css');
        $this->template->add_css('plugins/bootstrap-modal/css/bootstrap-modal-bs3patch.css');
        $this->template->add_css('plugins/bootstrap-modal/css/bootstrap-modal.css');

        //page level plugin
        $this->template->add_js('plugins/select2/select2.min.js');
        $this->template->add_js('plugins/datatables/media/js/jquery.dataTables.min.js');
        $this->template->add_js('plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js');
        $this->template->add_js('plugins/bootstrap-modal/js/bootstrap-modalmanager.js');
        $this->template->add_js('plugins/bootstrap-modal/js/bootstrap-modal.js');

        // page level script
        $this->template->add_js('scripts/app.js');
        $this->template->add_js('scripts/leave/leave-list.js');
        //$this->template->add_js('scripts/department/department_list.js');

        $this->data['js'] = $this->template->js;
        $this->data['css'] = $this->template->css;

        $this->data['title'] = "leave";
        $this->data['page_title'] = "leave";
        $this->data['active_tab'] = "add-leave";
        $this->data['page_content'] = "leave/index";

        $this->data['leave'] = $this->leave_model->get_leave_list();
        //$this->data['query'] = $this->emp_model->employee_getall();
        $this->load->view('template', $this->data);
    }

    public function employee_leave_request() {
        //page level css test
        $this->template->add_css('plugins/select2/select2.css');
        $this->template->add_css('plugins/datatables/plugins/bootstrap/dataTables.bootstrap.css');
        $this->template->add_css('plugins/bootstrap-modal/css/bootstrap-modal-bs3patch.css');
        $this->template->add_css('plugins/bootstrap-modal/css/bootstrap-modal.css');

        //page level plugin test
        $this->template->add_js('plugins/select2/select2.min.js');
        $this->template->add_js('plugins/datatables/media/js/jquery.dataTables.min.js');
        $this->template->add_js('plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js');
        $this->template->add_js('plugins/bootstrap-modal/js/bootstrap-modalmanager.js');
        $this->template->add_js('plugins/bootstrap-modal/js/bootstrap-modal.js');
        // page level script
        $this->template->add_js('scripts/app.js');
        $this->template->add_js('scripts/leave/employee-leave-list.js');

        $this->data['js'] = $this->template->js;
        $this->data['css'] = $this->template->css;

        $this->data['title'] = "Employee Leave";
        $this->data['page_title'] = "Employee Leave";
        $this->data['active_tab'] = "add-employee-leave";
        $this->data['page_content'] = "leave/employee_leave_list";

        $emp_id = $this->session->userdata('empid');
        $this->data['employees_leave'] = $this->leave_model->get_employee_leave_list($emp_id);

        $this->load->view('template', $this->data);
    }

    public function add_leave() {
        if (!$this->input->is_ajax_request()) {



            exit('No direct script access allowed');
        } else {
            $this->template->add_css('plugins/select2/select2.css');

            //page level plugin
            $this->template->add_js('plugins/select2/select2.min.js');

            //$this->template->add_js('scripts/designation.js');
            // page level script
            $this->template->add_js('scripts/app.js');
            //$this->template->add_js('scripts/form-samples.js');
            $this->template->add_js('scripts/form-components.js');
            $this->template->add_js('scripts/department/department.js');

            $this->data['js'] = $this->template->js;
            $this->data['css'] = $this->template->css;

            $this->data['title'] = "leave";
            $this->data['page_title'] = "leave";
            $this->data['active_tab'] = "add-leave";
            $this->data['page_content'] = "leave/leave_type";
            $this->form_validation->set_rules('leave_name', 'Leave Name', 'trim|required');

            if ($this->form_validation->run() == FALSE) {
                //Field validation failed.  User redirected to login page
                $return = array(
                    'status' => "false",
                    'response' => "<div class='alert alert-danger'>" . validation_errors() . "</div>"
                );
            } else {

                $leave_name = $this->input->post('leave_name');

                $param = array(
                    'leave_name' => $leave_name,
                    'modified_date' => date("Y-m-d H:i:s")
                );
                //Transfering data to Model
                $leave_id = $this->leave_model->leave_insert($param);


                $param1 = array(
                    'leave_category_id' => '<a class="btn btn-primary btn-sm update-leave" data-leave_category_id="' . $leave_id . '" data-toggle="modal" data-target="#myModal">edit</a>',
                    'leave_name' => $leave_name
                );

                if ($leave_id != "") {
                    $return = array(
                        'status' => "true",
                        'response' => "<div class='alert alert-success'>Sucessfully done..!</div>",
                        'leave_data' => $param1
                    );
                }
            }
            echo json_encode($return);
        }
        //redirect(base_url('employee_master'));
    }

    public function leave_update() {
        if (!$this->input->is_ajax_request()) {
            exit('No direct script access allowed');
        } else {
            $this->form_validation->set_rules('update_leave_name', 'Leave Name', 'trim|required');
            // $this->form_validation->set_rules('update_designation_name', 'designation', 'trim|required');

            if ($this->form_validation->run() == FALSE) {
                //Field validation failed.  User redirected to login page
                $return = array(
                    'status' => "false",
                    'response_update' => "<div class='alert alert-danger'>" . validation_errors() . "</div>",
                );
            } else {
//            $return = array(
//                'status' => "true",
//                'response_update' => "<div class='alert alert-success'> Success Fully Updated...!!</div>",
//            );
                $leave_name = $this->input->post('update_leave_name');
                // $designation = $this->input->post('update_designation_name');
                $leave_id_hidden = $this->input->post('update_leave_id_hidden');

                $param = array(
                    'leave_name' => $leave_name,
                    //'designation_name' => $designation,
                    'modified_date' => date("Y-m-d H:i:s"),
                );

                $this->leave_model->leave_update($leave_id_hidden, $param);

                $param1 = array(
                    'leave_category_id' => $leave_id_hidden,
                    'leave_name' => $leave_name
                );


                $return = array(
                    'status' => "true",
                    'response' => "<div class='alert alert-success'>Sucessfully done..!</div>",
                    'leave_data' => $param1
                );
            }
            echo json_encode($return);
        }
    }

    public function leave_data() {
        if (!$this->input->is_ajax_request()) {
            exit('No direct script access allowed');
        } else {
            $leave_category_id = $this->input->post("leave_category_id");

            $this->data['leave_data'] = $this->leave_model->get_leave_by_id($leave_category_id);
            // echo $this->data['department_data'];
            //  exit();
            //$this->data['department_name'] = $this->department_model->get_department_name($this->data['department_data']->department_id);

            $json_leave_data = array(
                'id' => $this->data['leave_data']->leave_category_id,
                'text' => $this->data['leave_data']
            );

            $json_return_data = json_encode(array(
                'leave_name' => $json_leave_data,
                'lname' => $this->data['leave_data']->leave_name,
                'update_leave_id_hidden' => $this->data['leave_data']->leave_category_id,
            ));

            echo $json_return_data;
        }
    }

    public function get_employee_list() {
        if (!$this->input->is_ajax_request()) {
            exit('No direct script access allowed');
        } else {
            $row = array();
            $return_arr = array();
            $row_array = array();
            $keyword_name = $this->input->post("employee_id");
            if ($keyword_name != '') {
                $result = $this->leave_model->search_employee($keyword_name);
                if (count($result) > 0) {
                    foreach ($result as $row) {
                        $row_array['id'] = $row->employee_id;
                        $row_array['text'] = utf8_encode($row->employee_last_name . ' ' . $row->employee_first_name . ' ' . $row->employee_middle_name);
                        array_push($return_arr, $row_array);
                    }
                }
            } else {
                $result = $this->leave_model->get_employee();
                if (count($result) > 0) {
                    foreach ($result as $row) {
                        $row_array['id'] = $row->employee_id;
                        $row_array['text'] = utf8_encode($row->employee_last_name . ' ' . $row->employee_first_name . ' ' . $row->employee_middle_name);
                        array_push($return_arr, $row_array);
                    }
                }
            }

            $ret['items'] = $return_arr;
            echo json_encode($ret);
        }
    }

    public function get_employee_leave_type() {
        if (!$this->input->is_ajax_request()) {
            exit('No direct script access allowed');
        } else {
            $row = array();
            $return_arr = array();
            $row_array = array();
            $keyword_name = $this->input->post("employee_leave_type");
            if ($keyword_name != '') {
                $result = $this->leave_model->search_leave($keyword_name);
                if (count($result) > 0) {
                    foreach ($result as $row) {
                        $row_array['id'] = $row->leave_category_id;
                        $row_array['text'] = utf8_encode($row->leave_name);
                        array_push($return_arr, $row_array);
                    }
                }
            } else {
                $result = $this->leave_model->get_leave();
                if (count($result) > 0) {
                    foreach ($result as $row) {
                        $row_array['id'] = $row->leave_category_id;
                        $row_array['text'] = utf8_encode($row->leave_name);
                        array_push($return_arr, $row_array);
                    }
                }
            }

            $ret['items'] = $return_arr;
            echo json_encode($ret);
        }
    }

    public function apply_employee_leave() {
        //page level css
        $this->template->add_css('plugins/select2/select2.css');
        $this->template->add_css('plugins/bootstrap-datepicker/css/datepicker.css');

        //page level plugin
        $this->template->add_js('plugins/select2/select2.min.js');
        $this->template->add_js('plugins/jquery-validation/js/jquery.validate.min.js');
//        $this->template->add_js('plugins/jquery-validation/js/additional-methods.min.js');
        $this->template->add_js('plugins/bootstrap-datepicker/js/bootstrap-datepicker.js');

        //Page Script
        $this->template->add_js('scripts/app.js');
        $emp_id = $this->session->userdata('empid');
        if ($emp_id == 0) {
            $this->template->add_js('scripts/leave/leave-function.js');
        } else {
            $this->template->add_js('scripts/leave/leave_function.js');
        }

        $this->data['js'] = $this->template->js;
        $this->data['css'] = $this->template->css;

        $this->data['title'] = "Employee Leave";
        $this->data['page_title'] = "Add Employee Leave";
        $this->data['active_tab'] = "add-employee-leave";
        $this->data['page_content'] = "leave/apply_employee_leave";


        if ($emp_id == 0) {
            $this->form_validation->set_rules('employee_id', 'Employee Name', 'trim|required');
        }
        $this->form_validation->set_rules('employee_leave_type', 'Leave Type', 'trim|required');
        $this->form_validation->set_rules('start_date', 'Start Date', 'trim|required');
        $eleave = $this->input->post('employee_leave');
        if ($eleave == "Range") {
            $this->form_validation->set_rules('end_date', 'End Date', 'trim|required');
        }
        $this->form_validation->set_rules('employee_leave', 'Leave', 'trim|required');
        $this->form_validation->set_rules('msg', 'Reason', 'trim|required');


        if ($this->form_validation->run() == FALSE) {
            //Field validation failed.  User redirected to login page
            $this->load->view('template', $this->data);
        } else {
            if ($emp_id == 0) {
                $employee_id = $this->input->post('employee_id');
            } else {
                $employee_id = $emp_id;
            }
            $leave_type = $this->input->post('employee_leave_type');
            $sdate = date('Y-m-d', strtotime($this->input->post('start_date')));
            $edate = date('Y-m-d', strtotime($this->input->post('end_date')));
            $emp_leave = $this->input->post('employee_leave');
            $message = $this->input->post('msg');
            $uname = $this->session->userdata('username');
            $leave_param = array(
                'employee_id' => $employee_id,
                'leave_category_id' => $leave_type,
                'start_date' => $sdate,
                'end_date' => $edate,
                'leave_application_date' => date('Y-m-d H:i:s'),
                'leave_type' => $emp_leave,
                'leave_status' => 'on_hold',
                'leave_reason' => $message,
                'lm_create_by' => $uname,
                'lm_created_date' => date('Y-m-d H:i:s')
            );
            //Transfering data to Model

            $this->leave_model->emp_leave_insert('leave_master', $leave_param);

            $this->session->set_flashdata('success', 'Successfully Submit Request.');
            redirect(base_url('leave/employee_leave_request'));
        }
    }

    public function employee_leave_data() {
        if (!$this->input->is_ajax_request()) {
            exit('No direct script access allowed');
        } else {
            $employee_leave_id = $this->input->post("leave_id");


            $this->data['employee_leave_data'] = $this->leave_model->get_employee_leave_by_id($employee_leave_id);

            $json_employee_leave_data = array(
                'id' => $this->data['employee_leave_data']->leave_id,
                'text' => $this->data['employee_leave_data']
            );

            $ldate = date('d/m/Y', strtotime($this->data['employee_leave_data']->start_date)) . ' To ' . date('d/m/Y', strtotime($this->data['employee_leave_data']->end_date));

            if ($this->data['employee_leave_data']->leave_type == "Range") {
                $diff = abs(strtotime($this->data['employee_leave_data']->end_date) - strtotime($this->data['employee_leave_data']->start_date));
                $years = floor($diff / (365 * 60 * 60 * 24));
                $months = floor(($diff - $years * 365 * 60 * 60 * 24) / (30 * 60 * 60 * 24));
                $days = floor(($diff - $years * 365 * 60 * 60 * 24 - $months * 30 * 60 * 60 * 24) / (60 * 60 * 24));
                $ldays = ($days + 1) . ' Days';
            } else {
                $ldays = $this->data['employee_leave_data']->leave_type;
            }


            $mdate = date('d/m/Y h:i:s', strtotime($this->data['employee_leave_data']->lm_modified_date));
            $json_return_data = json_encode(array(
                'employee_leave_data' => $json_employee_leave_data,
                'employee_name' => $this->data['employee_leave_data']->employee_last_name . ' ' . $this->data['employee_leave_data']->employee_first_name . ' ' . $this->data['employee_leave_data']->employee_middle_name,
                'leave_type' => $this->data['employee_leave_data']->leave_name,
                'leave_date' => $ldate,
                'leave' => $ldays,
                'leave_reason' => $this->data['employee_leave_data']->leave_reason,
                'leave_status' => $this->data['employee_leave_data']->leave_status,
                'lm_modified_by' => $this->data['employee_leave_data']->lm_modified_by,
                'lm_modified_date' => $mdate,
                'update_employee_leave_id_hidden' => $this->data['employee_leave_data']->leave_id
            ));

            echo $json_return_data;
        }
    }

    public function leave_update_employee_data() {
        if (!$this->input->is_ajax_request()) {
            exit('No direct script access allowed');
        } else {

            $emp_leave_status = $this->input->post('status');
            $uname = $this->session->userdata('username');

            $emp_leave_id_hidden = $this->input->post('update_employee_leave_id');
            

            $param = array(
                'leave_status' => $emp_leave_status,
                'lm_modified_by' => $uname,
                'lm_modified_date' => date("Y-m-d H:i:s")
            );


            $this->leave_model->leave_update_employee($emp_leave_id_hidden, $param);

            $param1 = array(
                'leave_id' => $emp_leave_id_hidden,
                'leave_status' => $emp_leave_status
            );


            $return = array(
                'status' => "true",
                'response' => "<div class='alert alert-success'>Sucessfully done..!</div>",
                'leave_data' => $param1
            );

            echo json_encode($return);
        }
    }

}

?>