<?php
require "header.php";
session_start();
if(isset($_SESSION['username']))
	$username = $_SESSION['username'];
if(isset($_SESSION['password']))
	$password = $_SESSION['password'];
if(!(empty($username) OR empty($password)))
{ 
include "CrudProjetos.php";

	$idProjeto = $_POST['idProjeto'];
	$nome = $_POST["nome"];
	$descricao = $_POST["descricao"];
	$inicio = $_POST["inicio"];
	$fim = $_POST["fim"];

	updateProjeto($idProjeto,$nome, $descricao, $inicio, $fim, $username);

}else{
	echo "usuario não cadastrado, faça seu cadastro";
	echo "<a href= '../index.html'> Voltar </a>";
	}
?>