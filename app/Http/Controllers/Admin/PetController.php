<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pet;
use Illuminate\Http\Request;
use App\Models\Pemilik;
use App\Models\RasHewan;

class PetController extends Controller
{
    public function index()
    {
        $pet = Pet::all();
        return view('admin.pet.index', compact('pet'));
    }

    public function create()
    {
        $pemilik=Pemilik::all();
        $rasHewan=RasHewan::all();
        return view('admin.pet.create', compact('pemilik', 'rasHewan'));
    }

    public function store(Request $request)
    {
        $validatedData=$this->validatePet($request);
        // dd($validatedData);
        $this->createPet($validatedData);

        return redirect()->route('admin.pet.index')->with('keren mas, behasil');
    }

    protected function validatePet (Request $request, $id=null)
    {

        return $request->validate([
            'nama'=>[
                'required',
                'string',
                'max:100',
            ],
            'tanggal_lahir'=>[
                'required',
                'date',
                'before_or_equal:today',
            ],
            'warna_tanda'=>[
                'required',
                'string',
                'max:45',
            ],
            'jenis_kelamin'=>[
                'required',
                'in:B,J',
            ],
            'idpemilik'=>[
                'required',
                'integer',
                'exists:pemilik,idpemilik',
            ],
            'idrashewan'=>[
                'required',
                'integer',
                'exists:ras_hewan,idras_hewan',
            ],
        ],[
            'nama.required'=>'nama pet wajib diisi',
            'nama.string'=>'tolong isi nama pet anda, sesuai format yang diinstruksikan',
            'nama.max'=>'nama pet maksimal adalah 100 karakter bung :)',

            'tanggal_lahir.required'=>'tanggal_lahir pet wajib diisi',
            'tanggal_lahir.date'=>'tolong isi tanggal_lahir pet anda, sesuai format yang diinstruksikan',
            'tanggal_lahir.before_or_equal'=>'tanggal_lahir tidak valid',

            'warna_tanda.required'=>'warna_tanda pet wajib diisi',
            'warna_tanda.string'=>'tolong isi warna_tanda pet anda, sesuai format yang diinstruksikan',
            'warna_tanda.max'=>'warna_tanda pet maksimal adalah 45 karakter bung :)',

            'jenis_kelamin.required'=>'jenis_kelamin pet wajib diisi',
            'jenis_kelamin.in'=>'tolong isi jenis_kelamin pet anda, sesuai format yang ada',

            'idpemilik.required'=>'nama pemilik wajib diisi',
            'idpemilik.integer'=>'tolong isi nama pemilik, sesuai format yang ada',
            'idpemilik.exists'=>'nama pemilik tidak tersedia',

            'idrashewan.required'=>'nama ras hewan wajib diisi',
            'idrashewan.integer'=>'tolong isi nama ras hewan, sesuai format yang ada',
            'idrashewan.exists'=>'nama ras hewan tidak tersedia',
        ]);
    }

    protected function createPet(array $data)
    {
        try {
            return Pet::create([
                'nama'=>$this->formatNamaPet($data['nama']),
                'tanggal_lahir'=>($data['tanggal_lahir']),
                'warna_tanda'=>$this->formatNamaPet($data['warna_tanda']),
                'jenis_kelamin'=>($data['jenis_kelamin']),
                'idpemilik'=>($data['idpemilik']),
                'idrashewan'=>($data['idrashewan']),
            ]);
        } catch (\Exception $e) {
            throw new \Exception('gagal simpen di pet mas awokwok: ' . $e->getMessage());
        }
    }
    
    protected function formatNamaPet($nama)
    {
        return trim(ucwords(strtolower($nama)));
    }
}
