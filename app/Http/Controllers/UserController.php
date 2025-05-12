<?php

namespace App\Http\Controllers;


use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
   

        // 🟢 Listar usuarios
        public function index()
        {
            $users = User::all();
            return view('users.index', compact('users'));
        }
    
        // 🟢 Mostrar formulario de creación
        public function create()
        {
            return view('users.create');
        }
    
        // 🟢 Guardar nuevo usuario
        public function store(Request $request)
        {
            $request->validate([
                'name' => 'required',
                'email' => 'required|email|unique:users',
                'password' => 'required|min:6',
                'role' => 'required',
            ]);
    
            User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'role' => $request->role,
            ]);
    
            return redirect()->route('users.index');
        }
    
        // 🟢 Mostrar un usuario
        public function show(User $user)
        {
            return view('users.show', compact('user'));
        }
    
        // 🟢 Mostrar formulario de edición
        public function edit(User $user)
        {
            return view('users.edit', compact('user'));
        }
    
        // 🟢 Actualizar usuario
        public function update(Request $request, User $user)
        {
            $request->validate([
                'name' => 'required',
                'email' => 'required|email|unique:users,email,' . $user->id,
                'role' => 'required',
            ]);
    
            $user->update($request->all());
    
            return redirect()->route('users.index');
        }
    
        // 🟢 Eliminar usuario
        public function destroy(User $user)
        {
            $user->delete();
            return redirect()->route('users.index');
        }
    }
    

