<?php
require_once 'lib/conn.php';

extract($_POST);

$id_array = explode("/", $_GET['route']);
$id = $id_array[3];

$sql = "SELECT * FROM tb_usuario 
WHERE nome_usuario = :nome AND senha_usuario = :senha 
OR email_usuario = :nome AND senha_usuario = :senha";

$stmt = $conn->prepare($sql);
$stmt->bindValue(":nome",$usuario);
$stmt->bindValue(":senha",$senha);
$stmt->execute();

if($stmt->rowCount() >= 1){
    session_start();
    $_SESSION['historico'] = 1;
    ?>
    <meta http-equiv="refresh" content ="0; url=<?= url("historico/$id") ?>">
    <?php
} else{
    echo "E-Mail e/ou senha incorretos!";
    ?>
    <meta http-equiv="refresh" content="3; url=<?= url("historico/acesso/$id") ?>">
    <?php
}
?>