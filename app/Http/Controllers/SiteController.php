<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; // saya use  ini karena syntax '\DB::' tidak dikenali oleh codeEditor saya.

class SiteController extends Controller
{
    public function index()
    {
        return view('site.home');
    }

    public function layanan()
    {
        return view('site.layanan');
    }
    
    public function kontak()
    {
        return view('site.kontak');
    }

    public function strukturOrganisasi()
    {
        return view('site.strukturOrganisasi');
    }

    public function login()
    {
        return view('site.login');
    }


    public function cekKoneksi()
    {
        try {
            DB::connection()->getPdo();
            return 'Koneksi ke database berhasil mas';
        } catch (\Exception $e) {
            return 'db mu gak nyantol mas' . $e->getMessage();
        }
    }
}