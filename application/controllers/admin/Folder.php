<?php

class Folder extends MY_Controller
{
    private $mainPage = 'admin/index';
    public function __construct()
    {
        parent::__construct();
        $this->parseData['isLogin'] = $this->isLogin();
        $this->parseData['navbar'] = 'parts/admin/header';
        $this->parseData['sidebar'] = 'parts/admin/sidebar';
    }

    public function list_folder($type)
    {
        $this->js[] = base_url('assets/js/pages/folder.js');
        $yearSelected = $this->input->get('year');
        $this->parseData['content'] = 'admin/folder/list';
        $this->parseData['javascript'] = $this->js;
        $this->parseData['css'] = $this->css;
        $this->parseData['yearSelected'] = $yearSelected == null ? date('Y') : $yearSelected;
        $this->parseData['title_budge'] = 'Folder ' . ucwords(str_replace('-', ' ', $type));

        $this->load->view($this->mainPage, $this->parseData);
    }

    public function get_data_list($type)
    {
        $yearSelected = $this->input->get('year');
        $req = $this->http_request_get('budget/list/pengajuan?type=' . $type . '&year=' . $yearSelected);

        echo json_encode($req);
    }

}