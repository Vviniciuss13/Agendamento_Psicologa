<?php
require __DIR__."/vendor/autoload.php";
use CoffeeCode\Router\Router;

$router = new Router(URL_BASE);

//Controlador
$router->namespace("Source\App");

#Login
$router->group(null);
$router->get("/","Site:login");
#Verifica_Login
$router->post("/verificar","Site:verifica_login");
#Menu
$router->group("menu");
$router->get("/","Site:menu");
#Cadastrar
$router->group("cadastrar");
$router->get("/cliente","Site:cadastrar");
$router->get("/agenda","Site:agendamentos");
#func_cadastrar
$router->post("/cliente/cadastrar_cliente","Site:func_cadastrar");
$router->post("/agenda/agendar","Site:func_agendar");

#Listagem
$router->group("listagem");
$router->get("/cliente","Site:list_cliente");
$router->get("/agenda/agendamento/{data}","Site:agendar");
$router->get("/agenda/consultas","Site:list_consultas");

#Excluir
$router->group("excluir");
$router->get("/cliente/{id}","Site:delete_cliente");
$router->get("/agenda/{id}","Site:delete_consulta");

#Histórico
$router->group("historico");
$router->get("/acesso/{id}","Site:acessar_historico");
$router->get("/{id}","Site:historico");
#Verificação
$router->post("/verifica/{id}","Site:historico_verifica");
#adicionar
$router->post("/adicionar","Site:adicionar_historico");

#Pagamentos
$router->group("financas");
$router->get("/login", "Site:acessar_financa");
$router->get("/", "Site:financas");
$router->get("/pagos", "Site:pagos");
$router->get("/pendentes", "Site:pendentes");
$router->get("/atualizar/{id}", "Site:atualizar");

#ajuda
$router->group("ajuda");
$router->get("/", "Site:ajuda");

#Erro
$router->group("erro");
$router->get("/{errcode}","Site:error");

$router->dispatch();

if($router->error()){
    $router->redirect("/error/{$router->error()}");
}

