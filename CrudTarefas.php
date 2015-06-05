<?php
//
//function test_input($data) {
//    $data = trim($data);
//    $data = stripslashes($data);
//    $data = htmlspecialchars($data);
//    return $data;
//}

function criarTarefa($nome, $descricao, $estado, $inicio, $fim, $responsavel, $idMissao){
    include 'config.php';

    $insere = "INSERT INTO tarefas (nome, descricao, estado, inicio, fim, dono_id_usuario, id_missao) "
            . "VALUES ('$nome','$descricao','$estado','$inicio','$fim','$responsavel',$idMissao')";
    // Executa consulta
    $result = mysql_query($insere, $link);
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

$query = "SELECT t.id_tarefa, t.nome, t.descricao, t.estado, u.username FROM tarefas AS t 
        INNER JOIN usuario AS u 
        ON u.id_usuario = t.dono_id_usuario
        WHERE id_missao = '$idMissao'";

$busca = "SELECT DATE_FORMAT(inicio,'%d/%m/%Y') AS inicio, DATE_FORMAT(fim,'%d/%m/%Y') AS fim FROM tarefas WHERE id_missao = '$idMissao'";
// Executa consulta
$result = mysql_query($query, $link);
$resultData = mysql_query($busca, $link);

$numlinha = mysql_num_rows($result);
//$numlinhaData = mysql_num_rows($resultData);
if($numlinha >= 1 )//&& $numlinhaData >0
{
    while ($row = mysql_fetch_assoc($result))
    {	
        $row2 = mysql_fetch_array($resultData);
        $nome= $row['nome'];
        $idTarefa = $row['id_tarefa'];
        //$responsavel = $row['dono_id_usuario'];
        $inicio = $row2['inicio'];
        $fim = $row2['fim'];
        $estado = $row['estado'];
        $username = $row['username'];
        
         ///////////////////////// modal editar Tarefa /////////////////////////////
        ?>
        <div id="tarefa<?php echo $idTarefa; ?>" class="panel panel-default">
            <div class="panel-body"><h6>
             <?php
                echo '<span title="inicio:'.$inicio.' fim:'.$fim.'" data-toggle="tooltip" data-placement="right">';
                echo $nome."<br>".$username."<br>".$estado;
                echo '</span>';
                ?>
             <span title="Editar tarefa" data-toggle="tooltip" data-placement="right"> 
                <a href="#" data-toggle="modal" data-target="#myModalEditarTarefa<?php echo $idTarefa; ?>" > 
                    <span class="glyphicon glyphicon-pencil" aria-hidden="true" aria-label="Right Align"></span>
                </a>
             </span></h6>
            </div> <!-- panel body -->
         </div>  <!-- div idTArefa> -->   
         <?php  
         //modalEditarTarefa($idTarefa); 
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
