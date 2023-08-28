<?php
namespace source\App;

class Site{
    public function login(){
        require_once __DIR__."/../../rota/login/index.php";
    }
    public function verifica_login(){
        require_once __DIR__."/../../rota/login/verifica_login.php";
    }
    public function menu(){
        require_once __DIR__."/../../rota/menu/menu.php";
    }
    public function cadastrar(){
        require_once __DIR__."/../../rota/cadastrar/cadastrar.php";
    }
    public function agendar(){
        require_once __DIR__."/../../rota/cadastrar/agendar.php";
    }
    public function func_cadastrar(){
        require_once __DIR__."/../../rota/cadastrar/func_cadastrar.php";
    }
    public function func_agendar(){
        require_once __DIR__."/../../rota/cadastrar/func_agendar.php";
    }
    public function list_cliente(){
        require_once __DIR__."/../../rota/listagem/list_client.php";
    }
    public function list_consultas(){
        require_once __DIR__."/../../rota/listagem/list_agendamentos.php";
    }
    public function agendamentos(){
        require_once __DIR__."/../../rota/listagem/agendamentos.php";
    }
    public function delete_cliente(){
        require_once __DIR__."/../../rota/deletar/delete_cliente.php";
    }
    public function delete_consulta(){
        require_once __DIR__."/../../rota/deletar/delete_consulta.php";
    }
    public function acessar_historico(){
        require_once __DIR__."/../../rota/historico/Acesso_historico.php";
    }
    public function historico_verifica(){
        require_once __DIR__."/../../rota/historico/verifica_user.php";
    }
    public function historico(){
        require_once __DIR__."/../../rota/historico/historico_cliente.php";
    }
    public function adicionar_historico(){
        require_once __DIR__."/../../rota/historico/func_addHistorico.php";
    }
    public function acessar_finaca(){
        require_once __DIR__."/../../rota/financa/login2.php";
    }
    public function financas(){
        require_once __DIR__."/../../rota/financa/financas.php";
    }
    public function pagos(){
        require_once __DIR__."/../../rota/financa/pagos.php";
    }
    public function pendentes(){
        require_once __DIR__."/../../rota/financa/pendentes.php";
    }
    public function atualizar(){
        require_once __DIR__."/../../rota/financa/atualizar_pag.php";
    }
    public function ajuda(){
        require_once __DIR__."/../../rota/ajuda.php";
    }
    public function error($data){
        echo "<h1>Erro: {$data["errcode"]}</h1>";
    }
}