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

       //to delete category
    public function delete_category($id){
        $data = Category::find($id);
        $data->delete();
        toastr()->closeButton()->addSuccess('category Deleted successfully');

        return redirect()->back();
    }
 
     // view category edit page 
    public function edit_category($id){
        $data = Category::find($id);
         return view('admin.edit_category' , compact('data'));

    }
  

//update category data
    public function upadte_category(Request $request ,  $id){
        $data = Category::find($id);
        $data->category_name = $request->category;
        $data->save();
        toastr()->closeButton()->addSuccess('category updated successfully');

        return redirect('/view_category');



    }
}
