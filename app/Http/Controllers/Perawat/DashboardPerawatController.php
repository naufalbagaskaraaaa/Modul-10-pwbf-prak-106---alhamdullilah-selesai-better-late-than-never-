<?php

namespace App\Http\Controllers\Perawat;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardPerawatController extends Controller
{
    public function index()
    {
        $antrianPasien = DB::table('rekam_medis')
        ->join('pet', 'rekam_medis.idpet', '=', 'pet.idpet')
        ->join('pemilik', 'pet.idpemilik', '=', 'pemilik.idpemilik')
        ->join('user', 'pemilik.iduser', '=', 'user.iduser') 
        ->select(
        'rekam_medis.*', 
        'pet.nama as nama_hewan', 
        'user.nama as nama_pemilik'
    )
    ->where('rekam_medis.diagnosa', 'pending') 
    ->orderBy('rekam_medis.created_at', 'asc') 
    ->get();

        return view('perawat.dashboard-perawat', ['antrian' => $antrianPasien]);
    }

    public function showRekamMedis($id)
    {
    $pasien = DB::table('rekam_medis')
        ->join('pet', 'rekam_medis.idpet', '=', 'pet.idpet')
        ->select('rekam_medis.*', 'pet.nama as nama_hewan') 
        ->where('rekam_medis.idrekam_medis', $id)
        ->first();

    if (!$pasien) {
        return redirect()->back()->with('error', 'Data tidak ditemukan');
    }

    return view('perawat.rekam-medis.periksa', compact('pasien'));
    }

    public function updateRekamMedis(Request $request, $id) 
    {
    DB::table('rekam_medis')->where('idrekam_medis', $id)->update([
        'anamnesa' => $request->anamnesa,
        'temuan_klinis' => $request->temuan_klinis,
        'diagnosa' => 'Pending'
    ]);
    return redirect()->route('perawat.dashboard-perawat')->with('success', 'Data dikirim.');
    }
}