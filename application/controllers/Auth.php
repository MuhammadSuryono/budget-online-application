<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends MY_Controller
{
    private $mainPage = 'auth/wrapper';
    public function __construct()
    {
        parent::__construct();
        if ($this->input->method() != 'post'){
            $this->print_pretty($this->session->userdata());
        }
        if ($this->isLogin()) redirect("/dashboard");
        $this->js[] = base_url() . 'assets/js/pages/login.js';
    }

    public function login()
    {
        $this->parseData['content'] = 'auth/login';
        $this->parseData['javascript'] = $this->js;
        $this->parseData['css'] = $this->css;

        $this->load->view($this->mainPage, $this->parseData);
    }

    public function postLogin()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        
        $body = [
            'username' => $username,
            'password' => $password,
        ];

        $req = $this->http_request_post("auth/login", $body);
        $statusLogin = false;
        
        if ($req->status) {
            $statusLogin = true;
            $userData = [
                'userIsLogin' => true,
                'userData' => $req->data,
            ];
            $this->session->set_userdata($userData);
        }

        echo json_encode(["status" => $statusLogin, "message" => $req->message ,"data" => $req->data]);
    }

    public function authLogout()
    {
        $this->session->sess_destroy();
        redirect(base_url('/login'));
    }
}
