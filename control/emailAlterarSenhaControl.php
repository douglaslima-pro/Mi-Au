<?php

//emailAlterarSenhaControl.php
require_once "../model/DAO/usuarioDAO.php";
$email = $_POST["email"];
$usuarioConn = new usuarioDAO();
$retorno = $usuarioConn->procurarEmail($email);
if($retorno){

    foreach($retorno as $usuario){
        $id = $usuario["idusuario"];
        $senha = $usuario["senha"];
    }

    $chave = sha1($id.$senha);

    $assunto = "Alteração de senha - Mi&Au";
    $corpo = "Link para alteração de senha: http://localhost/douglas/mi_au/view/alterarsenha.php?chave=$chave";
    
    if(mail($email,$assunto,$corpo)){
        header("location:../view/recuperarsenha.php?msg=Link enviado com sucesso!");
    }else{
        header("location:../view/recuperarsenha.php?msg=Erro ao enviar link!");
    }

}else{
    header("location:../view/recuperarsenha.php?msg=Erro ao enviar link!");
}

?>