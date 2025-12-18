<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminTransaksiController extends Controller
{
    public function indexTemu()
    {
        $data = DB::table('temu_dokter')
            ->join('pet', 'temu_dokter.idpet', '=', 'pet.idpet')
            ->join('role_user', 'temu_dokter.idrole_user', '=', 'role_user.idrole_user')
            ->join('user', 'role_user.iduser', '=', 'user.iduser')
            ->select(
                'temu_dokter.*', 
                'pet.nama as nama_pet', 
                'user.nama as nama_dokter'
            )
            ->orderBy('temu_dokter.waktu_daftar', 'desc')
            ->get();

        return view('admin.transaksi.temu_index', compact('data'));
    }

    public function destroyTemu($id)
    {
        DB::table('temu_dokter')->where('idreservasi_dokter', $id)->delete();
        
        return redirect()->back()
            ->with('success', 'Data antrian berhasil dihapus oleh Admin.');
    }

    public function indexRekam()
    {
        $data = DB::table('rekam_medis')
            ->join('pet', 'rekam_medis.idpet', '=', 'pet.idpet')
            ->leftJoin('role_user', 'rekam_medis.dokter_pemeriksa', '=', 'role_user.idrole_user')
            ->leftJoin('user', 'role_user.iduser', '=', 'user.iduser')
            ->select(
                'rekam_medis.*', 
                'pet.nama as nama_pet', 
                'user.nama as nama_dokter'
            )
            ->orderBy('rekam_medis.created_at', 'desc')
            ->get();

        return view('admin.transaksi.rekam_index', compact('data'));
    }

    public function showRekam($id)
    {
        $rekam = DB::table('rekam_medis')
            ->join('pet', 'rekam_medis.idpet', '=', 'pet.idpet')
            ->leftJoin('role_user', 'rekam_medis.dokter_pemeriksa', '=', 'role_user.idrole_user')
            ->leftJoin('user', 'role_user.iduser', '=', 'user.iduser')
            ->select(
                'rekam_medis.*', 
                'pet.nama as nama_pet', 
                'user.nama as nama_dokter'
            )
            ->where('idrekam_medis', $id)
            ->first();

        if (!$rekam) {
            return redirect()->route('admin.transaksi.rekam')->with('error', 'Data tidak ditemukan.');
        }

        $details = DB::table('detail_rekam_medis')
            ->join('kode_tindakan_terapi', 'detail_rekam_medis.idkode_tindakan_terapi', '=', 'kode_tindakan_terapi.idkode_tindakan_terapi')
            ->select('detail_rekam_medis.*', 'kode_tindakan_terapi.kode', 'kode_tindakan_terapi.deskripsi_tindakan_terapi')
            ->where('idrekam_medis', $id)
            ->get();

        return view('admin.transaksi.rekam_show', compact('rekam', 'details'));
    }

    public function destroyRekam($id)
    {
        DB::table('detail_rekam_medis')->where('idrekam_medis', $id)->delete();
        
        DB::table('rekam_medis')->where('idrekam_medis', $id)->delete();

        return redirect()->route('admin.transaksi.rekam')
            ->with('success', 'Data rekam medis berhasil dihapus permanen.');
    }
}