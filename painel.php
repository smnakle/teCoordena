<?php 
require "header.php";
session_start();
if(isset($_SESSION['username']))
	$username = $_SESSION['username'];
if(isset($_SESSION['password']))
	$password = $_SESSION['password'];
if(!(empty($username) OR empty($password)))
{ 
	//include "config.php";
	//$idProjeto = 0;
	require "CrudProjetos.php";
?>
	<div class="col-md-10 col-md-offset-1">
		<div class="caixa">
            <h2>Crie aqui seu novo projeto</h2>
                    <button type="button" class="btn btn-success btn-lg" id="criar" data-toggle="collapse" data-target="#dados">Criar Projeto</button>
                    <div id="dados" class="collapse">
                    <!-- /////////////////////////////////////////////////////////////-->
                    <hr>
                    <div class="row">
                        <form class="form-horizontal" role="form" action="RecebeDadosProjeto.php" method="POST">
                            <div class="form-group">
                                <label for="inputEmail3" class="col-md-2 control-label">Nome</label>
                                <div class="col-md-8">
                                    <input type="text" class="form-control" name="nome" id="nome" required="required">
                                </div>
                            </div>  
                            <input type="hidden" id="idCriador" name="idCriador" value="<?php echo selecionaIdCriador($username); ?>" />
                            <div class="form-group">
                                <label for="inputPassword3" class="col-md-2 control-label">Descrição</label>
                                <div class="col-md-8">
                                    <textarea class="form-control" rows="3" name="descricao" id="texto"></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputInicio3" class="col-sm-2 control-label">Início</label>
                                <div class="col-sm-3">
                                    <input type="date" class="form-control" name="inicio" placeholder="dd/mm/yyyy" id="dini" required="required">
                                </div>
                                <label for="inputFim" class="col-sm-2 control-label">Fim</label>
                                <div class="col-sm-3">
                                    <input type="date" class="form-control" name="fim" placeholder="dd/mm/yyyy" id="dfim" required="required" >
                                </div>
                            </div>                           
                            <div class="form-group">
                                <div class="col-md-offset-8 col-md-4"> 
                                    <button type="submit" class="btn btn-success" id="salvar">Salvar Projeto</button>
                                </div>
                            </div>
                        </form>
                    </div><!--/row-->
                    <!--////////////////////////////////////////////////////////////////////-->
                    </div><!-- /dados -->
		</div> <!-- /caixa -->
                
                <!-- ////////////////////  Modal Criar Projeto             /////////////////////////////-->
                
                
                
               <hr>
		 <h3>Meus Projetos <span class="glyphicon glyphicon-arrow-down" aria-hidden="true"></span> </h3>
<!-- <span class="glyphicon glyphicon-menu-down" aria-hidden="true"></span>-->
<!--                  <span class="glyphicon glyphicon-arrow-down" aria-hidden="true"></span> -->
		<hr>
			<div class="row">
			    <div class="col-md-8">
				<?php // listaProjetos($username); ?>
                               
                                <?php
                                $idCriador = selecionaIdCriador($username);
                                listaProjetos($idCriador);
                                ?>
			    </div >
			 </div><!--/row-->	
		<hr>
                 <h3>Projetos que faço parte  <span class="glyphicon glyphicon-arrow-down" aria-hidden="true"></span></h3>
                 <!--<span class="glyphicon glyphicon-triangle-bottom" aria-hidden="true"></span>-->
	       <hr>	 
			<div class="row">
				<div class="col-md-8">
                                    <?php listaProjetosFacoParte($idCriador); ?>
                                    <?php //listaProjetosFacoParte(selecionaIdCriador($username)); ?>
			    </div >
			 </div><!--/row-->	
		</div><!--/.col-xs-12.col-sm-9-->

          </div>
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
<!--    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>-->

<!--    <script src="offcanvas.js"></script>-->
    
    <!-- js que faz a vibrar -->
    <script>
			window.navigator = window.navigator || {};
			document.getElementById('criar').addEventListener('click', function() {
					navigator.vibrate(1000);
			});
			document.getElementById('nome').addEventListener('click', function() {
				navigator.vibrate(100);
			});
		</script>
		<?php //include_once "footer.php";
			}
			else{
			echo "usuario não cadastrado, faça seu cadastro";
			echo "<a href= 'index.html'> Voltar </a>";
			}
		?>
  </body>
</html>
