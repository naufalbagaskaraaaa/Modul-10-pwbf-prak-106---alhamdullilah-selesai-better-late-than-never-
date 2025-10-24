<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\JenisHewan;
use Illuminate\Http\Request;

class JenisHewanController extends Controller
{
    public function index()
    {
        $jenisHewan = JenisHewan::all();
        return view('admin.jenis-hewan.index', compact('jenisHewan'));
    }
}
