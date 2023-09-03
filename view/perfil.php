<!DOCTYPE html>
<html lang="en">

<?php
session_start();
require_once "../model/DAO/usuarioDAO.php";
$usuarioConn = new usuarioDAO();
$usuario = $usuarioConn->pesquisarUsuario($_GET["id"]);
?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/padrao.css">
    <title>Mi&Au | <?=$usuario["nome"]?> - Perfil</title>
</head>

<body>
    
    <header>
        <div class="header-container">
            <h1>Mi&Au</h1>

            <div class="perfil-selecoes">

                <a class="usuario-id" href="perfil.php?id=<?=$_SESSION["id"]?>">
                    <img src="<?=$_SESSION["img_usuario"]?>">
                    <h3><?=$_SESSION["nome"]?></h3>
                </a>
                
                <?php
                    if($_SESSION["perfil"] == "A"){
                        echo "<a href='ferramentas-adm.php'><img src='../images/cabecalho_icones/adm-settings2.png'></a>";
                    }
                ?>

                <a href="editarPerfil.php"><img src="../images/cabecalho_icones/settings2.png"></a>
                <a href="faleConosco.php"><img src="../images/cabecalho_icones/support2.png"></a>
                <a href="../control/logoutControl.php"><img src="../images/cabecalho_icones/logoff2.png"></a>
                
            </div>
        </div>
        <?php
            require_once "../model/DAO/htmlDAO.php";
            //NAV
            $htmlDAO = new htmlDAO();
            $retorno = $htmlDAO->escreverHTML("nav");
            foreach($retorno as $tag){
                echo $tag["content"];
            }
        ?>
    </header>

    <main class="table-row">
        
    <div style="display:flex;align-items:center;gap:10px;position:absolute;top:50%;left:50%;transform:translate(-50%,-50%)">
            <img src="../images/tools/construcao.png" style="width:100px;height:100px;">
            <p>Estamos construindo o ambiente!<br>Aguarde que em breve traremos novidades!<br><br><b>~~Mi&Au <3</b></p>
        </div>

    </main>

</body>
</html>