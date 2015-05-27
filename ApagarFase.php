<?php
require "header.php";
session_start();
if(isset($_SESSION['username']))
	$username = $_SESSION['username'];
if(isset($_SESSION['password']))
	$password = $_SESSION['password'];
if(!(empty($username) OR empty($password)))
{ 

    include "config.php";	
    include 'CrudFases.php';
    
    $idFase = $_REQUEST['idFase'];
    $idProjeto = $_REQUEST['idProjeto'];
    
    echo $idFase;
    echo $idProjeto;
    //apagarFase($idFase, $idProjeto);
//    $query = "DELETE FROM fases WHERE id_fase='$idFase'";
//    // Executa consulta
//    $result = mysql_query($query, $link);
//    if ($result === false) {
//        echo "Não foi possível apagar os dados" . mysql_error() . "<br />";
//    } else {
//        echo "dados apagados com sucesso!";
//        header("Location: Projeto.php?idProjeto=$idProjeto");
//    }
//    $libera = mysql_free_result($result);
//    $numlinha = mysql_num_rows($result);
//
//    if($numlinha > 0)
//    {
//
//    }

 }else{
            echo "usuario não cadastrado, faça seu cadastro";
            echo "<a href= 'index.html'> Voltar </a>";
      }
?>