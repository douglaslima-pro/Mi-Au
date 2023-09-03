<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/padrao.css">
    <link rel="stylesheet" href="../css/editarPerfil.css">
    <title>Mi&Au | Editar Perfil</title>
</head>

<body>

    <?php
        session_start();
        if(!isset($_SESSION["id"])){
            header("location:home.php?msg=Faça login!");
        }
        require_once "../model/DAO/usuarioDAO.php";
        require_once "../model/DTO/usuarioDTO.php";
        
        $usuarioConn = new usuarioDAO();
        $usuario = $usuarioConn->pesquisarUsuario($_SESSION["id"]);
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
            if(isset($_GET["senha"])){
                $senha = $_GET["senha"];
            }
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
            <section>
                      
                <form action="../control/editarPerfilControl.php" method="POST" enctype="multipart/form-data">
                    <input type="file" id="foto" name="foto" hidden>

                    <div class="inputs-alinhados">
                        <img id="preview-foto" title="Selecione uma foto..." src="<?=$usuario["img_usuario"]?>">
                        <div class="nome-sobrenome">
                            <label for="nome">Nome</label>
                            <input type="text" id="nome" name="nome" value="<?=$usuario["nome"]?>">
                            <label for="nome">Sobrenome</label>
                            <input type="text" id="sobrenome" name="sobrenome" value="<?=$usuario["sobrenome"]?>">
                        </div>
                    </div>

                    <div class="inputs-alinhados">
                        <div class="email">
                            <label for="email">E-mail:</label>
                            <input type="text" id="email" name="email" value="<?=$usuario["email"]?>">
                        </div>
                        <div class="telefone">
                            <label for="telefone">Telefone/Celular:</label>
                            <input type="tel" id="telefone" name="telefone" value="<?=$usuario["telefone"]?>">
                        </div>
                    </div>

                    <div class="inputs-alinhados">
                        <div class="estado">
                            <?php
                            require_once "../model/DAO/selectDAO.php";
                            $estadoDAO = new selectDAO();
                            $estados = $estadoDAO->listarOptions("estado");

                            echo "<label for='estado'>Estado:</label>";
                            echo "<select name='estado' id='estado'>";

                            foreach($estados as $estado){

                            $value = $estado["value"];
                            $name = $estado["name"];

                                if($estado["value"]==$usuario["estado"]){
                                    echo "<option value='$value' selected>$name</option>";
                                }else{
                                    echo "<option value='$value'>$name</option>";
                                }
                            }
                            echo "</select>";
                            ?>
                        </div>
                        <div class="cidade">
                            <?php
                            require_once "../model/DAO/selectDAO.php";
                            $cidadeDAO = new selectDAO();
                            $cidades = $cidadeDAO->listarOptions("cidade");

                            echo "<label for='cidade'>Cidade:</label>";
                            echo "<select name='cidade' id='cidade'>";

                            foreach($cidades as $cidade){

                            $value = $cidade["value"];
                            $name = $cidade["name"];

                                if($cidade["value"]==$usuario["cidade"]){
                                    echo "<option value='$value' selected>$name</option>";
                                }else{
                                    echo "<option value='$value'>$name</option>";
                                }
                            }
                            echo "</select>";
                            ?>
                        </div>
                    </div>

                    <input type="submit" name="upload" value="Salvar">
                </form>
                
            </section>

            <aside>
                <section>
                    <form action="../control/alterarSenhaControl.php" method="POST">
                        <h3>Redefinição de senha</h3>
                        <table>
                            <tr>
                                <td>Senha</td>
                                <td>Confirme a senha</td>
                            </tr>
                            <tr>
                                <td><input type="password" id="senhacad" name="senha" required onkeyup="confereSenha()" minlength="5"></td>
                                <td><input type="password" id="confirmSenhacad" required onkeyup="confereSenha()"></td>
                            </tr>
                        </table>
                        <p class="alerta-senha"><?php if(isset($senha)){echo $senha;}?></p>
                        <input type="submit" value="Alterar senha" class="submit-form">
                        <div class="submit-div" style="display:none">Alterar senha</div>
                    </form>

                    <form action="../control/excluirContaControl.php" method="POST">
                        <h3>Exclusão de conta</h3>
                        <p>Ao clicar em "Excluir conta" você está ciente de que os seus dados serão <b>excluídos<b> do sistema.</p>
                        <input type="submit" value="Excluir conta">
                    </form>
                </section>
            </aside>
        </section>
        
    </main>

    
    <!--JavaScript-->
    <script src="../js/foto.js"></script>
    <script src="../js/senha.js"></script>

</body>

</html>