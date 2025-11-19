<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\KodeTindakanTerapi;
use Illuminate\Http\Request;
use App\Models\Kategori;
use App\Models\KategoriKlinis;

class KodeTindakanTerapiController extends Controller
{
    public function index()
    {
        $kodeTindakanTerapi = KodeTindakanTerapi::all();
        return view('admin.kode-tindakan-terapi.index', compact('kodeTindakanTerapi'));
    }

    public function create()
    {
        $kategori=Kategori::all();
        $kategoriKlinis=KategoriKlinis::all();
        return view('admin.kode-tindakan-terapi.create', compact('kategori', 'kategoriKlinis'));
    }

    public function store(Request $request)
    {
        $validatedData=$this->validateKodeTindakanTerapi($request);

        $kodeTindakanTerapi=$this->createKodeTindakanTerapi($validatedData);

            return redirect()->route('admin.kode-tindakan-terapi.index')
            ->with('sukses menambahkan data');
    }

    protected function validateKodeTindakanTerapi(Request $request, $id=null)
    {
        $uniqueRule=$id?
        'unique:kode_tindakan_terapi,kode,' . $id . ',idkode_tindakan_terapi' :
        'unique:kode_tindakan_terapi,kode';

        return $request->validate([
            'kode'=>[
                'required',
                'string', 
                // ini saya agak bingung harus diisi apa validasinya karena di db tipe datanya varchar
                'max:3',
                'min:3',
                $uniqueRule
            ], 
            'deskripsi_tindakan_terapi'=>[
                'required',
                'string',
                'max:1000',
                'min:1',
            ],
            'idkategori'=>[
                'required',
                'integer',
                'exists:kategori,idkategori'
            ],
            'idkategori_klinis'=>[
                'required',
                'integer',
                'exists:kategori_klinis,idkategori_klinis'
            ]
        ],  [
            'kode.required'=>'kode tindakan terapi wajib diisi mas',
            'kode.string'=>'kode tindakan terapi harap isi sesuai standart yang berlaku di tempat kerja anda',
            // saya agak bingung disini karena berupa varchar jadi kalau user ngasal masih bisa masuk datanya
            'kode.max'=>'kode tindakan terapi maksimal 3 karakter',
            'kode.min'=>'kode tindakan terapi minimal 3 karakter, jadi gak boleh kosong mas',
            'kode.unique'=>'kode tindakan terapi udah ada itu',

            'deskripsi_tindakan_terapi.required'=>'untuk deskripsi tindakan terapi wajib diisi mas',
            'deskripsi_tindakan_terapi.string'=>'untuk deskripsi tindakan terapi harap isi sesuai standart yang berlaku di tempat kerja anda',
            'deskripsi_tindakan_terapi.max'=>'deskripsi tindakan terapi maksimal 1000 karakter',
            'deskripsi_tindakan_terapi.min'=>'untuk deskripsi tindakan terapi wajib diisi mas',

            'idkategori.required'=>'error, kategorinya gaada',
            'idkategori.integer'=>'error, kategorinya tidak sesuai format',
            'idkategori.exists'=>'error, kategorinya gaada', // maaf pak jika dirasa pesa errornya tidak pantas

            'idkategori_klinis.required'=>'error, kategori klinis gaada',
            'idkategori_klinis.integer'=>'error, kategori klinis tidak sesuai format',
            'idkategori_klinis.exists'=>'error, kategori klinis gaada',
        ]);
    }

    protected function createKodeTindakanTerapi(array $data)
    {
        try {
            return KodeTindakanTerapi::create([
                'kode'=>$this->formatKodeTindakanTerapi($data['kode']),
                'deskripsi_tindakan_terapi'=>$this->formatKodeTindakanTerapi($data['deskripsi_tindakan_terapi']),
                'idkategori'=>($data['idkategori']),
                'idkategori_klinis'=>($data['idkategori_klinis']),
            ]);
        } catch (\Exception $e) {
            throw new \Exception('gagal menyimpan kode tindakan terapi: ' . $e->getMessage());
        }
    }

    protected function formatKodeTindakanTerapi($nama)
    {
        return trim(ucwords(strtolower($nama)));
    }
}
