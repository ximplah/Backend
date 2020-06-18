<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UIController extends Controller
{
    public function login()
    {
        return view('ui/login',[

            'title' => 'IKS SQUAD LOGIN'
        ]);
    }

    public function dashboard()
    {
        return view('ui/dashboard');
    }

    public function BQ()
    {
        return view('ui/bq');
    }

    public function TambahBq()
    {
        return view('ui/TambahBq');
    }
    public function Surat_Penerimaan()
    {

    }

    public function Invoice()
    {

    }

    public function Input_Surat_Laporan()
    {

    }

    public function Tender_Selesai()
    {

    }

    public function Progress_Tender()
    {

    }
}
