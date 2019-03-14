<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Carbon\Carbon;

use App\Image;

class ImageController extends Controller
{
    public function upload() {
        return view('imagePublic.imageupload');
    }

    public function store(Request $request) {

        $this->validate($request, [
              'title' => 'required',
              'image' => 'required',

        ]);

        $image = new Image();
        $image->title = $request['title'];

        if($request['description'] != null) {
            $image->description = $request['description'];
        } else {
            $image->description = '';
        }

        if($request->hasFile('image')) {
          $file = Input::file('image');

          $timestamp = str_replace([' ', ':'], '-', Carbon::now()->toDateTimeString());

          $name = $timestamp. '-' .$file->getClientOriginalName();

          $image->file_path = $name;
          $file->move(public_path().'/images/', $name);
        }
        $image->save();
        return redirect()->route('imageupload')->with('success', 'Image Uploaded Successfully');
    }

    public function show() {
        $images = Image::all();

        return view('imagePublic.showLists', ['images' => $images]);
    }
}
