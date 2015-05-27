<?php
/* 
 * Conexão com o banco
 *
 */
/*
$servername = "localhost";
$username = "bolsa";
$password = "bolsa";

// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
echo "Connected successfully";*/
//mysql_pconnect($server, $username, $password)

//$dr_connect = mysql_pconnect(localhost, agenda, agenda);

//$db_url = 'mysql://username:password@localhost/databasename';

//$db_url = 'pgsql://username:password@localhost/databasename';

//$connection = 'pgsql://agenda:agenda@localhost/agenda';

//$conec = 'pg_connect($connection, $connect_type)';


/* nós conectamos com localhost
 * $link = 'my sql_connect('localhost', 'mysql_user', 'mysql_password')'*/
/*
$servername = "localhost";
$username = "bolsa";
$password = "bolsa"; 
$mysqlDb ="bolsa";


// Create connection
$link = mysqli_connect($servername, $username, $password, $mysqlDb);

// Check connection
if (!$link) {
    die("Connection failed: " . mysqli_connect_error());
}
$db_selected = mysqli_select_db('bolsa', $link);
if (!$db_selected)
 {
	die ('banco não conectado : ' . mysql_error()); 
 }
///////////////////*/
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
