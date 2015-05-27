<?php

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

function criarTarefa($nome, $descricao, $inicio, $fim, $idMmissao,$responsavel){
include "config.php";

    $insere = "INSERT INTO tarefas (nome, descricao, inicio, fim, dono_id_usuario, id_missao) VALUES ('$nome','$descricao','$inicio','$fim','$responsavel','$idMissao')";
        // Executa consulta
        $result = mysql_query($insere, $link);
        // Mensagem caso a consulta falhe.

        if ($result === false)
        {
                echo "Não foi possível inserir os dados" . mysql_error()."<br />";
        }
        else
        {
                echo "dados inserido com sucesso!";
               // header("Location: kanban.php?idMissao=$idMissao");
        }
$libera = mysql_free_result($result);	
}


function listaTarefas($idMissao){
include "config.php";

$query = "SELECT * FROM tarefas WHERE id_missao = '$idMissao'";//sprintf("SELECT * FROM info")

// Executa consulta
$result = mysql_query($query, $link);

$numlinha = mysql_num_rows($result);

if($numlinha > 0)
{
    while ($row = mysql_fetch_assoc($result))
    {	
        $nome= $row['nome'];
        $idTarefa = $row['id_tarefa'];

        echo '<div class="row">	';
            echo '<form id="formListaTarefa" class="form-horizontal" role="form" action="kanban.php" method="post"> ';

                echo '<label for="Nome" class="col-md-6 control-label  pull-left">'.$nome.'</label>';

                echo '<input type="hidden" id="idFase" name="idFase" value="'.$idFase.'" /> ';
                echo '<label class="col-md-3 control-label"><button type="submit" class="btn btn-primary"
                id="detalhes" >Detalhes</button></label>';

                echo '<label class="col-md-3 control-label"><a class="btn btn-danger btn-block " href="EditarFaseController.php?idFase='.$idFase.'" role="button" id="botaoApagar" >Editar</a></label>';
            echo '</form>
        </div><!-- row -->';
    }
}
else{
    echo '<script>
            window.alert("Voce não tem nenhuma Tarefa cadastrada. " );
         </script>';
}
//}
$libera = mysql_free_result($result);
}

function updateTarefa($idTarefa, $nome, $descricao, $inicio, $fim, $idProjeto){
    include "config.php";
    $altera ="UPDATE fases
              SET nome='$nome', descricao='$descricao', inicio='$inicio', fim='$fim'
              WHERE id_fase='$idFase'";
    // Executa consulta
    $result = mysql_query($altera, $link);
    // Mensagem caso a consulta falhe.
    if ($result === false)
    {
            echo "Não foi possível alterar os dados" . mysql_error()."<br />";
    }
    else
    {
            echo "dados alterados com sucesso!";
            header("Location: Projeto.php?idProjeto=$idProjeto");
    }
    $libera = mysql_free_result($result);	
}
