<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EmployeeController extends Controller
{
    public function index()
    {

        if (Auth::user()->role_id == 1) {
            $employee = Employee::all();
            return view('admin.employee', ['listemployee' => $employee]);
        } elseif (Auth::user()->role_id == 2) {
            return view('kepala.employee');
        }
    }
}
