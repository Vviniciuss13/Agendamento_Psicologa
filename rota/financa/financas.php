<?php
require_once 'lib/conn.php';

    // date_default_timezone_set('America/Sao_Paulo');

    // $dataHoje = date('Y-m-d');

    // $sqlSelect = "SELECT round(sum(valor_consulta),2) FROM tbl_consulta WHERE data_consulta = '$dataHoje' AND pago = '1'"; 
    // $stmt = $conn->query($sqlSelect);
    // $valor = $stmt->fetchColumn();

    // echo($valor);

$sql = "SELECT * FROM dia";
$stmt = $conn->query($sql);
$dia = $stmt->fetchColumn();

$sql = "SELECT * FROM mes";
$stmt = $conn->query($sql);
$mes = $stmt->fetchColumn();

$sql = "SELECT * FROM ano";
$stmt = $conn->query($sql);
$ano = $stmt->fetchColumn();

$monthNum  = date('m');
$dateObj   = DateTime::createFromFormat('!m', $monthNum);
$monthName = $dateObj->format('F');

if($monthName == 'January'){
  $nomeMes = 'Janeiro';
}else if($monthName == 'Febuary'){
  $nomeMes = 'Fevereiro';
}else if($monthName == 'March'){
  $nomeMes = 'Março';
}else if($monthName == 'April'){
  $nomeMes = 'Abril';
}else if($monthName == 'May'){
  $nomeMes = 'Maio';
}else if($monthName == 'June'){
  $nomeMes = 'Junho';
}else if($monthName == 'July'){
  $nomeMes = 'Julho';
}else if($monthName == 'August'){
  $nomeMes = 'Agosto';
}else if($monthName == 'September'){
  $nomeMes = 'Setembro';
}else if($monthName == 'October'){
  $nomeMes = 'Outubro';
}else if($monthName == 'November'){
  $nomeMes = 'Novembro';
}else if($monthName == 'December'){
  $nomeMes = 'Dezembro';
}else{
  $nomeMes = "Data Incorreta";
}

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href=" <?= url("assets/css/financas.css") ?>">
    <link rel="stylesheet" href="<?= url("assets/css/fonts.css") ?>">
    <link rel="stylesheet" type="text/css" href="<? url("assets/css/bootstrap.css") ?>">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
 
 
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js" type="text/javascript"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.2.2/Chart.min.js"></script>
    <title>Financas</title>
</head>
<body>
<a href="<?= url("menu") ?>" style="font-size: 30px; color:#FFF; display: flex; justify-content:end; text-decoration: none;"><i class="fa-sharp fa-solid fa-less-than"></i></a>

<div class="container">
<div class="fade">
<div class="card">
  <div class="header">Hoje: <?= date('d/m/Y') ?></div>
  <div class="card-body">
    <h5 class="card-title"></h5>
    <p class="card-text">Valor alcançado hoje: <br> R$ <?= $dia?></p>
  </div>
</div>

<div class="card">
  <div class="header">Mês: <?= $nomeMes?></div>
  <div class="card-body">
    <p class="card-text">Valor alcançado nesse mês:<br> R$ <?= $mes?></p>
  </div>
</div>

<div class="card">
  <div class="header">Ano de <?=date('Y')?></div>
  <div class="card-body">
    <p class="card-text">Valor alcançado esse ano: <br> R$ <?= $ano?></p>
  </div>
</div>
</div>

<div class="chart-container" >
<canvas id="myChart"></canvas>
</div>
</div><!--fechamento container-->
<script>
    var ctx = document.getElementById("myChart").getContext("2d");
    var myChart = new Chart(ctx, {
      type: "line",
      
      data: {
        labels: [
          "Domingo",
          "Segunda",
          "Terça",
          "Quarta",
          "Quinta",
          "Sexta",
          "Sabádo",
        ],
        
        datasets: [
          {
            label: "lucratividade",
            data: [2, 9, 3, 17, 6, 3, 7],
            backgroundColor: "rgba(5, 131, 131, 0.664)",
          },
          {
            label: "carga horária",
            data: [2, 2, 5, 5, 2, 1, 10],
            backgroundColor: "rgba(10, 233, 233, 0.664)",
          },
        ],
      },
      options: {

        legend: {
          display: true,
            labels: {
              display: false,
                fontColor: '#fff'
            }
        },
                title: {
                    display: true,
                    fontSize: 30,
                    text: "Lucros da Semana",
                    fontColor: '#fff'
                },
                scales: {
                    xAxes: [{
                        display: true,
                        gridLines: {
                            display: false,
                            color: '#fff'
                        },
                        ticks: {
                       fontColor: "white"
                },
                        
                    }],
                    yAxes: [{
                        display: true,
                        gridLines: {
                            color: '#fff'
                        },
                         ticks: {
                          fontColor: 'white' // aqui branco
                         }

                    }]
                },

            }
        });
    
  </script>
        
</body>
</html>

