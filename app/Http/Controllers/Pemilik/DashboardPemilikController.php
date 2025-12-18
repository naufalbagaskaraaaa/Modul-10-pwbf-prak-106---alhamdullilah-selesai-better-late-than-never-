<?php

namespace App\Http\Controllers\Pemilik;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DashboardPemilikController extends Controller
{
    public function index()
    {
        return view('pemilik.dashboard-pemilik');
    }

    public function showPet()
    {
        $userId = Auth::user()->iduser; 

        $pemilik = DB::table('pemilik')->where('iduser', $userId)->first();

        if (!$pemilik) {
           dd("masih erorrr");
        }

        $dataPetSaya = [];

        if ($pemilik) {
            $dataPetSaya = DB::table('pet')
                ->join('ras_hewan', 'pet.idras_hewan', '=', 'ras_hewan.idras_hewan')
                ->where('pet.idpemilik', $pemilik->idpemilik)
                ->select('pet.*', 'ras_hewan.nama_ras')
                ->get();
        }

        //dd($dataPetSaya);

        return view('pemilik.data-pet.data-pet', ['pets' => $dataPetSaya]);
    }
}
