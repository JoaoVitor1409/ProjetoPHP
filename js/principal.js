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

    $body = $("body");

    $(document).on({
        ajaxStart : function(){ $body.addClass("loading"); },
        ajaxError : function(){ errosend(); },
        ajaxStop : function(){ $body.removeClass("loading"); }
    });

    $(document).ajaxError(function(){
        alert("Erro");
    });


    var msg = $(".resposta");
    //msg.hide();  

    function carregando(mensagem = "Por favor espere um momento."){
        msg.empty().html("<p class='load'><img src='img/load.gif' alt='Carregando...'>"+ mensagem + "</p>").fadeIn("fast");
    }

    function errosend(){
        msg.empty().html("<p class='error'><strong>Erro: Por favor, entre em contanto com o suporte</strong></p>").fadeIn("fast");
    }

    function errodados(mensagem) {
        msg.empty().html("<p class='error'>"+ mensagem + "</p>").fadeIn("fast");
    }

    function sucesso(mensagem) {
        msg.empty().html("<p class='success'>"+ mensagem + "</p>").fadeIn("fast");
    }



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
            dataType: "json", //Está esperando um Json
            beforeSend: function(){
                carregando();
            },
            success: function(result){
                // console.log("A minha função AJAX funcionou");
                //console.log(result);
                
                result["codigo"] == 0 ? errodados(result["mensagem"]) : sucesso(result["mensagem"]);

                /*if(result["codigo"] == 0){
                    errodados(result["mensagem"]);
                }else if(result["codigo"] == 1){
                    sucesso(result["mensagem"]);
                }*/

                /*if(result == 0){
                    errodados("Campos em Branco!");
                }else{
                    sucesso("Usuário cadastrado com sucesso!");
                    //Primeiro faz o show, depois o hide
                }*/               
               // msg.show(); // Manipula o CSS
            },
            error: function(e){
                console.log(e.status);
                if(e.status == 404){
                    errosend();
                }
                //console.log("Deu ruim na função AJAX");
            }
        });

        return false; // Não deixa funcionar o submit do HTML
    })
});