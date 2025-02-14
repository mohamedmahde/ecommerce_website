<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;


class AdminController extends Controller
{
    //to show category page
    public function view_category(){

        return view('admin.category');
    }

    //to add category to database
    public function add_category(Request $request){

          $category = new Category;

         $category->category_name = $request->category;

         $category->save();

          toastr()->closeButton()->addSuccess('category added successfully');


         return redirect()->back();


    }
}
