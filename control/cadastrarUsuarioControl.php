<?php

//cadastroControl.php
require_once "../model/DAO/usuarioDAO.php";
require_once "../model/DTO/usuarioDTO.php";

$nome = $_POST["nome"];
$sobrenome = $_POST["sobrenome"];
$email = $_POST["email"];
$telefone = $_POST["telefone"];
$estado = $_POST["estado"];
$cidade = $_POST["cidade"];
$senha = $_POST["senha"];
//Instância da classe usuario
$usuario = new usuarioDTO($nome,$sobrenome,$email,$senha);
$usuario->setTelefone($telefone);
$usuario->setEstado($estado);
$usuario->setCidade($cidade);
//Conexão com o banco de dados
$usuarioConn = new usuarioDAO();
$retorno = $usuarioConn->cadastrarUsuario($usuario);

if($retorno == null || $retorno == 0){
    header("location:../view/home.php?msg=Erro ao Cadastrar!");
}else{
    header("location:../view/home.php?msg=Usuario Cadastro com sucesso!");
}

?>