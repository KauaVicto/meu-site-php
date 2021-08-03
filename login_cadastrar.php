<?php
    /* Pega os dados inseridos pelo usuário */
    $nome = filter_input(INPUT_POST, 'nome');
    $email = filter_input(INPUT_POST, 'email');
    $loginSing = filter_input(INPUT_POST, 'loginSing');
    $senhaSing = filter_input(INPUT_POST, 'senhaSing');
    $RsenhaSing = filter_input(INPUT_POST, 'RsenhaSing');

    /* Faz os testes dos campos */
    if($nome == ''){
        $errocadastro = 'O campo nome é obrigatório.';
    }else if($email == ''){
        $errocadastro = 'O campo email é obrigatório.';
    }else if($loginSing == ''){
        $errocadastro = 'O campo Login é obrigatório.';
    }else if($senhaSing == ''){
        $errocadastro = 'O campo Senha é obrigatório.';
    }else if(strlen($senhaSing) < 8){
        $errocadastro = 'A senha é necessário ter no mínimo 8 caracters.';
    }else if($senhaSing != $RsenhaSing){
        $errocadastro = 'As senhas não estão iguais.';
    }else{
        /* Busca no banco de dados se o login ou email já existe */
        $sql = "SELECT email, login FROM usuario WHERE email = ? OR login = ?";
        $prepare = mysqli_prepare($con, $sql);
        mysqli_stmt_bind_param($prepare, 'ss', $email, $loginSing);
        mysqli_stmt_execute($prepare);

        $result = mysqli_stmt_get_result($prepare);
        $qt = mysqli_num_rows($result);

        if($qt != 0){
            $errocadastro = 'Email ou login já cadastrado no sistema.';
        }
    }

    /* Se não houve nenhum erro irá cocluir o cadastro */
    if($errocadastro == ''){
        $senhaSing = sha1($senhaSing);

        /* Código SQL para inserir os dados do usuário no banco de dados */
        $sql = "INSERT INTO usuario(nome, email, login, senha) VALUES (?,?,?,?)";
        $prepare = mysqli_prepare($con, $sql);
        mysqli_stmt_bind_param($prepare, 'ssss', $nome, $email, $loginSing, $senhaSing);

        if(!mysqli_stmt_execute($prepare)){
            $errocadastro = 'Não foi possível realizar o cadastro, tente mais tarde!';
        }else{
            /* Usuário cadastrado com sucesso */
            $msg = "Usuário cadastrado com sucesso!";
            $nome = '';
            $email = '';
            $loginSing = '';
        }
    }

    