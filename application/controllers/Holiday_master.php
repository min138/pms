<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Holiday_master extends CI_Controller {

    function __construct() {
        parent::__construct();
      //  $this->load->model('designation_model');
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
       // $this->template->add_js('scripts/designation/designation.js');

        $this->data['js'] = $this->template->js;
        $this->data['css'] = $this->template->css;


        $this->data['title'] = "Holiday";
        $this->data['page_title'] = "Add Holiday";
        $this->data['active_tab'] = "add-Holiday";
        $this->data['page_content'] = "holiday/holiday_insert_from";

        //$this->data['department_record'] = $this->designation_model->getPosts(); // calling insert model method getPosts()
        //$this->load->view('leave/table', $this->data);
       // $this->data['designation'] = $this->designation_model->get_designtion_list();

        $this->load->view('template', $this->data);
    }

}

?>