@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <div class="card-header">
                    <h3>{{ $post->title }}</h3>
                </div>
                <div class="card-body">
                    <div class="text-center">
                        <img src="{{ asset('images/' . $post->image) }}" class="img-fluid" alt="{{ $post->title }}">
                    </div>
                    <p class="mt-3"><strong>Fecha de Creación:</strong> {{ $post->created_at }}</p>
                    <p><strong>Autor:</strong> <a href="{{ route('profile.show', ['username' => $post->author_name]) }}">{{ $post->author_name }}</a></p>
                    <p><strong>Categoría:</strong>
                        @if($post->category === 'comida_mexicana')
                            Comida Mexicana
                          @elseif($post->category === 'comida_americana')
                            Comida Americana
                        @endif
                    </p>
                    <hr>

                    <h4>Comentarios</h4>
                    <div class='comments'>
                        @forelse($post->comentario as $comentario)
                        <div class="card mt-3">
                            <div class="card-body">
                            <p><strong>Nombre:</strong>
                            @php
                                $user = \App\Models\User::find($comentario->user_id);
                            @endphp

                            @if ($user)
                                {{ $user->name }}
                            @else
                                {{ $comentario->user_id }}
                            @endif
                            </p>


                                <p><strong>Comentario:</strong> {{ $comentario->contenido }}</p>
                                <p><strong>Fecha de Creación:</strong> {{ $comentario->created_at }}</p>
                            </div>
                        </div>
                        @empty
                             <div class="alert alert-warning">No hay comentarios en esta publicacion</div>
                        @endforelse
                    </div>

                        <div>
                            <h3>Deja un comentario</h3>

                            <form action="{{ route('comentario.guardar', $post) }}" role="form" method="POST">
                                @csrf
                                <input type="hidden" name="post_id" value="{{ $post->id }}">
                                <div>
                                    <label class="form-group">Nombre</label>
                                    <input type="text" class="form-control" value="{{ Auth::user()-> name}}" readonly>
                                </div>

                                <div class="form-group">
                                    <label>Comentario</label>
                                    <textarea name="contenido" class="form-control" rows="4"></textarea>
                                    <input type="hidden" name="user_id" value="{{ Auth::user()-> name}}">
                                </div>

                                <p><button class="btn btn-primary" type="submit">Publicar comentario</button></p>
                            </form>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
