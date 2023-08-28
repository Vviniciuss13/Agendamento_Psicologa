from selenium import webdriver
import json
import time

arquivo = open("d:/TCC 22.0/agendamento.json", encoding="UTF-8")
dados = json.load(arquivo)

SITE = "http://pendrive/TCC%2022.0/cadastrar/agenda";
NAVEGADOR = webdriver.Chrome("c:/driver/chromedriver.exe")

for agendamento in dados:
    NAVEGADOR.get(SITE)

    time.sleep(3)

    btnAbrir = NAVEGADOR.find_element("id", "botao_agendar");
    btnAbrir.click()

    select = NAVEGADOR.find_element("id", "cliente")
    cliente = NAVEGADOR.find_element("id", "7")

    select.click()
    cliente.click()
    

    campoData = NAVEGADOR.find_element("id", "data")
    campoHorario = NAVEGADOR.find_element("id","hora")
    campoTempo = NAVEGADOR.find_element("id","tempo")
    campoValor = NAVEGADOR.find_element("id","valor")
    btnCadastrar = NAVEGADOR.find_element("id","adicionar-btn")

    campoData.send_keys(agendamento['data_consulta'])
    campoHorario.send_keys(agendamento['horario'])
    campoTempo.send_keys(agendamento['tempo_sessao'])
    campoValor.send_keys(agendamento['preco'])

    time.sleep(1)

    btnCadastrar.click()

    time.sleep(2)

