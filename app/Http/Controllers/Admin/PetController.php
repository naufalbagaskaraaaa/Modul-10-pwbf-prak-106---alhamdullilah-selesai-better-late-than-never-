<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pet;
use Illuminate\Http\Request;
use App\Models\Pemilik;
use App\Models\RasHewan;
use Illuminate\Support\Facades\DB;

class PetController extends Controller
{
    public function index()
    {
    $data = DB::table('pet')
        ->join('pemilik', 'pet.idpemilik', '=', 'pemilik.idpemilik')
        ->join('user', 'pemilik.iduser', '=', 'user.iduser')
        ->join('ras_hewan', 'pet.idras_hewan', '=', 'ras_hewan.idras_hewan')
        ->select(
            'pet.*', 
            'user.nama as nama_pemilik', 
            'ras_hewan.nama_ras as nama_ras'
        )
        ->get();

    return view('admin.pet.index', compact('data'));
    }

    public function create()
    {
        //$pemilik=Pemilik::all();

        $pemilik = DB::table('pemilik')
            ->join('user', 'pemilik.iduser', '=', 'user.iduser')
            ->select('pemilik.idpemilik', 'user.nama')
            ->get();

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

    public function edit($id)
    {
        $pet = DB::table('pet')->where('idpet', $id)->first();

        if (!$pet) {
            return redirect()->route('admin.pet.index')->with('error', 'Data pet tidak ditemukan!');
        }

        $pemilik = DB::table('pemilik')
            ->join('user', 'pemilik.iduser', '=', 'user.iduser')
            ->select('pemilik.idpemilik', 'user.nama')
            ->get();

        $rasHewan = DB::table('ras_hewan')->get();

        return view('admin.pet.edit', compact('pet', 'pemilik', 'rasHewan'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $this->validatePet($request);

        DB::table('pet')->where('idpet', $id)->update([
            'nama'          => $this->formatNamaPet($validatedData['nama']),
            'tanggal_lahir' => $validatedData['tanggal_lahir'],
            'warna_tanda'   => $this->formatNamaPet($validatedData['warna_tanda']),
            'jenis_kelamin' => $validatedData['jenis_kelamin'],
            'idpemilik'     => $validatedData['idpemilik'],
            'idras_hewan'   => $validatedData['idras_hewan'],
        ]);

        return redirect()->route('admin.pet.index')->with('success', 'Data pet berhasil diupdate!');
    }

    public function destroy($id)
    {
        try {
            DB::table('pet')->where('idpet', $id)->delete();
            return redirect()->route('admin.pet.index')->with('success', 'Data pet berhasil dihapus.');
        } catch (\Exception $e) {
            return redirect()->route('admin.pet.index')->with('error', 'Gagal hapus. Pet ini mungkin sudah punya rekam medis.');
        }
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
            'idras_hewan'=>[
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

            'idras_hewan.required'=>'nama ras hewan wajib diisi',
            'idras_hewan.integer'=>'tolong isi nama ras hewan, sesuai format yang ada',
            'idras_hewan.exists'=>'nama ras hewan tidak tersedia',
        ]);
    }

    protected function createPet(array $data)
    {
        try {
            //return Pet::create([
                //'nama'=>$this->formatNamaPet($data['nama']),
                //'tanggal_lahir'=>($data['tanggal_lahir']),
                //'warna_tanda'=>$this->formatNamaPet($data['warna_tanda']),
                //'jenis_kelamin'=>($data['jenis_kelamin']),
                //'idpemilik'=>($data['idpemilik']),
                //'idrashewan'=>($data['idrashewan']),
            
            return DB::table('pet')->insert([
            'nama' => $this->formatNamaPet($data['nama']),
            'tanggal_lahir' => $data['tanggal_lahir'],
            'warna_tanda' => $this->formatNamaPet($data['warna_tanda']),
            'jenis_kelamin' => $data['jenis_kelamin'],
            'idpemilik' => $data['idpemilik'],
            'idras_hewan'   => $data['idras_hewan'],

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
