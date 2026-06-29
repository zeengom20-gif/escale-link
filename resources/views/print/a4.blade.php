<!DOCTYPE html>
<html lang="fr">
<head>

<meta charset="UTF-8">

<title>ESCALE LINK - Impression A4</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<style>

@page{
    size:A4;
    margin:8mm;
}

body{
    margin:0;
    background:#fff;
    font-family:Arial,Helvetica,sans-serif;
    font-size:11px;
}

.toolbar{
    margin:15px;
}

.sheet{

    display:grid;

    grid-template-columns:repeat(3,1fr);

    gap:8px;

}

.ticket{

    border:1px dashed #000;

    height:135px;

    padding:6px;

    display:flex;

    flex-direction:column;

    justify-content:space-between;

    text-align:center;

    page-break-inside:avoid;

}

.header{

    font-weight:bold;

    font-size:13px;

    color:#198754;

}

.subtitle{

    font-size:10px;

    color:#555;

}

.ticket-number{

    font-size:9px;

    color:#888;

}

.code-title{

    font-size:9px;

    color:#666;

}

.code{

    font-size:20px;

    font-weight:bold;

    letter-spacing:2px;

    margin:3px 0;

}

.profile{

    font-size:9px;

}

.footer{

    font-size:9px;

    color:#666;

}

.price{

    font-size:10px;

    font-weight:bold;

}

@media print{

.toolbar{

display:none;

}

body{

margin:0;

}

.sheet{

gap:5px;

}

.ticket{

height:130px;

}

}

</style>

</head>

<body>

<div class="toolbar">

<button
onclick="window.print()"
class="btn btn-success">

Imprimer

</button>

<a
href="{{ url()->previous() }}"
class="btn btn-secondary">

Retour

</a>

</div>

<div class="sheet">

@foreach($vouchers as $voucher)

<div class="ticket">

<div>

<div class="header">

ESCALE LINK

</div>

<div class="subtitle">

Internet Haut Débit

</div>

<div class="ticket-number">

Ticket
{{ $voucher->ticket_number }}

</div>

</div>

<div>

<div class="code-title">

CODE DE CONNEXION

</div>

<div class="code">

{{ $voucher->code }}

</div>

</div>

<div>

<div class="profile">

{{ $voucher->profile }}

</div>

@if($voucher->price>0)

<div class="price">

{{ number_format($voucher->price,0,',',' ') }} FCFA

</div>

@endif

<div class="footer">

www.escalelink.sn

</div>

</div>

</div>

@endforeach

</div>

</body>
</html>