(function(win,doc){
    'use strict';

    if(doc.querySelector('.js-del-orgao')){
        let btn = doc.querySelectorAll('.js-del-orgao');
        for(let i=0; i < btn.length; i++) {
            btn[i].addEventListener('click', confirmDelOrgao, false);
        }
    }

    if(doc.querySelector('.js-del-uni')){
        let btn = doc.querySelectorAll('.js-del-uni');
        for(let i=0; i < btn.length; i++) {
            btn[i].addEventListener('click', confirmDelUni, false);
        }
    }

    function confirmDelOrgao(e){
        e.preventDefault()
        let token = doc.getElementsByName('_token')[0].value
        if (confirm('Deseja Mesmo Deletar?')) {
            let ajax = new XMLHttpRequest()
            ajax.open("DELETE", e.target.parentNode.href)
            ajax.setRequestHeader("X-CSRF-TOKEN", token)
            ajax.onreadystatechange = function (){
                if (ajax.readyState === 4 && ajax.status === 200) {
                    win.location.href = "crud"
                }
            }
            ajax.send()
        }else{
            return false
        }
    }
    function confirmDelUni(e){
        e.preventDefault()
        let token = doc.getElementsByName('_token')[1].value
        if (confirm('Deseja Mesmo Deletar?')) {
            let ajax = new XMLHttpRequest()
            ajax.open("DELETE", e.target.parentNode.href)
            ajax.setRequestHeader("X-CSRF-TOKEN", token)
            ajax.onreadystatechange = function (){
                if (ajax.readyState === 4 && ajax.status === 200) {
                    win.location.href = "cad"
                }
            }
            ajax.send()
        }else{
            return false
        }
    }

})(window,document)