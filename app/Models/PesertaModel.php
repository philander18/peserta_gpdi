<?php

namespace App\Models;

use CodeIgniter\Model;

class PesertaModel extends Model
{
    protected $table = 'peserta';
    protected $allowedFields = ['nama', 'hp', 'gender', 'gereja', 'kata', 'bayar', 'pic', 'wa', 'kelompok', 'nomor', 'updated_at'];
    public function list_gereja()
    {
        return $this->db->table('gereja')->select('nama')->orderBy('nama', 'asc')->get()->getResultArray();
    }
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
    public function list_kelompok()
    {
        $list_kelompok = $this->db->table('peserta')->select('kelompok')->distinct('kelompok')->where("kelompok is not null")->orderBy('kelompok ASC')->get()->getResultArray();
        if (empty($list_kelompok)) {
            $peserta = [];
        } else {
            foreach ($list_kelompok as $row) {
                $where = "kelompok = '" . $row['kelompok'] . "'";
                $peserta[] = [
                    'kelompok' => $row['kelompok'],
                    'list' => $this->db->table('peserta')->select('nama, gender, gereja, kelompok, nomor')->where($where)->get()->getResultArray(),
                ];
            }
        }
        $peserta[] = [
            'kelompok' => 'Tidak Masuk Kelompok',
            'list' => $this->db->table('peserta')->select('nama, gender, gereja, kelompok, nomor')->where("kelompok is null and nomor is not null")->get()->getResultArray(),
        ];
        return $peserta;
    }

    public function list_checkin($keyword, $jumlahlist, $index)
    {
        $where = "(nama like '%" . $keyword . "%' or gereja like '%" . $keyword . "%') and bayar > 0";
        $all = $this->db->table('peserta')->select('id, nama, gender, gereja, bayar, nomor')->where($where)->orderBy("nomor asc")->get()->getResultArray();
        $jumlahdata = count($all);
        $lastpage = ceil($jumlahdata / $jumlahlist);
        $tabel = array_splice($all, $index);
        array_splice($tabel, $jumlahlist);
        $data['lastpage'] = $lastpage;
        $data['tabel'] = $tabel;
        $data['jumlah'] = $jumlahdata;
        return $data;
    }

    public function list_visitor($keyword, $jumlahlist, $index)
    {
        $where = "nama like '%" . $keyword . "%' or gereja like '%" . $keyword . "%'";
        $all = $this->db->table('visitor')->select('id, nama, gender, gereja, status, masuk')->where($where)->orderBy("nama asc")->get()->getResultArray();
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
    function get_data_peserta_byid($id)
    {
        $query = $this->db->table('peserta')->where('id', $id)->get();
        return $query->getResult();
    }
    function get_kelompok_nomor()
    {
        $grup = $this->db->table('peserta')->select("kelompok, count(nama) as jumlah")->groupBy('kelompok')->orderBy('jumlah asc')->get()->getResultArray();
        switch (count($grup)) {
            case 1:
                $data['kelompok'] = 'A';
                break;
            case 2:
                $data['kelompok'] = 'B';
                break;
            case 3:
                $data['kelompok'] = 'C';
                break;
            case 4:
                $data['kelompok'] = 'D';
                break;
            case 5:
                $data['kelompok'] = 'E';
                break;
            case 6:
                $data['kelompok'] = 'F';
                break;
            case 7:
                $data['kelompok'] = 'G';
                break;
            case 8:
                $data['kelompok'] = 'H';
                break;
            case 9:
                $data['kelompok'] = 'I';
                break;
            case 10:
                $data['kelompok'] = 'J';
                break;
            case 11:
                $data['kelompok'] = 'K';
                break;
            case 12:
                $data['kelompok'] = 'L';
                break;
            case 13:
                $data['kelompok'] = 'M';
                break;
            case 14:
                $data['kelompok'] = 'N';
                break;
            case 15:
                $data['kelompok'] = 'O';
                break;
            case 16:
                $data['kelompok'] = 'P';
                break;
            default:
                if (is_null($grup[0]['kelompok'])) {
                    $data['kelompok'] = $grup[1]['kelompok'];
                } else {
                    $data['kelompok'] = $grup[0]['kelompok'];
                }
        }
        $data['nomor'] = $this->db->table('peserta')->select("max(nomor) as nomor")->get()->getResultArray()[0]['nomor'] + 1;
        return $data;
    }
    function update_peserta($data, $id)
    {
        return $this->db->table('peserta')->where('id', $id)->update($data);
    }
    function input_visitor($data)
    {
        return $this->db->table('visitor')->insert($data);
    }
}
