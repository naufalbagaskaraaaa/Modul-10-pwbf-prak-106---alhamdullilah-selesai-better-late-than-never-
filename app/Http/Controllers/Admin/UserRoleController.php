<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\UserRole;
use Illuminate\Http\Request;

class UserRoleController extends Controller
{
    public function index()
    {
        $userRole = UserRole::all();
        return view('admin.user-role.index', compact('userRole'));
    }
}
