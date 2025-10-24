<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\KodeTindakanTerapi;
use Illuminate\Http\Request;

class KodeTindakanTerapiController extends Controller
{
    public function index()
    {
        $pemilik = KodeTindakanTerapi::all();
        return view('admin.kodeTindakanTerapi.index', compact('kodeTindakanTerapi'));
    }
}
