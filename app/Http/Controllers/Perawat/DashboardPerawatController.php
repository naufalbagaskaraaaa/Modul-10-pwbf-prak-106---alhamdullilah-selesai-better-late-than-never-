<?php

namespace App\Http\Controllers\Perawat;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\RekamMedis;

class DashboardPerawatController extends Controller
{
    public function index()
    {
        return view('perawat.dashboard-perawat');
    }

    public function showRekamMedis()
    {
        $dataRekamMedis = RekamMedis::with('pet')
        ->orderBy('created_at', 'desc')
        ->get();

        return view('perawat.rekam-medis.rekam-medis', ['daftar_rekam_medis' => $dataRekamMedis]);
    }
}
