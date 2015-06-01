<?php

function criarTime($idProjeto, $idUsuario){
    include "config.php";
    
    $insere = "INSERT INTO time (id_projeto, id_usuario) VALUES ('$idProjeto','$idUsuarioA')";

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

function listaUserSelect($name, $idForm) {
    include "config.php";
    $query = "SELECT * FROM usuario"; //sprintf("SELECT * FROM info")
    $result = mysql_query($query, $link);
    if ($result === false) {
        echo "Não foi possível buscar os dados" . mysql_error() . "<br />";
    } else {
        $numlinha = mysql_num_rows($result);
        if ($numlinha > 0) {
            echo '<select name="'.$name.'" form="'.$idForm.'" >';
            echo ' <option value="">Selecione</option>';
            while ($row = mysql_fetch_assoc($result)) {
                echo ' <option value="'.$row['id_usuario']. '">'. $row['username'].'</option>';
            }
            echo '</select><br />';    
        } else {
            echo "nenhum usuario cadastrado";
        }
    }
    $libera = mysql_free_result($result);
}

function updateTime($idProjeto, $idUsuario){
    include "config.php";
    $altera ="UPDATE time
              SET id_usuario='$idUsuario'
              WHERE id_projeto='$idProjeto'";
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

function listaTime($idProjeto){
include "config.php";
$username = array();
$query = "SELECT usuario.username, usuario.id_usuario, time.id_projeto
            FROM usuario
            INNER JOIN time
            WHERE time.id_projeto = '$idProjeto'
            AND (time.id_usuario = usuario.id_usuario)";

$result = mysql_query($query, $link);
$numlinha = mysql_num_rows($result);

if($numlinha > 0)
{
    while ($row = mysql_fetch_assoc($result))
    {	
                $username = $row['username'];
                $idProjeto = $row['id_projeto'];
                $idUsuario = $row['id_usuario'];
                
        echo '<div class="row">	';
         echo '<div id="dadosForm" class="col-md-12 control-label" >';
            echo '<form id="formListaTime" class="form-horizontal" role="form" action="UpdateDadosTime.php" method="post"> ';
           
                echo '<label for="Nome" class="col-md-6 control-label  pull-left">'.$username.'</label>';

                echo '<input type="hidden" id="idUsuario" name="idUsuario" value="'.$idUsuario.'" /> ';
                echo '<input type="hidden" id="idProjeto" name="idProjeto" value="'.$idProjeto.'" /> ';
                echo '<label class="col-md-3 control-label"><button type="submit" class="btn btn-primary pull-left" '
                . 'id="mudarMembro">Modificar</button></label>';
                echo '<label class="col-md-3 control-label">'
                . '<a class="btn btn-danger" href="ApagarTime.php?idProjeto='.$idProjeto.'" '
                        . 'role="button" id="botaoApagar" >Remover</a></label>';
            echo ' 
                </form>
            </div><!-- dadosForm-->   
        </div><!-- row -->';
    }
}
else{
    echo 'Este projeto ainda não tem nenhum membro';
}
$libera = mysql_free_result($result);
}

function verificaProjetoTemTime($idProjeto){
    include "config.php";
    $query = "SELECT id_projeto FROM time WHERE id_projeto = '$idProjeto'"; //sprintf("SELECT * FROM info")
    $result = mysql_query($query, $link);
    if ($result === false) {
        echo "Não foi possível buscar os dados" . mysql_error() . "<br />";
    } else {
        $numlinha = mysql_num_rows($result);
        if ($numlinha > 0) {
         ?>
            <script>
                window.alert("Este projeto já tem time. ");
            </script>
        <?php    
            //header("Location: Projeto.php?idProjeto=$idProjeto");
        } 
        //else {
//            //caso não tenha nenhum time cadastrado, cria o time
//              //criarTime($idProjeto, $idUsuario);
//        }
    }
    $libera = mysql_free_result($result);
}

function listaTimeSelect($idProjeto, $name, $idForm){
    include "config.php";
    $username = array();
    $query = "SELECT usuario.username, usuario.id_usuario, time.id_projeto
                FROM usuario
                INNER JOIN time
                WHERE time.id_projeto = '$idProjeto'";
//                AND (time.integranteUm = usuario.id_usuario 
//                     OR time.integranteDois = usuario.id_usuario 
//                     OR time.integranteTres = usuario.id_usuario 
//                     OR time.integranteQuatro = usuario.id_usuario)";

    $result = mysql_query($query, $link);
    $numlinha = mysql_num_rows($result);

    if($numlinha > 0){
    } 
}