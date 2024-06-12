<?php

namespace App\Models;

use CodeIgniter\Model;

class PesertaModel extends Model
{
    protected $table = 'peserta';
    protected $allowedFields = ['nama', 'hp', 'gender', 'gereja', 'kata', 'bayar', 'pic', 'wa', 'kelompok', 'nomor', 'updated_at'];
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

    public function list_checkin($keyword, $jumlahlist, $index)
    {
        $where = "(nama like '%" . $keyword . "%' or gereja like '%" . $keyword . "%') and bayar > 0";
        $all = $this->db->table('peserta')->select('id, nama, gender, gereja, bayar')->where($where)->orderBy("nama ASC")->get()->getResultArray();
        $jumlahdata = count($all);
        $lastpage = ceil($jumlahdata / $jumlahlist);
        $tabel = array_splice($all, $index);
        array_splice($tabel, $jumlahlist);
        $data['lastpage'] = $lastpage;
        $data['tabel'] = $tabel;
        $data['jumlah'] = $jumlahdata;
        return $data;
    }
    public function akses($kode)
    {
        $where = "kode = '" . $kode . "'";
        return $this->db->table('kode')->select('akses, kode')->where($where)->get()->getResultArray();
    }
}
