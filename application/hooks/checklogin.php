<?php
defined('BASEPATH') or exit('No direct script access allowed');

class CheckLogin
{
    protected $CI;

    public function __construct()
    {
        $this->CI = &get_instance();
    }

    public function login_check()
    {
        if($this->CI->router->class != 'Auth' && !$this->CI->session->userIsLogin && $this->CI->router->directory == 'admin/')
        {
            redirect(base_url('/login'));
        }

        if (!$this->CI->session->userIsStartSession && $this->CI->router->directory == 'user/' && $this->CI->uri->uri_string != 'exam/session')
        {
            if ($this->CI->uri->uri_string != 'exam/session/check') {
                redirect(base_url('/exam/session'));
            }
        }
    }
}
