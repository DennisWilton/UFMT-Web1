const clientes = {};
clientes.data = JSON.parse(document.querySelector("#data-clientes").innerText);

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