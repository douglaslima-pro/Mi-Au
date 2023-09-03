<?php

//cadastrarAnimalControl.php
session_start();
require_once "../model/DAO/animalDAO.php";
require_once "../model/DTO/animalDTO.php";

date_default_timezone_set('America/Sao_Paulo');
$data = date('Y-m-d');

$idusuario = $_SESSION["id"];
$especie=$_POST["especie"];
$nome=$_POST["nome"];
$descricao=$_POST["descricao"];
$sexo=$_POST["sexo"];
$porte=$_POST["porte"];
$temperamento=$_POST["temperamento"];

if(isset($_POST["upload"])){

    $foto = $_FILES["foto"];

    $extensao = explode(".",$foto["name"]);
    
//If extensao[ (sizeof extensao) - 1] be different of jpg, do
    if($extensao[sizeof($extensao)-1] == "jpg" || $extensao[sizeof($extensao)-1] == "jpeg" || $extensao[sizeof($extensao)-1] == "png" || $extensao[sizeof($extensao)-1] == "JPG"){
        move_uploaded_file($foto["tmp_name"],"../images/animais/".$foto["name"]);
        $fotoNome = "../images/animais/".$foto["name"];
    }else{
        echo "Arquivo de foto invalido!";
    }
}else{
    header("location:../view/divulgar.php?msg=Erro ao enviar foto!");
}
//Verifica se o usuario colocou ou nao uma foto
if($fotoNome == null || empty($fotoNome)){
    $fotoNome = "../images/animais/unset.png";
}

$animal = new animalDTO($especie,$nome,$descricao);
$animal->setSexo($sexo);
$animal->setPorte($porte);
$animal->setTemperamento($temperamento);
$animal->setFoto($fotoNome);
$animal->setDataCadastro($data);

$animalConn = new animalDAO();
$retorno = $animalConn->cadastrarAnimal($idusuario,$animal);

if($retorno == null || $retorno == 0){
    header("location:../view/divulgar.php?msg=Erro ao cadastrar animal!");
}else{
    header("location:../view/divulgar.php?msg=Animal cadastrado com sucesso!");
}

?>