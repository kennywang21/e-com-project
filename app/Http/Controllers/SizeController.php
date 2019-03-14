<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Datatables;
use Illuminate\Support\Facades\Response;

use App\Size;

class SizeController extends Controller
{
  public function getIndex() {

      return view('backend.size_form');
  }

  public function postStore(Request $request) {

      $this->validate($request, [
          'size' => 'required'
      ]);

      $existingSize = Size::where('size', '=', $request['size'])->first();


      if($existingSize) {

          return redirect()->route('size')->with(['fail' => 'SIZE ALREADY EXIST']);
      }

      $size = new Size();
      $size->size = $request['size'];
      $size->save();

      return redirect()->route('size')->with(['success' => 'SUCCESSFULLY SAVE']);
  }

  public function getDelete($id) {

      $size = size::find($id);
      $size->delete();

      return redirect()->route('size')->with(['success' => 'SUCCESSFULLY DELETE SIZE']);
  }

  public function anyData()
  {
      $size = Size::select(['id', 'size'])->get();

      return Datatables::of($size)
      ->editColumn('actions', function($size) {

          return "<a href=" . route("size.delete", ['id' => $size->id]) . " class='btn btn-warning'>Delete</a>";
      })->rawColumns(['actions'])
      ->make(true);
  }
}
