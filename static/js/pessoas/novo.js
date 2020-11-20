const adicionarPessoa = async function(){
    try{

        const nomeDOM = document.querySelector("#Nome");
        const cpfDOM = document.querySelector("#CPF");
        const sexoDOM = document.querySelector("#Sexo");
        
        //Validacoes
        if(!nomeDOM.value || !cpfDOM.value || !sexoDOM.value) throw "Por favor, preencha todos os campos.!";

        var params = new FormData();
        params.append("Nome", nomeDOM.value);
        params.append("CPF", cpfDOM.value);
        params.append("Sexo", sexoDOM.value);

        const response = await fetch('../api/pessoas/criar', {
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
