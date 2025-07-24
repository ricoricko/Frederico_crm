<?php

namespace App\Http\Controllers;

use App\Models\Lead;
use App\Models\Product;
use Illuminate\Http\Request;

class LeadController extends Controller
{
    public function index()
    {
        $leads = Lead::whereDoesntHave('project')->get(); // Hanya tampilkan lead yg belum jadi project
        $products = Product::all();
        return view('leads.index', compact('leads', 'products'));
    }

    public function create()
    {
        return view('leads.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:leads,email',
            'phone' => 'nullable|string',
        ]);

        Lead::create($request->all());

        return redirect()->route('leads.index')->with('success', 'Lead created successfully.');
    }
    
}