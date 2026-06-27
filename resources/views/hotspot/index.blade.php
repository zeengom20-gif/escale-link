@extends('layouts.app')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">

    <div>
        <h2>Hotspot</h2>
        <small class="text-muted">
            Routeur : {{ $router->name }}
        </small>
    </div>

    <div>

        <a href="{{ route('hotspot.users', $router) }}"
           class="btn btn-primary">

            <i class="fa fa-users"></i>
            Utilisateurs

        </a>

        <a href="{{ route('routers.index') }}"
           class="btn btn-secondary">

            Retour

        </a>

    </div>

</div>

@if(session('success'))

<div class="alert alert-success">

    {{ session('success') }}

</div>

@endif

@if(session('error'))

<div class="alert alert-danger">

    {{ session('error') }}

</div>

@endif

<div class="card shadow border-0">

    <div class="card-header bg-primary text-white">

        <strong>Serveurs Hotspot</strong>

    </div>

    <div class="card-body p-0">

        <table class="table table-hover table-striped mb-0">

            <thead>

                <tr>

                    <th>Nom</th>

                    <th>Interface</th>

                    <th>Pool d'adresses</th>

                    <th>Profil</th>

                </tr>

            </thead>

            <tbody>

            @forelse($servers as $server)

                <tr>

                    <td>{{ $server['name'] ?? '-' }}</td>

                    <td>{{ $server['interface'] ?? '-' }}</td>

                    <td>{{ $server['address-pool'] ?? '-' }}</td>

                    <td>{{ $server['profile'] ?? '-' }}</td>

                </tr>

            @empty

                <tr>

                    <td colspan="4" class="text-center p-4">

                        Aucun serveur Hotspot trouvé.

                    </td>

                </tr>

            @endforelse

            </tbody>

        </table>

    </div>

</div>

@endsection