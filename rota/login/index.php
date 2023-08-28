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
    <div class="content">
        <form action="<?= url("verificar") ?>" method="post">
            <div class="form-conteudo">
                <label for="usuario"><i class="fas fa-user"></i>Nome de Usuario</label>
                <input type="text" name="usuario" id="usuario">
                <br>
                <label for="senha"><i class="fas fa-lock"></i>Senha</label>
                <input type="password" name="senha" id="senha">
                <br>
                <p style="float: left">Esqueceu sua senha? <a href="#.html" style="color: white; opacity: 0.8;">Clique Aqui</a></p>
                <button type="submit" class="btn rounded-pill btn-cadastrar">Entrar</button>
            </div>
        </form>
    </div>
</body>
</html>