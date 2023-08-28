<?php

require_once 'lib/conn.php';

setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
date_default_timezone_set('America/Sao_Paulo');

$data_array = explode("/", $_GET['route']);
$data = $data_array[4];

$selectCliente = "SELECT * FROM tbl_cliente order by nome_cliente asc";
$stmt = $conn->query($selectCliente);
$clientes = $stmt->fetchAll(PDO::FETCH_OBJ);
?>

    <!DOCTYPE html>
    <html lang="pt-br">
    <head>
    <meta charset="UTF-8">
    <meta name="viewport"content="width=device-width,initial-scale=1.0">
    <title>Agendamentos</title>

    <link rel="stylesheet" type="text/css" href="<?= url("assets/css/bootstrap.css") ?>">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
    <link rel="stylesheet" href="<?= url("assets/css/calendario.css") ?>">
    <link rel="stylesheet" href="<?= url("assets/css/fonts.css") ?>">
    <link rel="stylesheet" href="<?= url("assets/css/agendamentos.css") ?>">

    <script src="<?= url("assets/js/jquery.js") ?>" type="text/javascript"></script>
	<script src="<?= url("assets/js/bootstrap.js") ?>" type="text/javascript"></script>    
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
	<link rel="shortcut icon" href="<?= url("img/favicon.ico") ?>"/>
</head>
<style>
    .dropdown-item {
    display: block;
    width: 100%;
    padding: 0.25rem 1.5rem;
    clear: both;
    font-weight: 400;
    color: #212529;
    text-align: inherit;
    white-space: nowrap;
    background-color: transparent;
    border: 0;
}


</style>
        <body>
            
            <div class="box">
                <section>
                  <nav> <!--sidebar-->
        <!--inicio do calendario-->
        <div class="calendario">
        <span id="ano"></span>
        <div class="calendario-header">
            <span class="mudar_mes" id="anterior_mes">
                <spam><</span>
            </span>
            <span class="escolher_mes" id="escolher_mes">
                Agosto
            </span>
            <span class="mudar_mes" id="proximo_mes">
			<spam>></span>
            </span>
        </div>
        <div class="calendario-body">
            <div class="calendario_semana">
                <div>D</div>
                <div>S</div>
                <div>T</div>
                <div>Q</div>
                <div>Q</div>
                <div>S</div>
                <div>S</div>
            </div>
            <div class="calendario_dia">
                <div>1</div>
            </div>
        </div>
    </div>
    <!--fim do calendario-->
                     <div id="menu">
                          <ul>
                            <li><a class="fa-solid fa-bookmark" href="site.html"></a></li>
                            <li><a class="fa-solid fa-pen-to-square" href="site.html"></a></li>
                            <li><a class="fa-solid fa-arrow-down" href="site.html"></a></li>
                            <li><a class="fa-solid fa-circle-check" href="site.html"></a></li>
                            </ul>
                        </div>

<!--bloco de notas-->
<div id="card">
<div class="card text-dark bg-light mb-5" style="max-width: 21rem;">
  <div class="card-body">
    <button type="button" class="btn btn-default btn-sm" data-bs-toggle="modal" data-bs-target="#AddNotaModal">
    <ul>
        <li>
 <a href="#"><i class="fas fa-plus-circle"></i><br>Adicionar Nota</a>
        </li>
    </ul>
</button>
  </div>
</div>

<div class="card text-dark bg-light mb-5" style="max-width: 21rem;">
  <div class="card-body">
  <button type="button" class="btn btn-default btn-sm" data-bs-toggle="modal" data-bs-target="#AddNotaModal">
    <ul>
        <li>
 <a href="#"><i class="fas fa-plus-circle"></i><br>Adicionar Nota</a>
        </li>
    </ul>
</button>
  </div>
</div>

<div class="card text-dark bg-light mb-5" style="max-width: 21rem;">
  <div class="card-body">
  <button type="button" class="btn btn-default btn-sm" data-bs-toggle="modal" data-bs-target="#AddNotaModal">
    <ul>
        <li>
 <a href="#"><i class="fas fa-plus-circle"></i><br>Adicionar Nota</a>
        </li>
    </ul>
</button>
  </div>
</div>

</div>
</nav>
<!--fim do bloco de notas-->


  <!-- Inicio Modal addNota -->
<div class="modal fade" id="AddNotaModal" tabindex="-1" role="dialog" aria-labelledby="TituloAddNotaModal" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="TituloAddNotaModal">Adicionar Nota</h5>

        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" style="border:0 none;  box-shadow: 0 0 0 0;  outline: 0;">
        </button>
      </div>
      <div class="modal-body">
      <form class="row g-3" id="add-Nota">
        <div class="col-12">
        <textarea cols="55" rows="10" id="nota" name="nota">
        </textarea>
        </div>
      </div>
      <div class="modal-footer">
        <input type="reset" class="btn btn-outline-danger" id="btn-fechar" value="Excluir"></input>
        <input type="submit" class="btn btn-outline-success" id="addnota-btn" value="Salvar">
        </form>
      </div>
    </div>
  </div>
</div>
<!-- Fim do Modal addNota-->

<!-- Inicio do Modal AgendarCliente-->
<div class="modal fade" id="ModalAgendarCliente" tabindex="-1" role="dialog" aria-labelledby="TituloModalAgendarCliente" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title" id="TituloModalAgendarCliente">Agendar Cliente</h5>

        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" style="border:0 none;  box-shadow: 0 0 0 0;  outline: 0;">
        </button>
    </div>
    <div class="modal-body">
    <form class="row g-3" id="cad-usuario-form" method="post" action=<?php url("/agenda/agendar") ?>>
    <div class="form-group" id="cliente"><label for="cliente">Cliente</label>
      <select name="id_cliente" id="cliente" class="form-control">
        <option value="">Selecione um Cliente</option>
            <?php
            foreach($clientes as $cliente){
            ?>
            <option value="<?= $cliente->id_cliente ?>">
            <?= $cliente->nome_cliente ?>
          </option>
          <?php
          }
          ?>
      </select>
    </div>

        <div class="col-12">
        <label for="data" class="form-label">Data: </label>
        <input type="date" name="data" class="form-control" id="data" placeholder="Melhor e-mail">
        </div>

        <div class="col-12">
        <label for="hora" class="form-label">Horário: </label>
            <input type="time" name="hora" class="form-control" id="hora" placeholder="Hora da consulta">
        </div>

        <div class="col-12">
        <label for="tempo" class="form-label">Tempo da Sessão: </label>
        <input type="time" name="tempo" class="form-control" id="tempo" placeholder="tempo">
        </div>
        <label for="valor" class="form-label">Valor Total: </label>
        <div class="input-group mb-3">
        <div class="input-group-prepend">
            <span class="input-group-text">R$</span>
        </div>
        <input type="text" name="valor" class="form-control" id="valor" placeholder="valor total">
    </div>

        <div class="form-check form-switch" style="margin: 10px;">
        <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" checked>
        <label class="form-check-label" for="flexSwitchCheckChecked"> Enviar PDF padrão?</label>
        </div>
    </div>
    <div class="modal-footer">
        <button type="reset" class="btn btn-outline-danger" id="btn-fechar" value="Cancelar">Cancelar
        <button type="submit" class="btn btn-outline-success" id="addnota-btn" value="Agendar">Agendar
        </form>
    </div>
    </div>
</div>
</div>
    <!-- Fim do Modal AgendarCliente-->

                        <article><!--Conteudo-->
                        <div class="article-menu">
                <ul>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle::after{ content: none; }" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-list"></i>
               </a>
               <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
               <a class="dropdown-item" href="<?= url("listagem/cliente") ?>">Clientes</a>
               <a class="dropdown-item" href="<?= url("listagem/agenda/consultas") ?>">Agendamentos</a>
			   
               </div>
               </li>
               <li class="nav-item dropdown">
				<a class="nav-link dropdown-toggle::after{ content: none; }" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				<i class="fas fa-file-invoice-dollar"></i>
				</a>
				<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
				<a class="dropdown-item" href="<?= url("financas/pendentes") ?>">Pagamentos Pendentes</a>
				<a class="dropdown-item" href="<?= url("financas/pagos") ?>">Consultas Pagas</a>
				</div>
				</li>
                <li class="nav-item dropdown">
               <a class="nav-link dropdown-toggle::after{ content: none; }" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
               <i class="fas fa-cog"></i>
               </a>
               <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
               <a class="dropdown-item" href="<?= url("financas") ?>">Finanças</a>
               <a class="dropdown-item" href="<?= url("ajuda") ?>">Ajuda</a>
			   <a class="dropdown-item" href="<?= url("") ?> ">Sair</a>
               </div>
               </li>
                                <li>
                            <button type="button" class="btn btn-default btn-sm" data-bs-toggle="modal" data-bs-target="#ModalAgendarCliente">
                            <a href="#"><i class="fas fa-plus-circle"></i></a></li>
                            </button>
                            </ul>
                            </div>
    <div class="tabela">
	<table class="table table-bordered">
    <thead>
			<tr>
			<td scope="col" id="horarios">Horários</td>
			<td scope="col"><?php echo utf8_encode(strftime('%A, %d de %B de %Y', strtotime(($data)))) ?></td>
      <td scope="col">Tempo</td>
      <td scope="col">Valor(R$)</td>
			</tr>
		</thead>
		<tbody>
			<tr>
        <?php
        $sql = "SELECT * FROM tbl_consulta INNER JOIN tbl_cliente ON tbl_consulta.id_cliente = tbl_cliente.id_cliente WHERE data_consulta = :data order by hora_consulta";
        $stmt = $conn->prepare($sql);
        $stmt->bindValue(":data", $data);
        $stmt->execute();
        $consultas = $stmt->fetchAll(PDO::FETCH_OBJ);
        if(count($consultas) > 0) {
            foreach($consultas as $consulta){
                ?>
                    <td><?php $d = strtotime($consulta->hora_consulta); echo date("H:i", $d) ?></td>
                    <td><?= $consulta->nome_cliente ?></td>
                    <td><?= $consulta->tempo_consulta ?></td>
                    <td><?= $consulta->valor_consulta ?></td>
                </tr>
                <?php
                }
        }else{
                for($i = 9; $i < 18; $i++){
                    ?>
                    <td><?php echo $i; echo ':00' ?></td>
                    <td>Vazio</td>
                    <td>----------</td>
                    <td>----------</td>
                    <tr></tr>
                    <?php
                }
        }
        ?>
		<tr>
		</tbody>
	</table>
	</div>
                        </article>
                </section>
                </div>

                <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
                <script src="<?= url("assets/js/addNota.js") ?>"></script>
                <script>
                  let dataAtual = new Date()

                  let mesAtual = {value: dataAtual.getMonth()}
                  let anoAtual = {value: dataAtual.getFullYear()}

                  var ano = anoAtual;


                  anobissexto = (ano) =>{
                      return (ano % 4 === 0 && ano % 100 !== 0 && ano % 400 !==0) || (ano % 100 === 0 && ano % 400 === 0)
                  }

                  diasFevereiro = (ano) => {
                      return anobissexto(ano) ? 29 : 28
                  }

                  let calendario = document.querySelector('.calendario')

                  const nomes_mes = ['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro']

                  let escolher_mes = document.querySelector('#escolher_mes')


                  gerarCalendario = (mes,ano) => {
                      let calendario_dia = document.querySelector('.calendario_dia')
                      calendario_dia.innerHTML = ''
                      let calendario_header_ano = document.querySelector('#ano')

                      let dias_do_mes = [31, diasFevereiro(ano), 31, 30, 31, 30, 31, 31, 30, 31, 30, 31]

                      let dataAtual = new Date()

                      escolher_mes.innerHTML = nomes_mes[mes]
                      calendario_header_ano.innerHTML = ano

                      let primeiro_dia = new Date(ano, mes, 1)

                      for (let i = 0; i<= dias_do_mes[mes] + primeiro_dia.getDay() - 1; i++){
                          let dia = document.createElement('div')
                          let diaa = i - primeiro_dia.getDay() + 1
                          let dataa = `${ano}-${mesAtual.value+1}-${diaa}`
                          if(i >= primeiro_dia.getDay()) {
                              dia.classList.add('calendario_dia_hover')
                              dia.innerHTML = `<a href="<?= url("listagem/agenda/agendamento/") ?>${dataa}" id="dia">${diaa}</a>`
                              dia.innerHTML += `<span></span>
                              <span></span>
                              <span></span>
                              <span></span>`
                              if(i- primeiro_dia.getDay() + 1 === dataAtual.getDate() && ano === dataAtual.getFullYear() && mes === dataAtual.getMonth()) {
                                  dia.classList.add('dataAtual')
                              }
                          }
                          calendario_dia.appendChild(dia)
                      }
                  }

                  document.querySelector('#anterior_mes').onclick = () => {
                      if(mesAtual.value > 0){
                          --mesAtual.value
                      }else{
                          --ano.value
                          mesAtual.value = 11
                      }
                      gerarCalendario(mesAtual.value, anoAtual.value)
                  }


                  document.querySelector('#proximo_mes').onclick = () => {
                      if(mesAtual.value < 11){
                          ++mesAtual.value
                      }else{
                          ++ano.value
                          mesAtual.value = 0
                      }
                      gerarCalendario(mesAtual.value, anoAtual.value)
                  }


                  gerarCalendario(mesAtual.value, anoAtual.value)
                </script>
                </body>
                </html>