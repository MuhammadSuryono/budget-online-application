<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends MY_Controller 
{
    private $mainPage = 'admin/index';
    public function __construct()
    {
        parent::__construct();
        $this->parseData['isLogin'] = $this->isLogin();
        $this->parseData['navbar'] = 'parts/admin/header';
        $this->parseData['sidebar'] = 'parts/admin/sidebar';
    }

    public function index()
    {
        $this->js[] = "https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/js/bootstrap-select.min.js";
        $this->js[] = base_url('assets/js/pages/dashboard.js');
        $this->css[] = "https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/css/bootstrap-select.min.css";

        $this->parseData['content'] = 'admin/dashboard/index';
        $this->parseData['javascript'] = $this->js;
        $this->parseData['css'] = $this->css;
        $this->parseData['title_budge'] = 'Dashboard';
        
        $this->load->view($this->mainPage, $this->parseData);
    }
}