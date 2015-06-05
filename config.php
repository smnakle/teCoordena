<?php
$link = mysql_connect('localhost', 'root', 'root');
//$link = mysql_connect('localhost', 'livros', 'livros');
if (!$link)
{
    die('Não foi possível conectar: ' . mysql_error());
}

 $db_selected = mysql_select_db('te_coordena', $link);
if (!$db_selected)
 {
	die ('banco não conectado : ' . mysql_error()); 
 }
