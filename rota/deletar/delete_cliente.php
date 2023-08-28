<?php
	require_once __DIR__.'../../nav.php';
?>
<!DOCTYPE html>
<html>
<body style="background-color: #ADD9D1">
<?php
    require_once 'lib/conn.php';

	$prepare = explode("/", $_GET['route' ]);
    $id_cliente = $prepare[3];

    $sql = "DELETE FROM tbl_cliente WHERE id_cliente= :id_cliente";
    $stmt = $conn->prepare($sql);
    $stmt->bindValue(":id_cliente",$id_cliente);
    $stmt->execute();
    ?>
    <div class="alert alert-success">
    <i class="far fa-check-circle"></i> Cliente excluido com sucesso!
    <meta http-equiv="refresh" content=" 5;<?= url("listagem/cliente") ?>">
</body>
</html>