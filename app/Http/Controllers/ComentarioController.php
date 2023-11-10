<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Comentario;
use Illuminate\Http\Request;
use App\Models\Post;

class ComentarioController extends Controller
{
    public function guardar(Request $request, Post $post)
    {
        // Validar los datos del comentario
        $request->validate([
            'contenido' => 'required|string',
        ]);

        // Crear el comentario asociado al post
        $post->comentario()->create([
            'user_id' => auth()->id(), // Usar el ID del usuario autenticado
            'contenido' => $request->input('contenido'),
        ]);

        return redirect()->back()->with('success', 'Comentario agregado correctamente');
    }

}
