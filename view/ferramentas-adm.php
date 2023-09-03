<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/padrao.css">
    <link rel="stylesheet" href="../css/ferramentas-adm.css">
    <link rel="stylesheet" href="../css/ongs-adm.css">
    <title>Mi&Au | Ferramentas de Administrador - Usuários</title>
    <style>
        .form-alterar-usuario{
            background-image:linear-gradient(45deg,lightgrey,white);
            border-radius:20px;
            max-width:700px;
            margin:auto;
            padding:30px 10px;
        }
        .form-alterar-usuario .alterar{
            background-color:#424874;
            border:1px solid #424874;
        }
        .form-alterar-usuario .alterar:hover{
            background-color:#585C81;
            color:white;
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
                    }else{
                        header("location:adotar.php?msg=Sem permissão para acesso!");
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
        <nav>
            <ul>
                <li><a href="ferramentas-adm.php" style="border-bottom:1px solid #a4d2df;opacity:1">Usuários</a></li>
                <li><a href="animais-adm.php">Animais</a></li>
                <li><a href="doacoes-adm.php">Doações</a></li>
                <li><a href="ongs-adm.php">ONGs</a></li>
                <li><a href="denuncias-adm.php">Denúncias</a></li>
            </ul>
        </nav>

        <section class="ferramenta-aba">

            <section style="width:100%">

                <h2 style="margin-bottom:30px">Usuários Cadastrados</h2>

            <?php
            if(!isset($_GET["idusuario"]) || $_GET["idusuario"] == 0){
            ?>
                <table>
                    <tr>
                        <th>idusuario</th>
                        <th>nome</th>
                        <th>email</th>
                        <th>situacao</th>
                        <th>perfil</th>
                        <th>Opções</th>
                    </tr>

                <?php
                require_once "../model/DAO/usuarioDAO.php";
                $usuarioConn = new usuarioDAO();
                $retorno = $usuarioConn->listarUsuarios();
                foreach($retorno as $usuario){
                ?>
                        
                    <tr <?php if($usuario["perfil"] == "A"){echo "style='background-color:#B4BAF2'";} ?>>
                        <td><?=$usuario["idusuario"]?></td>
                        <td><?=$usuario["nome"]?></td>
                        <td><?=$usuario["email"]?></td>
                        <td><?php if($usuario["situacaoUsuario"]==1){echo "Ativo";}else{echo "<p style='color:red;margin:0'>Inativo</p>";} ?></td>
                        <td><?php if($usuario["perfil"]=="U"){echo "Usuário";}else{echo "<p style='color:darkred;margin:0'>Administrador</p>";} ?></td>
                        <td>
                            <a href="?idusuario=<?=$usuario["idusuario"]?>" style="color:blue">Alterar</a>
                            <a href="../control/deletarUsuarioControl.php?idusuario=<?=$usuario["idusuario"]?>&nome=<?=$usuario["nome"]?>" style="background-color:darkred;border:1px solid black;outline:none;color:white;cursor:pointer">Deletar</a>
                        </td>
                    </tr>
                <?php
                }
                ?>
                </table>
            <?php
            }else{
                require_once "../model/DAO/usuarioDAO.php";
                $usuarioConn = new usuarioDAO();
                $usuario = $usuarioConn->pesquisarUsuario($_GET["idusuario"]);
            ?>
                <form action="../control/alterarUsuarioControl.php" method="POST" class="form-alterar-usuario">
                    <input type="text" name="idusuario" value="<?=$usuario["idusuario"]?>" hidden>
                    <a href="?idusuario=0" style="float:right;color:#424874;font-size:25px;font-weight:bold">X</a>
                    <h3 style="border-bottom:1px solid;margin-bottom:20px;font-size:18px;margin-top:10px">Alterar Usuário</h3>
                    <label for="nome">Nome:</label>
                    <input type="text" id="nome" name="nome" value="<?=$usuario["nome"]?>">
                    <label for="email">E-mail:</label>
                    <input type="text" id="email" name="email" value="<?=$usuario["email"]?>">
                    <label for="situacao">Situação:</label>
                    <select name="situacao" id="situacao">
                    <?php
                    if($usuario["situacaoUsuario"] == 1){
                    ?>
                        <option value="1" selected>Ativo</option>
                        <option value="0">Inativo</option>
                    <?php
                    }else{
                    ?>
                        <option value="1">Ativo</option>
                        <option value="0" selected>Inativo</option>
                    <?php
                    }
                    ?>
                    </select>

                    <label for="perfil">Perfil:</label>
                    <select name="perfil" id="perfil">
                    <?php
                    if($usuario["perfil"] == "U"){
                    ?>
                        <option value="U" selected>Usuário</option>
                        <option value="A">Administrador</option>
                    <?php
                    }else{
                    ?>
                        <option value="U">Usuário</option>
                        <option value="A" selected>Administrador</option>
                    <?php
                    }
                    ?>
                    </select>
                    <input type="submit" class="alterar" value="Salvar">
                </form>
            <?php
            }
            ?>
            </section>

    </main>

</body>

</html>