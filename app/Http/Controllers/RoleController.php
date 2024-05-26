<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoleController extends Controller
{
    public function index()
    {
        $role = Role::all();
        return view('admin.role', ["role" => $role]);
    }

    public function store(Request $request)
    {
        $messages = [
            'required' => ':attribute wajib di isi !!!',
        ];

        $credentials = $request->validate([
            'role'          => 'required',
            'status'        => 'required',
        ], $messages);

        Role::create([
            'role'    => $request->role,
            'status'        => $request->status
        ]);

        return redirect('role')->with('success-message', 'Data Success Disimpan !');
    }

    public function update(Request $request, $id)
    {
        $messages = [
            'required' => ':attribute wajib di isi !!!',
        ];

        $credentials = $request->validate([
            'role'          => 'required',
            'status'        => 'required',
        ], $messages);

        Role::where('id', $id)
            ->update([
                'role'    => $request->role,
                'status'        => $request->status
            ]);

        return redirect('role')->with('success-message', 'Data Success Diupdate !');
    }

    public function delete(Request $request, $id)
    {
        $ceklogin = Auth::user()->role_id;
        if ($ceklogin == $id) {
            Role::where('id', $id)->delete();

            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();

            return redirect('login');
        } else {
            Role::where('id', $id)->delete();
        }

        return redirect('role')->with('success-message', 'Data Success Dihapus !');
    }
}
