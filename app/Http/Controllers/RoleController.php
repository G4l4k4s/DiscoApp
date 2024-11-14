<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Obtener todos los roles
        $roles = Role::all();
        // Retornar la vista con los roles
        return view('roles.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Retornar la vista para crear un nuevo rol
        return view('roles.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validar los datos del formulario
        $request->validate([
            'name' => 'required|unique:roles|max:255',
            'description' => 'nullable',
        ]);

        // Crear un nuevo rol con los datos válidos
        Role::create($request->only(['name', 'description']));

        // Redirigir al índice con mensaje de éxito
        return redirect()->route('roles.index')->with('success', 'Rol creado exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Role $role)
    {
        // Retornar la vista para mostrar un rol específico
        return view('roles.show', compact('role'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Role $role)
    {
        // Retornar la vista de edición con el rol específico
        return view('roles.edit', compact('role'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Role $role)
    {
        // Validar los datos del formulario
        $request->validate([
            'name' => 'required|max:255|unique:roles,name,' . $role->id,
            'description' => 'nullable',
        ]);

        // Actualizar el rol con los datos válidos
        $role->update($request->only(['name', 'description']));

        // Redirigir al índice con mensaje de éxito
        return redirect()->route('roles.index')->with('success', 'Rol actualizado exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Role $role)
    {
        // Eliminar el rol
        $role->delete();

        // Redirigir al índice con mensaje de éxito
        return redirect()->route('roles.index')->with('success', 'Rol eliminado exitosamente.');
    }
}
