<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function index()
    {
        $orders = Transaction::all();

        return view('admin.orders', ['orders' => $orders]);
    }

    public function detailOrders($id)
    {
        $orders     = Transaction::where('transaction_id', $id)->first();
        $cart_id    = Transaction::where('transaction_id', $id)->first()->cart_id;

        $order      = Cart::where('codecart', $cart_id)->get();
        $subtotal   = Cart::where('codecart', $cart_id)->sum('total');

        return view('admin.detail-orders', ['orders' => $orders, 'order' => $order, 'subtotal' => $subtotal]);
    }

    public function confirm($id)
    {
        Transaction::where('id', $id)
            ->update([
                'status'    => 2,
            ]);

        return redirect('orders')->with('success-message', 'Payments Confirmed');
    }
}
