@extends('layouts.app')
@section('content')
<div class="container">
  
  <h1>Crear Post</h1>
  <section class="mt-3">
    <form method="post" action="{{ route('posts.store') }}" enctype="multipart/form-data">
      @csrf
      
      @if ($errors->any())
        <div class="alert alert-danger">
          <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
      @endif
      <div class="card p-3">
        <label for="floatingInput">Título</label>
        <input class="form-control" type="text" name="title">
        <label for="floatingTextArea">Descripción de la publicación</label>
        <textarea class="form-control" name="description" id="floatingTextarea" cols="30" rows="10"></textarea>
        <label for="formFile" class="form-label">Añadir imagen</label>
        <img src="" alt="" class="img-blog">
        <input class="form-control" type="file" name="image">
        <label for="category">Categoría</label>
        <select class="form-select" name="category" id="category">
          <option value="comida_mexicana">Comida Mexicana</option>
          <option value="comida_americana">Comida Americana</option>
        </select>

        <label for="author_name">Autor</label>
        <input type="text" name="author_name" id="autor_name" value="{{ auth()->user()->name }}" readonly>

      </div>
      <button class="btn btn-secondary m-3">Guardar</button>
    </form>
  </section>
    
</div>
@endsection