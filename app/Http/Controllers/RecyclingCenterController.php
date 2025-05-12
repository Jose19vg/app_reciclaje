<?php

namespace App\Http\Controllers;

use App\Models\RecyclingCenter;
use Illuminate\Http\Request;

class RecyclingCenterController extends Controller
{
    public function index()
    {
        $recyclingCenters = RecyclingCenter::latest()->get();
        return view('RecyclingCenters.index', compact('recyclingCenters'));
    }
    

    public function create()
    {
        return view('RecyclingCenters.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'location' => 'required|string',
            'contact' => 'nullable|string',
            'materials_accepted' => 'required|string',
            'schedule' => 'nullable|string',
        ]);

        RecyclingCenter::create($request->all());
        return redirect()->route('recycling-centers.index')->with('success', 'Centro agregado correctamente.');
    }

    
    public function edit(RecyclingCenter $recyclingCenter)
{
    return view('RecyclingCenters.edit', compact('recyclingCenter'));
}


    public function update(Request $request, RecyclingCenter $recyclingCenter)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'location' => 'required|string',
        'contact' => 'nullable|string',
        'materials_accepted' => 'required|string',
        'schedule' => 'nullable|string',
    ]);

    // Verificar los datos antes de guardar
    \Log::info('Datos recibidos:', $request->all());

    // Actualizar el centro
    $recyclingCenter->update([
        'name' => $request->name,
        'location' => $request->location,
        'contact' => $request->contact,
        'materials_accepted' => $request->materials_accepted,
        'schedule' => $request->schedule,
    ]);

    return redirect()->route('recycling-centers.index')->with('success', 'Centro actualizado correctamente.');
}



    public function destroy(RecyclingCenter $recyclingCenter)
    {
        $recyclingCenter->delete();
        return redirect()->route('recycling-centers.index')->with('success', 'Centro eliminado.');
    }
}
