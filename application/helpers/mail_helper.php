<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');



if (!function_exists('forward_mail')) {

    function forward_mail($email_to, $email_from, $message, $subject = '', $attachment = '', $from_name = '') {
        $CI = get_instance();

        $CI->load->library('email');

        $config['mailtype'] = 'html';
        
        $CI->email->initialize($config);

        $CI->email->from($email_from, $from_name);

        $CI->email->reply_to($email_from, $from_name);

        $CI->email->to($email_to);

        $CI->email->subject($subject);

        $CI->email->message($message);

        if (!$CI->email->send()) {
            return FALSE;
        }

        return TRUE;
    }

}


/* End of file security_helper.php */
/* Location: ./application/helpers/security_helper.php */