@extends('layouts.app')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">

    <div>

        <h2>Historique des lots</h2>

        <small class="text-muted">

            Tous les lots de vouchers générés

        </small>

    </div>

    <a href="{{ route('routers.index') }}" class="btn btn-secondary">

        Retour

    </a>

</div>

@if(session('success'))

<div class="alert alert-success">

    {{ session('success') }}

</div>

@endif

<div class="card shadow border-0">

    <div class="card-header bg-success text-white">

        Historique

    </div>

    <div class="card-body">

        <form method="GET" class="row mb-3">

            <div class="col-md-4">

                <input
                    type="text"
                    name="search"
                    value="{{ $search }}"
                    class="form-control"
                    placeholder="Rechercher un lot...">

            </div>

            <div class="col-md-2">

                <button class="btn btn-primary">

                    Rechercher

                </button>

            </div>

        </form>

        <table class="table table-striped table-hover">

            <thead>

                <tr>

                    <th>Lot</th>

                    <th>Date</th>

                    <th>Routeur</th>

                    <th>Profil</th>

                    <th>Qté</th>

                    <th>Prix</th>

                    <th>Actions</th>

                </tr>

            </thead>

            <tbody>

            @forelse($batches as $batch)

                <tr>

                    <td>

                        <strong>

                            {{ $batch->batch_number ?? ('LOT-'.$batch->id) }}

                        </strong>

                    </td>

                    <td>

                        {{ $batch->created_at->format('d/m/Y H:i') }}

                    </td>

                    <td>

                        {{ $batch->router->name }}

                    </td>

                    <td>

                        {{ $batch->profile }}

                    </td>

                    <td>

                        {{ $batch->quantity }}

                    </td>

                    <td>

                        {{ number_format($batch->price,0,',',' ') }} FCFA

                    </td>

                    <td>

                        <a
                            href="{{ route('vouchers.history.show',$batch) }}"
                            class="btn btn-primary btn-sm">

                            Voir

                        </a>

                        <a
                            href="{{ route('print.a4',$batch) }}"
                            class="btn btn-success btn-sm">

                            Imprimer

                        </a>

                        <form
                            action="{{ route('vouchers.history.destroy',$batch) }}"
                            method="POST"
                            class="d-inline">

                            @csrf

                            @method('DELETE')

                            <button
                                class="btn btn-danger btn-sm"
                                onclick="return confirm('Supprimer ce lot ?')">

                                Supprimer

                            </button>

                        </form>

                    </td>

                </tr>

            @empty

                <tr>

                    <td colspan="7" class="text-center">

                        Aucun lot trouvé.

                    </td>

                </tr>

            @endforelse

            </tbody>

        </table>

        {{ $batches->links() }}

    </div>

</div>

@endsection