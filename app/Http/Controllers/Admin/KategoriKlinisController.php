<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\KategoriKlinis;
use Illuminate\Http\Request;

class KategoriKlinisController extends Controller
{
    public function index()
    {
        $pemilik = KategoriKlinis::all();
        return view('admin.kategoriKlinis.index', compact('kategoriKlinis'));
    }
}
