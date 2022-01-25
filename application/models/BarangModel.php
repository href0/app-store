<?php
defined('BASEPATH') or exit('No direct script access allowed');

class BarangModel extends CI_Model
{
    public function getALl()
    {
        return $this->db
            ->select('barang.*, jenis.jenis_id, COUNT(jenis.jenis_id) as stok, jenis.nama_jenis')
            ->join('jenis', 'jenis.jenis_id = barang.jenis_id')
            ->group_by('jenis.nama_jenis')
            ->get('barang')
            ->result_array();
    }

    public function getStok()
    {
        // untuk contoh
        return $this->db->select('jenis_id, COUNT(jenis_id) as stok')
            ->group_by('jenis_id')
            ->get('barang', 10)
            ->result_array();
    }

    public function add($data)
    {
        $this->db->insert('barang', $data);
        return $this->db->insert_id();
    }

    public function getById($barang_id)
    {
        return $this->db->join('jenis', 'jenis.jenis_id = barang.jenis_id')->get_where('barang', ['barang_id'   => $barang_id])->row_array();
    }

    public function getByImei($imei)
    {
        return $this->db->get_where('barang', ['imei' => $imei])->row_array();
    }
}
