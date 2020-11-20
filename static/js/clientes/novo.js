const data = JSON.parse(document.querySelector("#data-pessoas").innerText);


function selecionaPessoa(pessoaID){
    const pessoa = data.filter( pessoa => pessoa.ID == pessoaID)[0];
    
    setState(state => {
        return ({...state, selecionado: pessoa})
    })
}

window.listen((oldState) => {
    setState(state => ({...state, count: state.count + 1 || 0}))
}, ['selecionado']);


const adicionarCliente = async function(){
    try{

        const codigoDOM = document.querySelector("#Codigo");
        
        //Validacoes
        if(!state.selecionado.ID) throw "Selecione uma pessoa";
        if(!codigoDOM.value) throw "Insira o código do cliente!";

        var params = new FormData();
        for(var i in state.selecionado){
            params.append(i, state.selecionado[i]);
        }
        params.append("Codigo", codigoDOM.value);

        const response = await fetch('../api/clientes/criar', {
            method: "POST",
            body: params
        });
        
        const res = await response.json();
        if(!res.status) throw res.message;
        
        const backURL = window.location.href.split("/").slice(0, window.location.href.split("/").length - 1);
        
        window.location.href = backURL.join("/");

    }catch(e){
        mostraErro("Erro: " + e);
    }
}
