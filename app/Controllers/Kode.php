<?php

namespace App\Controllers;

use App\Models\KodeModel;
use DateTime;

class Kode extends BaseController
{
    protected $KodeModel;
    public function __construct()
    {
        $this->KodeModel = new KodeModel();
    }
    public function index(): string
    {
        $session = session();
        if ($session->has('akses')) {
            header("location: Home");
            exit;
        }
        $data = [
            'judul' => 'Kode',
        ];
        return view('Portal/index', $data);
    }
    public function keluar(): string
    {
        $session = session();
        $session->remove('akses');
        header("location: index");
        exit;
    }
}
