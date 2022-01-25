<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Penjualan extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('penjualanmodel', 'penjualan');
        $this->load->model('barangmodel', 'barang');
    }

    public function index()
    {


        $data = [
            'title'         => 'Data Penjualan',
            'sub_page'      => '',
            'table'         => $this->penjualan->getAllGroupByJenis(),
            'content'       => 'penjualan/index'
        ];

        $this->load->view('template/master', $data);
    }

    public function add()
    {
        $this->form_validation->set_rules('imei', 'IMEI', 'trim|required', [
            'required'      => 'Imei harus diisi'
        ]);


        if ($this->form_validation->run() == FALSE) {

            $data = [
                'title'         => 'Data Penjualan',
                'sub_page'      => 'Tambah',
                // 'username'      => $this->username_login,
                'content'       => 'penjualan/form',
                'type'          => 'add',
                'edit_penjualan'   => false,
            ];
            $this->load->view('template/master', $data);
        } else {
            $imei = $this->input->post('imei');
            $checkImei =  $this->barang->getByImei($imei);
            if ($checkImei != '') {
                $data = [
                    'imei'  => $imei
                ];
                if ($this->penjualan->insert($data)) {
                    $this->session->set_flashdata(
                        'message',
                        '<div class="alert alert-success" role="alert">penjualan berhasil ditambahkan</div>'
                    );
                    redirect('penjualan/add');
                }
            } else {
                $this->session->set_flashdata(
                    'message',
                    '<div class="alert alert-danger" role="alert">imei tidak ditemukan</div>'
                );
                redirect('penjualan/add');
            }
        }
    }
}
