<?php

session_start();
//publicarOngControl.php
require_once "../model/DAO/doacaoDAO.php";
require_once "../model/DTO/doacaoDTO.php";

date_default_timezone_set('America/Sao_Paulo');
$data = date("Y-m-d H:i:s");

$idong = $_POST["idong"];
$subtitulo = $_POST["subtitulo"];
$idusuario = $_SESSION["id"];
$descFundador = $_POST["fundador-descricao"];

$fotoFundador = "";

if(isset($_POST["submit"])){

    $foto = $_FILES["foto"];

    $extensao = explode(".",$foto["name"]);

    if($extensao[sizeof($extensao)-1] == "jpg" || $extensao[sizeof($extensao)-1] == "jpeg" || $extensao[sizeof($extensao)-1] == "JPG" || $extensao[sizeof($extensao)-1] == "png"){

        move_uploaded_file($foto["tmp_name"],"../images/ongs/".$foto["name"]);
        $fotoFundador = "../images/ongs/".$foto["name"];

    }else{
        header("location:../view/publicarOng.php?idong=$idong&msg=Erro ao subir foto!");
    }

}else{
    header("location:../view/publicarOng.php?idong=$idong&msg=Erro ao publicar ONG!");
}
//Verifica se o usuario colocou alguma foto
if(!isset($fotoFundador) || $fotoFundador == null){
    $fotoFundador = "../images/usuarios/unset.png";
}

$doacao = new doacaoDTO($idong,$idusuario,$data);
$doacao->setSubtitulo($subtitulo);
$doacao->setFotoFundador($fotoFundador);
$doacao->setDescFundador($descFundador);
echo $fotoFundador;

$doacaoConn = new doacaoDAO();
$retorno = $doacaoConn->publicarOng($doacao);

if($retorno == null || $retorno == 0){
    header("location:../view/publicarOng.php?idong=$idong&msg=Erro ao publicar ONG!");
}else{
    header("location:../view/publicarOng.php?idong=$idong&msg=ONG publicada com sucesso!");
}


?>