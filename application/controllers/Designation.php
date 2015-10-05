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


            //page level plugin
            $this->template->add_js('plugins/select2/select2.min.js');
            $this->template->add_js('plugins/bootstrap-datepicker/js/bootstrap-datepicker.js');
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


        $this->load->view('template', $this->data);
    }

   public function add_designation() {
        if (!$this->input->is_ajax_request()) {

            //page level css
            $this->template->add_css('plugins/select2/select2.css');
            $this->template->add_css('plugins/bootstrap-datepicker/css/datepicker.css');


            //page level plugin
            $this->template->add_js('plugins/select2/select2.min.js');
            $this->template->add_js('plugins/bootstrap-datepicker/js/bootstrap-datepicker.js');
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

 
//        exit('No direct script access allowed');
        } else {
            $this->form_validation->set_rules('department_name', 'department_name', 'trim|required');
            $this->form_validation->set_rules('designation', 'designation', 'trim|required');

            if ($this->form_validation->run() == FALSE) {
                //Field validation failed.  User redirected to login page
                $return = array(
                    'status' => FALSE,
                    'response' => validation_errors()
                );
            } else {
                $return = array(
                    'status' => TRUE,
                    'response' => "Done"
                );
                 $department_name = $this->input->post('department_name');
                 $designation = $this->input->post('designation');
                $param = array(
                'department_id' => $department_name,
                'designation_name' => $designation,
                'modified_date' => date("Y-m-d H:i:s"),
                );
        //Transfering data to Model
       $this->designation_model->insert_designation($param);
            }
            echo json_encode($return);
        }
        //redirect(base_url('employee_master'));
    }
    
    
    


}


?>