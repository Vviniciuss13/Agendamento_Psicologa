<?php
require_once __DIR__.'../../nav.php';

require_once 'lib/conn.php';

extract($_POST);

$sql = "UPDATE tbl_cliente SET nome_cliente = nome_cliente, cpf_cliente = cpf_cliente, ddd_cliente = ddd_cliente, telefone_cliente = telefone_cliente, email_cliente = email_cliente, data_nasc = data_nasc, historico_cliente = :historico, id_endereco = id_endereco WHERE id_cliente = :id";
$stmt = $conn->prepare($sql);
$stmt->bindValue(":historico", $historico);
$stmt->bindValue(":id",$id);
$stmt->execute();

if($stmt->rowCount() > 0){
    ?>
		<div class="alert alert-success">
			<i class="fas fa-check-circle btn-outline-success"></i>Histórico Adicionado com Sucesso!
		</div>
		<meta http-equiv="refresh" content="5; url=<?= url("listagem/cliente") ?>">
		<?php
}else{
    ?>
		<div class="alert alert-danger">
			<i class="fas fa-times-circle btn-outline-danger"></i>Falha ao adicionar o Histórico
		</div>
		<meta http-equiv="refresh" content="5; url=<?= url("listagem/cliente") ?>">
		<?php
}
?>