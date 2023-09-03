<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/home.css">
    <title>Mi&Au | Alterar Senha</title>
    <style type="text/css">
        html,body{
            width:100%;
            height:100%;
        }
        body{
            background-color:#F3D7CA;
            display:table;
        }
        main{
            display:table-row;
            height:100%;
        }
        .flex{
            height:100%;
            display:flex;
            align-items:center;
        }
        .enviar-email-senha{
            background-color:#F4EEFF;
            border:1px solid #424874;
            border-radius:20px;
            padding:10px;
            width:250px;
            padding:40px 20px;
            margin-top:50px;
            margin:auto;
            color:#424874;
        }
        .enviar-email-senha h4{
            font-size:15px;
            font-weight:600;
            opacity:0.9;
            margin:0;
        }
        .alerta-senha{
            margin:0;
        }
        a{
            text-decoration:none;
            color:white;
        }
    </style>
</head>

<body>

    <?php
        if(isset($_GET["senha"])){
            $senha = $_GET["senha"];
        }
        $chave = "";
        if(isset($_GET["chave"])){
            $chave = preg_replace("/[^[:alnum:]]/",'',$_GET["chave"]);
    ?>

    <header>
        <a href="home.php"><h1>Mi&Au</h1></a>
    </header>

    <main class="table-row">
        <div class="flex">
            <form action="../control/alterarSenhaControl.php" class="enviar-email-senha" method="POST">
                <input type="text" name="chave" value="<?=$chave?>" hidden>
                <h4>E-mail</h4>
                <input type="text" name="email" required>
                <h4>Nova senha</h4>
                <input type="password" id="senhacad" name="senha" minlength="5" onkeyup="confereSenha()" required>
                <h4>Confirme a nova senha</h4>
                <input type="password" id="confirmSenhacad" onkeyup="confereSenha()" required>
                <p class="alerta-senha"><?php if(isset($senha)){echo $senha;}?></p>
                <input type="submit" value="Alterar senha" class="submit-form">
                <div id="submitcad" class="submit-div" style="display:none">Alterar senha</div>
            </form>
        </div>
    </main>

    <!--JavaScript-->
    <script src="../js/senha.js"></script>

    <?php
        }else{
            echo "<div style='margin:20px;'><h2>URL não encontrada!</h2><hr><p>Talvez o link que você entrou tenha expirado!</p><a href='home.php' style='color:blue'>Mi&Au | Home Page</a></div>";
        }
    ?>

</body>
</html>