<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Datatables;
use Illuminate\Support\Facades\Response;

use App\Tag;

class TagController extends Controller
{
  public function getIndex() {

      return view('backend.tag_form');
  }

  public function postStore(Request $request) {

      $this->validate($request, [
          'tag' => 'required'
      ]);

      $existingTag = Tag::where('tag', '=', $request['tag'])->first();


      if($existingTag) {

          return redirect()->route('tag')->with(['fail' => 'TAG ALREADY EXIST']);
      }

      $tag = new Tag();
      $tag->tag = $request['tag'];
      $tag->save();

      return redirect()->route('tag')->with(['success' => 'SUCCESSFULLY SAVE']);
  }

  public function getDelete($id) {

      $tag = Tag::find($id);
      $tag->delete();

      return redirect()->route('tag')->with(['success' => 'SUCCESSFULLY DELETE TAG']);
  }

  public function anyData()
  {
      $tag = Tag::select(['id', 'tag'])->get();

      return Datatables::of($tag)
      ->editColumn('actions', function($tag) {

          return "<a href=" . route("tag.delete", ['id' => $tag->id]) . " class='btn btn-warning'>Delete</a>";
      })->rawColumns(['actions'])
      ->make(true);
  }
}
