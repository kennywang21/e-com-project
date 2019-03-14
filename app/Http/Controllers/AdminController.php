<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Gloudemans\Shoppingcart\Facades\Cart;

class AdminController extends Controller
{
    public function getIndex()
    {


        return view('backend.index');
    }

    public function getLogin()
    {
        //Cart
        $carts = Cart::content();

        return view('backend.login', ['carts' => $carts]);
    }

    public function postLogin(Request $request)
    {
        $this->validate($request, [
            'username' => 'required',
            'password' => 'required'
        ]);

        if(!Auth::guard('admins')->attempt([
              'username' => $request['username'],
              'password' => $request['password']
          ])) {
            return redirect()->back()->with(['fail' => 'Could not log you in']);
        }

        return redirect()->route('index');
    }

    public function getLogout()
    {
        Auth::guard('admins')->logout();

        return redirect(\URL::previous());
    }
}
