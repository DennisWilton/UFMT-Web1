const clientes = {};
try{
clientes.data = JSON.parse(document.querySelector("#data-clientes").innerText);
}catch(e){

}
async function removeCliente(clienteID){
    try{

        const cliente = clientes.data.filter(cliente => cliente.ID == clienteID)[0];

        if(confirm(`Tem certeza que deseja remover ${cliente.Nome} da lista de clientes?`)){
            var fd = new FormData();
            
            fd.append("ID", cliente.ID);

            const response = await fetch('api/clientes/remover', {
                method: "POST",
                body: fd
            });
            
            const res = await response.json();
            if(!res.status) throw res.message;

            window.location.reload();
        }
        
    }catch(e){
        mostraErro("Erro: \n > " + e, false);
    }
}


async function editaCliente(clienteID){
    try{
        goTo('clientes/edit?id='+clienteID);
    }catch(e){
        mostraErro("Erro: \n > " + e, false);
    }
}


async function updateCliente(clienteID){
    try{

        const cliente = clientes.data.filter(cliente => cliente.ID == clienteID)[0];

        var fd = new FormData();
        
        fd.append("ID", cliente.ID);
        fd.append("Codigo", document.querySelector("#Codigo").value);

        const response = await fetch(baseURL + 'api/clientes/edit', {
            method: "POST",
            body: fd
        });
        console.log(response);
        const res = await response.json();
        if(!res.status) throw res.message;

        goTo('clientes');
        
    }catch(e){
        mostraErro("Erro: \n > " + e, false);
    }
}
