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
                    'status' => 'Active'
                );
                //Transfering data to Model
                $dept_id = $this->department_model->department_insert($param);
                
                
                $param1 = array(
                    //'department_id' => $this->data['department_name'],
                    'department_id' => '<a class="btn btn-primary btn-sm update-department" data-department_id="' . $dept_id . '" data-toggle="modal" data-target="#myModal">edit</a>',
                    'department_name' => $department_name,
                    'status' => '<span class="label label-sm label-success status" data-status="active" data-department_id="' . $dept_id . '" style="cursor: pointer;">active </span>',
                );
                
                if ($dept_id!="") {
                    $return = array(
                        'status' => "true",
                        'response' => "<div class='alert alert-success'>Sucessfully done..!</div>",
                        'department_data' => $param1
                            // 'department_name' => $this->form_validation->name_error
                    );
                }
            }
            echo json_encode($return);
        }
        //redirect(base_url('employee_master'));
    }

    public function change_status() {
        $department_id = $this->input->post("department_id");
        $status = $this->input->post("status");
        $status = ($status == "active") ? "deactive" : "active";
        $data = array(
            "status" => $status
        );
        $this->department_model->change_status_model($department_id, $data);
        echo $status;
    }

       public function department_update() {

              $this->form_validation->set_rules('update_department_name', 'department_name', 'trim|required');
           // $this->form_validation->set_rules('update_designation_name', 'designation', 'trim|required');

            if ($this->form_validation->run() == FALSE) {
                //Field validation failed.  User redirected to login page
                $return = array(
                    'status' => "false",
                    'response_update' => "<div class='alert alert-danger'>" . validation_errors() . "</div>",
                );
            } else {
                 $return = array(
                    'status' => "true",
                    'response_update' =>"<div class='alert alert-success'> Success Fully Updated...!!</div>",
                );
        $department_name = $this->input->post('update_department_name');
       // $designation = $this->input->post('update_designation_name');
        $d_id_hidden = $this->input->post('update_department_id_hidden');
        
        $param = array(
            'department_name' => $department_name,
            //'designation_name' => $designation,
            'modified_date' => date("Y-m-d H:i:s"),
        );

        $this->department_model->department_update($d_id_hidden, $param);
        
        
            }
             echo json_encode($return);
    }
    
    
      public function department_data() {
        $department_id = $this->input->post("department_id");

        $this->data['department_data'] = $this->department_model->get_department_by_id($department_id);
      // echo $this->data['department_data'];
     //  exit();
        //$this->data['department_name'] = $this->department_model->get_department_name($this->data['department_data']->department_id);

        $json_department_data = array(
            'id' => $this->data['department_data']->department_id,
            'text' => $this->data['department_data']
        );

        $json_return_data = json_encode(array(
            'department_name' => $json_department_data,
            'dname' => $this->data['department_data']->department_name,
            'update_department_id_hidden' => $this->data['department_data']->department_id,
        ));

        echo $json_return_data;
    }
    
}
?>