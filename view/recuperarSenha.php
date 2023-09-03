<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/home.css">
    <title>Mi&Au | Recuperar Senha</title>
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
        h3{
            font-size:17px;
            text-align:center;
            cursor:default;
            margin-bottom:40px;
            border-bottom:1px solid;
        }
        .enviar-email-senha p{
            font-size:12px;
            color:red;
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

    if(isset($_GET["msg"])){
        $msg = $_GET["msg"];
    }

    ?>

    <header>
        <a href="home.php"><h1>Mi&Au</h1></a>
    </header>

    <main class="table-row">
        <div class="flex">
            <form action="../control/emailAlterarSenhaControl.php" class="enviar-email-senha" method="POST">
                <h3>Recuperar senha</h3>
                <h5 style="margin:0;">E-mail:</h5>
                <input type="text" id="email" name="email" style="margin:10px 0 30px 0;">
                <p><?php if(isset($msg)){echo $msg;} ?></p>
                <input type="submit" value="Receber link">
            </form>
        </div>
    </main>

    <!--JavaScript-->
    <script src="../js/login-form.js"></script>

</body>
</html>