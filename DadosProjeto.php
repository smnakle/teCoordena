<?phprequire "header.php";
session_start();
if(isset($_SESSION['username']))
	$username = $_SESSION['username'];
if(isset($_SESSION['password']))
	$password = $_SESSION['password'];
if(!(empty($username) OR empty($password)))
{ 
	//include "config.php";
	include "CrudProjetos.php";
	
	$nome = $_POST["nome"];
	$descricao = $_POST["descricao"];
	$inicio = $_POST["inicio"];
	$fim = $_POST["fim"];
	// o criador do projeto é automático, é usuario
	$criador = $_POST["$username"];
	
	criarProjetos($nome, $descricao, $inicio, $fim, $criador);
	
	
	
}else{
	echo "usuario não cadastrado, faça seu cadastro";
	echo "<a href= '../index.html'> Voltar </a>";
	}
?>