<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;

use App\Product;
use App\Transaction;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        //Cart
        $carts = Cart::content();

        $cartProducts = Cart::content();

        return view('frontend.cart', ['cartProducts' => $cartProducts,
                                            'carts' => $carts]);
    }

    public function postCart(Request $request)
    {

        //Cart
        $carts = Cart::content();
        $transaction = new Transaction();

        foreach ($carts as $cart) {
            $transaction->email = $request['user-email'];
            $transaction->file_path = $cart->options->file_path;
            $transaction->product_name = $cart->name;
            $transaction->size = $cart->options->size;
            $transaction->qty = $cart->qty;
            $transaction->total_price = $cart->qty * $cart->price;
            $transaction->status = 'PENDING';
            $transaction->save();
        }

        Cart::destroy();

        return redirect()->route('index')->with(['success' => 'Pesanan anda akan segera kami proses, TERIMA KASIH.']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($productId)
    {


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */



    public function edit(Request $request)
    {

        $this->validate($request, [
            'size' => 'required'
        ]);


        $product = Product::find($request['id']);

        Cart::add($product->id, $product->name, $request['qty'], $product->price,
                  ['size' => $request['size'],
                   'file_path' => $product->file_path]
        );

        return  redirect()->route('cart');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getProductUpdate(Request $request)
    {
        Cart::update($request['rowId'], $request['qty']);

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Cart::remove($id);

        return redirect('cart')->withSuccessMessage('Item has been removed!');
    }

    public function getProductRemove($rowId) {

        Cart::remove($rowId);

        return redirect('cart')->withSuccessMessage('Item has been removed!');
    }
}
