<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Agent;
use Illuminate\Http\Request;

class AgentController extends Controller
{
    public function index()
    {
        $models = Agent::orderBy('id', 'asc')->paginate(10);
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
