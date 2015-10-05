<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

    
    function __construct() {

        parent::__construct();
        $this->load->model('user', '', TRUE);
    }

    public function index() {



        //page level css
        $this->template->add_css('plugins/datatables/plugins/bootstrap/dataTables.bootstrap.css');

        //page level plugin
        $this->template->add_js('plugins/datatables/media/js/jquery.dataTables.min.js');
        $this->template->add_js('plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js');

        // page level script
        $this->template->add_js('scripts/app.js');

        $this->data['js'] = $this->template->js;
        $this->data['css'] = $this->template->css;

        $this->data['title'] = "Login";
        $this->data['page_title'] = "Login";
        $this->data['active_tab'] = "Login";
        $this->data['page_content'] = "auth/login";

        //This method will have the credentials validation

        $this->form_validation->set_rules('username', 'Username', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');

        if ($this->form_validation->run() == FALSE) {
            //Field validation failed.  User redirected to login page
            $this->load->view('auth/login', $this->data);
        } else {

            //Field validation succeeded.  Validate against database
            $username = $this->input->post('username');
            $password = $this->input->post('password');

            //query the database
            $result = $this->user->login($username, $password);

            if ($result) {

                $sess_array = array();
                foreach ($result as $row) {
                    $this->session->set_userdata('id', $row->login_id);
                    $this->session->set_userdata('username', $row->company_email_id);
                }
                //Go to private area
                redirect(base_url('dashboard'), 'refresh');
            } else {
                $this->session->set_flashdata('error', 'Invalid username or password');
                $this->load->view('auth/login', $this->data);
            }
        }

        //$this->load->view('auth/login', $this->data);
    }
	function logout() {
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('id');
        $this->session->set_flashdata('success', 'Successfully Logout Your System');
        redirect(base_url('auth'));
    }

}
