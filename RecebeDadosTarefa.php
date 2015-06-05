<?php
include 'CrudTarefas.php';
include 'CrudFases.php';

    $nome = test_input($_POST['nome']);
    $descricao = test_input($_POST['descricao']);
    $idMissao = $_POST['idMissao'];
    $inicio = test_input($_POST['inicio']);
    $fim = test_input($_POST['fim']);
    $responsavel = test_input($_POST['responsavel']);
    $estado = test_input($_POST['estadoTarefa']);
    echo'idmissao = '.$idMissao;
    echo '<br> nome = '.$nome;
    echo '<br>responsavel = '.$responsavel;
    echo '<br> estado = '.$estado;
    echo '<br>fim = '.$fim;
    //criarTarefa($nome, $descricao, $inicio, $fim, $responsavel, $estado, $idMissao);

