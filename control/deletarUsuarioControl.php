<?php

session_start();
//deletarUsuarioControl.php
require_once "../model/DAO/usuarioDAO.php";

if($_SESSION["perfil"] != "A"){
    header("location:../view/adotar.php?msg=Sem permissão para acesso!");
}

if(!isset($_GET["idusuario"]) && !isset($_GET["nome"])){
    header("location:../view/ferramentas-adm.php?msg=Usuário não selecionado!");
}

$idusuario = $_GET["idusuario"];
$nome = $_GET["nome"];

if(!isset($_GET["deletarUsuario"])){

    echo 
   "<body style='background-color:black'>
   <div style='background-color:white;padding:30px;position:absolute;top:50%;left:50%;transform:translate(-50%,-50%)'>
        <h3>Deseja realmente <span style='color:darkred;text-transform:uppercase'>DELETAR</span> o usuário <span style='color:darkred;text-transform:uppercase'>$nome?</span></h3>
        <p><b>idusuario:</b> $idusuario</p><br>
        <a href='?idusuario=$idusuario&nome=$nome&deletarUsuario=sim' style='background-color:darkred;border:1px solid black;outline:none;color:white;cursor:pointer;text-decoration:none;padding:10px;margin:20px'>Sim</a>
        <a href='../view/ferramentas-adm.php' style='text-decoration:none'>Não</a>
    </div>";

}else{

    $usuarioConn = new usuarioDAO();
    
    //DELETA ANIMAIS
    $retorno = $usuarioConn->deletarObjetoFilho("animal",$idusuario);
    if($retorno == null || $retorno == 0){
        header("location:../view/ferramentas-adm.php?msg=Erro ao deletar usuário / animais!");
    }
    //DELETA COMENTARIOS
    $retorno = $usuarioConn->deletarObjetoFilho("comentarios",$idusuario);
    if($retorno == null || $retorno == 0){
        header("location:../view/ferramentas-adm.php?msg=Erro ao deletar usuário / comentarios!");
    }
    //DELETA AJUDAS
    $retorno = $usuarioConn->deletarObjetoFilho("ajuda",$idusuario);
    if($retorno == null || $retorno == 0){
        header("location:../view/ferramentas-adm.php?msg=Erro ao deletar usuário / ajudas!");
    }
    //DELETA ONGS
    $retorno = $usuarioConn->deletarObjetoFilho("ong",$idusuario);
    if($retorno == null || $retorno == 0){
        header("location:../view/ferramentas-adm.php?msg=Erro ao deletar usuário / ongs!");
    }
    //DELETA DOACOES
    $retorno = $usuarioConn->deletarObjetoFilho("doacao",$idusuario);
    if($retorno == null || $retorno == 0){
        header("location:../view/ferramentas-adm.php?msg=Erro ao deletar usuário / doacoes!");
    }
    //DELETA LOGIN
    $retorno = $usuarioConn->deletarUsuario($idusuario);
    if($retorno == null || $retorno == 0){
        header("location:../view/ferramentas-adm.php?msg=Erro ao deletar usuário / login!");
    }else{
        header("location:../view/ferramentas-adm.php?msg=Usuário deletado com sucesso!");
    }

}

?>