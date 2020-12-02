async function adicionarEndereco(ClienteID){
    const Estado = document.querySelector("#Estado").value;
    const Cidade = document.querySelector("#Cidade").value;
    const Bairro = document.querySelector("#Bairro").value;
    const Logradouro = document.querySelector("#Logradouro").value;
    const Numero = document.querySelector("#Numero").value;
    const Complemento = document.querySelector("#Complemento").value;

    var params = new FormData();

        params.append("ClienteID", ClienteID);
        params.append("Estado", Estado);
        params.append("Cidade", Cidade);
        params.append("Bairro", Bairro);
        params.append("Logradouro", Logradouro);
        params.append("Numero", Numero);
        params.append("Complemento", Complemento);

    

    const response = await fetch('../api/clientes/enderecoAdd', {
        method: "POST",
        body: params
    });

    console.log(await response.text())
    // const res = await response.json();
    
    // console.log(res)
    // const res = { status: false, message: 'a'}

    // if(!res.status) throw res.message || 2;
    
    goTo("clientes");
    
}