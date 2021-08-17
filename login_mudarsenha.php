<?php
    require_once "database/includes/conectaBD.php";
    $erro = '';
    $msg = '';

    if(isset($_POST["btn-verificar"]) && !isset($_SESSION['verificado'])){ /* faz a verificação do login e email para fazer a alteração da senha */
        $_SESSION['login'] = filter_input(INPUT_POST, 'login');
        $email = filter_input(INPUT_POST, 'email');

        $sql = "SELECT login, email FROM usuario WHERE login = ? AND email = ?";

        $prepare = mysqli_prepare($con, $sql);
        mysqli_stmt_bind_param($prepare, 'ss', $_SESSION['login'], $email);
        mysqli_stmt_execute($prepare);

        $result = mysqli_stmt_get_result($prepare);
        $qt = mysqli_num_rows($result);

        if($qt > 0){
            $_SESSION['verificado'] = true;
            $msg = "Verificação feita com sucesso, Efetue a senha";
        }else{
            $erro = "O login ou o email não conferem.";
        }
    }

    if(isset($_POST["btn-mudarsenha"]) && isset($_SESSION['verificado'])){ /* Depois da verificação efetua a alteração da senha */
        $senha = filter_input(INPUT_POST, 'senha');
        $repitasenha = filter_input(INPUT_POST, 'repitasenha');

        if(strlen($senha) < 8){
            $erro = "A senha deve conter no mínimo 8 caracteres.";
        }else if($senha != $repitasenha){
            $erro = "As senhas não conferem.";
        }else{
            $senha = sha1($senha);

            $sql = "UPDATE usuario SET senha = ? WHERE login = ?";
            $prepare = mysqli_prepare($con, $sql);
            mysqli_stmt_bind_param($prepare, 'ss', $senha, $_SESSION['login']);
            
            if(mysqli_stmt_execute($prepare)){
                unset($_SESSION['verificado']);
                header("location: login.php?msg=Senha&alterada&com&sucesso.");
            }else{
                $erro = "Não foi possível alterar a senha";
            }
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/login.css">
    <title>Altere sua senha</title>
</head>
<body class="mudar-senha">
    <section class="login">
        <h1>Log in</h1>
        <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
            <?php if(!isset($_SESSION['verificado'])){ ?>
                <div class="campos">
                    <label for="login" class="labellogin">Digite seu Login</label>
                    <input type="text" name="login" id="login" class="inputs" autocomplete="off">
                </div>

                <div class="campos">
                    <label for="email" class="labellogin">Digite seu Email</label>
                    <input type="email" name="email" id="email" class="inputs" autocomplete="off">
                </div>
                <input type="submit" id="btnlogin" value="Verificar" name="btn-verificar">
            
            <?php }else{ ?>
                <div class="campos">
                    <label for="pass" class="labellogin">Senha</label>
                    <input type="password" name="senha" id="pass" class="inputs">
                </div>
                <div class="campos">
                    <label for="Rpass" class="labellogin">Repita a Senha</label>
                    <input type="password" name="repitasenha" id="Rpass" class="inputs">
                </div>
                <input type="submit" id="btnlogin" value="Alterar Senha" name="btn-mudarsenha">
            <?php } ?>

            <?php if($erro){ ?>
                <div class="erro"><?=$erro?></div>  
            <?php } ?>             
            <?php if($msg){ ?>
                <div class="msg"><?=$msg?></div>  
            <?php } ?>             
        </form>

    </section>

    <script src="js/login.js"></script>
</body>
</html>