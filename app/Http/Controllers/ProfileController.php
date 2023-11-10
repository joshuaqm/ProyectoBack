<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;


class ProfileController extends Controller
{
    public function index()
    {
        // Aquí puedes acceder a los datos del usuario autenticado y pasarlo a la vista
        $user = auth()->user();
        return view('profile', compact('user'));
    }

    public function uploadProfileImage(Request $request)
    {
        $request->validate([
        'avatar' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Ajusta las reglas de validación según tus necesidades
        ]);

        if ($request->file('avatar')) {
            $user = auth()->user();
            $imagePath = $request->file('avatar')->store('avatars', 'public'); // Almacenar en una carpeta 'avatars'
            $user->update(['avatar' => $imagePath]);
        }

        return redirect()->back()->with('success', 'La foto de perfil se ha subido correctamente.');
    }

    public function updateProfile(Request $request)
    {
        $user = auth()->user();

        $data = $request->validate([
            'nacionalidad' => ['string', 'max:255'],
            'edad' => ['numeric', 'min:0'],
            'descripcion' => ['string', 'max:255'],
        ]);

        $user->update($data);

        return redirect()->back()->with('success', 'Perfil actualizado exitosamente.');
    }

    public function show($username)
{
    // Buscar el usuario por su nombre de usuario en la base de datos
    $user = DB::table('users')->where('name', $username)->first();

    if (!$user) {
        // Manejo de error si el usuario no se encuentra
        return redirect()->route('profile.index')->with('error', 'Perfil no encontrado.');
    }

    // Devuelve la vista de perfil del usuario con el objeto de usuario recuperado
    return view('profile.show', ['user' => $user]);
}

}
