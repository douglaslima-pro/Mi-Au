<?php

//alterarSenhaControl.php
require_once "../model/DAO/usuarioDAO.php";
require_once "../model/DTO/usuarioDTO.php";

if(isset($_POST["chave"])){
$email = $_POST["email"];
$senha = $_POST["senha"];
$chave = $_POST["chave"];
$chave = preg_replace("/[^[:alnum:]]/",'',$chave);

$usuarioConn = new usuarioDAO();
$id = $usuarioConn->checarChave($email,$chave);

if($id){
    $retorno = $usuarioConn->pesquisarUsuario($id);
    foreach($retorno as $senhaAtual){
        if($senha != $senhaAtual["senha"]){
            $usuario = new usuarioDTO("","","",$senha);
            $usuario->setIdusuario($id);
            $usuarioConn->alterarSenha($usuario);
            header("location:../view/alterarsenha.php?chave=$chave&senha=Senha alterada com sucesso!");
        }else{
            header("location:../view/alterarsenha.php?chave=$chave&senha=A senha precisa ser diferente da atual!");
        }
    }
}else{
    header("location:../view/alterarsenha.php?chave=$chave&senha=Erro ao alterar senha!");
}

//editarPerfil.php
}else{
session_start();
$id = $_SESSION["id"];
$senha = $_POST["senha"];

$usuario = new usuarioDTO("","","",$senha);
$usuario->setIdusuario($id);
$usuarioConn = new usuarioDAO();
$retorno = $usuarioConn->alterarSenha($usuario);
if($retorno == null || $retorno == 0){
    header("location:../view/editarPerfil.php?senha=Erro ao alterar a senha!");
}else{
    header("location:../view/editarPerfil.php?senha=Senha alterada com sucesso!");
}
}
?>