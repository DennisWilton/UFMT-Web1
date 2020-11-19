const data = JSON.parse(document.querySelector("#data-pessoas").innerText);


function selecionaPessoa(pessoaID){
    const pessoa = data.filter( pessoa => pessoa.ID == pessoaID)[0];
    
    setState(state => {
        return ({...state, selecionado: pessoa})
    })
}

window.listen((oldState) => {
    document.querySelector("#selecionado").innerText = `Nome: ${window.state.selecionado.Nome}` || `Nome: Não identificado`;
    setState(state => ({...state, count: state.count + 1 || 0}))
}, ['selecionado']);


window.listen(( os ) => {
    document.title = new Date().getTime();
}, ['count', 'selecionado']);