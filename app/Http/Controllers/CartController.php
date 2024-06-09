<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Type;
use App\Models\Product;
use App\Models\Customer;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index()
    {
        $type = Type::all();
        $typecincin    = Type::where('type', 'CINCIN')->first()->id;
        $typeanting    = Type::where('type', 'ANTING')->first()->id;
        $typegelang    = Type::where('type', 'GELANG')->first()->id;
        $typekalung    = Type::where('type', 'KALUNG')->first()->id;

        $productcincin  = Product::where('type_id', $typecincin)->where('status', 1)->get();
        $productanting      = Product::where('type_id', $typeanting)->where('status', 1)->get();
        $productgelang      = Product::where('type_id', $typegelang)->where('status', 1)->get();
        $productkalung      = Product::where('type_id', $typekalung)->where('status', 1)->get();
        $product            = Product::all();

        $customer = Customer::all();

        $id = "T-";
        $tahun = date('Y');

        $idTransaction = Transaction::latest()->first();

        if ($idTransaction == null) {
            $nourut = "000001";
            $idtransaksi = $id . $tahun . $nourut;
        } else {
            $nourut = substr($idTransaction->idtransaction, 6, 6) + 1;
            $nourut = str_pad($nourut, 6, "0", STR_PAD_LEFT);

            $idtransaksi = $id . $tahun . $nourut;
        }

        $count = Cart::where('users_id', Auth::user()->id)->where('status', 1)->count();

        $cartactive = Cart::where('users_id', Auth::user()->id)
            ->where('status', 1)
            ->latest('codecart')
            ->first();

        return view('admin.cart', [
            'type'          => $type,
            'typecincin'    => $typecincin,
            'typeanting'    => $typeanting,
            'typegelang'    => $typegelang,
            'typekalung'    => $typekalung,
            'productcincin' => $productcincin,
            'productanting' => $productanting,
            'productgelang' => $productgelang,
            'productkalung' => $productkalung,
            'customer'      => $customer,
            'product'       => $product,
            'idtransaksi'   => $idtransaksi,
            'count'         => $count,
        ]);
    }
}
