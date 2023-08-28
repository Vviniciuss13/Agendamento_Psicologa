<?php
    session_start();
    unset($_SESSION['user']);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link rel="stylesheet" href="assets/css/fonts.css">
    <link rel="stylesheet" href="assets/css/login.css">
</head>
<body>
    <div class="content container pt-5">
        <form action="<?= url("verificar") ?>" method="post">
            <div class="form-conteudo">
                <div class="mb-3 mt-3">
                    <label for="usuario" class="form-label"><i class="fas fa-user form-label"></i>Nome de Usuario</label>
                    <input type="text" name="usuario" id="usuario" class="form-control">
                </div>
                <div class="mb-3 mt-3">
                    <label for="senha" class="form-label"><i class="fas fa-lock"></i>Senha</label>
                    <input type="password" name="senha" id="senha" class="form-control">
                </div>
                <p style="float: left">Esqueceu sua senha? <a href="#.html" style="color: white; opacity: 0.8;">Clique Aqui</a></p>
                <div>
                    <button type="submit" class="btn rounded-pill btn-cadastrar">Entrar</button>
                </div>
            </div>
        </form>
    </div>
</body>
</html>