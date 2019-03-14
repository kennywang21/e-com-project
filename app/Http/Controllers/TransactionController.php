<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Datatables;

use App\Transaction;
use App\Product;

class TransactionController extends Controller
{
    public function getAdminTransactionPage() {



      return view('backend.daftar-transaksi');
    }

    public function adminAnyData() {
        $transaction = Transaction::latest()->get();

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
        })->editColumn('status', function($transaction) {
            return '<a class="" href="'. route('update.transaction.status', ['id' => $transaction->id]) .'">'. $transaction->status .'</a>';
        })->rawColumns(['name', 'image', 'status'])
        ->make(true);
    }

    public function getUpdateTransactionStatus($id) {

        $transaction = Transaction::find($id);
        if($transaction->status == 'SUKSES') {
            $transaction->status = 'PENDING';
        } else {
            $transaction->status = 'SUKSES';
        }

        $transaction->update();

        return redirect()->back()->with(['success' => 'STATUS BERHASIL DI PERBAHARUI']);
    }
}
