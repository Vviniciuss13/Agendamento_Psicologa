<?php
	require_once __DIR__."../../nav.php";
?>
<style>
	body{
		background-color: #ADD9D1;
	}
</style>

<body>
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          
        <div class="d-flex flex-column align-items-center" style="color: #FFF; margin-top:5vh; ">
            <div class=" d-flex justify-content-between w-100">
              <h1>Pagamentos Já Realizados</h1>

              <h1>Recebido = <?$sql = 
              " SELECT SUM(valor_consulta) FROM tbl_consulta WHERE  data_consulta = CURDATE() and pago = 1;
                SELECT SUM(valor_consulta) FROM tbl_consulta WHERE MONTH(data_consulta) = MONTH(NOW()) and pago = 1;
                SELECT SUM(valor_consulta) FROM tbl_consulta WHERE YEAR(data_consulta) = YEAR(NOW()) and pago = 1;
               "?>

              
              <a href="menu.php" style="font-size: 32px; color:#FFF; margin-bottom:2vh"><i class="far fa-arrow-alt-circle-left"></i></a>
            </div>

            <table class="table table-striped table-light"  style="color: #000; text-align: center; min-width: 30vw;">
                <thead class="table table-striped ">
                    <tr>
                        <td scope="col">#</td>
                        <td scope="col">Cliente</td>
                        <td scope=col">Data</td>
                        <td scope="col">Valor Consulta</td>
                        <th scope="col">Pago</th>
                    </tr>
                </thead>
                <tbody>
                  
                  <?php
                    require_once 'lib/conn.php';


                    $sql = "SELECT id_consulta, tbl_consulta.id_cliente, valor_consulta, pago, nome_cliente, data_consulta FROM tbl_consulta INNER JOIN tbl_cliente ON tbl_consulta.id_cliente = tbl_cliente.id_cliente WHERE pago = 1 order by data_consulta";
                    $buscaConsulta= $conn->query($sql);
                    $consulta = $buscaConsulta->fetchAll(PDO::FETCH_OBJ);
                    foreach ($consulta as $tbl_consulta) {
                      $data = date_create($tbl_consulta->data_consulta);
                  ?>
                      <tr>
                        <td><?= $tbl_consulta->id_consulta ?></td>
                        <td><?= $tbl_consulta->nome_cliente ?></td>
                        <td><?= date_format($data,'d/m/Y') ?></td>            
                        <td>R$ <?= $tbl_consulta->valor_consulta ?> Reais</td>
                        <td>		
                          <a 
                            href="<?= url("financas/atualizar/$tbl_consulta->id_consulta")?>"
                            class=" btn btn-outline-success">
                          <i class="fas fa-thumbs-up"></i>
                        </td>
                    </tr> 
                  <?php
                    }
                  ?>
                </tbody>
            </table>
          </div>
      </div>
    </div>
  </div>

</body>
</html>