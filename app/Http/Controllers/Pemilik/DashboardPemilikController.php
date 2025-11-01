<?php

namespace App\Http\Controllers\Pemilik;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardPemilikController extends Controller
{
    public function index()
    {
        return view('pemilik.dashboard-pemilik');
    }

    public function showPet()
    {
        $user = Auth::user();

        $dataPetSaya = [];

        if ($user->pemilik) {
            $dataPetSaya = $user->pemilik->pets;
        }

        return view('pemilik.data-pet.data-pet', ['pets' => $dataPetSaya]);
    }
}
