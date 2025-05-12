<?php

namespace App\Http\Controllers;

use App\Models\Reward;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class RewardController extends Controller
{
    public function index()
    {
        $rewards = Reward::all();
        return view('rewards.index', compact('rewards'));
    }

    public function create()
    {
        return view('rewards.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'           => 'required|string|max:255',
            'description'    => 'required|string',
            'points_required'=> 'required|integer|min:1',
            'stock'          => 'required|integer|min:0',
            'image_url'      => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('image_url')) {
            $validated['image_url'] = $request->file('image_url')
                                             ->store('rewards', 'public');
        }

        Reward::create($validated);

        return redirect()
            ->route('rewards.index')
            ->with('success', 'Premio creado exitosamente.');
    }

    public function edit(Reward $reward)
    {
        return view('rewards.edit', compact('reward'));
    }

    public function update(Request $request, Reward $reward)
    {
        $validated = $request->validate([
            'name'           => 'required|string|max:255',
            'description'    => 'required|string',
            'points_required'=> 'required|integer|min:1',
            'stock'          => 'required|integer|min:0',
            'image_url'      => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('image_url')) {
            // borrar la anterior
            if ($reward->image_url) {
                Storage::disk('public')->delete($reward->image_url);
            }
            $validated['image_url'] = $request->file('image_url')
                                             ->store('rewards', 'public');
        }

        $reward->update($validated);

        return redirect()
            ->route('rewards.index')
            ->with('success', 'Premio actualizado exitosamente.');
    }

    public function destroy(Reward $reward)
    {
        if ($reward->image_url) {
            Storage::disk('public')->delete($reward->image_url);
        }
        $reward->delete();

        return redirect()
            ->route('rewards.index')
            ->with('success', 'Premio eliminado exitosamente.');
    }

    public function show(Reward $reward)
    {
        return view('rewards.show', compact('reward'));
    }

    public function redeem(Reward $reward)
    {
        $user = Auth::user();

        if ($user->puntos < $reward->points_required) {
            return back()->with('error', 'No tienes suficientes puntos.');
        }
        if ($reward->stock < 1) {
            return back()->with('error', 'Stock insuficiente.');
        }

        $user->puntos -= $reward->points_required;
        $user->save();

        $reward->stock -= 1;
        $reward->save();

        return back()->with('success', '¡Premio canjeado exitosamente!');
    }
}
