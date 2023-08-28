  <?php
    require_once __DIR__."../../nav.php";
  ?>
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          
        <div class="d-flex flex-column align-items-center" style="color: #FFF; margin-top:5vh; ">
            <div class=" d-flex justify-content-between w-100">
              <h1>Pagamentos Pendentes</h1>
              
              <a href="menu.php" style="font-size: 32px; color:#FFF; margin-bottom:2vh"><i class="far fa-arrow-alt-circle-left"></i></a>
            </div>

            <table class="table table-striped table-light"  style="color: #000; text-align: center; min-width:50vw;">
                <thead class="table table-striped ">
                    <tr>
                        <td scope="col">#</td>
                        <td scope="col">Cliente</td>
                        <td scope="col">Data</td>
                        <td scope="col">Telefone</td>
                        <td scope="col">Valor Consulta</td>
                        <th scope="col">Pago</th>
                        <th scope="col">Excluir</th>
                    </tr>
                </thead>
                <tbody>
                  
                  <?php
                    require_once 'lib/conn.php';
                    


                    $sql = "SELECT id_consulta, tbl_consulta.id_cliente, valor_consulta, pago, nome_cliente, ddd_cliente, telefone_cliente, data_consulta FROM tbl_consulta INNER JOIN tbl_cliente ON tbl_consulta.id_cliente = tbl_cliente.id_cliente WHERE pago = 0 order by data_consulta";
                    $buscaConsulta= $conn->query($sql);
                    $consulta = $buscaConsulta->fetchAll(PDO::FETCH_OBJ);
                    foreach ($consulta as $tbl_consulta) {
                        $data = date_create($tbl_consulta->data_consulta);
                  ?>
                      <tr>
                        <td><?= $tbl_consulta->id_consulta ?></td>
                        <td><?= $tbl_consulta->nome_cliente ?></td>
                        <td><?= date_format($data, "d/m/Y") ?></td>
                        <td>                        
                            <a 
                              href="https://api.whatsapp.com/send?phone=55<?= $tbl_consulta->ddd_cliente.implode("",explode("-", $tbl_consulta->telefone_cliente)) ?>" 
                              class="btn btn-outline-success"
                              target="_blank">
                            <i class="fab fa-whatsapp"></i> <?="($tbl_consulta->ddd_cliente) $tbl_consulta->telefone_cliente" ?>
                            </a>
                          </td>                    
                        <td>R$ <?= $tbl_consulta->valor_consulta ?> Reais</td>
                        <td>		
                          <a 
                            href="<?= url("financas/atualizar/$tbl_consulta->id_consulta")?>"
                            class=" btn btn-outline-danger">
                          <i class="fas fa-thumbs-down"></i>
                        </td>
                        <td>		
                          <a 
                            href="delete_pag.php?id_consulta=<?=$tbl_consulta->id_consulta?>"
                            class=" btn btn-outline-danger">
                          <i class="far fa-trash-alt"></i> 
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