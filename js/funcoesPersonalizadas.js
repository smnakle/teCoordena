
$(document).ready(function() {
    var carregando = $('#carregando');
    var conteudoAjax = $('#conteudo-ajax');

    function mostrarCarregando() {
//     carregando.css('display', 'block').fadeIn(1000);  
        $('conteudo-ajax').show();
    }
    ;

    function aposCarregamento() {
        carregando.fadeOut(1000);
        conteudoAjax.slideDown();
        $('.fechar').click(function() {
            conteudoAjax.slideUp('slow');
        });
    }
    ;

    $('#conteudoAjax').css('opacity', .94);

    $('#ajax a').click(function(event) {
        event.preventDefault();
        mostrarCarregando();
        switch (this.id) {
            case 'm1':
                conteudoAjax.slideUp();
                conteudoAjax.load('criarMissao.php #criarMissao', aposCarregamento);
                break;
            case 'm2':
                conteudoAjax.slideUp();
                conteudoAjax.load('editarMissao.php #editarMissao', aposCarregamento);
                break;
            case 'm3':
                conteudoAjax.slideUp();
                conteudoAjax.load('excluirMissao.php #excluirMissao', aposCarregamento);
                break;
            case 'm4':
                conteudoAjax.slideUp();
                mostrarCarregando();
                conteudoAjax.load('#criarTarefa');
                break;
            default:
                aposCarregamento();
                break;
        }
    });
});
