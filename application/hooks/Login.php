<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Login {

    private $CI;

    public function try_login() {
        $this->CI = &get_instance();
        $this->CI->load->library('session');
        $username = $this->CI->session->userdata('username');
        $class_name = $this->CI->router->fetch_class();
        $method_name = $this->CI->router->fetch_method();

        if (empty($username) && $class_name != "auth") {
            redirect(base_url("auth"));
        } else if ($class_name == "auth" && !empty($username) && $method_name != "logout") {
            redirect(base_url("dashboard"));
        }
    }

}
