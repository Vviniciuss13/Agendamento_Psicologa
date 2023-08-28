<?php
require_once 'lib/conn.php';


//SELECT
    $id_cliente = (int)$_GET['id_cliente'];
    $id_endereco = (int)$_GET['id_endereco'];

    $nome_cliente = $_POST['nome_cliente']


$sql = "SELECT nome_cliente= :nome_cliente, cpf_cliente=:cpf_cliente, email_cliente= :email_cliente, 
    ddd_cliente= : ddd_cliente, telefone_cliente= :telefone_cliente, 
data_nasc= :data_nasc, cep_endereco= :cep_endereco, numero_endereco = :numero_endereco, bairro_endereco= :bairro_endereco, cidade_endereco =:cidade_endereco, 
estado_endereco= :estado_endereco, rua_endereco= :rua_endereco, tbl_cliente.id_endereco FROM tbl_cliente INNER JOIN tbl_endereco ON 
tbl_cliente.id_endereco = tbl_endereco.id_endereco  WHERE id_cliente= :id_cliente";
extract($_POST);

$stmt = $conn->prepare($sql); 
$stmt->bindValue(':nome_cliente', $nome_cliente);
$stmt->bindValue(':cpf_cliente', $cpf_cliente);
$stmt->bindValue(':email_cliente', $email_cliente);
$stmt->bindValue(':ddd_cliente', $ddd_cliente);
$stmt->bindValue(':telefone_cliente', $telefone_cliente);
$stmt->bindValue(':data_nasc', $data_nasc);
$stmt->bindValue(':cep_endereco', $cep_endereco);
$stmt->bindValue(':numero_endereco', $numero_endereco);
$stmt->bindValue(':bairro_endereco', $bairro_endereco);
$stmt->bindValue(':cidade_endereco', $cidade_endereco);
$stmt->bindValue(':estado_endereco', $estado_endereco);
$stmt->bindValue(':rua_endereco', $rua_endereco);
$stmt->bindValue(':id_cliente', $id_cliente);
$stmt->bindValue(':id_endereco', $id_endereco);
$stmt->execute();
$dados = $stmt->fetch(PDO::FETCH_OBJ);
?>