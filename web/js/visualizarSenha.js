let btn = document.querySelector('.lnr-eye');

btn.addEventListener('click', function(){
    let input = documente.querySelector('#txtSenhaLogin');

    if(input.getAttribute('type') == 'password'){
        input.setAttribute('type','text');
    } else{
        input.setAttribute('type', 'password');
    }
});

$(document).ready(function(){
    $('.button').click(function(){
        var clickBtnValue = $(this).val();
        var ajaxurl = '../php/login.php',
        data = {'action': clickBtnValue};
        $.post(ajaxurl, data, function(response){
            alert("action performed successfully");
        });
    });
});
// Função para chamar função php, utilizando ajax.
