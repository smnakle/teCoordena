<?php
require "header.php";
session_start();
if(isset($_SESSION['username']))
	$username = $_SESSION['username'];
if(isset($_SESSION['password']))
	$password = $_SESSION['password'];
if(!(empty($username) OR empty($password)))
{ 
    include "CrudFases.php";
    include 'CrudTime.php';
    include 'config.php';

    $idUsuarioA = filter_input(INPUT_POST, 'idUsuarioA');
    $idUsuarioB = filter_input(INPUT_POST, 'idUsuarioB');
    $idUsuarioC = filter_input(INPUT_POST, 'idUsuarioC');
    $idUsuarioD = filter_input(INPUT_POST, 'idUsuarioD');
    $idProjeto = filter_input(INPUT_POST, 'idProjeto');
    
    echo '$idUsuarioA = '.$idUsuarioA;
    echo '<br>$idUsuarioB = '.$idUsuarioB;
    echo '<br>$idProjeto = '.$idProjeto;
    
     $query = "SELECT COUNT(id_projeto) AS numMembrosTime FROM time
                WHERE id_projeto='$idProjeto'";
     
     $result = mysql_query($query, $link);
     
     //$numlinha = mysql_num_rows($result);
     $numlinha = mysql_result($result, 0);
    // echo  $numlinha;
     echo "<br>" .$numlinha;
//     $numlinha = mysql_num_rows($result);
//        if ($numlinha > 0) {
//            echo '';
//        }
     
     //$idProjeto = $_POST['idProjeto'];
   //$projTemTime = verificaProjetoTemTime($idProjeto);
   
   // verificar se o projeto tem 4 membros ou menos -> como: fazer um count no BD
   
   ////if($projTemTime == NULL){
//        if($idUsuarioA == 0 && $idUsuarioB == 0 && $idUsuarioC == 0 && $idUsuarioD == 0){
//            echo "Voce deve escolher pelo menos dois membros para o time";
//        }
//        else if($idUsuarioA != 0 && $idUsuarioB == 0 && $idUsuarioC == 0 && $idUsuarioD == 0){
//            echo "Voce deve escolher pelo menos dois membros para o time";
//        }
//        else if($idUsuarioA == 0 && $idUsuarioB != 0 && $idUsuarioC == 0 && $idUsuarioD == 0){
//            echo "Voce deve escolher pelo menos dois membros para o time";
//        }
//        else if($idUsuarioA == 0 && $idUsuarioB == 0 && $idUsuarioC != 0 && $idUsuarioD == 0){
//            echo "Voce deve escolher pelo menos dois membros para o time";
//        }
//        else if($idUsuarioA == 0 && $idUsuarioB == 0 && $idUsuarioC == 0 && $idUsuarioD != 0){
//            echo "Voce deve escolher pelo menos dois membros para o time";
//        }
//        else if($idUsuarioA==$idUsuarioB || $idUsuarioA==$idUsuarioC || $idUsuarioA==$idUsuarioD){
//            echo "Você escolheu a mesma pessoa duas vezes! <br /> Por favor troque."
//            . " <br /><a href= 'criarTime.php'> Voltar </a>";
//        }
//        else if($idUsuarioB==$idUsuarioC || $idUsuarioB==$idUsuarioD){
//            echo "Você escolheu a mesma pessoa duas vezes! <br /> Por favor troque."
//             . " <br /><a href= 'Projeto.php=?idProjeto='> Voltar </a>";
//        }
//        else if ($idUsuarioC==$idUsuarioD) {
//             echo "Você escolheu a mesma pessoa duas vezes! <br /> Por favor troque."
//             .header("Location: Projeto.php?idProjeto=$idProjeto");
//        }
//        else{
//            //verificaProjetoTemTime($idProjeto);
//            //echo "vai inserir no bd se estiver certo";
//            $idUsuarioA = criarTime($idProjeto, $idUsuarioA);
//            $idUsuarioB = criarTime($idProjeto, $idUsuarioB);
//            $idUsuarioC = criarTime($idProjeto, $idUsuarioC);
//            $idUsuarioD = criarTime($idProjeto, $idUsuarioD);
//        }
    //}*/
}else{
	echo "usuario não cadastrado, faça seu cadastro";
	echo "<a href= 'index.html'> Voltar </a>";
	}
