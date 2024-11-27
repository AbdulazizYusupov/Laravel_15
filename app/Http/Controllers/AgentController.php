<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Agent;
use Illuminate\Http\Request;

class AgentController extends Controller
{
    public function index(Request $request)
    {
        if ($request->has('parent_id') && $request->parent_id != 0) {
            $models = Agent::orderBy('id','desc')->where('parent_id',$request->parent_id)->paginate(10);
            return view('agent.index', compact('models'));
        }
        $models = Agent::orderBy('id', 'asc')->where('parent_id',0)->paginate(10);
        return view('agent.index', compact('models'));
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
}
