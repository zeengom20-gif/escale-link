@extends('layouts.app')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">

    <div>

        <h2>

            Lot {{ $batch->batch_number ?? ('LOT-'.$batch->id) }}

        </h2>

        <small class="text-muted">

            {{ $batch->router->name }}

        </small>

    </div>

    <div>

        <a href="{{ route('print.a4',$batch) }}"
           class="btn btn-success">

            Imprimer

        </a>

        <a href="{{ route('vouchers.history') }}"
           class="btn btn-secondary">

            Retour

        </a>

    </div>

</div>

<div class="row mb-4">

    <div class="col-md-3">

        <div class="card">

            <div class="card-body text-center">

                <h6>Profil</h6>

                <h4>{{ $batch->profile }}</h4>

            </div>

        </div>

    </div>

    <div class="col-md-3">

        <div class="card">

            <div class="card-body text-center">

                <h6>Quantité</h6>

                <h4>{{ $batch->quantity }}</h4>

            </div>

        </div>

    </div>

    <div class="col-md-3">

        <div class="card">

            <div class="card-body text-center">

                <h6>Prix</h6>

                <h4>{{ number_format($batch->price,0,',',' ') }} FCFA</h4>

            </div>

        </div>

    </div>

    <div class="col-md-3">

        <div class="card">

            <div class="card-body text-center">

                <h6>Total</h6>

                <h4>{{ number_format($batch->total_amount,0,',',' ') }} FCFA</h4>

            </div>

        </div>

    </div>

</div>

<div class="card shadow border-0">

    <div class="card-header bg-primary text-white">

        Vouchers du lot

    </div>

    <div class="card-body p-0">

        <table class="table table-striped table-hover mb-0">

            <thead>

                <tr>

                    <th>N°</th>

                    <th>Code</th>

                    <th>Statut</th>

                </tr>

            </thead>

            <tbody>

            @foreach($batch->vouchers as $voucher)

                <tr>

                    <td>

                        {{ $voucher->ticket_number }}

                    </td>

                    <td>

                        <strong>

                            {{ $voucher->code }}

                        </strong>

                    </td>

                    <td>

                        @if($voucher->used)

                            <span class="badge bg-danger">

                                Utilisé

                            </span>

                        @else

                            <span class="badge bg-success">

                                Disponible

                            </span>

                        @endif

                    </td>

                </tr>

            @endforeach

            </tbody>

        </table>

    </div>

</div>

@endsection