<?php
require "header.php";
session_start();
if(isset($_SESSION['username']))
	$username = $_SESSION['username'];
if(isset($_SESSION['password']))
	$password = $_SESSION['password'];
if(!(empty($username) OR empty($password)))
{ 
include "CrudFases.php";

	$idFase = $_REQUEST['idFase'];
	$idProjeto = $_REQUEST['idProjeto'];
	$nome = $_POST["nome"];
	$descricao = $_POST["descricao"];
	$inicio = $_POST["inicio"];
	$fim = $_POST["fim"];

	updateFase($idFase, $nome, $descricao, $inicio, $fim, $idProjeto);

}else{
	echo "usuario não cadastrado, faça seu cadastro";
	echo "<a href= '../index.html'> Voltar </a>";
	}
?>