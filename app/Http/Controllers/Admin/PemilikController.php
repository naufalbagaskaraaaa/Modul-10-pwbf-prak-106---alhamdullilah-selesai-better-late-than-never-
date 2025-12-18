<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pemilik;
use Illuminate\Http\Request;
use app\Models\User;
use Illuminate\Support\Facades\DB;

class PemilikController extends Controller
{
    public function index()
    {
        //$pemilik = Pemilik::all();

        $pemilik = DB::table('pemilik')
            ->join('user', 'pemilik.iduser', '=', 'user.iduser')
            ->select('pemilik.*', 'user.nama', 'user.email')
            ->get();

        return view('admin.pemilik.index', compact('pemilik'));
    }

    public function create()
    {
        $user=User::all();
        return view('admin.pemilik.create', compact('user'));
    }

    public function store(Request $request)
    {
        $validatedData=$this->validatePemilik($request);

        $pemilik=$this->createPemilik($validatedData);

        return redirect()->route('admin.pemilik.index')->with('selamat data pemilik sudah berhasil ditambakan');
    }

    public function edit($id)
    {
        $pemilik = DB::table('pemilik')->where('idpemilik', $id)->first();
        
        if(!$pemilik) return back()->with('error', 'Data tidak ditemukan');

        $users = DB::table('user')->orderBy('nama', 'asc')->get();

        return view('admin.pemilik.edit', compact('pemilik', 'users'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $this->validatePemilik($request, $id);

        DB::table('pemilik')->where('idpemilik', $id)->update([
            'no_wa'  => $validatedData['no_wa'],
            'alamat' => $this->formatAlamat($validatedData['alamat']),
            'iduser' => $validatedData['iduser'],
        ]);

        return redirect()->route('admin.pemilik.index')
            ->with('success', 'Data pemilik berhasil diupdate!');
    }

    public function destroy($id)
    {
        try {
            DB::table('pemilik')->where('idpemilik', $id)->delete();
            return redirect()->route('admin.pemilik.index')->with('success', 'Data pemilik dihapus.');
        } catch (\Exception $e) {
            return redirect()->route('admin.pemilik.index')->with('error', 'Gagal hapus. Pemilik ini masih punya hewan peliharaan (Pet).');
        }
    }

    protected function validatePemilik(Request $request, $id=null)
    {
        $uniqueRule=$id?
        'unique:pemilik,no_wa' . $id . ',idpemilik' :
        'unique:pemilik,no_wa';

        return $request->validate([
            'no_wa'=>[
                'required',
                'string',
                'max:45',
                'min:11',
                $uniqueRule,
            ],
            'alamat'=>[
                'required',
                'string',
                'max:100',
                'min:1',
            ],
            'iduser'=>[
                'required',
                'integer',
                'exists:user,iduser'
            ],
        ], [
            'no_wa.required'=>'tolong isi nomer whatsapp anda',
            'no_wa.string'=>'tolong isi nomer whatsapp anda, sesuai format yang diinstruksikan',
            'no_wa.max'=>'nomer whatsapp makismal adalah 45 karakter bung :)',
            'no_wa.min'=>'tolong isi nomer whatsapp anda dengan benar',

            'alamat.required'=>'tolong isi alamat anda',
            'alamat.string'=>'tolong isi alamat anda, sesuai format yang diinstruksikan',
            'alamat.max'=>'pengisisan alamat makismal adalah 45 karakter bung :)',
            'alamat.min'=>'tolong isi alamat anda dengan benar',

            'iduser.required'=>'error, iduser tidak ditemukan',
            'iduser.string'=>'error, iduser tidak sesuai format',
            'iduser.exists'=>'error, iduser tidak ditemukan',
        ]);
    }

    protected function createPemilik(array $data)
    {
        try {
            return Pemilik::create([
                'no_wa'=>$this->formatPemilik($data['no_wa']),
                'alamat'=>$this->formatPemilik($data['alamat']),
                'iduser'=>($data['iduser']),
            ]);
        } catch (\Exception $e) {
            throw new \Exception('gagal menyimpan data pemilik: ' . $e->getMessage());
        }
    }

    protected function formatPemilik($nama)
    {
        return trim(ucwords(strtolower($nama)));
    }
}
