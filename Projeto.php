<?php
require "header.php";
session_start();
if (isset($_SESSION['username']))
    $username = $_SESSION['username'];
if (isset($_SESSION['password']))
    $password = $_SESSION['password'];
if (!(empty($username) OR empty($password))) {
    include "CrudProjetos.php";
    include "CrudFases.php";
    include "CrudTime.php";
    include "config.php";
    //include 'autoload.php';
    $idProjeto = $_REQUEST['idProjeto'];
    echo $idProjeto;
    //$_SESSION['idProjeto'] = $idProjeto;
    ?>
    <div class="row">
        <!--///////////////////////////Fases////////////////////////////////////////-->
        <div class="col-lg-4">
            <h2>Fases</h2>
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-success pull-right" data-toggle="modal" data-target="#myModalFase">
                Adicionar
            </button>

            <!-- Modal -->
            <div class="modal fade" id="myModalFase" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="myModalLabel">Criar fase</h4>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <form class="form-horizontal" role="form" action="RecebeDadosFase.php" method="POST">
                                    <div class="form-group">
                                        <label for="inputNome" class="col-md-2 control-label">Nome</label>
                                        <div class="col-md-8">
                                            <input type="text" class="form-control" name="nome" id="nome" required="required">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputDescricao" class="col-md-2 control-label">Descrição</label>
                                        <div class="col-md-8">
                                            <textarea class="form-control" rows="3" name="descricao" id="texto"></textarea>
                                        </div>
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
                                    <input type="hidden" id="idProjeto" name="idProjeto" value="<?php echo $idProjeto; ?>" />     
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
            <hr>
            <?php
            listaFases($idProjeto);
            ?>	
        </div><!-- /col-lg4 -->
        <!--///////////////////////////Time////////////////////////////////////////-->
        <div class="col-lg-4">
            <h2>Time</h2>
            <!--////////////////  Modal Time /////////////////////////////////-->
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-success  pull-right" data-toggle="modal" data-target="#myModal">
                Adicionar
            </button>
            <!-- Modal -->
            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-sm">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="myModalLabel">Criar Time</h4>
                        </div>
                        <div class="modal-body">

                            <div class="row">
                                <form class="form-horizontal" role="form" action="RecebeDadosTime.php" method="POST" id="cadastraTime">
                                    <div class="form-group">
                                        <label for="inputNome" class="col-md-6 control-label">1º Membro:*</label>
                                        <div class="col-md-3"><?php listaUserSelect("idUsuarioA", "cadastraTime") ?></div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputNome" class="col-md-6 control-label">2º Membro:*</label>
                                        <div class="col-md-3"><?php listaUserSelect("idUsuarioB", "cadastraTime") ?></div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputNome" class="col-md-6 control-label">3º Membro:</label>
                                        <div class="col-md-3"><?php listaUserSelect("idUsuarioC", "cadastraTime") ?></div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputNome" class="col-md-6 control-label">4º Membro:</label>
                                        <div class="col-md-3"><?php listaUserSelect("idUsuarioD","cadastraTime") ?></div>
                                    </div>      
                                    <input type="hidden" id="idProjeto" name="idProjeto" value="<?php echo $idProjeto; ?>" />      
                            </div> <!-- row-->
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                            <button type="submit" class="btn btn-success" id="salvar">Salvar</button>
                        </div><!-- modal footer-->
                        </form> 
                    </div>
                </div>
            </div>
            <!--//////////////// Fim Modal  /////////////////////////////////-->
            <hr>
            <?php listaTime($idProjeto) ?>
        </div><!-- /col-lg4 -->
        <!--////////////////////////Dados Projeto//////////////////////////////////-->
        <div class="col-lg-4">
            <h2>Dados do Projeto</h2>
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary pull-right" data-toggle="modal" data-target="#myModalEditarProjeto">
                Modificar
            </button>
            <?php modalEditarProjeto($idProjeto);?>
            <hr>
            <?php
            listaDetalheProjeto($idProjeto);
            ?>
            <hr>
             <!--//////////////////////// Reunioes //////////////////////////////////-->
            <h2>Reuniões</h2>
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-success pull-right" data-toggle="modal" data-target="#myModalReuniao">
                Marcar
            </button>

            <!-- Modal -->
            <div class="modal fade" id="myModalReuniao" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="myModalLabel">Marcar Reunião</h4>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <form class="form-horizontal" role="form" action="EditarProjetoController.php" method="POST">
                                    <div class="form-group">
                                        <label for="inputNome" class="col-md-2 control-label">Assunto</label>
                                        <div class="col-md-8">
                                            <input type="text" class="form-control" name="nome" id="nomeReu" required="required">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputDescricao" class="col-md-2 control-label">Descrição</label>
                                        <div class="col-md-8">
                                            <textarea class="form-control" rows="3" name="descricao" id="textoReu"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputInicio3" class="col-sm-2 control-label">Início</label>
                                        <div class="col-sm-4">
                                            <input type="date" class="form-control" name="inicio" placeholder="dd/mm/yyyy" id="diniReu" required="required">
                                        </div>
                                        <label for="inputFim" class="col-sm-1 control-label">Fim</label>
                                        <div class="col-sm-4">
                                            <input type="date" class="form-control" name="fim" placeholder="dd/mm/yyyy" id="dfimReu" required="required" >
                                        </div>
                                    </div>
                                    <input type="hidden" id="idProjeto" name="idProjeto" value="<?php echo $idProjeto; ?>" />     
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
            <hr>
            <p>Nenhuma reunião cadastrada.</p>
            <!--<p><a class="btn btn-primary" href="#" role="button">View details</a></p>-->
        </div><!-- /col-lg-4 -->
    </div><!-- /row -->
    <!--<div id="conteudo-ajax"></div>-->
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <!--<script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>-->

    <?php
    //include_once "footer.php";
} else {
    echo "usuario não cadastrado, faça seu cadastro";
    echo "<a href= 'index.html'> Voltar </a>";
}
?>

</div> <!-- /container -->

<!-- Bootstrap core JavaScript
    ================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="js/jquery-2.1.1.min.js"></script>
<script src="js/bootstrap.min.js"></script> 
</body>
</html>