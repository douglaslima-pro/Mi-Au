<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/padrao.css">
    <link rel="stylesheet" href="../css/doe-aqui.css">
    <title>Mi&Au | Ajudar</title>
    <style>
        .doacao h1{
            text-align:center;
            font-size:30px;
        }
        .doacao h2,.doacao h3{
            margin:30px 0;
        }
        .doacao h2{
            font-size:24px;
        }
        .doacao h3{
            font-size:17px;
        }
        .doacao li{
            display:block;
            font-size:15px;
            margin:10px;
        }
        .doacao li ul{
            border-left:7px solid #676D9B;
        }
        .form-ajuda{
            background-color:#E3E5F6;
            border-radius:20px;
            padding:10px;
        }
        .artigo-2 li p{
            margin:10px 0;
        }
        .artigo-2 li{
            margin:20px 0;
        }
    </style>
</head>

<body>
    
    <?php
        session_start();
        if(!isset($_SESSION["id"])){
            header("location:home.php?msg=Faça login!");
        }
        require_once "../model/DAO/doacaoDAO.php";
        require_once "../model/DAO/ongDAO.php";

        $doacaoConn = new doacaoDAO();
        $doacao = $doacaoConn->ultimaDoacao();

        $ongConn = new ongDAO();
        $ong = $ongConn->pesquisarOng($doacao["idong"]);
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

            <article class="doacao">

                <h1>Ajudar ONG: <?=$ong["nome"]?></h3>

                <p>Toda semana publicamos uma ONG precisando de ajuda, seja com <em>dinheiro</em>, <em>alimentos</em> ou <em>medicamentos</em>.<br>Você pode <b>contribuir</b> com esta causa e <b>registrar</b> a sua ajuda preenchendo o formulário logo abaixo.</p>
                
                <p>*Sempre que quiser, consulte o seu histórico de ajudas!</p>

                <h2>1. Formas de ajudar</h2>
                
                <ul>
                    <li><h3>1.1 Transferência Bancária</h3>
                        <ul>
                            <li><b>Banco</b>: <?=$ong["banco"]?></li>
                            <li><b>Agência</b>: <?=$ong["agencia"]?></li>
                            <li><b>Conta</b>: <?=$ong["conta"]?></li>
                        </ul>
                    </li>
                    <?php
                    if(isset($ong["pix"]) && $ong["pix"] != null){

                        echo "<li>";

                        $pix = explode(",",$ong["pix"]);

                        echo "<h3>1.2 Pix</h3><ul>";

                        for($i=0;$i<sizeof($pix);$i++){
                            echo "<li>";

                            switch($pix[$i]){

                                case "cnpj":
                                    echo "<b>CNPJ:</b> ".$ong["cnpj"];
                                    break;
                                    
                                case "email":
                                    echo "<b>E-mail:</b> ".$ong["email"];
                                    break;
                                    
                                case "telefone":
                                    echo "<b>Telefone:</b> ".$ong["telefone"];
                                    break;

                            }

                            echo "</li>";
                        }

                        echo "</ul></li>";
                    }
                    ?>
                    <li><h3>1.3 Alimentos e/ou Medicamentos</h3>
                        <p>Caso queira contribuir com <em>alimentos</em> e/ou <em>medicamentos</em>, entrar em contato com a ONG!</p>
                    </li>
                </ul>

                <h2>2. Formulário de Ajuda</h2>

                <p>Você pode ajudar as ONGs e registrar cada contribuição efetuada, preenchendo-se o formulário de ajuda. Após o preenchimento do formulário, o mesmo irá aparecer no seu histórico de ajudas.</p>

                <p>*Para questões de auditoria, deve-se preencher o formulário em um período de até 24h <em>antes</em> ou <em>depois</em> da contribuição (transferência ou pix).</p>

                <ul class="artigo-2">

                    <li>
                        <b>2.1</b> Atente-se ao preenchimento correto das informações no formulário de ajuda! Caso contrário, será necessário entrar em contato com o administrador do sistema através do <b>Fale Conosco</b>!
                        <p>*Não permitimos que os usuários preencham os formulários e alterarem ele de imediato por questões de segurança!</p>
                    </li>

                    <li>
                        <b>2.2</b> Se constatado o preenchimento indevido do formulário, poderá configurar-se como <b>spam</b> e a conta do usuário poderá ser <b>suspensa</b> por tempo indeterminado até que o mesmo apresente suas justificativas.
                    </li>

                    <li>
                        <b>2.3</b> O <b>reembolso</b> de valores doados é feito em um prazo de até 7 dias após a contribuição, sendo necessário entrar em contato com o administrador do sistema através do <b>Fale Conosco</b>!
                    </li>

                    <li>
                        <b>2.4</b> O <b>reembolso</b> de <em>alimentos</em> ou <em>remédios</em> não é de responsabilidade do sistema, sendo necessário entrar em contato com a ONG!
                    </li>

                </ul>
                
                <br><br>

                <form action="../control/cadastrarAjudaControl.php" method="POST" class="form-ajuda" enctype="multipart/form-data">
                    
                    <h1>Formulário de Ajuda</h1>

                    <?php
                    require_once "../model/DAO/usuarioDAO.php";
                    $usuarioConn = new usuarioDAO();
                    $usuario = $usuarioConn->pesquisarUsuario($_SESSION["id"]);
                    ?>

                    <h2>Dados Pessoais</h2>

                    <div class="inputs-alinhados">
                        <div class="nome">
                            <label for="nome">Nome:</label>
                            <input type="text" id="nome" value="<?=$usuario["nome"]?>" disabled>
                        </div>
                        <div class="sobrenome">
                            <label for="sobrenome">Sobrenome:</label>
                            <input type="text" id="sobrenome" value="<?=$usuario["sobrenome"]?>" disabled>
                        </div>
                    </div>

                    <div class="inputs-alinhados">
                        <div class="email">
                            <label for="email">E-mail:</label>
                            <input type="text" id="email" value="<?=$usuario["email"]?>" disabled>
                        </div>
                        <div class="telefone">
                            <label for="telefone">Telefone:</label>
                            <input type="tel" id="telefone" value="<?=$usuario["telefone"]?>" disabled>
                        </div>
                    </div>

                    <p><input type="checkbox" required style="width:auto"> Você confirma os seus dados? Caso a resposta seja "não", atualize eles na <b>Edição de Pefil</b>!</p>
                    
                    <h2>Forma de ajuda</h2>

                    <div class="inputs-alinhados">
                        <div class="formAjuda">
                            <input type="text" name="iddoacao" value="<?=$doacao["iddoacao"]?>" hidden>

                            <label for="formAjuda">Forma de ajuda:</label>
                            <select name="formAjuda" id="formAjuda" required>
                                <option value="">Não selecionado</option>
                                <option value="Transferência Bancária">Transferência Bancária</option>
                                <option value="Pix">Pix</option>
                                <option value="Alimentos">Alimentos</option>
                                <option value="Medicamentos">Medicamentos</option>
                            </select>

                        </div>
                        <div class="ajuda">
                            <label for="ajuda">Valor/Conteúdo/Quantidade da ajuda:</label>
                            <input type="text" id="ajuda" name="ajuda" placeholder="Insira o valor, itens e/ou quantidade..." required>
                        </div>
                    </div>

                    <p>Foto do <strong>comprovante:</strong> <input type="file" name="comprovante"></p>

                    <p><input type="checkbox" required style="width:auto"> Você confirma que leu o <b>artigo</b> acima e concorda com ele.</p>

                    <input type="submit" name="submit" value="Enviar">

                </form>

            </article>

        </section>

    </main>

</body>

</html>