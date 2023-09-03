<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/padrao.css">
    <link rel="stylesheet" href="../css/adotar.css">
    <title>Mi&Au | Adotar</title>
</head>

<body>

    <?php
    setlocale(LC_ALL,'pt_BR.UTF8');
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

            <form action="../control/pesquisarAnimalControl.php" method="GET" id="pesquisaForm">
                <div class="cachorro-gato">
                    <img src="../images/animal_atributos/cachorro.png" onclick="filtrarEspecie('cachorro')">
                    <img src="../images/animal_atributos/gato.png" onclick="filtrarEspecie('gato')">
                </div>
                <select name="especie" id="especie" style="display:none">
                    <option value="cachorro" id="cachorro">Cachorro</option>
                    <option value="gato" id="gato">Gato</option>
                </select>
                <input type="submit" id="submit-filtro" style="display:none">
            </form>

            <section class="posts-container">

            <?php
            require_once "../model/DAO/animalDAO.php";
            $animalConn = new animalDAO();
            $retorno = $animalConn->listarAnimais();
            foreach($retorno as $animal){
            
            ?>
                <article class="post">

                    <section class="post-id">
                        <div class="usuario-id">
                            <a href="perfil.php?id=<?=$animal["idusuario"]?>">
                            <?php
                            require_once "../model/DAO/usuarioDAO.php";
                            $usuarioConn = new usuarioDAO();
                            $divulgador = $usuarioConn->pesquisarUsuario($animal["idusuario"]);
                            ?>
                            
                                <img src="<?=$divulgador["img_usuario"]?>">
                                <h3><?=$divulgador["nome"]?></h3>
                            </a>
                            <div>
                                <img src="../images/tools/world.png">
                                <p><?=$divulgador["estado"]?> - <?=$divulgador["cidade"]?></p>
                            </div>
                        </div>
                        <div class="post-id-selections">
                            <p>Divulgado em <?php echo date('d/m/Y', strtotime($animal["dataCadastro"])); ?></p>
                            <?php
                            $idAnim = explode("0",$animal["idanimal"]);
                            ?>
                            <button class="post-options" onclick="openPostOptions(<?=$idAnim[sizeof($idAnim)-1]?>)">...
                                <ul class="object-options" id="animal-options<?=$idAnim[sizeof($idAnim)-1]?>">
                                    <li><a>Salvar animal</a></li>
                                    <li><a>Denunciar animal</a></li>
                                    <li><a>Compartilhar</a></li>
                                </ul>
                            </button>
                        </div>
                    </section>
                    
                    <section class="animal-id">
                        <img src="<?=$animal["img_animal"]?>">
                        <div>
                            <h3><?=$animal["nome"]?></h3>
                            <q><?=$animal["descricao"]?></q>
                        </div>
                    </section>

                    <section class="animal-attr">
                        <img src="../images/animal_atributos/<?=$animal["especie"]?>.png" title="<?=$animal["especie"]?>">
                        <img src="../images/animal_atributos/<?=$animal["sexo"]?>.png" title="<?=$animal["sexo"]?>">
                        <img src="../images/animal_atributos/<?=$animal["temperamento"]?>.png" title="<?=$animal["temperamento"]?>">
                        <h3 title="<?=$animal["porte"]?>">
                        <?php
                        switch($animal["porte"]){
                            case "Pequeno":
                                echo "P";
                                break;
                            case "Médio":
                                echo "M";
                                break;
                            case "Grande":
                                echo "G";
                                break;
                        }
                        ?></h3>
                    </section>

                    <section class="comentarios-section">
                        <div class="comentarios-container">


                        <?php
                            require_once "../model/DAO/comentarioDAO.php";
                            $comentarioConn = new comentarioDAO();
                            $comentarios = $comentarioConn->listarComentariosAnimal($animal["idanimal"]);
                            foreach($comentarios as $comentario){
                        ?>

                            <article>
                                <?php
                                    require_once "../model/DAO/usuarioDAO.php";
                                    $usuarioConn = new usuarioDAO();
                                    $usuario = $usuarioConn->pesquisarUsuario($comentario["idusuario"]);
                                ?>
                                <div class="post-id">
                                    <div class="usuario-id">
                                        <img src="<?=$usuario["img_usuario"]?>">
                                        <h3><?=$usuario["nome"]?></h3>
                                    </div>
                                    <div class="post-id-selections">
                                        <p>Comentou em <?php echo date('d/m/Y', strtotime($comentario["dataComentario"])); ?></p>
                                    <?php
                                    $idComment = explode("0",$comentario["idcomentario"]);
                                    ?>
                                        <button class="comentario-options" onclick="openCommentOptions(<?=$idComment[sizeof($idComment)-1]?>)">...
                                        <ul class="object-options" id="comment-options<?=$idComment[sizeof($idComment)-1]?>">
                                            <li><a>Denunciar comentário</a></li>
                                        </ul>
                                        </button>
                                    </div>
                                </div>
                                <q><?=$comentario["texto"]?></q>
                            </article>

                        <?php
                            }
                        ?>

                        </div>

                        <form action="../control/comentarAnimalControl.php?local=adotar" method="POST">
                            <textarea placeholder="Comente alguma coisa..." cols="30" rows="1" name="comentario"></textarea>
                            <input type="text" name="idanimal" value="<?=$animal["idanimal"]?>" hidden>
                            <input type="submit" value=">" title="Comentar">
                        </form>
                    </section>

                </article>

            <?php
                }
            ?>

            </section>

        </section>
    </main>

    <!--JavaScript-->
    <script src="../js/filtro-pesquisa.js"></script>
    <script src="../js/object-options.js"></script>

</body>

</html>