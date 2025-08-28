<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class AdminUserController extends Controller
{
    public function create()
    {
        $roles = Role::all(); // Para mostrar en el select
        return view('usuarios.createU', compact('roles'));
    }

    public function store(Request $request)
    {
      $request->validate([
        'nombre' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email',
        'rol' => 'required|exists:roles,name',
    ]);
        $user = User::create([
            'nombre' => $request->nombre,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $user->assignRole($request->rol);

        return redirect()->route('admin.users.create')->with('success', 'Usuario registrado correctamente.');
    }

    public function index()
    {
        $usuarios = \App\Models\User::with('roles')->get(); // incluye roles
        return view('usuarios.listaU', compact('usuarios'));
    }

    public function show($id)
    {
        $usuario = \App\Models\User::with('roles')->findOrFail($id);
        return view('usuarios.show', compact('usuario'));
    }

    public function edit($id)
    {
        $usuario = User::findOrFail($id);
        $roles = Role::all();
        return view('usuarios.edit', compact('usuario', 'roles'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
    'nombre' => 'required|string|max:255',
    'email' => [
        'required',
        'email',
        Rule::unique('users', 'email')->ignore($id, 'id_usuario'),
    ],
    'rol' => 'required|exists:roles,name',
]);

        $usuario = User::findOrFail($id);
        $usuario->update([
            'nombre' => $request->nombre,
            'email' => $request->email,
        ]);

        $usuario->syncRoles([$request->rol]);

        return redirect()->route('admin.users.index')->with('success', 'Usuario actualizado correctamente.');
    }


}
