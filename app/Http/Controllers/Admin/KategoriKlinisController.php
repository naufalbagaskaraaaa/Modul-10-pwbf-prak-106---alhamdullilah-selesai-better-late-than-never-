<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\KategoriKlinis;
use Illuminate\Http\Request;

class KategoriKlinisController extends Controller
{
    public function index()
    {
        $kategoriKlinis = KategoriKlinis::all();
        return view('admin.kategori-klinis.index', compact('kategoriKlinis'));
    }

    public function create()
    {
        return view('admin.kategori-klinis.create');
    }

    public function store(Request $request)
    {
        $validatedData=$this->validateKategoriKlinis($request);

        $kategoriKlinis=$this->createKategoriKlinis($validatedData);

        return redirect()->route('admin.kategori-klinis.index')
        ->with('berhasil tambah data kategori klinis mas');
    }

    protected function validateKategoriKlinis(Request $request, $id=null)
    {
        $uniqueRule=$id?
        'unique:kategori_klinis,nama_kategori_klinis,' . $id . ',idkategori_klinis' :
        'unique:kategori_klinis,nama_kategori_klinis';

        return $request->validate([
            'nama_kategori_klinis'=>[
                'required',
                'string',
                'max:255',
                'min:3',
                $uniqueRule
            ],
        ], [
            'nama_kategori_klinis.required'=>'nama kategori wajib diisi mas',
            'nama_kategori_klinis.string'=>'nama kategori harus berupa teks mas',
            'nama_kategori_klinis.max'=>'nama kategori maksimal 255 karakter',
            'nama_kategori_klinis.min'=>'nama kategori minimal 3 karakter',
            'nama_kategori_klinis.unique'=>'nama kategori udah ada itu',
        ]);
    }

    protected function createKategoriKlinis(array $data)
    {
        try {
            return KategoriKlinis::create([
                'nama_kategori_klinis'=>$this->formatNamaKategoriKlinis($data['nama_kategori_klinis']),
            ]);
        } catch (\Exception $e) {
            throw new \Exception('gagal menyimpan nama kategori klinis: ' . $e->getMessage());
        }
    }

    protected function formatNamaKategoriKlinis($nama)
    {
        return trim(ucwords(strtolower($nama)));
    }
}
