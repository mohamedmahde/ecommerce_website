<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;


class AdminController extends Controller
{
    //to get all category 
    public function view_category()
    {
        $data =  Category::all();
        return view('admin.category', compact('data'));
    }

    //to add category to database
    public function add_category(Request $request)
    {

        $category = new Category;

        $category->category_name = $request->category;

        $category->save();

        toastr()->closeButton()->addSuccess('category added successfully');


        return redirect()->back();
    }

    public function delete_category($id){
        $data = Category::find($id);
        $data->delete();
        toastr()->closeButton()->addSuccess('category Deleted successfully');

        return redirect()->back();
    }
}
