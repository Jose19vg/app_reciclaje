<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RecyclingMaterial;

class RecyclingMaterialController extends Controller
{
    public function index()
    {
        $materials = RecyclingMaterial::all();
        return view('recycling-materials.index', compact('materials'));
    }
}