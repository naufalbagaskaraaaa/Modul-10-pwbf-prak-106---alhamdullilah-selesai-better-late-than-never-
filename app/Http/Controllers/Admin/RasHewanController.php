<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RasHewanController extends Controller
{
    public function index()
    {
        //$rasHewan = RasHewan::all();

        $rasHewan = DB::table('ras_hewan')
            ->join('jenis_hewan', 'ras_hewan.idjenis_hewan', '=', 'jenis_hewan.idjenis_hewan')
            ->select('ras_hewan.*', 'jenis_hewan.nama_jenis_hewan')
            ->orderBy('ras_hewan.nama_ras', 'asc')
            ->get();

        return view('admin.ras-hewan.index', compact('rasHewan'));
    }

    public function create()
    {
        $jenisHewan = DB::table('jenis_hewan')->orderBy('nama_jenis_hewan')->get();
        return view('admin.ras-hewan.create', compact('jenisHewan'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_ras' => 'required|string|max:100',
            'idjenis_hewan' => 'required|exists:jenis_hewan,idjenis_hewan',
        ]);

        DB::table('ras_hewan')->insert([
            'nama_ras' => trim(ucwords(strtolower($request->nama_ras))),
            'idjenis_hewan' => $request->idjenis_hewan,
        ]);

        return redirect()->route('admin.ras-hewan.index')->with('success', 'Ras hewan berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $ras = DB::table('ras_hewan')->where('idras_hewan', $id)->first();
        $jenisHewan = DB::table('jenis_hewan')->orderBy('nama_jenis_hewan')->get();
        return view('admin.ras-hewan.edit', compact('ras', 'jenisHewan'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_ras' => 'required|string|max:100',
            'idjenis_hewan' => 'required|exists:jenis_hewan,idjenis_hewan',
        ]);

        DB::table('ras_hewan')->where('idras_hewan', $id)->update([
            'nama_ras' => trim(ucwords(strtolower($request->nama_ras))),
            'idjenis_hewan' => $request->idjenis_hewan,
        ]);

        return redirect()->route('admin.ras-hewan.index')->with('success', 'Ras hewan diperbarui!');
    }

    public function destroy($id)
    {
        try {
            DB::table('ras_hewan')->where('idras_hewan', $id)->delete();
            return redirect()->route('admin.ras-hewan.index')->with('success', 'Ras hewan dihapus.');
        } catch (\Exception $e) {
            return redirect()->route('admin.ras-hewan.index')->with('error', 'Gagal hapus. Ras ini dipakai di data Pet.');
        }
    }
}
