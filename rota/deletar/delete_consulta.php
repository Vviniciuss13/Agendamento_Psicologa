<?php

      require_once 'lib/conn.php';

      require_once __DIR__.'../../nav.php';

      $prepare = explode("/",$_GET['route']);
      $id_consulta = $prepare[3];

      $sql = "DELETE FROM tbl_consulta WHERE id_consulta= :id_consulta";
      $stmt = $conn->prepare($sql);
      $stmt->bindValue(":id_consulta",$id_consulta);
      $stmt->execute();

      if($stmt->rowCount()>0){
        ?>
        <div class="alert alert-success">
            <i class="fas fa-check-circle btn-outline-success"></i>Sucesso ao Deletar!
        </div>
        <meta http-equiv="refresh" content="5; url=<?= url("listagem/agenda/consultas") ?>">
        <?php
      }else{
        ?>
        <div class="alert alert-danger">
            <i class="fas fa-times-circle btn-outline-danger"></i>Falha ao Deletar
        </div>
        <meta http-equiv="refresh" content="5; url=<?= url("listagem/agenda/consultas") ?>">
        <?php
      }

    ?>
