<?php

namespace App\Controllers;

use App\Models\PesertaModel;
use DateTime;

class Visitor extends BaseController
{
    protected $PesertaModel;
    protected $jumlahlist = 10;
    public function __construct()
    {
        $this->PesertaModel = new PesertaModel();
    }
    public function index(): string
    {
        $page = 1;
        $data = [
            'judul' => 'Visitor',
            'list_gereja' => $this->PesertaModel->list_gereja(),
            'visitor' => $this->PesertaModel->list_visitor("", $this->jumlahlist, 0)['tabel'],
            'pagination_visitor' => $this->pagination($page, $this->PesertaModel->list_visitor("", $this->jumlahlist, 0)['lastpage']),
            'last_visitor' => $this->PesertaModel->list_visitor("", $this->jumlahlist, 0)['lastpage'],
            'jumlah_visitor' => $this->PesertaModel->list_visitor("", $this->jumlahlist, 0)['jumlah'],
            'page' => $page,
        ];
        return view('Visitor/index', $data);
    }
    public function refresh_tabel_visitor()
    {
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
            'visitor' => $this->PesertaModel->list_visitor($keyword, $this->jumlahlist, $index)['tabel'],
            'pagination_visitor' => $this->pagination($page, $this->PesertaModel->list_visitor($keyword, $this->jumlahlist, $index)['lastpage']),
            'last_visitor' => $this->PesertaModel->list_visitor($keyword, $this->jumlahlist, $index)['lastpage'],
            'jumlah_visitor' => $this->PesertaModel->list_visitor($keyword, $this->jumlahlist, $index)['jumlah'],
            'page' => $page,
        ];
        return view('Visitor/Tabel/visitor', $data);
    }
    public function input_visitor()
    {
        $date = new DateTime();
        $date = $date->format('Y-m-d H:i:s');
        $data = [
            'nama' => $_POST['nama'],
            'hp' => $_POST['hp'],
            'gender' => $_POST['gender'],
            'gereja' => $_POST['gereja'],
            'status' => $_POST['status'],
            'updated_at' => $date
        ];
        if ($this->PesertaModel->input_visitor($data)) {
            session()->setFlashdata('pesan', 'Visitor ' . $_POST['nama'] . ' berhasil ditambahkan');
        } else {
            session()->setFlashdata('pesan', 'Penambahan visitor gagal.');
        }
        return view('Templates/flash');
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
