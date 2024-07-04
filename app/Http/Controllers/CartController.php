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
use Illuminate\Support\Facades\Validator;

class CartController extends Controller
{
    public function index()
    {
        $type = Type::all();

        if (Type::where('type', 'CINCIN')->count() == 0) {
            return redirect('type')->with('errors-message', 'Data type tidak ditemukan');
        } elseif (Type::where('type', 'ANTING')->count() == 0) {
            return redirect('type')->with('errors-message', 'Data type tidak ditemukan');
        } elseif (Type::where('type', 'ANTING')->count() == 0) {
            return redirect('type')->with('errors-message', 'Data type tidak ditemukan');
        } elseif (Type::where('type', 'ANTING')->count() == 0) {
            return redirect('type')->with('errors-message', 'Data type tidak ditemukan');
        } else {
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
                $nourut = substr($idTransaction->transaction_id, 6, 6) + 1;
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
    }

    public function addcart($id)
    {
        $product = Product::where('codeproduct', $id)->first()->id;
        $codecart = Cart::latest('codecart')->first();

        //MENCARI NILAI HARGA DARI PRODUCT CART YANG ACTIVE
        $harga = Product::where('id', $product)->first()->sellingprice;

        //MENCARI NILAI BERAT DARI PRODUCT CART YANG ACTIVE
        $berat = Product::where('id', $product)->first()->weight;

        //TOTAL HARGA
        $total = $harga * $berat;

        $id = "C-";
        $tahun = date('Y');

        if ($codecart == null) {
            $nourut = "000001";
            $idcart = $id . $tahun . $nourut;

            Cart::create([
                'codecart'      =>  $idcart,
                'product_id'    =>  $product,
                'total'         =>  $total,
                'status'        =>  1,
                'users_id'      =>  Auth::user()->id,
            ]);
        } elseif ($codecart->status == 1) {
            $nourut = substr($codecart->codecart, 6, 6);
            $idcart = $id . $tahun . $nourut;

            Cart::create([
                'codecart'      =>  $idcart,
                'product_id'    =>  $product,
                'total'         =>  $total,
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
                'total'         =>  $total,
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

    public function store(Request $request)
    {
        $messages = [
            'required' => ':attribute wajib di isi !!!',
        ];

        $credentials = $request->validate([
            'customer'      =>  'required',
            'discount'      =>  'required'
        ], $messages);

        if ($request->customer == 'Walk in Customer') {
            return redirect('cart')->with('errors-message', 'Customer wajib di isi !!!');
        }

        if ($request->discount == 'Choose Promo') {
            return redirect('cart')->with('errors-message', 'Discount wajib di isi !!!');
        }

        //TRANSAKSI ID
        $trasaction_id = Transaction::latest('transaction_id')
            ->first();

        $id = "T-";
        $tahun = date('Y');


        if ($trasaction_id == null) {
            $nourut = "000001";
            $newtransaction_id = $id . $tahun . $nourut;
        } else {
            $nourut = substr($trasaction_id->transaction_id, 6, 6) + 1;
            $nourut = str_pad($nourut, 6, "0", STR_PAD_LEFT);

            $newtransaction_id = $id . $tahun . $nourut;
        }

        //CART ID
        $cart_id = Cart::where('users_id', Auth::user()->id)
            ->where('status', 1)
            ->first()
            ->codecart;

        //CUSTOMER
        $customer = $request->customer;

        //PURCHASE
        $datepurchase = date(now());

        //MENCARI PRODUCT CART YANG ACTIVE
        $product  = Cart::where('users_id', Auth::user()->id)
            ->where('status', 1)
            ->first()
            ->product_id;

        //MENCARI HARGA TOTAL DARI PRODUCT CART YANG ACTIVE
        $total  = Cart::where('users_id', Auth::user()->id)
            ->where('status', 1)
            ->sum('total');

        //MENGAMBIL NILAI DISCOUNT
        $promo = $request->discount;

        //CONVERT NILAI PROMO
        $discount = ($promo / 100) * $total;

        //GRAND TOTAL 
        $grandtotal = $total - $discount;

        $users = Auth::user()->id;

        $store = Transaction::create([
            'transaction_id'    =>  $newtransaction_id,
            'cart_id'           =>  $cart_id,
            'customer_id'       =>  $customer,
            'discount'          =>  $request->discount,
            'purchase'          =>  $datepurchase,
            'total'             =>  $grandtotal,
            'users_id'          =>  $users,
        ]);

        if ($store) {
            Cart::where('users_id', Auth::user()->id)
                ->where('status', 1)
                ->where('codecart', $cart_id)
                ->update([
                    'status'    => 2,
                ]);
        }

        return redirect('cart')->with('success-message', 'Transaction Succesfully !');
    }
}
