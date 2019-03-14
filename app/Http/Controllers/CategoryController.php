<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Datatables;

use App\Category;

class CategoryController extends Controller
{
    public function getIndex() {

        return view('backend.category_form');
    }

    public function postStore(Request $request) {

        $this->validate($request, [
            'name' => 'required'
        ]);

        $existingCategory = Category::where('name', '=', $request['name'])->first();


        if($existingCategory) {

            return redirect()->route('category')->with(['fail' => 'PLEASE CHOOSE ANOTHER NAME']);
        }

        $category = new Category();
        $category->name = $request['name'];
        $category->save();

        return redirect()->route('category')->with(['success' => 'SUCCESSFULLY SAVE']);
    }

    public function postUpdate(Request $request) {

        $this->validate($request, [
            'update_name' => 'required'
        ]);

        $category = Category::find($request['update_id']);
        $category->name = $request['update_name'];
        $category->update();

        return redirect()->route('category')->with(['success' => 'SUCCESSFULLY UPDATE']);
    }

    public function getDelete($id) {

        $category = Category::find($id);
        $category->delete();

        return redirect()->route('category')->with(['success' => 'SUCCESSFULLY DELETE CATEGORY']);
    }

    public function anyData()
    {
        $category = Category::select(['id', 'name'])->get();

        return Datatables::of($category)
        ->editColumn('actions', function($category) {

            return '<a href="javascript:void(0)" class="btn btn-primary edit" onclick="updateCategory('.$category->id .','. "'" . $category->name . "'" . ')">Edit</a>'.
            " <a href=" . route("category.delete", ['id' => $category->id]) . " class='btn btn-warning'>Delete</a>";
        })->rawColumns(['actions'])
        ->make(true);
    }
}
