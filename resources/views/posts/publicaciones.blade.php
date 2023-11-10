@extends('layouts.app')

@section('content')
<div class="container">
  <div class="titlebar">
    @auth
      @if(auth()->user()->role_id == 2)
        <a class="btn btn-secondary float-end mt-3" href="{{ route('posts.create') }}" role="button">Crear Post</a>
      @endif
    @endauth

    <h1>Últimas publicaciones</h1>
  </div>

  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('posts.category', 'todas_las_categorias') }}">Todas las categorías</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('posts.category', 'comida_mexicana') }}">Comida mexicana</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('posts.category', 'comida_americana') }}">Comida americana</a>
                </li>
            </ul>
        </div>
    </div>
</nav>


  <hr>

  @if ($message = Session::get('success'))
  <div class="alert alert-success">
    <p>{{ $message }}</p>
  </div>
  @endif

  @if (count($posts) > 0)
    @foreach ($posts as $post)
    <div class="row">
        <div class="col-12">
        <div class="card mb-3">
            <div class="row no-gutters">
                <div class="col-md-2">
                    <img src="{{ asset('images/' . $post->image) }}" class="img-fluid" alt="{{ $post->title }}">
                </div>
                <div class="col-md-10">
                    <div class="card-body">
                        <h4 class="card-title">{{ $post->title }}</h4>
                        <p class="card-text">{{ $post->description }}</p>
                        <p class="card-text"><strong>Categoría:</strong> 
                          @if($post->category === 'comida_mexicana')
                            Comida Mexicana
                          @elseif($post->category === 'comida_americana')
                            Comida Americana
                          @endif
                        </p>
                        <p class="card-text"><strong>Autor:</strong> {{ $post->author_name }}</p>
                        <hr>
                        <a href="{{ route('posts.showPost', $post->id) }}" class="btn btn-primary">Ver Publicación</a>

                    </div>
                </div>
            </div>
        </div>
      </div>
    </div>
    @endforeach
  @else
    <p>No Posts found</p>
  @endif
</div>
@endsection
