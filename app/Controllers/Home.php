<?php

namespace App\Controllers;

use App\Models\PesertaModel;
use DateTime;

class Home extends BaseController
{
    protected $PesertaModel;
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
        $data = [
            'judul' => 'Home',
            'halaman' => 'home',
            'list_peserta' => $this->PesertaModel->list_peserta(),
            'akses' => $session->akses
        ];
        return view('Home/index', $data);
    }
    public function flash()
    {
        return view('Templates/flash');
    }
}
