<?php
        require_once 'lib/conn.php';

        $prepare = explode("/", $_GET['route']);
        $id_consulta = $prepare[3];

        $sqlSelect = "SELECT * FROM tbl_consulta WHERE pago = 1 AND id_consulta = :id_consulta";
        $verifica = $conn->prepare($sqlSelect);
        $verifica->bindValue(":id_consulta", $id_consulta);
        $verifica->execute();
        if($verifica->rowCount() > 0){
            $sql = "UPDATE tbl_consulta SET pago = 0 WHERE id_consulta= :id_consulta";
            $stmt = $conn->prepare($sql);
            $stmt->bindValue(":id_consulta",$id_consulta);
            $stmt->execute();
        }else{
            $sql = "UPDATE tbl_consulta SET pago = 1 WHERE id_consulta= :id_consulta";
            $stmt = $conn->prepare($sql);
            $stmt->bindValue(":id_consulta",$id_consulta);
            $stmt->execute();
        }

    ?>
        <meta http-equiv="refresh" content="0;url=<?= url("financas/pagos") ?>">