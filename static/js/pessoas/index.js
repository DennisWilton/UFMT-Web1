const pessoas = {}

pessoas.data = JSON.parse(document.querySelector("#data-pessoas").innerText);

async function editaPessoa(pessoaID){
    try{
        goTo('pessoas/edit?id='+pessoaID);
    }catch(e){
        mostraErro("Erro: \n > " + e, false);
    }
}

async function updatePessoa(pessoaID){
    try{
        let json = true;
        
        const pessoa = pessoas.data.filter(pessoa => pessoa.ID == pessoaID)[0];


        var fd = new FormData();
        
        fd.append("ID", pessoa.ID);
        fd.append("Nome", document.querySelector("#Nome").value);
        fd.append("CPF", document.querySelector("#CPF").value);
        fd.append("Sexo", document.querySelector("#Sexo").value);

        const response = await fetch(baseURL + 'api/pessoas/edit', {
            method: "POST",
            body: fd
        });
        console.log(response);
        if(json){
            const res = await response.json();
            if(!res.status) throw res.message;
        }else{
            const res = await response.text();
            if(!res.status) throw res;
        }

        goTo('pessoas');
        
    }catch(e){
        mostraErro("Erro: \n > " + e, false);
    }
}
