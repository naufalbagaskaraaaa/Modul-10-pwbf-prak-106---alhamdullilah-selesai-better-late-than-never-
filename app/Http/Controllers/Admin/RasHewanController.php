<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\RasHewan;
use Illuminate\Http\Request;

class RasHewanController extends Controller
{
    public function index()
    {
        $pemilik = RasHewan::all();
        return view('admin.rasHewan.index', compact('rasHewan'));
    }
}
