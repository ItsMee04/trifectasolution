<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Profession;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    //

    public function index()
    {
        return view('index');
    }

    public function login(Request $request)
    {
        $messages = [
            'required' => ':attribute wajib di isi !!!',
        ];

        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required',
        ], $messages);

        if (Auth::attempt($credentials)) {
            if (Auth::user()->status != 1) {
                return redirect('login')->with('errors-message', 'User Account Belum Aktif !');
            } else {
                if (Auth::user()->role_id == 1) {
                    $employee = Employee::where('id', Auth::user()->employee_id)->first()->name;
                    $avatar   = Employee::where('id', Auth::user()->employee_id)->first()->avatar;

                    $idprofession   = Employee::where('id', Auth::user()->employee_id)->first()->profession_id;
                    $profession     = Profession::where('id', $idprofession)->first()->profession;

                    $role   = Role::where('id', Auth::user()->role_id)->first()->role;

                    Session::put('name', $employee);
                    Session::put('avatar', $avatar);
                    Session::put('profession', $profession);
                    Session::put('role', $role);
                    return redirect('dashboard')->with('success-message', 'Login Berhasil');
                }
            }
        }

        return redirect('login')->with('errors-message', 'username atau password salah !');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        //mengarahkan ke halaman login
        return redirect('login');
    }
}
