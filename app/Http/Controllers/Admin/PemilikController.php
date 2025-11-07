<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pemilik;
use Illuminate\Http\Request;

class PemilikController extends Controller
{
    public function index()
    {
        $pemilik = Pemilik::all();
        return view('admin.pemilik.index', compact('pemilik'));
    }

    public function create()
    {
        return view('admin.pemilik.create');
    }

    public function store(Request $request)
    {
        $validatedData=$this->validatePemilik($request);

        $pemilik=$this->createPemilik($validatedData);

        return redirect()->route('admin.pemilik.index')->with('selamat data pemilik sudah berhasil ditambakan');
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
                'biginteger',
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
}
