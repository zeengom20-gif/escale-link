<!DOCTYPE html>
<html lang="fr">
<head>

<meta charset="UTF-8">

<title>Impression Vouchers</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<style>

body{
    background:#fff;
    font-family:Arial, Helvetica, sans-serif;
    font-size:12px;
    margin:20px;
}

.no-print{
    margin-bottom:20px;
}

.ticket-container{
    display:flex;
    flex-wrap:wrap;
}

.ticket-wrapper{
    width:25%;
    padding:8px;
    box-sizing:border-box;
}

.ticket{
    border:1px dashed #000;
    padding:10px;
    text-align:center;
    min-height:230px;
    box-sizing:border-box;
}

.ticket h5{
    margin:0;
    font-weight:bold;
}

.ticket hr{
    margin:8px 0;
}

.code{
    font-size:22px;
    font-weight:bold;
    margin:10px 0;
    letter-spacing:2px;
}

.info{
    margin-top:8px;
    line-height:1.6;
}

.footer{
    margin-top:12px;
    font-size:11px;
}

@media print{

    .no-print{
        display:none;
    }

    body{
        margin:0;
    }

    .ticket-wrapper{
        page-break-inside:avoid;
        break-inside:avoid;
    }

}

</style>

</head>

<body>

<div class="no-print">

<button onclick="window.print()" class="btn btn-success">
Imprimer
</button>

<a href="{{ url()->previous() }}" class="btn btn-secondary">
Retour
</a>

</div>

<div class="ticket-container">

@foreach($vouchers as $voucher)

<div class="ticket-wrapper">

<div class="ticket">

<h5>ESCALE LINK</h5>

<hr>

<div class="code">
{{ $voucher->code }}
</div>

<div class="info">

Utilisateur :
<b>{{ $voucher->username }}</b>

<br>

Mot de passe :
<b>{{ $voucher->password }}</b>

<br>

Profil :
<b>{{ $voucher->profile }}</b>

</div>

<hr>

<div class="footer">
Bon de connexion
</div>

</div>

</div>

@endforeach

</div>

</body>
</html>