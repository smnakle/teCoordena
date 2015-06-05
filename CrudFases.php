<?php

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

function criarFase($nome, $descricao, $inicio, $fim, $idProjeto){
include "config.php";

$insere = "INSERT INTO fases (nome, descricao, inicio, fim, id_projeto) VALUES ('$nome','$descricao','$inicio','$fim','$idProjeto')";

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
                header("Location: Projeto.php?idProjeto=$idProjeto");
        }
$libera = mysql_free_result($result);	
}


function listaFases($idProjeto){
include "config.php";

$query = "SELECT id_fase, nome FROM fases WHERE id_projeto = '$idProjeto'";//sprintf("SELECT * FROM info")
//$query = "SELECT id_fase, nome, descricao , DATE_FORMAT(inicio,'%d/%m/%Y') AS inicio, DATE_FORMAT(fim,'%d/%m/%Y') AS fim, id_projeto FROM fases WHERE id_projeto = '$idProjeto'";
// Executa consulta
$result = mysql_query($query, $link);

$numlinha = mysql_num_rows($result);

if($numlinha > 0)
{
    while ($row = mysql_fetch_assoc($result))
    {	
        $nome= $row['nome'];
        $idFase = $row['id_fase'];
        
//        $descricao =  $row['descricao'];
//        $inicio = $row['inicio'];
//        $fim = $row['fim'];
//        $idProjeto = $row['id_projeto'];

    echo'<div class="row">';
     echo ' <form id="formListaFase" class="form-horizontal" role="form" action="kanban.php" method="post">';
      echo '<div id="dadosFaseForm" class="col-md-12 control-label" >';
      echo '    <label for="Nome" class="col-md-5 control-label  pull-left">'. $nome.'</label>';
      echo '    <label for="idFase" class="col-md-1 control-label  pull-left">'. $idFase . '</label>';
      echo '        <input type="hidden" id="idFase" name="idFase" value="' .$idFase.' />';
      echo '          <label class="col-md-3 control-label ">
                        <button type="submit" class="btn btn-info pull-left" >Detalhes</button>
                        </label>';
       echo '          <label class="col-md-3 control-label ">
                         <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModalEditarFase' .$idFase.'">
                            Modificar
                        </button>                    
                      </label>';
                    
       echo '       </div><!-- dadosFaseForm -->';
    // echo '</form>';
           // modalEditarFase($idFase);
            
           //$queryA = "SELECT id_fase, nome, descricao , DATE_FORMAT(inicio,'%d/%m/%Y') AS inicio, DATE_FORMAT(fim,'%d/%m/%Y') AS fim, id_projeto FROM fases WHERE id_fase = '$idFase'";

           $queryA = "SELECT * FROM fases WHERE id_fase = '$idFase'";
            //Executa consulta
            $resultado = mysql_query($queryA, $link);
            $numlinhaA = mysql_num_rows($resultado);

            if ($numlinhaA > 0) {
                $rowa = mysql_fetch_assoc($resultado);  
                    $idFaseA = $rowa['id_fase'];
                    $nomeA = $rowa['nome'];
                    $descricao =  $rowa['descricao'];
                    $inicio = $rowa['inicio'];
                    $fim = $rowa['fim'];
                    $idProjetoA = $rowa['id_projeto'];
        
           ///////////////////// modal editar fase ////////////////////////////////////// 
  echo '    <div class="modal fade" id="myModalEditarFase' .$idFase.'" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="myModalLabel">Editar Fase</h4> '; echo $idFaseA; echo'
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <form class="form-horizontal" role="form" action="UpdateDadosFase.php" method="POST">
                                    <div class="form-group">
                                        <label for="inputNome" class="col-md-2 control-label">Nome</label>
                                        <div class="col-md-8">
                                            <input type="text" class="form-control" name="nome" id="nome" value="'.$nomeA.'">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputDescricao" class="col-md-2 control-label">Descrição</label>
                                        <div class="col-md-8">
                                            <textarea class="form-control" rows="3" name="descricao" id="texto">'.$descricao.'</textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputInicio3" class="col-sm-2 control-label">Início</label>
                                        <div class="col-sm-4">
                                            <input type="date" class="form-control" name="inicio" id="diniFase" value="'.$inicio.'">
                                        </div>
                                        <label for="inputFim" class="col-sm-1 control-label">Fim</label>
                                        <div class="col-sm-4">
                                            <input type="date" class="form-control" name="fim" value="'.$fim.'" id="dfimFase" >
                                        </div>
                                    </div>
                                    <input type="hidden" id="idFase" name="idFase" value="'.$idFaseA.'" />   
                                    <input type="hidden" id="idProjeto" name="idProjeto" value="'.$idProjetoA.'" /> 
                            </div> <!--row-->
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                            <button type="submit" class="btn btn-success" id="salvarFase">Salvar</button>
                            <!--<label class="col-md-3 control-label pull-right">-->
                                <a class="btn btn-danger pull-right" href="ApagarFase.php?idFase='.$idFaseA.'&idProjeto='.$idProjetoA.'" role="button" id="botaoApagar" >Apagar</a>
                            <!--</label>-->
                        </div>
                        </form>
                    </div><!-- modal content -->
                </div><!-- modal dialog -->
            </div><!-- fade --> ';
       echo '</form>';
    }
      /////////////////////////////////////////////////////////////////////////////////////////////////
      echo '</div><!-- row -->';
   }
 }
else{
    echo '<script>
            window.alert("Voce não tem nenhuma fase cadastrada. " );
         </script>';
}
//}
$libera = mysql_free_result($result);
}

function updateFase($idFase, $nome, $descricao, $inicio, $fim, $idProjeto){
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
            //header("Location: Projeto.php?idProjeto=$idProjeto");
    }
    $libera = mysql_free_result($result);	
}

function modalEditarFase($idFase){
    include "config.php";
    //$query = "SELECT id_fase, nome, descricao , DATE_FORMAT(inicio,'%d/%m/%Y') AS inicio, DATE_FORMAT(fim,'%d/%m/%Y') AS fim, id_projeto FROM fases WHERE id_fase = '$idFase'";
    $query = "SELECT id_fase, nome, descricao, id_projeto FROM fases WHERE id_fase = '$idFase'";
   // Executa consulta
    $result = mysql_query($query, $link);
    $numlinha = mysql_num_rows($result);
    
    if ($numlinha > 0) {
        $row = mysql_fetch_assoc($result);  
            $idFase = $row['id_fase'];
            $nome = $row['nome'];
            $descricao =  $row['descricao'];
            $inicio = $row['inicio'];
            $fim = $row['fim'];
            $idProjeto = $row['id_projeto'];
            
          ?>  
            <!-- Modal editar dados fase -->
            <div class="modal fade" id="myModalEditarFase<?php echo $idFase; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="myModalLabel">Editar Fase</h4> <?php echo $idFase; ?>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <form class="form-horizontal" role="form" action="UpdateDadosFase.php" method="POST">
                                    <div class="form-group">
                                        <label for="inputNome" class="col-md-2 control-label">Nome</label>
                                        <div class="col-md-8">
                                            <input type="text" class="form-control" name="nome" id="nome" value="<?php  echo $nome; ?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputDescricao" class="col-md-2 control-label">Descrição</label>
                                        <div class="col-md-8">
                                            <textarea class="form-control" rows="3" name="descricao" id="texto"><?php  echo $descricao; ?></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputInicio3" class="col-sm-2 control-label">Início</label>
                                        <div class="col-sm-4">
                                            <input type="date" class="form-control" name="inicio" placeholder="" id="diniFase" value="<?php echo $inicio; ?>">
                                        </div>
                                        <label for="inputFim" class="col-sm-1 control-label">Fim</label>
                                        <div class="col-sm-4">
                                            <input type="date" class="form-control" name="fim" value ="<?php  echo $fim; ?>" id="dfimFase" >
                                        </div>
                                    </div>
                                    <input type="hidden" id="idFase" name="idFase" value="<?php echo $idFase; ?>" />   
                                    <input type="hidden" id="idProjeto" name="idProjeto" value="<?php echo $idProjeto;?>" /> 
                            </div> <!--row-->
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                            <button type="submit" class="btn btn-success" id="salvarFase">Salvar</button>
                            <!--<label class="col-md-3 control-label pull-right">-->
                                <a class="btn btn-danger pull-right" href="ApagarFase.php?idFase=<?php echo $idFase; ?>&idProjeto=<?php echo $idProjeto; ?>" role="button" id="botaoApagar" >Apagar</a>
                            <!--</label>-->
                         </div>
                        </form>
                    </div> <!--modal content -->
                </div> <!--modal dialog  -->
            </div> <!-- fade -->
          <?php         
  
     } else {
        ?>
        <script>
            window.alert("Voce não tem fase para editar ");
        </script>
        <?php
    }
    $libera = mysql_free_result($result);
    
}

function apagarFase($idFase, $idProjeto){
    include 'config.php';
    
    $query = "DELETE FROM fases WHERE id_fase= '$idFase'";
    // Executa consulta
    $result = mysql_query($query, $link);
    if ($result === false) {
        echo "Não foi possível apagar os dados" . mysql_error() . "<br />";
        
    } else {
        //echo "dados apagados com sucesso!";
        //printf("Registros Excluídos: %d\n", mysql_affected_rows());
        header("Location: Projeto.php?idProjeto=$idProjeto");
    }

}
