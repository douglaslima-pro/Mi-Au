<?php

//cadastrarDenunciaControl.php
require_once "../model/DAO/denunciaDAO.php";
require_once "../model/DTO/denunciaDTO.php";

date_default_timezone_set('America/Sao_Paulo');
$data = date("Y-m-d H:i:s");

$idusuario = $_POST["idusuario"];
$estado = $_POST["estado"];
$cidade = $_POST["cidade"];
$titulo = $_POST["titulo"];
$descricao = $_POST["descricao"];

$fotoNome = "";

if(isset($_POST["upload"])){

    $foto = $_FILES["foto"];

    $extensao = explode(".",$foto["name"]);

    if($extensao[sizeof($extensao)-1] == "jpg" || $extensao[sizeof($extensao)-1] == "jpeg" || $extensao[sizeof($extensao)-1] == "JPG" || $extensao[sizeof($extensao)-1] == "png"){
        move_uploaded_file($foto["tmp_name"],"../images/denuncias/".$foto["name"]);
        $fotoNome = "../images/denuncias/".$foto["name"];
    }else{
        echo "Erro ao carregar foto!";
        die();
    }
}else{
    echo "Erro ao carregar foto!";
    die();
}
//Verifica se o usuario enviou alguma foto
if($fotoNome == null || empty($fotoNome)){
    $fotoNome = "../images/usuarios/unset.png";
}

$denuncia = new denunciaDTO($idusuario,$titulo,$descricao,$fotoNome);
$denuncia->setEstado($estado);
$denuncia->setCidade($cidade);
$denuncia->setDataCadastro($data);
//echo "foto: ".$denuncia->getFoto();

$denunciaConn = new denunciaDAO();
$retorno = $denunciaConn->cadastrarDenuncia($denuncia);

if($retorno == null || $retorno == 0){
    header("location:../view/denuncias.php?msg=Erro ao publicar Denúncia!");
}else{
    header("location:../view/denuncias.php?msg=Denúncia publicada com sucesso!");
}

?>