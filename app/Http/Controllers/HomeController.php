<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\User;
use App\Models\Cart;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Session;
use Stripe;





class HomeController extends Controller
{
    public function index()
    {

        $user = User::where('usertype', 'user')->get()->count();
        $product = Product::all()->count();
        $order = Order::all()->count();
        $delivered = order::where('status', 'delivered')->get()->count();

        return view('admin.index', compact('user', 'product', 'order', 'delivered'));
    }


    public function home()
    {


        $product = Product::all();
        if (Auth::id()) {
            $user = Auth::user();
            $userId = $user->id;
            $count = Cart::Where('user_id', $userId)->count();
        } else {
            $count = '';
        }

        return view('home.index', compact('product', 'count'));
    }

    public function login_home()
    {


        $product = Product::all();
        if (Auth::id()) {
            $user = Auth::user();
            $userId = $user->id;
            $count = Cart::Where('user_id', $userId)->count();
        } else {
            $count = '';
        };
        return view('home.index', compact('product', 'count'));
    }

    public function product_details($id)
    {
        $data = Product::find($id);
        if (Auth::id()) {
            $user = Auth::user();
            $userId = $user->id;
            $count = Cart::Where('user_id', $userId)->count();
        } else {
            $count = '';
        }
        return view('home.product_details', compact('data', 'count'));
    }


    // add to cart if user login 
    public function add_cart($id)
    {
        $product_id = $id;
        $user = Auth::user();
        $user_id = $user->id;
        $data = new Cart;
        $data->user_id = $user_id;
        $data->product_id = $product_id;
        $data->save();
        toastr()->closeButton()->addSuccess('product Added to the Cart successfully');

        return redirect()->back();
    }


    public function mycart()
    {
        if (Auth::id()) {
            $user = Auth::user();
            $userId = $user->id;
            $count = Cart::Where('user_id', $userId)->count();
            $cart = Cart::where('user_id', $userId)->get();
        }

        return view('home.mycart', compact('count', 'cart'));
    }

    public function delete_cart($id)
    {

        $delete_cart =  Cart::find($id);
        $delete_cart->delete();
        return redirect()->back();
    }

    public function confirm_order(Request $request)
    {

        $name = $request->name;
        $address = $request->address;
        $phone = $request->phone;
        $userid = Auth::user()->id;
        $cart = Cart::where('user_id', $userid)->get();
        foreach ($cart as $carts) {
            $order = new Order;
            $order->product_id = $carts->product_id;

            $order->name = $name;
            $order->rec_address = $address;
            $order->phone = $phone;
            $order->user_id = $userid;
            $order->save();
        }
        // $cart_remove = Cart::where('user_id' ,$userid)->get();
        // foreach($cart_remove as $remove)
        // {
        //     $data  = Cart::find($remove->id);
        //     $data->delete();
        // }
        return redirect()->back();
    }

    public function myorders()
    {
        $user = Auth::user()->id;
        $count = Cart::Where('user_id', $user)->get()->count();
        $order = Order::where('user_id' , $user)->get();
        return view('home.myorders', compact('count' , 'order'));
    }

    public function stripe($value)

    {
       
        return view('home.stripe' ,  compact('value'));

    }

    public function stripePost(Request $request , $value)

    {

        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

    

        Stripe\Charge::create ([

                "amount" => $value * 100,

                "currency" => "usd",

                "source" => $request->stripeToken,

                "description" => "Test payment from Complet" 

        ]);

      

        $name = Auth::user()->name;
        $phone = Auth::user()->phone;
        $address = Auth::user()->address;
        $userid = Auth::user()->id;
        $cart = Cart::where('user_id', $userid)->get();

        foreach ($cart as $carts) {
            $order = new Order;
            $order->product_id = $carts->product_id;

            $order->name = $name;
            $order->rec_address = $address;
            $order->phone = $phone;
            $order->user_id = $userid;
            $order->payment_status = "paid";
            $order->save();
        }
        // $cart_remove = Cart::where('user_id' ,$userid)->get();
        // foreach($cart_remove as $remove)
        // {
        //     $data  = Cart::find($remove->id);
        //     $data->delete();
        // }
        Session::flash('success', 'Payment successful!');


        return redirect('mycart');

    }

    public function shop()
    {


        $product = Product::all();
        if (Auth::id()) {
            $user = Auth::user();
            $userId = $user->id;
            $count = Cart::Where('user_id', $userId)->count();
        } else {
            $count = '';
        }

        return view('home.shop', compact('product', 'count'));
    }

    public function why()
    {


        if (Auth::id()) {
            $user = Auth::user();
            $userId = $user->id;
            $count = Cart::Where('user_id', $userId)->count();
        } else {
            $count = '';
        }

        return view('home.why', compact( 'count'));
    }


    public function testimonial()
    {


        if (Auth::id()) {
            $user = Auth::user();
            $userId = $user->id;
            $count = Cart::Where('user_id', $userId)->count();
        } else {
            $count = '';
        }

        return view('home.testimonial', compact( 'count'));
    }

    
    public function contact()
    {


        if (Auth::id()) {
            $user = Auth::user();
            $userId = $user->id;
            $count = Cart::Where('user_id', $userId)->count();
        } else {
            $count = '';
        }

        return view('home.contact_us', compact( 'count'));
    }
}
