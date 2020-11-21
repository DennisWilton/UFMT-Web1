async function excluiProduto(id){
    try{
        if(confirm("Tem certeza que deseja excluir este produto?")){
            
            const json = true;
            
            var fd = new FormData();
            
            fd.append("ID", id);
            
            const response = await fetch('../api/produtos/remove', {
                method: "POST",
                body: fd
            });

            
            if(json) {
                const res = await response.json();
                if(!res.status) throw res.message;
                console.log(res);
            }else{
                const res = await response.text();
                console.log(res);
                if(!res.status) throw res;
            }
            
            goTo("produtos");
        }
    }catch(e){
        console.log("Erro", e);
    }
}


async function editaProduto(id){
    try{
            const json = true;
            
            var fd = new FormData();
            
            fd.append("id", id);
            fd.append("Nome", document.querySelector("#Nome").value);
            fd.append("Quantidade", document.querySelector("#Quantidade").value);
            fd.append("Valor", document.querySelector("#Valor").value);
            if(document.querySelector("#Imagem").value.trim()){
            fd.append("Imagem", document.querySelector("#Imagem").value);
            }
            
            const response = await fetch('../api/produtos/set', {
                method: "POST",
                body: fd
            });

            
            if(json) {
                const res = await response.json();
                if(!res.status) throw res.message;
            }else{
                const res = await response.text();
                if(!res.status) throw res;
            }
            
            goTo("produtos");
    }catch(e){
        console.log("Erro API editar Produto > ", e);
    }
}


async function insereProduto(){
    try{
            const json = true;
            
            var fd = new FormData();
            
            fd.append("Nome", document.querySelector("#Nome").value);
            fd.append("Quantidade", document.querySelector("#Quantidade").value);
            fd.append("Valor", document.querySelector("#Valor").value);
            if(document.querySelector("#Imagem").value.trim()){
                fd.append("Imagem", document.querySelector("#Imagem").value);
            }
            
            const response = await fetch('../api/produtos/set', {
                method: "POST",
                body: fd
            });

            
            if(json) {
                const res = await response.json();
                if(!res.status) throw res.message;
            }else{
                const res = await response.text();
                if(!res.status) throw res;
            }
            
            goTo("produtos");
    }catch(e){
        console.log("Erro API inserir Produto > ", e);
    }
}