<?php

//cadastrarOngControl.php
require_once "../model/DAO/ongDAO.php";
require_once "../model/DTO/ongDTO.php";

if($_SESSION["perfil"] != "A"){
    header("location:../view/adotar.php?msg=Sem permissão para acesso!");
}

$idong = $_GET["idong"];
$nome = $_POST["nome"];
$descricao = $_POST["descricao"];
$necessidades = $_POST["necessidades"];
$cnpj = $_POST["cnpj"];
$estado = $_POST["estado"];
$cidade = $_POST["cidade"];
$endereco = $_POST["endereco"];
$numero = $_POST["numero"];
$complemento = $_POST["complemento"];
$telefone = $_POST["telefone"];
$email = $_POST["email"];
$banco = $_POST["banco"];
$agencia = $_POST["agencia"];
$conta = $_POST["conta"];
$pix = $_POST["pix"];

$fotoAtual = $_POST["foto-atual"];

$fotoNome = "";

if(isset($_POST["update"])){

    $foto = $_FILES["foto"];

    $extensao = explode(".",$foto["name"]);

    if($extensao[sizeof($extensao)-1] == "jpg" || $extensao[sizeof($extensao)-1] == "jpeg" || $extensao[sizeof($extensao)-1] == "JPG" || $extensao[sizeof($extensao)-1] == "png"){
        move_uploaded_file($foto["tmp_name"],"../images/ongs/".$foto["name"]);
        $fotoNome = "../images/ongs/".$foto["name"];
    }  

}else{
    echo "Erro ao carregar foto!";
}
//Verifica se o usuario enviou alguma foto
if($fotoNome == null || empty($fotoNome)){
    $fotoNome = $fotoAtual;
}

$ong = new ongDTO($nome,$descricao,$fotoNome,$cnpj,"");
$ong->setIdong($idong);
$ong->setNecessidades($necessidades);
$ong->setEstado($estado);
$ong->setCidade($cidade);
$ong->setEndereco($endereco);
$ong->setNumero($numero);
$ong->setComplemento($complemento);
$ong->setTelefone($telefone);
$ong->setEmail($email);
$ong->setBanco($banco);
$ong->setAgencia($agencia);
$ong->setConta($conta);
$ong->setPix($pix);

$ongConn = new ongDAO();
$retorno = $ongConn->editarOng($ong);

if($retorno == null || $retorno == 0){
    header("location:../view/ongs-adm.php?msg=Erro ao editar ONG!");
}else{
    header("location:../view/ongs-adm.php?msg=ONG editada com sucesso!");
}

?>