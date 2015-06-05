<?php
require "header.php";
session_start();
if (isset($_SESSION['username']))
    $username = $_SESSION['username'];
if (isset($_SESSION['password']))
    $password = $_SESSION['password'];
if (!(empty($username) OR empty($password))) {
    $idProjeto = $_SESSION['idProjeto'];
    include 'config.php';
    include 'CrudMissoes.php';
    include 'CrudTime.php';
    include 'CrudTarefas.php';
    //include 'aultoload.php';

    $idFase = $_REQUEST['idFase'];
    $_SESSION['idFase'] = $idFase;
    //echo 'id fase = '. $idFase;
    ?> 
    <script>
        $(function() {
            $('[data-toggle="tooltip"]').tooltip()
        })
    </script>
    <div class="col-md-10 col-md-offset-1" id="ajax">
        <!--Aqui é a tabela-->
        <table class="table table-bordered table-hover"> 
    <!--                <caption id="thCaption">Quadro de tarefas</caption>-->
            <thead>
                <tr>
                    <th id="thMissoes" rowspan="2"> 
                        <!--//////////////////// modal criar missao /////////////////////////////-->
                        <a href="#" data-toggle="modal" data-target="#myModalMissao" id="m1"> Missões  
                            <span class='glyphicon glyphicon-plus' aria-hidden='true'></span>                         
                        </a>
                        <!-- Modal -->
            <div class="modal fade" id="myModalMissao" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="myModalLabel">Criar Missao</h4>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <form class="form-horizontal" role="form" action="RecebeDadosMissao.php" method="POST">
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
                                    <input type="hidden" name="idFase" value="<?php echo $idFase; ?>" />     
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
            <!--//////////////////// fim modal criar missao /////////////////////////////-->           
            </th>
            <th id="thTarefas" colspan="4"> Tarefas </th>
            </tr>
            <tr>
                <th class="danger">A Fazer&nbsp;</th>
                <th class="warning">Desenvolvendo</th>
                <th class="info">Testando</th>
                <th class="success">Pronto</th>
            </tr>
            </thead>
            <tbody>
                <?php //listaMissoes($idFase); ?>
            <!--</tbody>-->
                <?php
                $query = "SELECT id_missao, nome FROM missoes WHERE fk_id_fase = '$idFase'";

                // Executa consulta
                $result = mysql_query($query, $link);
                $numlinha = mysql_num_rows($result);

                if ($numlinha > 0) {
                    while ($row = mysql_fetch_assoc($result)) {
                        $nome = $row['nome'];
                        $idMissao = $row['id_missao'];
                        ?>
            <tr>
                <th scope="row" aling="left">

                    <div class="row">
          <div id="divMissao" class="col-md-9" >
                    <?php echo $nome; ?>
                        <?php $idMissao; ?>
          </div><!--divMissao -->
                    <div id="divIconesMissao" class="col-md-1 control-label"> 
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
                                <form class="form-horizontal" role="form" action="RecebeDadosTarefa.php" method="POST" id="formCriarTarefa">
                                    <div class="form-group">
                                        <label for="inputNome" class="col-md-2 control-label">Nome:</label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="nome" id="nomeTarefa" required="required">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputDescricao" class="col-md-2 control-label">Descrição:</label>
                                        <div class="col-md-9">
                                            <textarea class="form-control" rows="3" name="descricao" id="descricaoTarefa"></textarea>
                                        </div>
                                    </div>
                                    <div class="row">
                                    <div class="form-group">
                                        <label for="inputNome" class="col-md-3 control-label">Responsável:</label>
                                        <div class="col-md-2"><?php listaUserSelect("responsavel","formCriarTarefa"); ?></div>
<!--                                    </div>
                                    <div class="form-group">-->
                                        <label for="inputEstado" class="col-md-3 control-label">Estado:</label>
                                        <div class="col-md-1">
                                            <select name="estadoTarefa" form="formCriarTarefa">
                                                <option value="1"> A fazer</option>
                                                <option value="2"> Desenvolvendo</option>
                                                <option value="3"> Testando</option>
                                                <option value="4"> Pronto </option>                                                
                                            </select>
                                        </div>
                                    </div>
                                    </div><!-- row -->
                                    <div class="form-group">
                                        <label for="inputInicio3" class="col-sm-2 control-label">Início</label>
                                        <div class="col-sm-4">
                                            <input type="date" class="form-control" name="inicio" placeholder="dd/mm/yyyy" id="diniTarefa" required="required">
                                        </div>
                                        <label for="inputFim" class="col-sm-1 control-label">Fim</label>
                                        <div class="col-sm-4">
                                            <input type="date" class="form-control" name="fim" placeholder="dd/mm/yyyy" id="dfimTarefa" required="required" >
                                        </div>
                                    </div>
                                    <input type="hidden" name="idMissao" value="<?php echo $idMissao; ?>" />     
                            </div> <!-- row-->
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                            <button type="submit" class="btn btn-success" id="salvarTarefa">Salvar</button>
                        </div>
                        </form>
                    </div><!-- modal content -->
                </div><!-- modal dialog -->
            </div><!-- fade -->    
            <!--//////////////////// fim modal criar tarefa /////////////////////////////-->  
                            
                            
                        </form>
                        <form id="formEditarMissao" class="form-horizontal" role="form" action="editarMissao.php" method="post"> 
                            <a href="#" onclick="" id="m2" data-toggle="tooltip" data-placement="right" title="Editar missão">
                                <span class="glyphicon glyphicon-pencil" aria-hidden="true" aria-label="Right Align"></span>
                            </a>
                        </form>
                        <form id="formDeletarMissao" class="form-horizontal" role="form" action="excluirMissao.php" method="post"> 
                            <a href="#" onclick="" id="m3" data-toggle="tooltip" data-placement="right" title="Excluir missão">
                                <span class="glyphicon glyphicon-remove-sign" aria-hidden="true" aria-label="Right Align"></span>
                            </a>
                        </form>
                    </div><!-- divIconesMissao -->
                    </div><!-- row -->
                    </th>
<!--                <td id="afazer<?php //echo $idMissao; ?>" name="afazer" class="danger" ondrop="drop(event)" ondragover="allowDrop(event)"><div id="testeDrag" draggable="true" ondragstart="drag(event)"></div></td>
                    <td id="desenvolvendo<?php // echo $idMissao; ?>" name="desenvolvendo" class="warning" ondrop="drop(event)" ondragover="allowDrop(event)"></td>
                    <td id="verificando<?php //echo $idMissao; ?>" name="verificando" class="info" ondrop="drop(event)" ondragover="allowDrop(event)"></td>
                    <td id="pronto<?php // echo $idMissao; ?>" name="pronto" class="success" ondrop="drop(event)" ondragover="allowDrop(event)"> </td>-->
                    <td id="afazer<?php echo $idMissao; ?>" name="afazer" class="danger" ></td>
                    <td id="desenvolvendo<?php echo $idMissao; ?>" name="desenvolvendo" class="warning"></td>
                    <td id="verificando<?php echo $idMissao; ?>" name="verificando" class="info" ></td>
                    <td id="pronto<?php echo $idMissao; ?>" name="pronto" class="success"> </td>
                    </tr>
<!--                    </tbody>
        </table>-->
            <?php
            listaTarefas($idMissao);
        }
    } else {
        echo '<script>
                            window.alert("Voce não tem nenhuma missão cadastrada. " );
                         </script>';
    }
    //}
    $libera = mysql_free_result($result);
    ?>
            </tbody>
        </table>
    </div><!-- id=ajax-->
    <!--         <div id="conteudo-ajax" style="display: none;"></div>-->
    </div><!--/.sidebar-offcanvas--> 
    </div><!--/row off canvas-->
    </div><!-- md-offset-1-->  
    </div><!--/.container-->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="js/jquery-2.1.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script> 
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <!--<script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>-->
    <!--<script src="offcanvas.js"></script>-->

    <?php
    //include_once "footer.php";
} else {
    echo "usuario não cadastrado, faça seu cadastro";
    echo "<a href= 'index.html'> Voltar </a>";
}
?>
</body>
</html>


