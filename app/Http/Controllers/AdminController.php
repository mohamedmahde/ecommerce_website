<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;


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
    public function delete_category($id)
    {
        $data = Category::find($id);
        $data->delete();
        toastr()->closeButton()->addSuccess('category Deleted successfully');

        return redirect()->back();
    }

    // view category edit page 
    public function edit_category($id)
    {
        $data = Category::find($id);
        return view('admin.edit_category', compact('data'));
    }


    //update category data
    public function upadte_category(Request $request,  $id)
    {
        $data = Category::find($id);
        $data->category_name = $request->category;
        $data->save();
        toastr()->closeButton()->addSuccess('category updated successfully');

        return redirect('/view_category');
    }

    //view page to add product to database
    public function add_product()
    {

        $category = Category::all();
        return view('admin.add_product', compact('category'));
    }
   //upload product data to database
    public function upload_product(Request $request)
    {

        $data = new Product;
        $data->title = $request->title;
        $data->descripton = $request->descripton;
        $data->price = $request->price;
        $data->quantity = $request->quantity;
        $data->title = $request->title;
        $data->category = $request->category;

        $image = $request->image;

        if ($image) {

            $imagename = time() . '.' . $image->getClientOriginalExtension();

            $request->image->move('products',  $imagename);
            $data->image  = $imagename;
        }

        $data->save();
        toastr()->closeButton()->addSuccess('Image added successfully');

        return redirect()->back();
    }

    //view product with paginate page
    public function view_product(){
        $product = Product::paginate(5);
        return view('admin.view_product' , compact('product'));
    }
}
