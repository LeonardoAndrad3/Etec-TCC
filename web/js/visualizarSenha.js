let btn = document.querySelector('.lnr-eye');

btn.addEventListener('click', function(){
    let input = documente.querySelector('#txtSenhaLogin');

    if(input.getAttribute('type') == 'password'){
        input.setAttribute('type','text');
    } else{
        input.setAttribute('type', 'password');
    }
});

