<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Profession;
use App\Models\Role;
use Illuminate\Auth\Events\Attempting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EmployeeController extends Controller
{
    public function index()
    {

        if (Auth::user()->role_id == 1) {

            $employee = Employee::orderBy('id', 'asc')->get();
            $profession = Profession::all();

            return view('admin.employee', ['listemployee' => $employee, 'profession' => $profession]);
        } elseif (Auth::user()->role_id == 2) {

            return view('kepala.employee');
        }
    }

    public function store(Request $request)
    {
        $messages = [
            'required' => ':attribute wajib di isi !!!',
        ];

        $credentials = $request->validate([
            'name'      => 'required',
            'phone'     => 'required',
            'profession'    =>  'required',
            'address'   =>  'required',
            'status'    =>  'required'
        ], $messages);

        $newSignature = '';
        $newAvatar = '';

        if ($request->file('signature') && $request->file('avatar')) {

            $extension = $request->file('signature')->getClientOriginalExtension();
            $newSignature = $request->name . 'signature' . '-' . now()->timestamp . '.' . $extension;
            $request->file('signature')->storeAs('signature', $newSignature);
            $request['signature'] = $newSignature;

            $extension = $request->file('avatar')->getClientOriginalExtension();
            $newAvatar = $request->name . 'avatar' . '-' . now()->timestamp . '.' . $extension;
            $request->file('avatar')->storeAs('avatar', $newAvatar);
            $request['avatar'] = $newAvatar;

            Employee::create([
                'name'  =>  $request->name,
                'phone' =>  $request->phone,
                'profession_id' =>  $request->profession,
                'address'   =>  $request->address,
                'status'    =>  $request->status,
                'avatar'    =>  $newAvatar,
                'signature' =>  $newSignature
            ]);
        }
        return redirect('employee')->with('success-message', 'Data Success Di Simpan !');
    }
}
