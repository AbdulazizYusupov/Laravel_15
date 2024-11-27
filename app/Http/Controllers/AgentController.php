<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Agent;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;

class AgentController extends Controller
{
    public function index(Request $request)
    {
        $products = Product::all();
        if ($request->has('parent_id') && $request->parent_id != 0) {
            $models = Agent::orderBy('id','desc')->where('parent_id',$request->parent_id)->paginate(10);
            return view('agent.index', ['models' => $models, 'id' => $request->parent_id,'products'=>$products]);
        }
        $models = Agent::orderBy('id', 'asc')->where('parent_id',0)->paginate(10);
        return view('agent.index',['models' => $models,'products'=>$products]);
    }
    public function store(Request $request)
    {
        $data = $request->all();
        Agent::create($data);
        return redirect()->route('agent.index');
    }
    public function update(Request $request, Agent $agent)
    {
        $data = $request->all();
        $agent->update($data);
        return redirect()->route('agent.index');
    }
    public function destroy(Agent $agent)
    {
        $agent->delete();
        return redirect()->route('agent.index');
    }
    public function sale(Request $request, int $id)
    {
        $product_id = $request->input('product_id');
        $price = $request->input('price');

        $parentAgent = Agent::find($id);
        if (!$parentAgent) {
            return redirect()->back()->with('error', 'Agent topilmadi!');
        }

        $product = Product::find($product_id);
        if (!$product) {
            return redirect()->back()->with('error', 'Mahsulot topilmadi!');
        }

        $this->sellProductRecursively($parentAgent, $product_id, $price);

        return redirect()->back();
    }

    private function sellProductRecursively(Agent $agent, $product_id, $price)
    {
        Order::create([
            'product_id' => $product_id,
            'agent_id' => $agent->id,
            'price' => $price
        ]);

        foreach ($agent->children as $child) {
            $this->sellProductRecursively($child, $product_id, $price);
        }
    }
}
