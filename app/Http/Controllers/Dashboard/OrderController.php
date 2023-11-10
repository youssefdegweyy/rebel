<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::with('user', 'city')
            ->where('status', '!=', Order::DELIVERED)
            ->where('status', '!=', Order::CANCELLED)
            ->orderByDesc('id')->get();
        return view('dashboard.orders.index', compact('orders'));
    }


    public function edit($id)
    {
        $order = Order::where('status', '!=', Order::DELIVERED)->where('status', '!=', Order::CANCELLED)->whereId($id)->first();
        return view('dashboard.orders.edit', compact('order'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:0,1,2,3,4',
            'note' => 'nullable'
        ]);

        $order = Order::with('user')->findOrFail($id);
        $order->update([
            'status' => $request->status,
            'note' => $request->note,
        ]);

        if ($request->status == Order::CANCELLED) {
            foreach (json_decode($order->products) as $product) {
                if ($product->pivot->size == "S" || $product->pivot->size == "M") {
                    $single = Product::findOrFail($product->id);
                    $single->update([
                        'size_one_stock' => $single->size_one_stock + $product->pivot->quantity,
                    ]);
                } elseif ($product->pivot->size == "L" || $product->pivot->size == "XL") {
                    $single = Product::findOrFail($product->id);
                    $single->update([
                        'size_two_stock' => $single->size_two_stock + $product->pivot->quantity,
                    ]);
                }
            }
        }

        if ($request->status == Order::DELIVERED) {
            $user = $order->user;
            if ($order->payment_type == Order::CASH) {
                $user->update([
                    'points' => $user->points + ($order->total - $order->city?->price),
                ]);
            }
        }
        return redirect('/admin/orders')->with('message', 'Status updated successfully.');
    }

//    public function mark_delivered($id)
//    {
//        $order = Order::findOrFail($id);
//        $order->update([
//            'status' => Order::DELIVERED,
//        ]);
//        return redirect()->back()->with('message', 'Order moved successfully.');
//    }

    public function mark_cancelled(Request $request, $id)
    {
        $order = Order::findOrFail($id);
        $order->update([
            'status' => Order::CANCELLED,
            'note' => $request->note,
        ]);
        $user = $order->user;
        if ($order->payment_type == Order::CASH) {
            $user->update([
                'points' => $user->points - ($order->total - $order->city?->price),
            ]);
        }
        return redirect()->back()->with('message', 'Order cancelled successfully.');
    }

    public function delivered_orders()
    {
        $orders = Order::where('status', Order::DELIVERED)->get();
        return view('dashboard.orders.delivered', compact('orders'));
    }

    public function cancelled_orders()
    {
        $orders = Order::where('status', Order::CANCELLED)->get();
        return view('dashboard.orders.cancelled', compact('orders'));
    }

}
