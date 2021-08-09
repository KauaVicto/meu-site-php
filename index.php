<?php
    session_start();
    define('PASTA', 'img/slide/'); /* Endereço da pasta */

    /* Verifica se o usuário está logado ou não */
    if(!isset($_SESSION['logado']) || $_SESSION['logado'] == false){
        header("location: login.php");
    }

    /* variavel que Verifica a quantidade da primeira classe de imagens */
    $_SESSION['qt1class'] = 0;
    /* Le as imagens na pasta */
    $_SESSION['imgs'] = scandir(PASTA);
    array_splice($_SESSION['imgs'], 0, 2);

    /* Separa o nome de cada imagem para obter o nome da classe e conta a quantidade da primeira classe de imagens */
    $numClass = [];
    $class = [];
    foreach($_SESSION['imgs'] as $i => $img){
        $classe = explode('-', $img);
        array_push($class, $classe[0]);
        array_push($numClass, $classe[1][0]);
        if($classe[0] == $class[0]){
            $_SESSION['qt1class']++;
        }
    }
    

?>

<!DOCTYPE html>
<html lang="pt-BR" id="html">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="OP=Opera">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <?php include "css/style-slide.php" ?>
    <title>Rebb_Diit</title>
</head>
<body>
    <!-- <lottie-player src="https://assets8.lottiefiles.com/packages/lf20_e8Sg3j.json" background="rgba(0, 0, 0, 0.5)" speed="1" loop controls autoplay id="loading"></lottie-player> -->
    <header class="container">
        <div class="logo">
            <span>Rebb<br>Diit</span>
        </div>

            <div class="menu">
                <nav>
                    <ul>
                        <li class="li li-pri"><a href="#home">HOME</a></li>
                        <li class="li li-pri"><a href="#servicos">SERVIÇOS</a></li>
                        <li class="li li-pri"><a href="#estudos">ESTUDOS</a></li>
                        <li class="li li-pri"><a href="#projetos">PROJETOS</a></li>
                        <li class="li li-pri menu-drop">
                            <a href="#"><?= $_SESSION['login'] ?></a>
                            <div class="submenu">
                                <ul>
                                    <li class="li li-sec"><a href="login_sair.php">Sair</a></li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </nav>
                <div class="Tmenu">
                    <div class="um"></div>
                    <div class="dois"></div>
                    <div class="tres"></div>
                </div>
            </div>
        
    </header>

    <main class="main">
        <section class="home" id="home">
            <div class="titulo">
                <h1>HOME</h1>
            </div>
            <div class="texto conteudo">
                <p>Meu nome é Kauã Victor, sou estudante do IFBA, cursando o 2° ano Integrado ao curso de Informática. Pretendo seguir na área de TI, e estou na busca de realizar esse meu sonho. Esse é um site com o foco praticar e ao mesmo tempo de criar um portfólio, demonstrando as técnicas que eu sei e que aprendi com a construção dele. Ele está sempre em desenvolvimento, irei sempre acrescentar novas aplicações que com o tempo aprenderei.</p>
            </div>
        </section>

        <section class="servicos" id="servicos">

            <div class="titulo">
                <h1>SERVIÇOS</h1>
            </div>

            <div class="container conteudo">
                <div class="servico">
                    <img src="img/desktop.png" alt="formatação de computadores">
                    <span>Formatação Windows 10</span>
                </div>
                <div class="servico">
                    <img src="img/cardapio.png" alt="cardápio">
                    <span>Design de Cardápios</span>
                </div>
            </div>
        </section>

        <section class="estudos" id="estudos">

            <div class="titulo">
                <h1>ESTUDOS</h1>
            </div>

            <div class="container conteudo">
                <p class="texto">Estudo no IFBA realizando o curso integrado de informática, no momento estou bastante focado em Web Design, front-end, me especializando nas linguagens HTML, CSS e JavaScript, e estou iniciando agora em PHP, em banco de dados com a linguagem MySQL e em Java no modo conceitual. Já fiz um curso iniciante de Python, onde consegui pegar o básico da linguagem.</p>

                <div class="linguagens">
                    <img src="img/javascript.png" alt="JavaScript">
                    <img src="img/python.png" alt="Python">
                    <img src="img/css.png" alt="CSS">
                    <img src="img/html.png" alt="HTML">
                </div>
            </div>
        </section>

        <section class="projetos" id="projetos">

            <div class="titulo">
                <h1>PROJETOS</h1>
            </div>

            <div class="container conteudo">
                <p class="texto">Esses são alguns dos projetos que desenvolvi. Fiz alguns trabalhos como designer, desenvolvi dois sites como projeto curricular e fiz alguns projetinhos web apenas para praticar. Fiz também um projeto em Python onde eu criei um bot que realiza comentários no instagram automaticamente.</p>

                <div class="linha"></div>

                <div class="slide">
                    <nav class="menu-slide">
                        <ul>
                            <li class="list on">DESIGN</li>
                            <li class="list">CURRICULAR</li>
                            <li class="list">WEB</li>
                        </ul>
                    </nav>

                    <div class="slider">
                        <div class="proj">
                            <!-- botões -->

                            <?php for($i = 1;$i <= count($_SESSION['imgs']); $i++){ ?>
                                <input type="radio" name="radio-btn" id="radio<?=$i?>" class="radio <?php if($numClass[$i-1][0] == 1){echo $class[$i-1];} ?>" <?php if($i == 1){echo "checked='true'";} ?> >
                            <?php } ?>

                            <!-- images -->

                            <?php foreach($_SESSION['imgs'] as $i => $img){ ?>
                                <div class="img <?php if($i == 0){echo 'first';} ?>">
                                    <img class="imgs <?= $class[$i] ?>" src="img/slide/<?= $img ?>" alt="estudos">
                                </div>
                            <?php } ?>

                            <!-- navegação -->

                            <div class="btns">
                                <!-- Automática nav -->
                                <div class="navegacao">
                                    <?php for($i = 1;$i <= count($_SESSION['imgs']); $i++){ ?>
                                        <div class="auto-btn<?=$i?>"></div>
                                    <?php } ?>
                                </div>
                                <!-- manual nav -->
                                <div class="manual">
                                    <div id="sele"></div>
                                    <?php for($i = 1;$i <= count($_SESSION['imgs']); $i++){ ?>
                                        <label for="radio<?=$i?>" class="manual-btn"></label>
                                    <?php } ?>
                                </div>
                            </div>

                        </div>

                    </div>
                </div>

            </div>
        </section>
    </main>

    <footer class="rodape">
        <div class="texto">
            <span>Serei um programador</span>
        </div>
        <div class="contato">
            <h2>Contato</h2>
            <div class="icones">
                
                <div class="social esqw rede1" id="wpp" title="Copiar o Número!">
                    <div class="copiado" id="cwpp">Número Copiado!</div>
                    <img src="img/whatsapp.png" alt="Whatsapp">
                </div>

                <div class="social dir rede2" title="Acessar Meu Instagram">
                    <a href="https://instagram.com/kaua_41_" target="_blank"><img src="img/instagram1.png" alt="Instagram"></a>
                </div>

                <div class="social esqg rede3" id="gmail" title="Copiar o Email!">
                    <div class="copiado" id="cgmail">Email Copiado!</div>
                    <img src="img/gmail.png" alt="Gmail">
                </div>

                <div class="social dir rede4" title="Acessar meu GitHub">
                    <a href="https://github.com/kauavicto" target="_blank"><img src="img/github.png" alt="GitHub"></a>
                </div>

            </div>
        </div>
    </footer>
    <input type="text" name="copiar" id="copiar">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
    <script src="js/script.js"></script>
    <script src="js/slide.js"></script>
    <script src="js/responsive.js"></script>
    <script src="js/load.js"></script>
</body>
</html>