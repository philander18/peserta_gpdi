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
        // d($this->PesertaModel->list_peserta());
        $data = [
            'judul' => 'Home',
            'list_peserta' => $this->PesertaModel->list_peserta()
        ];
        return view('Home/index', $data);
    }
}
