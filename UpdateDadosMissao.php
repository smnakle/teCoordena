<?php
require "header.php";
session_start();
if(isset($_SESSION['username']))
	$username = $_SESSION['username'];
if(isset($_SESSION['password']))
	$password = $_SESSION['password'];
if(!(empty($username) OR empty($password)))
{ 
include "CrudMissoes.php";

	$idMissao = $_REQUEST['idMissao'];
	$idFase = $_REQUEST['idFase'];
	$nome = $_POST['nome'];
	$descricao = $_POST['descricao'];
      
       // echo $idFase;
	updateMissao($idMissao, $nome, $descricao, $idFase);

}else{
	echo "usuario não cadastrado, faça seu cadastro";
	echo "<a href= '../index.html'> Voltar </a>";
	}
