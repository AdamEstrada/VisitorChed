<?php
namespace App\Http\Controllers;

use App\Models\Visitor;
use Illuminate\Http\Request;

class VisitorController extends Controller
{
    public function index()
    {
        return response()->json([
            'default_connection' => config('database.default'),
            'mysql_host' => config('database.connections.mysql.host'),
            'mysql_port' => config('database.connections.mysql.port'),
            'visitor_connection' => (new Visitor)->getConnectionName(),
            'actual_connection_host' => (new Visitor)->getConnection()->getConfig('host'),
            'actual_connection_port' => (new Visitor)->getConnection()->getConfig('port'),
        ]);
    }

    public function create()
    {
        return view('visitors.create');
    }

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

    public function show(string $id)
    {
        $visitor = Visitor::findOrFail($id);

        return view('visitors.show', compact('visitor'));
    }

    public function edit(string $id)
    {
        $visitor = Visitor::findOrFail($id);

        return view('visitors.edit', compact('visitor'));
    }

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

    public function destroy(string $id)
    {
        $visitor = Visitor::findOrFail($id);
        $visitor->delete();

        return redirect()->route('visitors.index')
            ->with('success', 'Visitor deleted successfully!');
    }
}
