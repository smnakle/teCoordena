<?php
//require "header.php";
session_start();
if(isset($_SESSION['username']))
	$username = $_SESSION['username'];
if(isset($_SESSION['password']))
	$password = $_SESSION['password'];
if(!(empty($username) OR empty($password)))
{ 
	include "CrudProjetos.php";
	
	$nome = $_POST["nome"];
	$descricao = $_POST["descricao"];
	$inicio = $_POST["inicio"];
	$fim = $_POST["fim"];
        $idCriador = $_POST["idCriador"];
	// o criador do projeto é automático, é o usuario ou seja $username
	//$criador = $username;
        
//       $idCriador = selecionaIdCriador($username);
//	echo $nome ."<br />";
//        echo $inicio."<br />";
//        echo $fim."<br />"; 
//        echo $username."<br />";
//        echo "id criador = ".$idCriador;
	criarProjeto($nome, $descricao, $inicio, $fim, $idCriador);
	
	
	
}else{
	echo "usuario não cadastrado, faça seu cadastro";
	echo "<a href= 'index.html'> Voltar </a>";
	}
