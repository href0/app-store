<?php
defined('BASEPATH') or exit('No direct script access allowed');

class PenjualanModel extends CI_Model
{
    public function getALl()
    {
        return $this->db->get('penjualan')->result_array();
    }

    public function getAllGroupByJenis()
    {
        return $this->db
            ->join('barang', 'barang.imei = penjualan.imei')
            ->join('jenis', 'jenis.jenis_id = barang.jenis_id')
            ->group_by('jenis.nama_jenis')
            ->get('penjualan')
            ->result_array();
    }

    public function insert($data)
    {
        $this->db->insert('penjualan', $data);
        return $this->db->insert_id();
    }

    public function update($data, $penjualan_id)
    {
        return  $this->db->set($data)->where('penjualan_id', $penjualan_id)->update('penjualan');
    }
}
