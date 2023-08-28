<?php
	require_once __DIR__."../../nav.php";
?>

    <div class="container">
      <div class="row">
        <div class="col-md-12">
          
        <div class="d-flex flex-column align-items-center" style="color: #FFF; margin-top:5vh; ">
            <div class=" d-flex justify-content-between w-100">
              <h1>Agendamentos</h1>
              
              <a href="<?= url("menu") ?>" style="font-size: 32px; color:#FFF; margin-bottom:2vh"><i class="far fa-arrow-alt-circle-left"></i></a>
            </div>

            <table class="table table-striped table-light"  style="color: #000; text-align: center; min-width: 80vw;">
                <thead class="table table-striped ">
                    <tr>
                        <td scope="col">Data </td>
                        <td scope="col">Hora</td>
                        <td scope="col">Duração</td>
                        <td scope="col">Valor</td>
                        <td scope="col">Cliente</td>
                        <td scope="col">Telefone</td>
                        <th scope="col">Editar</th>
                        <th scope="col">Excluir</th>
                    </tr>
                </thead>
                <tbody>
                  
                  <?php
                    require_once 'lib/conn.php';


                    $sql = "SELECT * from tbl_consulta INNER JOIN tbl_cliente ON tbl_cliente.id_cliente = tbl_consulta.id_cliente WHERE data_consulta >= CURDATE() AND pago = 0 order by data_consulta asc";
                    $buscaConsulta = $conn->query($sql);
                    $consulta = $buscaConsulta->fetchAll(PDO::FETCH_OBJ);
                    foreach ($consulta as $tbl_consulta) {
                        $hora = explode(":", $tbl_consulta->hora_consulta);
                        $hora = implode(":", [$hora[0], $hora[1]]);
                        $data = date_create($tbl_consulta->data_consulta);
                  ?>
                      <tr>
                        <td><?= date_format($data, "d/m/Y") ?></td>
                        <td><?= $hora ?></td>                     
                        <td><?= $tbl_consulta->tempo_consulta?> horas</td>
                        <td>R$ <?= $tbl_consulta->valor_consulta ?> reais</td>  
                        <td><?= $tbl_consulta->nome_cliente?></td>  
                        
                        <td>                        
                            <a 
                              href="https://api.whatsapp.com/send?phone=55<?= $tbl_consulta->ddd_cliente.implode("",explode("-", $tbl_consulta->telefone_cliente)) ?>" 
                              class="btn btn-outline-success"
                              target="_blank">
                            <i class="fab fa-whatsapp"></i> <?="($tbl_consulta->ddd_cliente) $tbl_consulta->telefone_cliente" ?>
                            </a>
                          </td>   

                        <td>
                        <a id="botao_editar" type="button" data-bs-toggle="modal" data-bs-target="#editClientModal" href="#?id_cliente=<?= $tbl_consulta->id_cliente ?>" 
                        class="btn btn-outline-dark">
                        <i class="far fa-edit"></i></td>
                        </a>
                        </button>
                        <td>				
                          <a 
                            href="<?= url("excluir/agenda/$tbl_consulta->id_consulta") ?>"
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