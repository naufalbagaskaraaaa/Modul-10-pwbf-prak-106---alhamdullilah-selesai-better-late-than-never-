<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RoleController extends Controller
{
    public function index()
    {
        //$role=Role::all();
        $role = DB::table('role')->get();
        return view('admin.role.index', compact('role'));
    }

    public function create()
    {
        return view('admin.role.create');
    }

    public function store(Request $request)
    {
        $request->validate(['nama_role' => 'required|unique:role,nama_role']);
        
        DB::table('role')->insert([
            'nama_role' => ucwords(strtolower($request->nama_role))
        ]);

        return redirect()->route('admin.role.index')->with('success', 'Role baru ditambahkan.');
    }

    public function edit($id)
    {
        $role = DB::table('role')->where('idrole', $id)->first();
        return view('admin.role.edit', compact('role'));
    }

    public function update(Request $request, $id)
    {
        $request->validate(['nama_role' => 'required|unique:role,nama_role,'.$id.',idrole']);

        DB::table('role')->where('idrole', $id)->update([
            'nama_role' => ucwords(strtolower($request->nama_role))
        ]);

        return redirect()->route('admin.role.index')->with('success', 'Role diupdate.');
    }

    public function destroy($id)
    {
        try {
            DB::table('role')->where('idrole', $id)->delete();
            return redirect()->route('admin.role.index')->with('success', 'Role dihapus.');
        } catch (\Exception $e) {
            return redirect()->route('admin.role.index')->with('error', 'Role ini sedang aktif dipakai user.');
        }
    }
}