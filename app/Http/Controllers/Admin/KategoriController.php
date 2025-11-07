<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    public function index()
    {
        $kategori = Kategori::all();
        return view('admin.kategori.index', compact('kategori'));
    }

    public function create()
    {
        return view('admin.kategori.create');
    }

    public function store(Request $request)
    {
        $validatedData=$this->validateKategori($request); // ini helper validasi data

        $kategori=$this->createKategori($validatedData); // ini helper nyimpan data

        return redirect()->route('admin.kategori.index')
        ->with('sukses simpan, keren mas');
    }

    protected function validateKategori(Request $request, $id=null)
    {
        $uniqueRule=$id?
        'unique:kategori,nama_kategori,' . $id . ',idkategori' :
        'unique:kategori,nama_kategori';

        return $request->validate([
            'nama_kategori'=>[
                'required',
                'string',
                'max:255',
                'min:3',
                $uniqueRule
            ],
        ], [
            'nama_kategori.required'=>'nama kategori wajib diisi mas',
            'nama_kategori.string'=>'nama kategori harus berupa teks mas',
            'nama_kategori.max'=>'nama kategori maksimal 255 karakter',
            'nama_kategori.min'=>'nama kategori minimal 3 karakter',
            'nama_kategori.unique'=>'nama kategori udah ada itu',
        ]);
    }

    protected function createKategori(array $data)
    {
        try {
            return Kategori::create([
                'nama_kategori'=>$this->formatNamaKategori($data['nama_kategori']),
            ]);
        } catch (\Exception $e) {
            throw new \Exception('gagal menyimpan nama kategori: ' . $e->getMessage());
        }
    }

    protected function formatNamaKategori($nama)
    {
        return trim(ucwords(strtolower($nama)));
    }
}
