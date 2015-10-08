<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Designation extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('designation_model');
    }

    /**
     * Ingredient   
     *
     * This model represents Department  data. It operates the following tables:
     * - Ingredient 
     *
     * @author	Abhay Suchak
     */
    public function index() {

        //page level css
        $this->template->add_css('plugins/select2/select2.css');
        $this->template->add_css('plugins/datatables/plugins/bootstrap/dataTables.bootstrap.css');
        $this->template->add_css('plugins/bootstrap-modal/css/bootstrap-modal-bs3patch.css');
//        $this->template->add_css('plugins/bootstrap-modal/css/bootstrap-modal.css');
        //page level plugin
        $this->template->add_js('plugins/select2/select2.min.js');
        $this->template->add_js('plugins/bootstrap-datepicker/js/bootstrap-datepicker.js');
        $this->template->add_js('plugins/datatables/media/js/jquery.dataTables.min.js');
        $this->template->add_js('plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js');
        $this->template->add_js('plugins/bootstrap-modal/js/bootstrap-modalmanager.js');
        $this->template->add_js('plugins/bootstrap-modal/js/bootstrap-modal.js');

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
        $this->template->add_js('scripts/designation/designation.js');

        $this->data['js'] = $this->template->js;
        $this->data['css'] = $this->template->css;


        $this->data['title'] = "descigntion";
        $this->data['page_title'] = "Add Designtion";
        $this->data['active_tab'] = "add-designtion";
        $this->data['page_content'] = "designation/designation_list";

        $this->data['department_record'] = $this->designation_model->getPosts(); // calling insert model method getPosts()
        //$this->load->view('leave/table', $this->data);
        $this->data['designation'] = $this->designation_model->get_designtion_list();

        $this->load->view('template', $this->data);
    }

    public function add_designation() {
        if (!$this->input->is_ajax_request()) {
            exit('No direct script access allowed');
        } else {
            $this->form_validation->set_rules('department_name', 'department_name', 'trim|required');
            $this->form_validation->set_rules('designation', 'designation', 'trim|required');

            if ($this->form_validation->run() == FALSE) {
                //Field validation failed.  User redirected to login page
                $return = array(
                    'status' => "false",
                    'response' => "<div class='alert alert-danger'>" . validation_errors() . "</div>",
                );
            } else {

                $department_name = $this->input->post('department_name');
                $designation = $this->input->post('designation');
                $param = array(
                    'department_id' => $department_name,
                    'designation_name' => $designation,
                    'modified_date' => date("Y-m-d H:i:s"),
                    'status' => 'Active',
                );
                $desig_id = $this->designation_model->insert_designation($param);
                $this->data['department_name'] = $this->designation_model->get_department_name($department_name);

                $param1 = array(
                    'department_id' => $this->data['department_name'],
                    'designation_id' => '<a class="btn btn-primary btn-sm update-designation" data-designation_id="' . $desig_id . '" data-toggle="modal" data-target="#myModal">edit</a>',
                    'designation_name' => $designation,
                    'status' => '<span class="label label-sm label-success status" data-status="active" data-designation_id="' . $desig_id . '" style="cursor: pointer;">active </span>',
                );
                //Transfering data to Model
                if ($desig_id != "") {
                    $return = array(
                        'status' => "true",
                        'response' => "<div class='alert alert-success'> Success Fully Inserted...!!</div>",
                        'designation_data' => $param1
                    );
                }
            }
            echo json_encode($return);
        }
        //redirect(base_url('employee_master'));
    }

    public function designation_update() {

        $this->form_validation->set_rules('update_department_name', 'department_name', 'trim|required');
        $this->form_validation->set_rules('update_designation_name', 'designation', 'trim|required');

        if ($this->form_validation->run() == FALSE) {
            //Field validation failed.  User redirected to login page
            $return = array(
                'status' => "false",
                'response_update' => "<div class='alert alert-danger'>" . validation_errors() . "</div>",
            );
        } else {
            $return = array(
                'status' => "true",
                'response_update' => "<div class='alert alert-success'> Success Fully Updated...!!</div>",
            );
            $department_name = $this->input->post('update_department_name');
            $designation = $this->input->post('update_designation_name');
            $d_id_hidden = $this->input->post('update_designation_id_hidden');

            $param = array(
                'department_id' => $department_name,
                'designation_name' => $designation,
                'modified_date' => date("Y-m-d H:i:s"),
            );

            $this->designation_model->designation_update($d_id_hidden, $param);
        }
        echo json_encode($return);
    }

    // Change Status  


    public function change_status() {
        $designation_id = $this->input->post("designation_id");
        $status = $this->input->post("status");
        $status = ($status == "active") ? "deactive" : "active";
        $data = array(
            "status" => $status
        );
        $this->designation_model->change_status_model($designation_id, $data);
        echo $status;
    }

    public function update_designation_form_ajax() {

        $this->load->view('designation/update_designation_form_ajax');
    }

    public function designation_data() {
        $designation_id = $this->input->post("designation_id");

        $this->data['designation_data'] = $this->designation_model->get_designation_by_id($designation_id);

        $this->data['department_name'] = $this->designation_model->get_department_name($this->data['designation_data']->department_id);

        $json_department_data = array(
            'id' => $this->data['designation_data']->department_id,
            'text' => $this->data['department_name']
        );

        $json_return_data = json_encode(array(
            'department_name' => $json_department_data,
            'dname' => $this->data['designation_data']->designation_name,
            'update_designation_id_hidden' => $this->data['designation_data']->designation_id,
        ));

        echo $json_return_data;
    }

}

?>