<?php
include "CrudTarefas.php";

	$nome = test_input($_POST["nome"]);
	$descricao = test_input($_POST["descricao"]);
        $idMissao = $_POST['idMissao'];
	$inicio = test_input($_POST["inicio"]);
	$fim = test_input($_POST["fim"]);
        $responsavel = test_input($_POST["responsavel"]);
	echo $idMissao;
        echo $nome;
        echo $fim;
	criarTarefa($nome, $descricao, $inicio, $fim, $idMissao,$responsavel);

