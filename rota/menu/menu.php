<?php

	require_once 'lib/conn.php';

	setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
	date_default_timezone_set('America/Sao_Paulo');

	$dataAtual = date('Y-m-d');
	$sql = "SELECT * FROM tbl_consulta INNER JOIN tbl_cliente ON tbl_consulta.id_cliente = tbl_cliente.id_cliente WHERE data_consulta = :hoje order by hora_consulta";
	$stmt = $conn->prepare($sql);
	$stmt->bindValue(":hoje", $dataAtual);
	$stmt->execute();
	$consultas = $stmt->fetchAll(PDO::FETCH_OBJ);

    require_once __DIR__."../../nav.php";
?>
<!DOCTYPE html>
<html>
<html lang="pt-br">
<body>
</div>
	<div class="tabela">
	<table class="table table-bordered">
		<thead>
			<tr>
			<td scope="col" id="hoje">Hoje</td>
			<td scope="col">
			<?php
				echo utf8_encode(strftime('%A, %d de %B de %Y', strtotime(('today'))));
			?></td>
			</tr>
		</thead>
		<tbody>
			<?php
			foreach ($consultas as $consulta){
				?>
				<tr>
				<td><?php $d = strtotime($consulta->hora_consulta); echo date("H:i", $d) ?></td>
				<td><?= $consulta->nome_cliente ?></td>
				<tr>
				<?php
			}
			?>
		</tbody>
	</table>
	</div>


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
    </div>
	<script src="<?= url("assets/js/calendario.js") ?>" defer></script>

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

let dias_do_mes = [31, diasFevereiro(ano), 31, 30, 31, 30, 31, 31, 30, 31, 30, 31]

for(let i = 1; i<= dias_do_mes[mesAtual.value]; i++){
    mes = mesAtual.value;
    ano = anoAtual.value;
    fetch("http://pendrive/TCC%2022.0/api_calendario.php?mes="+mes+"&dia="+i)
        .then(json = json.json())
        .then((response) => {
            a[i] = response.count;
            console.log(response.status);
        })
}

	</script>
    </body>
</html>