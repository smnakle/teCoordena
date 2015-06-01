<?php
require "header.php";
session_start();
if(isset($_SESSION['username']))
	$username = $_SESSION['username'];
if(isset($_SESSION['password']))
	$password = $_SESSION['password'];
if(!(empty($username) OR empty($password)))
{ 

    include "CrudMissoees.php";
    include "config.php";

    $idMissao = $_REQUEST['idMissao'];

$query = "SELECT * FROM missoes WHERE id_missao = '$idMissao'";
		
// Executa consulta
$result = mysql_query($query, $link);

$numlinha = mysql_num_rows($result);

if($numlinha > 0)
{
    while ($row = mysql_fetch_assoc($result))
    {	
        
        ?> 
      <div class="row" id="editarMissao">
           
      <span class="fechar glyphicon glyphicon-remove" aria-hidden="true"></span>
   
       <label  class="control-label"> editar missao </label>
        <form class="form-horizontal" role="form" action="UpdateDadosMissao.php" method="post">
            <div class="form-group">
                <label for="inputEmail3" class="col-md-2 control-label">Nome</label>
                <div class="col-md-8">
                    <input type="text" class="form-control" name="nome" id="nome" required="required" placeholder=""  value="<?php echo $row['nome']; ?>"
                </div>
            </div>
            <div class="form-group">
                <label for="inputPassword3" class="col-md-2 control-label">Descrição</label>
                <div class="col-md-8">
                    <textarea class="form-control" rows="3" name="descricao" id="texto"><?php echo $row['descricao']; ?> </textarea>
                </div>
            </div>
            <input type="hidden" id="idMissao" name="idMissao" value="<?php echo $idMissao ?>" /> 
            <div class="form-group">
                <div class="col-md-offset-8 col-md-4"> 
                    <button type="submit" class="btn btn-success" id="salvar">Salvar</button>
                </div>
            </div>
        </form>
        </div><!--/row-->
<?php
    }
}
	
}else{
	echo "usuario não cadastrado, faça seu cadastro";
	echo "<a href= 'index.html'> Voltar </a>";
	}