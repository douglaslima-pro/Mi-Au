<?php

//loginControl.php
require_once "../model/DAO/usuarioDAO.php";
require_once "../model/DTO/usuarioDTO.php";

$email = $_POST["email"];
$senha = $_POST["senha"];

//Instância da classe usuario
$usuario = new usuarioDTO("","",$email,$senha);
//Conexão com o banco de dados
$usuarioConn = new usuarioDAO();
$retorno = $usuarioConn->logar($usuario);
if($retorno == null || empty($retorno)){
    header("location:../view/home.php?msg=Login ou senha invalidos!");
}else{
    if($retorno["situacaoUsuario"] == 1){
    session_start();
    $_SESSION["id"] = $retorno["idusuario"];
    $_SESSION["nome"]=$retorno["nome"];
    $_SESSION["sobrenome"]=$retorno["sobrenome"];
    $_SESSION["email"]=$retorno["email"];
    $_SESSION["estado"]=$retorno["estado"];
    $_SESSION["cidade"]=$retorno["cidade"];
    $_SESSION["img_usuario"]=$retorno["img_usuario"];
    $_SESSION["perfil"]=$retorno["perfil"];
    header("location:../view/adotar.php?msg=Login efetuado com sucesso!");
    }else{
        header("location:../view/home.php?msg=Login inativo ou sem permissão para acesso!");
    }
}

?>