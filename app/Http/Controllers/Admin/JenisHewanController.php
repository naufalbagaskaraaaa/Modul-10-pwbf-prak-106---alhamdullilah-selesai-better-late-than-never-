<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\JenisHewan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class JenisHewanController extends Controller
{
    public function index()
    {
        //$jenisHewan = JenisHewan::all();

        $jenisHewan=DB::table('jenis_hewan')
        ->select('idjenis_hewan', 'nama_jenis_hewan')
        ->get();

        return view('admin.jenis-hewan.index', compact('jenisHewan'));
    }

    public function create()
    {
        return view('admin.jenis-hewan.create');
    }

    public function store(Request $request)
    {
        $validatedData=$this->validateJenisHewan($request);

        $jenisHewan=$this->createJenisHewan($validatedData);

        return redirect()->route('admin.jenis-hewan.index')
                        ->with('succes', 'keren mas sampean');
    }

    public function edit($id)
    {
        $jenisHewan = DB::table('jenis_hewan')->where('idjenis_hewan', $id)->first();
        
        return view('admin.jenis-hewan.edit', compact('jenisHewan'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $this->validateJenisHewan($request, $id);

        DB::table('jenis_hewan')->where('idjenis_hewan', $id)->update([
            'nama_jenis_hewan' => $this->formatNamaJenisHewan($validatedData['nama_jenis_hewan'])
        ]);

        return redirect()->route('admin.jenis-hewan.index')
            ->with('success', 'Data berhasil diupdate!');
    }

    public function destroy($id)
    {
        DB::table('jenis_hewan')->where('idjenis_hewan', $id)->delete();

        return redirect()->route('admin.jenis-hewan.index')
            ->with('success', 'Data berhasil dihapus.');
    }

    protected function validateJenisHewan(Request $request, $id=null)
    {
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

    protected function createJenisHewan(array $data)
    {
        try {
            //return JenisHewan::create([
              //  'nama_jenis_hewan'=>$this->formatNamaJenisHewan($data['nama_jenis_hewan']),
            //]);

            $jenisHewan=DB::table('jenis_hewan')->insert([
                'nama_jenis_hewan'=>$this->formatNamaJenisHewan($data['nama_jenis_hewan']),
        ]);

        return $jenisHewan;
        } catch (\Exception $e) {
            throw new \Exception('gagal simpan data jenis hewan: ' . $e->getMessage());
        }
    }

    protected function formatNamaJenisHewan($nama)
    {
        return trim(ucwords(strtolower($nama)));
    }
}
