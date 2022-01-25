<?php
defined('BASEPATH') or exit('No direct script access allowed');

class JenisModel extends CI_Model
{
    public function getALl()
    {
        return $this->db->get('jenis')->result_array();
    }
}
