@extends('layouts.app')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">

    <div>
        <h2>Utilisateurs Hotspot</h2>
        <small class="text-muted">
            Routeur : {{ $router->name }}
        </small>
    </div>

    <div>
        <a href="{{ route('hotspot.index', $router) }}" class="btn btn-secondary">
            Retour
        </a>
    </div>

</div>

@if(session('error'))
<div class="alert alert-danger">
    {{ session('error') }}
</div>
@endif

<div class="card shadow border-0">

    <div class="card-header bg-primary text-white">
        Utilisateurs
    </div>

    <div class="card-body p-0">

        <table class="table table-hover table-striped mb-0">

            <thead>

                <tr>
                    <th>Nom</th>
                    <th>Profil</th>
                    <th>Uptime</th>
                    <th>Commentaire</th>
                </tr>

            </thead>

            <tbody>

            @forelse($users as $user)

                <tr>

                    <td>{{ $user['name'] ?? '-' }}</td>
                    <td>{{ $user['profile'] ?? '-' }}</td>
                    <td>{{ $user['uptime'] ?? '-' }}</td>
                    <td>{{ $user['comment'] ?? '-' }}</td>

                </tr>

            @empty

                <tr>
                    <td colspan="4" class="text-center p-4">
                        Aucun utilisateur Hotspot.
                    </td>
                </tr>

            @endforelse

            </tbody>

        </table>

    </div>

</div>

@endsection