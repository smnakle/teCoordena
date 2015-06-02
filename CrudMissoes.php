<?php

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

function criarMissao($nome, $descricao, $idFase){
include 'config.php';

$insere = "INSERT INTO missoes (nome, descricao, id_fase) VALUES ('$nome','$descricao','$idFase')";      
$result = mysql_query($insere, $link);
       
if ($result === false)
{
    echo "Não foi possível inserir os dados" . mysql_error()."<br />";
}
else
{
   // echo "dados inserido com sucesso!";
    //listaMissoes($idFase);
    header("Location: kanban.php?idFase=$idFase");
}
//$libera = mysql_free_result($result);	
}

function listaMissoes($fkIdFase){
include "config.php";

//echo $fkIdFase;

$query = "SELECT id_missao, nome FROM missoes WHERE fk_id_fase = '$fkIdFase'";

// Executa consulta
$result = mysql_query($query, $link);

$numlinha = mysql_num_rows($result);

if($numlinha > 0)
{
    while ($row = mysql_fetch_assoc($result))
    {	
        $nome= $row['nome'];
        $idMissao = $row['id_missao'];
         ?>
        <tr>
          <th scope="row" aling="left">
        <div class="row">
          <div id="divMissao" class="col-md-9" >
                    <?php echo $nome; ?>
                        <?php $idMissao; ?>
          </div><!--divMissao -->
          <div id="divIconesMissao" class="col-md-1 control-label ">               
               <!--//////////////////// modal criar tarefa /////////////////////////////-->
                       <span title="Criar tarefa" data-toggle="tooltip" data-placement="right"> 
                           <a href="#" data-toggle="modal" data-target="#myModalTarefa" id="m2"> 
                                <span class="glyphicon glyphicon-list-alt" aria-hidden="true" aria-label="Right Align"></span>                        
                           </a>                  
                       </span>
                        <!-- Modal -->
            <div class="modal fade" id="myModalTarefa" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="myModalLabel">Criar Tarefa</h4>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <form class="form-horizontal" role="form" action="RecebeDadosTarefa.php" method="POST">
                                    <div class="form-group">
                                        <label for="inputNome" class="col-md-2 control-label">Nome:</label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="nome" id="nomeMissao" required="required">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputDescricao" class="col-md-2 control-label">Descrição:</label>
                                        <div class="col-md-9">
                                            <textarea class="form-control" rows="3" name="descricao" id="descricaoMissao"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputNome" class="col-md-6 control-label">Responsavel</label>
                                        <div class="col-md-3"><?php listaResponsavel("idUsuario") ?></div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputInicio3" class="col-sm-2 control-label">Início</label>
                                        <div class="col-sm-4">
                                            <input type="date" class="form-control" name="inicio" placeholder="dd/mm/yyyy" id="diniFase" required="required">
                                        </div>
                                        <label for="inputFim" class="col-sm-1 control-label">Fim</label>
                                        <div class="col-sm-4">
                                            <input type="date" class="form-control" name="fim" placeholder="dd/mm/yyyy" id="dfimFase" required="required" >
                                        </div>
                                    </div>
                                    <input type="hidden" name="idMissao" value="<?php echo $idMissao; ?>" />     
                            </div> <!-- row-->
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                            <button type="submit" class="btn btn-success" id="salvarFase">Salvar</button>
                        </div>
                        </form>
                    </div><!-- modal content -->
                </div><!-- modal dialog -->
            </div><!-- fade -->    
            <!--//////////////////// fim modal criar tarefa /////////////////////////////-->  
               <!--</form>-->
                <!--//////////////////// modal editar missao /////////////////////////////-->
                 <span title="Editar missão" data-toggle="tooltip" data-placement="right"> 
                    <a href="#" data-toggle="modal" data-target="#myModalEditarMissao'<?php $idMissao; ?>' " id="m2"> 
                    <!--<a href="#"  id="m2" data-toggle="tooltip" data-placement="right" title="Editar missão">-->
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true" aria-label="Right Align"></span>
                    </a>
                 </span>
                <!---     Fim modal editar missao          -->
                <form id="formDeletarMissao" class="form-horizontal" role="form" action="excluirMissao.php" method="post"> 
                    <a href="#" id="m3" data-toggle="tooltip" data-placement="right" title="Excluir missão">
                        <span class="glyphicon glyphicon-remove-sign" aria-hidden="true" aria-label="Right Align"></span>
                    </a>
                </form>
           </div><!-- divIconesMissao -->
        </div><!-- row-->
           </th>
          <td id="afazer" class="danger" ondrop="drop(event)" ondragover="allowDrop(event)"><div id="testeDrag" draggable="true" ondragstart="drag(event)"></div></td>
          <td id="desenvolvendo"class="warning" ondrop="drop(event)" ondragover="allowDrop(event)"></td>
          <td id="verificando" class="info" ondrop="drop(event)" ondragover="allowDrop(event)"></td>
          <td id="pronto" class="success" ondrop="drop(event)" ondragover="allowDrop(event)"> </td>
        </tr>
<?php
    }
}
else{
    echo '<script>
            window.alert("Voce não tem nenhuma missão cadastrada. " );
         </script>';
}
//}
$libera = mysql_free_result($result);
}

function updateMissao($idMissao, $nome, $descricao, $idFase){
    include "config.php";
    $altera ="UPDATE fases
              SET nome='$nome', descricao='$descricao', id_fase ='$idFase'
              WHERE id_missao='$idMissao'";
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
            header("Location: kanban.php?idFase=$idFase");
    }
    $libera = mysql_free_result($result);	
}
	
?>