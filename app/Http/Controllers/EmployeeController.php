<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\Employee;
use App\Models\Profession;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Redis;
use Illuminate\Auth\Events\Attempting;

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
            'mimes'    => ':attribute format wajib menggunakan PNG/JPG'
        ];

        $credentials = $request->validate([
            'name'          => 'required',
            'phone'         => 'required',
            'profession'    => 'required',
            'address'       => 'required',
            'status'        => 'required',
            'signature'     => 'mimes:png,jpg,jpeg',
            'avatar'        => 'mimes:png,jpg,jpeg',
        ], $messages);

        $newSignature = '';
        $newAvatar = '';

        if ($request->file('signature') && $request->file('avatar')) {

            $extension = $request->file('signature')->getClientOriginalExtension();
            $newSignature = $request->name . 'signature' . '-' . now()->timestamp . '.' . $extension;
            $request->file('signature')->storeAs('Signature', $newSignature);
            $request['signature'] = $newSignature;

            $extension = $request->file('avatar')->getClientOriginalExtension();
            $newAvatar = $request->name . 'avatar' . '-' . now()->timestamp . '.' . $extension;
            $request->file('avatar')->storeAs('Avatar', $newAvatar);
            $request['avatar'] = $newAvatar;

            Employee::create([
                'name'          => $request->name,
                'address'       => $request->address,
                'phone'         => $request->phone,
                'profession_id' => $request->profession,
                'status'        => $request->status,
                'signature'     => $newSignature,
                'avatar'        => $newAvatar,
            ]);
        } elseif ($request->file('signature')) {
            $extension = $request->file('signature')->getClientOriginalExtension();
            $newSignature = $request->name . 'signature' . '-' . now()->timestamp . '.' . $extension;
            $request->file('signature')->storeAs('Signature', $newSignature);
            $request['signature'] = $newSignature;

            Employee::create([
                'name'          => $request->name,
                'address'       => $request->address,
                'phone'         => $request->phone,
                'profession_id' => $request->profession,
                'status'        => $request->status,
                'signature'     => $newSignature,
            ]);
        } elseif ($request->file('avatar')) {
            $extension = $request->file('avatar')->getClientOriginalExtension();
            $newAvatar = $request->name . 'avatar' . '-' . now()->timestamp . '.' . $extension;
            $request->file('avatar')->storeAs('Avatar', $newAvatar);
            $request['avatar'] = $newAvatar;

            Employee::create([
                'name'          => $request->name,
                'address'       => $request->address,
                'phone'         => $request->phone,
                'profession_id' => $request->profession,
                'status'        => $request->status,
                'avatar'        => $newAvatar,
            ]);
        } else {
            Employee::create([
                'name'          => $request->name,
                'address'       => $request->address,
                'phone'         => $request->phone,
                'profession_id' => $request->profession,
                'status'        => $request->status
            ]);
        }
        return redirect('employee')->with('success-message', 'Data Success Di Simpan !');
    }

    public function update(Request $request, $id)
    {
        $employee = Employee::where('id', $id)->first();

        $messages = [
            'required' => ':attribute wajib di isi !!!',
            'mimes'    => ':attribute format wajib menggunakan PNG/JPG'
        ];

        $credentials = $request->validate([
            'name'          => 'required',
            'phone'         => 'required',
            'profession'    => 'required',
            'address'       => 'required',
            'status'        => 'required',
            'signature'     => 'mimes:png,jpg,jpeg',
            'avatar'        => 'mimes:png,jpg,jpeg',
        ], $messages);

        if ($request->file('signature') && $request->file('avatar')) {

            $pathsignature  = 'storage/Signature/' . $employee->signature;
            $pathavatar     = 'storage/Avatar/' . $employee->avatar;

            if (File::exists($pathsignature, $pathavatar)) {
                File::delete($pathsignature, $pathavatar);
            }

            $extension = $request->file('signature')->getClientOriginalExtension();
            $newSignature = $request->name . 'signature' . '-' . now()->timestamp . '.' . $extension;
            $request->file('signature')->storeAs('Signature', $newSignature);
            $request['signature'] = $newSignature;

            $extension = $request->file('avatar')->getClientOriginalExtension();
            $newAvatar = $request->name . 'avatar' . '-' . now()->timestamp . '.' . $extension;
            $request->file('avatar')->storeAs('Avatar', $newAvatar);
            $request['avatar'] = $newAvatar;

            Employee::where('id', $id)
                ->update([
                    'name'          => $request->name,
                    'address'       => $request->address,
                    'phone'         => $request->phone,
                    'profession_id' => $request->profession,
                    'status'        => $request->status,
                    'signature'     => $newSignature,
                    'avatar'        => $newAvatar,
                ]);
        } elseif ($request->file('signature')) {
            $pathsignature  = 'storage/Signature/' . $employee->signature;

            if (File::exists($pathsignature)) {
                File::delete($pathsignature);
            }

            $extension = $request->file('signature')->getClientOriginalExtension();
            $newSignature = $request->name . 'signature' . '-' . now()->timestamp . '.' . $extension;
            $request->file('signature')->storeAs('Signature', $newSignature);
            $request['signature'] = $newSignature;

            Employee::where('id', $id)
                ->update([
                    'name'          => $request->name,
                    'address'       => $request->address,
                    'phone'         => $request->phone,
                    'profession_id' => $request->profession,
                    'status'        => $request->status,
                    'signature'     => $newSignature,
                ]);
        } elseif ($request->file('avatar')) {
            $pathavatar     = 'storage/Avatar/' . $employee->avatar;

            if (File::exists($pathavatar)) {
                File::delete($pathavatar);
            }

            $extension = $request->file('avatar')->getClientOriginalExtension();
            $newAvatar = $request->employeename . 'avatar' . '-' . now()->timestamp . '.' . $extension;
            $request->file('avatar')->storeAs('Avatar', $newAvatar);
            $request['avatar'] = $newAvatar;

            Employee::where('id', $id)
                ->update([
                    'name'          => $request->name,
                    'address'       => $request->address,
                    'phone'         => $request->phone,
                    'profession_id' => $request->profession,
                    'status'        => $request->status,
                    'avatar'        => $newAvatar,
                ]);
        } else {
            Employee::where('id', $id)
                ->update([
                    'name'          => $request->name,
                    'address'       => $request->address,
                    'phone'         => $request->phone,
                    'profession_id' => $request->profession,
                    'status'        => $request->status
                ]);
        }
        return redirect('employee')->with('success-message', 'Data Success Di Update !');
    }

    public function show(Request $request, $id)
    {
        $employee = Employee::where('id', $id)->first();
        return view('admin.edmployee-detail', ['employee' => $employee]);
    }
}
