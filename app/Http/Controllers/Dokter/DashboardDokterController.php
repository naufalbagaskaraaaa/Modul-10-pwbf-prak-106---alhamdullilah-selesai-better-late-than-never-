<?php

namespace App\Http\Controllers\Dokter;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\RekamMedis;

class DashboardDokterController extends Controller
{
    public function index()
    {
        return view('dokter.dashboard-dokter');
    }

    public function showRekamMedisDokter()
    {
        $user = Auth::user();

        $doctorRoleUser = $user->roleUser()->where('idrole', 2)->first();

        $dataRekamMedis = [];

        if ($doctorRoleUser) {

            $dataRekamMedis = $doctorRoleUser->rekamMedis()
            ->with('pet')
            ->orderBy('created_at', 'desc')
            ->get();
        }

        return view('dokter.rekam-medis.rekam-medis', ['daftar_rekam_medis' => $dataRekamMedis]);
    }
}
