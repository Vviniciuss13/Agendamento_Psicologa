<?php

require_once 'lib/conn.php';

$sql = "SELECT count(*) as count FROM tbl_consulta WHERE data_consulta = 2022-".$_GET['mes']."-".$_GET['dia'];
$stmt = $conn->prepare($sql);
$stmt->execute();
$consulta = $stmt->fetch(PDO::FETCH_OBJ);
if($stmt->rowCount() > 0){
    echo json_encode(array("status" => 1, "count" => $consulta->count), JSON_UNESCAPED_UNICODE);
} else{
    echo json_encode(array("status" => 0), JSON_UNESCAPED_UNICODE);
}