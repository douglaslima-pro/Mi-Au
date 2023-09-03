<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/padrao.css">
    <link rel="stylesheet" href="../css/doe-aqui.css">
    <title>Mi&Au | Doe aqui</title>
    <style>
        #preview-foto{
            background-image:url("../images/usuarios/unset.png");
            background-size:cover;
            background-repeat:no-repeat;
            background-position:center;
            display:flex;
            align-items:center;
            justify-content:center;
            cursor:pointer;
        }
        #preview-foto p{
            margin:0;
            font-size:25px;
        }
        input,textarea{
            background:rgba(255,0,0,0.1);
        }
    </style>
</head>

<body>
    
    <?php
        session_start();
        if(!isset($_SESSION["id"])){
            header("location:home.php?msg=Faça login!");
        }
        if(!isset($_GET["idong"]) || $_GET["idong"] == 0){
            header("location:ongs-adm.php?msg=ONG inválida!");
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

    <?php
    require_once "../model/DAO/ongDAO.php";
    $ongConn = new ongDAO();
    $ong = $ongConn->pesquisarOng($_GET["idong"]);//Passe o ID da ONG como parâmetro!
    ?>

    <section>
        <article class="doacao">

        <form action="../control/publicarOngControl.php" method="POST" enctype="multipart/form-data">

            <input type="text" name="idong" value="<?=$_GET["idong"]?>" hidden>
            <h1 class="titulo">ONG da semana: <?=$ong["nome"]?></h1>
            <input type="text" name="subtitulo" placeholder="Um pequeno Subtítulo no formato: O/A [ong] foi fundado(a) em [dia de mês de Ano] por [fundador]." required>

            <div class="post-autor-data">
                <p><b>Por: <?=$_SESSION["nome"]?>, Mi&Au</b></p>
                <p>
                <?php
                date_default_timezone_set('America/Sao_Paulo');
                $date = date('d/m/Y H:i');
                echo $date;
                ?>
                </p>
            </div>

            <div class="paragraph-foto">
            <img src="<?=$ong["foto"]?>">
            <h3>Breve Descrição da ONG</h3>
            <p><?=$ong["descricao"]?></p>
            <h3>Necessidades</h3>
            <p><?=$ong["necessidades"]?></p>
            </div>

            <input type="file" id="foto" name="foto" hidden>

            <div id="preview-foto" class="img-width-100" title="Coloque a foto do fundador...">
                <p>Insira a foto do <b>Fundador</b></p>
            </div>

            <textarea type="text" style="width:100%;resize:none;outline:none" name="fundador-descricao" rows="4" placeholder="Coloque uma breve descrição do FUNDADOR falando quando e onde ele fundou a ONG..." required></textarea>

            <input type="submit" name="submit" value="PUBLICAR ONG...">

        </form>

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
                if($ong["idong"]!=$_GET["idong"]){
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

    <!--JavaScript-->
    <script>
    let foto = document.getElementById('preview-foto');
    let file = document.getElementById('foto');

    foto.addEventListener('click', () =>{
        file.click();
    });

    file.addEventListener('change',() =>{
        let reader = new FileReader();

        reader.onload = () =>{
            foto.style.backgroundImage = "url("+reader.result+")";
        }
        if(typeof file.files[0] == 'object'){
            reader.readAsDataURL(file.files[0]);
        }else {
            foto.style.backgroundImage = "url('../images/usuarios/unset.png')";
        }
        
    });
    </script>

</body>

</html>