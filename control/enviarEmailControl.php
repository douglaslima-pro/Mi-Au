<?php

//enviarEmailControl.php
date_default_timezone_set('America/Sao_Paulo');
$data = date('d/m/Y H:i');
$email = $_POST["email"];
$assunto = "Novo e-mail -> $email";
$corpo = $_POST["msg"];
$cabecalho = "From: $email at $data";
$corpo = $cabecalho."\n\n".$corpo;
$local = $_POST["local"];

if(mail('contato-miau@hotmail.com',$assunto,$corpo)){
    header("location:../view/".$local.".php?msg=E-mail enviado com sucesso!");
}else{
    header("location:../view/".$local.".php?msg=Erro ao enviar e-mail!");
}

?>