<?php
	session_start();
	if(!isset($_SESSION["historico"])){
		header("Location: ".url("listagem/cliente"));
	}
	require_once __DIR__."../../nav.php";
?>
<!DOCTYPE html>
<html lang='pt-br'>
<style>
	body{
		background-color: #ADD9D1;
	}

	.historico{
		background-color: #FFF;
		margin-top: 2%;
		margin-right: 10%;
		margin-left: 10%;
		padding-bottom:7%;
		padding-top:2%;
		border-radius: 10px 5% / 20px 25em 30px 35em;
	}

	.texto{
		text-align: justify;
		font-family: Arial;
		font-size: 110%;
		margin-right:2%;
		margin-left:2%;
	}

	.botao{
		display: flex;
		justify-content: center;
		padding-top: 20px !important;
	}

	textarea{
		width: 100%;
	}

	
</style>
<body>
    <?php

        require_once 'lib/conn.php';


		$id_array = explode("/", $_GET['route']);
		$id = $id_array[2];

		$sql = "SELECT nome_cliente, historico_cliente FROM tbl_cliente WHERE id_cliente = :id_cliente";
		$stmt = $conn->prepare($sql);
		$stmt->bindValue(":id_cliente", $id);
		$stmt->execute();
		$stmt = $stmt->fetch(PDO::FETCH_ASSOC);
		$nome = $stmt['nome_cliente'];
		$historico_cliente = $stmt['historico_cliente'];
    ?>

	<div class="historico">
	<form action="<?= url("historico/adicionar") ?>" method="post">
	<input type="text" style="display: none;" id="id" name="id" value="<?=$id?>">
	<div class="texto">
		<b>Nome: <?= $nome ?></b>
	<br><br>
		<b>Histórico:</b><br>
		<textarea cols="120" rows="30" id="historico" name="historico"><?=$historico_cliente?></textarea>
	</div>
	<div class="botao">
		<button type="submit" class="btn btn-success">Adicionar Anotação</button>
	</div>
	</form>
	</div>
</body>
</html>