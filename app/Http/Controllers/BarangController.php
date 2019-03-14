<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Barang;
use Image;
use Response;
use Illuminate\Support\Facades\Input;

class BarangController extends Controller
{

  public function getQuiz() {
    
    $barangs = Barang::get();

    return view('quiz1', ['barangs' => $barangs]);
  }

  public function postBarang(Request $request)
  {

      $barang = new Barang;
      $barang->kode = $request['kode'];
      $barang->nama = $request['nama'];
      $barang->jumlah = $request['jumlah'];
      $barang->harga = $request['harga'];
      $barang->save();

      return redirect()->route('add.barang')
                       ->with(['success' => 'file successfully uploaded.']);
  }

  public function deleteBarang($id)
  {
      $barang = Barang::find($id);
      $barang->delete();

      return redirect()->route('add.barang')->with(['success' => 'Item Deleted.']);
  }
}
