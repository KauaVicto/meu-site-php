<?php
    require_once "database/includes/conectaBD.php";
    /* Busca os dados que o usuário inseriu */
    $login = filter_input(INPUT_POST, 'login');
    $senha = filter_input(INPUT_POST, 'pass');

    $errologin = '';

    /* Realiza os testes dos campos */
    if($login == ''){
        $errologin = 'Preencha o campo Login.';
    }else if($senha == ''){
        $errologin = 'Preencha o campo Senha.';
    }else{
        $_SESSION['login'] = $login;    /* Salva o login na session para usar no index.php */

        $senha = sha1($senha);  /* Criptografa a senha */

        /* Faz a verificação no banco de dados de forma segura */
        $sql = "SELECT * FROM usuario WHERE login = ? LIMIT 1";
        $prepare = mysqli_prepare($con, $sql);
        mysqli_stmt_bind_param($prepare, 's', $login);
        mysqli_stmt_execute($prepare);

        $result = mysqli_stmt_get_result($prepare);
        $qt = mysqli_num_rows($result);

        /* Verifica se login e senha conferem */
        if($qt == 1){
            $usuarioBD = mysqli_fetch_assoc($result);

            if($senha == $usuarioBD["senha"]){
                $_SESSION['logado'] = true; /* Salva o estado logado */
            }else{
                $errologin = "Usuário ou senha não conferem!";
            }
        }else{
            $errologin = "Usuário não cadastrado no sistema!";
        }            
    }

    if($errologin != ''){
        echo "<span style='background-color: #d41e1eec'>$errologin</span>";
    }else{
        echo '<a class="usuario" href="#">'.$usuarioBD["login"].'</a>
        <div class="submenu">
            <ul>
                <li class="li li-sec"><a href="login_sair.php">Sair</a></li>
            </ul>
        </div>';
    }

