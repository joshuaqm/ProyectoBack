@extends('layouts.app')

@section('content')
<div class="container">
    @if ($category)
        @if ($category === 'comida_mexicana')
            <h1>Publicaciones en la categoría: Comida Mexicana</h1>
        @elseif ($category === 'comida_americana')
            <h1>Publicaciones en la categoría: Comida Americana</h1>
        @endif
    @else
        <h1>Publicaciones en la categoría: Todas las categorías</h1>
    @endif

    <hr>
    <a class="btn btn-primary" href="{{ route('posts')}}">Volver a Posts</a>
    <hr>
    @if (!is_null($posts) && $posts->count() > 0)
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
        <p>No hay publicaciones en esta categoría.</p>
    @endif
</div>
@endsection
