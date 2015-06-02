<?php
require "header.php";
session_start();
if(isset($_SESSION['username']))
	$username = $_SESSION['username'];
if(isset($_SESSION['password']))
	$password = $_SESSION['password'];
if(!(empty($username) OR empty($password)))
{ 

    include "config.php";	
    include 'CrudMissoes.php';
    
    $idFase = $_REQUEST['idFase']."<br />";
    $idMissao = $_REQUEST['idMissao'];
    
//    echo $idFase;
//    echo $idProjeto;
    
    apagarMissao($idFase, $idMissao);
}
