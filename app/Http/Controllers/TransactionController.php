<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function index()
    {
        $orders = Transaction::all();

        return view('admin.orders', ['orders' => $orders]);
    }
}
