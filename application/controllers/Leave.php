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

    public function add_leave() {
        if (!$this->input->is_ajax_request()) {
            //page level css
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


//        exit('No direct script access allowed');
        } else {
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

    public function leave_data() {
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

?>