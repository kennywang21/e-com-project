<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Response;
use Image;

use App\Item;
use App\SliderImage;
use App\Size;
use App\Tag;

class ItemController extends Controller
{
  public function getTest()
  {

      return view('frontend.test');
  }

    public function getIndex()
    {
        $items = Item::get();
        $sliderImages = SliderImage::orderBy('created_at', 'asc')->get();

        return view('frontend.index', ['items' => $items, 'sliderImages' => $sliderImages]);
    }

    public function getShop($filter_id)
    {
        $items = Item::get();

        return view('frontend.shop', ['items' => $items, 'filter_id' => $filter_id]);
    }

    public function getSale()
    {
        $items = Item::get();

        return view('frontend.sale', ['items' => $items]);
    }

    public function getCreateItem()
    {
        return view('frontend.create_item');
    }

    public function postCreateItem(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'price' => 'required',
            'picture' => 'required',
            'description' => 'required'
        ]);

        $file = Input::file('picture');
        $img = Image::make($file);
        Response::make($img->encode('jpeg'));


        $item = new Item;
        $item->name = $request['name'];
        $item->price = $request['price'];
        $item->description = $request['description'];
        $item->picture = $img;
        $item->save();

        return redirect()->route('admin.create.item')
                         ->with(['success' => 'file successfully uploaded.']);
    }

  //getItem for <img>
  public function getItem($id)
  {
      $item = Item::find($id);
      $response = Response::make($item->picture, 200);
      $response->header('Content-Type', 'image/jpeg');
      return $response;
  }

  public function getItemInfo()
  {
      $sizes = Size::orderBy('size', 'asc')->get();
      $tags = Tag::orderBy('created_at', 'asc')->get();

      return view('frontend.item-info-id', ['sizes' => $sizes, 'tags' => $tags]);
  }

  public function getItemDelete($id)
  {
      $item = Item::find($id);
      $item->delete();

      return redirect()->route('index')->with(['success' => 'Item Deleted.']);
  }

}
