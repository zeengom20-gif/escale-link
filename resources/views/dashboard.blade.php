@extends('layouts.app')

@section('content')

<h2 class="mb-4 fw-bold">
    Tableau de bord
</h2>

<div class="row">

    <div class="col-lg-3 col-md-6 mb-4">

        <div class="card border-0 shadow">

            <div class="card-body">

                <h6 class="text-secondary">
                    Routeurs
                </h6>

                <h2 class="fw-bold">
                    0
                </h2>

            </div>

        </div>

    </div>

    <div class="col-lg-3 col-md-6 mb-4">

        <div class="card border-0 shadow">

            <div class="card-body">

                <h6 class="text-secondary">
                    Hotspots
                </h6>

                <h2 class="fw-bold">
                    0
                </h2>

            </div>

        </div>

    </div>

    <div class="col-lg-3 col-md-6 mb-4">

        <div class="card border-0 shadow">

            <div class="card-body">

                <h6 class="text-secondary">
                    Utilisateurs
                </h6>

                <h2 class="fw-bold">
                    0
                </h2>

            </div>

        </div>

    </div>

    <div class="col-lg-3 col-md-6 mb-4">

        <div class="card border-0 shadow">

            <div class="card-body">

                <h6 class="text-secondary">
                    Vouchers
                </h6>

                <h2 class="fw-bold">
                    0
                </h2>

            </div>

        </div>

    </div>

</div>

<div class="card shadow border-0">

    <div class="card-header bg-white">

        <strong>Bienvenue dans ESCALE LINK</strong>

    </div>

    <div class="card-body">

        <p>
            Plateforme professionnelle de gestion MikroTik.
        </p>

        <a href="/routers" class="btn btn-danger">
            Ajouter un MikroTik
        </a>

    </div>

</div>

@endsection