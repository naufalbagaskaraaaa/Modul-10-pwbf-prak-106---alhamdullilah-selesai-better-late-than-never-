<?php

namespace App\Http\Controllers\Resepsionis;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\RekamMedis;

class DashboardResepsionisController extends Controller
{
    public function index()
    {
        return view('resepsionis.dashboard-resepsionis');
    }

    public function showPendaftaran()
    {
        $dataPendaftaran = RekamMedis::with('pet')
        ->orderBy('created_at', 'desc')
        ->get();

        return view('resepsionis.pendaftaran.pendaftaran', ['data_pendaftaran' => $dataPendaftaran]);
    }
}
