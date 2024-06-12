<?php

namespace App\Controllers;

use App\Models\PesertaModel;
use DateTime;

class Checkin extends BaseController
{
    protected $PesertaModel;
    protected $jumlahlist = 10;
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
            'judul' => 'Checkin',
            'halaman' => 'checkin',
            'checkin' => $this->PesertaModel->list_checkin("", $this->jumlahlist, 0)['tabel'],
            'pagination_checkin' => $this->pagination($page, $this->PesertaModel->list_checkin("", $this->jumlahlist, 0)['lastpage']),
            'last_checkin' => $this->PesertaModel->list_checkin("", $this->jumlahlist, 0)['lastpage'],
            'jumlah_checkin' => $this->PesertaModel->list_checkin("", $this->jumlahlist, 0)['jumlah'],
            'page' => $page,
            'akses' => $session->akses
        ];
        return view('Checkin/index', $data);
    }

    public function refresh_tabel_checkin()
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
            'checkin' => $this->PesertaModel->list_checkin($keyword, $this->jumlahlist, $index)['tabel'],
            'pagination_checkin' => $this->pagination($page, $this->PesertaModel->list_checkin($keyword, $this->jumlahlist, $index)['lastpage']),
            'last_checkin' => $this->PesertaModel->list_checkin($keyword, $this->jumlahlist, $index)['lastpage'],
            'jumlah_checkin' => $this->PesertaModel->list_checkin($keyword, $this->jumlahlist, $index)['jumlah'],
            'page' => $page,
        ];
        return view('Checkin/Tabel/checkin', $data);
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
