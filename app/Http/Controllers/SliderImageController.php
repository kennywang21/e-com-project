<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Carbon\Carbon;

use App\SliderImage;

class SliderImageController extends Controller
{
    public function getIndex() {

        $sliderImages = SliderImage::orderBy('created_at', 'asc')->get();

        return view('backend.slider_form', ['sliderImages' => $sliderImages]);
    }

    public function postStore(Request $request) {

        $this->validate($request, [
            'slider-image' => 'required'
        ]);

        $sliderImage = new SliderImage();

        if($request->hasFile('slider-image')) {
            $file = Input::file('slider-image');

            $timestamp = str_replace([' ', ':'], '-', Carbon::now()->toDateTimeString());

            $name = $timestamp. '-' .$file->getClientOriginalName();

            $sliderImage->file_path = $name;

            $file->move(public_path().'/images/slider/', $name);
        }
        $sliderImage->save();

        return redirect()->route('slider.image')->with(['success' => 'Successfully Upload Slider Image']);
    }

    public function getDelete($id) {

        $sliderImage = SliderImage::find($id);
        $sliderImage->delete();

        return redirect()->route('slider.image')->with(['success' => 'DELETE SUCCESSFULLY']);
    }

    public function postUpdate(Request $request) {

        $this->validate($request, [
            'slider-image' => 'required'
        ]);

        $sliderImage = SliderImage::find($request['id']);

        if($request->hasFile('slider-image')) {
            $file = Input::file('slider-image');

            $timestamp = str_replace([' ', ':'], '-', Carbon::now()->toDateTimeString());

            $name = $timestamp. '-' .$file->getClientOriginalName();

            $sliderImage->file_path = $name;

            $file->move(public_path().'/images/slider/', $name);
        }

        $sliderImage->update();

        return redirect()->route('slider.image')->with(['success' => 'Successfully Updated']);
    }
}
