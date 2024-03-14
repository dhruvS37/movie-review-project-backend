<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Movie;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return response()->json(['categories' => Category::where('status','=',1)->get()]);
    }

    public function showInsertCategoryForm()
    {
        return view('category');
    }

    public function insertCategory(Request $request)
    {

        $this->validate($request, [
            'category' => 'required',
        ]);

        $category = new Category;
        $category->category = $request->input('category');

        if ($category->save())
            return response()->json(['message' => 'Category Added successfully']);
        
        return response()->json(['message' => 'An error ocuurs. Please try again!']);
    }
}
