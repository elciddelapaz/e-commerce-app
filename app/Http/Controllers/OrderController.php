<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\UpdateOrderRequest;
use App\Models\Order;
use App\Models\Product;

class OrderController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $orders = Order::where('user_id', $user->id)->paginate(5);
        return Inertia::render('order/Index',['orders' => $orders]);
    }

    public function create()
    {
        $products = Product::paginate(5);
        return Inertia::render('order/Create',['products' => $products]);
    }

    public function store(StoreOrderRequest $request)
    {
        $data = $request->validated();
        $order = Order::create([
            'product_name' => $data['product_name'],
            'price' => $data['price'],
            'quantity' => $data['quantity'],
            'total' => $data['total'],
            'user_id' => auth()->user()->id
        ]);
        $order->save();

        return to_route('order.index');
    }

    public function edit(Order $order)
    {
        return Inertia::render('order/Edit', ['order' => $order]);
    }

    public function update(UpdateOrderRequest $request, Order $order)
    {
        $data = $request->validated();

        $order->update($data);

        return redirect()->route('order.index')->with('message', 'Updated successfully');
    }
}
