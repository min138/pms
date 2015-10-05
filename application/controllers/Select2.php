<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

defined('BASEPATH') OR exit('No direct script access allowed');

class Select2 extends CI_Controller {

    function __construct() {
        parent::__construct();
        
    }

    public function index() {

        //page level css
        $this->template->add_css('plugins/select2/select2.css');
        $this->template->add_css('plugins/datatables/extensions/Scroller/css/dataTables.scroller.min.css');
        $this->template->add_css('plugins/datatables/extensions/ColReorder/css/dataTables.colReorder.min.css');
        $this->template->add_css('plugins/datatables/plugins/bootstrap/dataTables.bootstrap.css');

        //page level plugin
        $this->template->add_js('plugins/select2/select2.min.js');
        $this->template->add_js('plugins/datatables/media/js/jquery.dataTables.min.js');
        $this->template->add_js('plugins/datatables/extensions/TableTools/js/dataTables.tableTools.min.js');
        $this->template->add_js('plugins/datatables/extensions/ColReorder/js/dataTables.colReorder.min.js');
        $this->template->add_js('plugins/datatables/extensions/Scroller/js/dataTables.scroller.min.js');
        $this->template->add_js('plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js');



        //IMPORTANT! Load jquery-ui-1.10.3.custom.min.js before bootstrap.min.js to fix bootstrap tooltip conflict with jquery ui tooltip 
        $this->template->add_js('plugins/jquery-ui/jquery-ui-1.10.3.custom.min.js');
        $this->template->add_js('plugins/bootstrap/js/bootstrap.min.js');
        $this->template->add_js('plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js');
        $this->template->add_js('plugins/jquery-slimscroll/jquery.slimscroll.min.js');
        $this->template->add_js('plugins/jquery.blockui.min.js');
        $this->template->add_js('plugins/uniform/jquery.uniform.min.js');


        // page level script
        $this->template->add_js('scripts/app.js');
        $this->template->add_js('scripts/table-advanced.js');
        $this->template->add_js('scripts/employee/table_list.js');

        $this->data['js'] = $this->template->js;
        $this->data['css'] = $this->template->css;


        $this->data['title'] = "Employee List";
        $this->data['page_title'] = "Employee List";
        $this->data['active_tab'] = "employee";
        $this->data['page_content'] = "employee/index";

        $this->data['query'] = $this->employee_model->employee_getall();


        $this->load->view('template', $this->data);
    }

    

}

