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
    include 'CrudFases.php';
    
    $idFase = $_REQUEST['idFase']."<br />";
    $idProjeto = $_REQUEST['idProjeto'];
    
//    echo $idFase;
//    echo $idProjeto;
    
    apagarFase($idFase, $idProjeto);
}