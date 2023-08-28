<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/calendario.css">
    <link rel="stylesheet" href="assets/css/fonts.css">
    <title>Agendamento</title>
</head>
<body>
    <div class="calendario">
        <span id="ano" style="visibility: hidden" ></span>
        <div class="calendario-header">
            <span class="mudar_mes" id="anterior_mes">
                <pre><</pre>
            </span>
            <span class="escolher_mes" id="escolher_mes">
                Agosto
            </span>
            <span class="mudar_mes" id="proximo_mes">
                <pre>></pre>
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
                <div><a href="agendar.php?data_consulta=1">1</a></div>
            </div>
        </div>
    </div>
    </div>
<script src="assets/js/calendario.js" defer></script>
</body>
</html>