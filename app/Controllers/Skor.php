<?php

namespace App\Controllers;

use App\Models\PesertaModel;
use DateTime;

class Skor extends BaseController
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
            'judul' => 'Skor',
            'halaman' => 'skor',
            'list_skor' => $this->PesertaModel->list_skor(),
            'list_input_skor' => $this->PesertaModel->list_input_skor($session->akses),
            'akses' => $session->akses
        ];
        return view('Skor/index', $data);
    }
    public function refresh_grup_skor()
    {
        $data = [
            'list_skor' => $this->PesertaModel->list_skor(),
        ];
        return view('Skor/Tabel/grupskor', $data);
    }
    public function update_nilai_skor()
    {
        $date = new DateTime();
        $date = $date->format('Y-m-d H:i:s');
        $data = [
            'nilai' => $_POST['nilai'],
            'updated_at' => $date
        ];
        $this->PesertaModel->update_skor($data, $_POST['id']);
    }
}
