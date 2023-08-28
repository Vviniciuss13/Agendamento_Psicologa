<?php 
function validaDados($dados){
    $erro = false;

    if(!isset($dados) || empty($dados)){

        $erro = "Dados vazios";
    }

    foreach ($dados as $indice => $valor){

        $valor = trim(strip_tags($valor));
        if (empty($valor)){
            $erro = "Campo $indice em branco <br>";
        }
    }
    return $erro;
}

function recuperaDados($dados){
    $array = array();
    foreach ($dados as $valor){
        $valor = trim(strip_tags($valor));
        array_push($array, $valor);
    }
    return $array;
}

?>