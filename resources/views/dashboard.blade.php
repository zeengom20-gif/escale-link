@extends('layouts.app')

@section('content')

<h2 class="mb-4 fw-bold">
    Tableau de bord
</h2>

<div class="row g-4">

    <div class="col-lg-3 col-md-6">
        <div class="card shadow border-0">
            <div class="card-body text-center">
                <i class="fa fa-network-wired fa-2x text-primary mb-2"></i>
                <h6 class="text-muted">Routeurs</h6>
                <h2>{{ $routers ?? 0 }}</h2>
            </div>
        </div>
    </div>

    <div class="col-lg-3 col-md-6">
        <div class="card shadow border-0">
            <div class="card-body text-center">
                <i class="fa fa-layer-group fa-2x text-success mb-2"></i>
                <h6 class="text-muted">Lots</h6>
                <h2>{{ $batches ?? 0 }}</h2>
            </div>
        </div>
    </div>

    <div class="col-lg-3 col-md-6">
        <div class="card shadow border-0">
            <div class="card-body text-center">
                <i class="fa fa-ticket fa-2x text-warning mb-2"></i>
                <h6 class="text-muted">Vouchers</h6>
                <h2>{{ $vouchers ?? 0 }}</h2>
            </div>
        </div>
    </div>

    <div class="col-lg-3 col-md-6">
        <div class="card shadow border-0">
            <div class="card-body text-center">
                <i class="fa fa-check-circle fa-2x text-danger mb-2"></i>
                <h6 class="text-muted">Utilisés</h6>
                <h2>{{ $used ?? 0 }}</h2>
            </div>
        </div>
    </div>

</div>

<div class="row mt-4">

    <div class="col-lg-8">

        <div class="card shadow border-0">

            <div class="card-header">

                Derniers lots

            </div>

            <div class="card-body p-0">

                <table class="table table-hover mb-0">

                    <thead>

                    <tr>

                        <th>Lot</th>

                        <th>Profil</th>

                        <th>Qté</th>

                        <th>Date</th>

                    </tr>

                    </thead>

                    <tbody>

                    @forelse($latestBatches ?? [] as $batch)

                        <tr>

                            <td>{{ $batch->batch_number ?? ('LOT-'.$batch->id) }}</td>

                            <td>{{ $batch->profile }}</td>

                            <td>{{ $batch->quantity }}</td>

                            <td>{{ $batch->created_at->format('d/m/Y H:i') }}</td>

                        </tr>

                    @empty

                        <tr>

                            <td colspan="4" class="text-center">

                                Aucun lot disponible.

                            </td>

                        </tr>

                    @endforelse

                    </tbody>

                </table>

            </div>

        </div>

    </div>

    <div class="col-lg-4">

        <div class="card shadow border-0">

            <div class="card-header">

                Accès rapide

            </div>

            <div class="card-body d-grid gap-2">

                <a href="{{ route('routers.index') }}" class="btn btn-primary">

                    Routeurs

                </a>

                @if(isset($firstRouter))

                <a href="{{ route('vouchers.index',$firstRouter) }}" class="btn btn-success">

                    Générer des vouchers

                </a>

                @endif

                <a href="{{ route('vouchers.history') }}" class="btn btn-dark">

                    Historique

                </a>

            </div>

        </div>

    </div>

</div>

@endsection