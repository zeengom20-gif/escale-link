@extends('layouts.app')

@section('content')

<h2 class="mb-4">Modifier le routeur</h2>

<div class="card shadow border-0">

    <div class="card-body">

        <form action="{{ route('routers.update', $router) }}" method="POST">

            @csrf
            @method('PUT')

            <div class="mb-3">
                <label class="form-label">Nom</label>
                <input
                    type="text"
                    name="name"
                    class="form-control"
                    value="{{ old('name', $router->name) }}"
                    required>
            </div>

            <div class="mb-3">
                <label class="form-label">Adresse IP</label>
                <input
                    type="text"
                    name="ip"
                    class="form-control"
                    value="{{ old('ip', $router->ip) }}"
                    required>
            </div>

            <div class="mb-3">
                <label class="form-label">Port API</label>
                <input
                    type="number"
                    name="api_port"
                    class="form-control"
                    value="{{ old('api_port', $router->api_port) }}"
                    required>
            </div>

            <div class="mb-3">
                <label class="form-label">Utilisateur</label>
                <input
                    type="text"
                    name="username"
                    class="form-control"
                    value="{{ old('username', $router->username) }}"
                    required>
            </div>

            <div class="mb-3">
                <label class="form-label">
                    Nouveau mot de passe (laisser vide pour conserver l'ancien)
                </label>
                <input
                    type="password"
                    name="password"
                    class="form-control">
            </div>

            <button type="submit" class="btn btn-primary">
                Enregistrer
            </button>

            <a href="{{ route('routers.index') }}" class="btn btn-secondary">
                Annuler
            </a>

        </form>

    </div>

</div>

@endsection