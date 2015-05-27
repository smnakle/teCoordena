<?php
	//inclui a conexão com o banco
//	include_once "header.php";

	include_once "config.php";

	//recebe os dados
	$nome = $_POST["nome"];
	$username = $_POST["username"];
	$password = $_POST["password"];
	$sexo = $_POST["sexo"];
	$papel = $_POST["papel"];
	
	if(strstr($password, ' ')!= false)
	{
		echo "A senha não pode conter espaços em branco <br />";
		echo "<a href= 'index.html'> Voltar </a>";
		
	}
	else
	{
		// Faz a inserção dos dados////////////////////////////////////////////////////////////////////

		//verifica se o username já esta cadastrado
		$query = "SELECT username FROM usuario WHERE username='$username'";
		$resultado = mysql_query($query, $link);
		$linha = mysql_num_rows($resultado);
	
		// Mensagem caso nao encontre registro.
		if ($linha != 0)
		{
			echo "<h3>Usuario já existe, volte e escolha outro username  </h3><br />";// . mysql_error()."
			//header("Location: ./index.html");
			//echo "<a href= 'index.html'> Voltar </a>";
		}
		else 
		{
			$insere = "INSERT INTO users (username, password, nome, sexo, papel) VALUES ('$username','$password','$nome','$sexo','$papel')";
		
			// Executa consulta
			$result = mysql_query($insere, $link);
			// Mensagem caso a consulta falhe.

			if ($result === false)
			{
				echo "Não foi possível inserir os dados" . mysql_error()."<br />";
			}
			else
			{
				session_start();
				$_SESSION['username'] = $username;
				$_SESSION['password'] = $password;
				
				echo mysql_affected_rows($link). " <br />Seus dados foram inseridos com sucesso <br />";
				echo "você inseriu: <br />";

				echo "Nome: ".$nome ."<br />";
				echo "Senha: ".$password ."<br />";
				echo "Username :".$username. "<br />";
				header("Location: painel.php");
			}
			$libera = mysql_free_result($result);
			$libera = mysql_free_result($insere);
		}
	
		echo "<a href= 'index.html'> Voltar </a>";
	
		$libera = mysql_free_result($resultado);
	}
	include_once 'footer.php';
?>