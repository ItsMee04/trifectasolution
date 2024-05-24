<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redis;

class UserController extends Controller
{
    public function index()
    {
        if (Auth::user()->role_id == 1) {
            $role = Role::all();
            $user = DB::table('users')
                ->select('users.*', 'employee.name', 'employee.avatar', 'role.id as roleid', 'role.role')
                ->join('employee', 'users.employee_id', '=', 'employee.id')
                ->join('role', 'users.role_id', '=', 'role.id')
                ->get();

            return view('admin.user', ['user' => $user, 'role' => $role]);
        } else {
            $user = DB::table('users')
                ->join('employee', 'users.employee_id', '=', 'employee.id')
                ->join('role', 'users.role_id', '=', 'role.id')
                ->where('users.role_id', '!=', 1)
                ->get();

            return view('admin.user', ['user' => $user]);
        }
    }

    public function store(Request $request, $id)
    {
        $messages = [
            'required' => ':attribute wajib di isi !!!',
        ];

        $credentials = $request->validate([
            'username'  => 'required',
            'password'  => 'required',
            'role'      => 'required',
        ], $messages);

        $users = User::where('employee_id', $id)->count();

        if ($users == 1) {
            return redirect('users')->with('errors-message', 'Account sudah dibuat !!');
        } else {
            User::create([
                'employee_id'   => $id,
                'username'      => $request->username,
                'password'      => Hash::make($request->password),
                'role_id'          => $request->role,
                'status'        => 2
            ]);
        }
        return redirect('employee')->with('success-message', 'Data Success Disimpan !');
    }

    public function update(Request $request, $id)
    {
        $users = User::where('id', $id)->first();

        $messages = [
            'required' => ':attribute wajib di isi !!!',
        ];

        $credentials = $request->validate([
            'username'  => 'required',
            'password'  => 'required',
            'role'      => 'required',
        ], $messages);

        if ($request->password) {

            User::where('id', $id)
                ->update([
                    'username'  => $request->username,
                    'password'  => Hash::make($request->password),
                    'role_id'   => $request->role,
                    'status'    => $request->status
                ]);

            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
            return redirect('login');
        } else {
            User::where('id', $id)
                ->update([
                    'username'  => $request->username,
                    'role_id'      => $request->role,
                    'status'    => $request->status
                ]);
        }

        return redirect('users')->with('success-message', 'Data Success Diupdate !');
    }
}
