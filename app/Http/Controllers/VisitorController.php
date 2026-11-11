<?php

namespace App\Http\Controllers;

use App\Models\Visitor;
use Illuminate\Http\Request;

class VisitorController extends Controller
{
    // Display all visitors
    public function index()
    {
        $visitors = Visitor::latest()->get();

        return view('visitors.index', compact('visitors'));
    }

    // Show add visitor form
    public function create()
    {
        return view('visitors.create');
    }

    // Save new visitor
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'position' => 'required|string|max:255',
        ]);

        Visitor::create($request->all());

        return redirect()->route('visitors.index')
            ->with('success', 'Visitor added successfully!');
    }

    // Display one visitor
    public function show(string $id)
    {
        $visitor = Visitor::findOrFail($id);

        return view('visitors.show', compact('visitor'));
    }

    // Show edit visitor form
    public function edit(string $id)
    {
        $visitor = Visitor::findOrFail($id);

        return view('visitors.edit', compact('visitor'));
    }

    // Update visitor information
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'position' => 'required|string|max:255',
        ]);

        $visitor = Visitor::findOrFail($id);
        $visitor->update($request->all());

        return redirect()->route('visitors.index')
            ->with('success', 'Visitor updated successfully!');
    }

    // Delete visitor
    public function destroy(string $id)
    {
        $visitor = Visitor::findOrFail($id);
        $visitor->delete();

        return redirect()->route('visitors.index')
            ->with('success', 'Visitor deleted successfully!');
    }
}