<?php

class Project extends MY_Controller
{
    private $mainPage = 'admin/index';
    public function __construct()
    {
        parent::__construct();
        $this->parseData['isLogin'] = $this->isLogin();
        $this->parseData['navbar'] = 'parts/admin/header';
        $this->parseData['sidebar'] = 'parts/admin/sidebar';
    }

    public function detail($idSubmission)
    {
        $this->js[] = base_url('assets/js/pages/project-budget.js');
        $reqDataPengajuan = $this->http_request_get(sprintf('budget/pengajuan/%s', $idSubmission));
        $this->parseData['content'] = 'admin/project/detail';
        $this->parseData['javascript'] = $this->js;
        $this->parseData['css'] = $this->css;
        $this->parseData['title_budge'] = $reqDataPengajuan->data->nama;
        $this->parseData['dataPengajuan'] = $reqDataPengajuan->data;

        $this->load->view($this->mainPage, $this->parseData);
    }

    public function item_budget($idItem)
    {
        $this->js[] = base_url('assets/js/pages/project-item-budget.js');
        $reqDataItem = $this->http_request_get(sprintf('budget/item/%s', $idItem));
        $this->parseData['content'] = 'admin/project/item-budget';
        $this->parseData['javascript'] = $this->js;
        $this->parseData['css'] = $this->css;
        $this->parseData['title_budge'] = $reqDataItem->data->rincian;
        $this->parseData['dataItem'] = $reqDataItem->data;

        $this->load->view($this->mainPage, $this->parseData);
    }

    public function list_item_budget($idSubmission)
    {
        $reqDataItems = $this->http_request_get(sprintf('budget/pengajuan/%s/items', $idSubmission));
        echo json_encode($reqDataItems);
    }

    public function list_item_bpu($idItem)
    {
        $reqDataItems = $this->http_request_get(sprintf('budget/item/%s/bpu', $idItem));
        echo json_encode($reqDataItems);
    }
}