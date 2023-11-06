<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\ContactMessage;
use App\Models\Order;
use App\Models\Product;
use App\Models\UserProduct;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class WebController extends Controller
{
    public function home()
    {
        if (Auth::check() && Auth::user()->role == 0) {
            Auth::logout();
        }
        $products = Product::where('featured', 1)->where('status', 1)->limit(9)->get();
        return view('web.home', compact('products'));
    }

    public function contact()
    {
        return view('web.contact');
    }

    public function store_contact(Request $request)
    {
        if (ContactMessage::create($request->all())) return redirect()->back()->with('message', 'Your message was sent successfully we will get back to you!');
        else return redirect()->back()->with('error', 'Error sending your message please try again.');
    }

    public function products()
    {
        $products = Product::where('status', 1)->simplePaginate(9);
        return view('web.products', compact('products'));
    }

    public function single_product($id)
    {
        $product = Product::with('category', 'gallery')->findOrFail($id);
        $related = Product::where('category_id', $product->category_id)->where('id', '!=', $product->id)->where('status', 1)->limit(3)->get();

        if (count($related) == 0) {
            $related = Product::where('status', 1)->limit(3)->where('id', '!=', $product->id)->get();
        }
        return view('web.single-product', compact('product', 'related'));
    }

    public function add_to_cart(Request $request, $id)
    {
        $request->validate([
            'size' => 'required|in:S,L,XL,M',
            'quantity' => 'required|numeric|gt:0|lte:5',
        ]);

        $product = Product::findOrFail($id);

        if ($request->size == "S" || $request->size == "M") {
            if ($product->size_one_stock < $request->quantity) return redirect()->back()->with('error', 'Requested quantity is not available at stock please change the quantity.');
            if (($product->size_one_stock - $request->quantity) < 0) return redirect()->back()->with('error', 'Requested quantity is not available at stock please change the quantity.');
        } elseif ($request->size == "L" || $request->size == "XL") {
            if ($product->size_two_stock < $request->quantity) return redirect()->back()->with('error', 'Requested quantity is not available at stock please change the quantity.');
            if (($product->size_two_stock - $request->quantity) < 0) return redirect()->back()->with('error', 'Requested quantity is not available at stock please change the quantity.');
        }


        $check = UserProduct::where('user_id', Auth::user()->id)->where('product_id', $product->id)->first();
        if ($check) {
            $total = $request->quantity + $check->quantity;
            if ($check->size == "S" || $check->size == "M") {
                if ($product->size_one_stock < $total) return redirect()->back()->with('error', 'Requested quantity is not available at stock please change the quantity.');
                if (($product->size_one_stock - $total) < 0) return redirect()->back()->with('error', 'Requested quantity is not available at stock please change the quantity.');
            } elseif ($request->size == "L" || $request->size == "XL") {
                if ($product->size_two_stock < $total) return redirect()->back()->with('error', 'Requested quantity is not available at stock please change the quantity.');
                if (($product->size_two_stock - $total) < 0) return redirect()->back()->with('error', 'Requested quantity is not available at stock please change the quantity.');
            }

            $check->quantity += $request->quantity;
            if ($check->save()) return redirect('/products/' . $product->id)->with('message', 'Product added successfully.');
            else return redirect()->back()->with('error_message', 'Error adding product to your cart.');
        } else {
            $user_product = new UserProduct();
            $user_product->user_id = Auth::user()->id;
            $user_product->product_id = $product->id;
            $user_product->size = $request->size;
            $user_product->quantity = $request->quantity;
            if ($user_product->save()) return redirect('/products/' . $product->id)->with('message', 'Product added successfully.');
            else return redirect()->back()->with('error_message', 'Error adding product to your cart.');
        }
    }

    public function user_cart()
    {
        $cart_products = auth()->user()->cart;
        return view('web.cart', compact('cart_products'));
    }

    public function checkout()
    {
        $cart_products = auth()->user()->cart;
        if (count($cart_products) <= 0) return redirect()->back();
        $total_price = 0;
        foreach ($cart_products as $product) {
            $total_price += ($product->pivot->quantity * $product->discount_price ?? $product->price);
        }
        $cities = City::all();
        return view('web.checkout', compact('cities', 'total_price'));
    }

    public function make_order(Request $request)
    {
        $request->validate([
            'mobile' => 'required|regex:/(01)[0-9]{9}/|digits:11',
            'address' => 'required',
            'city' => 'required|exists:cities,id',
            'country' => 'required|in:Egypt',
            'total' => 'required',
        ]);
        $order = new Order();
        $order->user_id = \auth()->user()->id;
        $order->city_id = $request->city;
        $order->mobile = $request->mobile;
        $order->country = $request->country;
        $order->address = $request->address;
        $order->total = $request->total;
        $products = (auth()->user()->cart);

        foreach ($products as $product) {
            $total = $product->pivot->quantity;
            if ($product->pivot->size == "S" || $product->pivot->size == "M") {
                if ($product->size_one_stock < $total) return redirect()->back()->with('error', 'Requested quantity is not available at stock please change the quantity of product: ' . $product->name . ' for size: ' . $product->pivot->size);
            } elseif ($product->pivot->size == "L" || $product->pivot->size == "XL") {
                if ($product->size_two_stock < $total) return redirect()->back()->with('error', 'Requested quantity is not available at stock please change the quantity of product: ' . $product->name . ' for size: ' . $product->pivot->size);
            }
        }
        $order->products = json_encode($products);

        if ($order->save()) {
            foreach ($products as $single) {
                if ($single->pivot->size == "S" || $single->pivot->size == "M") {
                    $single->update([
                        'size_one_stock' => $single->size_one_stock - $single->pivot->quantity,
                    ]);
                } elseif ($single->pivot->size == "L" || $single->pivot->size == "XL") {
                    $single->update([
                        'size_two_stock' => $single->size_two_stock - $single->pivot->quantity,
                    ]);
                }
            }
            \auth()->user()->cart()->detach();
            return redirect('/')->with('success_order', 'Order made successfully, wait for confirmation mail!');
        } else return redirect()->back()->with('error', 'Error making order please try again.');
    }
}
