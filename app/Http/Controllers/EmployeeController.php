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

            $employee = Employee::all();
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
            $newSignature = $request->employeename . 'signature' . '-' . now()->timestamp . '.' . $extension;
            $request->file('employeesignature')->storeAs('employeesignature', $newSignature);
            $request['employeesignature'] = $newSignature;

            $extension = $request->file('employeeavatar')->getClientOriginalExtension();
            $newAvatar = $request->employeename . 'avatar' . '-' . now()->timestamp . '.' . $extension;
            $request->file('employeeavatar')->storeAs('employeeavatar', $newAvatar);
            $request['employeeavatar'] = $newAvatar;
        }
    }
}
