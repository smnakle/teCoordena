<script type="text/javascript">
//mostra e esconde os ícones de criar tarefa, editar e remover missao
$(document).ready(function(){
    $("#nomeMissao").mouseout(function(){
        $("divIconesMissao").hide();
    });
    $("#nomeMissao").mouseover(function(){
        $("divIconesMissao").show();
    });
});
</script>
<!--script que executa o drag and drop-->
<script>
    function allowDrop(ev) {
        ev.preventDefault();
    }

    function drag(ev) {
        ev.dataTransfer.setData("text", ev.target.id);
    }

    function drop(ev) {
        ev.preventDefault();
        var data = ev.dataTransfer.getData("text");
        ev.target.appendChild(document.getElementById(data));
    }
    <script>
        $('#myModal').on('shown.bs.modal', function() {
            $('#myInput').focus();
        });
    </script>
    <script>
        $('#myModalFase').on('shown.bs.modal', function() {
            $('#myInput').focus();
        });
    </script>


SELECT p.nome,u1.username,u2.username,u3.username,u4.username FROM time as t
INNER JOIN projetos as p
on t.id_projeto = p.id_projeto
INNER JOIN users as u1
on u1.id_usuario = t.integranteUm
INNER JOIN users as u2
on u2.id_usuario = t.integranteDois
INNER JOIN users as u3
on u3.id_usuario = t.integranteTres
INNER JOIN users as u4
on u4.id_usuario = t.integranteQuatro


SELECT p.nome FROM projeto as p
INNER JOIN time as t
ON p.id_projeto = t.id_projeto
AND (t.integranteUm = p.id_criador 
       OR t.integranteDois =p.id_criador 
       OR t.integranteTres = p.id_criador 
       OR t.integranteQuatro = p.id_criador )
AND t.id_criador != p.id_criador
WHERE p.id_criador = 4;

SELECT p.nome FROM projetos as p
INNER JOIN time as t
ON p.id_projeto = t.id_projeto
ON t.id_criador != p.id_criador
AND (t.integranteUm = p.id_criador 
       OR t.integranteDois =p.id_criador 
       OR t.integranteTres = p.id_criador 
       OR t.integranteQuatro = p.id_criador )
WHERE t.id_criador = '2';

SELECT p.nome, p.id_projeto FROM projetos as p
INNER JOIN time as ta
ON p.id_projeto = ta.id_projeto
INNER JOIN time as t
ON t.id_criador != p.id_criador
AND (t.integranteUm = t.id_criador 
       OR t.integranteDois =t.id_criador 
       OR t.integranteTres =t.id_criador 
       OR t.integranteQuatro = t.id_criador )
WHERE p.id_criador = '2';

SELECT p.nome, p.id_projeto FROM projetos as p
INNER JOIN time as t
ON p.id_projeto = t.id_projeto
WHERE t.id_criador != 2
AND (t.integranteUm = t.id_criador 
       OR t.integranteDois = t.id_criador 
       OR t.integranteTres = t.id_criador 
       OR t.integranteQuatro = t.id_criador );
       
SELECT p.nome, p.id_projeto FROM projetos as p
INNER JOIN time as ta
ON p.id_projeto = ta.id_projeto
INNER JOIN time as t
ON t.id_criador != p.id_criador
WHERE t.id_criador = 4
AND (t.integranteUm = t.id_criador 
       OR t.integranteDois = t.id_criador 
       OR t.integranteTres = t.id_criador 
       OR t.integranteQuatro = t.id_criador );
       
SELECT p.nome, t.id_projeto FROM projetos as p
INNER JOIN time as t
ON p.id_projeto = t.id_projeto
WHERE t.id_criador != '4'
AND (t.integranteUm = t.id_criador 
       OR t.integranteDois = t.id_criador 
       OR t.integranteTres = t.id_criador 
       OR t.integranteQuatro = t.id_criador );