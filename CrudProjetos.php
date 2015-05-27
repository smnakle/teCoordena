<?php

//variável global que guarda o id_projeto;
//$idProjeto , $username;

function listaProjetos($idCriador) {
    include "config.php";

    //$query = "SELECT id_projeto, nome FROM projetos WHERE criador LIKE '%$username%'";
    $query = "SELECT id_projeto, nome FROM projetos WHERE id_criador ='$idCriador'"; 
    // Executa consulta
    $result = mysql_query($query, $link);

    $numlinha = mysql_num_rows($result);

    if ($numlinha > 0) {
        while ($row = mysql_fetch_assoc($result)) {
            $nome = $row['nome'];
            $idProjeto = $row['id_projeto'];

            echo '<div class="row">	';
            echo '<form id="idProj" class="form-horizontal" role="form" action="Projeto.php" method="post"> ';

            echo '<label for="Nome" class="col-md-4 control-label"><h4>' . $nome . '</h4></label>';

            echo '<input type="hidden" id="idProjeto" name="idProjeto" value="' . $idProjeto . '" /> ';
            echo '<label class="col-md-2 control-label">
                <button type="submit" class="btn btn-primary" id="detalhes">Detalhes &raquo</button></label>';

            echo '<label class="col-md-2 control-label"><a class="btn btn-danger btn-block " href="#" role="button" id="botaoApagar" >Apagar</a></label>';
            echo '</form>
                  </div><!-- row -->';
        }
    } else {
        ?>
        <script>
            window.alert("Voce não tem nenhum projeto cadastrado. ");
        </script>
        <?php
    }
    $libera = mysql_free_result($result);
}

function listaProjetosFacoParte($idUsuario){
    include 'config.php';
   // $query = "SELECT id_projeto FROM time WHERE criador LIKE '%$username%'";
    
$query = "SELECT ";

$query = "SELECT projetos.id_projeto, projetos.nome
            FROM time
            JOIN projetos 
            ON projetos.id_projeto = time.id_projeto
            WHERE time.id_usuario = '$idUsuario' AND projetos.id_criador <> '$idUsuario'";
    // Executa consulta
    $result = mysql_query($query, $link);
    $numlinha = mysql_num_rows($result);

    if ($numlinha > 0) {
        while ($row = mysql_fetch_assoc($result)) {
            $nome = $row['nome'];
            $idProjeto = $row['id_projeto'];

            echo '<div class="row">	';
            echo '<form id="idProj" class="form-horizontal" role="form" action="Projeto.php" method="post"> ';

            echo '<label for="Nome" class="col-md-4 control-label"><h4>' . $nome . '</h4></label>';

            echo '<input type="hidden" id="idProjeto" name="idProjeto" value="' . $idProjeto . '" /> ';
            echo '<label class="col-md-2 control-label">
                <button type="submit" class="btn btn-primary" id="detalhes">Detalhes &raquo</button></label>';

            echo '<label class="col-md-2 control-label"><a class="btn btn-danger btn-block " href="#" role="button" id="botaoApagar" >Apagar</a></label>';
            echo '</form>
                  </div><!-- row -->';
        }
    } else {
        ?>
        <script>
            window.alert("Voce não faz parte de nenhum outro projeto cadastrado. ");
        </script>
        <?php
    }
    $libera = mysql_free_result($result);
}

function criarProjeto($nome, $descricao, $inicio, $fim, $idCriador) {
    include "config.php";

    $insere = "INSERT INTO projetos (nome, descricao, inicio, fim, id_criador) VALUES ('$nome','$descricao','$inicio','$fim','$idCriador')";
    // Executa consulta
    $result = mysql_query($insere, $link);
    // Mensagem caso a consulta falhe.

    if ($result === false) {
        echo "Não foi possível inserir os dados" . mysql_error() . "<br />";
    } else {
        echo "dados inserido com sucesso!";
        header("Location: painel.php");
    }
    $libera = mysql_free_result($result);
}

function listaDetalheProjeto($idProjeto) {
    include "config.php";

    $query = "SELECT id_projeto, nome, descricao , DATE_FORMAT(inicio,'%d/%m/%Y') AS inicio, DATE_FORMAT(fim,'%d/%m/%Y') AS fim FROM projetos WHERE id_projeto = '$idProjeto'";
    
   // Executa consulta
    $result = mysql_query($query, $link);
    $numlinha = mysql_num_rows($result);
    
    if ($numlinha >= 1) {
        while ($row = mysql_fetch_assoc($result)) {  
            echo '<div class="row">
                    <div class="col-md-12">
                    <h4>';
            echo 'Nome: ' . $row['nome'] . '</h4>';
            echo '<!--<a class="btn btn-primary pull-right" href="#" role="button">Editar</a>-->
                    </div><!--/.col-md-12--></div><!--/row--><div class="row">
                    <div class="col-md-12">';
            echo 'Descrição: ' . $row['descricao'];
            echo '</div><!--/.col-md-12--></div><!--/row--><div class="row">
                  <div class="col-md-12">';
           
            echo 'Inicio: ' . $row['inicio'];
            echo '</div><!--/.col-md-12--></div><!--/row--><div class="row">
		  <div class="col-md-12"> ';
            
            echo 'Fim: ' . $row['fim'];
            echo '</div><!--/.col-md-12-->
		 </div><!--/row-->';
        }
    } else {
        ?>
        <script>
            window.alert("Voce não tem nenhum projeto cadastrado. ");
        </script>
        <?php

        //echo "Voce não tem nenhum projeto cadastrado. ";
    }
    //}
    $libera = mysql_free_result($result);
}

/*function editarProjeto($idProjeto) {
    include "config.php";
    //listaDetalheProjeto($idProjeto);include "config.php";

    $query = "SELECT * FROM projetos WHERE id_projeto = '$idProjeto'";

    // Executa consulta
    $result = mysql_query($query, $link);

    $numlinha = mysql_num_rows($result);

    if ($numlinha > 0) {
        while ($row = mysql_fetch_assoc($result)) {
            echo '
                <div class="row">
                <form class="form-horizontal" role="form" action="controller/RecebeDadosProjeto.php" method="post">
                <div class="form-group">
                        <label for="inputEmail3" class="col-md-2 control-label">Nome</label>
                        <div class="col-md-8">
                                <input type="text" class="form-control" name="nome" id="nome" required="required">
                                ' . $row['nome'] . '
                        </div>
                </div>';
            echo '<!--<a class="btn btn-primary pull-right" href="#" role="button">Editar</a>-->
                    </div><!--/.col-md-12--></div><!--/row--><div class="row">
                    <div class="col-md-12">';
            echo 'Descrição: ' . $row['descricao'];
            echo '
                </div><!--/.col-md-12--></div><!--/row--><div class="row">
                <div class="col-md-12">
                        ';
            $date = new DateTime($row['inicio']);
            echo 'Inicio: ' . $date->format('d/m/Y');
            echo '
                </div><!--/.col-md-12--></div><!--/row--><div class="row">
                <div class="col-md-12">
                        ';
            $date = new DateTime($row['fim']);
            echo 'Fim: ' . $date->format('d/m/Y');
            echo '
                </div><!--/.col-md-12-->
                </div><!--/row-->';
        }
    }
}*/

function updateProjeto($idProjeto, $nome, $descricao, $inicio, $fim) {
    include "config.php";
    $altera = "UPDATE projetos
                SET nome='$nome', descricao='$descricao', inicio='$inicio', fim='$fim'
                WHERE id_projeto='$idProjeto'";

    // Executa consulta
    $result = mysql_query($altera, $link);
    // Mensagem caso a consulta falhe.
    if ($result === false) {
        echo "Não foi possível alterar os dados" . mysql_error() . "<br />";
    } else {
        echo "dados alterados com sucesso!";
        header("Location: Projeto.php?idProjeto=$idProjeto");
    }
    $libera = mysql_free_result($result);
}

function modalEditarProjeto($idProjeto){
    include "config.php";

    $query = "SELECT id_projeto, nome, descricao , DATE_FORMAT(inicio,'%d/%m/%Y') AS inicio, DATE_FORMAT(fim,'%d/%m/%Y') AS fim FROM projetos WHERE id_projeto = '$idProjeto'";
   // Executa consulta
    $result = mysql_query($query, $link);
    $numlinha = mysql_num_rows($result);
    
    if ($numlinha > 0) {
        $row = mysql_fetch_assoc($result);  
          ?>  
            <!-- Modal editar dados projeto -->
            <div class="modal fade" id="myModalEditarProjeto" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="myModalLabel">Editar Projeto</h4>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <form class="form-horizontal" role="form" action="UpdateDadosProjeto.php" method="POST">
                                    <div class="form-group">
                                        <label for="inputNome" class="col-md-2 control-label">Nome</label>
                                        <div class="col-md-8">
                                            <input type="text" class="form-control" name="nome" id="nome" value="<?php echo $row['nome']; ?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputDescricao" class="col-md-2 control-label">Descrição</label>
                                        <div class="col-md-8">
                                            <textarea class="form-control" rows="3" name="descricao" id="texto"><?php echo $row['descricao']; ?></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputInicio3" class="col-sm-2 control-label">Início</label>
                                        <div class="col-sm-4">
                                            <input type="date" class="form-control" name="inicio" placeholder="" id="diniProj" required="required" value="<?php echo $row['inicio']; ?>">
                                        </div>
                                        <label for="inputFim" class="col-sm-1 control-label">Fim</label>
                                        <div class="col-sm-4">
                                            <input type="date" class="form-control" name="fim" value ="<?php echo $row['fim']; ?>" id="dfimProj" required="required" >
                                        </div>
                                    </div>
                                    <input type="hidden" id="idProjeto" name="idProjeto" value="<?php echo $row['id_projeto']; ?>" />     
                            </div> <!-- row-->
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                            <button type="submit" class="btn btn-success" id="salvarProjeto">Salvar</button>
                        </div>
                        </form>
                    </div><!-- modal content -->
                </div><!-- modal dialog -->
            </div><!-- fade -->
            
          <?php         
  
     } else {
        ?>
        <script>
            window.alert("Voce não tem nenhum projeto cadastrado. ");
        </script>
        <?php
    }
    $libera = mysql_free_result($result);
}

function selecionaIdCriador($username){
    include 'config.php';
    $query = "SELECT id_usuario FROM usuario WHERE username = '$username'";
    
    $result = mysql_query($query, $link);
    $numlinha = mysql_num_rows($result);
    if ($numlinha > 0) {
        $row = mysql_fetch_assoc($result);
        $idCriador = $row['id_usuario'];
        //echo $idCriador;
        return $idCriador;
    }
    else{
        echo "Usuario não encontrado";
    }
    $libera = mysql_free_result($result);
}
//converter no códifo phph
//$data_formatada = date(‘d/m/Y H:i:s’, $row[‘mysql_data’]);
//Esse exemplo retorna a data no formato: DD/MM/AAAA HH:MM:SS.