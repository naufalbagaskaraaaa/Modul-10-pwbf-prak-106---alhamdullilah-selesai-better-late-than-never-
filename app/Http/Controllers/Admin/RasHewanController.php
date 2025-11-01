<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\RasHewan;
use Illuminate\Http\Request;

class RasHewanController extends Controller
{
    public function index()
    {
        $rasHewan = RasHewan::all();
        return view('admin.ras-hewan.index', compact('rasHewan'));
    }
}
