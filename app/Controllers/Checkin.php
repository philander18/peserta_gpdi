<?php

namespace App\Controllers;

use App\Models\PesertaModel;
use DateTime;

class Checkin extends BaseController
{
    protected $PesertaModel;
    public function __construct()
    {
        $this->PesertaModel = new PesertaModel();
    }
    public function index(): string
    {
        $data = [
            'judul' => 'Checkin',
            'halaman' => 'checkin',
            // 'list_peserta' => $this->PesertaModel->list_peserta()
        ];
        return view('Inproses/index', $data);
    }
}
