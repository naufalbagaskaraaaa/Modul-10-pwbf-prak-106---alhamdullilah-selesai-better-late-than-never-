<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\UserRole;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserRoleController extends Controller
{
    public function index()
    {
        //$userRole=UserRole::all();
        $userRole = DB::table('role_user')
            ->join('user', 'role_user.iduser', '=', 'user.iduser')
            ->join('role', 'role_user.idrole', '=', 'role.idrole')
            ->select('role_user.*', 'user.nama as nama_user', 'role.nama_role')
            ->orderBy('user.nama', 'asc')
            ->get();

        return view('admin.user-role.index', compact('userRole'));
    }

    public function create()
    {
        $users = DB::table('user')->orderBy('nama')->get();
        $roles = DB::table('role')->orderBy('nama_role')->get();
        return view('admin.user-role.create', compact('users', 'roles'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'iduser' => 'required|exists:user,iduser',
            'idrole' => 'required|exists:role,idrole',
            'status' => 'required|boolean'
        ]);

        $exists = DB::table('role_user')
            ->where('iduser', $request->iduser)
            ->where('idrole', $request->idrole)
            ->exists();

        if ($exists) {
            return back()->with('error', 'User tersebut sudah memiliki role ini!');
        }

        DB::table('role_user')->insert([
            'iduser' => $request->iduser,
            'idrole' => $request->idrole,
            'status' => $request->status
        ]);

        return redirect()->route('admin.user-role.index')->with('success', 'Hak akses berhasil diberikan!');
    }

    public function edit($id)
    {
        $userRole = DB::table('role_user')->where('idrole_user', $id)->first();
        if(!$userRole) return back();

        $users = DB::table('user')->orderBy('nama')->get();
        $roles = DB::table('role')->orderBy('nama_role')->get();

        return view('admin.user-role.edit', compact('userRole', 'users', 'roles'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'iduser' => 'required',
            'idrole' => 'required',
            'status' => 'required'
        ]);

        DB::table('role_user')->where('idrole_user', $id)->update([
            'iduser' => $request->iduser,
            'idrole' => $request->idrole,
            'status' => $request->status
        ]);

        return redirect()->route('admin.user-role.index')->with('success', 'Hak akses diperbarui.');
    }

    public function destroy($id)
    {
        DB::table('role_user')->where('idrole_user', $id)->delete();
        return redirect()->route('admin.user-role.index')->with('success', 'Hak akses dicabut.');
    }
}