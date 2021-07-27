<?php
    require_once "database/includes/conectaBD.php";
    $erro = '';

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $login = filter_input(INPUT_POST, 'login');
        $senha = sha1(filter_input(INPUT_POST, 'pass'));

        $sql = "SELECT * FROM usuario WHERE login = ? LIMIT 1";

        $prepare = mysqli_prepare($con, $sql);
        mysqli_stmt_bind_param($prepare, 's', $login);
        mysqli_stmt_execute($prepare);

        $result = mysqli_stmt_get_result($prepare);
        $qt = mysqli_num_rows($result);

        if($qt == 1){
            $usuarioBD = mysqli_fetch_assoc($result);

            if($senha == $usuarioBD["senha"]){
                $_SESSION['logado'] = true;
                $_SESSION['usuario'] = $login;

                header("location: index.php");
            }else{
                $erro = "Usuário ou senha não conferem!";
            }
        }else{
            $erro = "Usuário não cadastrado no sistema!";
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
    <title>Log in</title>
</head>
<body>
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
                <button type="submit" id="btnlogin">Log in</button>
                <div class="oulogin">
                    <span>ou</span>
                </div>
                <div id="btngoogle">Google</div>
                <?php if($erro){ ?>
                    <div class="erro"><?=$erro?></div>  
                <?php } ?>             
            </form>

        </section>

        <div class="separador"></div>

        <section class="login">
            <h1>Sing Up</h1>

            <form action="login.php" method="post">

                <div class="campos">
                    <label for="nome" class="labellogin">Nome</label>
                    <input type="text" name="nome" id="nome" class="inputs" autocomplete="off">
                </div>
                <div class="campos">
                    <label for="email" class="labellogin">Email</label>
                    <input type="email" name="email" id="email" class="inputs" autocomplete="off">
                </div>
                <div class="campos">
                    <label for="loginSing" class="labellogin">Login</label>
                    <input type="text" name="loginSing" id="loginSing" class="inputs" autocomplete="off">
                </div>
                <div class="campos">
                    <label for="senhaSing" class="labellogin">Senha</label>
                    <input type="password" name="senhaSing" id="senhaSing" class="inputs">
                </div>
                <div class="campos">
                    <label for="RsenhaSing" class="labellogin">Repita a Senha</label>
                    <input type="password" name="RsenhaSing" id="RsenhaSing" class="inputs">
                </div>
                <button type="submit" id="btnSing">Sing Up</button>
            </form>
        </section>
    </main>

    <script src="js/login.js"></script>
</body>
</html>