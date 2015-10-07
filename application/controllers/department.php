<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Department extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('department_model');
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

        //page level plugin
        $this->template->add_js('plugins/select2/select2.min.js');
        $this->template->add_js('plugins/datatables/media/js/jquery.dataTables.min.js');
        $this->template->add_js('plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js');

        // page level script
        $this->template->add_js('scripts/app.js');
        $this->template->add_js('scripts/department/department.js');
        //$this->template->add_js('scripts/department/department_list.js');


        $this->data['js'] = $this->template->js;
        $this->data['css'] = $this->template->css;

        $this->data['title'] = "department";
        $this->data['page_title'] = "Add department";
        $this->data['active_tab'] = "add-department";
        $this->data['page_content'] = "department/department";

        $this->data['department'] = $this->department_model->get_department_list();
        //$this->data['query'] = $this->emp_model->employee_getall();
        $this->load->view('template', $this->data);
    }

    public function add_department() {
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
            $this->template->add_js('scripts/department/department.js');

            $this->data['js'] = $this->template->js;
            $this->data['css'] = $this->template->css;


            $this->data['title'] = "department";
            $this->data['page_title'] = "Add department";
            $this->data['active_tab'] = "add-department";
            $this->data['page_content'] = "department/department";


//        exit('No direct script access allowed');
        } else {
            $this->form_validation->set_rules('department_name', 'department_name', 'trim|required');

            if ($this->form_validation->run() == FALSE) {
                //Field validation failed.  User redirected to login page
                $return = array(
                    'status' => "false",
                    'response' => "<div class='alert alert-danger'>" . validation_errors() . "</div>"
                );
            } else {

                $department_name = $this->input->post('department_name');

                $param = array(
                    'department_name' => $department_name,
                    'modified_date' => date("Y-m-d H:i:s"),
                );
                //Transfering data to Model
                if ($this->department_model->department_insert($param)) {
                    $return = array(
                        'status' => "true",
                        'response' => "<div class='alert alert-success'>Sucessfully done..!</div>",
                        'department_data' => $param
                            // 'department_name' => $this->form_validation->name_error
                    );
                }
            }
            echo json_encode($return);
        }
        //redirect(base_url('employee_master'));
    }

    public function department_data($id) {

        //page level css
        $this->template->add_css('plugins/select2/select2.css');
        $this->template->add_css('plugins/datatables/plugins/bootstrap/dataTables.bootstrap.css');

        //page level plugin
        $this->template->add_js('plugins/select2/select2.min.js');
        $this->template->add_js('plugins/datatables/media/js/jquery.dataTables.min.js');
        $this->template->add_js('plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js');

        // page level script
        $this->template->add_js('scripts/app.js');
        $this->template->add_js('scripts/department/department.js');
        $this->template->add_js('scripts/department/department_list.js');


        $this->data['js'] = $this->template->js;
        $this->data['css'] = $this->template->css;

        $this->data['title'] = "department";
        $this->data['page_title'] = "Add department";
        $this->data['active_tab'] = "add-department";
        $this->data['page_content'] = "department/department_update";

        // $this->data['department'] = $this->department_model->get_department_list();
        //$this->data['query'] = $this->emp_model->employee_getall();
       // $this->load->view('template', $this->data);
        $this->data['department_id'] = $id;
        $this->data['record_edit'] = $this->department_model->update_department($id);

        $this->form_validation->set_rules('department_name', 'department_name', 'trim|required');



        if ($this->form_validation->run() == FALSE) {
            //Field validation failed.  User redirected to login page
             $this->load->view('template', $this->data);
        } else {
            $department_name = $this->input->post('department_name');


            $result = $this->department_model->f_update_department($id, $department_name);
            redirect(base_url('department/index'));


           
        }
    }

}

//$this->load->view('template', $this->data);
?>