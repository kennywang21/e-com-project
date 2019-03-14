<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Carbon\Carbon;
use Datatables;
use Gloudemans\Shoppingcart\Facades\Cart;

use App\SliderImage;
use App\Product;
use App\Category;
use App\Tag;
use App\Size;

class ProductController extends Controller
{
  public function getSearch($product_name) {

    //Cart
    $carts = Cart::content();

    $products = Product::where('name', 'LIKE', '%'. $product_name .'%')->paginate(12);

  
    $tags = Tag::all();
    $categories = Category::all();

    $product_tags = array();
    $i = 0;

    foreach ($products as $product) {
        $product_tags[$i] = $product->tags;

        $i++;
    }


      return view('frontend.shop', ['products' => $products,
                                    'product_tags' => $product_tags,
                                    'categories' => $categories,
                                    'carts' => $carts]);
  }

  public function postSearch(Request $request) {

      return redirect()->route('frontend.search', ['product_name' => $request['search']]);
  }

  public function getHomePage() {

      //Cart
      $carts = Cart::content();

      $sliderImages = SliderImage::orderBy('created_at', 'asc')->get();
      $products = Product::latest()->get();
      $tags = Tag::all();

      $product_tags = array();
      $product_tags_ids = array();
      $i = 0;
      $j = 0;

      foreach ($products as $product) {
          $product_tags[$i] = $product->tags;
          foreach ($product_tags[$i] as $product_tag) {
              $product_tags_ids[$j] = $product_tag->id;

              $j++;
          }

          $i++;
      }

      return view('frontend.index', ['sliderImages' => $sliderImages,
                                    'products' => $products,
                                    'product_tags' => $product_tags,
                                    'product_tags_ids' => $product_tags_ids,
                                    'carts' => $carts]);
  }

    public function getShopPage($filter_id=0) {

        //Cart
        $carts = Cart::content();

        $products = Product::latest()->paginate(12);
        $tags = Tag::all();
        $categories = Category::all();

        $product_tags = array();
        $product_tags_ids = array();
        $i = 0;
        $j = 0;

        foreach ($products as $product) {
            $product_tags[$i] = $product->tags;
            foreach ($product_tags[$i] as $product_tag) {
                $product_tags_ids[$j] = $product_tag->id;

                $j++;
            }

            $i++;
        }

        return view('frontend.shop', ['filter_id' => $filter_id,
                                      'products' => $products,
                                      'product_tags' => $product_tags,
                                      'product_tags_ids' => $product_tags_ids,
                                      'categories' => $categories,
                                      'carts' => $carts]);
    }

    public function getSalePage($filter_id=0) {
      //Cart
      $carts = Cart::content();

      $products = Product::latest()->paginate(12);
      $tags = Tag::all();
      $categories = Category::all();

      $product_tags = array();
      $product_tags_ids = array();
      $i = 0;
      $j = 0;

      foreach ($products as $product) {
          $product_tags[$i] = $product->tags;
          foreach ($product_tags[$i] as $product_tag) {
              $product_tags_ids[$j] = $product_tag->id;

              $j++;
          }

          $i++;
      }

      return view('frontend.sale', ['filter_id' => $filter_id,
                                    'products' => $products,
                                    'product_tags' => $product_tags,
                                    'product_tags_ids' => $product_tags_ids,
                                    'categories' => $categories,
                                    'carts' => $carts]);
    }

    public function getProductPage($id) {

        //Cart
        $carts = Cart::content();

        $product = Product::find($id);
        $tags = Tag::all();
        $sizes = Size::all();
        $all_products = Product::latest()->get();

        $product_tags = $product->tags;
        $product_sizes = $product->sizes;

        $all_product_tags = array();
        $i = 0;

        foreach ($all_products as $all_product) {
            $all_product_tags[$i] = $all_product->tags;

            $i++;
        }

        return view('frontend.item-info-id', ['product' => $product,
                                              'product_tags' => $product_tags,
                                              'product_sizes' => $product_sizes,
                                              'all_product_tags' => $all_product_tags,
                                              'all_products' => $all_products,
                                              'carts' => $carts]);
    }

    public function getStore() {

        $category_select = Category::pluck('name', 'id')->toArray();
        $tag_select = Tag::pluck('tag', 'id')->toArray();
        $size_select = Size::orderBy('size', 'asc')->pluck('size', 'id')->toArray();

        return view('backend.product_form', [
            'category_select' => $category_select,
            'tag_select' => $tag_select,
            'size_select' => $size_select
        ]);
    }

    public function postStore(Request $request) {

      $this->validate($request, [

      ]);

      $product = new Product;
      $product->name = $request['name'];
      $product->price = $request['price'];
      $product->sale_price = 0;

      if($request['description'] != null) {
          $product->description = $request['description'];
      } else {
          $product->description = '';
      }

      if($request->hasFile('picture')) {
        $file = Input::file('picture');
        //getting timestamp
        $timestamp = str_replace([' ', ':'], '-', Carbon::now()->toDateTimeString());

        $name = $timestamp. '-' .$file->getClientOriginalName();

        $product->file_path = $name;
        $file->move(public_path().'/images/product/', $name);
      }

      $product->save();

      if(strlen($request['categories']) > 0) {
          $categoryIDs = explode(',', $request['categories']);
          foreach($categoryIDs as $categoryID) {
              $product->categories()->attach($categoryID);
          }
      }
      
      if(strlen($request['tags']) > 0) {
          $tagIDs = explode(',', $request['tags']);
          foreach($tagIDs as $tagID) {
              $product->tags()->attach($tagID);
          }
      }
      
      if(strlen($request['sizes']) > 0) {
          $sizeIDs = explode(',', $request['sizes']);
          foreach($sizeIDs as $sizeID) {
              $product->sizes()->attach($sizeID);
          }
      }

      return redirect()->route('product')->with(['success' => 'Product successfully created!']);
    }

    public function getDelete($id) {

        $product = Product::find($id);
        $product->delete();

        return redirect()->route('product')->with(['success' => 'SUCCESSFULLY DELETE PRODUCT']);
    }

    public function anyData() {
        $product = Product::all();

        return Datatables::of($product)
        ->editColumn('image', function($product) {

            return '<img class="datatables-image" src="'. asset('/images/product/'. $product->file_path) .'" alt="'. asset($product->file_path) .'" />';
        })->editColumn('actions', function($product) {

            return '<a href="javascript:void(0)" class="btn btn-primary edit" onclick="updateProduct('.$product->id .','. "'" . $product->name . "'" . ')">Edit</a>'.
            " <a href=" . route("product.delete", ['id' => $product->id]) . " class='btn btn-warning'>Delete</a>";
        })->rawColumns(['actions', 'image'])
        ->make(true);
    }
}
