$(document).ready(function(){
    $('.button').click(function(){
        var clickBtnValue = $(this).val();
        var ajaxurl = './php/login.php',
        data = {'action': clickBtnValue};
        $.post(ajaxurl, data, function(response){
            alert("action performed successfully");
        });
    });
});
// Função para chamar função php, utilizando ajax.
