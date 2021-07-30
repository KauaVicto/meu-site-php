<?php
        $login = filter_input(INPUT_POST, 'login');
        $senha = filter_input(INPUT_POST, 'pass');

        if($login == ''){
            $errologin = 'Preencha o campo Login.';
        }else if($senha == ''){
            $errologin = 'Preencha o campo Senha.';
        }else{
            $_SESSION['login'] = $login;
            $senha = sha1($senha);

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
                    $errologin = "Usuário ou senha não conferem!";
                }
            }else{
                $errologin = "Usuário não cadastrado no sistema!";
            }            
        }

