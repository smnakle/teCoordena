<?php
//require "header.php";
session_start();
if(isset($_SESSION['username']))
	$username = $_SESSION['username'];
if(isset($_SESSION['password']))
	$password = $_SESSION['password'];
if(!(empty($username) OR empty($password)))
{ 
	include "CrudFases.php";

	$idProjeto = $_REQUEST['idProjeto'];
	
	$nome = test_input($_REQUEST["nome"]);
	$descricao = test_input($_REQUEST["descricao"]);
	$inicio = test_input($_REQUEST["inicio"]);
	$fim = test_input($_REQUEST["fim"]);
	
	criarFase($nome, $descricao, $inicio, $fim, $idProjeto);
	
}else{
	echo "usuario não cadastrado, faça seu cadastro";
	echo "<a href= 'index.html'> Voltar </a>";
	}
