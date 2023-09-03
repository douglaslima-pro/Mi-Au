<?php

session_start();
//cadastrarAjudaControl.php
require_once "../model/DAO/ajudaDAO.php";
require_once "../model/DTO/ajudaDTO.php";

date_default_timezone_set('America/Sao_Paulo');
$data = date('Y-m-d H:i:s');

$iddoacao = $_POST["iddoacao"];
$idusuario = $_SESSION["id"];
$formAjuda = $_POST["formAjuda"];
$ajuda = $_POST["ajuda"];

$fotoNome = '';

if(isset($_POST['submit'])){

    $foto = $_FILES['comprovante'];//foto do comprovante sendo enviada

    $extensao = explode('.',$foto['name']);

    if($extensao[sizeof($extensao)-1] == 'jpg' || $extensao[sizeof($extensao)-1] == 'JPG' || $extensao[sizeof($extensao)-1] == 'jpeg' || $extensao[sizeof($extensao)-1] == 'png'){

        move_uploaded_file($foto['tmp_name'],'../images/ajuda/'.$foto['name']);

        $fotoNome = '../images/ajuda/'.$foto['name'];

    }

}else{
    header('location:../view/ajudar-form.php?msg=Erro ao registrar ajuda!');
}

//Depuração
//echo "iddoacao: $iddoacao<br>idusuario: $idusuario<br>Forma de ajuda: $formAjuda<br>Ajuda: $ajuda<br>data/hora da ajuda: $data<br>fotoComprovante: $fotoNome";

$ajudaDTO = new ajudaDTO($iddoacao,$idusuario,$data);
$ajudaDTO->setFormAjuda($formAjuda);
$ajudaDTO->setAjuda($ajuda);
$ajudaDTO->setFotoComprovante($fotoNome);

$ajudaConn = new ajudaDAO();
$retorno = $ajudaConn->cadastrarAjuda($ajudaDTO);

if($retorno == null || $retorno == 0){
    header("location:../view/ajudar-form.php?msg=Erro ao cadastrar ajuda!");
}else{
    header("location:../view/ajudar-form.php?msg=Ajuda cadastrada com sucesso!");
}

?>