<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
 /**
     * Muestra todos los usuarios y sus roles.
     */
    public function index(Request $request)
    {
        // Get the search query
        $search = $request->input('search');

        // Query users with roles, applying case-insensitive search if a search term exists
        $users = User::with('roles')
            ->when($search, function ($query, $search) {
                return $query->where('name', 'LIKE', '%' . $search . '%');
            })
            ->get();

        // Obtiene todos los roles disponibles
        $roles = Role::all();

        return view('roles.index', compact('users', 'roles'));
    }
    /**
     * Asigna un rol a un usuario.
     */
    public function assignRole(Request $request, $userId)
    {
        $request->validate([
            'role' => 'required|string|exists:roles,name',
        ]);

        $user = User::findOrFail($userId);
        $role = $request->input('role');

        if (!$user->hasRole($role)) {
            $user->assignRole($role);
            return redirect()->back()->with('success', "El rol '$role' ha sido asignado al usuario.");
        }

        return redirect()->back()->with('error', "El usuario ya tiene el rol '$role'.");
    }

    /**
     * Elimina un rol específico de un usuario.
     */
    public function removeRole(Request $request, $userId)
    {
        $request->validate([
            'role' => 'required|string|exists:roles,name',
        ]);

        $user = User::findOrFail($userId);
        $role = $request->input('role');

        // No permite que el administrador elimine su propio rol
        if ($user->id === auth()->id() && $role === 'admin') {
            return redirect()->back()->with('error', 'No puedes eliminar tu propio rol de admin.');
        }

        if ($user->hasRole($role)) {
            $user->removeRole($role);
            return redirect()->back()->with('success', "El rol '$role' ha sido eliminado del usuario.");
        }

        return redirect()->back()->with('error', "El usuario no tiene el rol '$role'.");
    }
}
