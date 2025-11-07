<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\JenisHewan;
use Illuminate\Http\Request;

class JenisHewanController extends Controller
{
    public function index()
    {
        $jenisHewan = JenisHewan::all();
        return view('admin.jenis-hewan.index', compact('jenisHewan'));
    }

    public function create()
    {
        return view('admin.jenis-hewan.create');
    }

    public function store(Request $request)
    {
        // validasi input
        $validatedData=$this->validateJenisHewan($request);

        // helper untuk menyimpan data
        $jenisHewan=$this->createJenisHewan($validatedData);

        return redirect()->route('admin.jenis-hewan.index')
                        ->with('succes, keren mas sampean');
    }

    protected function validateJenisHewan(Request $request, $id=null)
    {
        // data yang bersifat unique (jujur aku kurang ngerti ini)
        $uniqueRule=$id?
            'unique:jenis_hewan,nama_jenis_hewan,' . $id . ',idjenis_hewan' :
            'unique:jenis_hewan,nama_jenis_hewan';

        return $request->validate([
            'nama_jenis_hewan'=>[
                'required',
                'string',
                'max:255',
                'min:3',
                $uniqueRule
            ],
        ], [
            'nama_jenis_hewan.required'=>'isi dong nama jenis hewan manis',
            'nama_jenis_hewan.string'=>'kalau isi nama jenis hewan pake teks dong, kalau ga gitu error',
            'nama_jenis_hewan.max'=>'itu kamu kebanyakan ngisi nama jenis hewannya, maksimal 255 karakter',
            'nama_jenis_hewan.min'=>'minimal 3 karakter ya bang',
            'nama_jenis_hewan.unique'=>'nama jenis hewan itu udah ada sayang, kita kasih nama yang lain aja yaaa :)',
        ]);
    }

    // ini helper untuk create data baru
    protected function createJenisHewan(array $data)
    {
        try {
            return JenisHewan::create([
                'nama_jenis_hewan'=>trim(ucwords(strtolower($data['nama_jenis_hewan']))),
            ]);
        } catch (\Exception $e) {
            throw new \Exception('gagal simpan data sayang: ' . $e->getMessage());
        }
    }

    // ini helper untuk format nama menjadi title case
    protected function formatNamaJenisHewan($nama)
    {
        return trim(ucwords(strtolower($nama)));
    }
}
