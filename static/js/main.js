
//  Implementação de Denis Wilton de Paula Azevedo
//  Fiz uma espécie de renderizador de estados inspirado no ReactJS.
window.state = {
    selecionado: {
    }
}
window.observers = [];
window.listen = function(cb, affecteds){
    window.observers.push({cb, affecteds});
}
window.setState = function(param = state){
    const oldState = state;

    if(typeof param == 'function'){
        state = param(state);
    } else {
        state = param;
    }

    const oldEntries = Object.entries(oldState);
    const newEntries = Object.entries(state);

    const affecteds = [];

    for (let stateKey in state){
        if(oldState[stateKey] == undefined || oldState[stateKey] !== state[stateKey]){
            affecteds.push(stateKey)
        }
    }

    function resolve(path, obj) {
        return path.split('.').reduce(function(prev, curr) {
            return prev ? prev[curr] : null
        }, obj || self)
    }
    
    document.querySelectorAll("[state]").forEach( item => {
        item.innerText = resolve(item.getAttribute('state'), state)
    })

    observers.forEach( observer => {
        let willRerun = false;
        observer.affecteds.forEach( affected => {
            if(affecteds.includes(affected)){
                willRerun = true;
            }
        })
        if(willRerun) observer.cb();
    })

}
/////////////////////////////////////////////////


function mostraErro(erro, timeout = 3000){
    const erroDOM = document.querySelector("#erro");

    if(!erroDOM) return;

    erroDOM.style.display = 'block';
    erroDOM.innerText = erro;

    if(timeout !== false) {
        setTimeout(() => {
            erroDOM.style.display = 'none'
        }, timeout)
    }
}

window.baseURL = window.location.href.split("/").slice(0, window.location.href.split("/").indexOf('index.php') + 1).join("/") + '/';
window.goTo = function(path = ''){
    window.location.href = window.baseURL + path;
}