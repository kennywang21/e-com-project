<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
use Datatables;

use App\User;
use App\Transaction;
use App\Product;

class UserController extends Controller
{
    public function getRegisterPage() {

        //Cart
        $carts = Cart::content();

        return view('frontend.register', ['carts' => $carts]);
    }

    public function getDaftarPesanan() {

        //Cart
        $carts = Cart::content();


        return view('frontend.daftar-pesanan', ['carts' => $carts]);
    }

    public function postRegister(Request $request) {
   
        $this->validate($request, [
            'name-register' => 'required',
            'email-register' => 'required',
            'password-register' => 'required',
            'con-password-register' => 'required'
        ]);

        if($request['password-register'] != $request['con-password-register']) {

            return redirect()->back()->with(['fail' => 'Password field and Confirmation password field is not same']);
        }

        $user = new User();
        $user->name = $request['name-register'];
        $user->email = $request['email-register'];
        $user->password = bcrypt($request['password-register']);
        $user->save();

        return redirect()->back()->with(['success' => 'Register successfully']);
    }

    public function anyData($email) {
        $transaction = Transaction::where('email', '=', $email)->get();

        return Datatables::of($transaction)
        ->editColumn('name', function($transaction) {
            $product = Product::where('file_path', '=', $transaction->file_path)->get();
            $array = json_decode($product, true);
            foreach ($array as $arr) {
              return $arr['name'];
            }

            //return $array;
        })->editColumn('image', function($transaction) {
            return '<img class="datatables-image" src="'. asset('/images/product/'. $transaction->file_path) .'" alt="'. asset($transaction->file_path) .'" />';
        })->rawColumns(['name', 'image'])
        ->make(true);
    }
}
