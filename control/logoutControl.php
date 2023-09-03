<?php

//logoutControl.php
    session_start();
    unset($_SESSION["id"]);
    unset($_SESSION["nome"]);
    unset($_SESSION["sobrenome"]);
    unset($_SESSION["email"]);
    unset($_SESSION["img_usuario"]);
    session_destroy();
    header("location:../view/home.php?msg=Logout efetuado com sucesso!");
?>