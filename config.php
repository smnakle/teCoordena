<?php
/* 
 * Conexão com o banco
 *
 */
/*

/* 
 * $link = 'my sql_connect('localhost', 'mysql_user', 'mysql_password')'*/
/*
$servername = "servername";
$username = "user_BD";
$password = "senha_BD";
$mysqlDb ="nome_BD";


// Create connection ////*/
$link = mysql_connect('servername', 'user_BD', 'senha_BD');

if (!$link)
{
    die('Não foi possível conectar: ' . mysql_error());
}

 $db_selected = mysql_select_db('nome_BD', $link);
if (!$db_selected)
 {
	die ('banco não conectado : ' . mysql_error()); 
 }
