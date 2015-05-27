<?php
	include "CrudMissoes.php";

	$nome = test_input($_REQUEST["nome"]);
	$descricao = test_input($_REQUEST["descricao"]);
        $idFase = $_REQUEST['idFase'];
//	$inicio = test_input($_POST["inicio"]);
//	$fim = test_input($_POST["fim"]);
	echo $idFase;
	criarMissao($nome, $descricao, $idFase);
	
?>

