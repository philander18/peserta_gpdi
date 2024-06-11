<?php

namespace App\Models;

use CodeIgniter\Model;

class PesertaModel extends Model
{
    protected $table = 'peserta';
    protected $allowedFields = ['nama', 'hp', 'gender', 'gereja', 'kata', 'bayar', 'pic', 'wa', 'updated_at'];
    public function list_peserta()
    {
        $list_gereja = $this->db->table('peserta')->select('gereja')->distinct('gereja')->where('bayar is not null')->orderBy('gereja ASC')->get()->getResultArray();
        foreach ($list_gereja as $row) {
            $where = "gereja = '" . $row['gereja'] . "' and bayar is not null";
            $peserta[] = [
                'gereja' => $row['gereja'],
                'list' => $this->db->table('peserta')->select('nama, gender, gereja, bayar')->where($where)->get()->getResultArray(),
            ];
        }
        return $peserta;
    }
}
