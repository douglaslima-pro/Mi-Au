<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/padrao.css">
    <link rel="stylesheet" href="../css/doe-aqui.css">
    <title>Mi&Au | Fale Conosco</title>
    <style>
    nav ul li #doe-aqui{
        background-image:none;
    }
    form{
        background-color:white;
        border-radius:20px;
        padding:20px 10px;
        margin:auto;
        max-width:700px;
    }
    input[type="text"],textarea{
        background-color:#E3E5F6;
    }
    .table-row .flex{
        padding:30px 0;
    }
    .table-row .flex::-webkit-scrollbar{
        display:block;
    }
    </style>
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

        <section class="flex">

            <form action="../control/enviarEmailControl.php" method="POST" style="box-shadow:1px 1px 5px black">
                <h1 style="border-bottom:1px solid">Fale Conosco</h1>
                <p>Você pode resolver as suas dificuldades com o sistema entrando em contato conosco!</p>
                <input type="text" name="local" value="faleConosco" hidden>
                <label for="email">E-mail:</label>
                <input type="text" id="email" name="email" placeholder="Insira um e-mail..." required>
                <label for="msg">Mensagem:</label>
                <textarea id="msg" name="msg" rows="6" placeholder="Insira uma mensagem..." maxlength="1500" required style="border-radius:10px;width:100%;outline:none;resize:vertical"></textarea>
                <input type="submit" value="Enviar">
            </form>

        </section>

    </main>

</body>

</html>