<?php

session_start();
//editarPerfilControl.php
require_once "../model/DAO/usuarioDAO.php";
require_once "../model/DTO/usuarioDTO.php";

$nome = $_POST["nome"];
$sobrenome = $_POST["sobrenome"];
$email = $_POST["email"];
$telefone = $_POST["telefone"];
$estado = $_POST["estado"];
$cidade = $_POST["cidade"];

if(isset($_POST["upload"])){

    $foto = $_FILES["foto"];

    $extensao = explode(".",$foto["name"]);
    
//If extensao[ (sizeof extensao) - 1] be different of jpg, do

    if($extensao[sizeof($extensao)-1] == "jpg" || $extensao[sizeof($extensao)-1] == "jpeg" || $extensao[sizeof($extensao)-1] == "JPG" || $extensao[sizeof($extensao)-1] == "png"){
        move_uploaded_file($foto["tmp_name"],"../images/usuarios/".$foto["name"]);
        $fotoNome = "../images/usuarios/".$_FILES["foto"]["name"];
    }else{
        echo "Arquivo de foto invalido!";
    }
}else{
    header("location:../view/editarPerfil.php?msg=Erro ao enviar foto!");
}
//Verifica se o usuario colocou ou nao uma foto
if($fotoNome == null || empty($fotoNome)){
    $fotoNome = $_SESSION["img_usuario"];
}

//instancia da classe usuario
$usuario = new usuarioDTO($nome,$sobrenome,$email,"");
$usuario->setTelefone($telefone);
$usuario->setEstado($estado);
$usuario->setCidade($cidade);
$usuario->setFoto($fotoNome);
$usuario->setIdusuario($_SESSION["id"]);
//conexao com o BD
$usuarioConn = new usuarioDAO();
$retorno = $usuarioConn->editarUsuario($usuario);
//verifica se retornou algo [...]
if($retorno == null || $retorno == 0){
    header("location:../view/editarPerfil.php?msg=Retorno vazio!");
}else{
    session_start();
    $_SESSION["nome"]=$nome;
    $_SESSION["sobrenome"]=$sobrenome;
    $_SESSION["email"]=$email;
    $_SESSION["img_usuario"]=$fotoNome;
    header("location:../view/editarPerfil.php?msg=Perfil editado com sucesso!");
}
?>