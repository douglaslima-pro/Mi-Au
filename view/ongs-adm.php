<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/padrao.css">
    <link rel="stylesheet" href="../css/ferramentas-adm.css">
    <link rel="stylesheet" href="../css/ongs-adm.css">
    <title>Mi&Au | Ferramentas de Administrador - ONGs</title>
</head>

<body>

    <!--Caixa de Confirmação de Exclusão de ONG-->
    <section class="deletar-ong-confirm">
        <h3>Deseja realmente deletar esta ONG?</h3>
        <div>
            <form class="optionSim" action="../control/deletarONGControl.php" method="POST">
                <input type="text" name="idong" value="<?=$_GET["idong"]?>" hidden>
                <input type="submit" value="Sim">
            </form>
            <button id="nao">Não</button>
        </div>
    </section>
    
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
                <li><a href="ferramentas-adm.php">Usuários</a></li>
                <li><a href="animais-adm.php">Animais</a></li>
                <li><a href="doacoes-adm.php">Doações</a></li>
                <li><a href="ongs-adm.php" style="border-bottom:1px solid #a4d2df;opacity:1">ONGs</a></li>
                <li><a href="denuncias-adm.php">Denúncias</a></li>
            </ul>
        </nav>

        <section class="ferramenta-aba">

            <section>
                <h2>ONGs Cadastradas</h2>

                <section class="grid">

                    <?php
                    require_once "../model/DAO/ongDAO.php";
                    $ongConn = new ongDAO();
                    $retorno = $ongConn->listarOngs();
                    foreach($retorno as $ong){
                    ?>

                    <article>
                        <img src="<?=$ong["foto"]?>">
                        <div class="ong-resumo">
                            <a href="ongs-adm.php?idong=<?=$ong["idong"]?>"><?=$ong["nome"]?></a>
                            <p class="ong-descricao"><?=$ong["descricao"]?></p>
                        </div>
                    </article>

                    <?php
                        }
                    ?>

                </section>
            </section>

            <button class="open-viewer">Cadastrar ONG</button>
            
            <?php
                if(isset($_GET["idong"]) && $_GET["idong"] != 0){
                    require_once "../model/DAO/ongDAO.php";
                    $ongConn = new ongDAO();
                    $ong = $ongConn->pesquisarOng($_GET["idong"]);
                    $viewerOpened = "viewer-open";
                }
            ?>

            <aside class="viewer-lateral <?php if(isset($viewerOpened)){echo $viewerOpened;} ?>">

                <button class="close-viewer">Fechar</button>

                <form action="../control/editarOngControl.php?idong=<?=$ong["idong"]?>" method="POST" id="form-ong" enctype="multipart/form-data">
                    <input type="file" id="foto" name="foto" hidden>
                    <input type="text" name="foto-atual" value="<?=$ong["foto"]?>" hidden>
                    <h3 id="viewer-title">Editar ONG</h3>
                    <img src="<?=$ong["foto"]?>" id="preview-foto">
                    <label for="nome">Nome:</label>
                    <input type="text" id="nome" name="nome" value="<?=$ong["nome"]?>" placeholder="Insira o nome..." required>
                    <label for="descricao">Descrição:</label>
                    <textarea name="descricao" id="descricao" cols="30" rows="8" placeholder="Insira uma breve descrição da ONG..." required><?=$ong["descricao"]?></textarea>
                    <label for="necessidades">Necessidades:</label>
                    <textarea name="necessidades" id="necessidades" cols="30" rows="8" placeholder="Insira as principais necessidades da ONG..." required><?=$ong["necessidades"]?></textarea>
                    <label for="cnpj">CNPJ:</label>
                    <input type="text" name="cnpj" id="cnpj" value="<?=$ong["cnpj"]?>" placeholder="Insira o CNPJ da ONG..." required>
                    <h3>Localidade</h3>
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

                                if($estado["value"]==$ong["estado"]){
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

                                if($cidade["value"]==$ong["cidade"]){
                                    echo "<option value='$value' selected>$name</option>";
                                }else{
                                    echo "<option value='$value'>$name</option>";
                                }
                            }
                            echo "</select>";
                            ?>
                        </div>
                    </div>
                    <label for="endereco">Endereço completo:</label>
                    <input type="text" id="endereco" name="endereco" value="<?=$ong["endereco"]?>" placeholder="Insira o endereço completo..." required>
                    <label for="numero">Número:</label>
                    <input type="text" id="numero" name="numero" value="<?=$ong["numero"]?>" placeholder="Insira o número..." required>
                    <label for="complemento">Complemento:</label>
                    <input type="text" id="complemento" name="complemento" value="<?=$ong["complemento"]?>" placeholder="Insira o complemento..." required>
                    <h3>Contato</h3>
                    <label for="telefone">Telefone:</label>
                    <input type="tel" id="telefone" name="telefone" value="<?=$ong["telefone"]?>" placeholder="Insira o telefone..." required>
                    <label for="email">E-mail:</label>
                    <input type="text" id="email" name="email" value="<?=$ong["email"]?>" placeholder="Insira o e-mail..." required>
                    <h3>Financeiro</h3>
                    <label for="banco">Banco:</label>
                    <input type="text" id="banco" name="banco" value="<?=$ong["banco"]?>" placeholder="Insira o banco..." required>
                    <label for="agencia">Agência:</label>
                    <input type="text" id="agencia" name="agencia" placeholder="Insira a agência..." value="<?=$ong["agencia"]?>" required>
                    <label for="conta">Conta:</label>
                    <input type="text" id="conta" name="conta" value="<?=$ong["conta"]?>" placeholder="Insira a conta..." required>
                    <label for="pix">Pix:</label>
                    <input type="text" id="pix" name="pix" value="<?=$ong["pix"]?>" placeholder="Ex.: 'telefone,email,cnpj,cpf...'  *Sem caracteres especiais!">
                    <input type="submit" name="update" id="submit" value="Salvar">
                    <?php
                    if(isset($_GET["idong"])){
                    ?>
                    <a href="publicarOng.php?idong=<?=$_GET["idong"]?>" class="pub-ong">Publicar ONG</a>
                    <button class="deletar-ong" type="button">Deletar ONG</button>
                    <?php
                    }
                    ?>
                    <script>
                        let deletarBttn = document.querySelector('.deletar-ong');
                        let optionNao = document.getElementById('nao');

                        deletarBttn.addEventListener('click', ()=>{
                            document.querySelector('.deletar-ong-confirm').classList.toggle("active");
                        });

                        optionNao.addEventListener('click', ()=>{
                            document.querySelector('.deletar-ong-confirm').classList.toggle("active");
                        });

                    </script>
                </form>

            </aside>
            
        </section>
    </main>

    <!--JavaScript-->
    <script src="../js/foto.js"></script>
    <script src="../js/ongs.js"></script>

</body>

</html>