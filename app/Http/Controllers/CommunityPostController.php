<?php

namespace App\Http\Controllers;

use App\Models\CommunityPost;
use Illuminate\Http\Request;

class CommunityPostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $communityPosts = CommunityPost::with('user')->latest()->get();
        return view('communityPosts.index', compact('communityPosts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('communityPosts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validación de los datos
        $validated = $request->validate([
            'title'   => 'required|string|max:255',
            'content' => 'required|string',
            'type'    => 'required|in:pregunta,compartir,evento',
        ]);

        // Asignar el usuario autenticado y la fecha actual
        $validated['user_id'] = auth()->id();
        $validated['date'] = now();

        // Crear la publicación
        CommunityPost::create($validated);

        return redirect()->route('community-posts.index')
                         ->with('success', 'Publicación creada con éxito.');
    }

    /**
     * Display the specified resource.
     */
    public function show(CommunityPost $communityPost)
    {
        return view('communityPosts.show', compact('communityPost'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CommunityPost $communityPost)
    {
        return view('communityPosts.edit', compact('communityPost'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CommunityPost $communityPost)
    {
        $validated = $request->validate([
            'title'   => 'required|string|max:255',
            'content' => 'required|string',
            'type'    => 'required|in:pregunta,compartir,evento',
        ]);

        $communityPost->update($validated);

        return redirect()->route('community-posts.index')
                         ->with('success', 'Publicación actualizada correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CommunityPost $communityPost)
{
    
    if ($communityPost->user_id !== auth()->id()) {
        abort(403, 'No autorizado');
    }
    $communityPost->delete();

    return redirect()->route('community-posts.index')
                     ->with('success', 'Publicación eliminada correctamente.');
}
}


