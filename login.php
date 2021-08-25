<?php
    require_once "database/includes/conectaBD.php";

    /* Salva os dados para não apagar dos campos */
    $errologin = '';
    $login = '';
    $errocadastro = '';
    $msg = '';
    $nome = '';
    $email = '';
    $loginSing = '';

    unset($_SESSION['verificado']);

    if(isset($_POST['btn-login'])){
        require "login_entrar.php"; /* Realiza o processo de login */
        unset($_POST['btn-login']);
    }else if(isset($_POST['btn-cadastrar'])){
        require "login_cadastrar.php"; /* Realiza o processo de cadastro */
	    unset($_POST['btn-cadastrar']);
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/login.css">
    <title>Log in</title>
</head>
<body onload="carregar()">
    <main class="container">
        <section class="login">
            <h1>Log in</h1>
            <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">

                <div class="campos">
                    <label for="login" class="labellogin">Login</label>
                    <input type="text" name="login" id="login" class="inputs" value="<?= $login ?>" autocomplete="off">
                </div>
                
                <div class="campos">
                    <label for="pass" class="labellogin">Senha</label>
                    <input type="password" name="pass" id="pass" class="inputs">
                </div>
                <input type="submit" id="btnlogin" value="Log in" name="btn-login">
                <div class="oulogin">
                    <span>ou</span>
                </div>
                <div id="btngoogle">Google</div>
                <a href="login_mudarsenha.php" class="mudarsenha">Esqueci a senha</a>
                <?php if($errologin){ ?>
                    <div class="erro"><?=$errologin?></div>  
                <?php } ?>             
            </form>

        </section>

        <div class="separador"></div>

        <section class="login">
            <h1>Sign Up</h1>

            <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">

                <div class="campos">
                    <label for="nome" class="labellogin">Nome</label>
                    <input type="text" name="nome" id="nome" class="inputs" value="<?= $nome ?>" autocomplete="off">
                </div>
                <div class="campos">
                    <label for="email" class="labellogin">Email</label>
                    <input type="email" name="email" id="email" class="inputs" value="<?= $email ?>" autocomplete="off">
                </div>
                <div class="campos">
                    <label for="loginSign" class="labellogin">Login</label>
                    <input type="text" name="loginSign" id="loginSign" class="inputs" value="<?= $loginSign ?>" autocomplete="off">
                </div>
                <div class="campos-senhas">
                        <div class="campos campo-senha">
                            <label for="senhaSign" class="labellogin">Senha</label>
                            <input type="password" name="senhaSign" id="senhaSign" class="inputs">
                        </div>

                        <div class="campos campo-senha">
                            <label for="RsenhaSign" class="labellogin">Repita a Senha</label>
                            <input type="password" name="RsenhaSign" id="RsenhaSign" class="inputs">
                        </div>
                </div>
                <input type="submit" id="btnSing" value="Sign Up" name="btn-cadastrar">
                <?php if($errocadastro){ ?>
                    <div class="erro"><?=$errocadastro?></div>  
                <?php } ?>
                <?php if($msg){ ?>
                    <div class="msg"><?=$msg?></div>  
                <?php } ?>  
            </form>
        </section>
    </main>

    <script src="js/login.js"></script>
</body>
</html>