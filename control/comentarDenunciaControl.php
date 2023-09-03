<?php

//comentarDenunciaControl.php
session_start();
require_once "../model/DAO/comentarioDAO.php";
require_once "../model/DTO/comentarioDTO.php";

date_default_timezone_set('America/Sao_Paulo');
$data = date('Y-m-d');

$iddenuncia = $_POST["iddenuncia"];
$idusuario = $_SESSION["id"];
$texto = $_POST["comentario"];

//echo "data: $data<br>id-animal: $idanimal<br>id-usuario: $idusuario<br>texto: $texto";

$comentario = new comentarioDTO($idusuario,$texto,$data);
$comentario->setIdobjeto($iddenuncia);

//echo "Através da Classe DTO!<br>data: ".$comentario->getDataComentario()."<br>id-animal: ".$comentario->getIdanimal()."<br>id-usuario: ".$comentario->getIdusuario()."<br>texto: ".$comentario->getTexto();
$comentarioConn = new comentarioDAO();
$retorno = $comentarioConn->comentarDenuncia($comentario);

$local = $_GET["local"];

if($retorno == null || $retorno == 0){
    header("location:../view/$local.php?msg=Erro ao fazer comentario!");
}else{
    header("location:../view/$local.php?msg=Comentario feito com sucesso!");
}

?>