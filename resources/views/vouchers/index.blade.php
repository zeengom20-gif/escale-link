@extends('layouts.app')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">

    <div>
        <h2>Génération de Vouchers</h2>

        <small class="text-muted">
            Routeur : {{ $router->name }}
        </small>
    </div>

    <div class="d-flex gap-2">

        <a href="{{ route('vouchers.history') }}"
           class="btn btn-dark">

            <i class="fa fa-history"></i>

            Historique

        </a>

        @if($lastBatch)

        <a href="{{ route('print.a4', $lastBatch) }}"
           class="btn btn-primary">

            <i class="fa fa-print"></i>

            Imprimer A4

        </a>

        @endif

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

<div class="card shadow border-0 mb-4">

    <div class="card-header bg-success text-white">

        Nouveau lot de vouchers

    </div>

    <div class="card-body">

        <form action="{{ route('vouchers.generate', $router) }}" method="POST">

            @csrf

            <div class="row">

                <div class="col-md-3 mb-3">

                    <label class="form-label">

                        Profil Hotspot

                    </label>

                    <select
                        name="profile"
                        class="form-select"
                        required>

                        @foreach($profiles as $profile)

                            <option value="{{ $profile['name'] }}">

                                {{ $profile['name'] }}

                            </option>

                        @endforeach

                    </select>

                </div>

                <div class="col-md-2 mb-3">

                    <label class="form-label">

                        Quantité

                    </label>

                    <input
                        type="number"
                        name="quantity"
                        class="form-control"
                        value="10"
                        min="1">

                </div>

                <div class="col-md-2 mb-3">

                    <label class="form-label">

                        Préfixe

                    </label>

                    <input
                        type="text"
                        name="prefix"
                        class="form-control"
                        value="EL">

                </div>

                <div class="col-md-2 mb-3">

                    <label class="form-label">

                        Longueur

                    </label>

                    <input
                        type="number"
                        name="length"
                        class="form-control"
                        value="6">

                </div>

                <div class="col-md-3 mb-3 d-flex align-items-end">

                    <button class="btn btn-success w-100">

                        <i class="fa fa-ticket"></i>

                        Générer

                    </button>

                </div>

            </div>

        </form>

    </div>

</div>

@if($lastBatch)

<div class="card shadow border-0">

    <div class="card-header bg-primary text-white">

        Dernier lot généré

    </div>

    <div class="card-body">

        <div class="row">

            @foreach($lastBatch->vouchers as $voucher)

                <div class="col-md-3 mb-3">

                    <div class="border rounded p-3 text-center">

                        <h6>

                            ESCALE LINK

                        </h6>

                        <hr>

                        <small class="text-muted">

                            Ticket

                            {{ $voucher->ticket_number ?? '-' }}

                        </small>

                        <br><br>

                        <div class="display-6 fw-bold">

                            {{ $voucher->code }}

                        </div>

                        <br>

                        <span class="badge bg-success">

                            {{ $voucher->profile }}

                        </span>

                    </div>

                </div>

            @endforeach

        </div>

    </div>

</div>

@endif

@endsection