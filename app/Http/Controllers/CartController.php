<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Type;
use App\Models\Product;
use App\Models\Customer;
use App\Models\Discount;
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

        $cart  = Cart::where('status', 1)->where('users_id', Auth::user()->id)->get();

        $discount = Discount::where('status', 1)->get();

        $total = Cart::leftjoin('product', 'cart.product_id', 'product.id')
            ->select('product.sellingprice', 'product.weight')
            ->where('cart.status', 1)
            ->where('cart.users_id', Auth::user()->id)
            ->sum(DB::raw('product.sellingprice * product.weight'));

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
            'cartactive'    => $cartactive,
            'cart'          => $cart,
            'discount'      => $discount,
            'total'         => $total
        ]);
    }

    public function addcart($id)
    {
        $product = Product::where('codeproduct', $id)->first()->id;
        $codecart = Cart::latest('codecart')->first();

        $id = "C-";
        $tahun = date('Y');

        if ($codecart == null) {
            $nourut = "000001";
            $idcart = $id . $tahun . $nourut;

            Cart::create([
                'codecart'      =>  $idcart,
                'product_id'    =>  $product,
                'status'        =>  1,
                'users_id'      =>  Auth::user()->id,
            ]);
        } elseif ($codecart->status == 1) {
            $nourut = substr($codecart->codecart, 6, 6);
            $idcart = $id . $tahun . $nourut;

            Cart::create([
                'codecart'      =>  $idcart,
                'product_id'    =>  $product,
                'status'        =>  1,
                'users_id'      =>  Auth::user()->id,
            ]);
        } elseif ($codecart->status == 2) {
            $nourut = substr($codecart->codecart, 6, 6) + 1;
            $nourut = str_pad($nourut, 6, "0", STR_PAD_LEFT);
            $idcart = $id . $tahun . $nourut;

            Cart::create([
                'codecart'      =>  $idcart,
                'product_id'    =>  $product,
                'status'        =>  1,
                'users_id'      =>  Auth::user()->id,
            ]);
        }

        return redirect('cart')->with('success-message', 'Data Ditambahkan Ke Keranjang');
    }

    public function deletecart($id)
    {
        $cart = Cart::where('id', $id)->delete();
        return redirect('cart')->with('success-message', 'Data Success Dihapus');
    }
}
