<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Barang extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('barangmodel', 'barang');
        $this->load->model('jenismodel', 'jenis');
    }

    public function index()
    {


        $data = [
            'title'         => 'Data Barang',
            'sub_page'      => '',
            'table'         => $this->barang->getALl(),
            'content'       => 'barang/index'
        ];

        $this->load->view('template/master', $data);
    }

    public function add()
    {
        $this->form_validation->set_rules('jenis', 'Jenis', 'trim|required', [
            'required'  => 'Silahkan pilih jenis hp'
        ]);
        $this->form_validation->set_rules('imei', 'imei', 'trim|required', [
            'required'  => 'Imei tidak boleh kosong'
        ]);
        $this->form_validation->set_rules('harga', 'Harga', 'trim|required', [
            'required'  => 'Harga tidak boleh kosong'
        ]);

        if ($this->form_validation->run() == FALSE) {
            $data = [
                'title'         => 'Data Barang',
                'sub_page'      => 'Tambah',
                // 'username'      => $this->username_login,
                'jenis'         => $this->jenis->getAll(),
                'content'       => 'barang/form',
                'type'          => 'add',
                'edit_barang'   => false,
            ];
            $this->load->view('template/master', $data);
        } else {

            $data = [
                'jenis_id'  => $this->input->post('jenis'),
                'imei'  => $this->input->post('imei'),
                'harga'  => $this->input->post('harga'),
                'foto'  => 'default.png',
                'status'    => '1'
            ];
            $insert = $this->barang->add($data);
            if ($insert) {
                $this->session->set_flashdata(
                    'message',
                    '<div class="alert alert-success" role="alert">Barang berhasil ditambahkan</div>'
                );
                redirect('barang/add');
            }
        }
    }

    public function edit($barang_id = null)
    {

        $this->form_validation->set_rules('imei', 'imei', 'trim|required', [
            'required'  => 'Imei tidak boleh kosong'
        ]);
        $this->form_validation->set_rules('harga', 'Harga', 'trim|required', [
            'required'  => 'Harga tidak boleh kosong'
        ]);

        if ($this->form_validation->run() == FALSE) {
            $data = [
                'title'         => 'Data Barang',
                'sub_page'      => 'Tambah',
                // 'username'      => $this->username_login,
                'content'       => 'barang/form',
                'type'          => 'edit',
                'edit_barang'   => $this->barang->getById($barang_id),
            ];
            $this->load->view('template/master', $data);
        } else {

            $data = [
                'jenis_id'  => $this->input->post('jenis'),
                'imei'  => $this->input->post('imei'),
                'nama'  => $this->input->post('nama_hp'),
                'harga'  => $this->input->post('harga'),
                'foto'  => 'default.jpg',
                'status'    => '1'
            ];
            $insert = $this->barang->add($data);
            if ($insert) {
                $this->session->set_flashdata(
                    'message',
                    '<div class="alert alert-success" role="alert">Barang berhasil ditambahkan</div>'
                );
                redirect('barang/add');
            }
        }
    }

    public function delete($barang_id = null)
    {

        $delete = $this->db->where('barang_id', $barang_id)->delete('barang');
        if ($delete == 1) {
            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-success" role="alert">barang berhasil dihapus</div>'
            );
            redirect('barang');
        } else {
            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-danger" role="alert">Terjadi kesalahan</div>'
            );
            redirect('barang');
        }
    }
}
