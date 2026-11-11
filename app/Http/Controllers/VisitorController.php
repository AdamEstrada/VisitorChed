<?php

namespace App\Http\Controllers;

use App\Models\Visitor;
use Illuminate\Http\Request;

class VisitorController extends Controller
{
    public function index()
    {
        return response()->json([
            'laravel_host' => config('database.connections.mysql.host'),
            'laravel_port' => config('database.connections.mysql.port'),
            'system_host' => getenv('DB_HOST') ?: null,
            'system_port' => getenv('DB_PORT') ?: null,
            'env_host' => env('DB_HOST'),
            'env_port' => env('DB_PORT'),
        ]);
    }

    public function create()
    {
        return view('visitors.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'address' => 'required',
            'position' => 'required',
        ]);

        Visitor::create($request->all());

        return redirect()->route('visitors.index')
            ->with('success', 'Visitor added successfully.');
    }

    public function edit(Visitor $visitor)
    {
        return view('visitors.edit', compact('visitor'));
    }

    public function update(Request $request, Visitor $visitor)
    {
        $request->validate([
            'name' => 'required',
            'address' => 'required',
            'position' => 'required',
        ]);

        $visitor->update($request->all());

        return redirect()->route('visitors.index')
            ->with('success', 'Visitor updated successfully.');
    }

    public function destroy(Visitor $visitor)
    {
        $visitor->delete();

        return redirect()->route('visitors.index')
            ->with('success', 'Visitor deleted successfully.');
    }
}
