<?php
    require_once "database/includes/conectaBD.php";
    $errologin = '';
    $errocadastro = '';
    $msg = '';
    $nome = '';
    $email = '';
    $loginSing = '';

    if(isset($_POST['btn-login'])){
        require_once "login_entrar.php";
    }else if(isset($_POST['btn-cadastrar'])){
        require_once "login_cadastrar.php";
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
            <form action="login.php" method="post">

                <div class="campos">
                    <label for="login" class="labellogin">Login</label>
                    <input type="text" name="login" id="login" class="inputs" autocomplete="off">
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
                <?php if($errologin){ ?>
                    <div class="erro"><?=$errologin?></div>  
                <?php } ?>             
            </form>

        </section>

        <div class="separador"></div>

        <section class="login">
            <h1>Sing Up</h1>

            <form action="login.php" method="post">

                <div class="campos">
                    <label for="nome" class="labellogin">Nome</label>
                    <input type="text" name="nome" id="nome" class="inputs" value="<?= $nome ?>" autocomplete="off">
                </div>
                <div class="campos">
                    <label for="email" class="labellogin">Email</label>
                    <input type="email" name="email" id="email" class="inputs" value="<?= $email ?>" autocomplete="off">
                </div>
                <div class="campos">
                    <label for="loginSing" class="labellogin">Login</label>
                    <input type="text" name="loginSing" id="loginSing" class="inputs" value="<?= $loginSing ?>" autocomplete="off">
                </div>
                <div class="campos">
                    <label for="senhaSing" class="labellogin">Senha</label>
                    <input type="password" name="senhaSing" id="senhaSing" class="inputs">
                </div>
                <div class="campos">
                    <label for="RsenhaSing" class="labellogin">Repita a Senha</label>
                    <input type="password" name="RsenhaSing" id="RsenhaSing" class="inputs">
                </div>
                <input type="submit" id="btnSing" value="Sing Up" name="btn-cadastrar">
                <?php if($errocadastro){ ?>
                    <div class="erro"><?=$errocadastro?></div>  
                <?php } ?>
                <?php if($msg){ ?>
                    <div class="erro"><?=$msg?></div>  
                <?php } ?>  
            </form>
        </section>
    </main>

    <script src="js/login.js"></script>
</body>
</html>