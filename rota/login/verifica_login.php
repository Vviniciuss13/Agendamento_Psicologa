<?php

require_once 'lib/conn.php';

extract($_POST);

$sql = "SELECT * FROM tb_usuario 
WHERE nome_usuario = :nome AND senha_usuario = :senha 
OR email_usuario = :nome AND senha_usuario = :senha";

$stmt = $conn->prepare($sql);
$stmt->bindValue(":nome",$usuario);
$stmt->bindValue(":senha",$senha);
$stmt->execute();

if($stmt->rowCount() >= 1){
    session_start();
    $_SESSION['user'] = 1;
    header("Location: ".url("menu"));
} else{
    ?>
    <!DOCTYPE html>
    <html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Login</title>
        <link rel="stylesheet" href="assets/css/login2.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
        <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css"
        rel="stylesheet"
        integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We"
        crossorigin="anonymous"
        />
        <link rel="stylesheet" href="assets/css/fonts.css">
    </head>
    <body>
        <div class="container bg-light">
                <div class="d-flex justify-content-center" style="margin-top: 10%; padding: 200px">
                <h1>Email ou/e senha incorretos!</h1>
                </div>
        </div>
    </body>
    </html>
    <meta http-equiv="refresh" content="5; <?= url() ?>">
    <?php
}
?>