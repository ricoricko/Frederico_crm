<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Lead;
use App\Models\Customer;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::with(['lead', 'user', 'approver', 'product'])->latest()->get();
        return view('projects.index', compact('projects'));
    }

    public function store(Request $request, Lead $lead)
    {
        $request->validate(['product_id' => 'required|exists:products,id']);

        Project::create([
            'lead_id' => $lead->id,
            'user_id' => Auth::id(), 
            'product_id' => $request->product_id,
            'status' => 'pending',
        ]);

        return redirect()->route('projects.index')->with('success', 'Lead has been converted to project and is awaiting approval.');
    }

    public function approve(Request $request, Project $project)
    {
        DB::transaction(function () use ($project) {
            $project->update([
                'status' => 'approved',
                'approved_by' => Auth::id(),
                'approved_at' => now(),
            ]);
    
            $customer = Customer::create([
                'name' => $project->lead->name,
                'email' => $project->lead->email,
            ]);
    
            $customer->products()->attach($project->product_id);
        });


        return redirect()->route('projects.index')->with('success', 'Project approved and customer created!');
    }
}