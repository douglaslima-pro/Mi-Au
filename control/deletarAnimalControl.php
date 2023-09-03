<?php

//deletarAnimalControl.php
require_once "../model/DAO/animalDAO.php";

$idanimal = $_POST["idanimal"];
$animalConn = new animalDAO();
$retorno = $animalConn->deletarAnimal($idanimal);
if($retorno == null || $retorno == 0){
    header("location:../view/divulgar.php?msg=Erro ao deletar animal!");
}else{
    header("location:../view/divulgar.php?msg=Animal deletado com sucesso!");
}

?>