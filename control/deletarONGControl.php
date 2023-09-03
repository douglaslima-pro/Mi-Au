<?php

//deletarONGControl.php
require_once "../model/DAO/ongDAO.php";

$idong = $_POST["idong"];

$ongConn = new ongDAO();
$retorno = $ongConn->deletarOng($idong);

if($retorno == null || $retorno == 0){
    header("location:../view/ongs-adm.php?msg=Erro ao deletar ONG!");
}else{
    header("location:../view/ongs-adm.php?msg=ONG deletada com sucesso!");
}

?>