<?php

namespace App\Http\Controllers\Dokter;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\RekamMedis;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class DashboardDokterController extends Controller
{
    public function index()
    {

    $data = DB::table('rekam_medis')
    ->join('pet', 'rekam_medis.idpet', '=', 'pet.idpet')
    ->select('rekam_medis.*', 'pet.nama as nama_pet')
    ->where('rekam_medis.diagnosa', 'Pending') 
    ->get();

    return view('dokter.dashboard-dokter', compact('data'));
    }

    public function showRekamMedisDokter()
    {
        $user = Auth::user();

        //$dokter = $user->roleUser()->where('idrole', 2)->first();

        $dokter = DB::table('role_user')
            ->where('iduser', $user)
            ->where('idrole', 2)
            ->first();

        $dataRekamMedis = [];

        if ($dokter) {

            $dataRekamMedis = DB::table('rekam_medis')
                ->join('pet', 'rekam_medis.idpet', '=', 'pet.idpet')
                ->where('rekam_medis.dokter_pemeriksa', $dokter->idrole_user)
                ->select('rekam_medis.*', 'pet.nama as nama_hewan_peliharaan')
                ->orderBy('rekam_medis.created_at', 'desc')
                ->get();
        }

        $antrianDokter = DB::table('rekam_medis')
        ->join('pet', 'rekam_medis.idpet', '=', 'pet.idpet')
        ->where('rekam_medis.diagnosa', 'Menunggu Diagnosa Dokter') // Filter hasil perawat
        ->get();

        return view('dokter.rekam-medis.rekam-medis', ['daftar_rekam_medis' => $dataRekamMedis]);
    }

    public function updateRekamMedisDokter(Request $request, $id) {
    DB::table('rekam_medis')->where('idrekam_medis', $id)->update([
        'diagnosa' => $request->diagnosa,
        'dokter_pemeriksa' => Auth::user()->id
    ]);

    DB::table('detail_rekam_medis')->insert([
        'idrekam_medis' => $id,
        'idkode_tindakan_terapi' => $request->idkode_tindakan_terapi,
        'detail' => 'Selesai diperiksa dokter'
    ]);

    return redirect()->route('dokter.dashboard-dokter');
    }
}
