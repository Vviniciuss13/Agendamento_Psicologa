<?php
require_once __DIR__."../../nav.php";

require_once 'lib/conn.php';

if(isset($_GET['pesquisa'])){
  $pesquisa = $_GET['pesquisa'];

  $select = "SELECT id_cliente, nome_cliente, cpf_cliente, email_cliente, ddd_cliente, telefone_cliente, TRUNCATE(DATEDIFF(NOW(), data_nasc)/365.25,0) as idade, cep_endereco, numero_endereco, bairro_endereco, cidade_endereco, estado_endereco, rua_endereco, tbl_cliente.id_endereco, tbl_cliente.historico_cliente FROM tbl_cliente INNER JOIN tbl_endereco ON tbl_cliente.id_endereco = tbl_endereco.id_endereco WHERE nome_cliente like '%".$pesquisa."%' or cpf_cliente like '%".$pesquisa."%' or email_cliente like '%".$pesquisa."%' or telefone_cliente like '%".$pesquisa."%' order by nome_cliente asc";
  $selectstmt = $conn->prepare($select);
  $selectstmt->execute();
  $cliente = $selectstmt->fetchAll(PDO::FETCH_OBJ);
}else{
  $sql = "SELECT id_cliente, nome_cliente, cpf_cliente, email_cliente, ddd_cliente, telefone_cliente, TRUNCATE(DATEDIFF(NOW(), data_nasc)/365.25,0) as idade, cep_endereco, numero_endereco, bairro_endereco, cidade_endereco, estado_endereco, rua_endereco, tbl_cliente.id_endereco, tbl_cliente.historico_cliente FROM tbl_cliente INNER JOIN tbl_endereco ON tbl_cliente.id_endereco = tbl_endereco.id_endereco order by nome_cliente asc";
  $buscaCliente = $conn->query($sql);
  $cliente = $buscaCliente->fetchAll(PDO::FETCH_OBJ);
}
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
          
        <div class="d-flex flex-column align-items-center" style="color: #FFF; margin-top:5vh;">
            <div class="d-flex bd-highlight w-100">
              <h1 class="p-2 flex-grow-1 bd-highlight">Cliente</h1>
              <form action="<?= url("listagem/cliente") ?>" method="get">
              <input type="text" placeholder="Pesquisar" class="p-2 bd-highlight" style="font-size: 20px; height: 40px; border-radius: 10px" id="pesquisa" name="pesquisa">
              <button style="height: 40px;" type="submit" class="btn btn-light" id="btn"><i class="fas fa-search"></i></button>
            </form>
            <a class="p-2 bd-highlight"href="<?= url("menu") ?>" style="font-size: 32px; color:#FFF; margin-bottom:2vh"><i class="far fa-arrow-alt-circle-left"></i></a>
            </div>
            <table class="table table-striped table-light"  style="color: #000; text-align: center; min-width: 90vw;">
                <thead class="table table-striped ">
                    <tr>
                        <td scope="col">#</td>
                        <td scope="col">Nome</td>
                        <td scope="col">CPF</td>
                        <td scope="col">Idade</td>
                        <td scope="col">Endereço</td>
                        <td scope="col">Email</td>
                        <td scope="col">Telefone</td>
                        <th scope="col">Histórico</th>
                        <th scope="col">Editar</th>
                        <th scope="col">Excluir</th>
                    </tr>
                </thead>
                <tbody>
                  
                  <?php

                    foreach ($cliente as $tbl_cliente) {
                      if($tbl_cliente->idade < 0){
                        $tbl_cliente->idade = 0;
                      }
                  ?>
                      <tr>
                        <td><?= $tbl_cliente->id_cliente ?></td>
                        <td><?= $tbl_cliente->nome_cliente ?></td>
                        <td><?= $tbl_cliente->cpf_cliente ?></td>                     
                        <td><?= $tbl_cliente->idade ?></td>

                        <td><?= "$tbl_cliente->cep_endereco "?><br><?= "$tbl_cliente->rua_endereco, n° $tbl_cliente->numero_endereco, "?><br><?= " $tbl_cliente->bairro_endereco - $tbl_cliente->cidade_endereco-$tbl_cliente->estado_endereco"?></td>
                        
                        <td>
                        <a href="https://mail.google.com/mail/u/0/?tab=rm#sent/<?= $tbl_cliente->email_cliente?>"
                            class ="btn btn-outline-primary"
                            target="_blanck">
                            <i class="far fa-envelope"></i>
                            <?=$tbl_cliente->email_cliente?>

                        </td>
                        
                        <td>                        
                            <a 
                              href="https://api.whatsapp.com/send?phone=55<?= $tbl_cliente->ddd_cliente.$tbl_cliente->telefone_cliente ?>" 
                              class="btn btn-outline-success"
                              target="_blank">
                            <i class="fab fa-whatsapp"></i> <?="($tbl_cliente->ddd_cliente) $tbl_cliente->telefone_cliente" ?>
                            </a>
                          </td>

                          <td>
                            <a href="<?= url("historico/acesso/{$tbl_cliente->id_cliente}") ?>"
                            class="btn btn-outline-info">
                            <i class="fas fa-file-medical"></i>
                        </td>

                        <td>
                        <button type="button" data-bs-toggle="modal" data-bs-target="#ModalEditarCliente"
                        class="btn btn-outline-dark">
                        <i class="far fa-edit"></i>
                        </td>
                        </a>
                        </button>
                        <td> 
                          <a href="<?= url("excluir/cliente/$tbl_cliente->id_cliente") ?>"
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