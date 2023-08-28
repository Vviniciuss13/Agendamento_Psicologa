<!DOCTYPE html>
<html>
<body>
<?php
require_once 'lib/conn.php';
require_once 'functions/dateFunctions.php';
require_once 'functions/validaDados.php';

require_once __DIR__.'../../nav.php';

extract($_POST);

$erro = false;
$erro = validaDados($_POST);

$select = "SELECT * FROM tbl_consulta WHERE hora_consulta = :hora_consulta AND data_consulta = :data_consulta";
$selectstmt = $conn->prepare($select);
$selectstmt->bindValue(":hora_consulta",$hora);
$selectstmt->bindValue(":data_consulta",$data);
$selectstmt->execute();
if($selectstmt->rowCount() > 0){
	?>
    <div class="alert alert-danger">
        <i class="fas fa-times-circle btn-outline-danger"></i>Falha ao Agendar! Já existe uma consulta nesse horário
    </div>
    <meta http-equiv="refresh" content="5; url=<?= url("cadastrar/agenda") ?>">
    <?php
}else{

	$prepare = explode(":", $hora);
	$prep = explode(":", $tempo);

	if($prepare[0] + $prep[0] < 18){
	$sql = "INSERT INTO tbl_consulta VALUES(0, 1, :id_cliente, :data_consulta, :hora_consulta, :tempo_consulta, :valor_consulta, '', 0)";
	$stmt = $conn->prepare($sql);
	$stmt->bindValue(":id_cliente",$id_cliente);
	$stmt->bindValue(":data_consulta",$data);
	$stmt->bindValue(":hora_consulta",$hora);
	$stmt->bindValue(":tempo_consulta",$tempo);
	$stmt->bindValue(":valor_consulta",$valor);
	$stmt->execute();

	if($stmt->rowCount() > 0){
		?>
		<div class="alert alert-success">
			<i class="fas fa-check-circle btn-outline-success"></i>Sucesso ao Agendar!
		</div>
		<meta http-equiv="refresh" content="5; url=<?= url("cadastrar/agenda") ?>">
		<?php
	}else{
		?>
		<div class="alert alert-danger">
			<i class="fas fa-times-circle btn-outline-danger"></i>Falha ao Agendar! Verifique se você preencheu os campos corretamente
		</div>
		<meta http-equiv="refresh" content="5; url=<?= url("cadastrar/agenda") ?>">
		<?php
	}
}else{
	?>
		<div class="alert alert-danger">
			<i class="fas fa-times-circle btn-outline-danger"></i>Esse Horário Ultrapassa seu horario de trabalho
		</div>
		<meta http-equiv="refresh" content="5; url=<?= url("cadastrar/agenda") ?>">
	<?php
}
}
?>
</body>
</html>