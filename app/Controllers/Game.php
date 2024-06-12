<?php

namespace App\Controllers;

use App\Models\PesertaModel;
use DateTime;

class Game extends BaseController
{
    protected $PesertaModel;
    public function __construct()
    {
        $this->PesertaModel = new PesertaModel();
    }
    public function index(): string
    {
        $data = [
            'judul' => 'Game',
            'halaman' => 'game',
            // 'list_peserta' => $this->PesertaModel->list_peserta()
        ];
        return view('Portal/index', $data);
    }
}
