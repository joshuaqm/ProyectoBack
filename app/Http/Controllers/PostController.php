<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public function index() {
        $posts = Post::orderBy('created_at', 'desc')->get();
        //$categories = Category::all();
        return view('posts.publicaciones', ['posts' => $posts]);
      }
    
    public function create() {
        return view('posts.create');
    }

    // Store post
    public function store(Request $request) {
    // validations
        $request->validate([
           'title' => 'required',
            'description' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'category' => 'required',
            'author_name' => 'required',
        ]);
  
    $post = new Post;
  
    $file_name = time() . '.' . request()->image->getClientOriginalExtension();
    request()->image->move(public_path('images'), $file_name);
  
    $post->title = $request->title;
    $post->description = $request->description;
    $post->image = $file_name;
    $post->category = $request->category;
    $post->author_name = $request->author_name;
  
    $post->save();
    return redirect()->route('posts.publicaciones')->with('success', 'Post created successfully.');
  }

  public function show($id)
{
    // Lógica para mostrar un solo post según el ID proporcionado
    $post = Post::find($id);

    if (!$post) {
        // Manejo de error si el post no se encuentra
        return redirect()->route('posts.publicaciones')->with('error', 'Post not found.');
    }

    // Devuelve la vista de detalles del post con el post recuperado
    return view('posts.show', ['post' => $post]);
}


public function category($categoryName)
{
    $category = null;
    $posts = null;

    if ($categoryName === 'todas_las_categorias') {
        // No se seleccionó ninguna categoría, así que no se aplica filtro
        $posts = Post::all();
    } else {
        // Filtrar por categoría
        $posts = Post::where('category', $categoryName)->get();
        $category = $categoryName;
    }

    return view('posts.category', compact('posts', 'category'));
}



  public function showPost($id)
  {
    $post = Post::find($id);

    if (!$post) {
        // Manejo de error si la publicación no se encuentra
        return redirect()->route('posts.index')->with('error', 'Publicación no encontrada.');
    }

    // Carga la vista de la publicación individual con la publicación recuperada
    return view('posts.showPost', ['post' => $post]);
  }

  /*public function addComment(Request $request, $postId)
  {
      $request->validate([
          'content' => 'required',
      ]);

      $post = Post::find($postId);

      if (!$post) {
          return redirect()->route('posts.publicaciones')->with('error', 'Post not found.');
      }

      $comment = new Comment();
      $comment->content = $request->input('content');
      $comment->user_id = auth()->user()->id; // Asigna el ID del usuario actual al comentario

      $post->comments()->save($comment);

      return redirect()->back()->with('success', 'Comment added successfully.');
  }*/

  

}
