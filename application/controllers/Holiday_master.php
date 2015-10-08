<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Holiday_master extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('holiday_model');
    }

    /**
     * Ingredient   
     *
     * This model represents Department  data. It operates the following tables:
     * - Ingredient 
     *
     * @author hetvi patel
     */
    public function index() {
        //add holiday
        //page level css
        $this->template->add_css('plugins/bootstrap-datepicker/css/datepicker.css');
        $this->template->add_css('plugins/bootstrap-daterangepicker/daterangepicker-bs3.css');

        //page level plugin
        $this->template->add_js('plugins/bootstrap-datepicker/js/bootstrap-datepicker.js');
        $this->template->add_js('plugins/bootstrap-modal/js/bootstrap-modalmanager.js');
        $this->template->add_js('plugins/bootstrap-daterangepicker/daterangepicker.js');

        // page level script
        $this->template->add_js('scripts/app.js');
        //$this->template->add_js('scripts/form-samples.js');
        $this->template->add_js('scripts/form-components.js');
        // $this->template->add_js('scripts/designation/designation.js');
        $this->template->add_js('scripts/holiday/holiday.js');

        $this->data['js'] = $this->template->js;
        $this->data['css'] = $this->template->css;


        $this->data['title'] = "Holiday";
        $this->data['page_title'] = "Add Holiday";
        $this->data['active_tab'] = "add-Holiday";
        $this->data['page_content'] = "holiday/holiday_insert_from";


        $this->form_validation->set_rules('holiday_name', 'holiday_name', 'trim|required');
        $this->form_validation->set_rules('holiday_description', 'holiday_description', 'trim|required');



        $this->form_validation->set_rules('date_from', 'date_from', 'trim|required');

        $this->form_validation->set_rules('date_from', 'date_from', 'trim|required');
        $this->form_validation->set_rules('date_to', 'date_to', 'trim|required');
        // $this->form_validation->set_rules('holiday_time', 'holiday_time', 'trim|required');

        if ($this->form_validation->run() == FALSE) {
            //Field validation failed.  User redirected to login page
            $this->load->view('template', $this->data);
        } else {

            //Field validation succeeded.  Validate against database
            $holiday_name = $this->input->post('holiday_name');
            $holiday_description = $this->input->post('holiday_description');
            // $date_from = date('Y-m-d', strtotime($this->input->post('date_from')));
            // $date_to = date('Y-m-d', strtotime($this->input->post('date_to')));
            // $modified_date => date('Y-m-d H:i:s',strtotime($this->input->post('modified_date')));
            $type = $this->input->post("singleholiday");

            if ($type == 0) {
                $date_from = date('Y-m-d', strtotime($this->input->post('date_from')));
                $date_to = "";
            } else {

                $date_from = date('Y-m-d', strtotime($this->input->post('date_from')));
                $date_to = date('Y-m-d', endtotime($this->input->post('date_to')));
            }



            $this->holiday_model->form_insert_holiday($holiday_name, $holiday_description, $date_from, $date_to);
            $data['message'] = 'Data Inserted Successfully';
            redirect('holiday_master/view_holiday', 'refresh');
        }
        //$this->load->view('template', $this->data);
    }

    //dispaly holiday
    public function view_holiday() {

        //page level css
        $this->template->add_css('plugins/select2/select2.css');
        $this->template->add_css('plugins/datatables/plugins/bootstrap/dataTables.bootstrap.css');


        //page level plugin
        $this->template->add_js('plugins/select2/select2.min.js');
        $this->template->add_js('plugins/datatables/media/js/jquery.dataTables.min.js');
        $this->template->add_js('plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js');


        // page level script
        $this->template->add_js('scripts/app.js');

        //$this->template->add_js('scripts/department/department_list.js'); 
        $this->template->add_js('scripts/holiday/holiday.js');



        $this->data['js'] = $this->template->js;
        $this->data['css'] = $this->template->css;

        $this->data['title'] = "Holiday";
        $this->data['page_title'] = "Add Holiday";
        $this->data['active_tab'] = "add-Holiday";
        $this->data['page_content'] = "holiday/holidaytable";



        $this->data['posts'] = $this->holiday_model->getPosts(); // calling insert model method getPosts()
        //$this->load->view('leave/table', $this->data);


        $this->load->view('template', $this->data);
    }

//status
    public function change_status() {
        $holiday_id = $this->input->post("holiday_id");
        $status = $this->input->post("status");
        $status = ($status == "active") ? "deactive" : "active";
        $data = array(
            "status" => $status
        );
        $this->holiday_model->change_status_model($holiday_id, $data);
        echo $status;
    }

    // update holiday
    public function update_holiday($id) {

        // page level script
        // end java script 

        $this->data['title'] = "Holiday";
        $this->data['page_title'] = "holiday";
        $this->data['active_tab'] = "holiday";
        $this->data['page_content'] = "holiday/holiday_update_from";
        $this->data['holiday_id'] = $id;
        $this->data['record_edit'] = $this->holiday_model->update_holiday($id);

        $this->form_validation->set_rules('subject', 'subject', 'trim|required');
        $this->form_validation->set_rules('reson', 'reson', 'trim|required');
        $this->form_validation->set_rules('date', 'date', 'trim|required');



        if ($this->form_validation->run() == FALSE) {
            //Field validation failed.  User redirected to login page

            $this->load->view('template', $this->data);
        } else {
            $this->form_validation->set_rules('holiday_name', 'holiday_name', 'trim|required');
            $this->form_validation->set_rules('holiday_description', 'holiday_description', 'trim|required');

            $this->form_validation->set_rules('date_from', 'date_from', 'trim|required');

            $this->form_validation->set_rules('date_from', 'date_from', 'trim|required');
            $this->form_validation->set_rules('date_to', 'date_to', 'trim|required');

            $result = $this->holiday_model->f_update_holiday($id, $holiday_name, $holiday_description, $date_from, $date_to);


            if ($result) {
                $this->session->set_flashdata('set_success', 'SuccessFully Updated');
                //$this->load->view('template', $this->data);
                redirect(base_url('holiday_master/view_holiday'));
            } else {
                $this->session->set_flashdata('set_success', 'Soorryy');
                //$this->load->view('template', $this->data);
                redirect(base_url('holiday_master/view_holiday'));
            }
        }
    }

}

?>