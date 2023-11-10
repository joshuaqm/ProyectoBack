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

            
        </div>
    </div>
</div>
@endsection
