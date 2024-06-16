<?php

namespace App\Controllers;

use App\Models\PesertaModel;
use DateTime;

class Komentar extends BaseController
{
    protected $PesertaModel;
    protected $jumlahlist = 3;
    public function __construct()
    {
        $this->PesertaModel = new PesertaModel();
    }
    public function index(): string
    {

        $session = session();
        if (!is_null($this->request->getVar('kode'))) {
            if (!empty($this->PesertaModel->akses($this->request->getVar('kode')))) {
                $session->set('akses', $this->PesertaModel->akses($this->request->getVar('kode'))[0]['akses']);
            }
        }
        if (!$session->has('akses')) {
            header("location: Kode");
            exit;
        }
        $page = 1;
        $data = [
            'judul' => 'Comments',
            'halaman' => 'komentar',
            'harapan' => $this->PesertaModel->list_harapan("", $this->jumlahlist, 0)['tabel'],
            'pagination_harapan' => $this->pagination($page, $this->PesertaModel->list_harapan("", $this->jumlahlist, 0)['lastpage']),
            'last_harapan' => $this->PesertaModel->list_harapan("", $this->jumlahlist, 0)['lastpage'],
            'jumlah_harapan' => $this->PesertaModel->list_harapan("", $this->jumlahlist, 0)['jumlah'],
            'page' => $page,
            'pujian' => $this->PesertaModel->list_pujian("", $this->jumlahlist, 0)['tabel'],
            'pagination_pujian' => $this->pagination($page, $this->PesertaModel->list_pujian("", $this->jumlahlist, 0)['lastpage']),
            'last_pujian' => $this->PesertaModel->list_pujian("", $this->jumlahlist, 0)['lastpage'],
            'jumlah_pujian' => $this->PesertaModel->list_pujian("", $this->jumlahlist, 0)['jumlah'],
            'page' => $page,
            'masukan' => $this->PesertaModel->list_masukan("", $this->jumlahlist, 0)['tabel'],
            'pagination_masukan' => $this->pagination($page, $this->PesertaModel->list_masukan("", $this->jumlahlist, 0)['lastpage']),
            'last_masukan' => $this->PesertaModel->list_masukan("", $this->jumlahlist, 0)['lastpage'],
            'jumlah_masukan' => $this->PesertaModel->list_masukan("", $this->jumlahlist, 0)['jumlah'],
            'page' => $page,
            'akses' => $session->akses,
            'list_nama' => $this->PesertaModel->list_nama(),
            'ip' => "'" . $this->get_ip() . "'"
        ];
        return view('Komentar/index', $data);
    }
    public function refresh_harapan()
    {
        $session = session();
        if (isset($_POST['keyword'])) {
            $keyword = $_POST['keyword'];
        } else {
            $keyword = '';
        }
        $page = $_POST['page'];
        if ($page == 1) {
            $index = 0;
        } else {
            $index = ($page - 1) * $this->jumlahlist;
        }
        $data = [
            'harapan' => $this->PesertaModel->list_harapan($keyword, $this->jumlahlist, $index)['tabel'],
            'pagination_harapan' => $this->pagination($page, $this->PesertaModel->list_harapan($keyword, $this->jumlahlist, $index)['lastpage']),
            'last_harapan' => $this->PesertaModel->list_harapan($keyword, $this->jumlahlist, $index)['lastpage'],
            'jumlah_harapan' => $this->PesertaModel->list_harapan($keyword, $this->jumlahlist, $index)['jumlah'],
            'page' => $page,
            'akses' => $session->akses
        ];
        return view('Komentar/Tabel/harapan', $data);
    }
    public function refresh_masukan()
    {
        $session = session();
        if (isset($_POST['keyword'])) {
            $keyword = $_POST['keyword'];
        } else {
            $keyword = '';
        }
        $page = $_POST['page'];
        if ($page == 1) {
            $index = 0;
        } else {
            $index = ($page - 1) * $this->jumlahlist;
        }
        $data = [
            'masukan' => $this->PesertaModel->list_masukan($keyword, $this->jumlahlist, $index)['tabel'],
            'pagination_masukan' => $this->pagination($page, $this->PesertaModel->list_masukan($keyword, $this->jumlahlist, $index)['lastpage']),
            'last_masukan' => $this->PesertaModel->list_masukan($keyword, $this->jumlahlist, $index)['lastpage'],
            'jumlah_masukan' => $this->PesertaModel->list_masukan($keyword, $this->jumlahlist, $index)['jumlah'],
            'page' => $page,
            'akses' => $session->akses
        ];
        return view('Komentar/Tabel/masukan', $data);
    }
    public function refresh_pujian()
    {
        $session = session();
        if (isset($_POST['keyword'])) {
            $keyword = $_POST['keyword'];
        } else {
            $keyword = '';
        }
        $page = $_POST['page'];
        if ($page == 1) {
            $index = 0;
        } else {
            $index = ($page - 1) * $this->jumlahlist;
        }
        $data = [
            'pujian' => $this->PesertaModel->list_pujian($keyword, $this->jumlahlist, $index)['tabel'],
            'pagination_pujian' => $this->pagination($page, $this->PesertaModel->list_pujian($keyword, $this->jumlahlist, $index)['lastpage']),
            'last_pujian' => $this->PesertaModel->list_pujian($keyword, $this->jumlahlist, $index)['lastpage'],
            'jumlah_pujian' => $this->PesertaModel->list_pujian($keyword, $this->jumlahlist, $index)['jumlah'],
            'page' => $page,
            'akses' => $session->akses
        ];
        return view('Komentar/Tabel/pujian', $data);
    }
    public function input_komentar()
    {
        $date = new DateTime();
        $date = $date->format('Y-m-d H:i:s');
        $data = [
            'nama' => $_POST['nama'],
            'kategori' => $_POST['kategori'],
            'komentar' => $_POST['komentar'],
            'ip' => $_POST['ip'],
            'updated_at' => $date
        ];
        if ($this->PesertaModel->input_komentar($data)) {
            session()->setFlashdata('pesan', 'Komentar ' . $_POST['nama'] . ' berhasil ditambahkan');
        } else {
            session()->setFlashdata('pesan', 'Penambahan Komentar gagal.');
        }
        return view('Templates/flash');
    }

    function get_ip()
    {
        $ipaddress = '';
        if (isset($_SERVER['HTTP_CLIENT_IP']))
            $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
        else if (isset($_SERVER['HTTP_X_FORWARDED_FOR']))
            $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
        else if (isset($_SERVER['HTTP_X_FORWARDED']))
            $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
        else if (isset($_SERVER['HTTP_FORWARDED_FOR']))
            $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
        else if (isset($_SERVER['HTTP_FORWARDED']))
            $ipaddress = $_SERVER['HTTP_FORWARDED'];
        else if (isset($_SERVER['REMOTE_ADDR']))
            $ipaddress = $_SERVER['REMOTE_ADDR'];
        else
            $ipaddress = 'IP tidak dikenali';
        return $ipaddress;
    }
    public function pagination($page, $lastpage)
    {
        $pagination = [
            'first' => false,
            'previous' => false,
            'next' => false,
            'last' => false
        ];
        if ($lastpage == 1) {
            $pagination['number'] = [1];
        } elseif ($lastpage == 2) {
            $pagination['number'] = [1, 2];
        } elseif ($lastpage == 3) {
            $pagination['number'] = [1, 2, 3];
        } elseif ($lastpage == 4) {
            $pagination['number'] = [1, 2, 3, 4];
        } elseif ($lastpage == 5) {
            $pagination['number'] = [1, 2, 3, 4, 5];
        } else {
            if ($page >= 1 and $page <= 3) {
                $pagination['next'] = true;
                $pagination['last'] = true;
                $pagination['number'] = [1, 2, 3];
            } elseif ($page >= $lastpage - 2 and $page <= $lastpage) {
                $pagination['first'] = true;
                $pagination['previous'] = true;
                $pagination['number'] = [$lastpage - 2, $lastpage - 1, $lastpage];
            } else {
                $pagination['first'] = true;
                $pagination['previous'] = true;
                $pagination['next'] = true;
                $pagination['last'] = true;
                $pagination['number'] = [$page - 1, $page, $page + 1];
            }
        };
        $pagination['page'] = $page;
        return $pagination;
    }
}
