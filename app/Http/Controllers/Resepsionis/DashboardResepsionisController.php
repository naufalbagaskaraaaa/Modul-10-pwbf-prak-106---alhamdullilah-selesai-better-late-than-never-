<?php

namespace App\Http\Controllers\Resepsionis;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\RekamMedis;
use Illuminate\Support\Facades\DB;

class DashboardResepsionisController extends Controller
{
    public function index()
    {
        return view('resepsionis.dashboard-resepsionis');
    }

    public function showPendaftaran()
    {
        //$data_pendaftaran = RekamMedis::with('pet')->get();

        $data_pendaftaran = DB::table('rekam_medis')
            ->join('pet', 'rekam_medis.idpet', '=', 'pet.idpet')
            ->select(
                'rekam_medis.*', 
                'pet.nama as nama_hewan_peliharaan'
            )
            ->orderBy('rekam_medis.created_at', 'desc')
            ->get();

        return view('resepsionis.pendaftaran.pendaftaran', compact('data_pendaftaran'));
    }

    public function createPet()
    {
        $pemilik = DB::table('pemilik')
            ->join('user', 'pemilik.iduser', '=', 'user.iduser')
            ->select('pemilik.idpemilik', 'user.nama')
            ->get();

        $ras_hewan = DB::table('ras_hewan')->get();

        return view('resepsionis.pet.create', compact('pemilik', 'ras_hewan'));
    }

    public function storePet(Request $request)
    {
        $validatedData = $this->validatePet($request);

        $this->createPetData($validatedData);

        return redirect()->route('resepsionis.dashboard-resepsionis')
            ->with('success', 'Berhasil mendaftarkan hewan baru!');
    }

    public function indexPet()
    {
        $pets = DB::table('pet')
            ->join('pemilik', 'pet.idpemilik', '=', 'pemilik.idpemilik')
            ->join('user', 'pemilik.iduser', '=', 'user.iduser')
            ->join('ras_hewan', 'pet.idras_hewan', '=', 'ras_hewan.idras_hewan')
            ->select(
                'pet.*', 
                'user.nama as nama_pemilik', 
                'ras_hewan.nama_ras'
            )
            ->orderBy('pet.idpet', 'desc')
            ->get();

        return view('resepsionis.pet.index', compact('pets'));
    }

    public function editPet($id)
    {
        $pet = DB::table('pet')->where('idpet', $id)->first();

        if (!$pet) {
            return redirect()->route('resepsionis.pet.index')->with('error', 'Data hewan tidak ditemukan');
        }

        $pemilik = DB::table('pemilik')
            ->join('user', 'pemilik.iduser', '=', 'user.iduser')
            ->select('pemilik.idpemilik', 'user.nama')
            ->get();

        $ras_hewan = DB::table('ras_hewan')->get();

        return view('resepsionis.pet.edit', compact('pet', 'pemilik', 'ras_hewan'));
    }

    public function updatePet(Request $request, $id)
    {
        $validatedData = $this->validatePet($request);

        $this->updatePetData($validatedData, $id);

        return redirect()->route('resepsionis.pet.index')
            ->with('success', 'Data hewan berhasil diperbarui!');
    }

    public function destroyPet($id)
    {
        try {
            DB::table('pet')->where('idpet', $id)->delete();
            return redirect()->route('resepsionis.pet.index')
                ->with('success', 'Data hewan berhasil dihapus.');
        } catch (\Exception $e) {
            return redirect()->route('resepsionis.pet.index')
                ->with('error', 'Gagal menghapus (Mungkin data sedang dipakai di Rekam Medis).');
        }
    }

    protected function updatePetData(array $data, $id)
    {
        try {
            return DB::table('pet')->where('idpet', $id)->update([
                'nama'          => $this->formatPetText($data['nama']),
                'idpemilik'     => $data['idpemilik'],
                'idras_hewan'   => $data['idras_hewan'],
                'warna_tanda'   => $this->formatPetText($data['warna_tanda']),
                'jenis_kelamin' => $data['jenis_kelamin'],
            ]);
        } catch (\Exception $e) {
            throw new \Exception('Gagal update data pet: ' . $e->getMessage());
        }
    }

    public function indexPemilik()
    {
        $pemilik = DB::table('pemilik')
            ->join('user', 'pemilik.iduser', '=', 'user.iduser')
            ->select('pemilik.*', 'user.nama as nama_user', 'user.email')
            ->orderBy('pemilik.idpemilik', 'desc')
            ->get();

        return view('resepsionis.pemilik.index', compact('pemilik'));
    }

    public function createPemilik()
    {

        $users = DB::table('user')->orderBy('nama', 'asc')->get();

        return view('resepsionis.pemilik.create', compact('users'));
    }

    public function storePemilik(Request $request)
    {
        $validatedData = $this->validatePemilik($request);
        $this->createPemilikData($validatedData);

        return redirect()->route('resepsionis.pemilik.index')
            ->with('success', 'Data Pemilik berhasil ditambahkan!');
    }

    public function editPemilik($id)
    {
        $pemilik = DB::table('pemilik')->where('idpemilik', $id)->first();
        
        if (!$pemilik) {
            return redirect()->back()->with('error', 'Data tidak ditemukan');
        }

        $users = DB::table('user')->orderBy('nama', 'asc')->get();

        return view('resepsionis.pemilik.edit', compact('pemilik', 'users'));
    }

    public function updatePemilik(Request $request, $id)
    {
        $validatedData = $this->validatePemilik($request, $id);
        $this->updatePemilikData($validatedData, $id);

        return redirect()->route('resepsionis.pemilik.index')
            ->with('success', 'Data Pemilik berhasil diperbarui!');
    }

    public function destroyPemilik($id)
    {
        try {
            DB::table('pemilik')->where('idpemilik', $id)->delete();
            return redirect()->route('resepsionis.pemilik.index')
                ->with('success', 'Data Pemilik berhasil dihapus.');
        } catch (\Exception $e) {
            return redirect()->route('resepsionis.pemilik.index')
                ->with('error', 'Gagal hapus. Pemilik ini masih punya data hewan!');
        }
    }

    protected function createPemilikData(array $data)
    {
        DB::table('pemilik')->insert([
            'iduser' => $data['iduser'],
            'no_wa'  => $data['no_wa'],
            'alamat' => $data['alamat'],
        ]);
    }

    protected function updatePemilikData(array $data, $id)
    {
        DB::table('pemilik')->where('idpemilik', $id)->update([
            'iduser' => $data['iduser'],
            'no_wa'  => $data['no_wa'],
            'alamat' => $data['alamat'],
        ]);
    }

    public function indexTemu()
    {
        $temu_dokter = DB::table('rekam_medis')
            ->join('pet', 'rekam_medis.idpet', '=', 'pet.idpet')
            ->join('pemilik', 'pet.idpemilik', '=', 'pemilik.idpemilik')
            ->join('user', 'pemilik.iduser', '=', 'user.iduser')
            ->select(
                'rekam_medis.*',
                'pet.nama as nama_pet',
                'user.nama as nama_pemilik'
            )
            ->orderBy('rekam_medis.created_at', 'desc')
            ->get();

        return view('resepsionis.temu-dokter.index', compact('temu_dokter'));
    }

    public function createTemu()
    {
        $pets = DB::table('pet')
            ->join('pemilik', 'pet.idpemilik', '=', 'pemilik.idpemilik')
            ->join('user', 'pemilik.iduser', '=', 'user.iduser')
            ->select('pet.idpet', 'pet.nama', 'user.nama as nama_pemilik')
            ->orderBy('pet.nama', 'asc')
            ->get();

        return view('resepsionis.temu-dokter.create', compact('pets'));
    }

    public function storeTemu(Request $request)
    {
    $request->validate([
        'idpet' => 'required|exists:pet,idpet',
        'anamnesa' => 'required|string',
    ]);

    DB::table('rekam_medis')->insert([
        'idpet' => $request->idpet,
        'anamnesa' => $request->anamnesa,
        'created_at' => now(),
        'idreservasi_dokter' => null,
        'dokter_pemeriksa' => null,
        // Ubah 'pending' menjadi 'Pending' agar seragam
        'diagnosa' => 'Pending', 
    ]);

    return redirect()->route('resepsionis.temu-dokter.index')
        ->with('success', 'Pendaftaran berhasil dibuat!');
    }

    public function editTemu($id)
    {
        $temu = DB::table('rekam_medis')->where('idrekam_medis', $id)->first();
        
        if(!$temu) {
            return back()->with('error', 'Data tidak ditemukan');
        }

        $pets = DB::table('pet')
            ->join('pemilik', 'pet.idpemilik', '=', 'pemilik.idpemilik')
            ->join('user', 'pemilik.iduser', '=', 'user.iduser')
            ->select('pet.idpet', 'pet.nama', 'user.nama as nama_pemilik')
            ->get();

        return view('resepsionis.temu-dokter.edit', compact('temu', 'pets'));
    }

    public function updateTemu(Request $request, $id)
    {
        $request->validate([
            'idpet' => 'required',
            'anamnesa' => 'required',
        ]);

        DB::table('rekam_medis')->where('idrekam_medis', $id)->update([
            'idpet' => $request->idpet,
            'anamnesa' => $request->anamnesa,
        ]);

        return redirect()->route('resepsionis.temu-dokter.index')
            ->with('success', 'Data kunjungan berhasil diperbarui!');
    }

    public function destroyTemu($id)
    {
        DB::table('rekam_medis')->where('idrekam_medis', $id)->delete();
        return redirect()->route('resepsionis.temu-dokter.index')
            ->with('success', 'Data pendaftaran dihapus.');
    }

    protected function validatePet(Request $request)
    {
        return $request->validate([
            'nama' => [
                'required',
                'string',
                'min:3',
                'max:50'
            ],
            'idpemilik' => [
                'required',
                'integer',
                'exists:pemilik,idpemilik'
            ],
            'idras_hewan' => [
                'required',
                'integer',
                'exists:ras_hewan,idras_hewan'
            ],
            'warna_tanda' => [
                'required',
                'string',
                'max:45'
            ],
            'jenis_kelamin' => [
                'required',
                'in:J,B'
            ],
        ], [
            'nama.required'      => 'Nama hewan wajib diisi ya kak',
            'nama.min'           => 'Nama hewan minimal 3 karakter',
            'idpemilik.required' => 'Pilih dulu siapa pemiliknya',
            'idpemilik.exists'   => 'Pemilik tidak ditemukan di database',
            'idras_hewan.required' => 'Pilih jenis ras hewannya',
            'warna_tanda.required' => 'Warna atau ciri khas wajib diisi',
            'jenis_kelamin.in'   => 'Pilih jenis kelamin Jantan atau Betina'
        ]);
    }

    protected function validatePemilik(Request $request, $id = null)
    {
        $uniqueWa = $id 
            ? 'unique:pemilik,no_wa,' . $id . ',idpemilik' 
            : 'unique:pemilik,no_wa';

        return $request->validate([
            'iduser' => 'required|exists:user,iduser',
            'no_wa'  => ['required', 'string', 'max:15', 'min:10', $uniqueWa],
            'alamat' => 'required|string|max:255',
        ], [
            'iduser.required' => 'Pilih akun user untuk pemilik ini',
            'no_wa.unique'    => 'Nomor WA sudah terdaftar',
            'no_wa.min'       => 'Nomor WA terlalu pendek',
            'alamat.required' => 'Alamat wajib diisi'
        ]);
    }

    protected function createPetData(array $data)
    {
        try {
            return DB::table('pet')->insert([
                'nama'=>$this->formatPetText($data['nama']),
                'idpemilik'=>$data['idpemilik'],
                'idras_hewan'=>$data['idras_hewan'],
                'warna_tanda'=>$this->formatPetText($data['warna_tanda']),
                'jenis_kelamin'=>$data['jenis_kelamin'],
            ]);
        } catch (\Exception $e) {
            throw new \Exception('Gagal menyimpan data pet: ' . $e->getMessage());
        }
    }

    protected function formatPetText($nama)
    {
        return trim(ucwords(strtolower($nama)));
    }
}
