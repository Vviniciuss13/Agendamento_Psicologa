<?php
session_abort();
session_start();
unset($_SESSION['historico']);
if(!isset($_SESSION['user'])){
	header('Location: '.url());
}
?>
<html lang="pt-br">
<head>
	<title>Home</title>
	<link rel="shortcut icon" href="<?= url("img/favicon.ico") ?>"/>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="<?= url("assets/css/bootstrap.css") ?>">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
	<script src="<?= url("assets/js/jquery.js") ?>" type="text/javascript"></script>
	<script src="<?= url("assets/js/bootstrap.js") ?>" type="text/javascript"></script>
	<link rel="stylesheet" href="<?= url("assets/css/menu.css") ?>">
	<link rel="stylesheet" href="<?= url("assets/css/fonts.css") ?>">
	<link rel="stylesheet" href="<?= url("assets/css/calendario.css") ?>">
</head>
<nav class="navbar navbar-expand-lg navbar-dark" style="background: #1D858C; ">
		<a class="navbar-brand" href="<?= url("menu") ?>"><img src="<?= url("assets/img/logo.png") ?>" style="width: 100%; height: 100px;" alt="Simbolo Psicologia"></a>
		
		<div style="color: #FFFFFF; margin: 0 auto ; text-align: center ; " class="navbar-expand "  >
			<h2 class="navbar navbar-justify-content center" > Maria Aparecida Ferreira Lima Evangelista </h2>
			<h4 >PSICÓLOGA </h4>
		</div>

		<div class="navbar-nav"  style="font-size: 32px; float:right;">

		<!--__________________________________________________________________________________________-->
			<li class="nav-item dropdown">
               <a class="nav-link dropdown-toggle::after{ content: none; }" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
               <i class="fas fa-plus-circle"></i>
               </a>
               <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
               <a class="dropdown-item" href="<?= url("cadastrar/cliente") ?>">Cadastrar Cliente</a>
               <a class="dropdown-item" href="<?= url("cadastrar/agenda") ?>">Agendar Consulta</a>
               </div>
               </li>
		<!--__________________________________________________________________________________________-->
		<li class="nav-item dropdown">
               <a class="nav-link dropdown-toggle::after{ content: none; }" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
               <i class="fas fa-list"></i>
               </a>
               <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
               <a class="dropdown-item" href="<?= url("listagem/cliente") ?>">Clientes</a>
               <a class="dropdown-item" href="<?= url("listagem/agenda/consultas") ?>">Agendamentos</a>
			   
               </div>
               </li>
			 <!--__________________________________________________________________________________________-->
			 <li class="nav-item dropdown">
				<a class="nav-link dropdown-toggle::after{ content: none; }" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				<i class="fas fa-file-invoice-dollar"></i>
				</a>
				<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
				<a class="dropdown-item" href="<?= url("financas/pendentes") ?>">Pagamentos Pendentes</a>
				<a class="dropdown-item" href="<?= url("financas/pagos") ?>">Consultas Pagas</a>
				</div>
				</li>
		<!--__________________________________________________________________________________________-->

		<li class="nav-item dropdown">
               <a class="nav-link dropdown-toggle::after{ content: none; }" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
               <i class="fas fa-cog"></i>
               </a>
               <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
               <a class="dropdown-item" href="<?= url("financas") ?>">Finanças</a>
               <a class="dropdown-item" href="<?= url("ajuda") ?>">Ajuda</a>
			   <a class="dropdown-item" href="<?= url("") ?> ">Sair</a>
               </div>
               </li>
		<!--__________________________________________________________________________________________-->
		</div>
</nav>