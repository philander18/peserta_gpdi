<?php

namespace App\Models;

use CodeIgniter\Model;

class KodeModel extends Model
{
    protected $table = 'kode';
    protected $allowedFields = ['akses', 'kode'];
    public function akses($kode)
    {
        $where = "kode = '" . $kode . "'";
        return $this->db->table('kode')->select('akses, kode')->where($where)->get()->getResultArray();
    }
}
