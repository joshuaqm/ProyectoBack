@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mt-4">Perfil de Usuario</h1>

    <div class="row mt-4">
        <div class="col-md-6">
            <h3>Datos de Usuario</h3>
            <p><strong>Nombre:</strong> {{ $user->name }}</p>
            <p><strong>Email:</strong> {{ $user->email }}</p>
            <p><strong>Rol:</strong>
            @if(auth()->user()->role_id == 1)
                    Usuario normal
                @elseif(auth()->user()->role_id == 2)
                    Administrador
                @endif
            </p>
            <p><strong>Nacionalidad:</strong> {{ $user->nacionalidad }}</p>
            <p><strong>Edad:</strong> {{ $user->edad }}</p>
            <p><strong>Descripción:</strong> {{ $user->descripcion }}</p>
                
        </div>

        <div class="col-md-6">
            @if ($user->avatar)
                <img src="{{ asset('storage/' . $user->avatar) }}" alt="Foto de perfil" class="img-fluid">
            @else
                <p class="mt-4">Sin foto de perfil</p>
            @endif

            <form action="{{ route('uploadProfileImage') }}" method="POST" enctype="multipart/form-data" class="mt-4">
                @csrf
                <div class="form-group">
                    <label for="avatar">Cargar foto de perfil:</label>
                    <input type="file" name="avatar" id="avatar" accept="image/*">
                </div>
                <button type="submit" class="btn btn-primary">Subir foto de perfil</button>
            </form>
        </div>
    </div>

    <div class="mt-4">
        <h3>Actualizar Información Adicional</h3>
        <form method="POST" action="{{ route('updateProfile') }}">
            @csrf
            <div class="form-group">
                <label for="nacionalidad">Nacionalidad:</label>
                <input type="text" name="nacionalidad" class="form-control" value="{{ auth()->user()->nacionalidad }}">
            </div>
            <div class="form-group">
                <label for="edad">Edad:</label>
                <input type="text" name="edad" class="form-control" value="{{ auth()->user()->edad }}">
            </div>
            <div class="form-group">
                <label for="descripcion">Descripción:</label>
                <input type="text" name="descripcion" class="form-control" value="{{ auth()->user()->descripcion }}">
            </div>
            <button type="submit" class="btn btn-primary">Actualizar Perfil</button>
        </form>
    </div>
</div>
@endsection
