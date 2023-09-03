<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/padrao.css">
    <link rel="stylesheet" href="../css/divulgar.css">
    <title>Mi&Au | Editar Animal</title>
    <style>
        .deletar-animal{
            background-color:#8E3737;
            border:1px solid #424874;
            border-radius:10px;
            width:100%;
            padding:10px;
            outline:none;
            color:white;
            cursor:pointer;
        }
        .deletar-animal:hover{
            opacity:0.8;
        }
        .deletar-animal-confirm{
            background-color:rgba(0, 0, 0, 0.9);
            border-radius:10px;
            color:white;
            padding:0px 20px;
            box-shadow:2px 2px 5px black;
            width:300px;
            height: 0px;
            display:block;
            visibility: hidden;
            flex-direction:column;
            position:absolute;
            top:5px;
            left:50%;
            transform:translateX(-50%);
            z-index:999;
            transition: all 0.5s ease-in-out;
            overflow: hidden;
        }
        .deletar-animal-confirm h3{
            padding-bottom:5px;
            border-bottom:1px solid;
            margin-bottom:10px;
        }
        .deletar-animal-confirm > div{
            display:flex;
            gap:10px;
        }
        .optionSim input[type="submit"]{
            background-color:rgba(255,0,0,0.9);
            width:100%;
            height:100%;
            margin:0;
        }
        .deletar-animal-confirm > div button:hover,.optionSim input[type="submit"]:hover{
            opacity:0.9;
        }
        .optionSim{
            flex:1;
        }
        .deletar-animal-confirm > div button{
            text-align:center;
            background-color:#424874;
            border:1px solid black;
            border-radius:10px;
            color:white;
            outline:none;
            padding:10px;
            flex:1;
            cursor:pointer;
        }
        .active{
            visibility: visible;
            height: 127px;
            padding:20px;
        }
    </style>
</head>

<body>
    
    <?php
        session_start();
        if(!isset($_SESSION["id"])){
            header("location:home.php?msg=Faça login!");
        }
        if(!isset($_GET["idanimal"])){
            header("location:divulgar.php?msg=Nenhum animal selecionado!");
        }
    ?>

    <!--Caixa de Confirmação de Exclusão de Animal-->
    <section class="deletar-animal-confirm">
        <h3>Deseja realmente deletar este animal?</h3>
        <div>
            <form class="optionSim" action="../control/deletarAnimalControl.php" method="POST">
                <input type="text" name="idanimal" value="<?=$_GET["idanimal"]?>" hidden>
                <input type="submit" value="Sim">
            </form>
            <button id="nao">Não</button>
        </div>
    </section>

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

            <section class="conteudo-central" style="padding-bottom:20px">

                <form action="../control/editarAnimalControl.php" method="POST" id="cadastro-animal" enctype="multipart/form-data" style="display:block">
                    <input type="text" name="idanimal" value="<?=$_GET["idanimal"]?>" hidden>
                    <a href="divulgar.php" style="text-decoration:none;color:#424874;font-weight:bold;font-size:25px;float:right">X<a>
                    <h3>Selecione uma espécie</h3>
                    <?php
                        require_once "../model/DAO/animalDAO.php";
                        require_once "../model/DAO/selectDAO.php";

                        $animalDAO = new animalDAO();
                        $retorno = $animalDAO->pesquisarAnimal($_GET["idanimal"]);

                        if($retorno == null || $retorno == 0){
                            header("location:divulgar.php?msg=Nenhum animal selecionado!");
                        }

                        foreach($retorno as $animal){

                            
                        if($_SESSION["id"] != $animal["idusuario"]){
                            header("location:divulgar.php?msg=Sem permissão para editar o animal!");
                        }

                        $selectDAO = new selectDAO();
                        $select = $selectDAO->listarOptions("especie");

                        echo "<select name='especie' id='especie'>";

                        foreach($select as $option){

                            $value = $option["value"];
                            $name = $option["name"];

                            if($option["value"]==$animal["especie"]){
                                echo "<option value='$value' selected>$name</option>";
                            }else{
                                echo "<option value='$value'>$name</option>";
                            }
                        }
                        echo "</select>";
                    ?>

                    <input type="file" id="foto" name="foto" hidden>

                    <div class="inputs-alinhados">
                        <img src="<?=$animal["img_animal"]?>" id="preview-foto">
                        <div class="nome-descricao">
                            <label for="nome">Nome</label>
                            <input type="text" id="nome" name="nome" value="<?=$animal["nome"]?>" required>
                            <label for="descricao">Descrição</label>
                            <textarea name="descricao" id="descricao" cols="30" rows="8" required maxlength="1000"><?=$animal["descricao"]?></textarea>
                        </div>
                    </div>

                    <?php
                        require_once "../model/DAO/selectDAO.php";
                        $selectDAO = new selectDAO();
                        $select = $selectDAO->listarOptions("sexo");

                        echo "<label for='sexo'>Sexo</label>";
                        echo "<select name='sexo' id='sexo'>";

                        foreach($select as $option){

                            $value = $option["value"];
                            $name = $option["name"];

                            if($option["value"]==$animal["sexo"]){
                                echo "<option value='$value' selected>$name</option>";
                            }else{
                                echo "<option value='$value'>$name</option>";
                            }
                        }
                        echo "</select>";
                    ?>

                    <?php
                        require_once "../model/DAO/selectDAO.php";
                        $selectDAO = new selectDAO();
                        $select = $selectDAO->listarOptions("porte");

                        echo "<label for='porte'>Porte</label>";
                        echo "<select name='porte' id='porte'>";

                        foreach($select as $option){

                            $value = $option["value"];
                            $name = $option["name"];

                            if($option["value"]==$animal["porte"]){
                                echo "<option value='$value' selected>$name</option>";
                            }else{
                                echo "<option value='$value'>$name</option>";
                            }
                        }
                        echo "</select>";
                    ?>

                    <?php
                        require_once "../model/DAO/selectDAO.php";
                        $selectDAO = new selectDAO();
                        $select = $selectDAO->listarOptions("temperamento");

                        echo "<label for='temperamento'>Temperamento</label>";
                        echo "<select name='temperamento' id='temperamento'>";

                        foreach($select as $option){

                            $value = $option["value"];
                            $name = $option["name"];

                            if($option["value"]==$animal["temperamento"]){
                                echo "<option value='$value' selected>$name</option>";
                            }else{
                                echo "<option value='$value'>$name</option>";
                            }
                        }
                        echo "</select>";
                    }
                    ?>

                    <input type="submit" name="upload" value="Salvar">
                    <button class="deletar-animal" type="button">Deletar Animal</button>
                    <script>
                        let deletarBttn = document.querySelector('.deletar-animal');
                        let optionNao = document.getElementById('nao');

                        deletarBttn.addEventListener('click', ()=>{
                            document.querySelector('.deletar-animal-confirm').classList.toggle("active");
                        });

                        optionNao.addEventListener('click', ()=>{
                            document.querySelector('.deletar-animal-confirm').classList.toggle("active");
                        });

                    </script>
                </form>

            </section>

        </section>
    </main>

    <!--JavaScript-->
    <script src="../js/divulgar.js"></script>
    <script src="../js/foto.js"></script>

</body>

</html>