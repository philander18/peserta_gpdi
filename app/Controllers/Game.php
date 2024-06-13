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
        ];
        return view('Inproses/index', $data);
    }
}
