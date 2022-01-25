<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Jenis extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('jenismodel', 'jenis');
    }

    public function index()
    {

        $data = [
            'title'         => 'Jenis Smartphone',
            'sub_page'      => '',
            'table'         => $this->jenis->getALl(),
            'content'       => 'jenis/index'
        ];

        $this->load->view('template/master', $data);
    }
}
