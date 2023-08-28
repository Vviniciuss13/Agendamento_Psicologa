<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar</title>
    <link rel="stylesheet" href="<?= url("assets/css/css_cadastrar.css") ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css"
    rel="stylesheet"
    integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We"
    crossorigin="anonymous"
    />
    <link rel="stylesheet" href="<?= url("assets/css/fonts.css") ?>">
    <script type="module" src="https://cdn.jsdelivr.net/npm/@ionic/core/dist/ionic/ionic.esm.js"></script>
    <script nomodule src="https://cdn.jsdelivr.net/npm/@ionic/core/dist/ionic/ionic.js"></script>
</head>
<body>
<a href="<?= url("menu") ?>" style="font-size: 30px; color:#FFF; display: flex; justify-content:end; text-decoration: none;"><i class="fa-sharp fa-solid fa-less-than"></i></a>
<div class="fade">
<div class="content">
    <div class="form">
        <form id="form" class="form-conteudo" method="post" action="<?= url("cadastrar/cliente/cadastrar_cliente") ?>">


        <div>
        <label for="nome">Nome</label><br>
        <input type="text" name="nome" id="nome" placeholder="Nome" class="form-control">
        <br>
        </div>

        <div>
        <label for="cpf">CPF</label><br>
        <input type="text" name="cpf" id="cpf" placeholder="XXX.XXX.XXX-XX" pattern="[0-9]{3}.[0-9]{3}.[0-9]{3}-[0-9]{2}" class="form-control" onfocusout="verifica_cpf();">
        <br>
        </div>

        <div>
        <label for="email">Email</label><br>
        <input type="email" name="email" id="email" placeholder="user@email.com" class="form-control">
        <br>
        </div>

        <div>
        <label for="telefone">Telefone</label><br>
        <input type="tel" name="telefone" id="telefone" pattern="[0-9]{2} [0-9]{5}-[0-9]{4}" placeholder="15 99999-9999" class="form-control" onfocusout="arruma_cell();">
        <br>
        </div>

        <div>
        <label for="data_nasc">Data de Nascimento</label>
        <input type="date" name="data_nasc" id="data_nasc" class="form-control">
        <br>
        </div>

       
        <div id="cep" class="input-esquerda">
        <label for="cep">CEP</label><br>
        <input type="text" name="cep" id="cep" placeholder="Sem hífen" class="form-control" pattern="[0-9]{8}" onfocusout="verifica_cep();"> 
       
        <label id="input-direita" for="cidade">Cidade</label>
        <input type="text" name="cidade" id="cidade" class="form-control">
        </div>
        <br>
        

        <div id="cep" class="input-esquerda">
        <label for="rua">Rua</label><br>
        <input type="text" name="rua" id="rua" class="form-control">
    
        <label id= "input-direita" for="uf">Estado</label>
        <input type="text" name="uf" id="uf" class="form-control">
        </div>
        <br>

        <div id="cep" class="input-esquerda">
        <label for="bairro">Bairro</label>
        <input type="text" name="bairro" id="bairro" class="form-control">

        <label id="input-direita" for="numero">Número</label>
        <input type="text" name="numero" id="numero"  class="form-control">
        </div>
        <br>
        <br>

   
        <div class="botoes">
            <button type="reset" class="cancelar">Cancelar</button>
            <button type="submit" class="cadastrar" id="cadastrar">Cadastrar</button>
        </div>

        </div>
    </div>
</form>
</div>
    
    <script>const form = document.querySelector("form");
      form.cep.addEventListener("keyup", () => {
        if(form.cep.value.length == 8){
            buscarCep(form.cep.value);
        }
      });

      let hoje = new Date();

      document.querySelector("#data_nasc").value = hoje.toISOString().substring(0,10)
      document.querySelector("#data_nasc").max = hoje.toISOString().substring(0,10)

      </script>
    <script src="<?= url("assets/js/cadastrar.js") ?>" defer></script>
</body>
</html>