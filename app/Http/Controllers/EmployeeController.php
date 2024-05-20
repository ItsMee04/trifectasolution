<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Profession;
use App\Models\Role;
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
}
