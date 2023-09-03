<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/padrao.css">
    <link rel="stylesheet" href="../css/doe-aqui.css">
    <title>Mi&Au | Doe aqui</title>
</head>

<body>
    
    <?php
        session_start();
        if(!isset($_SESSION["id"])){
            header("location:home.php?msg=Faça login!");
        }
    ?>

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

    <?php
    require_once "../model/DAO/ongDAO.php";
    require_once "../model/DAO/doacaoDAO.php";
    require_once "../model/DAO/usuarioDAO.php";

    $doacaoConn = new doacaoDAO();
    $doacao = $doacaoConn->ultimaDoacao();

    $usuarioConn = new usuarioDAO();
    $usuario = $usuarioConn->pesquisarUsuario($doacao["idusuario"]);

    $ongConn = new ongDAO();
    $ong = $ongConn->pesquisarOng($doacao["idong"]);
    ?>

    <section>
        <article class="doacao">

            <h1 class="titulo">ONG da semana: <?=$ong["nome"]?></h1>
            <p class="under-titulo"><?=$doacao["subtitulo"]?></p>

            <div class="post-autor-data">
                <p><b>Por: <?=$usuario["nome"]?>, Mi&Au</b></p>
                <p><?php echo date('d/m/Y H:i', strtotime($doacao["dataCriacao"])); ?></p>
            </div>

            <div class="paragraph-foto">
            <img src="<?=$ong["foto"]?>">
            <h3>Breve Descrição da ONG</h3>
            <p><?=$ong["descricao"]?></p>
            <h3>Necessidades</h3>
            <p><?=$ong["necessidades"]?></p>
            </div>

            <img class="img-width-100" src="<?=$doacao["fotoFundador"]?>">

            <p><?=$doacao["descFundador"]?></p>

            <div class="inputs-alinhados">
                <div class="local">
                    <h3>Localidade</h3>
                    <ul class="lista-padrao">
                        <li><b>Estado:</b> <?=$ong["estado"]?></li>
                        <li><b>Cidade:</b> <?=$ong["cidade"]?></li>
                        <li><b>Endereço:</b> <?=$ong["endereco"]?></li>
                        <li><b>Número:</b> <?=$ong["numero"]?></li>
                        <li><b>Complemento:</b> <?=$ong["complemento"]?></li>
                        <li><b>CNPJ:</b> <?=$ong["cnpj"]?></li>
                    </ul>
                </div>
                <div class="contato">
                    <h3>Contato</h3>
                    <ul class="lista-padrao">
                        <li><b>Telefone:</b> <?=$ong["telefone"]?></li>
                        <li><b>E-mail:</b> <?=$ong["email"]?></li>
                    </ul>
                </div>
            </div>
            
            <div class="inputs-alinhados ajuda-label">
                <p>Faça a sua parte e ajude uma boa causa!</p>
                <a href="ajudar-form.php">Ajudar...</a>
            </div>

            <h3 style="margin-top:50px">Veja também:</h3>
            <section class="ongs-else-container">
            <?php
            require_once "../model/DAO/ongDAO.php";
            $ongConn = new ongDAO();
            $ongs = $ongConn->listarTopOngs();
            foreach($ongs as $ong){
                if($ong["idong"] != $doacao["idong"]){
            ?>
                <article class="inputs-alinhados ong-else">
                    <img src="<?=$ong["foto"]?>">
                    <div class="ong-resumo">
                        <a href="ong-perfil.php?idong=<?=$ong["idong"]?>" style="font-size:20px;color:#424874;border-bottom:1px solid;font-weight:bold;"><?=$ong["nome"]?></a>
                        <p><?=$ong["descricao"]?></p>
                    </div>
                </article>
            <?php
            }}
            ?>
            </section>

        </article>
    </section>

    </main>

</body>

</html>