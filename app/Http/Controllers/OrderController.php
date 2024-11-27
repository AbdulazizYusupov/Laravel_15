<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Agent;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index(Request $request)
    {
        $agents = Agent::all();
        $products = Product::all();
        $models = Order::orderBy('id', 'desc')->paginate(10);
        return view('Order.index', ['models' => $models, 'agents' => $agents, 'products' => $products]);
    }
    public function store(Request $request)
    {
        $data = $request->all();
        Order::create($data);
        return redirect()->route('order.index');
    }
    public function update(Request $request, Order $order)
    {
        $data = $request->all();
        $order->update($data);
        return redirect()->route('order.index');
    }
    public function destroy(Order $order)
    {
        $order->delete();
        return redirect()->route('order.index');
    }
}
