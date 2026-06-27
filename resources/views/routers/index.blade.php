@extends('layouts.app')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">
    <h2>Gestion des Routeurs MikroTik</h2>
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

<div class="card shadow border-0 mb-4">

    <div class="card-header bg-danger text-white">
        Ajouter un MikroTik
    </div>

    <div class="card-body">

        <form action="{{ route('routers.store') }}" method="POST">

            @csrf

            <div class="row">

                <div class="col-md-6 mb-3">
                    <label class="form-label">Nom du routeur</label>
                    <input type="text" name="name" class="form-control" required>
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label">Adresse IP</label>
                    <input type="text" name="ip" class="form-control" placeholder="10.1.1.254" required>
                </div>

                <div class="col-md-4 mb-3">
                    <label class="form-label">Port API</label>
                    <input type="number" name="api_port" class="form-control" value="8728">
                </div>

                <div class="col-md-4 mb-3">
                    <label class="form-label">Utilisateur</label>
                    <input type="text" name="username" class="form-control" value="admin">
                </div>

                <div class="col-md-4 mb-3">
                    <label class="form-label">Mot de passe</label>
                    <input type="password" name="password" class="form-control">
                </div>

            </div>

            <button type="button" class="btn btn-secondary" disabled>
                Tester (bientôt disponible)
            </button>

            <button type="submit" class="btn btn-danger">
                Enregistrer
            </button>

        </form>

    </div>

</div>

<div class="card shadow border-0">

    <div class="card-header bg-dark text-white">
        Routeurs enregistrés
    </div>

    <div class="card-body p-0">

        <table class="table table-hover table-striped mb-0">

            <thead>

                <tr>
                    <th>Nom</th>
                    <th>Adresse IP</th>
                    <th>Port</th>
                    <th>Version</th>
                    <th>État</th>
                    <th width="450">Actions</th>
                </tr>

            </thead>

            <tbody>

            @forelse($routers as $router)

                <tr>

                    <td>{{ $router->name }}</td>
                    <td>{{ $router->ip }}</td>
                    <td>{{ $router->api_port }}</td>
                    <td>{{ $router->routeros_version ?? '-' }}</td>

                    <td>
                        @if($router->status)
                            <span class="badge bg-success">En ligne</span>
                        @else
                            <span class="badge bg-secondary">Non testé</span>
                        @endif
                    </td>

                    <td>

                        <form action="{{ route('routers.test', $router) }}" method="POST" class="d-inline">
                            @csrf

                            <button type="submit" class="btn btn-success btn-sm">
                                Tester
                            </button>
                        </form>

                        <a href="{{ route('hotspot.index', $router) }}"
                           class="btn btn-primary btn-sm">
                            Hotspot
                        </a>

                        <a href="{{ route('vouchers.index', $router) }}"
                           class="btn btn-info btn-sm">
                            Vouchers
                        </a>

                        <a href="{{ route('routers.edit', $router) }}"
                           class="btn btn-warning btn-sm">
                            Modifier
                        </a>

                        <form action="{{ route('routers.destroy', $router) }}"
                              method="POST"
                              class="d-inline">

                            @csrf
                            @method('DELETE')

                            <button
                                type="submit"
                                class="btn btn-danger btn-sm"
                                onclick="return confirm('Voulez-vous vraiment supprimer ce routeur ?')">

                                Supprimer

                            </button>

                        </form>

                    </td>

                </tr>

            @empty

                <tr>
                    <td colspan="6" class="text-center p-4">
                        Aucun routeur enregistré.
                    </td>
                </tr>

            @endforelse

            </tbody>

        </table>

    </div>

</div>

@endsection