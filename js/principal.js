// jQuery(function($){
//     // $('elemento')
//     $('body').append('<p>Criei um parágrafo com JQuery</p>');
//     console.log("Códigos JQuery a serem executados quando a página conter outras bibliotecas que usam o mesmo símbolo($).");
// })

// $(function(){
//     console.log("JQuery sem proteção no apelido $");
// })

// Jeito de deixar protegido a biblioteca e uma forma mais organizada
// (function($){
//     $(function(){
//         console.log("JQuerry Carregado");
//     });
// })(JQuery);


$(document).ready(function(){
    //console.log("Funcionou a instalação.");



    var msg = $(".resposta");
    //msg.hide();  







    var btn = $(".btn-usuario");
    //console.log(btn);
    btn.click(function(){
        //alert("O cara clicou");

        var dados = $(".form_usuario").serialize();
        //console.log(dados);

        $.ajax({
            url: "gravar_usuario.php",
            method: "POST",
            data: dados,
            beforeSend: function(){
                msg.html("<p class = 'load'><img src='img/load.gif' alt='Carregando...'> Enviando Dados</p>").show(1000);
            },
            success: function(result){
                // console.log("A minha função AJAX funcionou");
                // console.log(result);

                if(result == 0){
                    msg.html("<p class = 'error'>Todos os campos são obrigatórios</p>").show(1000, function(){msg.hide(5000)});
                }else{
                    msg.html("<p class = 'success'>Cadastro Realizado com successo</p>").show(1000, function(){msg.hide(5000)});
                    //Primeiro faz o show, depois o hide
                }               
               // msg.show(); // Manipula o CSS
            },
            error: function(e){
                console.log(e.status);
                if(e.status == 404){
                    $('body').append("Erro ao encontrar o Arquivo");
                }
                console.log("Deu ruim na função AJAX");
            }
        });

        return false; // Não deixa funcionar o submit do HTML
    })
});