<!DOCTYPE html>
<html>
<head>
	<title>Cadastro</title>
	<link rel="shortcut icon" href="<?= url("img/favicon.ico") ?>"/>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="<?= url("assets/css/bootstrap.css") ?>">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
	<script src="<?= url("assets/js/jquery.js") ?>" type="text/javascript"></script>
	<script src="<?= url("assets/js/bootstrap.js") ?>" type="text/javascript"></script>
	<link rel="stylesheet" href="<?= url("assets/css/menu.css") ?>">
	<link rel="stylesheet" href="<?= url("assets/css/fonts.css") ?>">
    <link rel="shortcut icon" href="<?= url("assets/img/logo_cida.ico") ?>"/>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark" style="background: #1D858C; ">
		<a class="navbar-brand" href="<?= url("menu") ?>"><img src="<?= url("assets/img/logo.png") ?>" style="width: 100%; height: 100px;" alt="Simbolo Psicologia"></a>
		
		<div style="color: #FFFFFF; margin: 0 auto ; text-align: center ; " class="navbar-expand "  >
			<h2 class="navbar navbar-justify-content center" > Maria Aparecida Ferreira Lima Evangelista </h2>
			<h4 >PSICÓLOGA </h4>
		</div>

		<div class="navbar-nav"  style="font-size: 32px; float:right;">
			<ul>
				<li><a href="#" class="nav-item nav-link"><i class="fas fa-plus-circle"></i></a>
					<ul>
						<li><a href="<?= url("cadastrar/cliente") ?>">Cadastrar Cliente</a></li>
						<li><a href="<?= url("cadastrar/agenda") ?>">Agendar Consulta</a></li>
					</ul>
				</li>
			</ul>
			<a href="<?= url("listagem/cliente") ?>" class= "nav-item nav-link" ><i class="fas fa-list"></i></a>
			<a href="#.php"  class="nav-item nav-link"><i class="fas fa-cog"></i></a>
		</div>
</nav>
<?php
require_once 'lib/conn.php';
require_once 'functions/dateFunctions.php';
require_once 'functions/validaDados.php';

extract($_POST);

$erro = false;
$erro = validaDados($_POST);

if (!dateValidation($_POST['data_nasc']) && !$erro) {
    $erro = "Data inválida.";
}

if ($erro) {
    echo $erro;
} else {
    $idade = ageCalculator($_POST['data_nasc']);   
}

$celular = explode(" ",$telefone);
$ddd = $celular[0];
$_celular = $celular[1];

$selectEndereco = "SELECT * FROM tbl_endereco WHERE cep_endereco = :cep AND numero_endereco = :numero AND rua_endereco = :rua";
$stmtselect = $conn->prepare($selectEndereco);
$stmtselect->bindValue(":cep",$cep);
$stmtselect->bindValue(":numero",$numero);
$stmtselect->bindValue(":rua",$rua);
$stmtselect->execute();
$fetch = $stmtselect->fetch(PDO::FETCH_ASSOC);
if($fetch['id_endereco'] = null){
    $id_endereco = null;
}else{
    $id_endereco = $fetch['id_endereco'];
}

if($id_endereco != null){
    $sqlCliente = "INSERT INTO tbl_cliente VALUES(0, :nome, :cpf, :ddd, :celular, :email, :data_nasc, '', :id_endereco)";
    $stmtCliente = $conn->prepare($sqlCliente);
    $stmtCliente->bindValue(":nome", $nome);
    $stmtCliente->bindValue(":cpf", $cpf);
    $stmtCliente->bindValue(":ddd", $ddd);
    $stmtCliente->bindValue(":celular", $_celular);
    $stmtCliente->bindValue(":email", $email);
    $stmtCliente->bindValue(":data_nasc", $data_nasc);
    $stmtCliente->bindValue(":id_endereco", $id_endereco);
    $stmtCliente->execute();

    if($stmtCliente->rowCount() > 0){
        ?>
        <div class="alert alert-success">
            <i class="fas fa-check-circle btn-outline-success"></i>Sucesso ao Cadastrar!
        </div>
        <meta http-equiv="refresh" content="5; url=<?= url("listagem/cliente") ?>">
        <?php
    }else{
        ?>
        <div class="alert alert-danger">
            <i class="fas fa-times-circle btn-outline-danger"></i>Falha ao Cadastrar! Verifique se você preencheu os campos corretamente
        </div>
        <meta http-equiv="refresh" content="5; url=<?= url("cadastrar/cliente") ?>">
        <?php
    }
} else{
    $sqlEndereco = "INSERT INTO tbl_endereco VALUES(0, :cep, :estado, :numero, :cidade, :bairro, :rua)";
    $stmtEndereco = $conn->prepare($sqlEndereco);
    $stmtEndereco->bindValue(":cep",$cep);
    $stmtEndereco->bindValue(":estado",$uf);
    $stmtEndereco->bindValue(":numero",$numero);
    $stmtEndereco->bindValue(":cidade",$cidade);
    $stmtEndereco->bindValue(":bairro",$bairro);
    $stmtEndereco->bindValue(":rua",$rua);
    $stmtEndereco->execute();

    $selectEndereco = "SELECT * FROM tbl_endereco WHERE cep_endereco = :cep AND numero_endereco = :numero AND rua_endereco = :rua";
    $stmtselect = $conn->prepare($selectEndereco);
    $stmtselect->bindValue(":cep",$cep);
    $stmtselect->bindValue(":numero",$numero);
    $stmtselect->bindValue(":rua",$rua);
    $stmtselect->execute();
    $fetch = $stmtselect->fetch(PDO::FETCH_ASSOC);
    $id_endereco = $fetch['id_endereco'];

    $sqlCliente = "INSERT INTO tbl_cliente VALUES(0, :nome, :cpf, :ddd, :celular, :email, :data_nasc, '', :id_endereco)";
    $stmtCliente = $conn->prepare($sqlCliente);
    $stmtCliente->bindValue(":nome", $nome);
    $stmtCliente->bindValue(":cpf", $cpf);
    $stmtCliente->bindValue(":ddd", $ddd);
    $stmtCliente->bindValue(":celular", $_celular);
    $stmtCliente->bindValue(":email", $email);
    $stmtCliente->bindValue(":data_nasc", $data_nasc);
    $stmtCliente->bindValue(":id_endereco", $id_endereco);
    $stmtCliente->execute();

    if($stmtCliente->rowCount() > 0 && $stmtEndereco->rowCount() > 0){
        ?>
        <div class="alert alert-success">
            <i class="fas fa-check-circle btn-outline-success"></i>Sucesso ao Cadastrar!
        </div>
        <meta http-equiv="refresh" content="5; url=<?= url("listagem/cliente") ?>">
        <?php
    }else{
        ?>
        <div class="alert alert-danger">
            <i class="fas fa-times-circle btn-outline-danger"></i>Falha ao Cadastrar! Verifique se você preencheu os campos corretamente
        </div>
        <meta http-equiv="refresh" content="5; url=<?= url("cadastrar/cliente") ?>">
        <?php
    }
}
?>
</body>
</html>