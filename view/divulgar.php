<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/padrao.css">
    <link rel="stylesheet" href="../css/divulgar.css">
    <title>Mi&Au | Divulgar</title>
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

            <section class="conteudo-central">

                <section id="animais-cadastrados">
                    <h3>Animais Cadastrados</h3>
                    <?php
                    require_once "../model/DAO/animalDAO.php";
                    $animalConn = new animalDAO();
                    $retorno = $animalConn->listarAnimaisCadastrados($_SESSION["id"]);
                    foreach($retorno as $animal){
                    ?>
                    <article class="animal-cadastrado">
                        <img src="<?=$animal["img_animal"]?>">
                        <div>
                            <a href="editarAnimal.php?idanimal=<?=$animal["idanimal"]?>"><img src="../images/tools/editar.png"></a>
                            <h3><?=$animal["nome"]?></h3>
                            <q><?=$animal["descricao"]?></q>
                        </div>
                    </article>
                    <?php
                        }
                    ?>
                </section>

                <form action="../control/cadastrarAnimalControl.php" method="POST" id="cadastro-animal" enctype="multipart/form-data">
                    <h2 onclick="fecharForm()">X</h2>
                    <h3>Selecione uma espécie</h3>
                    <select name="especie" id="especie" required>
                        <option value="">Não selecionado</option>
                        <option value="cachorro" id="cachorro">Cachorro</option>
                        <option value="gato" id="gato">Gato</option>
                    </select>

                    <input type="file" id="foto" name="foto" hidden>

                    <div class="inputs-alinhados">
                        <img src="../images/usuarios/unset.png" id="preview-foto">
                        <div class="nome-descricao">
                            <label for="nome">Nome</label>
                            <input type="text" id="nome" name="nome" required>
                            <label for="descricao">Descrição</label>
                            <textarea name="descricao" id="descricao" cols="30" rows="8" placeholder="Fale um pouco sobre o animal, descrevendo sua situação e necessidades.

Lembre-se de colocar uma forma de contato e informações do local para adoção!" required maxlength="1000"></textarea>
                        </div>
                    </div>

                    <label for="sexo">Sexo</label>
                    <select name="sexo" id="sexo" required>
                        <option value="">Não selecionado</option>
                        <option value="Macho">Macho</option>
                        <option value="Fêmea">Fêmea</option>
                    </select>

                    <label for="porte">Porte</label>
                    <select name="porte" id="porte" required>
                        <option value="">Não selecionado</option>
                        <option value="Pequeno">Pequeno</option>
                        <option value="Médio">Médio</option>
                        <option value="Grande">Grande</option>
                    </select>

                    <label for="temperamento">Temperamento</label>
                    <select name="temperamento" id="temperamento" required>
                        <option value="">Não selecionado</option>
                        <option value="Dócil">Dócil</option>
                        <option value="Bravo">Bravo</option>
                        <option value="Brincalhão">Brincalhão</option>
                        <option value="Reservado">Reservado</option>
                    </select>

                    <input type="submit" name="upload" value="Cadastrar Animal">
                </form>

            </section>
            
            <button class="novo-animal" onclick="abrirForm()">Cadastrar novo animal...</button>

        </section>
    </main>

    <!--JavaScript-->
    <script src="../js/divulgar.js"></script>
    <script src="../js/foto.js"></script>

</body>

</html>