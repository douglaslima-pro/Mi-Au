<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/padrao.css">
    <link rel="stylesheet" href="../css/adotar.css">
    <link rel="stylesheet" href="../css/doe-aqui.css">
    <title>Mi&Au | Denúncias</title>
    <style>
        nav ul li #denuncias{
            background-image:linear-gradient(to top,#9aa1d3,#e5e6f3);
        }   
        nav ul li #doe-aqui,nav ul li #adotar{
            background-image:none;
        }
        .table-row{
            padding:0;
        }
        .table-row > section{
            background-image:linear-gradient(45deg,#8785A4 35%,#F0EFFF);
        }
        .table-row .publicar-denuncia h3{
            font-size:20px;
            margin-bottom:10px;
        }
        select,textarea,input[type="file"],input[type="text"]{
            background-color:white;
        }
        .inputs-alinhados{
            margin:0;
            padding:0;
        }
        textarea{
            resize:vertical;
        }
        .post{
            background-color:#171928;
            width:98%;
            max-width:800px;
            margin:0 auto 40px auto;
            box-shadow:1px 1px 5px black;
        }
        .comentarios-section{
            background-color:#424874;
        }
        .comentarios-container{
            background-color:rgba(255,255,255,0.35);
        }
        .comentarios-section input[type="submit"]{
            background-color:#171928;
            color:white;
        }
        .post .animal-id{
            display:flex;
            flex-wrap:wrap;
            overflow:hidden;
        }
        .post .animal-id img{
            border-radius:0;
            width:auto;
            flex:1;
            min-width:unset;
            width:50%;
        }
        .post .animal-id > div{
            border-radius:0;
            min-width:300px;
        }
        .form-denuncia{
            max-height:0px;
            overflow:hidden;
            transition:0.5s;
        }
        .abrir-fechar-bttn{
            background-color:#C45D67;
            border:none;
            outline:none;
            border-radius:5px;
            display:flex;
            justify-content:center;
            cursor:pointer;
            width:100%;
        }
        .abrir-fechar-bttn:hover{
            background-color:#B54B56;
        }
        .abrir-fechar-arrow{
            background-image:url('../images/tools/down-arrow.png');
            background-size:100%;
            background-repeat:no-repeat;
            width:20px;
            height:20px;
        }
        .up-arrow{
            background-image:url('../images/tools/up-arrow.png');
        }
        .form-open{
            max-height:700px;
        }
        .post-options,.comentario-options{
            background-color:#171928;
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

        <section>
            <section class="publicar-denuncia" style="background-image:linear-gradient(45deg,lightgrey,white);padding:10px;border-radius:10px;border:1px solid #424874;max-width:800px;margin:10px auto;box-shadow:1px 1px 5px black">
                <h3>Publicar Denúncia</h3>
                <form action="../control/cadastrarDenunciaControl.php" class="form-denuncia" method="POST" enctype="multipart/form-data">
                    <input type="text" name="idusuario" value="<?=$_SESSION["id"]?>" hidden>
                    <p style="color:darkred;font-size:12px;margin-bottom:10px">Denuncie casos de <em>abandono</em> e <em>maus-tratos</em> para que outras pessoas possam ver!</p>
                    <div class="inputs-alinhados">
                        <div class="estado">
                            <label for="estado">Estado:</label>
                                <select name="estado" id="estado" required>
                                    <option value="">Não selecionado</option>
                                    <option value="DF">Distrito Federal</option>
                                </select>
                        </div>
                        <div class="cidade">
                            <label for="cidade">Cidade:</label>
                                <select name="cidade" id="cidade" required>
                                    <option value="">Não selecionado</option>
                                    <option value="Águas Claras">Águas Claras</option>
                                    <option value="Asa Norte">Asa Norte</option>
                                    <option value="Asa Sul">Asa Sul</option>
                                    <option value="Ceilândia">Ceilândia</option>
                                    <option value="Gama">Gama</option>
                                    <option value="Guará">Guará</option>
                                    <option value="Lago Norte">Lago Norte</option>
                                    <option value="Lago Sul">Lago Sul</option>
                                    <option value="Núcleo Bandeirante">Núcleo Bandeirante</option>
                                    <option value="Paranoá">Paranoá</option>
                                    <option value="Planaltina">Planaltina</option>
                                    <option value="Recanto das Emas">Recanto das Emas</option>
                                    <option value="Riacho Fundo">Riacho Fundo</option>
                                    <option value="Samambaia">Samambaia</option>
                                    <option value="Sobradinho">Sobradinho</option>
                                    <option value="Taguatinga">Taguatinga</option>
                                </select>
                        </div>
                    </div>
                    <label for="titulo">Título:</label>
                    <input type="text" id="titulo" name="titulo" placeholder="Insira um título para a denúncia..." required>
                    <label for="descricao">Descrição:</label>
                    <textarea name="descricao" id="descricao" cols="30" rows="6" placeholder="Insira uma descrição clara e concisa para a denúncia..." style="width:100%;border-radius:10px;outline:none;border:1px solid #424874" required></textarea>
                    <label for="foto">Escolha uma foto:</label>
                    <input type="file" name="foto" id="foto" style="margin:0">
                    <input type="submit" name="upload" value="Publicar denúncia">
                </form>
                <button class="abrir-fechar-bttn">
                    <div class="abrir-fechar-arrow"></div>
                </button>
                <script>
                    let form = document.querySelector('.form-denuncia');
                    let button = document.querySelector('.abrir-fechar-bttn');
                    let arrow = document.querySelector('.abrir-fechar-arrow');

                    button.addEventListener('click', ()=>{
                        form.classList.toggle('form-open');
                        arrow.classList.toggle('up-arrow');
                    });

                </script>
            </section>

        <?php
            require_once "../model/DAO/denunciaDAO.php";
            $denunciaConn = new denunciaDAO();
            $retorno = $denunciaConn->listarDenuncias();
            foreach($retorno as $denuncia){
            
        ?>
                <article class="post">

                    <section class="post-id">
                        <div class="usuario-id">
                            <a href="perfil.php?id=<?=$denuncia["idusuario"]?>">
                            <?php
                            require_once "../model/DAO/usuarioDAO.php";
                            $usuarioConn = new usuarioDAO();
                            $divulgador = $usuarioConn->pesquisarUsuario($denuncia["idusuario"]);
                            ?>
                            
                                <img src="<?=$divulgador["img_usuario"]?>">
                                <h3><?=$divulgador["nome"]?></h3>
                            </a>
                            <div>
                                <img src="../images/tools/world.png">
                                <p><?=$denuncia["estado"]?> - <?=$denuncia["cidade"]?></p>
                            </div>
                        </div>
                        <div class="post-id-selections">
                            <p>Denúncia publicada em <?php echo date('d/m/Y', strtotime($denuncia["dataCadastro"])); ?></p>
                            <button class="post-options">...</button>
                        </div>
                    </section>
                    
                    <section class="animal-id">
                        <div>
                            <h3><?=$denuncia["titulo"]?></h3>
                            <q><?=$denuncia["descricao"]?></q>
                        </div>
                        <img src="<?=$denuncia["foto"]?>">
                    </section>

                    <section class="comentarios-section">
                        <div class="comentarios-container">


                        <?php
                            require_once "../model/DAO/comentarioDAO.php";
                            $comentarioConn = new comentarioDAO();
                            $comentarios = $comentarioConn->listarComentariosDenuncia($denuncia["iddenuncia"]);
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
                                        <button class="comentario-options">...</button>
                                    </div>
                                </div>
                                <q><?=$comentario["texto"]?></q>
                            </article>

                        <?php
                            }
                        ?>

                        </div>

                        <form action="../control/comentarDenunciaControl.php?local=denuncias" method="POST">
                            <textarea placeholder="Comente alguma coisa..." cols="30" rows="1" name="comentario"></textarea>
                            <input type="text" name="iddenuncia" value="<?=$denuncia["iddenuncia"]?>" hidden>
                            <input type="submit" value=">" title="Comentar">
                        </form>
                    </section>

                </article>

            <?php
                }
            ?>

        </section>

    </main>

</body>

</html>