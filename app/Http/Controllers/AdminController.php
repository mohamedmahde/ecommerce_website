<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use Barryvdh\DomPDF\Facade\Pdf;



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
        $data->category = $request->category;

        $image = $request->image;

        if ($image) {

            $imagename = time() . '.' . $image->getClientOriginalExtension();

            $request->image->move('products',  $imagename);
            $data->image  = $imagename;
        }

        $data->save();
        toastr()->closeButton()->addSuccess('product added successfully');

        return redirect()->back();
    }

    //view product with paginate page
    public function view_product()
    {
        $product = Product::paginate(3);
        return view('admin.view_product', compact('product'));
    }

    //delete product data
    public function delete_product($id)
    {

        $data = Product::findOrfail($id);

        // Delete Image from Public Folder
        $image_path = public_path('products/' . $data->iamge);
        if (file_exists($image_path)) {

            unlink($image_path);
        }

        $data->delete();

        toastr()->closeButton()->addSuccess('product Deleted successfully');

        return redirect()->back();
    }

    //update product data
    public function update_product($id)
    {
        $data = Product::find($id);
        $category = Category::all();
        return view('admin.update_product', compact('data', 'category'));
        return redirect()->back();
    }


    //Edit product data
    public function edit_product(Request $request, $id)
    {

        $data = Product::find($id);
        $data->title = $request->title;
        $data->descripton = $request->descripton;
        $data->price = $request->price;
        $data->quantity = $request->quantity;
        $data->category = $request->category;


        $image = $request->image;

        if ($image) {

            $imagename = time() . '.' . $image->getClientOriginalExtension();

            $request->image->move('products',  $imagename);
            $data->image  = $imagename;
        }

        $data->save();
        toastr()->closeButton()->addSuccess('product Updated successfully');

        return redirect('view_product');
    }

    //search product in view product page
    public function product_search(Request $request)
    {

        $search = $request->search;
        $product = Product::where('title', 'LIKE', '%' . $search . '%')->orWhere('category', 'LIKE', '%' . $search . '%')->paginate(3);

        return view('admin.view_product', compact('product'));
    }

    public function view_orders()
    {

        $data = Order::all();
        return view('admin.view_orders', compact('data'));
    }

    public function on_the_way($id)
    {
        $data = Order::find($id);
        $data->status = 'one the way';
        $data->save();
        return redirect()->back();
    }

    public function delivered($id)
    {
        $data = Order::find($id);
        $data->status = 'delivered';
        $data->save();
        return redirect()->back();
    }

    public function print_pdf($id){


        $data  = Order::find($id);
        $pdf = Pdf::loadView('admin.invoice' ,compact('data'));
        return $pdf->download('invoice.pdf');
    }
}
