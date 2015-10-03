<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Template {

    var $CI;
    var $config;
    var $template;
    var $master;
    var $regions = array(
        '_scripts' => array(),
        '_styles' => array(),
    );
    var $output;
    var $js = '';
    var $css = '';
    var $parser = 'parser';
    var $parser_method = 'parse';
    var $parse_template = FALSE;

    /**
     * Constructor
     *
     * Loads template configuration, template regions, and validates existence of 
     * default template
     *
     * @access	public
     */
    function Template() {
        $this->CI = & get_instance();
    }

    function add_js($script, $type = 'import', $defer = FALSE) {
        $success = TRUE;
        $js = NULL;

        $this->CI->load->helper('url');

        switch ($type) {
            case 'import':
                $filepath = base_url('assets') . '/' . $script;
                $js = '<script type="text/javascript" src="' . $filepath . '"';
                if ($defer) {
                    $js .= ' defer="defer"';
                }
                $js .= "></script>";
                break;

            case 'embed':
                $js = '<script type="text/javascript"';
                if ($defer) {
                    $js .= ' defer="defer"';
                }
                $js .= ">";
                $js .= $script;
                $js .= '</script>';
                break;

            default:
                $success = FALSE;
                break;
        }


        $this->js.=$js;
        return $success;
    }

    // --------------------------------------------------------------------

    /**
     * Dynamically include CSS in the template
     * 
     * NOTE: This function does NOT check for existence of .css file
     *
     * @access  public
     * @param   string   CSS file to link, import or embed
     * @param   string  'link', 'import' or 'embed'
     * @param   string  media attribute to use with 'link' type only, FALSE for none
     * @return  TRUE on success, FALSE otherwise
     */
    function add_css($style, $type = 'link', $media = FALSE) {
        $success = TRUE;
        $css = NULL;

        $this->CI->load->helper('url');
        $filepath = base_url('assets') . '/' . $style;

        switch ($type) {
            case 'link':

                $css = '<link type="text/css" rel="stylesheet" href="' . $filepath . '"';
                if ($media) {
                    $css .= ' media="' . $media . '"';
                }
                $css .= ' />';
                break;

            case 'import':
                $css = '<style type="text/css">@import url(' . $filepath . ');</style>';
                break;

            case 'embed':
                $css = '<style type="text/css">';
                $css .= $style;
                $css .= '</style>';
                break;

            default:
                $success = FALSE;
                break;
        }
        $this->css.=$css;
        return $success;
    }

}
