<?php
	//inclui o cabeçalho
	include_once "header.php";

	//inclui a conexão com o banco
	include "config.php";

	//recebe os dados
	$username = $_REQUEST["username"];
	$password = $_REQUEST["password"];


	// Faz a selecao dos dados////////////////////////////////////////////////////////////////////

	$query = "SELECT * FROM usuario WHERE username='$username'";
	//	$query = "SELECT username, password FROM user WHERE username='$username'";

	// Executa consulta
	$resultado = mysql_query($query, $link);
	$linha = mysql_num_rows($resultado);

	//$verificaSenha = mysql_result($resultado,0,"password")
	
	// Mensagem caso nao encontre registro.
	if ($linha == 0)
	{
		echo "<h2>Usuario nao encontrado  </h2><br />";// . mysql_error()."
	}
	else if($password != mysql_result($resultado,0,"password"))
	{
		echo " <br /><h2>Senha incorreta</h2> <br />";
	}
	else // usuario senha corretos
	{
		//envia para página de perfil
		session_start();
		$_SESSION['username'] = $username;
		$_SESSION['password'] = $password;
		header("Location: painel.php");
	}
	
	
echo "<a href= 'index.html'> Voltar </a>";
$libera = mysql_free_result($resultado);
include_once 'footer.php';
?>