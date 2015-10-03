<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    function __construct() {
        parent::__construct();
    }

    public function index() {


        $this->data['title'] = "Dashboard";
        $this->data['page_title'] = "Dashboard";
        $this->data['active_tab'] = "dashboard";
        $this->data['page_content'] = "dashboard/index";

        //page level css
        $this->template->add_css('plugins/bootstrap-daterangepicker/daterangepicker-bs3.css');
        $this->template->add_css('plugins/fullcalendar/fullcalendar/fullcalendar.css');
        $this->template->add_css('plugins/jqvmap/jqvmap/jqvmap.css');

        //page level plugin
        $this->template->add_js('plugins/jqvmap/jqvmap/jquery.vmap.js');
        $this->template->add_js('plugins/jqvmap/jqvmap/maps/jquery.vmap.russia.js');
        $this->template->add_js('plugins/jqvmap/jqvmap/maps/jquery.vmap.world.js');
        $this->template->add_js('plugins/jqvmap/jqvmap/maps/jquery.vmap.europe.js');
        $this->template->add_js('plugins/jqvmap/jqvmap/maps/jquery.vmap.germany.js');
        $this->template->add_js('plugins/jqvmap/jqvmap/maps/jquery.vmap.usa.js');
        $this->template->add_js('plugins/jqvmap/jqvmap/data/jquery.vmap.sampledata.js');
        $this->template->add_js('plugins/jquery.peity.min.js');
        $this->template->add_js('plugins/jquery.pulsate.min.js');
        $this->template->add_js('plugins/jquery-knob/js/jquery.knob.js');
        $this->template->add_js('plugins/flot/jquery.flot.js');
        $this->template->add_js('plugins/flot/jquery.flot.resize.js');
        $this->template->add_js('plugins/bootstrap-daterangepicker/moment.min.js');
        $this->template->add_js('plugins/bootstrap-daterangepicker/daterangepicker.js');
        $this->template->add_js('plugins/gritter/js/jquery.gritter.js');

        //IMPORTANT! fullcalendar depends on jquery-ui-1.10.3.custom.min.js for drag & drop support 
        $this->template->add_js('plugins/fullcalendar/fullcalendar/fullcalendar.min.js');
        $this->template->add_js('plugins/jquery-easypiechart/jquery.easypiechart.min.js');
        $this->template->add_js('plugins/jquery.sparkline.min.js');

        // page level script
        $this->template->add_js('scripts/app.js');
        $this->template->add_js('scripts/index.js');
        $this->template->add_js('scripts/tasks.js');

        $this->data['js'] = $this->template->js;
        $this->data['css'] = $this->template->css;

        $this->load->view('template', $this->data);
    }

    

}
