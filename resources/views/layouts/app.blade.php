<!DOCTYPE html>
<html lang="fr">

<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>ESCALE LINK</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" rel="stylesheet">

<style>

body{
    margin:0;
    background:#eef2f7;
    font-family:Segoe UI,Tahoma,Geneva,Verdana,sans-serif;
}

.sidebar{
    position:fixed;
    left:0;
    top:0;
    width:250px;
    height:100vh;
    background:#1f2937;
    color:white;
    overflow:auto;
}

.logo{
    background:#dc2626;
    padding:22px;
    text-align:center;
    font-size:24px;
    font-weight:bold;
}

.logo small{
    display:block;
    font-size:12px;
    color:#ffdede;
}

.sidebar a{
    display:block;
    padding:14px 22px;
    color:white;
    text-decoration:none;
    transition:.2s;
}

.sidebar a:hover{
    background:#374151;
    padding-left:28px;
}

.topbar{
    margin-left:250px;
    height:65px;
    background:white;
    border-bottom:1px solid #ddd;
    display:flex;
    align-items:center;
    justify-content:space-between;
    padding:0 25px;
}

.content{
    margin-left:250px;
    padding:25px;
}

.footer{
    margin-left:250px;
    text-align:center;
    padding:15px;
    color:#666;
    font-size:13px;
}

.version{
    color:#999;
    font-size:13px;
}

</style>

</head>

<body>

<div class="sidebar">

    <div class="logo">
        ESCALE LINK
        <small>Network Manager</small>
    </div>

    <a href="/"><i class="fa fa-home"></i> Tableau de bord</a>

    <a href="/routers"><i class="fa fa-network-wired"></i> Routeurs</a>

    <a href="#"><i class="fa fa-wifi"></i> Hotspot</a>

    <a href="#"><i class="fa fa-ticket"></i> Vouchers</a>

    <a href="#"><i class="fa fa-users"></i> Utilisateurs</a>

    <a href="#"><i class="fa fa-chart-line"></i> Rapports</a>

    <a href="#"><i class="fa fa-gear"></i> Paramètres</a>

</div>

<div class="topbar">

    <div>
        <strong>ESCALE LINK</strong>
        <div class="version">Version 0.4.0</div>
    </div>

    <div>
        <i class="fa fa-user-circle"></i>
        Administrateur
    </div>

</div>

<div class="content">

    @yield('content')

</div>

<div class="footer">

    © {{ date('Y') }} ESCALE LINK — Développé par Mamadou cesaire Ngom 221 77 464 69 27

</div>

</body>

</html>