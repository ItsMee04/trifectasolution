<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function index()
    {
        if (Auth::user()->role_id == 1) {
            $user = DB::table('users')
                ->join('employee', 'users.employee_id', '=', 'employee.id')
                ->join('role', 'users.role_id', '=', 'role.id')
                ->get();

            return view('admin.user', ['user' => $user]);
        } else {
            $user = DB::table('users')
                ->join('employee', 'users.employee_id', '=', 'employee.id')
                ->join('role', 'users.role_id', '=', 'role.id')
                ->where('users.role_id', '!=', 1)
                ->get();

            return view('admin.user', ['user' => $user]);
        }
    }
}
