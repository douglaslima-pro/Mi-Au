<?php

//editarAnimalControl.php
require_once "../model/DAO/animalDAO.php";
require_once "../model/DTO/animalDTO.php";

$idanimal = $_POST["idanimal"];
$especie = $_POST["especie"];
$nome = $_POST["nome"];
$descricao = $_POST["descricao"];
$sexo = $_POST["sexo"];
$porte = $_POST["porte"];
$temperamento = $_POST["temperamento"];

//echo "idanimal: $idanimal<br>especie: $especie<br>nome: $nome<br>descricao: $descricao<br>sexo: $sexo<br>porte: $porte<br>temperamento: $temperamento";

$animalConn = new animalDAO();

$fotoRetorno = $animalConn->pesquisarAnimal($idanimal);
$fotoAnimal = "";

foreach($fotoRetorno as $foto){
    $fotoAnimal = $foto["img_animal"];
}

//echo "<br>foto: $fotoAnimal";

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
    $fotoNome = $fotoAnimal;
}
//echo "<br>foto nova: $fotoNome";

$animal = new animalDTO($especie,$nome,$descricao);
$animal->setIdanimal($idanimal);
$animal->setSexo($sexo);
$animal->setPorte($porte);
$animal->setTemperamento($temperamento);
$animal->setFoto($fotoNome);

/*echo "Atraves de GETTERS<br>idanimal: ".$animal->getIdanimal()."<br>especie: ".$animal->getEspecie()."<br>nome: ".$animal->getNome()."<br>descricao: ".$animal->getDescricao()."<br>sexo: ".$animal->getSexo()."<br>porte: ".$animal->getPorte()."<br>temperamento: ".$animal->getTemperamento();
echo "<br>foto: $fotoAnimal";
echo "<br>foto nova: ".$animal->getFoto();*/

$retorno = $animalConn->editarAnimal($animal);

if($retorno == null || $retorno == 0){
    header("location:../view/divulgar.php?msg=Erro ao editar animal!");
}else{
    header("location:../view/divulgar.php?msg=Animal atualizado com sucesso!");
}

?>