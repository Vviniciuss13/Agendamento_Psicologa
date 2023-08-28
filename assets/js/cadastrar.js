const formm = document.querySelector("#form");

async function buscarCep(){
    var cep = form.cep.value;
    let url = `https://viacep.com.br/ws/${cep}/json/`;
    let request = await fetch(url);
    let dados = await request.json();
    if (dados) {
        form.cidade.value = dados.localidade;
        form.rua.value = dados.logradouro;
        form.uf.value = dados.uf;
        form.bairro.value = dados.bairro;
    }
}

function verifica_cep(){
    let cep_nao_verificado = form.cep.value;
    let cep = cep_nao_verificado.split('');
    if(cep[5] == '-'){
        cep.splice(5, 1, '');
    }
    if(cep.length > 8){
        cep.splice(8, 15, '');
    }
    cep_verificado = cep.join('');
    form.cep.value = cep_verificado;
    buscarCep();
}

function verifica_cpf(){
    let cpf_feio = form.cpf.value;
    let cpf = cpf_feio.split('');
    if(cpf.length >= 11){
        if(cpf[3] != "."){
            cpf.splice(3, 0, '.');
            if(cpf[7] != "."){
                cpf.splice(7, 0, '.');
                if(cpf[11] != '-'){
                    cpf.splice(11,0,'-');
                }
            }
        }
        cpf.splice(14, 10, '');
    }else{
        while(cpf.length != 11){
            cpf.push('0');
        }
        cpf.splice(3, 0, '.');
        cpf.splice(7, 0, '.');
        cpf.splice(11,0,'-');
    }
    for(i = 0; i<14; i++){
        console.log(cpf[i]);
        if(i == 3 || i == 7){
            if(cpf[i] != '.'){
                cpf.splice(i, 1, '.');
            }
        }else if(i == 11){
            if(cpf[i] != '-'){
                cpf.splice(i, 1, '-');
            }
        }else{
            num = isNaN(cpf[i]);
            if(num != false){
                cpf[i] = '0';
            }
        }
    }
    cpf_verificado = cpf.join('');

    form.cpf.value = cpf_verificado;
}

function arruma_cell(){
    let telefone = form.telefone.value;
    let celular = telefone.split('');
    if(celular.length > 11){
        if(celular[2] != ' '){
            celular.splice(2, 0, " ");
            if(celular[8] != "-"){
                celular.splice(8, 0, "-");
            }
        }
        celular.splice(13,10, '');
    }else{
        while(celular.length != 11){
            celular.push('0');
        }
        if(celular[2] != " "){ 
            celular.splice(2, 0, " ");
        }
        celular.splice(8, 0, "-");
    }


    celular_verificado = celular.join('');

    form.telefone.value = celular_verificado;
}

const botao = document.querySelector(".cadastrar");

botao.addEventListener('click', (e) =>{
    if(form.nome.value == '' ||
    form.cpf.value == '' ||
    form.email.value == '' ||
    form.telefone.value == '' ||
    form.cep.value == '' ||
    form.cidade.value == '' ||
    form.rua.value == '' ||
    form.uf.value == '' ||
    form.bairro.value == '' ||
    form.numero.value == '' ||
    form.data_nasc.value == ''){
    e.preventDefault();
    const alert = document.createElement('ion-alert');
    alert.header = 'Aviso';
    alert.message = 'Preencha todos os campos';
    alert.buttons = ['OK'];
    document.body.appendChild(alert);
    alert.present();
}
})


