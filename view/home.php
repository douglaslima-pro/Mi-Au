<!DOCTYPE html>
<!-- home.php -->
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/home.css">
    <title>Mi&Au | Home Page</title>
</head>

<body>
   
    <!--Formulario de login - position absolute-->
    <section>
        <div class="login-form-container" onclick="fechaFormLogin()"></div>
        <form class="login-form" action="../control/loginControl.php" method="POST">
            <div class="fechar" onclick="fechaFormLogin()">X</div>
            <h1 class="logo">Mi&Au</h1>
            <label for="email">E-mail</label>
            <input type="text" id="email" name="email" required>
            <label for="senha">Senha:</label>
            <input type="password" id="senha" name="senha" required>
            <p><input type="checkbox" name="lembrarSenha">Lembrar minha senha.</p>
            <p id="esqueceu-senha">Esqueceu sua senha? <a href="recuperarSenha.php">Recuperar!</a></p>
            <input type="submit" value="Entrar">
        </form>
    </section>
    

    <header>
        <h1>Mi&Au</h1>
        <button class="bttn-entrar" onclick="abreFormLogin()">Entrar</button>
    </header>

    <!--MAIN com display FLEX contendo slider e cadastro-->
    <main>

        <!--Sessão dos slides no meio, flex 2-->
        <section class="slides-container">

            <div class="slide slide1">
                <button class="previous" onclick="plusSlideIndex(-1)"><</button>
                <div class="resumo">
                    <h2><em>Bem-vindo</em><br> ao site <span>Mi&Au</span></h2>
                    <p>Através do site Mi&Au adotantes e divulgadores podem se conectar em um só lugar, facilitando a adoção de animais.</p>
                    <h4>Encontre o seu novo Amigo!</h4>
                </div>
                <button class="next" onclick="plusSlideIndex(1)">></button>
            </div>

            <div class="slide slide2">
                <button class="previous" onclick="plusSlideIndex(-1)"><</button>
                <div class="resumo">
                    <h2>Encontre um amigo!</h2>
                    <p>Descubra o ambiente online de adoção de animais ideal para você. Comece criando a sua conta!</p>
                    <h4>Temos vários bichinhos aguardando por um lar!</h4>
                </div>
                <button class="next" onclick="plusSlideIndex(1)">></button>
            </div>
                
            <div class="slide slide3">
                <button class="previous" onclick="plusSlideIndex(-1)"><</button>
                <div class="resumo feedback">
                    <h2>Feedback</h2>
                    <div class="usuario-feedback">
                        <img src="../images/home/maria.png">
                        <p>Maria Scarlet</p>
                    </div>
                    <p class="feedback-subject">Amei a plataforma, uma das melhores que já vi se tratando de adoção de animais.</p>
                    <q>Através do site Mi&Au eu consegui adotar uma gata linda de olhos verdes. Hoje em dia recomendo a todos os meus amigos e compartilho sempre os novos animais que aparecem <3
                    </q>
                </div>
                <button class="next" onclick="plusSlideIndex(1)">></button>
            </div>

            <div class="pagination">
                <div class="current-slide">1/3</div>
                <div class="slide-pag" id="slide1" onclick="currentSlideIndex(1)"></div>
                <div class="slide-pag" id="slide2" onclick="currentSlideIndex(2)"></div>
                <div class="slide-pag" id="slide3" onclick="currentSlideIndex(3)"></div>
            </div>
        </section><!--Fim dos sliders-->

        <!--Formulario de cadastro na lateral, aside flex 1-->
        <aside class="cadastro">
            <form class="form-cadastro" action="../control/cadastrarUsuarioControl.php" method="POST">
                <!--Sessao com os inputs para cadastro centralizada verticalmente-->
                <section>

                    <h3>Não possui cadastro?</h3>

                    <div class="inputs-alinhados">
                        <div class="nome">
                            <label for="nome">Nome:</label>
                            <input type="text" id="nome" name="nome" required>
                        </div>
                        <div class="sobrenome">
                            <label for="sobrenome">Sobrenome:</label>
                            <input type="text" id="sobrenome" name="sobrenome" required>
                        </div>
                    </div>

                    <div class="inputs-alinhados">
                        <div class="estado">
                            <label for="estado">Estado:</label>
                            <select name="estado" id="estado">
                                <option value="">Não selecionado</option>
                                <option value="DF">Distrito Federal</option>
                            </select>
                        </div>
                        <div class="cidade">
                            <label for="cidade">Cidade:</label>
                            <select name="cidade" id="cidade">
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

                    <div class="inputs-alinhados">
                        <div class="email">
                            <label for="email">E-mail:</label>
                            <input type="text" id="email" name="email" required>
                        </div>
                        <div class="telefone">
                            <label for="telefone">Telefone/Celular:</label>
                            <input type="tel" id="telefone" name="telefone">
                        </div>
                    </div>


                    <div class="inputs-alinhados">
                        <div class="senha">
                            <label for="senhacad">Senha:</label>
                            <input type="password" id="senhacad" name="senha" required onkeyup="confereSenha()" minlength="5">
                        </div>
                        <div class="confirmSenha">
                            <label for="confirmSenhacad">Confirme a senha:</label>
                            <input type="password" id="confirmSenhacad" required onkeyup="confereSenha()">
                        </div>
                    </div>

                    <p class="alerta-senha"></p>

                     <p><input type="checkbox" name="termos" required>Concordo com os <a href="termos.php">Termos de uso e Privacidade</a>!</p>
                     <input type="submit" class="submit-form" value="Cadastre-se">
                     <div id="submitcad" class="submit-div" style="display:none">Cadastre-se</div>
                        
                    </section>
            </form>
        </aside><!--Fim do formulário de cadastro-->

    </main><!--Fim do display flex-->



    <!--Rodape-->
    <footer>
        <section>
            <div class="footer-column">
                <h3>Mi&Au</h3>
                <p>Mi&Au é um projeto com cunho social criado por um pequeno grupo de estudantes.</p> <q>Possuímos inteira responsabilidade de lutar pelos direitos daqueles que não falam, mas expressam a si mesmos através do amor.</q>
                <p>contato-miau@hotmail.com</p>
            </div>

            <div class="footer-column">
                <h3>Institucional</h3>
                <ul>
                    <li><a href="">Sobre nós</a></li>
                    <li><a href="">Perguntas Frequentes</a></li>
                    <li><a href="">Termos de uso e privacidade</a></li>
                </ul>
            </div>

            <div class="footer-column">
                <h3>Fale Conosco</h3>
                <form class="form-faleConosco" action="../control/enviarEmailControl.php" method="POST">
                    <input type="text" name="local" value="home" hidden>
                    <label for="email">E-mail:</label>
                    <input type="text" id="email" name="email" required>
                    <label for="msg">Mensagem:</label>
                    <textarea id="msg" name="msg" rows="6" placeholder="Insira uma mensagem..." maxlength="500" required></textarea>
                    <input type="submit" value="Enviar">
                </form>
            </div>
        </section>

        <p class="copyright">Copyright © 2022 Mi&Au</p>
    </footer><!--Fim do rodapé-->

    
    <!--AREA dos SCRIPTS ~ Externos-->
    <script src="../js/login-form.js"></script>
    <script src="../js/slide.js"></script>
    <script src="../js/senha.js"></script>

</body>

</html>