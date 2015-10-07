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
        $this->template->add_css('plugins/bootstrap-datepicker/css/datepicker.css');
        $this->template->add_css('plugins/datatables/plugins/bootstrap/dataTables.bootstrap.css');
        $this->template->add_css('plugins/bootstrap-modal/css/bootstrap-modal-bs3patch.css');
        $this->template->add_css('plugins/bootstrap-modal/css/bootstrap-modal.css');


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
        $this->data['active_tab'] = "add-Designtion";
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
                //Transfering data to Model
                if ($this->designation_model->insert_designation($param)) {
                    $return = array(
                        'status' => "true",
                        'response' => "<div class='alert alert-success'> Success Fully Inserted...!!</div>",
                        'designation_data' => $param
                    );
                }
            }
            echo json_encode($return);
        }
        //redirect(base_url('employee_master'));
    }

    public function designation_update($id) {

        //page level css
        $this->template->add_css('plugins/select2/select2.css');
        $this->template->add_css('plugins/bootstrap-datepicker/css/datepicker.css');
        $this->template->add_css('plugins/datatables/plugins/bootstrap/dataTables.bootstrap.css');


        //page level plugin
        $this->template->add_js('plugins/select2/select2.min.js');
        $this->template->add_js('plugins/bootstrap-datepicker/js/bootstrap-datepicker.js');
        $this->template->add_js('plugins/datatables/media/js/jquery.dataTables.min.js');
        $this->template->add_js('plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js');


<<<<<<< Updated upstream
        //$this->template->add_js('scripts/designation.js');
        //IMPORTANT! Load jquery-ui-1.10.3.custom.min.js before bootstrap.min.js to fix bootstrap tooltip conflict with jquery ui tooltip 
        $this->template->add_js('plugins/jquery-ui/jquery-ui-1.10.3.custom.min.js');
        $this->template->add_js('plugins/bootstrap/js/bootstrap.min.js');
        $this->template->add_js('plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js');
        $this->template->add_js('plugins/jquery-slimscroll/jquery.slimscroll.min.js');
        $this->template->add_js('plugins/jquery.blockui.min.js');
        $this->template->add_js('plugins/uniform/jquery.uniform.min.js');

=======
 $this->data['employees'] = $this->employee_model->get_employee_list();
        $this->load->view('template', $this->data);
    }
>>>>>>> Stashed changes

        // page level script
        $this->template->add_js('scripts/app.js');
        //$this->template->add_js('scripts/form-samples.js');
        $this->template->add_js('scripts/form-components.js');
        $this->template->add_js('scripts/designation/designation.js');

        $this->data['department_id'] = $this->designation_model->get_department_id_by_designation($id);
        $this->data['department_name'] = $this->designation_model->get_department_name($this->data['department_id']);

        $json_department_data = json_encode(array(
            'id' => $this->data['department_id'],
            'text' => $this->data['department_name']
        ));

        $script = "$(document).ready(function (){"
                . "$('#department_name').select2('data', $json_department_data);"
                . "});";

        $this->template->add_js($script, "embed");

        $this->data['title'] = "descigntion";
        $this->data['page_title'] = "Add Designtion";
        $this->data['active_tab'] = "add-Designtion";
        $this->data['page_content'] = "designation/designation_update";

        $this->data['designation_id'] = $id;
        $this->data['record_edit'] = $this->designation_model->designation_edit($id);

        $this->data['js'] = $this->template->js;
        $this->data['css'] = $this->template->css;

        $this->form_validation->set_rules('department_name', 'department_name', 'trim|required');
        $this->form_validation->set_rules('designation', 'designation', 'trim|required');

        if ($this->form_validation->run() == FALSE) {
            //Field validation failed.  User redirected to login page
            //$this->load->view('template', $this->data);
        } else {

            $department_name = $this->input->post('department_name');
            $designation = $this->input->post('designation');
            $param = array(
                'department_id' => $department_name,
                'designation_name' => $designation,
                'modified_date' => date("Y-m-d H:i:s"),
            );
            //Transfering data to Model
            $this->designation_model->designation_update($id, $param);
            redirect(base_url('designation'));
        }


        //$this->data['department_record'] = $this->designation_model->getPosts(); // calling insert model method getPosts()
        //$this->load->view('leave/table', $this->data);
        //$this->data['designation'] = $this->designation_model->get_designtion_list();

        $this->load->view('template', $this->data);
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

        $this->data['designation_name'] = $this->designation_model->get_designation_by_id($designation_id);
        $this->data['department_id'] = $this->designation_model->get_department_id_by_designation($designation_id);
        $this->data['department_name'] = $this->designation_model->get_department_name($this->data['department_id']);

        $json_department_data = json_encode(array(
            'department_name' => $this->data['department_name'],
            'designation_name' => $this->data['designation_name']
        ));
        echo $json_department_data;
    }

}

?>